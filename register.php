<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if (isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register | Spotify Clone</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php
		if (isset($_POST['registerButton'])) {
			echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
		} else {
			echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
		}
	?>

	

	<div id="background">
		<div id="loginContainer">
			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Username:</label>
						<input id="loginUsername" name="loginUsername" type="text" value="<?php getInputValue('loginUsername') ?>" required>
					</p>
					<p>
						<label for="loginPassword">Password:</label>
						<input id="loginPassword" name="loginPassword" type="password" required>
					</p>
					<button type="submit" name="loginButton">LOG IN</button>

					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account yet? Signup here.</span>
					</div>
				</form>


				<form id="registerForm" action="register.php" method="POST">
					<h2>Create your account</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<label for="username">Username:</label>
						<input id="username" name="username" type="text" value="<?php getInputValue('username') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$firstnameCharacters); ?>
						<label for="firstname">First name:</label>
						<input id="firstname" name="firstname" type="text" value="<?php getInputValue('firstname') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastnameCharacters); ?>
						<label for="lastname">Last name:</label>
						<input id="lastname" name="lastname" type="text" value="<?php getInputValue('lastname') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email:</label>
						<input id="email" name="email" type="email" placeholder="e.g. mymail@example.com" value="<?php getInputValue('email') ?>" required>
					</p>

					<p>
						<label for="email2">Confirm email:</label>
						<input id="email2" name="email2" type="email" placeholder="e.g. mymail@example.com" value="<?php getInputValue('email2') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="password">Password:</label>
						<input id="password" name="password" type="password" required>
					</p>

					<p>
						<label for="password2">Confirm password:</label>
						<input id="password2" name="password2" type="password" required>
					</p>
					<button type="submit" name="registerButton">SIGN UP</button>	

					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? Login here.</span>
					</div>
				</form>
			</div>

			<div id="loginText">
				<h1>Music for everyone.</h1>
				<h2>One account. Listen everywhere.</h2>
				<ul>
					<li>Premium for your whole family. Just $14.99.</li>
					<li>Spotify Premium, now with Hulu. Only $4.99/month for students.</li>
					<li>Play Spotify on PlayStation<sup>®</sup> and on Xbox One<sup>®</sup>.</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>