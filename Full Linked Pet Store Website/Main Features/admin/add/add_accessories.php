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
	<title>Add Records</title>
	<link rel='stylesheet' href='form.css'>
</head>

<body>
	<h1>Add New Accessories</h1>
	<div class='backBtn'>
		<a href='../admin.php'>
			< Back</a>
	</div>
	<form action="insert_accessories.php" method="post">
		<div id="container">
			<div class="section">
			</div>
			<div class="section">
				<div class="label">
					Accessories Name
				</div>
				<div class="field">
					: <input type="text" name="accessories_name" value=' ' required="required">
				</div>
			</div>
			<div class="section">
				<div class="label">
					Price
				</div>
				<div class="field">
					: <input type="number" name="accessories_price" step='0.1' min="0" required="required">
				</div>
			</div>
			<div class="section">
				<div class="label">
					Image Name
				</div>
				<div class="field">
					: <input type="text" name="accessories_image" value=' ' value=' ' required="required">
				</div>
			</div>
			<div class="section">
				<div class="label">
					Type
				</div>
				<div class="field">
					: <input type="text" name="type" value=' ' value=' ' required="required">
				</div>
			</div>

			<div class="submitSection">
				<input type="submit" name="submit" value="Submit">
				<input type="reset" value="Reset">
			</div>
			<div>
	</form>
</body>

</html>