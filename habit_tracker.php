<?php
session_start();
include 'config.php'; // your DB connection file

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $sleep = $_POST['sleep_hours'];
    $water = $_POST['water_cups'];
    $steps = $_POST['steps'];
    $date = date("Y-m-d");

    // Check if check-in for today already exists
    $check = mysqli_query($connect, "SELECT * FROM checkins WHERE user_id='$user_id' AND date='$date'");
    
    if (mysqli_num_rows($check) > 0) {
        // Update existing entry
        mysqli_query($connect, "UPDATE checkins SET sleep_hours='$sleep', water_cups='$water', steps='$steps' WHERE user_id='$user_id' AND date='$date'");
    } else {
        // Insert new entry
        mysqli_query($connect, "INSERT INTO checkins (user_id, date, sleep_hours, water_cups, steps) VALUES ('$user_id', '$date', '$sleep', '$water', '$steps')");
    }

    echo "<script>alert('Health habits saved!'); window.location='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Habit Tracker</title>
</head>
<body>
    <h2>Health Habit Tracker</h2>
    <form method="post">
        <label>Hours of Sleep:</label>
        <input type="number" name="sleep_hours" min="0" max="24" required><br><br>

        <label>Water Intake (cups):</label>
        <input type="number" name="water_cups" min="0" max="20" required><br><br>

        <label>Steps Walked:</label>
        <input type="number" name="steps" min="0" max="50000" required><br><br>

        <button type="submit" name="submit">Save Habits</button>
    </form>
</body>
</html>
