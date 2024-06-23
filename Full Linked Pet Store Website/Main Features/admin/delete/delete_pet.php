<?php
include ("../../../conn.php");
//$_GET[‘id’] — Get the integer value from id parameter in URL. 
//intval() will returns the integer value of a variable
$petID = intval($_GET['petID']);


$result = mysqli_query($con, "DELETE FROM pet WHERE petID = $petID");
mysqli_close($con); //close database connection
header('Location: ../admin.php');
