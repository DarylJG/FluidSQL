<?php
	include "Core/DB_Con.php";
	include "Core/Authentication.php";
	include "Handler.php";
	if (isset($_POST['Login']))
	{
		$Tmp_Usr = trim($_POST['username']);
		$Tmp_Pswd = trim($_POST['password']);
		$Err_Arr = [];
		if (empty($Tmp_Usr)){
		$Err_Arr[] = "Please Specify A Username";
		}
		if (empty($Tmp_Pswd)){
		$Err_Arr[] = "Please Specify A Password"; 
		}
		unset($Tmp_usr);
		unset($Tmp_Pswd);
					
		// Start Authentication 
		$Configuration_Params = array(
			"Depreciated" => 1,
			"Warnings" => 1,
			"Notices" => 1,
			"VersionAlerts" => 1
		);
			if (count($Err_Arr) !== 0){
				$Return_Param = null;
				foreach ($Err_Arr AS $Errors){
					$Return_Param .= $Errors.",,";
				}
				header("Location: index.php?Errors=".urlencode($Return_Param));
				exit;
			}
		
		$Auth = new Authentication($Configuration_Params);
		$Get_Usr_Info = $DB->prepare("SELECT ID, Password, Salt,UserStatus FROM Users WHERE Username=?");
		$Get_Usr_Info->bind_param('s',$_POST['username']);
		$Get_Usr_Info->execute();
		$Get_Usr_Info->store_result();
		$User_Number = $Get_Usr_Info->num_rows;
		$Get_Usr_Info->bind_result($UserID, $Stored_Password, $Stored_Salt,$UserStatus);
		$Get_Usr_Info->fetch();
		$Get_Usr_Info->close();
		unset($Get_Usr_Info);

		if ($User_Number !== 1){
			$Error = "Wrong Username Specified Or Password Is Incorrect";
			header ("Location: index.php?Errors=".urlencode($Error));
			exit;
		}
		$LoginVeri = $Auth->Check_Password($_POST['password'],$Stored_Password,$Stored_Salt);
		
		if ($LoginVeri !== true){
			$Error = "Wrong Username Specified Or Password Is Incorrect";
			header ("Location: index.php?Errors=".urlencode($Error));
			exit;
		}
		session_start();
			$_SESSION['UserID'] = 	$UserID;
			$_SESSION['Username'] = $_POST['username'];
			$_SESSION['Salt'] = $Stored_Salt;
			$_SESSION['Login'] = true;
			$Check_Admin = $DB->prepare("SELECT UserID FROM Power_Users WHERE UserID=?");
			$Check_Admin->bind_param('i',$UserID);
			$Check_Admin->execute();
			$Check_Admin->store_result();
			$Is_Admin = $Check_Admin->num_rows;
			$Check_Admin->close();
			if ($Is_Admin === 1){
				$_SESSION['Power_User'] = true;
			}
			header("Location: Dashboard.php");
			exit;
	}
?>