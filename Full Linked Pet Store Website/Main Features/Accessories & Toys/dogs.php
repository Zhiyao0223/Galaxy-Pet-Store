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
          <h1><i class="fas fa-paw"> Dogs</i></h1>
          <p>We offer you the best dogs accessories in town!</p>
        </div>
        <div class="column-02">
          <img src="images/dogs.jpg" />
        </div>
      </div>
    </div>

    <form method='get'>
      <!--Collars Section-->
      <div class="category">
        <div class="small-box">
          <h2><center>Dog Collars &#128021;</center></h2>
          <br />
          <div class="row">
            <div class="column-03">
              <img
                src="images/collar1.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Red Collar</h4>
              <p>RM65</p>
              <p><button type="submit" name="accessory" value="Red Collar" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/collar2.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Collar with treat tag</h4>
              <p>RM69</p>
              <p><button type="submit" name="accessory" value="Collar with treat tag" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/collar3.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Red & White Collar</h4>
              <p>RM72</p>
              <p><button type="submit" name="accessory" value="Red & White Collar" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/collar4.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Red Leather Collar</h4>
              <p>RM169</p>
              <p><button type="submit" name="accessory" value="Red Leather Collar" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/collar5.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Blue Collar &#128293;</h4>
              <p>RM75</p>
              <p><button type="submit" name="accessory" value="Blue Collar" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/collar6.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Black Leather Collar</h4>
              <p>RM169</p>
              <p><button type="submit" name="accessory" value="Black Leather Collar" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/collar7.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Brown Leather Collar</h4>
              <p>RM172</p>
              <p><button type="submit" name="accessory" value="Brown Leather Collar" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/collar8.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Metal Collar</h4>
              <p>RM180</p>
              <p><button type="submit" name="accessory" value="Metal Collar" onclick='add()'>Add to cart</button></p>
            </div>
          </div>
        </div>
      </div>
    

      <!--Leash Section-->
      <div class="category">
        <div class="small-box">
          <h2><center>Dog Leash &#129454;</center></h2>
          <br />
          <div class="row">
            <div class="column-03">
              <img src="images/leash1.jpg" alt="leash" width="200" height="200" />
              <h4>Red Nylon Leash (dogs)</h4>
              <p>RM23.90</p>
              <p><button type="submit" name="accessory" value="Red Nylon Leash (dogs)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/leash2.jpg" alt="leash" width="200" height="200" />
              <h4>Brown Leash</h4>
              <p>RM56</p>
              <p><button type="submit" name="accessory" value="Brown Leash" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/leash3.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Blue Nylon Leash &#128293;</h4>
              <p>RM19</p>
              <p><button type="submit" name="accessory" value="Blue Nylon Leash" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/leash4.jpg" alt="leash" width="200" height="200" />
              <h4>Brown Leather Leash</h4>
              <p>RM60</p>
              <p><button type="submit" name="accessory" value="Brown Leather Leash" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/leash5.jpg" alt="leash" width="200" height="200" />
              <h4>Red Leash (dogs)</h4>
              <p>RM24</p>
              <p><button type="submit" name="accessory" value="Red Leash (dogs)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/leash6.jpg" alt="leash" width="200" height="200" />
              <h4>Red Retractable Leash</h4>
              <p>RM67</p>
              <p><button type="submit" name="accessory" value="Red Retractable Leash" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/leash7.jpg" alt="leash" width="200" height="200" />
              <h4>Red Nylon Leash</h4>
              <p>RM19.90</p>
              <p><button type="submit" name="accessory" value="Red Nylon Leash" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/leash8.jpg" alt="leash" width="200" height="200" />
              <h4>Blue Leash (dogs)</h4>
              <p>RM34</p>
              <p><button type="submit" name="accessory" value="Blue Leash (dogs)" onclick='add()'>Add to cart</button></p>
            </div>
          </div>
        </div>
      </div>

      <!--Clothes Sections-->
      <div class="category">
        <div class="small-box">
          <h2><center>Dog Clothes &#128085;</center></h2>
          <br />
          <div class="row">
            <div class="column-03">
              <img
                src="images/clothes1.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Blue & White Stripes</h4>
              <p>RM75</p>
              <p><button type="submit" name="accessory" value="Blue & White Stripes" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/clothes2.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Pink Collored Sweater</h4>
              <p>RM86</p>
              <p><button type="submit" name="accessory" value="Pink Collored Sweater" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/clothes3.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Pink Sweater</h4>
              <p>RM83</p>
              <p><button type="submit" name="accessory" value="Pink Sweater" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/clothes4.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Colorful Checkered</h4>
              <p>RM108</p>
              <p><button type="submit" name="accessory" value="Colorful Checkered" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/clothes5.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>White Sweater</h4>
              <p>RM80</p>
              <p><button type="submit" name="accessory" value="White Sweater" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/clothes6.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Yellow Windbreaker</h4>
              <p>RM123</p>
              <p><button type="submit" name="accessory" value="Yellow Windbreaker" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/clothes7.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Black & White Suit+Bow Tie</h4>
              <p>RM156</p>
              <p><button type="submit" name="accessory" value="Black & White Suit+Bow Tie" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/clothes8.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Santa Hat</h4>
              <p>RM118</p>
              <p><button type="submit" name="accessory" value="Santa Hat" onclick='add()'>Add to cart</button></p>
            </div>
          </div>
        </div>
      </div>

      <!--Cage Section-->
      <div class="category">
        <div class="small-box">
          <h2><center>Dog Cage &#128062;</center></h2>
          <br />
          <div class="row">
            <div class="column-03">
              <img src="images/cage1.jpg" alt="cage" width="200" height="200" />
              <h4>White/Peach Cage (Small) &#128293;</h4>
              <p>RM360</p>
              <p><button type="submit" name="accessory" value="White/Peach Cage (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/cage2.jpg" alt="cage" width="200" height="200" />
              <h4>White Pet Fence (Medium)</h4>
              <p>RM376</p>
              <p><button type="submit" name="accessory" value="White Pet Fence (Medium)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/cage3.jpg" alt="cage" width="200" height="200" />
              <h4>Black Metal Fence (Medium)</h4>
              <p>RM468</p>
              <p><button type="submit" name="accessory" value="Black Metal Fence (Medium)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/cage4.jpg" alt="cage" width="200" height="200" />
              <h4>Neon Green/Black (Small)</h4>
              <p>RM408</p>
              <p><button type="submit" name="accessory" value="Neon Green/Black (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/cage5.jpg" alt="cage" width="200" height="200" />
              <h4>Stainless Steel Cage (Large)</h4>
              <p>RM768</p>
              <p><button type="submit" name="accessory" value="Stainless Steel Cage (Large)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/cage6.jpg" alt="cage" width="200" height="200" />
              <h4>Dark Blue/Grey Cage (Small)</h4>
              <p>RM348</p>
              <p><button type="submit" name="accessory" value="Dark Blue/Grey Cage (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/cage7.jpg" alt="cage" width="200" height="200" />
              <h4>Aqua/White (Small)</h4>
              <p>RM388</p>
              <p><button type="submit" name="accessory" value="Aqua/White (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/cage8.jpg" alt="cage" width="200" height="200" />
              <h4>Black Metal Cage (Medium)</h4>
              <p>RM365</p>
              <p><button type="submit" name="accessory" value="Black Metal Cage (Medium)" onclick='add()'>Add to cart</button></p>
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
            // Alert if same item selected
            unset($_GET['accessory']);
            echo "<script>alert('Please change the quantity in cart page.')</script>";
          }
          else{
              if(mysqli_query($con, "INSERT INTO cart (userID, accessoriesID, quantity) VALUES ($userID, $accessoriesID, 1)")){
                echo '<script>alert("1 record added!");</script>';
                }
              }
            
          }
        ?>
    </form>

    <!-- Footer section-->
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


