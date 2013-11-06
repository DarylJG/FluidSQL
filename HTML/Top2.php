<?php
	function DifNotification ($CookieNumber, $Current){
		$New_Count = $Current - $CookieNumber;
		if ($New_Count < 0){
			return 0;
		}else{
			return $New_Count;
		}
		
	}
	if (isset($_COOKIE['ErrorCount'])){
			$New_Errors = DifNotification($_COOKIE['ErrorCount'],$Error_Count);	
			setcookie("ErrorCount",$Error_Count);
	}
	if (isset($_COOKIE['ActionCount'])){
		$New_Count = DifNotification($_COOKIE['ActionCount'],0);
		setcookie("ActionCount",0);
	}
	
?>			
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->

			<div class="sortable row-fluid">
				<a data-rel="tooltip" class="well span3 top-block" href="#">
					<span class="icon32 icon-red icon-user"></span>
					<div>Trusted Developers</div>
					<div><?php echo $Member_Count; ?></div>
				</a>

				<a data-rel="tooltip" title="<?php if (isset($New_Errors)){ echo $New_Errors; } ?> New Errors" class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-star-on"></span>
					<div>Errors Reported</div>
					<div><?php echo $Error_Count; ?></div>
				</a>
				
				<a data-rel="tooltip" title="" class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-envelope-closed"></span>
					<div>Actioned Errors</div>
					<div>0</div>
				</a>
			</div>