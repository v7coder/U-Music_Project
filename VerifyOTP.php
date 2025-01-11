<?php
$conn = mysqli_connect("localhost", "root", "", "test");
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_mail($to, $code)
{
    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "bhorr0459@gmail.com";
    $mail->Password = "hzcgczvwpsxihlbi";
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom("bhorr0459@gmail.com");
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = "Email Verification Code For U Music";
    $mail->Body = "<div style='font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2'><div style='margin:50px auto;width:70%;padding:20px 0'><div style='border-bottom:1px solid #eee'><a href='' style='font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600'>U Music Web</a></div><p style='font-size:1.1em'>Hi,</p><p>Use the following OTP to complete your Sign Up procedures for U Music. OTP is valid for 5 minutes</p><h2 style='background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;'>" . $code . "</h2><p style='font-size:0.9em;'>Regards,<br />U Music Web</p><hr style='border:none;border-top:1px solid #eee' /><div style='float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300'><p>U Music  Web</p></div></div></div>";
    $mail->send();
}

if ($_SERVER['REQUEST_METHOD']=="POST") {

	$_SESSION['reg_name'] = $_POST['name'];
	$_SESSION['reg_pass'] = $_POST['password'];
	$_SESSION['reg_eml'] = $_POST['email'];
	$tmpeml = $_POST['email'];

	if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `umusic` WHERE `email`='$tmpeml';"))>0) 
	{
		$showPOP = "Account with this email already exists. Kindly use another Email-id";
		$redirect = "/umusic/register.php";
	}
	else{
		$_SESSION['reg_otp'] = (string)random_int(100000, 999999);
		send_mail($_SESSION['reg_eml'], $_SESSION['reg_otp']);
		$showPOP = "An Email containing the code(OTP) has been sent to ".$_SESSION['reg_eml'];
	}
}
if ($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['reg_otp'])) 
{
	if ($_GET['reg_otp']==$_SESSION['reg_otp']) 
	{
		mysqli_query($conn, "INSERT INTO `umusic` (`id`, `name`, `email`, `password`)
		VALUES (NULL, '".$_SESSION['reg_name']."', '".$_SESSION['reg_eml']."', '".$_SESSION['reg_pass']."');");
		$showPOP = "OTP correct. Account created";
		$redirect = "/umusic/login.php";
	}
	else{
		$showPOP = "OTP incorrect";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>U-Music Login Page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		if (<?php echo (isset($showPOP)) ? "true" : "false" ;?>) {
			alert("<?php echo $showPOP;?>");
		}
		if (<?php echo (isset($redirect)) ? "true" : "false" ;?>) {
			window.location.href = "<?php echo $redirect;?>";
		}
	</script>
</head>
<body>	
		<div class="nav">
			<div class="logo">
				<img src="logos.png" alt="logo" width="30">
				&nbsp;&nbsp;
				<h2>Music</h2>
			</div>
			<p style="font-size: 1rem;">Listen to your heart</p>
		</div>
	<center>
		<form method="GET" action="VerifyOTP.php">
			<div>
				<img src="logos.png" width="40">
				<h1><strong>Music</strong></h1>
			</div><hr><br>
			<h4 style="font-family: serif;margin-bottom: 8px;">OTP VERIFICATION</h4>
			<p style="font-family: serif;color: green;padding: 4px 6px;border: 1px solid green;">Please check your email account for the verification code (OTP).</p><br>
			<input type="text" name="reg_otp" required minlength="6" maxlength="6" id="input" placeholder="Enter OTP" style="border-radius: 10px;">
			<br><br>
			<div class="reset">
				<input type="submit" value="Verify" id="submit">
			</div>
			<br>
			<h5><a href="register.php">Resend OTP</a></h5>
		</form>
	</center>
</body>
</html>