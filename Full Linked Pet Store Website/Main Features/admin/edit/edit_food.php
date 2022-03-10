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
        $foodID=intval($_GET['foodID']);
        $result=mysqli_query($con,"Select * from pet_food where foodID = $foodID");
        while($row=mysqli_fetch_array($result))
        {
    ?>   
    <h1>Edit Food Records</h1>
    <div class='backBtn'>
		<a href='../admin.php'>< Back</a>
	</div>

    <form action="update_food.php" method="post">
        <input type="hidden" name="foodID" value="<?php echo$row['foodID']?>">
            <table border=0 width=500>
                <tr>
                    <td><label>Name</label></td>
                    <td>: <input type="text" name="food_name" required="required" value="<?php echo $row['Food_Name'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Price (RM)</label></td>
                    <td>: <input type="number" name="price" min='0' step='0.1' required="required" value="<?php echo $row['Price'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Image Name</label></td>
                    <td>: <input type="text" name="image" required="required" value="<?php echo $row['image'] ?>"></td>
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