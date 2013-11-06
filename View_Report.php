<?php
	include "Global.inc.php";
	if (!isset($_GET['ReportID'])){
		header ("Location: View_Stored.php");
		exit;
	}

	include "HTML/Headers.php";
	?>
	

<body>
	<?php include "HTML/TopBar.php"; ?>
		<div class="container-fluid">
		<div class="row-fluid">
				
		<?php include "HTML/Navigation.html"; ?>
		<?php include "HTML/Top2.php"; ?>
			
	<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Report View</h2>
					</div>
					<div class="box-content">
						
						<iframe src="Core/GetPDF.php?ReportID=<?php echo $_GET['ReportID']; ?>" style="width:1000px; height:500px;" frameborder="0"></iframe>
						
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
			
	

			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<footer>
			<p class="pull-left">&copy; <a href="#" target="_blank">Daryls Development</a> 2013-2015</p>
		</footer>
		
	</div>
	
	<?php include "HTML/Footers.html";?>
