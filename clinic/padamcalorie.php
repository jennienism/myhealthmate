<?php
include('config.php');
$id=$_GET['id'];
$result=mysqli_query($mysqli, "DELETE FROM calories WHERE id='$id'");

echo "<script>alert('Delete Record Succesfull!');
"."window.location='rekodcalorie.php'</script>";

?>