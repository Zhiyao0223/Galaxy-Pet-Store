<?php
    include("../../../conn.php");
    //$_GET[‘id’] — Get the integer value from id parameter in URL. 
    //intval() will returns the integer value of a variable
    $accessoriesID = intval($_GET['accessoriesID']);

    $result = mysqli_query($con, "DELETE FROM accessories_toys WHERE accessoriesID = $accessoriesID");
    mysqli_close($con); //close database connection
    header('Location: ../admin.php') //redirect the page to view.php page

?>