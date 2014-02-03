<?php
		
	if (!$DB = new mysqli(DBHost,DBUser,DBPass,DB)){
		trigger_error("Cannot Connect To Database, Check Credentials",E_USER_ERROR);
	}

?>