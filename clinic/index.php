<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Main Page</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #333;
            scroll-behavior: smooth; /* Smooth scrolling */
        }

        .container {
            width: 90%;
            margin: 0 auto;
            max-width: 1200px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Navbar */
        .header {
            background-color: #842029;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .header .logo {
            display: flex;
            align-items: center;
        }

        .header .logo img {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .header .logo h1 {
            font-size: 20px;
            margin: 0;
            font-weight: bold;
            font-family: alta;
        }

        .header .menu ul {
            list-style: none;
            padding: 0;
            display: flex;
            margin: 0;
        }

        .header .menu ul li {
            margin: 0 15px;
            position: relative;
            font-family: sans-serif;
        }

        .header .menu ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s, transform 0.3s;
            padding: 10px 15px;
            display: inline-block;
        }

        .header .menu ul li a:hover {
            color: #fcebe8;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            transform: scale(1.1); /* Slight scaling effect */
        }

        .header .menu ul li ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #b50b37;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            z-index: 10;
        }

        .header .menu ul li ul li {
            margin: 0;
        }

        .header .menu ul li ul li a {
            padding: 10px 20px;
            display: block;
        }

        .header .menu ul li:hover ul {
            display: block;
        }

        /* Hero Section with Slideshow */
        .hero {
            position: relative;
            overflow: hidden;
            max-width: 100%;
        }

        .hero .mySlides {
            display: none;
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .hero .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border-radius: 5px;
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .hero .btn:hover {
            background-color: #0056b3;
        }

        /*text*/

        .text{
            margin:90px;
            font-family: alta;
            text-align: center;
        }

        .text h2{
            font-size: 40px;
        }

        .text .we{
            font-size: 20px;
        }

        .text .mini{
            font-size: 10px;
        }

        /*Row*/

.icon-row {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 30px; /* Space between items */
  padding: 20px;
  background-color: #f9f9f9; /* Adjust background as needed */
}

.icon-item {
  font-size: 16px;
  font-weight: bold;
  color: #333; /* Adjust text color */
  text-align: center;
  transition: color 0.3s ease; /* Optional hover effect */
}

.icon-item:hover {
  color: #ff3d00; /* Change color on hover */
}



        /* Info Section */
        .info-semasa {
            background-color: #f4d3e6;
            color: white;
            border-radius: 15px;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 10px auto;
            width: 90%;
        }

        .info-semasa marquee {
            font-size: 18px;
            font-weight: 600;
            color: #890139;
        }

        .info-semasa a {
            color: #ffeb3b;
            text-decoration: underline;
            transition: color 0.3s;
        }

        .info-semasa a:hover {
            color: #fff;
        }

        /* Features Section */
        .features-section {
            margin-top: 50px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            justify-content: center;
        }

        .feature {
            background-color: #f5cec8;
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.2);
        }

        .feature h4 {
            margin: 15px 0 10px;
            font-size: 20px;
            color: #842029;
            font-weight: 700;
        }

        .feature p {
            font-size: 15px;
            color: #4b2c2d;
            font-weight: 400;
        }

        .feature .feature-image {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .feature .feature-image:hover {
            transform: scale(1.05);
        }

        /* Features Section */
        .features-section {
            margin-top: 50px;
            padding: 50px 20px;
            text-align: center;
            background-color: #f0f0f0;
        }

        .features-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 30px;
        }

        .feature-box {
            background-color: #fff;
            width: 280px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s ease;
        }

        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        .feature-box img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .feature-box:hover img {
            transform: scale(1.1);
        }

        .feature-box h3 {
            margin: 20px 0;
            font-size: 22px;
            color: #333;
        }

        .feature-box p {
            font-size: 16px;
            color: #666;
            padding: 0 20px 20px;
        }

        .feature-box .btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            margin: 20px 0;
            transition: background-color 0.3s;
        }

        .feature-box .btn:hover {
            background-color: #0056b3;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .feature-box {
            animation: fadeInUp 1s ease-out;
        }

        /* Testimonials Section */
        .testimonials-section {
            background-color: white;
            padding: 50px 20px;
            text-align: center;
        }

        .testimonial {
            margin: 20px auto;
            max-width: 800px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-out;
        }

        .testimonial p {
            font-size: 16px;
            color: #555;
        }

        .testimonial h3 {
            font-size: 18px;
            color: #007bff;
            margin-bottom: 10px;
        }

        /* Floating Social Media Icons */
        .social-media {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            z-index: 100;
        }

        .social-media a {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 50%;
            text-align: center;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .social-media a:hover {
            background-color: #0056b3;
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background: #842029;
            color: #fff;
        }


/*chart*/
.chart-section {
    width: 80%;
    margin: 0 auto;
    text-align: center;
}

.chart-section h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

#studentChart {
    width: 100%;
    height: 400px;
}


