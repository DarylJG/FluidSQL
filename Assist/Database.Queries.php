<?php
	
	class Database_Queries {
			protected $_Database;
		public function __construct(){
			$this->_Database = new mysqli(DBHost,DBUser,DBPass,DB);
			return true;
		}
		
		public function User_Information($Username){
			$Query = $this->_Database->prepare("SELECT ID,Username,Password,Salt,UserStatus FROM users WHERE Username=?");
			$Query->bind_param('s',$Username);
			$Query->execute();
			$Query->bind_result($User_ID,$Username,$User_Password,$User_Salt,$User_Status);
			$Query->fetch();
			$Query->close();
				if ($User_ID === null){
					return false;
				}
			return array(
					"UserID" => $User_ID,
					"Username" => $Username,
					"Password" => $User_Password,
					"Salt" => $User_Salt,
					"Status" => $User_Status
				);	
		}
		
		
		public function Error_Count(){
			$Query = $this->_Database->prepare("SELECT COUNT(*) FROM error_report");
			$Query->execute();
			$Query->bind_result($Count);
			$Query->execute();
			$Query->fetch();
			return $Count;
		}
		
		
		public function Get_Errors(){
			$Query = $this->_Database->prepare("SELECT ErrorMsg, ErrorType, File,ErrorLine,ReportStructure FROM error_report ORDER BY ID DESC LIMIT 0,25");
			$Query->execute();
			$Query->bind_result($ErrorMsg,$ErrNo,$File,$Line,$Date);
				$Return_Arr = array();
			while ($Query->fetch()){
				unset($ErrorType);
				switch ($ErrNo){
					case 1:
					case 256:
						$ErrorType = "Error";
					break;
					case 2:
					case 512:
						$ErrorType = "Warning";
					break;	
					case 8:
					case 1024:
						$ErrorType = "Notice";
					break;	
					case 2048:
						$ErrorType = "Strict Warning"; 
					break;	
					case 8192:
						$ErrorType = "Depreciated";
					break;
				}
				$Return_Arr[] = array ($ErrorMsg,$ErrorType,$File,$Line,$Date);
			}
			return $Return_Arr;
		}
		
		public function Get_Reports(){
			$Query = $this->_Database->prepare("SELECT ID,FileName,Created FROM storedpdf");
			$Query->execute();
			$Query->bind_result($File_ID,$FileName,$Date_Created);
				$Array = array();
			while ($Query->fetch()){
				$Array[] = array ($File_ID,$FileName,$Date_Created);
			}
			return $Array;
		}
		
		
		
	}
	

?>