<?php 
    include("../../conn.php");
    
    $cartID = intval($_GET['id']);
    echo $cartID;
    $sql = "DELETE FROM cart WHERE cartID= '$cartID'";
    $result = mysqli_query($con, $sql);
    
    mysqli_close($con);
    // Redirect back to view.php
    header('Location: cart.php');
?>