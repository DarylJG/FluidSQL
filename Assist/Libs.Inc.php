<?php
	
	class Smarty_Views {
	/*
		(Object) $_Instance
		(Str) $CSS_Dir
	*/
		protected $_Instance; 
		protected $_Session; 
		protected $_DBViews; 
		protected $CSS_Dir;
		protected $JS_Dir;
		protected $URIParam;
		public function __construct($TemplateDir, $TemplateName,$Params){
		/*
			Create A New Smarty Instance 
			Set the Compiler Directory
			Set the HTML Directory
			Set the CSS Directory 
		*/
			$this->URIParam = $Params;
			$this->_Instance = new Smarty;
			$this->_Session = new Session;
			$this->_DBViews = new Database_Queries;
			$this->_Instance->compile_dir = "./".$TemplateDir."/".$TemplateName."/Compiler";
			$this->_Instance->template_dir = "./".$TemplateDir."/".$TemplateName."/HTML";
			$this->CSS_Dir = $TemplateDir."/".$TemplateName."/CSS";		
			$this->JS_Dir = $TemplateDir."/".$TemplateName."/JS";		
		}
			protected function SortLocation(){
				global $Parameters;
				if (isset($_POST['FormID'])){
					return true;
				}
				return false;
			}
			protected function DirectoryStructure(){
				if (IsSubDir === true){
					return "/".SubDir."/";
				}
				return "/";
			}
			protected function Display_Headers(){
				$this->_Instance->assign("Image_Dir", $this->DirectoryStructure().'Templates/Fluid_New/Images/images');
				$this->_Instance->assign("Img_Dir", $this->DirectoryStructure().'Templates/Fluid_New/Images/img');
				$this->_Instance->assign("Style", $this->DirectoryStructure().'Templates/Fluid_New/CSS/style.css');
				$this->_Instance->assign("NiceForms", $this->DirectoryStructure().'Templates/Fluid_New/CSS/niceforms-default.css');
				$this->_Instance->assign("JQueryInc", $this->DirectoryStructure().'Templates/Fluid_New/JS/jquery.min.js');
				$this->_Instance->assign("JSdda", $this->DirectoryStructure().'Templates/Fluid_New/JS/ddaccordion.js');
				$this->_Instance->assign("JQuery2", $this->DirectoryStructure().'Templates/Fluid_New/JS/jconfirmaction.jquery.js');
				$this->_Instance->assign("NiceFormsJS", $this->DirectoryStructure().'Templates/Fluid_New/JS/niceforms.js');
				$this->_Instance->display("Headers.tpl");
			}
			protected function Logged_InBanner(){
				$this->_Instance->assign("Username",$this->_Session->Get("Username"));
				$this->_Instance->assign("LoggedErrs",$this->_DBViews->Error_Count());
			}
		protected function login(){
			$this->Display_Headers();
		}
		
		protected function Dashboard(){
			$this->Logged_InBanner();
			$this->_Instance->assign("ErrorList",$this->_DBViews->Get_Errors());
		}
		
		protected function index(){
		
		}
		
		protected function ForgotPass(){
		
		
		}
		protected function Reports(){
			$this->Logged_InBanner();
			$Reports = $this->_DBViews->Get_Reports();
			$this->_Instance->assign("Reports",$Reports);
		}
		
		
		
		
		public function Display_Page($PageName){
		/*
			This is the main call from the index page:
				Index.php -> $Parameters[0] will server as the page name.
				
			This function will check if there is a method which will act as the outer core for the Framework.
				If Method is detected, then display the page by appending .tpl to the end of the variable passed
				if Method is not detected, then display a 404 page
		*/
			if (!method_exists($this,$PageName)){
				$this->_Instance->assign("css",$this->DirectoryStructure()."/Templates/Fluid_New/CSS/css404.css");
				$this->_Instance->display("404.html");
				exit;
			}
			if (isset($_SESSION['LoginErrors'])){
				$this->_Instance->assign("LoginErr",$_SESSION['LoginErrors']);
				unset($_SESSION['LoginErrors']);
			}else{
				$this->_Instance->assign("LoginErr","");
			}
			call_user_func(array($this, $PageName),$PageName);
			call_user_func(array($this, "Display_Headers"));
			$this->_Instance->display($PageName.".tpl");
		}
	}

?>