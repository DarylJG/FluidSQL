<?php
	if (!isset($_GET['UserID'])){
		header("Location: Developer_List.php");
		exit;
	}
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
		<?php
			if (isset($_POST['ChangeUser'])){
				$Update_User = $DB->prepare("UPDATE users SET UserStatus=? WHERE ID=?");
				$Update_User->bind_param('ii',$_POST['Status'],$_POST['UserID']);
				$Update_User->execute();
				$Update_User->close();
				unset($Update_User);
				$Update_User = $DB->prepare("UPDATE users_detail SET FirstName=?, Lastname=?, Address=? WHERE UserID=?");
				$Update_User->bind_param('ssss',$_POST['FirstName'],$_POST['LastName'],$_POST['Address'],$_POST['UserID']);
				$Update_User->execute();
				$Update_User->close();
					echo '
						<div class="alert alert-success">
							<strong>
							User Account Has Been Updated
							</strong>
						</div>
						';

			}
		
		
		?>
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Edit Users Profile</h2>
					</div>
					<div class="box-content">
						<?php
							$Get_Usr = $DB->prepare("SELECT 
													UserID,Username,Status,Email,FirstName,Lastname,DOB,Address
												FROM user_cat WHERE UserID=?");
							$Get_Usr->bind_param('i',$_GET['UserID']);
							$Get_Usr->execute();
							$Get_Usr->bind_result($USERID,$USERNAME,$STATUS,$EMAIL,$FIRSTNAME,$LASTNAME,$DOB,$ADDRESS);
							$Get_Usr->fetch();
							$Get_Usr->close();
						
						?>
						
						<form method="POST">
							<h3>Changing Account Details For <?php echo $USERNAME; ?></h3><br>
							<hr>
							<table class="table table-striped table-bordered"> 
							<tbody>
								<tr>
									<td>First Name: </td>
									<td> 
									<input type="hidden" name="UserID" value="<?php echo $USERID; ?>">
									<input type="text" name="FirstName" value="<?php echo $FIRSTNAME; ?>"> 
									</td>
								</tr>
								
								<tr>
									<td>Last Name: </td>
									<td><input type="text" name="LastName" value="<?php echo $LASTNAME; ?>"></td>
								</tr>
								<tr>
									<td>User Status:</td>
									<td>
										<select name="Status">
											<option value="0">Banned</option>
											<option value="1">Active</option>
											<option value="2">On Leave</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Email: </td>
									<td><input type="text" name="Email" value="<?php echo $EMAIL; ?>"></td>
								</tr>
								<tr>
									<td>Date Of Birth: </td>
									<td> <input type="text" name="DOB" readonly="readonly" value="<?php echo $DOB; ?>"></td>
								</tr>
								<tr>
									<td>Address</td>
									<td><textarea name="Address" class="autogrow"><?php echo $ADDRESS; ?></textarea></td>
								</tr>
								
								<tr>
									<td></td>
									<td><input type="submit" name="ChangeUser" class="btn btn-primary" value="Update Account"></td>
								</tr>
						  </tbody>
						  </table>
						
						</form>
						
						
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
	
	<?php include "HTML/Footers.html"; ?>
