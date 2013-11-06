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
				if (isset($_POST['ChangePass'])){
					$Current_Password = $_POST['CurrPass'];
					$New_Password = $_POST['NewPassword'];
					$Confirm_Password = $_POST['ConfirmPass'];
					$Tmp_Curr = trim($Current_Password);
					$Tmp_New = trim($New_Password);
					$Tmp_Conf = trim($Confirm_Password);
					$Err_Arr = []; 
					if (empty($Tmp_Curr)){
						$Err_Arr[] = "Current Password Empty";
					}
					if (empty($Tmp_New)){
						$Err_Arr[] = "Please Specify A New Passwrd";
					}
					if (empty($Tmp_Conf)){
						$Err_Arr[] = "Please Confirm Your Password";
					}
					unset($Tmp_Curr);
					unset($Tmp_New);
					unset($Tmp_Conf);
					if (!$New_Password === $Confirm_Password){
						$Err_Arr[] = "Passwords Do Not Match";
					}
					if (count($Err_Arr) > 0){
						echo '<div class="alert alert-block span10">';
							foreach ($Err_Arr AS $Errors){
								echo '<p>'.$Errors.'</p>'; 
							}
						echo '</div>';
					}else{
						$Auth = new Authentication();
						$Auth->SetSalt();
						$Password_Arr = $Auth->Hash_Password($_POST['NewPassword']);
						$Query = $DB->prepare("UPDATE users SET Password = ?,Salt=? WHERE Username=?");
						$Query->bind_param('sss',$Password_Arr['Password'],$Password_Arr['Salt'],$_SESSION['Username']);
						$Query->execute();
						$Query->close();
						unset($_SESSION['Salt']);
						$_SESSION['Salt'] = $Password_Arr['Salt'];
						echo '
						<div class="alert alert-success">
							<strong>
							Your Password Has Been Updated!!
							</strong>
						</div>
						';
					}
				
				
				}
			?>
			<div class="row-fluid">
								<div class="span12 well">
		
					
						<h3><i></i>Change User Password</h3>
					<div class="box-content">
					<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
					<pre>
					Current Password: 	<input type="password" name="CurrPass" value="password123"> <br>
					New     Password:	<input type="password" name="NewPassword" value="password123"> <br>
					Confirm Password:	<input type="password" name="ConfirmPass" value="password123"> <bR>
					<input type="submit" class="btn btn-large btn-primary btn-round" name="ChangePass" value="Chang Password">
					</pre>
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
