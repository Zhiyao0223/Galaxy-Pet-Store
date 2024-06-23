<!DOCTYPE html>

<head>
    <title>Our Team Members</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <?php
    session_start();
    include ("../../conn.php");

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
    <!-- Header -->
    <header class="header">
        <a href="../../index.php" class="logo" href='#'>
            <i class="fas fa-dog" style='color: orange;'></i>
            Galaxy Pet Store </a>

        <nav class="navbar">
            <a href="../../index.php">Home</a>
            <a href="../Pet/pets.php">Buy a Pet</a>
            <a href="../Pet Food/index.php">Pet Food</a>
            <a href="../Accessories & Toys/accessory.php">Pet Accessories</a>
            <a href="#">About Us</a>
        </nav>

        <div id='loginBox'>
            <div class='cart'>
                <a href='../Cart/cart.php'>
                    <div class="fas fa-shopping-cart" id="cart-btn">
                        <input type='text' id='cartItemQuantity' value='<?php echo $cartQuantity ?>'
                            onclick="location.href='#'" readonly>
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

    <section class="members">
        <div class="container">
            <br>
            <br>
            <br>

            <h1>Founders</h1>
            <div class="row">
                <div class="col-md-3 profile text-center">
                    <div class="image">
                        <img src="img/MannojNew.jpg" class="img-responsive" width="300" height="400">
                        <ul>
                            <a href="https://www.instagram.com/mannoj_/?hl=en">
                                <li><i class="fa fa-instagram"></i></li>
                            </a>
                            <a href="https://twitter.com/MannojSakthivel">
                                <li><i class="fa fa-twitter"></i></li>
                            </a>
                            <a href="https://www.facebook.com/mannoj.sakthivel">
                                <li><i class="fa fa-facebook"></i></li>
                            </a>
                        </ul>
                    </div>
                    <h2>Mannoj Sakthivel</h2>
                    <h3><u>Director / CEO</u></h3>
                    <p>The head of the department. Founded the Pet Store with Zhi Yao and Lit Tsen in 2021 while still a
                        diploma student in Asia Pacific University </p>
                </div>
                <div class="col-md-3 profile text-center">
                    <div class="image">
                        <img src="img/zhiyao.jpg" class="img-responsive" width="300" height="400">
                        <ul>
                            <a href="https://www.instagram.com/zhiyao0223/">
                                <li><i class="fa fa-instagram"></i></li>
                            </a>
                            <a href="#">
                                <li><i class="fa fa-twitter"></i></li>
                            </a>
                            <a href="https://www.facebook.com/Xiiaowu.xD">
                                <li><i class="fa fa-facebook"></i></li>
                            </a>
                        </ul>
                    </div>
                    <h2>Ng Zhi Yao</h2>
                    <h3><u>Financial Head / CFO</u></h3>
                    <p>Controls the Financial Aspect of the Pet Store. Studied Business in Computing at Harvard in 2020
                    </p>
                </div>
                <div class="col-md-3 profile text-center">
                    <div class="image">
                        <img src="img/ibrahmovic.jpg" class="img-responsive" width="300" height="400">
                        <ul>
                            <a href="https://www.instagram.com/littxenn/">
                                <li><i class="fa fa-instagram"></i></li>
                            </a>
                            <a href="#">
                                <li><i class="fa fa-twitter"></i></li>
                            </a>
                            <a href="https://www.facebook.com/littxenn">
                                <li><i class="fa fa-facebook"></i></li>
                            </a>
                        </ul>
                    </div>
                    <h2>Ong Lit Tsen</h2>
                    <h3><u>Operating Head / COO</u></h3>
                    <p>Controls all oporating aspects of the company. Studied accounting at University of Malaya at 1995
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="members">
        <div class="container">
            <h1>CEOs</h1>
            <div class="row">
                <div class="col-md-3 profile text-center">
                    <div class="image">
                        <img src="img/john_cena.jpg" class="img-responsive" width="300" height="400">
                        <ul>
                            <a href="https://www.instagram.com/johncena/?hl=en">
                                <li><i class="fa fa-instagram"></i></li>
                            </a>
                            <a
                                href="https://twitter.com/JohnCena?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">
                                <li><i class="fa fa-twitter"></i></li>
                            </a>
                            <a href="https://www.facebook.com/johncena">
                                <li><i class="fa fa-facebook"></i></li>
                            </a>
                        </ul>
                    </div>
                    <h2>John Cena</h2>
                    <h3><u>Technology Head / CTO</u></h3>
                    <p>Incharge of Technological devices or components at the Pet Store. Has been in the Pet Store
                        industry for 20 years </p>
                </div>
                <div class="col-md-3 profile text-center">
                    <div class="image">
                        <img src="img/jihyo.jpeg" class="img-responsive" width="300" height="400">
                        <ul>
                            <a href="https://www.instagram.com/jypjihyo/?hl=en">
                                <li><i class="fa fa-instagram"></i></li>
                            </a>
                            <a href="https://www.facebook.com/JYPETWICE">
                                <li><i class="fa fa-facebook"></i></li>
                            </a>
                        </ul>
                    </div>
                    <h2>Park Ji-hyo</h2>
                    <h3><u>Marketing Head / CMO</u></h3>
                    <p>Controls the Financial Aspect of the Pet Store. Studied Business in Computing at Harvard in 2020
                    </p>
                </div>
                <div class="col-md-3 profile text-center">
                    <div class="image">
                        <img src="img/Vin_Diesel.jpg" class="img-responsive" width="300" height="400">
                        <ul>
                            <a href="https://www.instagram.com/vindiesel/">
                                <li><i class="fa fa-instagram"></i></li>
                            </a>
                            <a href="https://twitter.com/vindiesel?lang=en">
                                <li><i class="fa fa-twitter"></i></li>
                            </a>
                            <a href="https://www.facebook.com/VinDiesel">
                                <li><i class="fa fa-facebook"></i></li>
                            </a>
                        </ul>
                    </div>
                    <h2>Vin Diesel</h2>
                    <h3><u>Chief Internal Ambassador</u></h3>
                    <p>Has been doing ambassadorial work for 10 years. Has a famous quote saying "The most important
                        thing in
                        this world is family"</p>
                </div>
            </div>
        </div>
    </section>
    <section class="members">
        <div class="container">
            <h1>Managers</h1>
            <div class="row">
                <div class="col-md-3 profile text-center">
                    <div class="image">
                        <img src="img/lisasurihani.jpg" class="img-responsive" width="300" height="400">
                        <ul>
                            <a href="https://www.instagram.com/lisasurihani/?hl=en">
                                <li><i class="fa fa-instagram"></i></li>
                            </a>
                            <a href="https://twitter.com/lisasurihani?lang=en">
                                <li><i class="fa fa-twitter"></i></li>
                            </a>
                            <a href="https://www.facebook.com/LisaSurihani23">
                                <li><i class="fa fa-facebook"></i></li>
                            </a>
                        </ul>
                    </div>
                    <h2>Lisa Surihani</h2>
                    <h3><u>Chief Portfolio Manager</u></h3>
                    <p>An ex-facebook employee who feels that this Pet Store is more ambitious compared to Facebook</p>
                </div>
                <div class="col-md-3 profile text-center">
                    <div class="image">
                        <img src="img/shraddha.jpg" class="img-responsive" width="300" height="400">
                        <ul>
                            <a href="https://www.instagram.com/shraddhakapoor/?hl=en">
                                <li><i class="fa fa-instagram"></i></li>
                            </a>
                            <a href="https://twitter.com/ShraddhaKapoor">
                                <li><i class="fa fa-twitter"></i></li>
                            </a>
                            <a href="https://www.facebook.com/ShraddhaKapoor">
                                <li><i class="fa fa-facebook"></i></li>
                            </a>
                        </ul>
                    </div>
                    <h2>Shraddha Kapoor</h2>
                    <h3><u>Spokesperson / Negotiator </u></h3>
                    <p>A very well spoken person and is passionate about her job</p>
                </div>
                <div class="col-md-3 profile text-center">
                    <div class="image">
                        <img src="img/billgates.jpg" class="img-responsive" width="300" height="400">
                        <ul>
                            <a href="https://www.instagram.com/thisisbillgates/?hl=en">
                                <li><i class="fa fa-instagram"></i></li>
                            </a>
                            <a href="https://twitter.com/BillGates">
                                <li><i class="fa fa-twitter"></i></li>
                            </a>
                            <a href="https://www.facebook.com/BillGates">
                                <li><i class="fa fa-facebook"></i></li>
                            </a>
                        </ul>
                    </div>
                    <h2>Bill Gates</h2>
                    <h3><u>Chief Risk Officer</u></h3>
                    <p>Microsoft founder who feels that he needs a new approach in life</p>
                </div>
                <hr>
                <br>
                <br>
                <h5>Company was founded at Bukit Jalil, Kuala Lumpur</h5>
                <br>
                <h5>Headquarters at Bandar Kinrara, Taman Damai Utama, 47180, Puchong</h5>
                <p>Contact us at</p><a href='tel: +0380825740'
                    style="text-align: center; margin-bottom: 1rem; font-size: 13px; color: white;">+0380825740</a>
                <p> or email us at</p>
                <a style="text-align: center; font-size: 13px; color: white;"
                    href="https://outlook.live.com/mail/0/inbox" target="_blank">petstorepetaling@hotmail.com</a>
            </div>
        </div>
    </section>
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
                <h3>quick links</h3>
                <div class="links">
                    <a href="../../index.php">Home</a>
                    <a href="../Pet Food/index.php">Pet Food</a>
                    <a href="../Accessories & Toys/accessory.php">Pet Accessories</a>
                    <a href="../Pet/pets.php">Buy Pets</a>
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