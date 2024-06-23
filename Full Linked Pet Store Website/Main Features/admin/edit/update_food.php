<?php
include ('../../../conn.php');

$name = trim($_POST['food_name']);
$price = trim($_POST['price']);
$image = trim($_POST['image']);

$sql = "UPDATE pet_food 
            SET 
                Food_Name ='$name',
                price ='$price',
                image ='$image'
            WHERE foodID =" . $_POST['foodID'];

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: ../admin.php');
}