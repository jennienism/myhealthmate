<?php
include('config.php');

// Menarik semua rekod dari table form
$result = mysqli_query($mysqli, "SELECT * FROM submissions");
if (!$result) {
    die("Error in query: " . mysqli_error($mysqli));
}
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

        /* Footer styles */
        .footer {
            background-color: #7f1d1d; /* Maroon */
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
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
        <h1>KVS Submissions Letter Record</h1>
        <p>Student Health Record System</p>
    </div>

    <!-- Table Section -->
    <h2 style="text-align: center; margin-top: 20px; color: #7f1d1d;">Record Heart Rate Analysis</h2>
    <table>
    <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>Message</th>
        <th>Submitted At</th>
        <th>Action</th>
    </tr>

    <?php
    while ($res = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$res['id']."</td>";
        echo "<td>".$res['user_id']."</td>";
        echo "<td>".$res['message']."</td>";
        echo "<td>".$res['submitted_at']."</td>";
        echo "<td><a href=\"padamletter.php?id=".$res['id']."\" onclick=\"return confirm('This record will be deleted')\">Padam</a></td>";
        echo "</tr>";
    }
    ?>
</table>

    <!-- Buttons -->
    <center>
        <a href="tambahletter.php"><button>&#43; Add Record</button></a>
        <a href="admainpage.html"><button>Return To Main Page</button></a>
    </center>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; 2024 Selangor Vocational College. All Rights Reserved.</p>
    </div>
</body>
</html>