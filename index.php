<?php
	include("includes/config.php");

	// session_destroy();
	
	if (isset($_SESSION['userLoggedIn'])) {
		$userLoggedIn = $_SESSION['userLoggedIn'];
	} else {
		header("Location: register.php");
	}

?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Spotify Clone</title>
</head>
<body>
	Hi there!
</body>
</html>