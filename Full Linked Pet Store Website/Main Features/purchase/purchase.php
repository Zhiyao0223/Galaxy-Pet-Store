<?php 
    session_start();
    include("../session.php");
    include("../../conn.php");

    $username = $_SESSION["mySession"];
    $sql_id = "SELECT * FROM user WHERE username = '$username'";
    $result_id = mysqli_query($con, $sql_id);
    $array = mysqli_fetch_array($result_id);
    $userID = $array['userID'];
    $img = $array['profile_pic'];
    $username = $array['username'];

    if ($img == NULL) {
        $img = "user-alt.png";
    }

    // Calculate header cart item
    $sql_cart = "SELECT * FROM cart WHERE userID = '$userID'";
    $result_cart = mysqli_query($con, $sql_cart);
    $cartQuantity = mysqli_num_rows($result_cart);

    // Record all purchase made by an user
    $sql_purchase = "SELECT * FROM purchaseOrder WHERE userID = '$userID' ORDER BY 'time' ASC";
    $result_purchase = mysqli_query($con, $sql_purchase);

    // Count total order by time
    $sql_total = "SELECT DISTINCT time from purchaseorder WHERE userID = '$userID'";
    $result_total = mysqli_query($con, $sql_total);

    $totalOrder = mysqli_num_rows($result_total);
    $totalOrder = intval($totalOrder, 10);
    $time = NULL;
    $continueStatus = true;
