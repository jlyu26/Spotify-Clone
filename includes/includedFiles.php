<?php

	if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {	// if user visit from AJAX
		include("includes/config.php");
		include("includes/classes/Artist.php");
		include("includes/classes/Album.php");
		include("includes/classes/Song.php");
	} else {	// if user visit page from url directly
		// load header and footer files
		include("includes/header.php");
		include("includes/footer.php");

		$url = $_SERVER['REQUEST_URI'];
		echo "<script>openPage('$url')</script>";
		exit();
	}

?>