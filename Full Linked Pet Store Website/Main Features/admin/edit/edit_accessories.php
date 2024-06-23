<?php
if (!isset($_SESSION["mySession"])) {
    session_start();
    $error = "<script>
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
    include ("../../../conn.php");
    $accessoriesID = intval($_GET['accessoriesID']);
    $result = mysqli_query($con, "Select * from accessories_toys where accessoriesID = $accessoriesID");
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <h1>Edit Accessories Records</h1>
        <div class='backBtn'>
            <a href='../admin.php'>
                < Back</a>
        </div>
        <form action="update_accessories.php" method="post">
            <input type="hidden" name="accessoriesID" value="<?php echo $row['accessoriesID'] ?>">
            <table>
                <tr>
                    <td><label>Name</label></td>
                    <td>: <input type="text" name="name" required="required" value="<?php echo $row['accessories_name'] ?>">
                    </td>
                </tr>

                <tr>
                    <td><label>Price (RM)</label></td>
                    <td>: <input type="number" name="price" required="required" min='0' step='0.10'
                            value="<?php echo $row['accessories_price'] ?>"></td>
                </tr>

                <tr>
                    <td><label>Image Name</label></td>
                    <td>: <input type="text" name="image" required="required"
                            value="<?php echo $row['accessories_image'] ?>"></td>
                </tr>

                <tr>
                    <td><label>Type</label></td>
                    <td>: <input type="text" name="type" required="required" value="<?php echo $row['type'] ?>"></td>
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
</body>

</html>