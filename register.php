<?php 
if(session_status() != PHP_SESSION_NONE){
	session_destroy();
}
session_start();
session_unset();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>U-Music Regestration Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="register.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		function myfee(){
			String a = document.getElementById("input").value="";
			String b = document.getElementById("pass").value="";
			if (a!=b) {
				alert("Passwords doesn't match");
				return false;
			}
		}
	</script>

	<style type="text/css">
		form
{
	padding: 20px 10px 20px 10px;
	margin-top: 5vh;
}
label
{
	float: left;
	margin-left: 30px;
	font-family: serif;	
	padding-bottom: 5px;
}
#input
{
	border-radius: 10px;
}
	</style>


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
		<form method="POST" action="VerifyOTP.php" onsubmit="mypage()" >
			<div>
			<a href="index.php"><img src="logos.png" width="40"></a>
				<h1><strong>Music</strong></h1>
			</div><hr><br>
			<h4><u>Register Credentials</u></h4><br>
			<label>Full Name</label>
			<input type="text" name="name" id="input" placeholder="Full Name" required="" >
			<br><br>
			<label>Email Id</label>
			<input type="email" name="email"  id="input" placeholder="Email" required="" >
			<br><br>
			<label>Password</label>
			<input type="password" name="password" minlength="6" id="input" placeholder="password" >
			<br><br><span id="message"></span>
			<label>Confirm Password</label>
			<input type="password" name="Confirm-password" id="input" id="Pass" placeholder="Confirm-password">
			<br><br>
			<div class="reset">
				<input type="submit" value="Submit" id="submit" >
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="reset" value="Clear" id="submit">
			</div>
			<br>
			<h5><a href="index.php">Welcome to <strong>U</strong> music</a></h5>
		</form>
	</center>
</body>
</html>