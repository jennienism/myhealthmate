<html>
<head>
    <title>Add Record Submission Letter KVS</title>
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
    <div id="header">Submissions Letter New Record</div>
    <?php
    include_once("config.php");

    if (isset($_POST['Submit'])) {
        $id = $_POST['id'];
        $user_id = $_POST['user_id'];
        $message = $_POST['message'];
        $submitted_at = $_POST['submitted_at'];

        $result = mysqli_query($mysqli, "INSERT INTO submissions (id, user_id, message, submitted_at) VALUES ('$id', '$user_id','$message', '$submitted_at')");

        echo "<script>alert('Succesfully Add New Records!'); window.location='rekodletter.php';</script>";
    } else {
    ?>

    <center><br><br>
        <fieldset>
            <legend><h2 style="color:#8b3a3a;">Add Students New Record</h2></legend>
            <form action="tambahheart.php" method="post" name="form1">
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
                            <td>MESSAGE</td>
                            <td><input type="text" name="message"></td>
                        </tr>
                        <tr>
                            <td>SUBMITTED AT</td>
                            <td><input type="text" name="submitted_at"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="Submit" value="Add Record"></td>
                        </tr>
                    </table>
                </form>
            <br><a href="rekodletter.php">Return</a>
        </fieldset>
    </center>
    <?php
    }
    ?>
</body>
</html>
