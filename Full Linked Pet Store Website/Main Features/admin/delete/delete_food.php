<?php
    include("../../../conn.php");
    //$_GET[‘id’] — Get the integer value from id parameter in URL. 
    //intval() will returns the integer value of a variable
    $foodID = intval($_GET['foodID']);


    $result = mysqli_query($con, "DELETE FROM pet_food WHERE foodID = $foodID");
    mysqli_close($con); //close database connection
    header('Location: ../admin.php') //redirect the page to view.php page

?>