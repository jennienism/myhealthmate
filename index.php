<?php
include 'config.php';

if(isset($_POST['register'])) { 
    $id=uniqid(); // Generate a unique ID
    $nm=$_POST['name'];
    $ml=$_POST['email'];
    $pas=$_POST['password'];

    $connect="INSERT INTO users(id,name,email,password) VALUES ('$id','$nm','$ml','$pas')";
    
    if (mysqli_query($conn, $connect)){ // Use mysqli_query and the $conn variable
    echo "<script>alert('Registration successful! You can now login.'); window.location='login.php';</script>";
    } else {
        echo "error: " . mysqli_error($conn); // Show specific MySQL error
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .header {
            background-color: #222;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5em;
        }

        .navigation {
            display: flex;
        }

        .navigation a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }

        .navigation a:hover {
            background-color: #555;
        }

        .container {
            display: flex;
            min-height: calc(100vh - 60px); /* Adjust for header height */
        }

        .sidebar {
            width: 200px;
            background-color: #eee;
            padding: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            color: #333;
            background-color: #ddd;
            border-radius: 4px;
        }

        .sidebar a:hover {
            background-color: #ccc;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        form {
            width: 300px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }

        button[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #555;
        }

        /* Hidden by default */
        #registrationForm {
            display: none;
        }

        /* Show the form when the register link is clicked */
        #registrationForm.show {
            display: block;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="logo">Your Logo</div>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#"> <a href="?register=true">Register</a>
        </nav>
    </div>

    <div class="container">
        <div class="sidebar">
            <h3>Sidebar</h3>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="tips.php">Tips</a></li>
                <li><a href="habit_tracker.php">Habit Tracker</a></li>
            </ul>
        </div>

        <div class="content">
            <h2>Main Content Area</h2>
            <p>This is where your main content goes.</p>

            <!-- Registration Form (Initially Hidden) -->
            <div id="registrationForm" <?php if (isset($_GET['register']) && $_GET['register'] == 'true') echo 'class="show"'; ?>>
                <h3>Register</h3>
                <form method="POST" action="">
                    <input type="text" name="name" placeholder="Full Name" required><br><br>
                    <input type="email" name="email" placeholder="Email Address" required><br><br>
                    <input type="password" name="password" placeholder="Password" required><br><br>
                    <button type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
