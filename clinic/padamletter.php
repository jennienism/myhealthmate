<?php
include('config.php');
$id=$_GET['id'];
$result=mysqli_query($mysqli, "DELETE FROM submissions WHERE id='$id'");

echo "<script>alert('Delete Record Succesfull!');
"."window.location='rekodletter.php'</script>";

?>