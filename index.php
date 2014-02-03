<?php
	include ("./Handler.php");
	include ("./Core/Settings.php");
	include ("./Core/Database.php");
	include ("Global.inc.php");
	
	
	include ("Session.php");
		
	/*
		Create an array from the $_SERVER['REQUEST_URI']
	*/
	$Parameters = explode("/",$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]); 
	/*
		Use Unset to remove the first index, this being the website eg:
			127.0.0.1/
	*/
		unset($Parameters[0]);
	/*
		Check if the constant: IsSubDir is set to true 
	*/
		if (IsSubDir){
		/*
			If set to true, remove the second index of the array which would contain the SubDirectory 
		*/
			unset($Parameters[1]);
		}
		
	/*
		Re-index the $Parameters array this is being done so the index is set back to 0
	*/
		$Parameters = array_values($Parameters);
			
	/*
		Create the link to the main API
	*/
	$Views = new Smarty_Views(TemplateDir,TemplateName,$Parameters);
	
	/*
		Create the link to the Post Validation API
	*/
	$FormValidation = new Post_Validations;
	
	/*
		After Submitting a $_POST, search for FormID, If detected pass the ID into the method
	*/
		if (isset($_POST)){
			if (isset($_POST['FormID'])){
				$FormValidation->FormID(intval($_POST['FormID'],10));
			}
		}
	
	
	/*
		Display The Page which is located in the first element of the new array 
	*/
	if (empty($Parameters[0])){
		$Views->Display_Page("index");
		exit;
	}
	$Views->Display_Page($Parameters[0]);
	
?>