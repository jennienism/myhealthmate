<?php
include 'config.php';

if(isset($_POST['register'])) { 
    $id=$_POST['id'];
    $nm=$_POST['name'];
    $ml=$_POST['email'];
    $pas=$_POST['password'];

    $connect="INSERT INTO users(id,name,email,password) VALUES ('$id','$nm','$ml','$pas')";
    
    if ($connect === TRUE){
    echo "<script>alert('Registration successful! You can now login.'); window.location='login.php';</script>";
    } else {
        echo "error:".$connect;
    }
}
?>

<!DOCTYPE html>
    <body>
        <h2>Registration</h2>
        <form method="POST" action="">
        <input type="text" name="name" placeholder="Full Name" required><br><br>
        <input type="email" name="email" placeholder="Email Address" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit" name="register">Register</button>
        </form>
    </body>
</html>