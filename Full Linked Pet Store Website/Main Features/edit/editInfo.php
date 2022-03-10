<?php
    session_start();
    if (!isset($_SESSION['mySession'])) {
        header("Location: ../Login/Login_Inter.php");
    }

    include("../../conn.php");
    $username = $_SESSION["mySession"];

    $sql = "SELECT *
            FROM user
            WHERE username = '$username';";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

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
?>

<!DOCTYPE html>
<head>
    <title>My Profile</title>
    
    <link rel='stylesheet' href='editInfo.css?v=1'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src='editInfo.js'></script>

</head>
<body onload="checkBlank() ">
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
                    <a href='../edit/editinfo.php'>
                        <img src='../edit/img/<?php echo $img; ?>' id='profilePic1'>
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

    <!-- Content Start Here -->
    <div id='container'>
        <!-- Pop Up Verification Box -->
        <div id='verificationModal' class='modal'>
            <div class='modalContent'>
                <a id='close' name='email' onclick="verification('close', 'email')")>&times</a>
                <p id='modalHeader'>Verification </p>
                <p>To update your personal detail, please confirm your identity by verifying the password.</p>
                <div id='row'>
                    <div id='column-1'>
                        <div id='modalLabel'>
                            Password
                        </div>
                    </div>
                    <div id='column-2'>
                        <div class='modalInput'>
                            <input type='password' maxlength="50" id='password'>
                            <br/>
                        </div>
                        <button id='modalSubmit' <?php echo 'onclick="checkPass(' .$row['password'] .')"'; ?>>Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pop Up Password Box -->
        <div id='passwordModal' class='modal'>
            <div class='modalContent'>
                <a id='close' name='pass' onclick='verification("close", name)'>&times</a>
                <p id='modalHeader'>Changing Password </p>
                <p>Please enter existing password and new password</p>
                <form action='' method='post' id='passwordReset'>
                    <div id='row'>
                        <div id='column-1'>
                            <div class='passModalLabel'>
                                Existing Password
                            </div>
                            <div class='passModalLabel'>
                                New Password
                            </div>
                            <div class='passModalLabel'>
                                Confirmation Password
                            </div>
                        </div>
                        <div id='column-2'>
                            <div id='input-1'>
                                <div class='modalInput'>
                                    <input type='password' maxlength="50" class='passInput' id='oldPass' name='oldPass' required>
                                    <br/>
                                </div>
                                <div class='modalInput'>
                                    <input type='password' maxlength="50" class='passInput' id='newPass' name='newPass' required>
                                    <br/>
                                </div>
                                <div class='modalInput'>
                                    <input type='password' maxlength="50" class='passInput' id='confirmPass' name='confirmPass' required>
                                    <br/>
                                </div>
                            </div>
                            <div id='input-2'>
                                <input type='submit' id='passModalSubmit' name='passModalSubmit'>Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <h2>My Profile</h2>
        <p>Manage Personal Information and Password Here</p>
        <table id='tableDesign'>
            <tr>
                <td id='tableColumn-1'>
                    <img src='img/<?php if ($row['profile_pic'] == "") {
                                            $picture = 'user-alt.png';
                                        }
                                        else {
                                            $picture = $row['profile_pic'];
                                        }
                                        echo $picture;
                                    ?> ' id='profilePic'>
                </td>
                <td id='tableColumn-2'>
                    <form action='#' method='post' enctype="multipart/form-data" id='editProfile' name='editProfile'>
                        <div class='formLabel'>Username</div>
                        <input  type='text' 
                                class='formInput' 
                                id='username' 
                                name='username' 
                                value='<?php echo $row['username'];?>' 
                                readonly>
                        <br/>

                        <div class='formLabel'>Name</div>
                        <input type='text' 
                        class='formInput' 
                        id='name' 
                        name='name' 
                        value='<?php echo $row['name'];?>'>
                        <br/>

                        <div class='formLabel'>Email Address</div>
                        <input type='email' 
                        class='formInput' 
                        id='email' name='email' 
                        value='<?php echo $row['email_address'];?>'
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
                        readonly = "readonly"> 
                            <a href='#' class='confirmation' name='email' onclick="verification('open', name)">
                                <div class='verificationChange'>
                                    (Change)
                                </div>
                            </a>
                        <br/>

                        <div class='formLabel'>Password</div>
                        <input type='password' class='formInput' id='pass' name='pass' value='<?php echo $row['password'];?>' readonly> 
                            <a href='#' class='confirmation' name='pass' onclick="verification('open', name)">
                                <div class='verificationChange'>
                                    (Change)
                                </div>
                            </a>
                        <br/>

                        <div class='formLabel'>Phone Number</div>
                        <input  type='tel' 
                                class='formInput' 
                                id='phone_num' 
                                name='phone_num' 
                                value='<?php echo $row['contact_number'];?>' 
                                onfocusout="phone_number()" 
                                require pattern="[0-9]{10,11}";>

                        <br/>

                        <div class='formLabel'>Gender</div>
                        <div class='formInput' id='gender'>
                            <input type='radio' class='radioBtn' name='gender' value='M' <?php 
                                                                                                if ($row['gender'] == 'M') {?>
                                                                                                    checked='checked'<?php } ?>>Male</input>
                            <input type="radio" class='radioBtn' name='gender'value='F' <?php 
                                                                                                if ($row['gender'] == 'F') {?>
                                                                                                    checked='checked'<?php } ?>>Female</input>
                        </div>
                        <br/>

                        <!-- DOB -->
                        <div class='formLabel'>Date of Birth</div>
                        <div class='formInput'>
                            <input type='date' id='date' name='dob' value='<?php echo $row['dob'];?>' onchange="validate_dob()">   
                        </div>
                        <br/>

                        <!-- Profile Picture -->
                        <div class='formLabel' id='avatarLabel'>Upload Avatar</div>
                        <div id='avatarInput'>
                            <input type='file'  id='profilePic' name='profilePic' value='<?php echo $row['profile_pic'];?>'>

                            <div id='warningText'>
                                *Max file size 4MB
                            </div>
                            
                            
                        </div>
                        <br/>

                        <!-- Submit Button -->
                        <div class='formLabel'>
                            <input type='submit' id='submitBtn' name='submitBtn' value='Save'>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
    </div>

    <!-- Footer -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <a class="logo"><i class="fas fa-dog"></i>Galaxy Pet Store</a>
                <p>Galaxy Pet Store founded in 2010 at Taman Damai Utama, Puchong, 47180, Puchong</p>
                <div class="share">
                    <a href="https://www.facebook.com/petswonderland.com.my/" target="_blank" class="btn fab fa-facebook-f"></a>
                    <a href="https://twitter.com/pets_wonderland?lang=en" target="_blank" class="btn fab fa-twitter"></a>
                    <a href="https://www.instagram.com/petswonderlandaus/?hl=en" target="_blank" class="btn fab fa-instagram"></a>
                    <a href="https://www.linkedin.com/company/petswonderland-malaysia" target="_blank" class="btn fab fa-linkedin"></a>
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
                    <a href="../../index.php">Home</a>
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
    
        <h1 class="credit">Created by <span> MNO Company </span> </h1>
    </section> 
