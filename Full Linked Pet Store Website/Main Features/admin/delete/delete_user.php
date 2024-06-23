<?php
include ("../../../conn.php");
//$_GET[‘id’] — Get the integer value from id parameter in URL. 
//intval() will returns the integer value of a variable
$userID = intval($_GET['userID']);


$result = mysqli_query($con, "DELETE FROM user WHERE userID = $userID");
mysqli_close($con); //close database connection
header('Location: ../admin.php');
