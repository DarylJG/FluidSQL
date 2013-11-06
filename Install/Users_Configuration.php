<?php
	include "../Core/Authentication.php";
	include "../Core/DB_Con.php";
	include "../HTML/Headers.html";

	if (isset($_POST['RgstrUsr'])){
		function CheckEmpty ($Array){
		$Error_Array = array();
			foreach ($Array AS $Values){
				$Tmp = trim($Values);
				if (empty($Tmp)){
					$Error_Array[] = $Values." Empty";
				}
			}
			return $Error_Array;
		}
			$ErrorArr = CheckEmpty($_POST);
		if (count($ErrorArr) !== 0){
			foreach ($ErrorArr AS $Errors){
				echo '
				<div class="alert alert-warning">
				'.$Errors.'.
				</div>
				';
			}
		}else{

		$Auth = new Authentication();
		$Auth->SetSalt();
			$Hash = $Auth->Hash_Password($_POST['Password']);
			$Insert_1 = $DB->prepare("INSERT INTO users (`Username`,`Password`,`Salt`,`UserStatus`,`Email`)
			VALUES (?,?,?,1,?)");
			$Insert_1->bind_param('ssss',$_POST['Username'],$Hash['Password'],$Hash['Salt'],$_POST['Email']);
			$Insert_1->execute();
			$InsertID = $Insert_1->insert_id;
			$Insert_1->close();
			
			$Insert_2 = $DB->prepare("INSERT INTO `users_detail` (`UserID`,`FirstName`,`Lastname`,`DOB`,`Address`)
						VALUES (?,?,?,?,?)");
			$Insert_2->bind_param('issss',$InsertID,$_POST['FirstName'],$_POST['LastName'],$_POST['DOB'],$_POST['Address']);
			$Insert_2->execute();
			$Insert_2->close();
			
			header("Location: ../index.php?Live=1");
			exit;
		
		}
	}
		
	
	

	
?>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Sucessfully Installed SQL Tables</h2>
					</div>
					<div class="box-content">
						<h2>Please Create Your Administrative User Account</h2>
						<form method="POST">
							<hr>
							<table class="table table-striped table-bordered"> 
							<tbody>
								<tr>
									<td>First Name: </td>
									<td> 
									<input type="hidden" name="Username" value="Administrator">
									<input type="text" name="FirstName"> 
									</td>
								</tr>								
								<tr>
									<td>Last Name: </td>
									<td><input type="text" name="LastName"></td>
								</tr>
								<tr>
									<td>Password: </td>
									<td><input type="text" name="Password"></td>
								</tr>
								<tr>
									<td>E-Mail: </td>
									<td> <input type="text" name="Email"></td>
								</tr>
								<tr>
									<td>Address</td>
									<td><textarea name="Address" class="autogrow"></textarea></td>
								</tr>
								<tr>
									<td>Date Of Birth (YYY-MM-DD)</td>
									
									<td><input type="text" name="DOB"></td>
								</tr>
								
								<tr>
									<td></td>
									<td><input type="submit" name="RgstrUsr" class="btn btn-primary" value="Register Account"></td>
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
