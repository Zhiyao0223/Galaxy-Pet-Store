<?php
    if (isset($_POST['submit'])) {
        include("../../../conn.php");

        $type = trim($_POST['type']);
        $name = trim($_POST['name']);
        $breed = trim($_POST['breed']);
        $price = trim($_POST['price']);
        $age = trim($_POST['age']);
        $color = trim($_POST['colour']);
        $gender = $_POST['gender'];
        $vaccine = $_POST['vaccine_status'];
        $dewormed = $_POST['dewormed_status'];
        $additional = trim($_POST['additional_info']);
        $pic1 = trim($_POST['picture1']);
        $pic2 = trim($_POST['picture2']);
        $pic3 = trim($_POST['picture3']);
        $pic4 = trim($_POST['picture4']);
        $link = trim($_POST['link']);

        $sql = "INSERT INTO pet (type, name, breed, price, age, colour, gender, vaccine_status, dewormed_status, additional_info, picture1, picture2, picture3, picture4, link, available_status)
        VALUES
        ('$type', '$name', '$breed', '$price', '$age', '$color', '$gender', '$vaccine', '$dewormed', '$additional', '$pic1', '$pic2', '$pic3', '$pic4', '$link', '1')";

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