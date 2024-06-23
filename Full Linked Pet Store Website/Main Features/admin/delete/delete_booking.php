<?php
include ("../../../conn.php");
//$_GET[‘id’] — Get the integer value from id parameter in URL. 
//intval() will returns the integer value of a variable
$bookingID = intval($_GET['bookingID']);


$result = mysqli_query($con, "DELETE FROM booking WHERE bookingID = $bookingID");
mysqli_close($con);
header('Location: ../admin.php');