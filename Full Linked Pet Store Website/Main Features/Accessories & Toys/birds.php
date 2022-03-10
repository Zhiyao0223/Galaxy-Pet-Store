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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

    <!--Google font links-->
    <link
      href="https://fonts.googleapis.com/css?family=Kalam"
      rel="stylesheet"
    />

    <!-- custom css file link  -->
    <link href="style_pets.css?v=1" rel="stylesheet" />

    <!--javascript link-->
    <script src="add_to_cart.js"></script>
  </head>
  <body>
    <!-- PHP Section -->
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
          <h1><i class="fas fa-dove"> Birds</i></h1>
          <p>We offer you the best birds accessories in town!</p>
        </div>
        <div class="column-02">
          <img src="images/birdsbg.jpg" />
        </div>
      </div>
    </div>

    <form method='get'>
      <!--Birds food tray-->
      <div class="category">
        <div class="small-box">
          <h2><center>Birds Feeder (Food Tray) &#128038;</center></h2>
          <br />
          <div class="row">
            <div class="column-03">
              <img src="images/tray1.jpg" alt="feeder" width="200" height="200" />
              <h4>Plastic Bird Feeder</h4>
              <p>RM56</p>
              <p><button type="submit" name="accessory" value="Plastic Bird Feeder" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/tray2.jpg" alt="feeder" width="200" height="200" />
              <h4>Glass Bird Feeder</h4>
              <p>RM70</p>
              <p><button type="submit" name="accessory" value="Glass Bird Feeder" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/tray3.jpg" alt="feeder" width="200" height="200" />
              <h4>Blue Bird Feeder</h4>
              <p>RM45</p>
              <p><button type="submit" name="accessory" value="Blue Bird Feeder" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/tray4.jpg" alt="feeder" width="200" height="200" />
              <h4>Net Bird Feeder (Plastic Base)</h4>
              <p>RM63</p>
              <p><button type="submit" name="accessory" value="Net Bird Feeder (Plastic Base)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/tray5.jpg" alt="feeder" width="200" height="200" />
              <h4>Net Bird Feeder (Metal Base)</h4>
              <p>RM69.90</p>
              <p><button type="submit" name="accessory" value="Net Bird Feeder (Metal Base)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/tray6.jpg" alt="feeder" width="200" height="200" />
              <h4>Orange & Black Bird Feeder</h4>
              <p>RM85</p>
              <p><button type="submit" name="accessory" value="Orange & Black Bird Feeder" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/tray7.jpg" alt="feeder" width="200" height="200" />
              <h4>Wooden House Bird Feeder</h4>
              <p>RM98</p>
              <p><button type="submit" name="accessory" value="Wooden House Bird Feeder" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/tray8.jpg" alt="feeder" width="200" height="200" />
              <h4>Plastic Bird Feeder (Green Base)</h4>
              <p>RM58</p>
              <p><button type="submit" name="accessory" value="Plastic Bird Feeder (Green Base)" onclick='add()'>Add to cart</button></p>
            </div>
          </div>
        </div>
      </div>

      <!--Birds Cage Section-->
      <div class="category">
        <div class="small-box">
          <h2><center>Birds Cage &#129436;</center></h2>
          <br />
          <div class="row">
            <div class="column-03">
              <img src="images/bcage1.jpg" alt="cage" width="200" height="200" />
              <h4>SilverCage (Small)</h4>
              <p>RM80</p>
              <p><button type="submit" name="accessory" value="SilverCage (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/bcage2.jpg" alt="cage" width="200" height="200" />
              <h4>Silver Cage (Large)</h4>
              <p>RM166</p>
              <p><button type="submit" name="accessory" value="Silver Cage (Large)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/bcage3.jpg" alt="cage" width="200" height="200" />
              <h4>White Cage (Large)</h4>
              <p>RM228</p>
              <p><button type="submit" name="accessory" value="White Cage (Large)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/bcage4.jpg" alt="cage" width="200" height="200" />
              <h4>Pink Cage (Small)</h4>
              <p>RM108</p>
              <p><button type="submit" name="accessory" value="Pink Cage (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/bcage5.jpg" alt="cage" width="200" height="200" />
              <h4>Black Cage (Large)</h4>
              <p>RM318</p>
              <p><button type="submit" name="accessory" value="Black Cage (Large)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/bcage6.jpg" alt="cage" width="200" height="200" />
              <h4>Bamboo Designed Cage (Small)</h4>
              <p>RM308</p>
              <p><button type="submit" name="accessory" value="Bamboo Designed Cage (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/bcage7.jpg" alt="cage" width="200" height="200" />
              <h4>Purple Cage (Small)</h4>
              <p>RM118</p>
              <p><button type="submit" name="accessory" value="Purple Cage (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/bcage8.jpg" alt="cage" width="200" height="200" />
              <h4>Gold & Pink Cage (Small)</h4>
              <p>RM215</p>
              <p><button type="submit" name="accessory" value="Gold & Pink Cage (Small)" onclick='add()'>Add to cart</button></p>
            </div>
          </div>
        </div>
      </div>
      <?php
        if (isset($_GET['accessory'])) {
          $accessory = $_GET['accessory'];
          //used to execute sql within php
          //also meant to execute sql commands inside $sql at $con database, return value to $result variable.
          $result = mysqli_query($con, "SELECT accessoriesID FROM accessories_toys WHERE accessories_name = '$accessory'");

          while($item = mysqli_fetch_array($result)){
              $accessoriesID = $item['accessoriesID'];
          };

          $finding_result =  mysqli_query($con, "SELECT * FROM cart WHERE accessoriesID= $accessoriesID AND userID = $userID");
          if (mysqli_num_rows($finding_result) == 1){
            // Alert if same item 
            unset($_GET['accessory']);
            echo "<script>alert('Please change the quantity in cart page.')</script>";
          }
          else {
            if(mysqli_query($con, "INSERT INTO cart (userID, accessoriesID, quantity) VALUES ($userID, $accessoriesID, 1)")){
              echo '<script>alert("1 record added!");</script>';
              }
          }
        }
      ?>
    </form>

    <section class="footer">
      <div class="box-container">
        <div class="boxfoot">
          <a class="logo"><i class="fas fa-dog"></i>Galaxy Pet Store</a>
          <p>
            Galaxy Pet Store founded in 2010 at Taman Damai Utama, Puchong,
            47180, Puchong
          </p>
          <div class="share">
            <a
              href="https://www.facebook.com/petswonderland.com.my/"
              target="_blank"
              class="btn fab fa-facebook-f"
            ></a>
            <a
              href="https://twitter.com/pets_wonderland?lang=en"
              target="_blank"
              class="btn fab fa-twitter"
            ></a>
            <a
              href="https://www.instagram.com/petswonderlandaus/?hl=en"
              target="_blank"
              class="btn fab fa-instagram"
            ></a>
            <a
              href="https://www.linkedin.com/company/petswonderland-malaysia"
              target="_blank"
              class="btn fab fa-linkedin"
            ></a>
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
  </body>
</html>
