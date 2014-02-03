<?php


include "MPDF/mpdf.php";
include "../Core/Settings.php";
include "../Core/Database.php";
	
	
$mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , "Test" , "tets");
$mpdf->setBasePath('');
$stylesheet = '.bordered th {
					background-color: #dce9f9;
					border-top: none;
				}';
				
				
				
		$Style = false;
				
	if (file_exists("DataDump/Fatal.txt")){
		$mpdf->AddPage();
		if ($Style === false){
			$mpdf->WriteHTML($stylesheet,1);
			$Style = true;
		}
			$mpdf->WriteHTML(file_get_contents("DataDump/Fatal.txt"));
	}
	
	if (file_exists("DataDump/Warning.txt")){
		$mpdf->AddPage();
		if ($Style === false){
			$mpdf->WriteHTML($stylesheet,1);
			$Style = true;
		}
		$mpdf->WriteHTML(file_get_contents("DataDump/Warning.txt"));
	}
	
	if (file_exists("DataDump/Depreciated.txt")){
		$mpdf->AddPage();
		if ($Style === false){
			$mpdf->WriteHTML($stylesheet,1);
			$Style = true;
		}
		$mpdf->WriteHTML(file_get_contents("DataDump/Depreciated.txt"));
	}
	
	if (file_exists("DataDump/Unknown.txt")){
		$mpdf->AddPage();
		if ($Style === false){
			$mpdf->WriteHTML($stylesheet,1);
			$Style = true;
		}
		$mpdf->WriteHTML(file_get_contents("DataDump/Unknown.txt"));
	}
	
	if (file_exists("DataDump/DBStats.txt")){
		$mpdf->AddPage();
		if ($Style === false){
			$mpdf->WriteHTML($stylesheet,1);
			$Style = true;
		}
		$mpdf->WriteHTML(file_get_contents("DataDump/DBStats.txt"));
	}
// Foreach being automatically populated with an array from the glob.. Selecting all the text documents within out DataDump Directory 
	foreach (glob("DataDump/*.txt") as $filename) {
    unlink($filename); // Unlink serves as a delete function, so this is used as a cleanup 
	} // End Foreach 

if (isset($_GET['FileName'])){
	$Report_Date = date('Y-m-d');
	$mpdf->Output($_GET['FileName'].'.pdf','F');
	$Contents = file_get_contents($_GET['FileName'].'.pdf');
	$Query = $DB->prepare("INSERT INTO StoredPDF (FileName,Data,Created)
	values 
	(?,?,?)
	");
	$Query->bind_param('sss',$_GET['FileName'],$Contents,$Report_Date);
	$Query->execute();
	$Query->close();
	unlink ($_GET['FileName'].'.pdf');
}

 $mpdf->Output();









?>