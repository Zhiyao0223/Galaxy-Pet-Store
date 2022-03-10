<?php 
    include('../../../conn.php');
    
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
    $available = $_POST['available'];

    $sql = "UPDATE pet 
            SET 
                type ='$type',  
                name = '$name',
                breed ='$breed',
                price = '$price',
                age = '$age',
                colour ='$color',
                gender ='$gender',
                vaccine_status ='$vaccine',
                dewormed_status ='$dewormed',
                additional_info ='$additional',
                picture1 ='$pic1',
                picture2 ='$pic2',
                picture3 ='$pic3',
                picture4 ='$pic4',
                link = '$link',
                available_status = '$available'
            WHERE petID = '".$_POST['petID'] ."'";
    
    if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        header('Location: ../admin.php');
    }
    else {
        echo "<script>alert('Congratulation! You found a bug.')</script>";
    }
?>