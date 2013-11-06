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
						<h2><i class="icon-user"></i>List Of Developers</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Username</th>
								  <th>Date registered</th>
								  <th>Role</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						<?php
							$Member_Query = $DB->prepare("SELECT UserID,Username,Status,FirstName,Lastname,DOB,Address FROM user_cat");
							$Member_Query->execute();
							$Member_Query->bind_result($UserID, $Username,$Status,$FirstName, $LastName,$DOB,$Address);
							while ($Member_Query->fetch()){
							switch ($Status){
								case (int)0:
									// User Banned
									$User_Status = '<span class="label label-inverse">Banned</span>';
									break;
								case (int)1:
									// User Is Active
									$User_Status = '<span class="label label-success">Active</span>';
									break;
								case (int)2:
									$User_Status = '<span class="label">OnLeave</span>';
									break;
								default:
									$User_Status = '<span class="label label-info">Consult DB</span>';
									break;
							}
						?>					
							<tr>
								<td><?php echo $Username; ?></td>
								<td class="center"><?php echo $DOB; ?></td>
								<td class="center">Developer</td>
								<td class="center">
									<?php echo $User_Status; ?>
								</td>
								<td>
									<a href="Edit_User.php?UserID=<?=$UserID; ?>"><button type="button" class="btn btn-primary">Edit user</button></a>
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
