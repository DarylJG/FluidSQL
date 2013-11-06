<?php
	include '../Global.Inc.php';
	$Get_PDF = $DB->prepare("SELECT Data FROM storedpdf WHERE ID=?");
	$Get_PDF->bind_param('i',$_GET['ReportID']);
	$Get_PDF->execute();
	$Get_PDF->bind_result($PDF_DATA);
	$Get_PDF->fetch();

	header('Content-type: application/pdf');
	echo $PDF_DATA;
	
?>