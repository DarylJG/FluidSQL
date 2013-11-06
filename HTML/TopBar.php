		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"> <img alt="Daryls Development" src="img/logo20.png" /> <span>FluidSQL</span></a>
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"><?=$_SESSION['Username']; ?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="ChangePass.php">Change Password</a></li>
						<li class="divider"></li>
						<li><a href="Logout.php">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				

			</div>
		</div>
	</div>
	<!-- topbar ends -->