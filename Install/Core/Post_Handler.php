<?php

	class Install_Dirs {
	
		public static function Return_Config($Host,$Username,$Password,$Database){
		
			$DB_Config = '
<?php
define("DBHost","'.$Host.'");
define("DBUser","'.$Username.'");
define("DBPass","'.$Password.'");
define("DB","'.$Database.'");
$DB = new mysqli(DBHost,DBUser,DBPass,DB) or trigger_error("Cannot Connect To SQL",E_USER_ERROR);
?>
';
			$File = "../Core/DB_Con.php";
				if (!file_exists($File)){
					file_put_contents($File, $DB_Config, FILE_APPEND | LOCK_EX);	
				}
		}
		
		public static function  Database_Config($StepCount){
			global $_POST;
			session_start();
				$_SESSION['Database_Host'] = $_POST['Database_Host'];
				$_SESSION['Database_Username'] = $_POST['Database_Username'];
				$_SESSION['Database_Password'] = $_POST['Database_Password'];
				$_SESSION['Database_Name'] = $_POST['Database_Name'];
			self::Return_Config($_POST['Database_Host'],$_POST['Database_Username'],$_POST['Database_Password'],$_POST['Database_Name']);
			$StepCount++;
			header("Location: index.php?Step=".$StepCount);
			exit;
		}
		
		public static function Install_Tables($StepCount){
			session_start();
			$_TMPSQL = new mysqli($_SESSION['Database_Host'],$_SESSION['Database_Username'],$_SESSION['Database_Password'],$_SESSION['Database_Name']);
		
			foreach (glob("./SQL/*.sql") as $File) {
				$File_Query =  file_get_contents($File);
				
				$Install_Query = $_TMPSQL->prepare($File_Query);
				$Install_Query->execute();
				$Install_Query->close();
			
			}
			$StepCount++;
			header("Location: index.php?Step=".$StepCount);
			exit;
		
		}
	
	
	
	}

	







?>