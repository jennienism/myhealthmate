<?php
include('config.php');
// Start the session
session_start();

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
        $_SESSION['user_id'] = $user_id;  // Save user_id into the session
    } else {
        echo "<script>alert('User not found.');</script>";
        exit;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id']; // Retrieve user_id from session
        $message = $mysqli->real_escape_string($_POST['message']);

        if (!empty($message)) {
            // Insert data into the submissions table
            $query = "INSERT INTO submissions (user_id, message, submitted_at) VALUES ('$user_id', '$message', NOW())";
            if ($mysqli->query($query)) {
                echo "<p class='success'>Thank you for sharing. Your message has been submitted.</p>";
                echo "<p class='trust'>Thank you for trusting us. We are here to support you.</p>";
            } else {
                echo "<p class='error'>Error: " . $mysqli->error . "</p>";
            }
        } else {
            echo "<p class='error'>Please write something before submitting.</p>";
        }
    } else {
        echo "<p class='error'>User is not logged in. Please log in first.</p>";
    }

    // Check if the query was successful
        if ($mysqli->query($sql)) {
            echo "<script>alert('Record successfully saved.'); window.location.href='lettermental.php';</script>";
        } else {
            echo "<script>alert('Failed to save user record: " . $mysqli->error . "');</script>";
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Letter Page</title>
    <link rel="stylesheet">
</head>

<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #fffaf8;
        color: #3b1e1e;
        text-align: center;
    }

    h1 {
        font-size: 2.5rem;
        color: maroon;
        margin-top: 20px;
    }

    form {
        background-color: #f9ecec;
        border: 1px solid maroon;
        border-radius: 10px;
        padding: 20px;
        width: 80%;
        max-width: 500px;
        margin: 20px auto;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    textarea {
        width: 90%;
        margin: 10px 0;
        padding: 12px;
        border: 1px solid #d4a373;
        border-radius: 8px;
        font-size: 16px;
        color: #3b1e1e;
        resize: none;
        background-color: #fff;
    }

    textarea:focus {
        outline: none;
        border-color: maroon;
        box-shadow: 0 0 5px rgba(128, 0, 0, 0.5);
    }

    button {
        padding: 10px 20px;
        background-color: maroon;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #9b3a3a;
    }

    .success, .trust {
        font-size: 1.1rem;
        margin-top: 10px;
    }

    .success {
        color: maroon;
        font-weight: bold;
    }

    .trust {
        color: #d4a373;
        font-style: italic;
    }

    .error {
        color: red;
        font-size: 1rem;
    }

    .return-button {
        margin-top: 20px;
    }

    .return-button a {
        text-decoration: none;
        padding: 10px 20px;
        background-color: #d4a373;
        color: white;
        border-radius: 8px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .return-button a:hover {
        background-color: #9b3a3a;
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

<body>
    <h1>Share Your Thoughts</h1>
    <p>"Don't hesitate to share your thoughts and concerns with us. Whether you're seeking support, advice, or simply need someone to listen,<br> we're here for you. Your well-being is important, and this is a safe space where you can express yourself freely. Your voice matters, and we're here to listen."</p>
    <form method="POST">
        <textarea name="message" rows="5" cols="40" placeholder="Write your problem here..."></textarea><br>
        <button type="submit">Submit</button>
    <div class="return-button">
        <a href="index.php">Return to Main Page</a>
    </div>
    </form>
<footer class="footer">
        <div class="footer-content">
            <!-- About Us Section -->
            <div class="footer-section">
                <h2>About Us</h2>
                <p>Portal Laman Kesihatan Kolej Vokasional Sepang aims to provide students with essential health information and tools for well-being.</p>
            </div>
            <!-- Quick Links Section -->
            <div class="footer-section">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="#">BMI Calculator</a></li>
                    <li><a href="#">Calorie Tracker</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <!-- Contact Section -->
            <div class="footer-section">
                <h2>Contact</h2>
                <ul>
                    <li><i class="fas fa-envelope"></i> Email: healthportal@kvsepang.edu.my</li>
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
            &copy; 2024 Portal Laman Kesihatan Kolej Vokasional Sepang. All rights reserved.
        </div>
    </footer>
</body>
</html>
