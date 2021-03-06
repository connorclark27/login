<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();

	$id = $_SESSION['users_id'];
	$tbl = "tbl_user";
	$col = "user_id";
	$popForm = getSingle($tbl, $col, $id);
	$info = mysqli_fetch_array($popForm);
	//echo $info;

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($id, $fname, $username, $password, $email);
		$message = $result;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit User</title>
<link rel="stylesheet" href="css/app.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>
	<h2 id="welcomeTitle">Edit User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_edituser.php" method="post">
		<label class="createLabel">First Name:</label>
		<input type="text" name="fname" value="<?php echo $info['user_fname'];  ?>"><br><br>
		<label class="createLabel">Username:</label>
		<input type="text" name="username" value="<?php echo $info['user_name'];  ?>"><br><br>
		<label class="createLabel">Password:</label>
		<input type="text" name="password" value="<?php echo $info['user_pass'];  ?>"><br><br>
		<label class="createLabel">Email:</label>
		<input type="text" name="email" value="<?php echo $info['user_email'];  ?>"><br><br>
		<input type="submit" name="submit" value="Edit Account">
	</form>
</body>
</html>