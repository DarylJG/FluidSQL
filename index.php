<?php 
	if (isset($_GET['Live']) && is_dir("Install/")){
		echo "Please Rename/Remove the Install Directory For Security Purposes To Continue";
		exit;
	}elseif (is_dir("Install/")){
		echo "Install Directory Detected, Please Remove/Rename this directory <br>
		Or if this is the first time running this application, then click <a href='Install/index.php?Step=1'>Here</a>";
		exit;
	}

	include "HTML/Headers.html"; 
	include "Core/DB_Con.php";
	include "Handler.php";
	include "Core/Authentication.php";
	
	
	?>
<body>
		<div class="container-fluid">
		<div class="row-fluid">
		
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>Welcome To FluidSQL</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
				<?php
					if (isset($_GET['Errors'])){
						if (is_array($_GET['Errors'])){
							$Var = explode(",,",$_GET['Errors']);
							unset($Var['2']);
							foreach ($Var AS $Errors){
								echo '
							<div class="alert alert-warning">
							'.$Errors.'.
							</div>
								';
							}
						}else{
							$Var = $_GET['Errors'];
							echo '
							<div class="alert alert-warning">
							'.$Var.'.
							</div>
								';
						}

					}
				?>
					<div class="alert alert-info">
						Please login with your Username and Password.
					</div>
					<form class="form-horizontal" action="LoginVerification.php" method="post">
						<fieldset>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" value="" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" value="" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend">
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
							</div>
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" name="Login" class="btn btn-primary">Login</button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->
		
	</div>
<?php 
	include "HTML/Footers.html"; 
?>