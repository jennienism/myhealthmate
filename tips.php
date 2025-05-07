<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get latest check-in
$result = mysqli_query($connect, "SELECT * FROM checkins WHERE user_id = $user_id ORDER BY date DESC LIMIT 1");
$data = mysqli_fetch_assoc($result);

$mood = $data['mood'];
$sleep = $data['sleep_hours'];
$water = $data['water_cups'];
$steps = $data['steps'];

$tips = [];

// Mood-based tips
if ($mood == '😔 Sad' || $mood == '😤 Stressed') {
    $tips[] = "🧘 Try a 5-minute deep breathing exercise.";
    $tips[] = "📱 Take a short break from screens.";
    $tips[] = "👥 Talk to a friend or someone you trust.";
}

// Sleep tips
if ($sleep < 6) {
    $tips[] = "😴 Try to sleep earlier tonight for better focus.";
}

// Water tips
if ($water < 5) {
    $tips[] = "💧 Keep a water bottle near you. Drink regularly!";
}

// Steps tips
if ($steps < 3000) {
    $tips[] = "🚶‍♂️ Take a short walk to refresh your body and mind.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Health Tips - MyHealthMate</title>
</head>
<body>
    <h2>Hello, <?php echo $_SESSION['user_name']; ?> 👋</h2>
    <h3>Personalized Health Suggestions</h3>

    <?php if (count($tips) > 0): ?>
        <ul>
            <?php foreach ($tips as $tip): ?>
                <li><?php echo $tip; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>🎉 You're doing great! Keep up the healthy habits.</p>
    <?php endif; ?>

    <br>
    <a href="dashboard.php">← Back to Dashboard</a>
</body>
</html>
