<?php
if (isset($_SESSION['mySession'])) {
    $username = $_SESSION['mySession'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Food</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link href="style.css" rel="stylesheet">

    <!--javascript link-->
    <script src="add_to_cart.js"></script>

</head>

<body>
    <!--PHP Section -->
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
    <!--PHP Section ends -->
    <!-- header section starts  -->

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

    <!-- header section ends -->

    <!-- banner section starts  -->

    <section class="banner-container">

        <div class="banner">
            <img src="images/cat_food.jpg" alt="">
            <div class="content">
                <h3>Buy it before you lose it!!</h3>
                <p>upto 30% off (Cat Food)</p>
                <a href="#CatFood" class="btn">check out</a>
            </div>
        </div>

        <div class="banner">
            <img src="images/dog_food.jpg" alt="">
            <div class="content">
                <h3>Buy Now or Regret Later!!</h3>
                <p>upto 50% off (Dog Food)</p>
                <a href="#DogFood" class="btn">check out</a>
            </div>
        </div>

    </section>

    <!-- banner section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="image">
            <img src="images/dog_bone.jpg" alt="">
        </div>

        <div class="content">
            <span>Fresh and Organic food</span>
            <h3>The food your Pets crave for!</h3>
            <a href="#DogFood" class="btn">Click Here</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- banner section starts  -->

    <section class="overlap-container">

        <div class="overlap">
            <img src="images/happycat.jpg" alt="">
            <div class="content">
                <h3>Your dog(s) will thank you</h3>
                <p>Guarantee!</p>
            </div>
        </div>

        <div class="overlap">
            <img src="images/happydog.jpeg" alt="">
            <div class="content">
                <h3>Your cat(s) will thank you</h3>
                <p>Guarantee!</p>
            </div>
        </div>

    </section>

    <!-- banner section ends -->

    <!-- product section starts  -->

    <form method='get'>
        <section class="product" id="product">

            <section id="DogFood"></section>

            <h1 class="heading">Food for <span>Dogs</span></h1>


            <div class="box-container">

                <div class="box">
                    <span class="discount">-33%</span>
                    <div class="icons">

                    </div>
                    <img src="images/smartheartchickenandegg.png" alt="">
                    <h3>Smart Heart Chicken</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price"> RM17.90 <span> RM23.30 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Smart Heart Chicken" onclick='add()'>Add to
                            cart</button></p>

                </div>

                <div class="box">
                    <span class="discount">-45%</span>
                    <div class="icons">


                    </div>
                    <img src="images/mongefresh.jpg" alt="">
                    <h3>Monge Fresh 100G</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price"> RM1.55 <span> RM2.85 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Monge Fresh 100G" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-52%</span>
                    <div class="icons">


                    </div>
                    <img src="images/drkeres.jfif" alt="">
                    <h3>DR KERES Dog Food</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price"> RM21.60 <span> RM45.00 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="DR KERESDog Food" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-13%</span>
                    <div class="icons">


                    </div>
                    <img src="images/alpsnaturalchunk.jpg" alt="">
                    <h3>Alps Natural Chunk</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price"> RM39.15 <span> RM45.00 </span> </div>

                    <p>For each unit <b>ONLY</b></p>
                    <div class="quantity">

                    </div>
                    <p><button type="submit" name="food_name" value="Alps Natural Chunk" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-20%</span>
                    <div class="icons">


                    </div>
                    <img src="images/paradise10kg.jfif" alt="">
                    <h3>Paradise 10kg</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM13.60 <span> RM17.00 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Paradise 10kg" onclick='add()'>add to cart</button>
                    </p>
                </div>

                <div class="box">
                    <span class="discount">-30%</span>
                    <div class="icons">


                    </div>
                    <img src="images/softpetfood.jfif" alt="">
                    <h3>Soft Pet Food S & C</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM13.30 <span> RM19.00 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Soft Pet Food S $ C" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-55%</span>
                    <div class="icons">


                    </div>
                    <img src="images/Adragnalamp.png" alt="">
                    <h3>Adragna Premium Lamb 5kg</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM9.60 <span> RM21.30 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Adragna Premium Lamb 5kg" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-30%</span>
                    <div class="icons">


                    </div>
                    <img src="images/iskhan.jpg" alt="">
                    <h3>Iskhan Holistic Senior 1.2KG</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price"> RM6.65 <span> RM9.50 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Iskhan Holistic Senior 1.2KG" onclick='add()'>add
                            to cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-40%</span>
                    <div class="icons">


                    </div>
                    <img src="images/royalcanin.jfif" alt="">
                    <h3>Royal Canin Health Nutrition</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price"> RM4.90 <span> RM8.20 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Royal Canin Health Nutrition" onclick='add()'>add
                            to cart</button></p>
                </div>

            </div>

            <br>
            <br>
            <br>

            <section id="CatFood"></section>

            <h1 class="heading">Food for <span>Cats</span></h1>
            <div class="box-container">

                <div class="box">
                    <span class="discount">-33%</span>
                    <div class="icons">

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
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Misha cat food" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-45%</span>
                    <div class="icons">


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
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="dzahara Adult" onclick='add()'>add to cart</button>
                    </p>
                </div>

                <div class="box">
                    <span class="discount">-52%</span>
                    <div class="icons">


                    </div>
                    <img src="images/whiskas.png" alt="">
                    <h3>Whiskas 80/85kg</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM3.30 <span> RM6.80 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Whiskas 80/85kg" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-15%</span>
                    <div class="icons">


                    </div>
                    <img src="images/petland.jfif" alt="">
                    <h3>Petland cat food</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM7.65 <span> RM9.00 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Petland cat food" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-20%</span>
                    <div class="icons">


                    </div>
                    <img src="images/leornardo.jpeg" alt="">
                    <h3>leonardo Cat Food</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM8.40 <span> RM10.50 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="leonardo Cat Food" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-30%</span>
                    <div class="icons">


                    </div>
                    <img src="images/belif.jfif" alt="">
                    <h3>benefeed Feline C & T</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price"> RM8.40 <span> RM12.00 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="benefeed Feline C & T" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-55%</span>
                    <div class="icons">


                    </div>
                    <img src="images/reflex.jfif" alt="">
                    <h3>reflex Plus Adult</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM6.75 <span> RM15.00 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="reflex Plus Adult" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-30%</span>
                    <div class="icons">


                    </div>
                    <img src="images/equilibrio.jfif" alt="">
                    <h3>equilibrio Adult Dry</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM5.25 <span> RM7.50 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="equilibrio Adult Dry" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-40%</span>
                    <div class="icons">


                    </div>
                    <img src="images/dormeo.jfif" alt="">
                    <h3>Dormeo's Longhair</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price"> RM3.60 <span> RM6.00 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Dormeos Longhair" onclick='add()'>add to
                            cart</button></p>
                </div>

            </div>

            <br>
            <br>
            <br>

            <section id="FishFood"></section>
            <h1 class="heading">Food for <span>Fish</span></h1>

            <div class="box-container">

                <div class="box">
                    <span class="discount">-33%</span>
                    <div class="icons">

                    </div>
                    <img src="images/AquaNice XinYang.webp" alt="">
                    <h3>AquaNice XinYang Trophical Gold</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM7.30 <span> RM9.50 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="AquaNice XinYang Trophical Gold"
                            onclick='add()'>add to cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-45%</span>
                    <div class="icons">


                    </div>
                    <img src="images/takana.jfif" alt="">
                    <h3>Takana Sakana-ii F-Pallets</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM6.35 <span> RM11.50 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Takana Sakana-il F-Pallets" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-50%</span>
                    <div class="icons">


                    </div>
                    <img src="images/sanyu.jfif" alt="">
                    <h3>Sanyu Guppy Mini Floating Pallets</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM6.00 <span> RM12.00 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Sanyu Guppy Mini Floating Pallets"
                            onclick='add()'>add to cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-15%</span>
                    <div class="icons">


                    </div>
                    <img src="images/shogun.jfif" alt="">
                    <h3>Shogun Advance Pallets</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM12.35 <span> RM14.50 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Shogun Advance Pallets" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-20%</span>
                    <div class="icons">


                    </div>
                    <img src="images/TrophicalGold.jpg" alt="">
                    <h3>Trophical Gold Fish Food</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM12.65 <span> RM15.80 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Trophical Gold Fish Food" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-30%</span>
                    <div class="icons">


                    </div>
                    <img src="images/hulx.jfif" alt="">
                    <h3>hulx Gold - Special Mix</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price"> RM2.45 <span> RM3.50 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="hulx Gold - Special Mix" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-55%</span>
                    <div class="icons">


                    </div>
                    <img src="images/fujikoi.jpg" alt="">
                    <h3>AquaNice Premium Koi</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM2.25 <span> RM5.00 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="AquaNice Premium Koi" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-30%</span>
                    <div class="icons">


                    </div>
                    <img src="images/atlas.jfif" alt="">
                    <h3>Atlas 5kg Fast Red Koi</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price"> RM4.20 <span> RM6.00 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Atlas 5kg Fast Red Koi" onclick='add()'>add to
                            cart</button></p>
                </div>

                <div class="box">
                    <span class="discount">-40%</span>
                    <div class="icons">


                    </div>
                    <img src="images/aquamaster.jpg" alt="">
                    <h3>Aqua Master koi fish</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="price"> RM4.20 <span> RM7.00 </span> </div>
                    <p>For each unit <b>ONLY</b></p>

                    <p><button type="submit" name="food_name" value="Aqua Master koi fish" onclick='add()'>add to
                            cart</button></p>
                </div>

            </div>

            <br>
            <br>
            <br>
        </section>
        <?php
        if (isset($_GET['food_name'])) {
            $food_name = $_GET['food_name'];

            // Used to execute sql within php
            // Also meant to execute sql commands inside $sql at $con database, return value to $result variable.
            $result = mysqli_query($con, "SELECT foodID FROM pet_food WHERE Food_Name = '$food_name'");

            while ($item = mysqli_fetch_array($result)) {
                $foodID = $item['foodID'];
            }
            ;

            $finding_result = mysqli_query($con, "SELECT * FROM cart WHERE foodID= $foodID AND userID = $userID");
            if (mysqli_num_rows($finding_result) == 1) {
                // Alert if same item selected
                unset($_GET['accessory']);
                echo "<script>alert('Please change the quantity in cart page.')</script>";
            } else {
                if (mysqli_query($con, "INSERT INTO cart (userID, foodID, quantity) VALUES ($userID, $foodID, 1)")) {
                    echo '<script>alert("1 record added!");</script>';
                }
            }
        }
        ?>
    </form>

    <!-- product section ends -->

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
                    <a href="../../index.php">home</a>
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