<?php
	define ("ServerName", $_SERVER['SERVER_NAME']);
		
		
		/*
			Establish Constants for the Database Connection Variables. 
				*This information is to be used in multiple zones of the website.
		*/
			/*
				Define The MySQL Server
			*/
		define ("DBHost","");
			/*
				Define the username with the permissions to connect to the FluidSQL Table
			*/
		define ("DBUser","");
			/*
				Define the password for the user specified above
			*/
		define ("DBPass","");
			/*
				Define the table which FluidSQL is installed into
			*/
		define ("DB","");

		/*
			End The Database Definitions
		*/
		
		
		define ("RequestedURI", $_SERVER["REQUEST_URI"]);
		/* 
			If Package is located in a subdirectory:
				Is in a subdirectory: true
				If in main root: false
		*/
		define ("IsSubDir", true); 
			/*
				If "IsSubDir" is set to true, please state the sub directory location
			*/
			define ("SubDir","FluidSQL");
		/*
			Name of the templates directory 
		*/
		
		define ("TemplateDir", "Templates"); // Template To be used 
		/*
			Template Name To Use
		*/
		define ("TemplateName", "Fluid_New");
		/*
			Location of the directory which the smarty class is located 
		*/
		define ("SmartyLib","libs"); // Location to Smarty 
		/*
			Packages Physical Path
		*/
		define ("SitePhysical",'');
		
		/*
			Default Landing Page
		*/
		define ("DefaultLanding","index");
?>