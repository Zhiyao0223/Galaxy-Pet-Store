<?php
    session_start();
    if (isset($_SESSION["mySession"])) {
        header("location: ../../index.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">            
    <script src='login.js'></script>
</head>
<body>
    <header class="header">
        <a href="../../index.php" class="logo" href='#'> 
        <i class="fas fa-dog"></i> 
        Galaxy Pet Store </a>
    
        <nav class="navbar">
            <a href="../../index.php">Home</a>
            <a href="../Pet/pets.php">Buy a Pet</a>
            <a href="../Pet Food/index.php">Pet Food</a>
            <a href="../Accessories & Toys/accessory.php">Pet Accessories</a>
            <a href="../About Us/members_info.php">About Us</a>
        </nav>
    </header>

    <div id='forgetPassword' class='modal'>
        <div class='modalContent'>
            <a id='close' name='email' onclick='verification("close", name)'>&times</a>
            <p id='modalHeader'>Forget Password </p>
            <p>To reset your password, please provide your account email.</p>
            <div id='row'>
                <div id='column-1'>
                    <div id='modalLabel'>
                        Email 
                        <div id='asterisk'>*</div>
                    </div>
                </div>
                <div id='column-2'>
                    <div class='modalInput'>
                        <input type='email' id='email' onfocusout='emailVerify()'>
                        <br/>
                    </div>
                    <button id='modalSubmit' onclick="verification('submit')">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class ="loginbox">
        <img src= "url/hale.jpeg" class="hale">
        <h1>Login</h1>

        <form action='login.php' method="post" id='login'>
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <br>
            <input type="submit" name="submit" value="Login">
            <br>
            <a onclick="verification('open')" style='cursor: pointer;'>Forgot your password?</a><br>
            <a href="../Sign-up/Create_an_account.php">Create a new account</a>

            <?php 
                if (isset($_SESSION["error"])) {
                    $error = $_SESSION["error"];
                    echo $error;
                    unset($_SESSION["error"]);
                }
            ?>
        </form>
    </div> 
</body>
</html>