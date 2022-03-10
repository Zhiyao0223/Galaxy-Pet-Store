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
        $petID=intval($_GET['petID']);
        $result=mysqli_query($con,"Select * from pet where petID = $petID");
        while($row=mysqli_fetch_array($result))
        {
    ?>   
    <h1>Edit Accessories Records</h1>
    <div class='backBtn'>
		<a href='../admin.php'>< Back</a>
	</div>
 
    <form action="update_pet.php" method="post">
        <input type="hidden" name="petID" value="<?php echo$row['petID']?>">
            <table border=0 width=500>
                <tr>
                    <td><label>Type</label></td>
                    <td>: <input type="text" name="type" required="required" value="<?php echo $row['type'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Name</lable></td>
                    <td>: <input type="text" name="name" required="required" value="<?php echo $row['name'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Breed</lable></td>
                    <td>: <input type="text" name="breed" required="required" value="<?php echo $row['breed'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Price (RM)</lable></td>
                    <td>: <input type="number" name="price" required="required" min='0' step='0.1' value="<?php echo $row['price'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Age (Months)</lable></td>
                    <td>: <input type="number" name="age" required="required" min='0' value="<?php echo $row['age'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Colour</lable></td>
                    <td>: <input type="text" name="colour" required="required" value="<?php echo $row['colour'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Gender</lable></td>
                    <td>: <select name="gender" required="required">
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
                    <td><label>Vaccine Status</lable></td>
                    <td>: <select required="required" name="vaccine_status">
						        <option value="" selected disabled>Please Select</option>
						        <option value="Y" <?php if($row['vaccine_status'] == "Y") {
                                                            echo "selected";
                                                        } 
                                                    ?>>True</option>
						        <option value="N" <?php if($row['vaccine_status'] == "N") {
                                                            echo "selected";
                                                        } 
                                                    ?>>False</option>
					        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Dewormed Status</lable></td>
                    <td>: <select required="required" name="dewormed_status">
						        <option value="" selected disabled>Please Select</option>
						        <option value="Y" <?php if($row['dewormed_status'] == "Y") {
                                                            echo "selected";
                                                        } 
                                                    ?>>True</option>
						        <option value="N" <?php if($row['dewormed_status'] == "N") {
                                                            echo "selected";
                                                        } 
                                                    ?>>False</option>
					        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Additional Info</lable></td>
                    <td>: <textarea name="additional_info" required="required"><?php echo $row['additional_info'] ?></textarea></td>
                </tr>
                <tr>
                    <td><label>Picture1</lable></td>
                    <td>: <input type="text" name="picture1" required="required" value="<?php echo $row['picture1'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Picture2</lable></td>
                    <td>: <input type="text" name="picture2" required="required" value="<?php echo $row['picture2'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Picture3</lable></td>
                    <td>: <input type="text" name="picture3" required="required" value="<?php echo $row['picture3'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Picture4</lable></td>
                    <td>: <input type='text' value="<?php echo $row['picture4']?>" name="picture4" required="required"></td>
                </tr>

                <tr>
                    <td><label>Page Link</lable></td>
                    <td>: <input type='text' name="link" required="required" value='<?php echo $row['link'] ?>'></td>
                </tr>
                <tr>
                    <td><label>Available Status</lable></td>
                    <td>: <select name="available" required="required">
                            <option value='1' <?php   if($row['available_status'] == "1") {
                                                                        echo "selected";
                                                                    } 
                                                                ?>>Yes</option>
                            <option value='0' <?php if($row['available_status'] == "0") {
                                                                        echo "selected";
                                                                    } 
                                                                ?>>No</option>
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