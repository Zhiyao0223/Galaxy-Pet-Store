<!DOCTYPE html>
<html>
<head>
    <!-- Load library for Design -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel='stylesheet' href='petsMain.css?v=1'>
    <script src='pets/pets.js?v=1'></script>

    <title>Pets</title>
</head>
<body>
    <?php 
        session_start();
        include("../../conn.php");

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
        }
        else {
            $username = NULL;
            $cartQuantity = 0;
            $img = "user-alt.png";
        }
    ?>
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
                    <input type='text' id='cartItemQuantity' value='<?php echo $cartQuantity ?>' onclick="location.href='#'" readonly>
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
                    <div id='dropDownOption'>
                        <a href='../edit/editinfo.php'>My Profile</a>
                        <a href='../purchase/purchase.php'>My Order</a>
                        <a href='../Login/logout.php'>Log Out</a>
                    </div>

                </button> 
            </div>        
        </div>
    </header>
   
    <!-- Store name, logo and login -->
    <!-- Home Button section -->
    <p id='homeBtn'>
        <div id='outerHomeBtn'>
            <a href='pets.php' class='innerHomeBtn'>Home</a>
            <a href='pets/puppies.php' class="innerHomeBtn">Puppies</a>
            <a href='pets/kitten.php' class="innerHomeBtn">Kitten</a>
            <a href='pets/bird.php' class="innerHomeBtn">Bird</a>
        </div>
    </p>
    <hr style="opacity: 0.4;">
    <br/><br/>

    <div id='container'>
        <!-- ------------------------------------------------------------------ Content Start Here ------------------------------------------------------------  -->
        <!------------------------------------- Dog Secition ------------------------------>
        <div class='title'>
                Feature Puppies:
                <a href="pets/puppies.php" id='viewMore'>
                    View More >>>
                </a>
        </div>
        <br/>

        <table id='tableDesign'>
            <tr>
                <td>
                    <a href='pets/puppies/welsh_corgi_1.php'>
                        <img src='pets/puppies/img/corgi1-0.jpg' alt='Picture' class='image'>
                        <div class='content'>
                            Welsh Corgi<br/>
                            RM6200
                        </div>
                    </a>
                </td>
                <td>
                    <a href='pets/puppies/poodle.php'>
                        <img src='pets/puppies/img/poddle1-0.jpg' alt='Picture' class='image'>
                        <div class='content'>
                            Poddle<br/>
                            RM2000
                        </div>
                    </a>
                </td>
                <td>
                    <a href='pets/puppies/welsh_corgi_2.php'>
                        <img src='pets/puppies/img/corgi2-0.jpg' alt='Picture' class='image'>
                        <div class='content'>
                            Welsh Corgi<br/>
                            RM6000
                        </div>
                    </a>
                </td>
                <td>
                    <a href='pets/puppies/pomeranian_2.php'>
                        <img src='pets/puppies/img/pomeranian2-0.jpg' alt='Picture' class='image'>
                        <div class='content'>
                            Pomeranian<br/>
                            RM4500
                        </div>
                    </a>
                </td>
            </tr>
        </table>
        <br/>

        <!------------------------------------- Cat Section ------------------------------>
        <div class='title'>
            Featured Kittens: 

            <a href="pets/kitten.php" id='viewMore'>
                View More >>>
            </a>
        </div>
        <table id='tableDesign'>
            <tr>
                <td>
                    <a href='pets/kitten/maine_coon_1.php'>
                        <img src='pets/kitten/img/maine_coon1-0.jpg' alt='maine_coon' class='image'>
                        <p>
                            <div class='content'>
                                Maine Coon<br/>
                                RM3000
                            </div>
                        </p>
                    </a>
                </td>
                <td>
                    <a href='pets/kitten/ragdoll.php'>
                        <img src='pets/kitten/img/ragdoll1-0.jpg' alt='ragdoll' class='image'>
                        <p>
                            <div class='content'>
                                Ragdoll<br/>
                                RM5800
                            </div>
                        </p>
                    </a>
                </td>
                <td>
                    <a href='pets/kitten/maine_coon_3.php'>
                        <img src='pets/kitten/img/maine_coon3-0.jpg' alt='maine_coon' class='image'>
                        <p>
                            <div class='content'>
                                Maine Coon<br/>
                                RM2500
                            </div>
                        </p>
                    </a>
                </td>
                <td>
                    <a href='pets/kitten/british_shorthair.php'>
                        <img src='pets/kitten/img/british_shorthair1-0.jpg' alt='british_shorthair' class='image'>
                        <p>
                            <div class='content'>
                                British Shorthair<br/>
                                RM7000
                            </div>
                        </p>
                    </a>
                </td>
            </tr>
        </table>
        <br/>

        <!------------------------------------- Bird Section ------------------------------>
        <div class='title'>
            Featured Birds: 

            <a href="pets/bird.php" id='viewMore'>
                View More >>>
            </a>
        </div>
        <table id='tableDesign'>
            <tr>
                <td>
                    <a href='pets/bird/love_bird.php'>
                        <img src='pets/bird/img/lovebird1-0.jpg' alt='love_bird' class='image'>
                        <p>
                            <div class='content'>
                                Love Bird<br/>
                                RM200
                            </div>
                        </p>
                    </a>
                </td>
                <td>
                    <a href='pets/bird/macaw_parrot_1.php'>
                        <img src='pets/bird/img/macaw_parrot1-0.jpg' alt='macaw_parrot' class='image'>
                        <p>
                            <div class='content'>
                                Blue & Yellow Macaw Parrot<br/>
                                RM5000
                            </div>
                        </p>
                    </a>
                </td>
                <td>
                    <a href='pets/bird/macaw_parrot_2.php'>
                        <img src='pets/bird/img/macaw_parrot2-0.jpg' alt='macaw_parrot' class='image'>
                        <p>
                            <div class='content'>
                                Scarlet Macaw Parrot<br/>
                                RM9000
                            </div>
                        </p>
                    </a>
                </td>
                <td>
                    <a href='pets/bird/yellow_parrot.php'>
                        <img src='pets/bird/img/yellow_parrot1-0.jpg' alt='yellow_parrot' class='image'>
                        <p>
                            <div class='content'>
                                SunConure HighYellow Parrot<br/>
                                RM900
                            </div>
                        </p>
                    </a>
                </td>
            </tr>
        </table>
        <br/>
    </div>    
    <!-- ----------------------------------------------------------------- Content End Here ------------------------------------------------------------ -->
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
                    <a href="#">Buy Pets</a>
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
        echo    "<script>    
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
    }
    else {
        echo "<script>document.getElementById('displayName').style.display = 'none';</script>";
    }
   
?>
</html>