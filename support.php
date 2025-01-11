
<!DOCTYPE html>
<html>
<head>
	<title>U-Music Login Page</title>
	<link rel="stylesheet" type="text/css" href="boostrap.css">
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>	
		<div class="nav">
			<div class="logo">
				<a href="index.php"><img src="logos.png" alt="logo" width="30"></a>
				&nbsp;&nbsp;
				<h2 style="margin-top: 5px;">Music</h2>
			</div>
			<p>Listen to your heart</p>
		</div>

		<div class="container">
			<div class="row">
					<form>
						<label>Email</label>
						<input type="email" name="email" required>
						<label>subject</label>
						<input type="text" name="subject"><br>
						<label>message</label><br>
						<textarea cols="20" name="message"></textarea>
						<input type="submit" name="submit" value="Submit">
					</form>
				</div>
			</div>
		</div>
</body>
</html>