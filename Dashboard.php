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
								<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list"></i>Statistics</h2>
					</div>
					<div class="box-content">
						<ul class="dashboard-list">
							<li>
								<a href="#">
									
								<?php 
									if ($Error_Count === 0){
										$Color = 'green';
										$Icon = 'icon-tick';
									}elseif ($Error_Count > 0){
										$Color = 'red';
										$Icon = 'icon-flag';
									}
									
								
								?>
									<i class="<?=$Icon; ?>"></i> 
									<span class="<?=$Color;?>"><?php echo $Error_Count; ?></span>
									Errors Reported                           
								</a>
							</li>
						</ul>
					</div>
				</div><!--/span-->








				
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Member Activity</h2>
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
						<div class="box-content">
							<ul class="dashboard-list">
								<li>
									<a href="#">
										<img class="dashboard-avatar" alt="" src=""></a>
										<strong>Name:</strong> <a href="#">Daryl
									</a><br>
									<strong>Actioned:</strong> Error Report 3<br>
									<strong>Status:</strong> <span class="label label-success">Approved</span>                                  
								</li>
							</ul>
						</div>
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
