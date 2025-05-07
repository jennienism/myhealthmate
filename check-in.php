<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $date = $_POST("date");
    $mood = $_POST['mood'];
    $sleep = $_POST['sleep'];
    $water = $_POST['water'];
    $steps = $_POST['steps'];
    $note = $_POST['note'];

    $insert = "INSERT INTO checkins (user_id, date, mood, sleep_hours, water_cups, steps, note)
               VALUES ('$user_id', '$date', '$mood', '$sleep', '$water', '$steps', '$note')";

    if (mysqli_query($connect, $insert)) {
        echo "<script>alert('Check-in submitted!'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error submitting check-in.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daily Check-In - MyHealthMate</title>
</head>
<body>
    <h2>Daily Check-In</h2>
    <form method="POST">
        <label>Mood:</label>
        <select name="mood" required>
            <option value="">Select</option>
            <option value="😊 Happy">😊 Happy</option>
            <option value="😐 Okay">😐 Okay</option>
            <option value="😔 Sad">😔 Sad</option>
            <option value="😤 Stressed">😤 Stressed</option>
        </select><br><br>

        <label>Sleep Hours:</label>
        <input type="number" name="sleep" min="0" max="24" required><br><br>

        <label>Water Cups:</label>
        <input type="number" name="water" min="0" max="20" required><br><br>

        <label>Steps Today:</label>
        <input type="number" name="steps" min="0" required><br><br>

        <label>Notes:</label><br>
        <textarea name="note" rows="4" cols="30" placeholder="Anything you want to share?"></textarea><br><br>

        <button type="submit" name="submit">Submit Check-In</button>
    </form>
    <br>
    <a href="dashboard.php">← Back to Dashboard</a>
</body>
</html>
