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
          <h1><i class="fas fa-cat"> Cats</i></h1>
          <p>We offer you the best cats accessories in town!</p>
        </div>
        <div class="column-02">
          <img src="images/cats.jpg" />
        </div>
      </div>
    </div>

    <form method='get'>
      <!--Cat Collars Section-->
      <div class="category">
        <div class="small-box">
          <h2><center>Cat Collars &#128570;</center></h2>
          <br />
          <div class="row">
            <div class="column-03">
              <img
                src="images/ccollar1.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Blue Collar + bell</h4>
              <p>RM35</p>
              <p><button type="submit" name="accessory" value="Blue Collar + bell" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/ccollar2.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Blue & Orange Collar</h4>
              <p>RM50</p>
              <p><button type="submit" name="accessory" value="Blue & Orange Collar" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/ccollar3.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Pink & Black Collar</h4>
              <p>RM55</p>
              <p><button type="submit" name="accessory" value="Pink & Black Collar" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/ccollar4.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Red Nylon Collar + Red bell</h4>
              <p>RM33</p>
              <p><button type="submit" name="accessory" value="Red Nylon Collar + Red bell" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/ccollar5.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Red Nylon Collar + Blue bell</h4>
              <p>RM59.90</p>
              <p><button type="submit" name="accessory" value="Red Nylon Collar + Blue bell" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/ccollar6.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Red Leather Collar</h4>
              <p>RM85</p>
              <p><button type="submit" name="accessory" value="Red Leather Collar" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/ccollar7.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Blue Collar + Silver bell</h4>
              <p>RM68</p>
              <p><button type="submit" name="accessory" value="Blue Collar + Silver bell" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/ccollar8.jpg"
                alt="collar"
                width="200"
                height="200"
              />
              <h4>Blue Collar + gold bell</h4>
              <p>RM58</p>
              <p><button type="submit" name="accessory" value="Blue Collar + gold bell" onclick='add()'>Add to cart</button></p>
            </div>
          </div>
        </div>
      </div>

      <!--Cat Leash Section-->
      <div class="category">
        <div class="small-box">
          <h2><center>Cat Leash &#128008;</center></h2>
          <br />
          <div class="row">
            <div class="column-03">
              <img
                src="images/catleash1.jpg"
                alt="leash"
                width="200"
                height="200"
              />
              <h4>Orange Leash</h4>
              <p>RM20</p>
              <p><button type="submit" name="accessory" value="Orange Leash" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/catleash2.jpg"
                alt="leash"
                width="200"
                height="200"
              />
              <h4>Red Leash</h4>
              <p>RM36</p>
              <p><button type="submit" name="accessory" value="Red Leash" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/catleash3.jpg"
                alt="leash"
                width="200"
                height="200"
              />
              <h4>Purple Nylon Leash &#128293;</h4>
              <p>RM49</p>
              <p><button type="submit" name="accessory" value="Purple Nylon Leash" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/catleash4.jpg"
                alt="leash"
                width="200"
                height="200"
              />
              <h4>Deep Blue Retractable Leash</h4>
              <p>RM60</p>
              <p><button type="submit" name="accessory" value="Deep Blue Retractable Leash" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/catleash5.jpg"
                alt="leash"
                width="200"
                height="200"
              />
              <h4>Blue Leash</h4>
              <p>RM24</p>
              <p><button type="submit" name="accessory" value="Blue Leash" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/catleash6.jpg"
                alt="leash"
                width="200"
                height="200"
              />
              <h4>Purple Leash</h4>
              <p>RM57</p>
              <p><button type="submit" name="accessory" value="Purple Leash" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/catleash7.jpg"
                alt="leash"
                width="200"
                height="200"
              />
              <h4>Mix Colored Leash</h4>
              <p>RM66</p>
              <p><button type="submit" name="accessory" value="Mix Colored Leash" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/catleash8.jpg"
                alt="leash"
                width="200"
                height="200"
              />
              <h4>Black Leash + leopard pattern</h4>
              <p>RM67</p>
              <p><button type="submit" name="accessory" value="Black Leash + leopard pattern" onclick='add()'>Add to cart</button></p>
            </div>
          </div>
        </div>
      </div>

      <!--Cat Clothes Section-->
      <div class="category">
        <div class="small-box">
          <h2><center>Cat Clothes &#128090;</center></h2>
          <br />
          <div class="row">
            <div class="column-03">
              <img
                src="images/cclothes1.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Red Sweater</h4>
              <p>RM80</p>
              <p><button type="submit" name="accessory" value="Red Sweater" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/cclothes2.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Pink Sweater (Cats)</h4>
              <p>RM99</p>
              <p><button type="submit" name="accessory" value="Pink Sweater (Cats)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/cclothes3.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Blue Sweater</h4>
              <p>RM110</p>
              <p><button type="submit" name="accessory" value="Blue Sweater" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/cclothes4.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Deep Pink Windbreaker</h4>
              <p>RM140</p>
              <p><button type="submit" name="accessory" value="Deep Pink Windbreaker" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/cclothes5.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Pink Hoodie</h4>
              <p>RM80</p>
              <p><button type="submit" name="accessory" value="Pink Hoodie" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/cclothes6.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Black Bow Tie</h4>
              <p>RM23</p>
              <p><button type="submit" name="accessory" value="Black Bow Tie" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/cclothes7.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>Yellow Skirt</h4>
              <p>RM57</p>
              <p><button type="submit" name="accessory" value="Yellow Skirt" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img
                src="images/cclothes8.jpg"
                alt="clothes"
                width="200"
                height="200"
              />
              <h4>White Unicorn Hoodie</h4>
              <p>RM108</p>
              <p><button type="submit" name="accessory" value="White Unicorn Hoodie" onclick='add()'>Add to cart</button></p>
            </div>
          </div>
        </div>
      </div>

      <!--Cat Cage Section-->
      <div class="category">
        <div class="small-box">
          <h2><center>Cat Cage &#128062;</center></h2>
          <br />
          <div class="row">
            <div class="column-03">
              <img src="images/ccage1.jpg" alt="cage" width="200" height="200" />
              <h4>White Cage</h4>
              <p>RM160</p>
              <p><button type="submit" name="accessory" value="White Cage" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ccage2.jpg" alt="cage" width="200" height="200" />
              <h4>Red Cage (Small)</h4>
              <p>RM206</p>
              <p><button type="submit" name="accessory" value="Red Cage (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ccage3.jpg" alt="cage" width="200" height="200" />
              <h4>White & Black Cage (Small)</h4>
              <p>RM308</p>
              <p><button type="submit" name="accessory" value="White & Black Cage (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ccage4.jpg" alt="cage" width="200" height="200" />
              <h4>Soft Blue Cage (Small)</h4>
              <p>RM208</p>
              <p><button type="submit" name="accessory" value="Soft Blue Cage (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ccage5.jpg" alt="cage" width="200" height="200" />
              <h4>White & Red Cage (Small)</h4>
              <p>RM258</p>
              <p><button type="submit" name="accessory" value="White & Red Cage (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ccage6.jpg" alt="cage" width="200" height="200" />
              <h4>White & Grey Cage (Small)</h4>
              <p>RM308</p>
              <p><button type="submit" name="accessory" value="White & Grey Cage (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ccage7.jpg" alt="cage" width="200" height="200" />
              <h4>Yellow & Black Cage (Small)</h4>
              <p>RM328</p>
              <p><button type="submit" name="accessory" value="Yellow & Black Cage (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ccage8.jpg" alt="cage" width="200" height="200" />
              <h4>Peach & Dark Green Cage (Small)</h4>
              <p>RM315</p>
              <p><button type="submit" name="accessory" value="Peach & Dark Green Cage (Small)" onclick='add()'>Add to cart</button></p>
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
