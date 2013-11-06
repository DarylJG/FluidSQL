<?php
	session_start();
	if (!isset($_SESSION['Login'])){
		header("Location: index.php?Errors=".urlencode("Please Login To Continue"));
		#session_destroy;
		exit;	

	}

?>