<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Pendaftaran berjaya! <a href='login.php'>Login</a>";
    } else {
        echo "Ralat: " . $sql . "<br>" . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f5f6;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin: 50px auto;
            width: 80%;
            background-color: #fff;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            overflow: hidden;
        }

        .left-section {
            padding: 40px;
            width: 50%;
            background-color: #fff;
        }

        .right-section {
            width: 50%;
            background: linear-gradient(135deg, #800020, #e3a8a1); /* Maroon to Rose Gold */
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 50px;
        }

        h2, h3 {
            color: #800020; /* Maroon */
            margin-bottom: 20px;
        }

        .social-login button {
            width: 100%;
            padding: 15px;
            background-color: #800020; /* Maroon */
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 20px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .social-login button:hover {
            background-color: #a52a2a; /* Slightly lighter Maroon */
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #e8d1d1;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #800020; /* Maroon */
            outline: none;
        }

        button[type="submit"] {
            padding: 15px;
            width: 100%;
            background-color: #800020; /* Maroon */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #a52a2a; /* Slightly lighter Maroon */
        }

        .checkbox-container {
            margin-top: 10px;
        }

        .checkbox-container input {
            margin-right: 10px;
        }

        .left-section p {
            margin-top: 20px;
            color: #666;
        }

        a {
            color: #800020; /* Maroon */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .right-section h3{
            color: white;
        }

        .right-section p{
            color: white;
        }
    </style>
</head>
<body>
    <div id="success-message" style="display:none; padding: 20px; background-color: #e3a8a1; color: #fff; text-align: center; border-radius: 10px;">Pendaftaran Berjaya! Welcome to our platform.</div>

    <div class="container">
        <!-- Left Section (Form) -->
        <div class="left-section">
            <h2>Create Your Account</h2>
            <p>Let's get started with your 30-day free trial</p>

            <!-- Social Login Button -->
            <div class="social-login">
                <button>Login with Google</button>
            </div>

            <form method="POST" action="register.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <div class="checkbox-container">
                    <input type="checkbox" required>
                    <label>I agree to the <a href="#">Terms, Privacy Policy and Fees</a></label>
                </div>

                <button type="submit">Sign Up</button>
            </form>

            <p>Already have an account? <a href="login.php">Log in</a></p>
        </div>

        <!-- Right Section (Image and Text) -->
        <div class="right-section">
            <h3>Welcome to a New Experience</h3>
            <p>Join us to unlock exceptional features and a personalized environment crafted just for you.</p>
        </div>
    </div>

    <script>
        function showSuccessMessage() {
            var successMessage = document.getElementById('success-message');
            successMessage.style.display = 'block'; // Show the success message
            setTimeout(function() {
                successMessage.style.display = 'none'; // Hide it after 5 seconds
            }, 5000);
        }
    </script>
</body>
</html>
