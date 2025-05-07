<?php
include('config.php');

// Menarik semua rekod dari table form
$result = mysqli_query($mysqli, "SELECT * FROM form");
?>

<html>
<head>
    <title>Rekod Pelajar ke Klinik</title>
    <style>
        /* Reset and general styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #fdf8f6; /* Soft rose gold */
            font-family: Arial, sans-serif;
            color: #4a1a1a; /* Dark maroon */
        }

        /* Header styles */
        .header {
            background-color: #7f1d1d; /* Maroon */
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 5px 5px 0 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 5px;
        }
        .header p {
            font-size: 1.1rem;
        }

        /* Table styles */
        table {
            margin: 30px auto;
            border-collapse: collapse;
            width: 90%;
            background-color: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #7f1d1d; /* Maroon */
            color: white;
            font-weight: bold;
        }
        td {
            color: #4a1a1a; /* Dark maroon */
        }
        td:hover {
            background-color: #f8e8e8; /* Light rose gold */
        }
        tr:nth-child(even) {
            background-color: #fdf3f1; /* Softer rose gold */
        }
        tr:hover {
            background-color: #fde4e2; /* Slightly darker rose gold */
        }
        a {
            text-decoration: none;
            color: #7f1d1d; /* Maroon */
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
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
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header">
        <h1>Student To Clinic Record</h1>
        <p>Student Health Record System</p>
    </div>

    <!-- Table Section -->
    <h2 style="text-align: center; margin-top: 20px; color: #7f1d1d;">Senarai Rekod Pelajar</h2>
    <table>
        <tr>
            <th>ID Pelajar</th>
            <th>Nama Pelajar</th>
            <th>Kelas</th>
            <th>Sebab Ke Klinik</th>
            <th>Tarikh</th>
            <th>Catatan</th>
            <th>Tindakan</th>
        </tr>

        <?php
        $papar = mysqli_query($mysqli, "SELECT * FROM form");
        while ($row = mysqli_fetch_array($papar)) {
            echo "<tr>";
            echo "<td>".$row['id_pelajar']."</td>";
            echo "<td>".$row['nama_pelajar']."</td>";
            echo "<td>".$row['kelas']."</td>";
            echo "<td>".$row['sebab']."</td>";
            echo "<td>".$row['tarikh']."</td>";
            echo "<td>".$row['catatan']."</td>";
            echo "<td><a href=\"padamclinic.php?id_pelajar=".$row['id_pelajar']."\" onclick=\"return confirm('Rekod ini akan dihapuskan')\">Padam</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Buttons -->
    <center>
        <a href="tambahclinic.php"><button>&#43; Add Record</button></a>
        <a href="admainpage.html"><button>Return To Main Page</button></a>
    </center>

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