</body>
</html>
<?php  
    if ($cartQuantity != 0) {
        echo "<script>document.getElementById('cartItemQuantity').style.display = 'inline-flex';</script>";
    }
    echo    "<script>    
                document.getElementById('profilePic1').style.width = '40px';
                document.getElementById('profilePic1').style.height = '40px';
                document.getElementById('profilePic1').style.padding = '0px';
            </script>";
    echo "  <script>document.getElementById('dropDown').onmouseover = function() {
                        document.getElementById('dropDownOption').style.transition = '5s ease';
                        document.getElementById('dropDownOption').style.display = 'block';}

                    document.getElementById('dropDown').onmouseleave = function() {
                        document.getElementById('dropDownOption').style.display = '';
                    }
        </script>";

    // Modal Box Verify
    if (isset($_POST['passModalSubmit'])) {
        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $confirmPass = $_POST['confirmPass'];
        $string = $oldPass ." " .$newPass ." " .$confirmPass;
        if ($oldPass == $row['password']) {
            if ($newPass != $confirmPass) {
                echo "<script>alert('Difference found in new password. Please type again.')</script>";
            }
            else{
                $sql_update = "UPDATE user SET password = '$newPass'";

                if (mysqli_query($con, $sql_update)) {
                    echo "<script>alert('Successfully Update !')</script>";
                    echo "<script>verification('close', 'pass')</script>";
                }
                else {
                    echo "<script>alert('Failed to update database. Please contact admin.')</script>";
                }


            }
        }
        else {
            echo "<script>alert('Invalid password. Please try again.')</script>";
        }
        echo "<script>document.getElementById('passwordReset').reset()</script>";
    }

    // Update all profile details
    if (isset($_POST['submitBtn'])) {
        $updateSection = array();
        $updateDetail = array();

        // Name
        if ($row['name'] != $_POST['name'] && $_POST['name'] != "") {     
            $realName = $_POST['name'];
            array_push($updateSection, "name");
            array_push($updateDetail, $realName);
        }

        // Email Address 
        $email = $_POST['email'];
        if ($email != $row['email_address'] && $email != ""){
            array_push($updateSection, "email_address");
            array_push($updateDetail, $email);
        }

        // Contact Number
        $phone = $_POST['phone_num'];
        if ($phone != $row['contact_number'] && $phone != ""){
            array_push($updateSection, "contact_number");
            array_push($updateDetail, $phone);
        }

        // Gender
        $gender = $_POST['gender'];
        if ($gender != $row['gender']) {
            array_push($updateSection, "gender");
            array_push($updateDetail, $gender);
        }

        // Date of Birth
        if ($row['dob'] != $_POST['dob'] && $_POST['dob'] != "") {
            $dob = $_POST['dob'];
            array_push($updateSection, "dob");
            array_push($updateDetail, $dob);
        }

        // Profile Picture
        // References: https://www.codegrepper.com/code-examples/php/php+check+if+post+file+is+empty
        // Detect if uploading files
        $is_uploading = $_FILES["profilePic"]["error"];
        if ($is_uploading == 0) {
            $pictureStatus = 0;
        }
        else if ($is_uploading == 1) {
            echo "<script>alert('Error: Your file size has exceed 2MB.')</script>";
            exit(-1);
        }
        else if ($is_uploading == 4) {
            $pictureStatus = 2;
        }
        else
        {
            echo $is_uploading;
            echo "<script>alert('Sorry there was an error uploading your file.')</script>";
            $pictureStatus = 2;
        }
        echo $is_uploading;
        // No issue on uploading
        if ($pictureStatus == 0) {
            // Process Image
            $target_dir = "img/";
            $target_file = $target_dir.basename($_FILES["profilePic"] ["name"]);
                
            if (move_uploaded_file($_FILES["profilePic"] ["tmp_name"], $target_file)) {
                // To get file name
                $file_name = basename($_FILES["profilePic"] ["name"]);
                array_push($updateSection, "profile_pic");
                array_push($updateDetail, $file_name);
            }
        }

        // Store file name & file title into database
        if (count($updateSection) > 0) {
            for ($i = 0; $i < count($updateSection); $i++) {
                if (!mysqli_query($con, "UPDATE user SET $updateSection[$i] = '$updateDetail[$i]' WHERE username = '$username'")) {
                    die("Error: ".mysqli_error($con));
                }
            }
            
            echo '<script>alert("Update Success")</script>';
        }
        mysqli_close($con);

        // Reinitialise variable prevent bugs
        $updateDetail = array();
        $updateSection = array();
    }
?>


        