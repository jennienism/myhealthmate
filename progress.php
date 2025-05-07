<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch check-in data
$query = "SELECT * FROM checkins WHERE user_id = $user_id ORDER BY date ASC";
$result = mysqli_query($connect, $query);

$dates = [];
$sleep = [];
$water = [];
$steps = [];

while ($row = mysqli_fetch_assoc($result)) {
    $dates[] = $row['date'];
    $sleep[] = $row['sleep_hours'];
    $water[] = $row['water_cups'];
    $steps[] = $row['steps'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Progress - MyHealthMate</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Hello, <?php echo $_SESSION['user_name']; ?> 👋</h2>
    <h3>Your Health Progress</h3>

    <?php
// Count each mood
$moods = ['😊 Happy' => 0, '😐 Okay' => 0, '😔 Sad' => 0, '😤 Stressed' => 0];
$chart_moods = "SELECT mood FROM checkins WHERE user_id = $user_id";
$mood_result = mysqli_query($connect, $chart_moods);

while ($row = mysqli_fetch_assoc($mood_result)) {
    if (isset($moods[$row['mood']])) {
        $moods[$row['mood']]++;
    }
}
?>


    <canvas id="progressChart" width="400" height="200"></canvas>
    <h3>Your Mood Summary</h3>
    <canvas id="moodChart" width="400" height="200"></canvas>



    <script>
        const ctx = document.getElementById('progressChart').getContext('2d');
        const progressChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($dates); ?>,
                datasets: [
                    {
                        label: 'Sleep Hours',
                        data: <?php echo json_encode($sleep); ?>,
                        borderColor: 'blue',
                        fill: false
                    },
                    {
                        label: 'Water Cups',
                        data: <?php echo json_encode($water); ?>,
                        borderColor: 'teal',
                        fill: false
                    },
                    {
                        label: 'Steps',
                        data: <?php echo json_encode($steps); ?>,
                        borderColor: 'green',
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Daily Health Trends'
                    }
                }
            }
        });
    </script>

<script>
    const moodCtx = document.getElementById('moodChart').getContext('2d');
    const moodChart = new Chart(moodCtx, {
        type: 'bar',
        data: {
            labels: ['😊 Happy', '😐 Okay', '😔 Sad', '😤 Stressed'],
            datasets: [{
                label: 'Mood Frequency',
                data: <?php echo json_encode(array_values($moods)); ?>,
                backgroundColor: ['#4CAF50', '#FFC107', '#F44336', '#9C27B0']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Mood Summary'
                }
            }
        }
    });
</script>


    <br>
    <a href="dashboard.php">← Back to Dashboard</a>
</body>
</html>
