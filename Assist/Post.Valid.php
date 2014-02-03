<?php
	class Post_Validations {
	/*
		(Object) mysqli
		(String) URI
		(Array) _POST
	*/
		protected $mysqli;
		protected $URI;
		protected $Auth;
		protected $_SQL;
		public $_POST;
		public function __construct(){
			$this->_SQL = new Database_Queries;
			$this->URI = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			$this->Auth = new Authentication();
		}
		public function LoginForm(){
			global $Sessions;
				$User_Information = $this->_SQL->User_Information($_POST['Username']);
			if($User_Information === false){
				$Sessions->Set("LoginErrors","Incorrect Username or Password");
				header("Location: ../index/");
				exit;
			}
			
			if(!$this->Auth->Check_Password($_POST['Password'],$User_Information['Password'],$User_Information['Salt'])){
				$Sessions->Set("LoginErrors","Incorrect Username or Password");
				header ("Location: ../index/");
				exit;
			}
				$Sessions->Set("UserID",$User_Information['UserID']);
				$Sessions->Set("Username",$User_Information['Username']);
				$Sessions->Set("Password",$User_Information['Password']);
				$Sessions->Set("Salt",$User_Information['Salt']);
				$Sessions->Set("Status",$User_Information['Status']);
					header ("Location: ../Dashboard/");
				
			exit;
		}
		public function FormID($FormID){
		/*
			Once form ID is passed, check this  switch/case for a representing Integer
				If Found: Display the method 
				If Not Found, Trigger error 
		*/
			switch ($FormID){
				case 1:
					// Register Form
					$this->LoginForm();
					break;
				default:
					trigger_error("UNKNOWN FORM DETECTED",E_USER_WARNING);
					break;
			}
		}
	
	
	}
	



?>