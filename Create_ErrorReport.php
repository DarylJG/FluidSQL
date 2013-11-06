<?php
	include "HTML/Headers.html";
	include "Global.Inc.php";
?>


<body>
	<?php include "HTML/TopBar.php"; ?>

		<div class="container-fluid">
		<div class="row-fluid">
				
		<?php include "HTML/Navigation.php"; ?>
		<?php include "HTML/Top2.php"; ?>

		
		
<?php
	if (isset($_POST['ErrorReport'])){
		$Obtain_Errors = 0;
		$Obtain_Stats = 0;
		if (isset($_POST['GatherReport'])){
		// User wants to obtain Errors 
		$Obtain_Errors = 1;
		}
		if (isset($_POST['SchemaStatistics'])){
		// User wants to Obtain Schema Statistics 
		$Obtain_Stats = 1;
		}
		if (isset($_POST['SaveFile'])){
			$Save_Name = $_POST['FileName'];
		}
		if ($Obtain_Errors === 1 && $Obtain_Stats === 1){
			$Header_Direct = 'GetErrors.php?Continue=yes';
			if (isset($Save_Name)){
				$Header_Direct .= '&&FileName='.$Save_Name;
			}
		}
		if ($Obtain_Errors === 1 && $Obtain_Stats === 0){
			$Header_Direct = 'GetErrors.php?Continue=no';
			if (isset($Save_Name)){
				$Header_Direct .= '&&FileName='.$Save_Name;
			}
		}
		if ($Obtain_Errors === 0 && $Obtain_Stats === 1){
			$Header_Direct = 'DatabaseStats.php';
			if (isset($Save_Name)){
				$Header_Direct .= '&&FileName='.$Save_Name;
			}
		}
		echo '
						<div class="alert alert-success">
							<strong>
								Your PDF View is now available  <a href="./DBView/'.$Header_Direct.'" target="_blank">Click Here</a> To View
							</strong>
						</div>
							
							';
									
	}
					
					?>	
<script type="text/javascript">
<!--
function ShowFileName (ShowElement, CheckBox) {
  var vis = (CheckBox.checked) ? "block" : "none";
  document.getElementById(ShowElement).style.display = vis;
}
//-->
</script>
			
			<div class="row-fluid">
								<div class="span12 well">
		
					
						<h3><i></i>Reporting Criteria</h3>
					<div class="box-content">

					<form action=<?=$_SERVER['PHP_SELF'];?> method="POST">
						<input type="checkbox" onclick="ShowFileName('FileName', this)" name="SaveFile" value="SaveFile">Save File In DB <br>	
						
						<div id="FileName" style="display:none;">
						<strong>File Name</strong> <input type="text" name="FileName" value="FileName"><br>
						</div>
						<input type="checkbox" name="GatherReport" value="ErrorTrue">Gather Error Report <br>
						<input type="checkbox" name="SchemaStatistics" value ="SchemaTrue">Gather Schema Statistics <br><br>
						<input class="btn btn-large btn-primary btn-round" type="submit" name="ErrorReport" value="Generate Error Report">
					</form> 

					</div>
				</div><!--/span-->

						

	
			</div><!--/row-->

			<div class="row-fluid sortable">
					

			</div><!--/row-->
				  

		  
       
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>


		<footer>
			<p class="pull-left">&copy; <a href="" target="_blank">Daryls Development</a> 2013-2015</p>
		</footer>
		
	</div>
	
	<?php include "HTML/Footers.html"; ?>
