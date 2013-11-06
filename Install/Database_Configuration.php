<?php
include "Core/Post_Handler.php";

if (isset($_POST['Set_Database'])){
	Install_Dirs::Database_Config($Step);
}
include "Core/Headers.html"; 
?>

<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>FluidSQL Install Tool</h2>
					</div>
					<div class="box-content">
						<form method="POST">
						<hr>
						<table class="table table-striped table-bordered"> 
							<tbody>
								<tr>
									<td>Database Host: </td>
									<td> 
										<input type="text" name="Database_Host" value="">
									</td>
								</tr>
								<tr>
									<td>Database Username</td>
									<td>
										<input type="text" name="Database_Username" value="">
									</td>
								</tr>
								<tr>
									<td>Database Password</td>
									<td>
										<input type="text" name="Database_Password" value="">
									</td>
								</tr>
								<tr>
									<td>Database</td>
									<td>
										<input type="text" name="Database_Name" value="">
									</td>
								</tr>
								<tr>
									<td></td>
									<td>
										<input class="btn btn-primary" type="submit" name="Set_Database" value="Set Database">
									</td>
								</tr>
							</tbody>
						</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<hr>
<footer>
<p class="pull-left">&copy; <a href="#" target="_blank">Daryls Development</a> 2013-2015</p>
</footer>
</div>

<?php 
include "Core/Footers.html"; 
?>