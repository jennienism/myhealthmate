<?php
include 'config.php';

session_start();  // Make sure the session is started

if (isset($_POST['submit'])) {
    // Get input data
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $activity_level = $_POST['activity_level'];
    $food_calories = $_POST['food_calories'];
    $beverage_calories = $_POST['beverage_calories'];
    $dessert_calories = $_POST['dessert_calories'];

    // Sanitize inputs to avoid issues with special characters
    $age = mysqli_real_escape_string($mysqli, $age);
    $weight = mysqli_real_escape_string($mysqli, $weight);
    $height = mysqli_real_escape_string($mysqli, $height);
    $activity_level = mysqli_real_escape_string($mysqli, $activity_level);
    $food_calories = mysqli_real_escape_string($mysqli, $food_calories);
    $beverage_calories = mysqli_real_escape_string($mysqli, $beverage_calories);
    $dessert_calories = mysqli_real_escape_string($mysqli, $dessert_calories);

    // Ensure user is logged in
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];  // Get the logged-in username

        // Get user_id from users table
        $sql = "SELECT id FROM users WHERE username='$username'";
        $result = $mysqli->query($sql);

        // Check if the user exists in the database
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_id = $row['id'];  // Get the user_id
        } else {
            echo "<script>alert('User not found.');</script>";
            exit;
        }

        // Calculate BMI, BMR, and TDEE
        $bmi = $weight / pow($height / 100, 2);  // BMI formula
        $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;  // BMR formula
        $tdee = $bmr * $activity_level;  // TDEE formula
        $total_calories = $food_calories + $beverage_calories + $dessert_calories;  // Total calories

        // Insert the data into the database
        $sql = "INSERT INTO calories (user_id, age, weight, height, activity_level, food_calories, beverage_calories, dessert_calories, bmi, tdee, total_calories) 
                VALUES ('$user_id', '$age', '$weight', '$height', '$activity_level', '$food_calories', '$beverage_calories', '$dessert_calories', '$bmi', '$tdee', '$total_calories')";

        // Check if the query was successful
        if ($mysqli->query($sql)) {
            echo "<script>alert('Record successfully saved.'); window.location.href='calories.php';</script>";
        } else {
            echo "<script>alert('Failed to save user record: " . $mysqli->error . "');</script>";
        }
    } else {
        echo "<script>alert('You must be logged in to submit data.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorie Page</title>
    <style>
    /* General Styles */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #fbe4e2; /* Light rose background */
    color: #4c1c24; /* Burgundy text */
}
img {
    max-width: 100%;
    height: auto;
    display: block;
}

.image-section img {
    max-width: 300px;
    margin: 0 auto;
    border-radius: 15px;
}


h1, h2, h3 {
    color: #a85c68; /* Burgundy accent */
    text-align: center;
}

h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.header-section {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 30px;
}

h1 {
    flex: 1;
    margin-right: 20px;
}

.input-section, .food-section {
    flex: 1;
    max-width: 400px;
}

label {
    display: inline-block;
    margin: 5px 0;
}

input, select, button {
    width: 100%;
    margin-bottom: 10px;
}

@media screen and (max-width: 768px) {
    .header-section {
        flex-direction: column;
        align-items: center;
    }

    h1, .input-section, .food-section {
        flex: none;
        text-align: center;
        max-width: 100%;
    }
}