?>
<!DOCTYPE html>
<head>
    <title>My Order</title>
    <link rel="stylesheet" href="purchase.css?v=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    <!-- Header -->
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
        
        <div id='loginBox'>
            <div class='cart'>
                <a href='../Cart/cart.php' >
                    <div class="fas fa-shopping-cart" id="cart-btn">
                    <input type='text' id='cartItemQuantity' value='<?php echo $cartQuantity ?>' onclick="location.href='../Cart/cart.php'" readonly>
                    </div>
                </a>
            </div>

            <div id='dropDown'>
                <button id='loginDetail'>
                    <a href='../edit/editinfo.php' target="_blank">
                        <img src='../edit/img/<?php echo $img; ?>' id='profilePic'>
                    </a>
                    <div id='displayName'>
                        <?php echo $username; ?>
                    </div>
                    <div class='dropDownOption'>
                        <a href='../edit/editinfo.php'>My Profile</a>
                        <a href='../purchase/purchase.php'>My Order</a>
                        <a href='../Login/logout.php'>Log Out</a>
                    </div>

                </button> 
            </div>        
        </div>
    </header>

    <!-- Content Start Here -->
    <div id='container'>
        <h2>My Order</h2>
        <p>View Your Purchase History Here</p>
        <hr id='headerLine'>

        <div id='subContainer'>
            <?php
                $counter = 0; 

                if ($totalOrder == 0) {
                    echo "<h3>No order history available.</h3>";
                }
                else {
                    $row_date = mysqli_fetch_array($result_total);
                    $date = $row_date['time'];
                    $date = substr($date, 0, 10);
                    $data = "
                            <h3>Order " .($counter+1) ."<span style='color: green; font-weight: bold;'> (".$date .") </span></h3>
                                <table id='tableDesign'>
                                    <tr>
                                        <th></th>
                                        <th>Item</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                    </tr>";
                    echo $data;
                        
                    while ($row = mysqli_fetch_array($result_purchase)) {
                            $continueStatus = true;
                            $picture = NULL;
                            $itemName = NULL;
                            $price = NULL;
                            $quantity = NULL;
                            $amount = NULL;

                            if ($time == NULL) {
                                $time = $row['time'];
                            }
                            else if ($time != $row['time']) {
                                $time = $row['time'];
                                $continueStatus = false;
                            }

                            $accessories = $row['accessoriesID']; 
                            $pet = $row['petID']; 
                            $food = $row['foodID'];

                            if ($accessories == NULL && $pet == NULL && $food == NULL) {
                                echo "<script>alert('ERROR: New Bug has appeared')</script>";
                                exit(-1);
                            }

                            else if ($row['accessoriesID'] != NULL) {
                                // Accessories data
                                $id = $row['accessoriesID'];
                                $sql_accessories = "SELECT * FROM accessories_toys WHERE accessoriesID = '$id'";
                                $result_accessories = mysqli_query($con, $sql_accessories);
                                $row_accessories = mysqli_fetch_array($result_accessories);

                                $picture = "../Accessories & Toys/images/" .$row_accessories['accessories_image'];
                                $itemName = $row_accessories['accessories_name'];
                                $price = $row_accessories['accessories_price'];

                            }
            
                            else if ($row['petID'] != NULL) {
                                // Pet data
                                $id = $row['petID'];
                                $sql_pet = "SELECT * FROM pet WHERE petID = '$id'";
                                $result_pet = mysqli_query($con, $sql_pet);
                                $row_pet = mysqli_fetch_array($result_pet);

                                $type = $row_pet['type'];
                                if ($type == "puppies") {
                                    $picture = "../Pet/pets/puppies/img/" .$row_pet['picture1'];
                                }
                                else if ($type == "kitten") {
                                    $picture = "../Pet/pets/kitten/img/" .$row_pet['picture1'];
                                }
                                else if ($type == "bird") {
                                    $picture = "../Pet/pets/bird/img/" .$row_pet['picture1'];
                                }

                                $itemName = $row_pet['name'];
                                $price = $row_pet['price'];

                            }
            
                            else if ($row['foodID'] != NULL) {
                                // Food data
                                $id = $row['foodID'];
                                $sql_food = "SELECT * FROM pet_food WHERE foodID = '$id'";
                                $result_food = mysqli_query($con, $sql_food);
                                $row_food = mysqli_fetch_array($result_food);

                                $picture = "../Pet Food/images/" .$row_food['image'];
                                $itemName = $row_food['Food_Name'];
                                $price = $row_food['Price'];
                            }
                            else {
                                echo "<script>alert('ERROR: New Bugs has appeared')</script>";
                                exit(-1);
                            }

                            $quantity = $row['quantity'];
                            $amount += ($price * $quantity);

                            if ($continueStatus == false) {
                                $amount -= ($price * $quantity);
                                $date = $row['time'];
                                $date = substr($date, 0, 10);
                                $counter++;

                                $data1 =    "</table>
                                            <h3>Order " .($counter+1) ."<span style='color: green; font-weight: bold;'> (".$date .") </span> </h3>
                                            <table id='tableDesign'>
                                            <tr>
                                            <th></th>
                                            <th>Item</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                </tr>";

                                echo $data1;
                            }
                            // DIsplay row data here
                            $row_data = "<tr>
                                            <td>
                                                <img src='".$picture ."' width='100%' height='100%'
                                            </td>
                                            <td>" 
                                                .$itemName ."
                                            </td>
                                            <td>RM "
                                                .$price ."
                                            </td>
                                            <td>"
                                                .$quantity ."
                                            </td>
                                        </tr>";
                            
                            echo $row_data;
                            
                            if ($continueStatus == false) {
                                continue;
                            }
                    }
                    echo "</table>";
                }
            ?>
        </div>
    </div>
    <!-- Footer -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <a class="logo"><i class="fas fa-dog"></i>Galaxy Pet Store</a>
                <p>Galaxy Pet Store founded in 2010 at Taman Damai Utama, Puchong, 47180, Puchong</p>
                <div class="share">
                    <a href="https://www.facebook.com/petswonderland.com.my/" target="_blank" class="btn fab fa-facebook-f"></a>
                    <a href="https://twitter.com/pets_wonderland?lang=en" target="_blank" class="btn fab fa-twitter"></a>
                    <a href="https://www.instagram.com/petswonderlandaus/?hl=en" target="_blank" class="btn fab fa-instagram"></a>
                    <a href="https://www.linkedin.com/company/petswonderland-malaysia" target="_blank" class="btn fab fa-linkedin"></a>
                </div>
            </div>
            
            <div class="box">
                <h3>Our Location</h3>
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
                <h3>Download App</h3>
                <div class="links">
                    <a>Google play</a>
                    <a>App store</a>
                </div>
            </div>
    
        </div>
    
        <h1 class="credit">Created by <span> MNO Company </span> </h1>
    </section> 
</body>
<?php 
    mysqli_close($con);

    if ($cartQuantity != 0) {
        echo "<script>document.getElementById('cartItemQuantity').style.display = 'inline-flex';</script>";
      }
    echo    "<script>    
                  document.getElementById('profilePic').style.width = '30px';
                  document.getElementById('profilePic').style.height = '30px';
                  document.getElementById('profilePic').style.padding = '0px';
              </script>";
    echo    "<script>document.getElementById('dropDown').onmouseover = function() {
                        document.getElementById('dropDownOption').style.transition = '5s ease';
                        document.getElementById('dropDownOption').style.display = 'block';}

                    document.getElementById('dropDown').onmouseleave = function() {
                        document.getElementById('dropDownOption').style.display = '';
                    }
            </script>";
    ?>
?>
</html>