<!DOCTYPE html>
<html>

<head>
    <!-- Load library for Design -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src='pets.js?v=1'></script>
    <link rel='stylesheet' href='petType.css?v=1'>

    <title>Pets</title>
</head>

<body>
    <?php
    session_start();
    include ("../../../conn.php");

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
    <header class="header">
        <a href="../../../index.php" class="logo" href='#'>
            <i class="fas fa-dog" style='color: orange;'></i>
            Galaxy Pet Store </a>

        <nav class="navbar">
            <a href="../../../index.php">Home</a>
            <a href="../../Pet/pets.php">Buy a Pet</a>
            <a href="../../Pet Food/index.php">Pet Food</a>
            <a href="../../Accessories & Toys/accessory.php">Pet Accessories</a>
            <a href="../../About Us/members_info.php">About Us</a>
        </nav>

        <div id='loginBox'>
            <div class='cart'>
                <a href='../../Cart/cart.php'>
                    <div class="fas fa-shopping-cart" id="cart-btn">
                        <input type='text' id='cartItemQuantity' value='<?php echo $cartQuantity ?>'
                            onclick="location.href='../../Cart/cart.php'" readonly>
                    </div>
                </a>
            </div>

            <div id='dropDown'>
                <button id='loginDetail'>
                    <a href='../../edit/editinfo.php' target="_blank">
                        <img src='../../edit/img/<?php echo $img; ?>' id='profilePic'>
                    </a>
                    <div id='displayName'>
                        <?php echo $username; ?>
                    </div>
                    <div id='dropDownOption'>
                        <a href='../../edit/editinfo.php'>My Profile</a>
                        <a href='../../purchase/purchase.php'>My Order</a>
                        <a href='../../Login/logout.php'>Log Out</a>
                    </div>

                </button>
            </div>
        </div>
    </header>

    <!-- Store name, logo and login -->
    <!-- Home Button section -->
    <p id='homeBtn'>
    <div id='outerHomeBtn'>
        <a href='../pets.php' class='innerHomeBtn'>Home</a>
        <a href='puppies.php' class="innerHomeBtn">Puppies</a>
        <a href='kitten.php' class="innerHomeBtn">Kitten</a>
        <a href='bird.php' class="innerHomeBtn">Bird</a>
    </div>
    </p>
    <hr style="opacity: 40%;"><br />

    <!--          ------------------------------------------------------------ Content Start Here ------------------------------------------------------------  -->
    <p class='title'>
        Feature Birds:

    <div id='sortDisplay'>
        <i class="fas fa-sort-amount-down"></i>
        <select id='sortPrice' onchange="sortPrice(value)">
            <option value="" disabled selected>Price</option>
            <option value="highLow">Price: High -> Low</option>
            <option value='lowHigh'>Price: Low -> High</option>
        </select>
    </div>
    </p>
    <div class='row'>
        <div id='column-1'>
            <form action="puppies.php" method="GET" id='filterFeature'>
                <input type='text' oninput="filterBox()" class='fas fa-search fontSearchBox' id='searchBox'
                    placeholder="&#xf002; Search for a pet here..." maxlength="30">
                <br /><br />
                <p style="font-size: 20px; font-weight:bold; margin-left: 20px;">
                    <i class="fas fa-filter"></i> SEARCH FILTER
                </p>
                <ol>
                    <li>
                        <div id='filterCategories'>Gender</div>
                    </li>
                    <ul id="genderFilter">
                        <li>
                            <input type="radio" id='both' name='gender' value='both' onclick="filterBox()" checked>Both
                            Gender<br />
                            <input type='radio' id='male' name='gender' value="M" onclick='filterBox()'>Male<br />
                            <input type="radio" id='female' name='gender' value="F" onclick="filterBox()">Female

                        </li>
                    </ul>
                    <br />
                    <hr style="opacity: 20%;"><br />

                    <li>
                        <div id='filterCategories'>Price Range</div>
                    </li>
                    <ul>
                        <li>
                            <input type="number" class='priceRange' name='priceRange' min="1" max="10000"
                                placeholder="RM MIN" oninput="filterBox()"> ---
                            <input type='number' class='priceRange' name='priceRange' min="1" max="10000"
                                placeholder="RM MAX" oninput="filterBox()">
                        </li>
                    </ul>
                    <br />
                    <hr style="opacity: 20%;"><br />
                    <li>
                        <button type="reset" onclick="setTimeout('filterBox()', 150)" id='resetFilter'>Clear All
                            Filter</button>
                    </li>
                </ol>
            </form>
        </div>

        <!--------------------- Table Right Part-------------------->
        <div id='column-2'>
            <table id='tableDesign'>
                <?php
                $sql_pet = "SELECT * FROM pet WHERE type ='bird' AND available_status = '1'";
                $result_pet = mysqli_query($con, $sql_pet);

                while ($row_pet = mysqli_fetch_array($result_pet)) {
                    // Acquire related data from database
                    $breed = $row_pet['breed'];
                    $price = $row_pet['price'];
                    $gender = $row_pet['gender'];
                    $htmlElement = $row_pet['additional_info'];
                    $picture = $row_pet['picture1'];
                    $link = $row_pet['link'];
                    $name = $row_pet['name'];

                    $data = " 
                                    <tr>
                                        <td class='tableColumn-1'>
                                            <a href='bird/" . $link . "'><img src='bird/img/" . $picture . "' class='img' alt='" . $breed . "'></a>
                                        </td>
                                        <td class='tableColumn-2'>
                                            <a href='bird/" . $link . "' class='tableTitle' id='" . $breed . "'>" . $name . " (" . $gender . ")</a><br/>"
                        . $htmlElement . "
                                            <div class='priceBox'>
                                                <div class='price'>RM" . $price . "</div>
                                            </div>    
                                        </td>
                                    </tr>";
                    echo $data;
                }
                ?>
            </table>
        </div>
    </div>
    <!---------------------------------------------------------------- Content End Here ------------------------------------------------>
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
                <h3>Quick Links</h3>
                <div class="links">
                    <a href="../../../index.php">Home</a>
                    <a href="../../Pet Food/index.php">Pet Food</a>
                    <a href="../../Accessories & Toys/accessory.php">Pet Accessories</a>
                    <a href="../pets.php">Buy Pets</a>
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

        <h1 class="credit">Created by <span> MNO Company </span> </h1>
    </section>
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