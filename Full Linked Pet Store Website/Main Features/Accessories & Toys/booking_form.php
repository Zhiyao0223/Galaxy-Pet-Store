<?php
    include("../../conn.php");
    $sql = "INSERT INTO booking (userID, name, contact_number, email_address, services, animals, breed, booking_date, booking_time)
    VALUES 
    ('$_POST[userID]' ,'$_POST[name]', '$_POST[phone_num]', '$_POST[email_address]', '$_POST[services]', '$_POST[animals]', '$_POST[breed]', '$_POST[booking_date]', '$_POST[booking_time]')";

    if(!mysqli_query($con,$sql)) {
        die('Error: '. mysqli_error($con));
        }
        else {
            print '<script>alert("booking confirmed!");
            window.location = "grooming.php";
            </script>';
            }
mysqli_close($con);
?>