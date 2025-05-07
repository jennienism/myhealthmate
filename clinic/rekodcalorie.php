<?php
include 'config.php'; 

// Query to fetch data
$result = mysqli_query($mysqli, "SELECT * FROM calories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <title>User Results - Admin View</title>
    <style>
        body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #fbe4e2; /* Light rose background */
    color: #4c1c24; /* Burgundy text */
}
        /* Header styles */
        .header {
            background-color: #800000;
            color: #FADCD9;
            padding: 10px 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 5px;
            color: white;
        }
        .header p {
            font-size: 1rem;
        }

.container {
    max-width: 1150px;
    margin: 30px auto;
    padding: 20px;
    background: linear-gradient(135deg, #ffffff, #fde8e7);
    border-radius: 15px;
    box-shadow: 0 10px 35px rgba(0, 0, 0, 0.25);
    transition: transform 0.2s ease-in-out;
}

.container:hover {
    transform: translateY(-5px);
}

h1 {
    text-align: center;
    color: #a85c68;
    margin-bottom: 20px;
    font-size: 2.5rem;
    letter-spacing: 1px;
}

table {
    width: 80%; /* Use a percentage to make it responsive */
    max-width: 1000px; /* Set a maximum width for the table */
    margin: 20px auto; /* Center the table horizontally */
    border-collapse: collapse;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
}

table th, table td {
    padding: 8px 12px; /* Reduced padding to make cells smaller */
    text-align: left;
    border: 1px solid #e3b5b5;
    font-size: 0.9rem; /* Smaller font size */
}

table th {
    background-color: #a85c68;
    color: #fff;
    text-transform: uppercase;
    font-weight: 100;
}

table tr:nth-child(even) {
    background-color: #fce8e6;
}

table tr:nth-child(odd) {
    background-color: #ffffff;
}

table tr:hover {
    background-color: #f8d7d6;
    transition: background-color 0.3s ease;
}


.actions {
    text-align: center;
    margin-top: 20px;
}

.actions button {
    padding: 10px 16px;
    background: linear-gradient(to right, #a85c68, #f77a8a);
    color: #fff;
    border: none;
    border-radius: 10px;
    font-size: 1rem;
    cursor: pointer;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease-in-out;
}

.actions button:hover {
    background: linear-gradient(to right, #f77a8a, #a85c68);
    transform: scale(1.1);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

.no-data {
    text-align: center;
    font-size: 1.2rem;
    color: #6c373d;
    margin-top: 20px;
    font-style: italic;
}

.progress-container {
    width: 100%;
    background-color: #f3c7c5;
    height: 20px;
    border-radius: 10px;
    overflow: hidden;
    margin: 20px 0;
    box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.1);
}

.progress-bar {
    height: 100%;
    background: linear-gradient(135deg, #a85c68, #f77a8a);
    width: 0%;
    border-radius: 10px;
    transition: width 0.5s ease-in-out;
}

.calorie-message {
    text-align: center;
    margin-top: 15px;
    font-size: 1.1rem;
    font-weight: bold;
    color: #4c1c24;
}

        /* Button styles */
        button {
            background-color: #7f1d1d; /* Maroon */
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #a82323; /* Darker maroon */
        }

/* Button styles */
        .btn {
            background-color: #800000;
            color: #FADCD9;
            border: none;
            padding: 10px 20px;
            margin: 10px 5px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #B22222;
        }
        .center {
            text-align: center;
            margin: 20px 0;
        }
        /* Footer styles */
        .footer {
            background-color: #800000;
            color: #FADCD9;
            text-align: center;
            padding: 10px 20px;
            margin-top: 40px;
            border-radius: 0 0 5px 5px;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }
        .footer p {
            font-size: 0.9rem;
        }


    </style>
</head>
<body>

        <!-- Header Section -->
    <div class="header">
<h1>KVS BMI & Calorie Records</h1>
<p>Student Data Management System</p>

    </div>
    <div class="container">
        <h1>User Results</h1>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Age</th>
                        <th>Weight (kg)</th>
                        <th>Height (cm)</th>
                        <th>BMI</th>
                        <th>TDEE</th>
                        <th>Total Calories</th>
                        <th>Activity Level</th>
                        <th>Food Calories</th>
                        <th>Beverage Calories</th>
                        <th>Dessert Calories</th>
                        <th>bmi_date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['weight']; ?></td>
                            <td><?php echo $row['height']; ?></td>
                            <td><?php echo number_format($row['bmi'], 1); ?></td>
                            <td><?php echo number_format($row['tdee'], 0); ?> kcal</td>
                            <td><?php echo number_format($row['total_calories'], 0); ?> kcal</td>
                            <td><?php echo $row['activity_level']; ?></td>
                            <td><?php echo $row['food_calories']; ?> kcal</td>
                            <td><?php echo $row['beverage_calories']; ?> kcal</td>
                            <td><?php echo $row['dessert_calories']; ?> kcal</td>
                            <td><?php echo $row['bmi_date']; ?></td>
                            <td class="actions">
                              <a href="padamcalorie.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');"><button>Delete</button></a>
                          </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-data">No user data available.</div>
        <?php endif; ?>


    </div>

    <!-- Buttons -->
    <center>
        <a href="tambahcalories.php"><button>Add Record</button></a>
        <a href="admainpage.html"><button>Return To Main Page</button></a>
    </center>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; 2024 Selangor Vocational College. All Rights Reserved.</p>

    </div>
</body>
</html>
</body>
</html>
<?php
mysqli_close($mysqli);
?>