.misi{
    text-align: center;
    font-family: alta;
    font-size: 30px;
    padding: 50px;
    margin-top: 200px;
    margin-bottom: 200px;
}

        /* footer */
        .footer {
            background: linear-gradient(135deg, #f5cec8, #842029);
            color: #fff;
            padding: 40px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-section {
            flex: 1;
            margin: 10px;
            min-width: 250px;
        }

        .footer-section h2 {
            font-size: 18px;
            margin-bottom: 15px;
            
        }

        .footer-section p {
            line-height: 1.6;
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
            color: #f5cec8;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #842029;
            background-color: #f5cec8;
            padding: 2px 5px;
            border-radius: 4px;
        }

        .footer-section ul li i {
            margin-right: 8px;
            color: #f5cec8;
        }

        .social {
            display: inline-block;
            margin: 0 10px;
            color: #f5cec8;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .social:hover {
            color: #842029;
        }

        .footer-bottom {
            text-align: center;
            padding: 10px 20px;
            background-color: #842029;
            color: #e3f2fd;
            font-size: 12px;
            margin-top: 20px;
        }

        .back-to-top {
            text-align: center;
            margin-top: 20px;
        }

        .back-to-top a {
            color: #f5cec8;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .back-to-top a:hover {
            color: #842029;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .footer-content {
                flex-direction: column;
                align-items: center;
            }

            .footer-section {
                text-align: center;
                margin: 20px 0;
            }
            
    </style>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Header Section (Navbar) -->
    <header class="header">
        <div class="logo">
            <img src="gambar/logo1.png" alt="MyHealthMate Logo">
            <h1>MyHealthMate Portal</h1>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="teamlead.html">Team Lead</a></li>
                <li><a href="info.html">Information</a></li>
                <li><a href="loginadmin.php">Admin Page</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Announcement Section -->
    <section class="info-semasa">
        <marquee>Welcome to MyHealthMate — Your one-stop platform for health tracking, BMI checking, calorie counting, and emotional wellness. Let's build a healthier future together!</marquee>
    </section>

    <!-- Hero Section with Slideshow -->
    <section class="hero">
        <img class="mySlides" src="gambar/banner4.png" alt="Slide 1">
        <img class="mySlides" src="gambar/banner2.png" alt="Slide 2">
        <img class="mySlides" src="gambar/banner5.png" alt="Slide 3">
    </section>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) { myIndex = 1 }    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }
    </script>

    <!-- Row of Motivational Words -->
    <div class="icon-row">
        <div class="icon-item">Stay</div>
        <div class="icon-item">Healthy</div>
        <div class="icon-item">Stay</div>
        <div class="icon-item">Strong</div>
        <div class="icon-item">With Us</div>
    </div>

    <!-- What We Do Section -->
    <section class="text">
        <h2>WHAT DO WE DO</h2>
        <p class="we">We support your physical fitness, emotional strength, and lifestyle balance — because your health matters.</p>
        <br>
        <p class="mini">@myhealthmate</p>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="features-container">
            <!-- Feature 1 -->
            <div class="feature-box">
                <img src="gambar/bmi.png" alt="BMI Feature">
                <h3>BMI & Calorie Tracker</h3>
                <p>Calculate your Body Mass Index (BMI) and monitor your daily calorie intake easily to achieve your goals.</p>
                <a href="calories.php" class="btn">Start Tracking</a>
            </div>

            <!-- Feature 2 -->
            <div class="feature-box">
                <img src="gambar/blog.png" alt="Submit Thoughts">
                <h3>Share Your Thoughts</h3>
                <p>Express your emotions, feelings, or stress — we care about your mental well-being.</p>
                <a href="lettermental.php" class="btn">Share Now</a>
            </div>

            <!-- Feature 3 -->
            <div class="feature-box">
                <img src="gambar/mental.png" alt="Mental Test">
                <h3>Mental Wellness Test</h3>
                <p>Answer quick questions to understand your emotional state and seek help if needed.</p>
                <a href="mental.php" class="btn">Take the Test</a>
            </div>           
        </div>
    </section>

    <p class="misi">"Together, we make health and happiness our mission."</p>
    

    <!-- Chart Section -->
    <section class="chart-section">
        <h2>Student Health & Wellness Statistics</h2>
        <canvas id="studentChart"></canvas>
    </section>

    <script>
    const ctx = document.getElementById('studentChart').getContext('2d');
    const studentChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['2018', '2019', '2020', '2021', '2022', '2023'],
            datasets: [{
                label: 'Students Facing Health Challenges',
                data: [12, 47, 117, 105, 36, 15],
                backgroundColor: [
                    'rgba(127, 29, 29, 0.7)',
                    'rgba(176, 58, 91, 0.7)',
                    'rgba(217, 83, 79, 0.7)',
                    'rgba(255, 133, 102, 0.7)',
                    'rgba(246, 194, 62, 0.7)',
                    'rgba(72, 201, 176, 0.7)'
                ],
                borderColor: [
                    'rgba(127, 29, 29, 1)',
                    'rgba(176, 58, 91, 1)',
                    'rgba(217, 83, 79, 1)',
                    'rgba(255, 133, 102, 1)',
                    'rgba(246, 194, 62, 1)',
                    'rgba(72, 201, 176, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <h2>What Our Students Say</h2>
        <div class="testimonial">
            <h3>Ali Ahmad</h3>
            <p>"MyHealthMate helps me track my calories and stay positive. Thank you for creating this!"</p>
        </div>
        <div class="testimonial">
            <h3>Nur Aisyah</h3>
            <p>"The mental test feature made me realize the importance of taking breaks and managing stress."</p>
        </div>
    </section>

    <br><br>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-content">
            <!-- About Us Section -->
            <div class="footer-section">
                <h2>About Us</h2>
                <p>MyHealthMate is dedicated to helping students achieve better health and emotional balance for a brighter future.</p>
            </div>
            <!-- Quick Links Section -->
            <div class="footer-section">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="calories.php">BMI Calculator</a></li>
                    <li><a href="calories.php">Calorie Tracker</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            <!-- Contact Section -->
            <div class="footer-section">
                <h2>Contact</h2>
                <ul>
                    <li><i class="fas fa-envelope"></i> Email: support@myhealthmate.com</li>
                    <li><i class="fas fa-phone"></i> Phone: +60 123-456-7890</li>
                    <li><i class="fas fa-map-marker-alt"></i> Address: KV Sepang, Malaysia</li>
                </ul>
            </div>
            <!-- Social Media Section -->
            <div class="footer-section">
                <h2>Follow Us</h2>
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <!-- Back to Top -->
        <div class="back-to-top">
            <a href="#">↑ Back to Top</a>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            &copy; 2024 MyHealthMate. All rights reserved.
        </div>
    </footer>

</body>
</html>
