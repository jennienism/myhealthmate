<?php
include('config.php');
$id_pelajar=$_GET['id_pelajar'];
$result=mysqli_query($mysqli, "DELETE FROM form WHERE id_pelajar='$id_pelajar'");

echo "<script>alert('Delete Record Succesfull!');
"."window.location='clinic.php'</script>";

?>