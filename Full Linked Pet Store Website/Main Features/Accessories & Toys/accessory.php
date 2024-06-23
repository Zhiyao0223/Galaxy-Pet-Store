<?php
if (isset($_SESSION['mySession'])) {
  $username = $_SESSION['mySession'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pet Accessories & Toys</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <!--Google font links-->
  <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet" />

  <!-- custom css file link  -->
  <link href="style_accessory.css?v=1" rel="stylesheet" />

  <!--javascript link-->
  <script src="add_to_cart.js"></script>
</head>

<body>
  <!-- PHP Section -->
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

    <nav class="navbar1">
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
            <input type='text' id='cartItemQuantity' value='<?php echo $cartQuantity ?>' onclick="location.href='#'"
              readonly>
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

  <div class="navbar">
    <!-- Home Button section -->
    <div id="outerHomeBtn">
      <div class="innerHomeBtn">
        <a href="accessory.php">Home</a>
      </div>
      <div class="innerHomeBtn">
        <a href="dogs.php">Dogs</a>
      </div>
      <div class="innerHomeBtn">
        <a href="cats.php">Cats</a>
      </div>
      <div class="innerHomeBtn">
        <a href="birds.php">Birds</a>
      </div>
      <div class="innerHomeBtn">
        <a href="toys.php">Toys</a>
      </div>
      <div class="innerHomeBtn">
        <a href="grooming.php">Grooming</a>
      </div>
    </div>
  </div>

  <div class="box">
    <div class="row">
      <div class="column-02">
        <h1>Accessories & Toys</h1>
        <p>We offer you the best pet's accessories & toys in town!</p>
        <a href="grooming.php" class="btn">Explore &#8594;</a>
      </div>
      <div class="column-02">
        <img src="images/petstore.jpg" />
      </div>
    </div>
  </div>

  <!--popular items section-->
  <div class="category">
    <div class="small-box">
      <h2>
        <center>Popular Items &#128293;</center>
      </h2>
      <br />
      <div class="row">
        <div class="column-03">
          <a href="dogs.php"><img src="images/collar5.jpg" alt="collar" width="300" height="300" /></a>
          <h4>Blue Collar</h4>
          <div class="rate">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p>RM75</p>
        </div>
        <div class="column-03">
          <a href="dogs.php"><img src="images/leash3.jpg" alt="leash" width="300" height="300" /></a>
          <h4>Blue Nylon Leash</h4>
          <div class="rate">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p>RM19</p>
        </div>
        <div class="column-03">
          <a href="dogs.php"><img src="images/cage1.jpg" alt="cage" width="300" height="300" /></a>
          <h4>White/Peach Cage (Small)</h4>
          <div class="rate">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p>RM360</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Popular toys-->
  <div class="small-box">
    <h2>
      <center>Popular Toys &#x26BE;</center>
    </h2>
    <br />
    <div class="row">
      <div class="column-04">
        <a href="toys.php"><img src="images/toys1.jpg" alt="toys" width="200" height="200" /></a>
        <h4>Dog Bone (chewable)</h4>
        <div class="rate">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <p>RM55</p>
      </div>
      <div class="column-04">
        <a href="toys.php"><img src="images/toys2.jpg" alt="toys" width="200" height="200" /></a>
        <h4>Giraffe Toy (chewable)</h4>
        <div class="rate">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <p>RM68</p>
      </div>
      <div class="column-04">
        <a href="toys.php"><img src="images/toys3.jpg" alt="toys" width="200" height="200" /></a>
        <h4>Blue Dog Bone (chewable)</h4>
        <div class="rate">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>RM32</p>
      </div>
      <div class="column-04">
        <a href="toys.php"><img src="images/ctoys1.jpg" alt="toys" width="200" height="200" /></a>
        <h4>Grey Thread Mice</h4>
        <div class="rate">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <p>RM28.90</p>
      </div>
    </div>

    <!--Latest clothes-->
    <h2>
      <center>Latest Clothes &#128087;</center>
    </h2>
    <br />
    <div class="row">
      <div class="column-04">
        <a href="cats.php"><img src="images/cclothes1.jpg" alt="clothes" width="200" height="200" /></a>
        <h4>Red Sweater</h4>
        <div class="rate">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <p>RM80</p>
      </div>
      <div class="column-04">
        <a href="cats.php"><img src="images/cclothes2.jpg" alt="clothes" width="200" height="200" /></a>
        <h4>Pink Sweater (Cats)</h4>
        <div class="rate">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <p>RM99</p>
      </div>
      <div class="column-04">
        <a href="cats.php"><img src="images/cclothes3.jpg" alt="clothes" width="200" height="200" /></a>
        <h4>Blue Sweater</h4>
        <div class="rate">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <p>RM110</p>
      </div>
      <div class="column-04">
        <a href="cats.php"><img src="images/cclothes4.jpg" alt="clothes" width="200" height="200" /></a>
        <h4>Deep Pink Windbreaker</h4>
        <div class="rate">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>RM140</p>
      </div>
      <div class="column-04">
        <a href="dogs.php"><img src="images/clothes3.jpg" alt="clothes" width="200" height="200" /></a>
        <h4>Pink Sweater</h4>
        <div class="rate">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="far fa-star"></i>
        </div>
        <p>RM83</p>
      </div>
      <div class="column-04">
        <a href="dogs.php"><img src="images/clothes4.jpg" alt="clothes" width="200" height="200" /></a>
        <h4>Colorful Checkered</h4>
        <div class="rate">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p>RM108</p>
      </div>
      <div class="column-04">
        <a href="dogs.php"><img src="images/clothes5.jpg" alt="clothes" width="200" height="200" /></a>
        <h4>White Sweater</h4>
        <div class="rate">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <p>RM80</p>
      </div>
      <div class="column-04">
        <a href="dogs.php"><img src="images/clothes6.jpg" alt="clothes" width="200" height="200" /></a>
        <h4>Yellow Windbreaker</h4>
        <div class="rate">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <p>RM123</p>
      </div>
    </div>
  </div>

  <!--Review section-->
  <div class="review">
    <h2>
      <center>Reviews &#128172;</center>
    </h2>
    <br />
    <div class="small-box">
      <div class="row">
        <div class="column-03">
          <i class="fas fa-quote-left"></i>
          <p>
            Product delivered in good condition! Fast delivery, nice product
            and my dog loves it!
          </p>
          <div class="rate">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <img src="images/customer1.jpg" alt="customer" width="300" height="300" />
          <h3>Mason</h3>
        </div>
        <div class="column-03">
          <i class="fas fa-quote-left"></i>
          <p>
            Layanan terbaik dari seller, barang dihantar cepat dan kemas!
            Servis mantap!
          </p>
          <div class="rate">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <img src="images/customer2.jpg" alt="customer" width="300" height="300" />
          <h3>Fazza</h3>
        </div>
        <div class="column-03">
          <i class="fas fa-quote-left"></i>
          <p>
            Brought my dogs and cats to try out the grooming service,
            definitely deserve the 5 star!
          </p>
          <div class="rate">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <img src="images/customer3.jpg" alt="customer" width="300" height="300" />
          <h3>David</h3>
        </div>
      </div>
    </div>
  </div>
  <section class="footer">
    <div class="box-container">
      <div class="boxfoot">
        <a class="logo"><i class="fas fa-dog"></i>Galaxy Pet Store</a>
        <p>
          Galaxy Pet Store founded in 2010 at Taman Damai Utama, Puchong,
          47180, Puchong
        </p>
        <div class="share">
          <a href="https://www.facebook.com/petswonderland.com.my/" target="_blank" class="btn fab fa-facebook-f"></a>
          <a href="https://twitter.com/pets_wonderland?lang=en" target="_blank" class="btn fab fa-twitter"></a>
          <a href="https://www.instagram.com/petswonderlandaus/?hl=en" target="_blank" class="btn fab fa-instagram"></a>
          <a href="https://www.linkedin.com/company/petswonderland-malaysia" target="_blank"
            class="btn fab fa-linkedin"></a>
        </div>
      </div>

      <div class="boxfoot">
        <h3>Our Location</h3>
        <div class="links">
          <a>India</a>
          <a>USA</a>
          <a>Malaysia</a>
          <a>South Korea</a>
          <a>Japan</a>
        </div>
      </div>

      <div class="boxfoot">
        <h3>Quick links</h3>
        <div class="links">
          <a href="../../index.php">Home</a>
          <a href="../Pet Food/index.php">Pet Food</a>
          <a href="../Accessories & Toys/accessory.php">Pet Accessories</a>
          <a href="../Pet/pets.php">Buy Pets</a>
        </div>
      </div>

      <div class="boxfoot">
        <h3>Download app</h3>
        <div class="links">
          <a>Google play</a>
          <a>App store</a>
        </div>
      </div>
    </div>

    <h1 class="credit">Created by <span> MNO Company </span></h1>
  </section>
  <!-----------Footer--------------->
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
</body>

</html>