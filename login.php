<?php
include 'config.php';

if(isset($_POST['login'])){
    $mel=$_POST['email'];
    $pass=$_POST['password'];

    $result=mysqli_query($connect,"SELECT * FROM users WHERE mel='$email'");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($pass, $row['password'])) {
            // Correct password
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];

            echo "<script>alert('Login successful! Welcome, ".$row['name']."'); window.location='dashboard.php';</script>";
        } else {
            echo "<script>alert('Wrong password!'); window.location='login.php';</script>";
        }
    } else {
        // Email not found
        echo "<script>alert('Email not found!'); window.location='login.php';</script>";
    }
}
?>
?>
<!DOCTYPE html>
<body>
<form method="POST" action="">
    <input type="email" name="email" placeholder="Email Address" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>
</body>
</html>

