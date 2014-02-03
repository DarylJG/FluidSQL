<?php 
	include ("./Core/Settings.php");
	$Constants = get_defined_constants(true)['user'];
	echo "<pre>";
	if (isset($Constants['ServerName'])){
		echo "Server Name: ".$Constants['ServerName'];
	}
		echo "<br><br>";
	if (isset($Constants['IsSubDir'])){
		if ($Constants['IsSubDir'] === true){
			echo "FluidSQL is located in a sub directory";
		}else{
			echo "FluidSQL is not located in a sub directory";
		}
	}
		echo "<br><br>";
	if (isset($Constants['SubDir'])){
		if ($Constants['IsSubDir'] === true){
			echo "Sub Directory Name: ".$Constants['SubDir'];
			echo "<br><br>";
		}
	}
	
	if (isset($Constants['TemplateDir'])){
		echo "Template Directory: ".$Constants['TemplateDir'];
	}
		echo "<br><br>";
	if (isset($Constants['TemplateName'])){
		echo "Template Name: ".$Constants['TemplateName'];
	}
		echo "<br><br>";
	if (isset($Constants['SmartyLib'])){
		echo "Smarty Package Located In: ".$Constants['SmartyLib'];
	}
		echo "<br><br>";
	if (isset($Constants['SitePhysical'])){
		echo "Site Phyical Path: ".$Constants['SitePhysical'];
	}
		echo "<br><br>";
		$TemplateDir = "";
		if ($Constants['IsSubDir'] === true){
				$TemplateDir = '/'.$Constants['SubDir'].'/'.$Constants['TemplateDir'].'/'.$Constants['TemplateName'];
		}else{
			$TemplateDir = '/'.$Constants['TemplateDir'].'/'.$Constants['TemplateName'];
		}
			echo "HTML Directory: ".$TemplateDir.'/HTML/';
			echo "<br><br>";
			echo "CSS Directory: ".$TemplateDir.'/CSS/';
			echo "<br><br>";
			echo "Compile Directory: ".$TemplateDir.'/Compiler/';
			echo "<br><br>";
			echo "Javascript Directory: ".$TemplateDir.'/JS/';	
			echo "<br><br>";

		echo "<br><br>"; 
	?>
	Checking if templates are found:
	<?php 
		
	foreach (glob("..".$TemplateDir."/HTML/*.*") as $filename) {
		$filename = explode('/',$filename);
		$filename = end($filename);
	echo	$filename;
	?>
	<br>
	<?php
	}
	
	?>
	
	
	
<?php
	echo "</pre>";
	
	
?>

