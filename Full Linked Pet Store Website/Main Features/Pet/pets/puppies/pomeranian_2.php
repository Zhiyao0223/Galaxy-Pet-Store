<!DOCTYPE html>
<html>

<head>
    <!-- Load library for Design -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src='gallery.js'></script>
    <link rel='stylesheet' href='../breed.css?v=1'>
    <title>Pets</title>
</head>

<body onload="activeSlide()">
    <?php
    session_start();
    include ("../../../../conn.php");

    if (isset($_SESSION['mySession'])) {
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

        // Calculate current cart item
        $sql_cart = "SELECT * FROM cart WHERE userID = '$userID'";
        $result_cart = mysqli_query($con, $sql_cart);
        $cartQuantity = mysqli_num_rows($result_cart);
    } else {
        $username = NULL;
        $cartQuantity = 0;
        $img = "user-alt.png";
    }

    $sql_pet = "SELECT available_status FROM pet WHERE petID = '7'";
    $result_pet = mysqli_query($con, $sql_pet);
    $row_pet = mysqli_fetch_array($result_pet);
    if ($row_pet['available_status'] == 0) {
        echo "<script>alert('Sorry! This item has been sold out.');
                        window.location.href = '../../pets.php';</script>";
    }
    ?>
    <header class="header">
        <a href="../../../../index.php" class="logo" href='#'>
            <i class="fas fa-dog" style='color: orange;'></i>
            Galaxy Pet Store </a>

        <nav class="navbar">
            <a href="../../../../index.php">Home</a>
            <a href="../../../Pet/pets.php">Buy a Pet</a>
            <a href="../../../Pet Food/index.php">Pet Food</a>
            <a href="../../../Accessories & Toys/accessory.php">Pet Accessories</a>
            <a href="../../../About Us/members_info.php">About Us</a>
        </nav>

        <div id='loginBox'>
            <div class='cart'>
                <a href='../../../Cart/cart.php'>
                    <div class="fas fa-shopping-cart" id="cart-btn">
                        <input type='text' id='cartItemQuantity' value='<?php echo $cartQuantity ?>'
                            onclick="location.href='../../Cart/cart.php'" readonly>
                    </div>
                </a>
            </div>

            <div id='dropDown'>
                <button id='loginDetail'>
                    <a href='../../../edit/editinfo.php' target="_blank">
                        <img src='../../../edit/img/<?php echo $img; ?>' id='profilePic'>
                    </a>
                    <div id='displayName'>
                        <?php echo $username; ?>
                    </div>
                    <div id='dropDownOption'>
                        <a href='../../../edit/editinfo.php'>My Profile</a>
                        <a href='../../../purchase/purchase.php'>My Order</a>
                        <a href='../../../Login/logout.php'>Log Out</a>
                    </div>

                </button>
            </div>
        </div>
    </header>

    <!-- Store name, logo and login -->
    <!-- Home Button section -->
    <p id='homeBtn'>
    <div id='outerHomeBtn'>
        <a href='../../pets.php' class='innerHomeBtn'>Home</a>
        <a href='../puppies.php' class="innerHomeBtn">Puppies</a>
        <a href='../kitten.php' class="innerHomeBtn">Kitten</a>
        <a href='../bird.php' class="innerHomeBtn">Bird</a>
    </div>
    </p>
    <hr style="opacity: 40%;"><br />

    <!-- ----------------------------------------------------------------- Content Start Here ------------------------------------------------------------- -->
    <div id='container'>
        <div class='row'>
            <!-- Refering to W3Schools, link: https://www.w3schools.com/howto/howto_js_slideshow_gallery.asp-->
            <table class='tableDesign'>
                <tr>
                    <th colspan="4" id='gallery'>
                        <div class='topLeftTable'>
                            <!-- Previous Button -->
                            <div class='square'>
                                <div class='prevBtn' onclick="actionBtn(-1)">
                                    <i class="fas fa-backward"></i>
                                </div>

                            </div>

                            <!-- After Button -->
                            <div class="square" style="margin-left: 275px;">
                                <div class='nextBtn' onclick="actionBtn(1)">
                                    <i class="fas fa-forward"></i>
                                </div>
                            </div>

                            <img src='img/pomeranian2-0.jpg' class='slideShow'>
                            <img src='img/pomeranian2-1.jpg' class='slideShow'>
                            <img src='img/pomeranian2-2.jpg' class='slideShow'>
                            <img src='img/pomeranian2-3.jpg' class='slideShow'>
                        </div>
                    </th>
                    <td rowspan="2" style="width: 50%;vertical-align: top;">
                        <div class='content'>
                            <div id='textTitle'>Pomeranian (Female) For Sale</div>
                            <p>
                            <div class='textCategory'>Price</div>:
                            <div class='price'>RM4500.00</div>
                            </p>
                            <p>
                            <div class='textCategory'>Age</div>: 7 weeks old
                            </p>
                            <p>
                            <div class='textCategory'>Color</div>: Black & Tan
                            </p>
                            <p>
                            <div class='textCategory'>Gender</div>: Female
                            </p>
                            <p>
                            <div class='textCategory'>Vaccinated</div>: Yes
                            </p>
                            <p>
                            <div class='textCategory'>Dewormed</div>: Yes
                            </p>
                            <p>
                            <div class='textCategory'>Additional Information</div>: Free One Pet Carrier
                            </p>
                            <p>
                            <div class='textCategory'>Published Date</div>: 1 October 2021
                            </p>
                        </div>
                    </td>
                </tr>
                <tr id='gallery'>
                    <td>
                        <img src='img/pomeranian2-0.jpg' class='minimizedImg' onclick="slideChange(0)">
                    </td>
                    <td>
                        <img src='img/pomeranian2-1.jpg' class='minimizedImg' onclick="slideChange(1)">
                    </td>
                    <td>
                        <img src='img/pomeranian2-2.jpg' class='minimizedImg' onclick="slideChange(2)">
                    </td>
                    <td>
                        <img src='img/pomeranian2-3.jpg' class='minimizedImg' onclick="slideChange(3)">
                    </td>
                </tr>
            </table>

        </div>
        <p>
        <div id='description'>
            To reserve your dream pet, a deposit will be charged (10% of original price)
        </div>

        <form action='../../../Payment/payment.php' method='post'>
            <input type='text' name='itemType' value='pet' hidden>
            <input type='text' name='petID' value='7' hidden>
            <button type="submit" id='purchaseBtn' name='itemType' value="Purchase"
                onclick="alert('Redirecting to Payment Page...')">Reserve</button>
        </form>
        </p>
        <br /><br />
    </div>
    <!-- ------------------------------------------------------------------ Content End Here ------------------------------------------------------------- -->
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
                    <a href="../../../../index.php">Home</a>
                    <a href="../../../Pet Food/index.php">Pet Food</a>
                    <a href="../../../Accessories & Toys/accessory.php">Pet Accessories</a>
                    <a href="../../pets.php">Buy Pets</a>
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

if (isset($_SESSION['mySession'])) {
    if ($cartQuantity != 0) {
        echo "<script>document.getElementById('cartItemQuantity').style.display = 'inline-flex';</script>";
    }
    echo "<script>    
                    document.getElementById('profilePic').style.width = '30px';
                                        document.getElementById('profilePic').style.height = '30px';
                    document.getElementById('profilePic').style.padding = '0px';
                </script>";
    echo "  <script>document.getElementById('dropDown').onmouseover = function() {
                            document.getElementById('dropDownOption').style.transition = '5s ease';
                            document.getElementById('dropDownOption').style.display = 'block';}

                            document.getElementById('dropDown').onmouseleave = function() {
                            document.getElementById('dropDownOption').style.display = '';
                        }
                </script>";
} else {
    echo "<script>document.getElementById('displayName').style.display = 'none';</script>";
}

?>

</html>