<?php 
    include('../../../conn.php');

    $sql = "UPDATE user SET 
    
    username ='".$_POST['username']."',
    name ='".$_POST['name']."',
    password ='".$_POST['password']."',
    email_address ='".$_POST['email_address']."',
    contact_number =".$_POST['contact_number'].",
    gender ='".$_POST['gender']."',
    dob ='".$_POST['dob']."',
    profile_pic ='".$_POST['profile_pic']."',
    password ='".$_POST['password']."',
    roles ='".$_POST['roles']."'

    WHERE userID =".$_POST['userID'];

    echo $sql;

    /*accessories_price = $_POST['price'],
    accessories_image = $_POST['image'],
    type = $_POST['type'],*/

    /*WHERE accessoriesID = $_POST['accessoriesID'];
    ";*/

    if(mysqli_query($con, $sql)){
        mysqli_close($con);
        header('Location: ../admin.php');
    }
?>