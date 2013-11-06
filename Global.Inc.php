<?php
		// Error Handler 
	include "Handler.php";
	
	// Database Connection 
	include "Core/DB_Con.php";
	
	// Session Checker 
	include "Check_session.php";
	
	// Authentication Class
	include "Core/Authentication.php";
	
	
	// Get Statistics Start
		$Error_Query = $DB->prepare("SELECT ID from error_report");
		$Error_Query->execute();
		$Error_Query->store_result();
		$Error_Count = $Error_Query->num_rows;
		$Error_Query->close();
		$Member_Query = $DB->prepare("SELECT ID FROM users");
		$Member_Query->execute();
		$Member_Query->store_result();
		$Member_Count = $Member_Query->num_rows;
		$Member_Query->close();
	
	// Finish Getting Statistics 
	
	
?>