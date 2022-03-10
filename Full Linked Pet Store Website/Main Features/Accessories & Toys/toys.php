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
          <h1><i class="fas fa-gamepad"> Toys</i></h1>
          <p>We offer you the best pets toys in town!</p>
        </div>
        <div class="column-02">
          <img src="images/toysbg.jpg" />
        </div>
      </div>
    </div>

    <form method='get'>
      <!--Dog Toys Section-->
      <div class="category">
        <div class="small-box">
          <h2><center>Dog Toys &#x23F0;</center></h2>
          <br />
          <div class="row">
            <div class="column-03">
              <img src="images/toys1.jpg" alt="toys" width="200" height="200" />
              <h4>Dog Bone (chewable)&#128293;</h4>
              <p>RM55</p>
              <p><button type="submit" name="accessory" value="Dog Bone (chewable)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/toys2.jpg" alt="toys" width="200" height="200" />
              <h4>Giraffe Toy (chewable)&#128293;</h4>
              <p>RM68</p>
              <p><button type="submit" name="accessory" value="Giraffe Toy (chewable)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/toys3.jpg" alt="toys" width="200" height="200" />
              <h4>Blue Dog Bone (chewable)&#128293;</h4>
              <p>RM32</p>
              <p><button type="submit" name="accessory" value="Blue Dog Bone (chewable)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/toys4.jpg" alt="toys" width="200" height="200" />
              <h4>Colorful String Toy</h4>
              <p>RM23</p>
              <p><button type="submit" name="accessory" value="Colorful String Toy" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/toys5.jpg" alt="toys" width="200" height="200" />
              <h4>Fluffy Raindeer (chewable)</h4>
              <p>RM49.90</p>
              <p><button type="submit" name="accessory" value="Fluffy Raindeer (chewable)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/toys6.jpg" alt="toys" width="200" height="200" />
              <h4>Fluffy White Chicken (chewable)</h4>
              <p>RM85</p>
              <p><button type="submit" name="accessory" value="Fluffy White Chicken (chewable)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/toys7.jpg" alt="toys" width="200" height="200" />
              <h4>Grey String Toy</h4>
              <p>RM48</p>
              <p><button type="submit" name="accessory" value="Grey String Toy" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/toys8.jpg" alt="toys" width="200" height="200" />
              <h4>Yellow Pig Toy (chewable)</h4>
              <p>RM28</p>
              <p><button type="submit" name="accessory" value="Yellow Pig Toy (chewable)" onclick='add()'>Add to cart</button></p>
            </div>
          </div>
        </div>
      </div>

      <!--Cat Toys Section-->
      <div class="category">
        <div class="small-box">
          <h2><center>Cat Toys &#x26BD;</center></h2>
          <br />
          <div class="row">
            <div class="column-03">
              <img src="images/ctoys1.jpg" alt="toys" width="200" height="200" />
              <h4>Grey Thread Mice&#128293;</h4>
              <p>RM28.90</p>
              <p><button type="submit" name="accessory" value="Grey Thread Mice" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ctoys2.jpg" alt="toys" width="200" height="200" />
              <h4>Colorful Fish Toy (Small)</h4>
              <p>RM18</p>
              <p><button type="submit" name="accessory" value="Colorful Fish Toy (Small)" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ctoys3.jpg" alt="toys" width="200" height="200" />
              <h4>Colorful Ball Toy</h4>
              <p>RM22.90</p>
              <p><button type="submit" name="accessory" value="Colorful Ball Toy" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ctoys4.jpg" alt="toys" width="200" height="200" />
              <h4>Orange Plastic Ball</h4>
              <p>RM15</p>
              <p><button type="submit" name="accessory" value="Orange Plastic Ball" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ctoys5.jpg" alt="toys" width="200" height="200" />
              <h4>White Fish Toy</h4>
              <p>RM14.90</p>
              <p><button type="submit" name="accessory" value="White Fish Toy" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ctoys6.jpg" alt="toys" width="200" height="200" />
              <h4>Purple Mice Toy</h4>
              <p>RM25</p>
              <p><button type="submit" name="accessory" value="Purple Mice Toy" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ctoys7.jpg" alt="toys" width="200" height="200" />
              <h4>Fluffy Bear Toy</h4>
              <p>RM38</p>
              <p><button type="submit" name="accessory" value="Fluffy Bear Toy" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/ctoys8.jpg" alt="toys" width="200" height="200" />
              <h4>Colorful Fish Toy</h4>
              <p>RM22</p>
              <p><button type="submit" name="accessory" value="Colorful Fish Toy" onclick='add()'>Add to cart</button></p>
            </div>
          </div>
        </div>
      </div>

      <!--Birds Toys Section-->
      <div class="category">
        <div class="small-box">
          <h2><center>Birds Toys &#x23F3;</center></h2>
          <br />
          <div class="row">
            <div class="column-03">
              <img src="images/btoys1.jpg" alt="toys" width="200" height="200" />
              <h4>Yellow & Pink Toy Ball+Bell</h4>
              <p>RM18.90</p>
              <p><button type="submit" name="accessory" value="Yellow & Pink Toy Ball+Bell" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/btoys2.jpg" alt="toys" width="200" height="200" />
              <h4>Green Toy Ball</h4>
              <p>RM20</p>
              <p><button type="submit" name="accessory" value="Green Toy Ball" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/btoys3.jpg" alt="toys" width="200" height="200" />
              <h4>Wooden Blocks</h4>
              <p>RM25.90</p>
              <p><button type="submit" name="accessory" value="Wooden Blocks" onclick='add()'>Add to cart</button></p>
            </div>
            <div class="column-03">
              <img src="images/btoys4.jpg" alt="toys" width="200" height="200" />
              <h4>Pink Hemisphere+White Strings</h4>
              <p>RM19.90</p>
              <p><button type="submit" name="accessory" value="Pink Hemisphere+White Strings" onclick='add()'>Add to cart</button></p>
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
