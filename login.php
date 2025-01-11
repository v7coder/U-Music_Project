<?php
$showerr = "false";
$conn = mysqli_connect("localhost", "root", "", "test");
if(session_status() != PHP_SESSION_NONE){
	session_destroy();
}
session_start();
session_unset();
if ($_SERVER['REQUEST_METHOD']=="POST") {
	$unm = $_POST['email'];
	$Pass = $_POST['password'];
	$res = mysqli_query($conn, "SELECT * FROM `umusic` WHERE `email`='$unm' AND `password`='$Pass';");
	if (mysqli_num_rows($res)>0) {
		session_start();
		$_SESSION['LOGGEDunmIN'] = $unm;
		header("Location: index.php");
	}
	else{
		$showerr = 'true';
	}
	echo var_dump(mysqli_fetch_all($res, MYSQLI_ASSOC));
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>U-Music Login Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		if (<?php echo $showerr;?>) {
			alert("Incorrect email or password");
			// window.location.href = "google.com";
		}
	</script>
</head>
<body>	
		<div class="nav">
			<div class="logo">
				<a href="index.php"><img src="logos.png" alt="logo" width="30"></a>
				&nbsp;&nbsp;
				<h2>Music</h2>
			</div>
			<p style="font-size: 1rem;">Listen to your heart</p>
		</div>
	<center>
		<form method="POST" action="login.php">
			<div>
				<a href="index.php"><img src="logos.png" width="40"></a>
				<h1><strong>Music</strong></h1>
			</div><hr><br>
			<h4>Login Credentials</h4><br>
			<label></label>
			<input type="text" name="email" required="" id="input" placeholder="Email">
			<br><br>
			<label></label>
			<input type="password" name="password" minlength="8" required="" id="input" placeholder="Password">
			<br><br>
			<div class="reset">
				<input type="submit" value="Login" id="submit">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="reset" value="Clear" id="submit">
			</div>
			<br>
			<h5><a href="forgotpass.php">forgot password</a></h5><br>
			<h5><a href="register.php">If don't have account</a></h5>
		</form>
	</center>
</body>
</html>