<?php

	include "Steps.php";	
	switch ($Step){
		case 1:
			include "Database_Configuration.php";
			break;
		case 2:
			include "Install_Tables.php";
			break;
		case 3: 
			include "Users_Configuration.php";
			break;
		default:
			trigger_error("Cannot Comply", E_USER_ERROR);
			break;
	}






?>