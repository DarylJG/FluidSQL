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
			
	<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>List Of Stored PDF Files</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>FileName</th>
								  <th>Date Created (YYYY-MM-DD)</th>
							  </tr>
						  </thead>   
						  <tbody>
						<?php
							$PDF_QUERY = $DB->prepare("SELECT ID,FileName,Created FROM storedpdf");
							$PDF_QUERY->execute();
							$PDF_QUERY->bind_result($PDF_ID,$PDF_FileName,$Date_Created);
							while ($PDF_QUERY->fetch()){

						?>					
							<tr>
								<td><?php echo '<a href="View_Report.php?ReportID='.$PDF_ID.'" target="_blank">'.$PDF_FileName.'</a>'; ?></td>
								<td><?php echo $Date_Created; ?> </td>
							</tr>
							
							<?php
								}
							?>
						  </tbody>
					  </table>            
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
