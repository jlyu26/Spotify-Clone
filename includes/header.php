<!-- every page contains the navigation bar and header -->

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

	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	<div id="mainContainer">
		
		<div id="topContainer">
			
			<?php include("includes/navBarContainer.php"); ?>

			<div id="mainViewContainer">
				
				<div id="mainContent">