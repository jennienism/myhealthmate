<!-- membuat sambungan ke db -->
<?php
    include('config.php');
?>

<html>
<head>
    <title>Username Record KVS</title>
    <style>
        /* Reset and general styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #F9F9F9;
            color: #333;
            line-height: 1.6;
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
        }
        .header p {
            font-size: 1rem;
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

        /* Table styles */
        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #FFFFFF;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #800000;
            color: #FADCD9;
            font-weight: bold;
        }
        table tr:nth-child(even) {
            background-color: #FDE8E5;
        }
        table tr:hover {
            background-color: #FFD7D4;
        }
        table td a {
            color: #800000;
            text-decoration: none;
            font-weight: bold;
        }
        table td a:hover {
            text-decoration: underline;
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
<h1>KVS Users Records</h1>
<p>Student Data Management System</p>

    </div>

    <!-- Table Section -->
    <h2 style="text-align: center; margin-top: 20px; color: #800000;">Record List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
        </tr>
        
        <!-- Paparkan rekod daripada pangkalan data -->
        <?php
        include('config.php');
        $papar = mysqli_query($mysqli, "SELECT * FROM users");
        while ($res = mysqli_fetch_assoc($papar)) {
            echo "<tr>";
            echo "<td>".$res['id']."</td>";
            echo "<td>".$res['username']."</td>";
            echo "<td>".$res['email']."</td>";
            echo "<td>".$res['password']."</td>";
            echo "</tr>";
        }
        ?>          
    </table>

    <!-- Buttons -->
    <center>
        <a href="admainpage.html"><button>Return To Main Page</button></a>
    </center>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; 2024 Selangor Vocational College. All Rights Reserved.</p>

    </div>
</body>
</html>
