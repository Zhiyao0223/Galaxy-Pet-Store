<?php
    $con = mysqli_connect("localhost","root","","galaxy_pet_store");

    // Prompt Error if database could not connect
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL" .mysqli_connect_error();
    }
?>
