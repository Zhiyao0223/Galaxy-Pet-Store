<?php
session_start();
include ("../../conn.php");
$error = "<p style='color:red; font-weight:bold; margin-top: 1rem; margin-bottom: 1rem'>
                Invalid Username / Password
              </p>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Username and password sent from Form
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT username, roles FROM user WHERE username = '$username' and password = '$password'";

    if ($result = mysqli_query($con, $sql)) {
        // Return the number of rows in result set.
        $rowCount = mysqli_num_rows($result);
    }

    if ($rowCount == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION["mySession"] = $username;
        if ($row['roles'] == "admin") {
            header("location: ../admin/admin.php");
        } else {
            header("location: ../../index.php");
        }
    } else {
        $_SESSION["error"] = $error;
        header("location: Login_inter.php");
    }
} else {
    echo "rip lor";
}
mysqli_close($con);
?>