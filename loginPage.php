<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login/Registration</title>
	<link rel="stylesheet" href="loginStyling.css">
</head>
<body class="loginBody">
	<div class="loginMainBox">
		<div id="loginBox">
			<h2>User Login</h2>
			<form action="loginProcess.php" method="post">
				<input type="hidden" name="action" value="login">
				<p>Email: <input type="email" name="email"></p>
				<p>Password: <input type="password" name="password"></p>
				<input class="button" type="submit" value="Login">
			</form>
			<?php
				if(isset($_SESSION['loginErrors']))
				{
					foreach ($_SESSION['loginErrors'] as $value)
					{
						echo"<p class='error'>$value</p>";
					}
					unset($_SESSION['loginErrors']);
				}
			 ?>
		</div>
		<div id="registrationBox">
			<h2>New User Registration</h2>
			<form action="loginProcess.php" method="post">
				<input type="hidden" name="action" value="register">
				<p>First Name: <input type="text" name="first_name"></p>
				<p>Last Name: <input type="text" name="last_name"></p>
				<p>Email: <input type="email" name="email"></p>
				<p>Password: <input type="password" name="password"></p>
				<p>Confirm Password: <input type="password" name="confirm_password"></p>
				<input class="button" type="submit" value="Register"></p>
			</form>
			<?php
				if(isset($_SESSION['registerErrors']))
				{
					foreach ($_SESSION['registerErrors'] as $value) {
						echo"<p class='error'>$value</p>";
					}
					unset($_SESSION['registerErrors']);
				}
			 ?>
		</div>
	</div>
</body>
</html>