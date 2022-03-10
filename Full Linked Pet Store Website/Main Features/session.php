<?php 
    if (!isset($_SESSION["mySession"])) {
        session_start();
        $error =    "<script>
                        alert('Please login to proceed.');
                    </script>";
        $_SESSION["error"] = $error;
        header("location: ../Login/Login_inter.php");
    }
?>