<html>
<head>
    <title>Add Record Mental Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9e6e1; /* Rose gold */
            margin: 0;
            padding: 0;
        }

        #header {
            width: 100%;
            height: 60px;
            background-color: #8b3a3a; /* Maroon */
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow for header */
        }

        fieldset {
            background-color: white; /* White */
            border: 2px solid #8b3a3a; /* Maroon border */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
            width: 50%;
            margin: auto;
        }

        table {
            margin: 0 auto;
            color: #8b3a3a; /* Maroon */
        }

        table td {
            padding: 10px;
            font-weight: bold;
        }

        table td input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fdf2f0; /* Light rose gold */
            color: #333; /* Dark text for contrast */
        }

        input[type="submit"] {
            background-color: #8b3a3a; /* Maroon */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #6a2929; /* Darker maroon */
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #8b3a3a; /* Maroon */
            font-weight: bold;
        }

        a:hover {
            color: #6a2929; /* Darker maroon */
        }
    </style>
</head>
<body>
    <div id="header">Mental Test Students Records</div>
    <?php
    include_once("config.php");

    if (isset($_POST['Submit'])) {
        $id = $_POST['id'];
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $total_score = $_POST['total_score'];
        $need_counseling = $_POST['need_counseling'];
        $response_date = $_POST['response_date'];

        $result = mysqli_query($mysqli, "INSERT INTO responses (id, user_id, name, email, total_score, need_counseling, response_date) VALUES ('$id', '$user_id', '$name', '$email', '$total_score', '$need_counseling', '$response_date')");

        echo "<script>alert('Succesfully Add New Records!'); window.location='rekodtest.php';</script>";
    } else {
    ?>

    <center><br><br>
        <fieldset>
            <legend><h2 style="color:#8b3a3a;">Add New Students Records</h2></legend>
            <form action="tambahmental.php" method="post" name="form1">
                <table width="100%">
                    <tr>
                            <td>ID</td>
                            <td><input type="text" name="id"></td>
                        </tr>
                        <tr>
                            <td>USER ID</td>
                            <td><input type="text" name="user_id"></td>
                        </tr>
                        <tr>
                            <td>NAME</td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td>EMAIL</td>
                            <td><input type="text" name="email"></td>
                        </tr>
                        <tr>
                            <td>TOTAL_SCORE</td>
                            <td><input type="text" name="total_score"></td>
                        </tr>
                        <tr>
                            <td>NEED_COUNSELING</td>
                            <td><input type="text" name="need_counseling"></td>
                        </tr>
                        <tr>
                            <td>RESPONSE_DATE</td>
                            <td><input type="text" name="response_date"></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="submit" name="Submit" value="Tambah Rekod"></td>
                        </tr>
                    </table>
                </form>
            <br><a href="rekodtest.php">Return</a>
        </fieldset>
    </center>
    <?php
    }
    ?>
</body>
</html>
