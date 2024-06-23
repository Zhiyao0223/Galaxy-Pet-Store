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
	<h1>Add New Pet Food</h1>
	<div class='backBtn'>
		<a href='../admin.php'>
			< Back</a>
	</div>
	<form action="insert_food.php" method="post">
		<div id="container">
			<div class="section">
			</div>
			<div class="section">
				<div class="label">
					Food Name
				</div>
				<div class="field">
					: <input type="text" name="Food_Name" value=' ' required="required">
				</div>
			</div>
			<div class="section">
				<div class="label">
					Price
				</div>
				<div class="field">
					: <input type="number" min='0' step='0.1' name="Price" required="required">
				</div>
			</div>
			<div class="section">
				<div class="label">
					Image Name
				</div>
				<div class="field">
					: <input type="text" value=' ' name="image" required="required">
				</div>
			</div>
			<div class="field">
				<input type="submit" name="submit" value="Submit">
				<input type="reset" value="Reset">
			</div>
			<div>
	</form>
</body>

</html>