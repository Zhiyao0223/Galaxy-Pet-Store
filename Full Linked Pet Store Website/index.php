<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Store Main Menu</title>


    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- custom js file link  -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <?php
    session_start();
    include ("conn.php");

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
    ?>

    <!-- header section starts  -->
    <header class="header">
        <a href="index.php" class="logo" href='#'>
            <i class="fas fa-dog"></i>
            Galaxy Pet Store </a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="Main Features/Pet/pets.php">Buy a Pet</a>
            <a href="Main Features/Pet Food/index.php">Pet Food</a>
            <a href="Main Features/Accessories & Toys/accessory.php">Pet Accessories</a>
            <a href="Main Features/About Us/members_info.php">About Us</a>
        </nav>

        <div id='loginBox'>
            <div class='cart'>
                <a href='Main Features/Cart/cart.php'>
                    <div class="fas fa-shopping-cart" id="cart-btn">
                        <input type='text' id='cartItemQuantity' value='<?php echo $cartQuantity ?>'
                            onclick="location.href='#'" readonly>
                    </div>
                </a>
            </div>

            <div id='dropDown'>
                <button id='loginDetail'>
                    <a href='Main Features/edit/editinfo.php' target="_blank">
                        <img src='Main Features/edit/img/<?php echo $img; ?>' id='profilePic'>
                    </a>
                    <div id='displayName'>
                        <?php echo $username; ?>
                    </div>
                    <div id='dropDownOption'>
                        <a href='Main Features/edit/editinfo.php'>My Profile</a>
                        <a href='Main Features/purchase/purchase.php'>My Order</a>
                        <a href='Main Features/Login/logout.php'>Log Out</a>
                    </div>

                </button>
            </div>
        </div>
    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>Your pets will <span>always</span> be happy</h3>
            <p>Buy now or regret later!!</p>
            <a href="#" class="btn">Shop now</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- features section starts  -->
    <section class="features" id="features">

        <h1 class="heading"> What we <span>offer</span> </h1>

        <div class="box-container">

            <div class="box">
                <img src="images/cutedoggy.jfif" alt="">
                <h3>Buy a Pet</h3>
                <p>Buy a Pet to lighten your household as well as to secure it</p>
                <a href="Main Features/Pet/pets.php" target="_blank" class="btn">Click Here</a>
            </div>

            <div class="box">
                <img src="images/petfood.jpg" alt="">
                <h3>Pet Food</h3>
                <p>Buy the most delicious and mouth watering dishes made for pets</p>
                <a href="Main Features/Pet Food/index.php" target="_blank" class="btn">Click Here</a>
            </div>

            <div class="box">
                <img src="images/petnecklace.jfif" alt="">
                <h3>Pet Accessories</h3>
                <p>Get all kinds of your favourite pet Accessories here</p>
                <a href="Main Features/Accessories & Toys/accessory.php" target="_blank" class="btn">click here</a>
            </div>
        </div>
    </section>

    <!-- features section ends -->

    <section class="product" id="product">
        <section id="DogFood"></section>
        <h1 class="heading"> Our <span>Best Sellers (Pets)</span> </h1>

        <div class="box-container">
            <div class="box">
                <span class="discount">-33%</span>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <img src="images/pomeranian.jpg" alt="">
                <h3>Pomeranian</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price"> RM4,000 <span> RM5,333 </span> </div>
            </div>

            <div class="box">
                <span class="discount">-45%</span>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>

                </div>
                <img src="images/ragdoll.jpg" alt="">
                <h3>Monge Fresh 100G</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price"> RM5,800 <span> RM8990 </span> </div>
            </div>

            <div class="box">
                <span class="discount">-52%</span>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>

                </div>
                <img src="images/MacawParrot.jpg" alt="">
                <h3>DR KERES Dog Food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price"> RM5,000 <span> RM7,600 </span> </div>
            </div>

        </div>
        <br /><br /><br />

        <h1 class="heading">Our <span>Best Sellers (Pet Food)</span></h1>

        <div class="box-container">
            <div class="box">
                <span class="discount">-33%</span>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <img src="images/mishacatfood.jfif" alt="">
                <h3>Misha cat food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price"> RM11.20 <span> RM14.50 </span> </div>
            </div>

            <div class="box">
                <span class="discount">-45%</span>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>

                </div>
                <img src="images/zahara.jfif" alt="">
                <h3>d'zahara Adult</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price"> RM8.55 <span> RM15.50 </span> </div>
            </div>
            <div class="box">
                <span class="discount">-52%</span>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>

                </div>
                <img src="images/whiskas.png" alt="">
                <h3>Whiskas 80/85g</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price"> RM3.30 <span> RM6.80 </span> </div>
            </div>
        </div>
        <br>
        <br>
        <br>

        <h1 class="heading">Our <span>Best Sellers (Pet Accessories)</span></h1>

        <div class="box-container">
            <div class="box">
                <span class="discount">-33%</span>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <img src="images/birdcollar.jpg" alt="">
                <h3>Bird Collar</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price"> RM0.75 <span> RM1.50 </span> </div>
            </div>
            <div class="box">
                <span class="discount">-45%</span>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <img src="images/dogclothes.jpg" alt="">
                <h3>Dog t-shirt</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price"> RM5.35 <span> RM10.00 </span> </div>
            </div>
            <div class="box">
                <span class="discount">-50%</span>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>

                </div>
                <img src="images/catcollar.jpg" alt="">
                <h3>Cat collar</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="price"> RM1.00 <span> RM5.00 </span> </div>
            </div>
            <br /><br /><br />
    </section>

    <!-- categories section starts  -->
    <section class="categories" id="categories">
        <h1 class="heading"> Pet Accessories <span> types</span> </h1>
        <div class="box-container">
            <div class="box">
                <img src="images/collars.jpg" alt="">
                <h3>Collars</h3>
                <p>upto 45% off</p>
                <a href="#" class="btn">click here</a>
            </div>

            <div class="box">
                <img src="images/leashes.jfif" alt="">
                <h3>leashes</h3>
                <p>upto 45% off</p>
                <a href="#" class="btn">click here</a>
            </div>

            <div class="box">
                <img src="images/clothes.jfif" alt="">
                <h3>Clothes</h3>
                <p>upto 45% off</p>
                <a href="#" class="btn">click here</a>
            </div>

            <div class="box">
                <img src="images/dogkennel.jpg" alt="">
                <h3>Cage</h3>
                <p>upto 45% off</p>
                <a href="#" class="btn">click here</a>
            </div>

            <div class="box">
                <img src="images/dogtoy.jfif" alt="">
                <h3>Toys</h3>
                <p>upto 45% off</p>
                <a href="#" class="btn">click here</a>
            </div>
        </div>
    </section>

    <!-- categories section ends -->

    <!-- middle section starts  -->
    <section class="middle" id="middle">
        <div class="image">
            <img src="images/fatcat.jfif" alt="">
        </div>

        <div class="content">
            <span>Make your pet ecstatic</span>
            <h3>Your Pet will never be sad again!</h3>
        </div>
    </section>

    <!-- home section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">
        <h1 class="heading"> Latest <span>reviews</span> </h1>

        <div class="swiper review-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <img src="images/messi.jpg" alt="">
                    <p>Thank you so much.My first time bought a pet through online. Really appreciate I get my pet safe
                        and sound. First experience so great, best services and quick delivery. Trusted seller. 👍👍</p>
                    <h3>Lionel Messi</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="images/gerrard.jpg" alt="">
                    <p>ordered 9.25 price RM 999, very fast delivery about 7 days from Malaysia. Thanks seller.</p>
                    <h3>Steven Gerrard</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="images/best.jpg" alt="">
                    <p>My dog loves the food; can't stop eating so I have to keep buying again and again.</p>
                    <h3>George Best</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <img src="images/yeonwoo'.jpg" alt="">
                    <p>👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍👍
                    </p>
                    <h3>yeonwoo</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- review section ends -->

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
                <h3>quick links</h3>
                <div class="links">
                    <a href="#">Home</a>
                    <a href="Main Features/Pet Food/index.php">Pet Food</a>
                    <a href="Main Features/Accessories & Toys/accessory.php">Pet Accessories</a>
                    <a href="Main Features/Pet/pets.php">Buy Pets</a>
                </div>
            </div>

            <div class="box">
                <h3>download app</h3>
                <div class="links">
                    <a>Google play</a>
                    <a>App store</a>
                </div>
            </div>
        </div>
        <h1 class="credit"> created by <span> MNO Company </span> </h1>
    </section>

    <!-- footer section ends -->

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

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