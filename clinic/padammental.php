<?php
include('config.php');
$id=$_GET['id'];
$result=mysqli_query($mysqli, "DELETE FROM mentaltest WHERE id='$id'");

echo "<script>alert('Delete Record Succesfull!');
"."window.location='rekodtest.php'</script>";

?>