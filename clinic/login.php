<?php
include('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            echo "Kata laluan salah!";
        }
    } else {
        echo "Pengguna tidak wujud!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f9f5f6;
        }
        .container {
            display: flex;
            width: 850px;
            background-color: #fff;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            overflow: hidden;
        }
        .left-section {
            background-color: #800020; /* Maroon */
            background-image: linear-gradient(135deg, #800020, #e3a8a1); /* Rose Gold */
            color: white;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px;
        }
        .left-section p {
            font-size: 1.2rem;
            text-align: center;
            margin-top: 20px;
        }
        .right-section {
            padding: 60px 40px;
            flex: 1;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"],
        input[type="password"] {
            padding: 15px;
            margin-bottom: 20px;
            border: 2px solid #e8d1d1;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #800020; /* Maroon */
            outline: none;
        }
        button {
            padding: 15px;
            background-color: #800020; /* Maroon */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #a52a2a; /* Slightly lighter Maroon */
        }
        .social-login button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 2px solid #800020; /* Maroon */
            background-color: white;
            color: #800020;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        .social-login button:hover {
            background-color: #800020;
            color: white;
        }
        a {
            color: #800020; /* Maroon */
            text-decoration: none;
            font-size: 0.9rem;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Section (Information) -->
        <div class="left-section">
            <h1>Welcome Back!</h1>
            <p>Log in to access your account and explore more features.</p>
        </div>

        <!-- Right Section (Form) -->
        <div class="right-section">
            <h2 style="color: #800020; margin-bottom: 20px;">Login</h2>
            <form method="POST" action="login.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit">Login</button>

                <p style="margin-top: 20px;">Don't have an account? <a href="register.php">Sign up</a></p>
            </form>
        </div>
    </div>
</body>
</html>
