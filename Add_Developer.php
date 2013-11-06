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
				if (isset($_POST['RegisterDeveloper'])){
					function CheckValid ($Val = array()){
							$Return_Error = [];
						foreach ($Val AS $Keys => $Value){
							$Value = trim($Value);
							if (empty($Value)){
								$Return_Error[] = "Please Specify a ".$Keys;
							}
						}
						return $Return_Error;
					}
					
					$Check = CheckValid(array(
					"First Name" => $_POST['FirstName'],
					"Last Name" => $_POST['LastName'],
					"Username" => $_POST['Username'],
					"Password" => $_POST['Password'],
					"Email" => $_POST['Email'],
					"Address" => $_POST['Address']					
					));
					$Check_Usr = $DB->prepare("SELECT ID FROM users WHERE Username=?");
					$Check_Usr->bind_param('s',$_POST['Username']);
					$Check_Usr->execute();
					$Check_Usr->store_result();
					$Check_Usr->bind_result($Search_ID);
					$Check_Usr->fetch();
					$Check_Usr->close();
					if (!empty($Search_ID)){
						$Check[] = "Username Already Exists";
					}
					if (count($Check) > 0){
						echo '<div class="alert alert-block span10">';
							foreach ((array) $Check AS $Errors){
								echo '<p>'.$Errors.'</p><br>'; 
							}
						echo '</div>';
					
					}else{
						$Auth = new Authentication();
						$Auth->SetSalt();
						$Hash = $Auth->Hash_Password($_POST['Password']);
						$Insert_User = $DB->prepare("INSERT INTO users (Username,Password,Salt,Email)
						values (?,?,?,?)");
						$Insert_User->bind_param('ssss',$_POST['Username'],$Hash['Password'],$Hash['Salt'],$_POST['Email']);
						$Insert_User->execute();
						$InsertID = $Insert_User->insert_id;
						$Insert_User->close();
						$Insert_Details = $DB->prepare("INSERT INTO `users_detail` (`UserID`,`FirstName`,`Lastname`,`DOB`,`Address`)
						VALUES (?,?,?,?,?)");
						$Insert_Details->bind_param('issss',$InsertID,$_POST['FirstName'],$_POST['LastName'],$_POST['DOB'],$_POST['Address']);
						$Insert_Details->execute();
						$Insert_Details->close();
						echo '
						<div class="alert alert-success">
							<strong>
							Developer Has Been Created
							</strong>
						</div>
						';
					}
				}		
			?>
	<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>List Of Developers</h2>
					</div>
					<div class="box-content">
					<pre>
						<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
						First Name : <input type="text" name="FirstName" value="FirstName"><br>
						Last Name  : <input type="text" name="LastName" value="LastName"><br>
						DOB        : <input type="text" name="DOB" value="YYY-MM-DD"><br>
						Username   : <input type="text" name="Username" value="Username"><br>
						Password   : <input type="text" name="Password" value="Password Shown in Plain"> <br>
						Email      : <input type="text" name="Email" 	value="user@domain.com">
						<br>
						Address    : <textarea name="Address" class="autogrow"></textarea><br>
						<input type="submit" name="RegisterDeveloper" value="Register Developer">
						<form>
					</pre>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			

	

			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>


		<footer>
			<p class="pull-left">&copy; <a href="" target="_blank">Daryls Development</a> 2013-2015</p>
		</footer>
		
	</div>
	
	<?php include "HTML/Footers.html"; ?>
