<?php
	include("includes/classes/account.php");

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register | Spotify Clone</title>
</head>
<body>
	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your account</h2>
			<p>
				<label for="loginUsername">Username:</label>
				<input id="loginUsername" name="loginUsername" type="text" placeholder="user name" required>
			</p>
			<p>
				<label for="loginPassword">Password:</label>
				<input id="loginPassword" name="loginPassword" type="password" required>
			</p>
			<button type="submit" name="loginButton">Login</button>	
		</form>


		<form id="registerForm" action="register.php" method="POST">
			<h2>Create your account</h2>
			<p>
				<label for="username">Username:</label>
				<input id="username" name="username" type="text" placeholder="user name" required>
			</p>

			<p>
				<label for="firstname">First name:</label>
				<input id="firstname" name="firstname" type="text" placeholder="first name" required>
			</p>

			<p>
				<label for="lastname">Last name:</label>
				<input id="lastname" name="lastname" type="text" placeholder="last name" required>
			</p>

			<p>
				<label for="email">Email:</label>
				<input id="email" name="email" type="email" placeholder="e.g. mymail@gmail.com" required>
			</p>

			<p>
				<label for="email2">Confirm email:</label>
				<input id="email2" name="email2" type="email" placeholder="e.g. mymail@gmail.com" required>
			</p>

			<p>
				<label for="password">Password:</label>
				<input id="password" name="password" type="password" placeholder="your password" required>
			</p>

			<p>
				<label for="password2">Confirm password:</label>
				<input id="password2" name="password2" type="password" placeholder="your password" required>
			</p>
			<button type="submit" name="registerButton">Sign Up</button>	
		</form>
	</div>
</body>
</html>