<?php
	if (!isset($_SESSION["mySession"])) {
		session_start();
		$error =    "<script>
						alert('Please login to proceed.');
                        window.location='../../Login/Login_inter.php';
					</script>";
		$_SESSION["error"] = $error;
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Records</title>
    <link rel='stylesheet' href='edit.css'>
</head>
<body>
    <?php
        include("../../../conn.php");
        $userID=intval($_GET['userID']);
        $result=mysqli_query($con,"Select * from user where userID = $userID");
        while($row=mysqli_fetch_array($result))
        {
    ?>   

    <h1>Edit User Records</h1>
    <div class='backBtn'>
		<a href='../admin.php'>< Back</a>
	</div>
    <form action="update_user.php" method="post">
        <input type="hidden" name="userID" value="<?php echo$row['userID']?>">
            <table>
                <tr>
                    <td><label>Username</label></td>
                    <td>: <input type="text" name="username" required="required" value="<?php echo $row['username'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Name</lable></td>
                    <td>: <input type="text" name="name" value="<?php echo $row['name'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Password</lable></td>
                    <td>: <input type="text" name="password" required="required" value="<?php echo $row['password'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Email Address</lable></td>
                    <td>: <input type="text" name="email_address" required="required" value="<?php echo $row['email_address'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Contact Number</lable></td>
                    <td>: <input type="tel" name="contact_number" value="<?php echo $row['contact_number'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Gender</lable></td>
                    <td>: <select name="gender">
                                <option value='NULL' <?php if($row['gender'] == NULL) {
                                                                echo "selected";
                                                            }
                                                    ?> disabled>Please Select</option>
                                <option value='M' <?php if($row['gender'] == 'M') {
                                                            echo "selected";
                                                        }
                                                    ?>>Male</option>
                                <option value='F' <?php if($row['gender'] == 'F') {
                                                            echo "selected";
                                                        }
                                                    ?>>Female</option>
                            </select>
                        </td>
                </tr>
                <tr>
                    <td><label>Date of Birth</lable></td>
                    <td>: <input type="date" name="dob" value="<?php echo $row['dob'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Profile Picture</lable></td>
                    <td>: <input type="text" name="profile_pic" required="required" value="<?php if($row['profile_pic'] == NULL) {
                                                                                                    echo "user-alt.png";
                                                                                                }
                                                                                                else {
                                                                                                    echo $row['profile_pic'];
                                                                                                } 
                                                                                            ?>"></td>
                </tr>
                <tr>
                    <td><label>Roles</lable></td>
                    <td>: <select name="roles" required="required">
                            <option value='user' <?php if($row['roles'] == "user") {
                                                        echo "selected";
                                                        } 
                                                ?>>User</option>
                            <option value='admin' <?php if($row['roles'] == "admin") {
                                                        echo "selected";
                                                        } 
                                                ?>>Admin</option> 
                        </select>
                    </td>
                </tr>

            
                <tr>
                    <td align="right"><input type="submit" name="submit" value="Submit"></td>
                    <td align="left"><input type="reset" value="Reset"></td>
                </tr>
            </table>
        </form>
        <?php
    }
        mysqli_close($con);
        ?>