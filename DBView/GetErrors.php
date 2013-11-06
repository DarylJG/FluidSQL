<?php
	include "../Core/DB_Con.php";
	include "../Handler.php";
	
	/*
		The purpose of this file is to obtain records from a SQL Table containing Error Reports and display them in a Seperate PDF with Table Categories
		
		@Author: Daryl Gill
		@Github: https://github.com/DarylJG
		@E-mai: daryl_gill@hotmail.co.uk
	*/
	
	
		// Step 1, create a pre-ordered array containing pre-set category strings
		$Array = array(
			"Fatal" => array(),
			"Warning" => array(),
			"Depreciated" => array(),
			"Unknown" => array()			
		); 
		
		// Step 1, Perform a Query to the Schema Table requesting the necessary information 
	$Query = $DB->prepare("SELECT * FROM error_report ORDER BY ErrorType ASC");
	$Query->execute();
	$Results = $Query->get_result(); // Use get_result to allow MySQLi to fetch an array 
	while($Return_Array = $Results->fetch_array(MYSQLI_ASSOC)){
		// Loop through the SQL result set to return all results from the table. From Here, we will change the stored data type (int) into a readable string 
				$Type = "4";
			switch($Return_Array['ErrorType']){
				case 256:
					$Return_Array['ErrorType'] = "Fatal";
					break;
				case 1:
					$Return_Array['ErrorType'] = "Fatal";
					break;
				case 2:
					$Return_Array['ErrorType'] = "Warning";
					break;
				case 3:
					$Return_Array['ErrorType'] = "Depreciated";
					break;
				case 8192:
					$Return_Array['ErrorType'] = "Depreciated";
					break;
				default:
					$Return_Array['ErrorType'] = "Unknown";
					break;
			}
		// Add Every element of the array pulled from the table into the pre-set array in the correct category 
			$Array[$Return_Array['ErrorType']][$Return_Array['ID']] = $Return_Array; 
	} // End WhileLoop
	foreach ($Array AS $Key => $First_Dimension){
			
			// Create a base structure which will be later used to be appended/added to a text file
				$_1 = "<h2>Logged ".$Key."</h2>";
				$_2 = '<table class="bordered" border="1">
						<tr>
								<th width="3%">Error ID</th>        
								<th width="70%">Error Message</th>
								<th width="5%">Line</th>
								<th width="11%">File</th>
								<th width="11%">Reported</th>
						</tr>';
			$_3 = NULL; //Declare to handle undefined warnings and  Set to null because the data from the inner foreach will be populated here 
			$_4 = '</table><br>';
			// The location we will save the seperate files

			if (!empty($First_Dimension)){


		foreach ($First_Dimension AS $Arr){
		// Create variable placeholders that have pre-searched into the array and stored the current value 
			
			$Arr_ID = $Arr['ID'];
			$Arr_Type = $Arr['ErrorType'];
			$Arr_Msg = $Arr['ErrorMsg'];
			$Arr_Line = $Arr['ErrorLine'];
			$Arr_File = $Arr['File'];
			$Arr_TimeStamp = $Arr['ReportStructure'];

			$file = "DataDump/".$Arr_Type.".txt";
			$_3.= '
			<tr>
				<td>'.$Arr_ID.'</td>
				<td>'.$Arr_Msg.'</td>
				<td>'.$Arr_Line.'</td>
				<td>'.$Arr_File.'</td>
				<td>'.$Arr_TimeStamp.'</td>
			</tr>
			'; // Populate the nulled variable set above 
		} // End Inner Foreach
		
		// Placed out of the inner foreach, this allows the function to input the finalized HTML into a text file before moving onto the second key of the array
		file_put_contents($file, $_1.$_2.$_3.$_4, FILE_APPEND | LOCK_EX);	
	} // End primary Foreach
}
	
	// Redirect to the View_log page which will display the overall file in a PDF Document 
	
	if (isset($_GET['Continue'])){
			$Direct = "Location: ";
		if ($_GET['Continue'] === 'yes'){
			$Direct .= 'DatabaseStats.php';
		}
		if ($_GET['Continue'] === 'no'){
			$Direct .= "View_PDF.php";
		}
		if (isset($_GET['FileName'])){
			$Direct .= '?FileName='.$_GET['FileName'];
		}
		header ($Direct);
		exit;
	}
	
	/*
		@Version 1.1
	*/

?>