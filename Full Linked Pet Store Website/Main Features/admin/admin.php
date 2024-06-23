<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link href="admin.css?v=1" rel="stylesheet">
    <script src='admin.js?v=1'></script>

</head>

<body>
    <form action="insert.php" method="post">
        <!-- PHP Section -->
        <?php
        session_start();

        include ("../../conn.php");
        include ("../session.php");

        $username = $_SESSION['mySession'];
        $sql_user = "SELECT roles FROM user WHERE username = '$username'";
        $result_user = mysqli_query($con, $sql_user);
        $row_user = mysqli_fetch_array($result_user);

        if ($row_user['roles'] == 'user') {
            echo "<script>alert('Authorized Access Only !')
                    window.location='../../index.php'</script>";
        }
        ?>

        <!-- header section starts  -->
        <header>
            <div class="header-1">
                <a href="#" class="logo"><i class="fas fa-dog"></i>Galaxy Pet Store</a>

                <div id='logout'>
                    <a href='../Login/logout.php' id='logoutBtn'><i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </header>

        <!-- header section ends -->
        <div id='container'>
            <div id='category-box'>
                <div id='categoryDescription'>
                    Please Select a Category :
                </div>
                <div id='categoryBtn'>
                    <a value='0' onclick="toggleBox('0')">Accessories Toys</a>
                    <a value='1' onclick="toggleBox('1')">Booking</a>
                    <a value='2' onclick="toggleBox('2')">Cart</a>
                    <a value='3' onclick="toggleBox('3')">Payment</a>
                    <a value='4' onclick="toggleBox('4')">Pet</a>
                    <a value='5' onclick="toggleBox('5')">Pet Food</a>
                    <a value='6' onclick="toggleBox('6')">Purchase Order</a>
                    <a onclick="toggleBox('7')">User</a>
                </div>
            </div>

            <!-- Accessories Table -->
            <div class='category' id='accessories'>
                <div class='row'>
                    <u>
                        <h2>Accessories Toys</h2>
                    </u>
                    <a href='add/add_accessories.php' class='addBtn'>
                        Add New Record
                    </a>
                </div>
                <table>
                    <tr bgcolor="#CC99FF">
                        <th>AccessoriesID</th>
                        <th>Accessories Name</th>
                        <th>Accessories Price (RM)</th>
                        <th>Accessories Image</th>
                        <th>Type</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    <?php
                    $result = mysqli_query($con, "SELECT * FROM accessories_toys");
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr bgcolor="#99FF66">';

                        echo "<td>";
                        echo $row['accessoriesID'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['accessories_name'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['accessories_price'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['accessories_image'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['type'];
                        echo "</td>";

                        echo '<td><a href="edit/edit_accessories.php?accessoriesID=';
                        echo $row['accessoriesID'];
                        echo '"\> Edit </a></td>';

                        echo "<td><a href=\"delete/delete_accessories.php?accessoriesID=";
                        echo $row['accessoriesID'];
                        echo "\" onClick=\"return confirm('Delete ";
                        echo $row['accessories_name'];
                        echo " details?');\">Delete</a></td></tr>";
                    }
                    ?>
                </table>
            </div>

            <!-- Booking Table -->
            <div class='category' id='booking'>
                <div class='row'>
                    <u>
                        <h2>Booking</h2>
                    </u>
                </div>
                <table>
                    <tr bgcolor="#CC99FF">
                        <th>BookingID</th>
                        <th>UserID</th>
                        <th>Mame</th>
                        <th>Contact Number</th>
                        <th>Email Address</th>
                        <th>Services</th>
                        <th>Animals</th>
                        <th>Breed</th>
                        <th>Booking Date</th>
                        <th>Booking Time</th>
                        <th>Delete</th>
                    </tr>

                    <?php
                    $result = mysqli_query($con, "SELECT * FROM booking");
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr bgcolor="#99FF66">';

                        echo "<td>";
                        echo $row['bookingID'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['userID'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['name'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['contact_number'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['email_address'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['services'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['animals'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['breed'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['booking_date'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['booking_time'];
                        echo "</td>";

                        echo "<td><a href=\"delete/delete_booking.php?bookingID=";
                        echo $row['bookingID'];
                        echo "\" onClick=\"return confirm('Delete ";
                        echo "Booking " . $row['bookingID'] . "?');\">Delete</a></td></tr>";
                    }
                    ?>
                </table>
            </div>

            <!-- Cart Table -->
            <div class='category' id='cart'>
                <div class='row'>
                    <u>
                        <h2>Carts</h2>
                    </u>
                </div>
                <table>
                    <tr bgcolor="#CC99FF">
                        <th>CartID</th>
                        <th>UserID</th>
                        <th>FoodID</th>
                        <th>AccessoriesID</th>
                        <th>Quantity</th>
                    </tr>

                    <?php
                    $result = mysqli_query($con, "SELECT * FROM cart");
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr bgcolor="#99FF66">';

                        echo "<td>";
                        echo $row['cartID'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['userID'];
                        echo "</td>";

                        echo "<td>";
                        if ($row['foodID'] == NULL) {
                            echo "-";
                        } else {
                            echo $row['foodID'];
                        }
                        echo "</td>";

                        echo "<td>";
                        if ($row['accessoriesID'] == NULL) {
                            echo "-";
                        } else {
                            echo $row['accessoriesID'];
                        }
                        echo "</td>";

                        echo "<td>";
                        echo $row['quantity'];
                        echo "</td>";
                    }
                    ?>
                </table>
            </div>

            <!-- Payment Table -->
            <div class='category' id='payment'>
                <div class='row'>
                    <u>
                        <h2>Payment</h2>
                    </u>
                </div>
                <table>
                    <tr bgcolor="#CC99FF">
                        <th>PaymentID</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zipcode</th>
                        <th>Name On Card</th>
                        <th>Credit Card Number</th>
                        <th>Expiration Date</th>
                        <th>CVV</th>
                    </tr>

                    <?php
                    $result = mysqli_query($con, "SELECT * FROM payment");
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr bgcolor="#99FF66">';

                        echo "<td>";
                        echo $row['paymentID'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['full_name'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['email_address'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['address'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['city'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['state'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['zipcode'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['name_on_card'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['credit_card_number'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['exp_date'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['cvv'];
                        echo "</td>";
                    }
                    ?>
                </table>
            </div>

            <!-- Pet Table -->
            <div class='category' id='pet'>
                <div class='row'>
                    <u>
                        <h2>Pet</h2>
                    </u>
                    <a href='add/add_pets.php' class='addBtn'>
                        Add New Record
                    </a>
                </div>
                <table>
                    <tr bgcolor="#CC99FF">
                        <th>PetID</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Price (RM)</th>
                        <th>Age</th>
                        <th>Colour</th>
                        <th>Gender</th>
                        <th>Vaccine Status</th>
                        <th>Dewormed Status</th>
                        <th>Picture 1</th>
                        <th>Picture 2</th>
                        <th>Picture 3</th>
                        <th>Picture 4</th>
                        <th>Available</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    <?php
                    $result = mysqli_query($con, "SELECT * FROM pet");
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr bgcolor="#99FF66" style="font-size: 15px; overflow-x: auto;">';

                        echo "<td>";
                        echo $row['petID'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['type'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['name'];
                        echo "</td>";

                        echo "<td>";
                        echo round($row['price']);
                        echo "</td>";

                        echo "<td>";
                        echo $row['age'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['colour'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['gender'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['vaccine_status'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['dewormed_status'];
                        echo "</td>";

                        if ($row['type'] == "puppies") {
                            $url = "../Pet/pets/puppies/img/";
                        } else if ($row['type'] == "kitten") {
                            $url = "../Pet/pets/kitten/img/";
                        } else if ($row['type'] == "bird") {
                            $url = "../Pet/pets/bird/img/";
                        }

                        /*
                        echo "<td><img src='";
                        echo $url .$row['picture1'] ;
                        echo "' width='100px' height='150px'></td>";

                        echo "<td><img src='";
                        echo $url .$row['picture2'];
                        echo "' width='150px' height='150px'></td>";

                        echo "<td><img src='";
                        echo $url .$row['picture3'];
                        echo "' width='150px' height='150px'></td>";

                        echo "<td><img src='";
                        echo $url .$row['picture4'];
                        echo "' width='150px' height='150px'></td>";
                        */
                        echo "<td>";
                        echo $row['picture1'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['picture2'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['picture3'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['picture4'];
                        echo "</td>";

                        echo "<td>";
                        if ($row['available_status'] == '0') {
                            echo "N";
                        } else {
                            echo "Y";
                        }
                        echo "</td>";

                        echo '<td><a href="edit/edit_pet.php?petID=';
                        echo $row['petID'];
                        echo '"\> Edit </a></td>';

                        echo "<td><a href=\"delete/delete_pet.php?petID="; //hyperlink to delete.php page with ‘id’ parameter
                        echo $row['petID'];
                        echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
                        echo $row['name'];
                        echo " details?');\">Delete</a></td></tr>";
                    }
                    ?>
                </table>
            </div>

            <!-- Pet Food Table -->
            <div class='category' id='food'>
                <div class='row'>
                    <u>
                        <h2>Pet Food</h2>
                    </u>
                    <a href='add/add_pet_food.php' class='addBtn'>
                        Add New Record
                    </a>
                </div>
                <table>
                    <div class="white">
                        <tr bgcolor="#CC99FF">
                            <th>FoodID</th>
                            <th>Food Name</th>
                            <th>Price (RM)</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </div>

                    <?php
                    $result = mysqli_query($con, "SELECT * FROM pet_food");
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr bgcolor="#99FF66">';

                        echo "<td>";
                        echo $row['foodID'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['Food_Name'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['Price'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['image'];
                        echo "</td>";

                        echo '<td><a href="edit/edit_food.php?foodID=';
                        echo $row['foodID'];
                        echo '"\> Edit </a></td>';

                        echo "<td><a href=\"delete/delete_food.php?foodID="; //hyperlink to delete.php page with ‘id’ parameter
                        echo $row['foodID'];
                        echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
                        echo $row['Food_Name'];
                        echo " details?');\">Delete</a></td></tr>";
                    }
                    ?>
                </table>
            </div>

            <!-- Purchase Order Table -->
            <div class='category' id='order'>
                <div class='row'>
                    <u>
                        <h2>Purchase Order</h2>
                    </u>
                </div>
                <table>
                    <tr bgcolor="#CC99FF">
                        <th>OrderID</th>
                        <th>UserID</th>
                        <th>AccesoriesID</th>
                        <th>PetID</th>
                        <th>FoodID</th>
                        <th>Quantity</th>
                        <th>Time</th>
                    </tr>

                    <?php
                    $result = mysqli_query($con, "SELECT * FROM purchaseorder");
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr bgcolor="#99FF66">';

                        echo "<td>";
                        echo $row['orderID'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['userID'];
                        echo "</td>";

                        echo "<td>";
                        if ($row['accessoriesID'] == NULL) {
                            echo "-";
                        } else {
                            echo $row['accessoriesID'];
                        }
                        echo "</td>";

                        echo "<td>";
                        if ($row['petID'] == NULL) {
                            echo "-";
                        } else {
                            echo $row['petID'];
                        }
                        echo "</td>";

                        echo "<td>";
                        if ($row['foodID'] == NULL) {
                            echo "-";
                        } else {
                            echo $row['foodID'];
                        }
                        echo "</td>";

                        echo "<td>";
                        echo $row['quantity'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['time'];
                        echo "</td>";
                    }
                    ?>
                </table>
            </div>

            <!-- User Table -->
            <div class='category' id='user'>
                <div class='row'>
                    <u>
                        <h2>User</h2>
                    </u>
                    <a href='add/add_user.php' class='addBtn'>
                        Add New Record
                    </a>
                </div>
                <table>
                    <tr bgcolor="#CC99FF">
                        <th>UserID</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Email Address</th>
                        <th>Contact Number</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Profile Picture</th>
                        <th>Roles</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    <?php
                    $result = mysqli_query($con, "SELECT * FROM user");
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<tr bgcolor="#99FF66">';

                        echo "<td>";
                        echo $row['userID'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['username'];
                        echo "</td>";

                        echo "<td>";
                        if ($row['name'] == NULL) {
                            echo "-";
                        } else {
                            echo $row['name'];
                        }
                        echo "</td>";

                        echo "<td>";
                        echo $row['password'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['email_address'];
                        echo "</td>";

                        echo "<td>";
                        if ($row['contact_number'] == NULL) {
                            echo "-";
                        } else {
                            echo $row['contact_number'];
                        }
                        echo "</td>";

                        echo "<td>";
                        if ($row['gender'] == NULL) {
                            echo "-";
                        } else {
                            echo $row['gender'];
                        }
                        echo "</td>";

                        echo "<td>";
                        if ($row['dob'] == NULL) {
                            echo "-";
                        } else {
                            echo $row['dob'];
                        }
                        echo "</td>";

                        echo "<td>";
                        if ($row['profile_pic'] == NULL) {
                            echo "-";
                        } else {
                            echo $row['profile_pic'];
                        }
                        echo "</td>";

                        echo "<td>";
                        echo $row['roles'];
                        echo "</td>";

                        echo '<td><a href="edit/edit_user.php?userID=';
                        echo $row['userID'];
                        echo '"\> Edit </a></td>';

                        echo "<td><a href=\"delete/delete_user.php?userID="; //hyperlink to delete.php page with ‘id’ parameter
                        echo $row['userID'];
                        echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
                        echo $row['username'];
                        echo " details?');\">Delete</a></td></tr>";
                    }
                    mysqli_close($con); //to close the database connection
                    ?>
                </table>
            </div>
        </div>

        <!-- footer section starts  -->
        <section class="footer">
            <div class="box-container">
                <div class="box">
                    <a class="logo"><i class="fas fa-dog"></i>Galaxy Pet Store</a>
                    <p>Galaxy Pet Store founded in 2010 at Taman Damai Utama, Puchong, 47180, Puchong</p>
                    <div class="share">
                        <a href="https://www.facebook.com/petswonderland.com.my/" target="_blank"
                            class="btn fab fa-facebook-f"></a>
                        <a href="https://twitter.com/pets_wonderland?lang=en" target="_blank"
                            class="btn fab fa-twitter"></a>
                        <a href="https://www.instagram.com/petswonderlandaus/?hl=en" target="_blank"
                            class="btn fab fa-instagram"></a>
                        <a href="https://www.linkedin.com/company/petswonderland-malaysia" target="_blank"
                            class="btn fab fa-linkedin"></a>
                    </div>
                </div>

                <div class="box">
                    <h3>our location</h3>
                    <div class="links">
                        <a>India</a>
                        <a>USA</a>
                        <a>Malaysia</a>
                        <a>South Korea</a>
                        <a>Japan</a>
                    </div>
                </div>

                <div class="box">
                    <h3>Quick Links</h3>
                    <div class="links">
                        <a href="../../index.php">Home</a>
                        <a href="../Pet Food/index.php">Pet Food</a>
                        <a href="../Accessories & Toys/accessory.php">Pet Accessories</a>
                        <a href="../Pet/pets.php">Buy Pets</a>
                    </div>
                </div>

                <div class="box">
                    <h3>Download app</h3>
                    <div class="links">
                        <a>Google play</a>
                        <a>App store</a>
                    </div>
                </div>
            </div>
            <h1 class="credit"> created by <span> MNO Company </span> </h1>
        </section>

        <!-- footer section ends -->
</body>

</html>