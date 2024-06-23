<?php
include ("../../../conn.php");

//$_GET[‘id’] — Get the integer value from id parameter in URL. 
//intval() will returns the integer value of a variable
$accessoriesID = intval($_GET['accessoriesID']);

$result = mysqli_query($con, "DELETE FROM accessories_toys WHERE accessoriesID = $accessoriesID");

//close database connection
mysqli_close($con);

//redirect the page to view.php page
header('Location: ../admin.php');