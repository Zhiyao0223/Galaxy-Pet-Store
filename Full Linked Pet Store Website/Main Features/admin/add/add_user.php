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
	<title>Add data</title>
	<link rel='stylesheet' href='form.css'>
</head>

<body>
	<h1>Add New User</h1>
	<div class='backBtn'>
		<a href='../admin.php'>
			< Back</a>
	</div>
	<form action="insert_user.php" method="post">
		<div id="container">
			<div class="section">
			</div>
			<div class="section">
				<div class="label">
					Username
				</div>
				<div class="field">
					: <input type="text" name="username" value=' ' required="required">
				</div>
			</div>

			<div class="section">
				<div class="label">
					Password
				</div>
				<div class="field">
					: <input type="text" name="password" value=' ' required="required">
				</div>
			</div>

			<div class="section">
				<div class="label">
					Email Address
				</div>
				<div class="field">
					: <input type="email" name="email_address" value=' ' required="required">
				</div>
			</div>

			<div class="section">
				<div class="label">
					Roles
				</div>
				<div class="field">
					: <select required="required" name="roles">
						<option value='user'>User</option>
						<option value="admin">Admin</option>
					</select>
				</div>
			</div>

			<div class="field">
				<input type="submit" name="submit" value="Submit">
				<input type="reset" value="Reset">
			</div>
		</div>
	</form>
</body>

</html>