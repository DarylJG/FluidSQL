<body>
<div id="main_container">

	<div class="header">
    <div class="logo"><a href="#"><img src="{$Image_Dir}/logo.gif" alt="" title="" border="0" /></a></div>
    
    <div class="right_header">Welcome {$Username} | <a href="#" class="messages">({$LoggedErrs}) Errors Logged</a> | <a href="#" class="logout">Logout</a></div>
    <div id="clock_a"></div>
    </div>
    
      <div class="main_content">
    
                   {include file='Templates/Fluid_New/HTML/Navigation.tpl'}
                    
                    
                    
                    
    <div class="center_content">  
    
    
    
    <div class="left_content">    
            <div class="sidebarmenu">
            
                <a class="menuitem submenuheader" href="">Sub Sections</a>
                <div class="submenu">
                    <ul>
                    <li><a href="">View Fatal Errors</a></li>
                    <li><a href="">View Warnings</a></li>
                    <li><a href="">View Notices</a></li>
                    <li><a href="">View Depreciated</a></li>
                    <li><a href="">Export</a></li>
                    </ul>
                </div>
            </div>

            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h4>Important notice</h4>
                <img src="{$Image_Dir}/notice.png" alt="" title="" class="sidebar_icon_right" />
                <p>
					We Are Currently Sitting In A Beta Position! Enjoy What is currently available
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
    </div>  
    
    <div class="right_content">            
        
    <h2>Reported Errors</h2> 
                    
                    
<table id="rounded-corner" summary="Current Reported Errors">
    <thead>
    	<tr>
            <th scope="col" class="rounded">Report Name</th>
            <th scope="col" class="rounded">Date Created</th>
        </tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="6" class="rounded-foot-left"><em>Showing Entire List Of Stored Reports</em></td>
        	<td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>
    <tbody>
		{foreach $Reports as $Reports_FirstD}
			<tr>
				<td><a href="{$Reports_FirstD[0]}">{$Reports_FirstD[1]}</a></td>
				<td>{$Reports_FirstD[2]}</td>
			</tr>
		{/foreach}
    </tbody>
</table>

     
        <div class="pagination">
        <span class="disabled"><< prev</span><span class="current">1</span><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a>…<a href="">10</a><a href="">11</a><a href="">12</a>...<a href="">100</a><a href="">101</a><a href="">next >></a>
        </div> 

     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <div class="footer_login">    
    	<div class="left_footer_login">FluidSQL | Powered by <a href="#">Daryls Development</a></div>    
    </div>
</div>		
</body>
</html>