<?php
include ('config.php');

$error = '';
if (isset($_POST['login'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is Invalid";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = mysqli_query($mysqli, "SELECT * FROM admin WHERE password='$password' AND username='$username'");
        $rows = mysqli_num_rows($query);
        if ($rows == 1) {
            header("Location: admainpage.html");
            exit();
        } else {
            $error = "Username or Password is Invalid";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color:#fdf6f0 /* Menetapkan gambar latar belakang */
    background-size: cover; /* Gambar memenuhi keseluruhan latar */
    background-position: center; /* Pusatkan gambar */
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}


    .login-container {
        background-color: #ffffff; /* White background */
        padding: 40px 50px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        text-align: center;
        border: 2px solid #8b3a3a; /* Maroon border */
    }

    h2 {
        color: #8b3a3a; /* Maroon text */
        margin-bottom: 20px;
    }

    .input-group {
        margin-bottom: 15px;
        text-align: left;
    }

    .input-group label {
        color: #8b3a3a; /* Maroon text */
        font-size: 14px;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        background-color: #f9e6e1; /* Light rose gold input background */
    }

    .login-button {
        background-color: #8b3a3a; /* Maroon button */
        color: #fff; /* White text */
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .login-button:hover {
        background-color: #6a2929; /* Darker maroon on hover */
    }

    .error-message {
        color: #d9534f; /* Red error message */
        font-size: 14px;
        margin-top: 10px;
    }

    .link {
    display: inline-block;
    margin-top: 15px;
    color: #8b3a3a; /* Warna maroon */
    text-decoration: none; /* Buang garisan bawah */
    font-size: 14px;
}

.link:hover {
    text-decoration: underline; /* Tambah garisan bawah semasa hover */
    color: #6a2929; /* Warna maroon lebih gelap */
}

</style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="" method="post">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <input type="submit" class="login-button" name="login" value="LOGIN">
        <br><br>
        <a href="index.php" class="link">Return To Main Page</a>
        <?php if ($error) { ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php } ?>
    </form>
</div>


</body>
</html>
