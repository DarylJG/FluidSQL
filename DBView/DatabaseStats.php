<?php
	include "../Core/Settings.php";
	include "../Core/Database.php";
	include "../Handler.php";
	unset($DB);
	$DB = new mysqli(DBHost,DBUser,DBPass);
	
		$Return_Array = array();

	$Return_Array = array();
	$Query = $DB->prepare("SHOW SCHEMAS");
	$Query->execute();
	$Query->bind_result($Schema);
	$Query->store_result();
	while ($Query->fetch()){
		$Return_Array[$Schema] = array(
			"Table_Count" => 0,
			"View_Count" => 0
		);
		$List_Tables = $DB->prepare("SHOW FULL TABLES FROM ".$Schema);
		$List_Tables->execute();
		$List_Tables->bind_result($TableName, $TableType);
		while($List_Tables->fetch()){
			if ($TableType === 'VIEW'){
				$Return_Array[$Schema]['View_Count']++;
			}else{
				$Return_Array[$Schema]['Table_Count']++;
			}
		}
	}

			// Create a base structure which will be later used to be appended/added to a text file
		$_2 = '<table class="bordered" width="30%" border="1">
				<tr>
				<th width="30%">Schema Name</th>        
				<th width="10%">Number Of Tables</th>
				<th width="10%">Number Of Views</th>
				</tr>
			';
		$_3 = NULL; //Declare to handle undefined warnings and  Set to null because the data from the inner foreach will be populated here 
		$_4 = '</table><br>';
	
	foreach ($Return_Array AS $Key => $Value){
		$Table_Count = $Value['Table_Count'];
		$View_Count = $Value['View_Count'];
		$_3.= '
			<tr>
				<td>'.$Key.'</td>
				<td>'.$Table_Count.'</td>
				<td>'.$View_Count.'</td>
			</tr>
			';
	
	}
		$file = "DataDump/DBStats.txt";
			file_put_contents($file, $_2.$_3.$_4, FILE_APPEND | LOCK_EX);
	if (isset($_GET['FileName'])){
		header("Location: View_PDF.php?FileName=".$_GET['FileName']);
		exit;
	}
	header("Location: View_PDF.php");
	exit;
	/*
		@Version 1.3
	*/
?>