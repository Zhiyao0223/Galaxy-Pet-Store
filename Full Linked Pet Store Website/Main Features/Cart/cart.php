<?php
session_start();
include ("../session.php");
include ("../../conn.php");

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

$sql_cart = "SELECT * FROM cart WHERE userID = '$userID'";
$result_cart = mysqli_query($con, $sql_cart);
$cartQuantity = mysqli_num_rows($result_cart);
?>

<!DOCTYPE html>

<head>
    <title>My cart</title>
    <link rel="stylesheet" href="cartStyle.css?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src='cart.js'></script>
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
                <a href='#'>
                    <div class="fas fa-shopping-cart" id="cart-btn">
                        <input type='text' id='cartItemQuantity' value='<?php echo $cartQuantity ?>'
                            onclick="location.href='#'" readonly>
                    </div>
                </a>
            </div>

            <div id='dropDown'>
                <button id='loginDetail'>
                    <a href='../edit/editinfo.php'>
                        <img src='../edit/img/<?php echo $img; ?>' id='profilePic'>
                    </a>
                    <div id='displayName'>
                        <?php echo $username; ?>
                    </div>
                    <div id='dropDownOption'>
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
        <h2>Shopping Cart</h2>
        <p>Manage Your Shopping Cart Here</p>
        <hr id='headerLine'>


        <form id='cart' method='post'>
            <!-- This section will use php for checking database cart -->
            <?php
            if ($cartQuantity == 0) {
                echo "<h3>No item in the cart.</h3>";
            } else {
                $tableDesign = "<table id='tableDesign'>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Item</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                            <th>Delete</th> 
                                            <th></th>
                                        </tr>";
                echo $tableDesign;

                // Obtain Cart Data
                $sql = "SELECT * FROM cart WHERE userID = '$userID'";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    $subtotal = 0;
                    $itemCounter = -1;
                    while ($row = mysqli_fetch_array($result)) {
                        $itemCounter += 1;
                        $cartID = $row['cartID'];

                        // Obtain Food and Accessories data
                        $food = "SELECT * FROM pet_food WHERE foodID = '" . $row['foodID'] . "'";
                        $accessories = "SELECT * FROM accessories_toys WHERE accessoriesID = '" . $row['accessoriesID'] . "'";
                        $foodPath = "../Pet Food/images/";
                        $accessoriesPath = "../Accessories & Toys/images/";

                        if ($row['foodID'] == NULL && $row['accessoriesID'] == NULL) {
                            echo "<script>alert('ERROR: NULL value in cart. Please contact admin.')</script>";
                            exit(-1);
                        } else if ($row['foodID'] == NULL) {
                            $mysql_run = mysqli_query($con, $accessories);
                            $path = $accessoriesPath;
                            $image = "accessories_image";
                            $priceColumn = "accessories_price";
                            $name = "accessories_name";
                            $itemID = $row['accessoriesID'];
                        } else {
                            $mysql_run = mysqli_query($con, $food);
                            $path = $foodPath;
                            $image = "image";
                            $priceColumn = "Price";
                            $name = "Food_Name";
                            $itemID = $row['foodID'];
                        }

                        while ($picture = mysqli_fetch_assoc($mysql_run)) {
                            $imageContent = file_get_contents($path . $picture["$image"]);
                            $imageData = base64_encode($imageContent);
                            $imageUrl = "url('$imageData')";

                            //$path ."data:image/jpg;base64,". "../".
                            //base64_encode($picture["$image"])
                            $itemName = $picture["$name"];
                            $price = $picture["$priceColumn"];
                            $name = $picture["$image"];
                            $img = "<div style='padding:5px; margin: 5px;'>
                                            <img src=' data:image/jpg;base64," . base64_encode($imageContent) . "' width='100%' height='100%'/>
                                            </div>
                                            </td>";
                        }

                        $totalPrice = number_format(($price * $row['quantity']), 2);
                        $subtotal += $totalPrice;
                        $data = "
                                <tr>
                                    <td>
                                        <input type='checkbox' name='tickBox[]' value='" . $cartID . "'>
                                        <input type='text' name='itemID[]' value='" . $itemID . "' hidden>
                                        <input type='text' name='userID' value='" . $userID . "' hidden>
                                    </td>
                                    <td>
                                        " . $img . "
                                    </td>
                                    <td>"
                            . $itemName . "
                                    </td>
                                    <td>RM " . $price . "
                                    </td>
                                    <td>
                                        <div class='quantityBox'>
                                            <input type='text' name='cartCount' value='$itemCounter' hidden>
                                            <button type='button' name='addQuantity' class='symbol' style='border-right: 1px solid black;' onclick='changeQuantity(\"add\", " . $price . "," . $itemCounter . ")' readonly>+</button>
                                            <input class='number' name='number[]' value='" . $row['quantity'] . "' style='border: none; text-align: center; ' readonly>
                                            <button type='button' name='minusQuantity' class='symbol' style='border-left: 1px solid black;' onclick='changeQuantity(\"sub\", " . $price . "," . $itemCounter . ")' readonly>-</button>
                                        </div>
                                    </td>
                                    <td>RM <div class='price' style='display: inline'>" . $totalPrice . "</div>
                                    </td>
                                    <td>
                                        <a href='delete.php?id=" . $cartID . "' id='delete' onClick=\"return confirm('Remove " . $itemName . "From Cart?');\"><i class='fas fa-trash-alt trashBtn'></i></a>
                                    </td>   
                                </tr>";

                        echo $data;
                    }
                    $data1 = "
                                        </table>

                                        <hr id='headerLine' style='opacity: 40%;'>
                                        <div id='cartBottom'>
                                            <button type='button' class='button' id='continueShop' onclick=\"location.href='../../index.php'\">Continue Shopping</button>
                                            <button type='submit' formaction='#' class='button' id='updateCart' name='updateCart'>Update Cart</button>
                                            <br/>";
                    echo $data1;
                } else {
                    echo "<script>alert('Unknown error on loading database. Please contact admin.')</script>";
                }
                ?>



                <div id='totalTable'>
                    <hr>
                    Order Total
                    <hr>
                    <div id='total'>
                        <!-- Use php for subtotal also -->
                        <div id='description'>Subtotal</div>
                        <div id='totalPrice'>RM <?php echo number_format($subtotal, 2); ?></div>
                    </div>

                    <button type='submit' class='button checkout' name='checkout'
                        onclick="checkOut()">Checkout</button><br />
                </div>
            </form>
        <?php } ?>
    </div>
    </div>

    <!-- Footer -->
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
// Update item quantity 
if (isset($_POST['updateCart'])) {
    $number = $_POST['number'];
    $sql_update = "SELECT * FROM cart WHERE userID = '$userID'";
    $result_update = mysqli_query($con, $sql_update);
    if ($result_update == false) {
        echo "<script>alert('Bug has appeared boii')</script>";
    }
    $i = 0;

    while ($row_update = mysqli_fetch_array($result_update)) {
        $rowCartId = $row_update['cartID'];
        $sql_update_row = "UPDATE cart
                            SET quantity = '$number[$i]'
                            WHERE cartID = '$rowCartId'";
        $result_update_row = mysqli_query($con, $sql_update_row);
        $i++;
    }
    echo "<script>alert('Quantity Updated !')</script>";
    unset($_POST['updateCart']);
}
?>
<?php
mysqli_close($con);
if ($cartQuantity != 0) {
    echo "<script>document.getElementById('cartItemQuantity').style.display = 'inline-flex';</script>";
}
echo "<script>   document.getElementById('profilePic').style.width = '40px';
                        document.getElementById('profilePic').style.height = '30px'; 
            </script>";
echo "  <script>document.getElementById('dropDown').onmouseover = function() {
                        document.getElementById('dropDownOption').style.transition = '5s ease';
                        document.getElementById('dropDownOption').style.display = 'block';}

                        document.getElementById('dropDown').onmouseleave = function() {
                        document.getElementById('dropDownOption').style.display = '';
                    }
            </script>";
?>

</html>