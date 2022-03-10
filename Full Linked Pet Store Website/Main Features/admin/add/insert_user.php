<?php
    if (isset($_POST['submit'])) {
        include("../../../conn.php");

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email_address']);
        $role = $_POST['roles'];

        $sql = "INSERT INTO user (username, password, email_address, roles)
        VALUES
        ('$username', '$password', '$email', '$role')";

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