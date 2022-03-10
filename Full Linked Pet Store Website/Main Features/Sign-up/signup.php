<?php 
    include("../../conn.php");

    session_start();
    $username =  mysqli_real_escape_string($con, $_POST["username"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $pass = mysqli_real_escape_string($con, $_POST["pass"]);
    $confirmPass = mysqli_real_escape_string($con, $_POST["confirmPass"]);
    $passError = "<p style='color:red; font-weight:bold;'>Different Password Detected.</p>";
    
    // Validate password
    if ($pass != $confirmPass) {
        $_SESSION["error"] = $passError;
        header("location: Create_an_account.php");
        return;
    }

    // Validate duplicate email
    $sql_email = "SELECT email_address FROM user WHERE email_address = '$email';";
    if ($result_email = mysqli_query($con, $sql_email)) {
        $rowCount = mysqli_num_rows($result_email);

        if ($rowCount == 1) {
            $duplicateEmail = "<script>alert('Email address already registered. Please login.')</script>";
            $_SESSION['error'] = $duplicateEmail; 
            header("location: Create_an_account.php");
        }
    }
    else {
        $error = "Error".mysqli_error($con);
        $_SESSION["error"] = $error;
        header("location: Create_an_account.php");
    }

    // Verify duplicate username
    $sql_username = "SELECT username FROM user WHERE username = '$username';";
    if ($result_user = mysqli_query($con, $sql_username)) {
        $rowCount = mysqli_num_rows($result_user);

        if ($rowCount == 1) {
            $duplicateUser = "<script>alert('Username is taken. Please enter another name.')</script>";
            $_SESSION['error'] = $duplicateUser;
            header("location: Create_an_account.php");
        }
    }
    else {
        $error = "<script>alert('Error: ".mysqli_error($con)."')</script>";
        $_SESSION["error"] = $error;
        header("location: Create_an_account.php");
    }

    // Insert data into database
    $sql = "INSERT INTO user(username, email_address, password, roles)
            VALUES 
            ('$username', '$email', '$pass', 'user')";

    if (!mysqli_query($con, $sql)) {
        die("Error: ".mysqli_error($con));
    }
    else {
        $_SESSION["mySession"] = $username;
        echo '<script>alert("Register Success");
        window.location.href = "../../index.php";
        </script>';
    }
    mysqli_close($con);
?>