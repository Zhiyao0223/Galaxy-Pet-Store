<?php
session_start();
if (isset($_SESSION["mySession"])) {
    header("location: ../../index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

    <div class="loginbox">
        <img src="url/hale.jpeg" class="hale">
        <h1>Sign Up</h1>

        <form action="signup.php" method="post">
            <p>Username <span style="color: red;">*</span></p>
            <input type="text" name="username" placeholder="Enter Username" required>
            <p>Email <span style="color: red;">*</span></p>
            <input type="email" name="email" placeholder="Enter Email" required>
            <p>Password <span style="color: red;">*</span></p>
            <input type="password" name="pass" placeholder="Enter Password" required>
            <p>Confirm Password <span style="color: red;">*</span></p>
            <input type="password" name="confirmPass" placeholder="Confirm Password" required>

            <?php
            if (isset($_SESSION["error"])) {
                $error = $_SESSION["error"];
                echo $error;
                unset($_SESSION["error"]);
            }
            ?>

            <br>
            <input type="submit" name="" value="Sign Up">
            <br>
            <a href="../Login/Login_inter.php">Click here to login instead</a><br>
            <hr>
            <b>By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy. You may receive SMS
                notifications from us and can opt out at any time.</b>


        </form>
    </div>
</body>

</html>