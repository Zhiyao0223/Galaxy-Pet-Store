<?php
    if (isset($_POST['submit'])) {
        include("../../../conn.php");

        $name = trim($_POST['Food_Name']);
        $price = trim($_POST['Price']);
        $image = trim($_POST['image']);

        $sql = "INSERT INTO pet_food (Food_Name, Price, image)
        VALUES
        ('$name', '$price', '$image')";

        if(!mysqli_query($con,$sql)) {
            die('Error: '. mysqli_error($con));
        }
        else {
            print '<script>alert("1 record added!");
            window.location.href = "../admin.php";
            </script>';
            }
        my_sqli_close($con);
    }
?>