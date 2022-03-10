<?php
    include("../../conn.php");
    
    // Get userID
    session_start();
    $username = $_SESSION["mySession"];
    $sql_id = "SELECT * FROM user WHERE username = '$username'";
    $result_id = mysqli_query($con, $sql_id);
    $array = mysqli_fetch_array($result_id);
    $userID = $array['userID'];
    
    // Checkout Button Click
    if (isset($_POST['confirmButton'])) {
        // To check if is pet payment
        if (isset($_POST['itemType'])) {
            $type = $_POST['itemType'];
            $petID = $_POST['petID'];

            // Insert into purchaseOrder
            $sql_order =    "INSERT INTO purchaseorder(userID, petID, quantity) 
                            VALUES($userID, $petID, '1')";
            $result_insert = mysqli_query($con, $sql_order);

            $sql_update = "UPDATE pet
                            SET available_status = '0' 
                            WHERE petID = '$petID'";
            $result_update = mysqli_query($con, $sql_update);

        }
        else {
            //echo "<script>alert('a')</script>";
            $cartArray = $_POST['cartID'];

            // Take cart Info
            for ($i = 0; $i < sizeof($cartArray); $i++) {
                $cartID = $cartArray[$i];
                // Insert into purchaseOrder
                $sql_order =    "INSERT INTO purchaseorder(userID, foodID, accessoriesID, quantity) 
                                SELECT userID, foodID, accessoriesID, quantity FROM cart WHERE cartID = '$cartID'";
                $result_insert = mysqli_query($con, $sql_order);

                $sql_delete = "DELETE FROM cart WHERE userID = '$userID' AND cartID = '$cartID'";
                $result_delete = mysqli_query($con, $sql_delete);
            }
        }

        $sql = "INSERT INTO payment (full_name, email_address, address, city, state, zipcode, name_on_card, credit_card_number, exp_date, cvv)
        VALUES 
        ('$_POST[fname]', '$_POST[email_address]', '$_POST[address]', '$_POST[city]', '$_POST[state]', '$_POST[zip]', '$_POST[cname]', '$_POST[cardnumber]', '$_POST[expmonth]', '$_POST[cvv]')";

        if(!mysqli_query($con,$sql)) {
            die('Error: '. mysqli_error($con));
            }
        else {
            print ' <script> alert("Payment Confirmed! ");
                            alert("Please check for your purchase at \"My Orders\"");
                            window.location.href = "../../index.php";
                    </script>';
        }
    }
    else {
        echo "<script>alert('Congratulations ! You found an Easter Egg.</script>";
    }
    mysqli_close($con);
?>
