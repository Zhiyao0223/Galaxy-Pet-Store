<?php
if (isset($_POST['submit'])) {
    include ("../../../conn.php");

    $name = trim($_POST['accessories_name']);
    $price = trim($_POST['accessories_price']);
    $image = trim($_POST['accessories_image']);
    $type = trim($_POST['type']);

    $sql = "INSERT INTO accessories_toys (accessories_name, accessories_price, accessories_image, type)
        VALUES
        ('$name', '$price', '$image', '$type')";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    } else {
        print '<script>alert("1 record added!");
                window.location.href = "../admin.php";
                </script>';
    }
    mysqli_close($con);
}