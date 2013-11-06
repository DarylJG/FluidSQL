<?php
	/*
		Created By Daryls Development 
			Change this error handler to suit your output needs
	
	*/


	// Set Default timezone for error reporting 
	date_default_timezone_set('Europe/London');
	
	// Set default instance to access to the reporting database schema and necessary tables 
	$_SQLInstance = new mysqli ("HOST", "USER", "PASSWORD","DBSCHEMA");
	
	
function errorHandler($errno, $errstr, $errfile, $errline)
{
	global $_SQLInstance; // Make Database Object Accessible 
	$Date_Time = date('Y-m-d h:i:s', time());
	$Insert_Query = $_SQLInstance->prepare("
	INSERT INTO error_report (ErrorType, ErrorMSG, ErrorLine, File,ReportStructure)
	VALUES
	(?,?,?,?,?)
	");
	$Insert_Query->bind_param('isiss',$errno,$errstr,$errline,$errfile,$Date_Time);
	$Insert_Query->execute();
	$Insert_Query->close();
	
	switch ($errno){
	 case E_USER_ERROR:
        echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
        echo "  Fatal error on line $errline in file $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Aborting...<br />\n";
        exit(1);
        break;

    case E_USER_WARNING:
        echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
        break;

    default:
        echo "Unknown error type: [$errno] $errstr<br />\n";
        break;
	}
	return true;
	
}

Set_Error_Handler("errorHandler");

?>