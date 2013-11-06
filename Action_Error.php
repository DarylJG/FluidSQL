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
						<h2><i class="icon-user"></i>Select An Error To Action</h2>
					</div>
					<div class="box-content">
											<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Error Message</th>
								  <th>Error Type</th>
								  <th>File</th>
								  <th>Report Date</th>
							  </tr>
						  </thead>   
						  <tbody>
						<?php
							$GetErrors = $DB->prepare("SELECT ID,ErrorType,ErrorMsg,File,ReportStructure FROM error_report");
							$GetErrors->execute();
							$GetErrors->bind_result($ErrorID,$ErrNo,$ErrorMessage,$File,$ReportDate);
							while ($GetErrors->fetch()){
								$ErrorType = null;
								switch ($ErrNo){
									case 1:
									case 256:
										$ErrorType = "Error";
										break;
									case 2:
									case 512:
										$ErrorType = "Warning";
										break;	
									case 8:
									case 1024:
										$ErrorType = "Notice";
										break;	
									case 2048:
										$ErrorType = "Strict Warning"; 
										break;	
									case 8192:
										$ErrorType = "Depreciated";
										break;							
								}
						?>					
							<tr>
								<td><?php echo "<a href='RegisterFix.php?ErrorID=".$ErrorID."'>".$ErrorMessage."</a>"; ?></td>
								<td class="center"><?php echo $ErrorType; ?></td>
								<td class="center"><?php echo $File; ?></td>
								<td class="center">
									<?php echo $ReportDate; ?>
								</td>
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
