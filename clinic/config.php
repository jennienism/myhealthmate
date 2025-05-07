<?php

$databaseHost='localhost';
$databaseUsername='root';
$databasePassword='';
$databaseName='clinic';

$mysqli=mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
