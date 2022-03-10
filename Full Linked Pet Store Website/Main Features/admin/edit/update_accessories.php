
<?php 
    include('../../../conn.php');

    $sql = "UPDATE accessories_toys SET 
    
    accessories_name ='".$_POST['name']."',
    accessories_price =".$_POST['price'].",
    accessories_image ='".$_POST['image']."',
    type ='".$_POST['type']."'

    WHERE accessoriesID =".$_POST['accessoriesID'];

    if(mysqli_query($con, $sql)){
        mysqli_close($con);
        header('Location: ../admin.php');
    }
?>