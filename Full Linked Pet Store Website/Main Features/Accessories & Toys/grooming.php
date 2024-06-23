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
  <title>Pet Store</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <!--Google font links-->
  <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet" />

  <!-- custom css file link  -->
  <link href="style_grooming.css?v=1" rel="stylesheet" />

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
    <a href="../../index.html" class="logo" href='#'>
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
        <h1>Grooming Service</h1>
        <p>A loving, professional dog care in Subang Jaya!</p>
        <a href="tel:0380825740" class="button">Call Us Now &#8594;</a>
      </div>
      <div class="column-02">
        <img src="images/grooming.png" />
      </div>
    </div>
  </div>
  <div class="category">
    <div class="column-03">
      <div class="title">
        <h1>Our Services</h1>
      </div>
      <div class="services">
        <div class="column-04">
          <img src="images/fullgrooming.jpg" alt="grooming" width="400" height="300" />
          <h4>Full Grooming</h4>
          <p>RM130</p>
        </div>
        <div class="column-04">
          <img src="images/wash.jpg" alt="grooming" width="400" height="300" />
          <h4>Wash & Dry</h4>
          <p>RM80</p>
        </div>
        <div class="column-04">
          <img src="images/selfwash.jpg" alt="grooming" width="400" height="300" />
          <h4>Self-Service</h4>
          <p>RM48</p>
        </div>
        <div class="column-04">
          <img src="images/nailclip.jpg" alt="grooming" width="400" height="300" />
          <h4>Nail-Clipping</h4>
          <p>RM35</p>
        </div>
      </div>
    </div>
    <div class="column-03">
      <center>
        <a href="forms.php" target="_blank" class="button">BOOK NOW</a>
      </center>
    </div>
    <div class="small-box">
      <img src="images/groomingbg.png" />
      <div class="content">
        <h2>Opening Hours</h2>
        <p>Mon - Fri: 9am - 6pm</p>
        <p>Sat: 10am - 3pm</p>
        <p>Sun: Closed</p>
      </div>
    </div>
  </div>
  <div class="title">
    <h1>About Me</h1>
  </div>
  <div class="profile">
    <div class="about">
      <img src="images/profile.jpg" width="500" height="500" />
    </div>
    <div class="about about-01">
      <h2>~~ Hello, I'm Momo ~~</h2>
      <p>
        ** I am a dedicated animal care specialist with a track record of
        offering high-quality grooming and health services to a wide range of
        animals.
      </p>
      <br />
      <p>
        Morever, I am also experienced with washing and grooming animals,
        recommending courses of treatment, and learning new animal care
        techniques. Recognized several times for outstanding customer service!
      </p>
      <br />
      <p>
        I make every effort to make grooming as stress-free as possible. I
        believe that having a lot of patience and trust, as well as the
        ability to understand dogs' body language, is essential. I've had a
        lot of luck grooming pets without having to use any sedatives. I take
        great pride in my work and consider myself to be a groomer that
        prioritizes quality over quantity. **
      </p>
    </div>
  </div>

  <!-- Footer Section-->
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
        <h3>Our location</h3>
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