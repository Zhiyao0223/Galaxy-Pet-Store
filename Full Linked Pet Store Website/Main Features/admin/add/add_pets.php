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
	<title>Add Records</title>
	<link rel='stylesheet' href='form.css'>
</head>
<body>
	<h1>Add New Pet</h1>
	<div class='backBtn'>
		<a href='../admin.php'>< Back</a>
	</div>
	<form action="insert_pet.php" method="post">
		<div id="container">

			<div class="section">
				<div class="label">
					Type
				</div>
				<div class="field">
					: <input type="text" value=" " name="type" required="required">
				</div>
			</div>

			<div class="section">
				<div class="label">
					Name
				</div>
				<div class="field">
					: <input type="text" value=" " name="name" required="required">
				</div>
			</div>

			<div class="section">
				<div class="label">
					Breed
				</div>
				<div class="field">
					: <input type="text" value=" " name="breed" required="required">
				</div>
			</div>

			<div class="section">
				<div class="label">
					Price (RM)
				</div>
				<div class="field">
					: <input type="number" step="0.1" min="0" name="price" required="required">
				</div>
			</div>

			<div class="section">
				<div class="label">
					Age (Months)
				</div>
				<div class="field">
					: <input type="number" min="0" name="age" required="required">
				</div>
			</div>

			<div class="section">
				<div class="label">
					Colour
				</div>
				<div class="field">
					: <input type="text" value=" " required="required" name="colour">
				</div>
			</div>

			<div class="section">
				<div class="label">
					Gender
				</div>
				<div class="field">
					: <select required="required" name="gender">
						<option value="" selected disabled>Please Select</option>
						<option value="M">Male</option>
						<option value="F">Female</option>
					</select>
				</div>
			</div>

			<div class="section">
				<div class="label">
					Vaccine Status
				</div>
				<div class="field">
					: <select required="required" name="vaccine_status">
						<option value="" selected disabled>Please Select</option>
						<option value="T">True</option>
						<option value="F">False</option>
					</select>
				</div>
			</div>

			<div class="section">
				<div class="label">
					Dewormed Status
				</div>
				<div class="field">
					: <select required="required" name="dewormed_status">
						<option value="" selected disabled>Please Select</option>
						<option value="T">True</option>
						<option value="F">False</option>
					</select>
				</div>
			</div>
			<div class="section">
				<div class="label">
					Additional Info (HTML)
				</div>
				<div class="field">
					: <textarea required="required" name="additional_info" height='500px'> </textarea>
				</div>
			</div>
			<div class="section">
				<div class="label">
					Picture 1
				</div>
				<div class="field">
					: <input type='text' value=" " required="required" name="picture1">
				</div>
			</div>

			<div class="section">
				<div class="label">
					Picture 2
				</div>
				<div class="field">
					: <input type='text' value=" " required="required" name="picture2">
				</div>
			</div>

			<div class="section">
				<div class="label">
					Picture 3
				</div>
				<div class="field">
					: <input type='text' value=" " required="required" name="picture3">
				</div>
			</div>

			<div class="section">
				<div class="label">
					Picture 4
				</div>
				<div class="field">
					: <input type='text' value=' ' required="required" name="picture4">
				</div>
			</div>

			<div class="section">
				<div class="label">
					Page Link
				</div>
				<div class="field">
					: <input type="text" value=" " name="link" required="required">
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