.container {
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
    background: linear-gradient(135deg, #ffffff, #f7d1d0);
    border-radius: 15px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
}

.form-section {
    margin-bottom: 30px;
}

label {
    display: block;
    margin: 10px 0 5px;
    color: #6c373d;
    font-weight: bold;
    font-size: 1rem;
}

input, select, button {
    width: 90%;
    padding: 10px 15px;
    margin-bottom: 15px;
    border: 1px solid #e5baba;
    border-radius: 8px;
    font-size: 15px;
    transition: all 0.3s ease;
    background-color: #fff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

/* Hover and Focus States */
input:hover, button:hover {
    transform: scale(1.02);
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

input:focus, select:focus {
    outline: none;
    border: 2px solid #f77a8a; /* Highlight on focus */
}

button {
    background: linear-gradient(to right, #a85c68, #f77a8a);
    color: white;
    border: none;
    border-radius: 25px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

button:hover {
    background: linear-gradient(to right, #f77a8a, #a85c68);
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

#results, #foodList {
    background-color: #fce8e6;
    padding: 15px;
    border: 1px solid #e5baba;
    border-radius: 10px;
    margin-top: 15px;
    font-size: 1rem;
}

#results p, #foodList li {
    margin: 5px 0;
}

#totalCalories {
    font-weight: bold;
    color: #a85c68;
}

.form-group {
    margin-bottom: 20px;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.form-group h2 {
    margin-top: 0;
    font-size: 1.5rem;
    color: #a85c68;
}

select optgroup {
    font-weight: bold;
    font-size: 1rem;
    color: #4c1c24;
}

select option {
    font-size: 0.9rem;
    color: #333;
}

/* Progress Bar for Results */
#calorieProgressBar {
    height: 100%;
    background: linear-gradient(to right, #f77a8a, #a85c68);
    width: 0%;
    transition: width 0.5s;
}

/* footer */
.footer {
    background-color: #f5cec8;
    color: #842029;
    padding: 20px 0;
    font-size: 14px;
    margin-top:60px;
}

.footer-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin: 0 auto;
    max-width: 1200px;
    padding: 0 20px;
}

.footer-section {
    flex: 1;
    margin: 10px;
    min-width: 250px;
}

.footer-section h2 {
    font-size: 18px;
    margin-bottom: 15px;
    color: #842029;
}

.footer-section ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #842029;
    text-decoration: none;
}

.footer-section ul li a:hover {
    text-decoration: underline;
}

.footer-bottom {
    text-align: center;
    padding: 10px 20px;
    background-color: #842029;
    color: #e3f2fd;
    font-size: 12px;
}
</style>
</head>
<body>
    <form method="POST" action="">
    <div class="container">
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="gambar/logo.jpg" alt="Logo" style="width: 120px; border-radius: 50%; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
    </div>

       
        <h1>Calorie Calculator</h1>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="25">
            
            <label for="weight">Weight (kg):</label>
            <div style="display: flex; align-items: center;">
            <img src="gambar/weight.jpg" alt="Weight Icon" style="width: 25px; margin-right: 10px;">
            <input type="number" id="weight" name="weight" value="70"></div>

            <label for="height">Height (cm):</label>
            <input type="number" id="height" name="height" value="170">

            <label for="activity_level">Activity Level:</label>
            <select id="activity_level" name="activity_level">
                <option value="1.2">Sedentary</option>
                <option value="1.375">Lightly Active</option>
                <option value="1.55">Moderately Active</option>
                <option value="1.725">Very Active</option>
            </select>

    <!-- Food, Beverages, Desserts Input Form -->
     <!-- Food Selection -->
            <label for="food">Food:</label>
            <select id="food" name="food_calories">
                <option value="250">Rice (1 cup) - 250 cal</option>
                <option value="350">Chicken Breast (1 piece) - 350 cal</option>
                <option value="500">Burger (1 piece) - 500 cal</option>
                <option value="400">Pizza Slice - 400 cal</option>
                <option value="800">Steak (300g) - 800 cal</option>
                <option value="900">Fried Chicken (2 pieces) - 900 cal</option>
                <option value="1200">Lasagna (1 serving) - 1200 cal</option>
                <option value="1000">Spaghetti Carbonara (1 plate) - 1000 cal</option>
                <option value="1100">Chicken Alfredo Pasta (1 plate) - 1100 cal</option>
                <option value="950">Cheesy Nachos (1 plate) - 950 cal</option>
            </select>
        

        <!-- Beverage Selection -->
            <label for="beverages">Beverages:</label>
            <select id="beverages" name="beverage_calories">
                <option value="150">Orange Juice (1 glass) - 150 cal</option>
                <option value="200">Milkshake (1 glass) - 200 cal</option>
                <option value="250">Soft Drink (1 can) - 250 cal</option>
                <option value="450">Iced Mocha Latte (Large) - 450 cal</option>
                <option value="600">Thick Chocolate Milkshake - 600 cal</option>
                <option value="500">Frappuccino (Large) - 500 cal</option>
                <option value="400">Energy Drink (1 can) - 400 cal</option>
                <option value="700">Bubble Tea with Toppings (Large) - 700 cal</option>
            </select>
        <!-- Dessert Selection -->
        
            <label for="desserts">Desserts:</label>
            <select id="desserts" name="dessert_calories">
                <option value="300">Ice Cream (1 scoop) - 300 cal</option>
                <option value="400">Chocolate Cake (1 slice) - 400 cal</option>
                <option value="500">Cheesecake (1 slice) - 500 cal</option>
                <option value="700">Pecan Pie (1 slice) - 700 cal</option>
                <option value="800">Brownie with Ice Cream - 800 cal</option>
                <option value="1000">Chocolate Fondue with Fruits - 1000 cal</option>
                <option value="1200">Tiramisu (1 serving) - 1200 cal</option>
                <option value="1100">Milkshake with Cookies - 1100 cal</option>
                <option value="900">Donuts (2 pieces) - 900 cal</option>
            </select>

       <div class="image-section">
          <img src="gambar/calories.jpg" alt="Healthy Food" style="max-width: 50%; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
          <br><br>
            <center>
            <button type="button" onclick="calculateAll()">Calculate</button></center>

    <!-- Results Section -->
    <div id="results" style="text-align: center; margin-top: 20px;">
        <h3>Your Calorie Breakdown</h3>
        <div id="calorieFeedback"></div>
        <div style="margin: 20px 0;">
            <strong>Calories from Food:</strong> <span id="foodCalories">0</span> cal<br>
            <strong>Calories from Beverages:</strong> <span id="beverageCalories">0</span> cal<br>
            <strong>Calories from Desserts:</strong> <span id="dessertCalories">0</span> cal<br>
            <strong>Total Calories:</strong> <span id="totalCalories">0 kcal</span>
        </div>
        <div style="width: 100%; background: #f0f0f0; height: 20px; border-radius: 10px; overflow: hidden;">
            <div id="calorieProgressBar" style="height: 100%; background: #a85c68; width: 0%; transition: width 0.5s;"></div>
        </div>
        <p id="calorieMessage" style="margin-top: 10px; font-weight: bold;"></p>
    </div>

    <!-- Total Calories Submission -->
    <div class="form-group" style="text-align: center; margin-top: 20px;">
        <h2>Total Calories</h2>
        <div id="totalCaloriesDisplay"></div>
        <center>
            <button type="submit" name="submit">Submit</button>
        </center>
        <center>
    <button>
        <a href="index.php" style="text-decoration: none; color: inherit;">Return to Main Page</a>
    </button>
</center>



    </div>
</div>


<script>
    function calculateAll() {
        // Ambil nilai dari input
        const age = parseInt(document.getElementById('age').value) || 0;
        const weight = parseInt(document.getElementById('weight').value) || 0;
        const height = parseInt(document.getElementById('height').value) || 0;
        const activityLevel = parseFloat(document.getElementById('activity_level').value) || 1;

        const foodCalories = parseInt(document.getElementById('food').value) || 0;
        const beverageCalories = parseInt(document.getElementById('beverages').value) || 0;
        const dessertCalories = parseInt(document.getElementById('desserts').value) || 0;

        // Kira BMI, BMR, TDEE
        const bmi = (weight / Math.pow(height / 100, 2)).toFixed(1);
        const bmr = (10 * weight) + (6.25 * height) - (5 * age) + 5;
        const tdee = (bmr * activityLevel).toFixed(0);

        // Jumlah kalori
        const totalCalories = foodCalories + beverageCalories + dessertCalories;

        // Paparkan hasil
        document.getElementById("foodCalories").innerText = foodCalories;
        document.getElementById("beverageCalories").innerText = beverageCalories;
        document.getElementById("dessertCalories").innerText = dessertCalories;
        document.getElementById("totalCalories").innerText = `${totalCalories} kcal`;

        // Kemas kini progress bar
        const progressPercent = Math.min((totalCalories / tdee) * 100, 100).toFixed(1);
        document.getElementById("calorieProgressBar").style.width = `${progressPercent}%`;

        // Paparkan mesej
        displayMessage(totalCalories, tdee, bmi);
    }

    function displayMessage(totalCalories, tdee, bmi) {
        const message = document.getElementById("calorieMessage");
        if (totalCalories < tdee) {
            message.innerText = `🎉 Green Badge: You're within your calorie goal! Your BMI is ${bmi}.`;
            message.style.color = "green";
        } else if (totalCalories === parseInt(tdee)) {
            message.innerText = `⚠️ Yellow Badge: You've hit your calorie goal! Your BMI is ${bmi}.`;
            message.style.color = "orange";
        } else {
            message.innerText = `🚨 Red Badge: Watch out! You've exceeded your limit. Your BMI is ${bmi}.`;
            message.style.color = "red";
        }
    }
</script>

</form>
</div>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h2>About Us</h2>
            <p>Portal Laman Kesihatan Kolej Vokasional Sepang aims to provide students with essential health information and tools for well-being.</p>
        </div>
        <div class="footer-section">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="#">BMI Calculator</a></li>
                <li><a href="#">Calorie Tracker</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h2>Contact</h2>
            <ul>
                <li>Email: healthportal@kvsepang.edu.my</li>
                <li>Phone: +60 123-456-7890</li>
                <li>Address: KV Sepang, Malaysia</li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2024 Portal Laman Kesihatan Kolej Vokasional Sepang. All rights reserved.
    </div>
</footer>
</body>
</html>