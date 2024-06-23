<?php
include "../../conn.php";

if (isset($_POST['checkout'])) {
  $itemArray = $_POST['tickBox'];
  $userID = $_POST['userID'];

  // Get Quantity
  $number = $_POST['number'];
  $sql_update = "SELECT * FROM cart WHERE userID = '$userID'";
  $result_update = mysqli_query($con, $sql_update);
  if ($result_update == false) {
    echo "<script>alert('Bug has appeared boii')</script>";
  }
  $i = 0;

  while ($row_update = mysqli_fetch_array($result_update)) {
    $rowCartId = $row_update['cartID'];
    $sql_update_row = "UPDATE cart
                        SET quantity = '$number[$i]'
                        WHERE cartID = '$rowCartId'";
    $result_update_row = mysqli_query($con, $sql_update_row);
    $i++;
  }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Payment Page</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <!--Google font links-->
  <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet" />

  <!-- custom css file link  -->
  <link href="style_payment.css?v=1" rel="stylesheet" />

  <!-- Javascript file -->
  <script type="text/javascript" src="validate.js?v=1"></script>
</head>

<body>
  <?php
  session_start();
  include ("../session.php");
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

  <form action="payment1.php" method="post">
    <div class="row">
      <div id="billing">
        <h2>Billing Address</h2>
        <label for="fullname"><i class="fas fa-user"></i> Full Name </label>
        <?php
        if (isset($_POST['itemType'])) {
          $petID = $_POST['petID'];
          $itemType = $_POST['itemType'];
          $inputHtml = "<input type='text' name='itemType' value='pet' hidden>
                            <input type='text' name='petID' value='" . $petID . "' hidden>";
          echo $inputHtml;
        } else {
          for ($i = 0; $i < sizeof($itemArray); $i++) {
            $cartID = $itemArray[$i];
            $inputHtml = "<input type='text' name='cartID[]' value='" . $cartID . "' hidden>";
            echo $inputHtml;
          }
        }

        ?>

        <input type="text" id="fullname" name="fname" placeholder="Muhammad Ali" required="required" />

        <label for="email"><i class="fas fa-envelope"></i> Email</label>
        <input type="text" id="email" name="email_address" placeholder="zzz@example.com" required="required" />

        <label for="address"><i class="fas fa-address-card"></i> Address</label>
        <input type="text" id="address" name="address" placeholder="No XX, Bandar Sepang" required="required" />

        <label for="city"><i class="fas fa-city"></i> City</label>
        <input type="text" id="city" name="city" placeholder="Kuala Lumpur" required="required" />

        <label for="state"><i class="fas fa-building"></i> State</label>
        <select name="state" id="state" required>
          <option value="" selected="true" disabled="disabled">
            -Please Select-
          </option>
          <option value="Johor">01 - JOHOR</option>
          <option value="Kedah">02 - KEDAH</option>
          <option value="Kelantan">03 - KELANTAN</option>
          <option value="Melaka">04 - MELAKA</option>
          <option value="Negeri Sembilan">05 - NEGERI SEMBILAN</option>
          <option value="Pahang">06 - PAHANG</option>
          <option value="Perak">08 - PERAK</option>
          <option value="Perlis">09 - PERLIS</option>
          <option value="Pulau Pinang">07 - PULAU PINANG</option>
          <option value="Sabah">12 - SABAH</option>
          <option value="Sarawak">13 - SARAWAK</option>
          <option value="Selangor">10 - SELANGOR</option>
          <option value="Terengganu">11 - TERENGGANU</option>
          <option value="WP Kuala Lumpur">14 - WP KUALA LUMPUR</option>
          <option value="WP Labuan">15 - WP LABUAN</option>
          <option value="WP Putrajaya">16 - WP PUTRAJAYA</option>
        </select>

        <label for="zipcode"><i class="fas fa-code"></i> Zipcode</label>
        <input type="text" id="zip" name="zip" placeholder="xxxxx" onfocusout="zipcode()" maxlength="5"
          required="required" required pattern="[0-9]{5}" />
      </div>

      <div id="payment">
        <h2>Payment</h2>
        <label for="fullname">Accepted Cards</label>
        <div class="icon-container">
          <i class="fab fa-cc-visa" style="color: navy"></i>
          <i class="fab fa-cc-mastercard" style="color: red"></i>
        </div>
        <label for="cardname">Name On Card</label>
        <input type="text" id="cardname" name="cname" placeholder="Muhammad Ali" required="required" />

        <label for="creditcardname">Credit Card Number</label>
        <input type="text" id="ccnum" name="cardnumber" placeholder="4012888877881881" onfocusout="creditnum()"
          maxlength="16" required="required" required pattern="[0-9]{16}" />

        <label for="expiry">Exp Date</label>
        <input type="text" id="expdate" oninput="expiry(value)" name="expmonth" placeholder="00/00" required
          pattern="[0-9]{2}\/[0-9]{2}" maxlength="5" />
        <!--4012123412341234-->
        <label for="cvv">CVV</label>
        <input type="password" id="cvv" name="cvv" placeholder="110" onfocusout="cardverification()" required="required"
          required pattern="[0-9]{3}" maxlength="3" />

        <label>
          <div id="tickBox">
            <input type="checkbox" checked="checked" name="sameaddress" />
            Shipping Address same as Billing
          </div>
        </label>
        <input type="submit" name="confirmButton" onclick="click()" class="cbtn" />
      </div>
    </div>
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
          <a href="../../index.html">Home</a>
          <a href="#">Pet Food</a>
          <a href="#">Pet Accessories</a>
          <a href="#">Buy Pets</a>
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
</body>
<?php
mysqli_close($con);
if ($cartQuantity != 0) {
  echo "<script>document.getElementById('cartItemQuantity').style.display = 'inline-flex';</script>";
}
echo "<script>    
              document.getElementById('profilePic').style.width = '40px';
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
?>

</html>