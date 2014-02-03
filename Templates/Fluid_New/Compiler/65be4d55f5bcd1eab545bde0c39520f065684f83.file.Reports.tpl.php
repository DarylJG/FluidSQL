<?php /* Smarty version Smarty-3.1.15, created on 2014-02-02 02:07:56
         compiled from ".\Templates\Fluid_New\HTML\Reports.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2523052e58fe6d94849-61977794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65be4d55f5bcd1eab545bde0c39520f065684f83' => 
    array (
      0 => '.\\Templates\\Fluid_New\\HTML\\Reports.tpl',
      1 => 1390777617,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2523052e58fe6d94849-61977794',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52e58fe6dfdfd0_60516813',
  'variables' => 
  array (
    'Image_Dir' => 0,
    'Username' => 0,
    'LoggedErrs' => 0,
    'Reports' => 0,
    'Reports_FirstD' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e58fe6dfdfd0_60516813')) {function content_52e58fe6dfdfd0_60516813($_smarty_tpl) {?><body>
<div id="main_container">

	<div class="header">
    <div class="logo"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['Image_Dir']->value;?>
/logo.gif" alt="" title="" border="0" /></a></div>
    
    <div class="right_header">Welcome <?php echo $_smarty_tpl->tpl_vars['Username']->value;?>
 | <a href="#" class="messages">(<?php echo $_smarty_tpl->tpl_vars['LoggedErrs']->value;?>
) Errors Logged</a> | <a href="#" class="logout">Logout</a></div>
    <div id="clock_a"></div>
    </div>
    
      <div class="main_content">
    
                   <?php echo $_smarty_tpl->getSubTemplate ('Templates/Fluid_New/HTML/Navigation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    
                    
                    
                    
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
                <img src="<?php echo $_smarty_tpl->tpl_vars['Image_Dir']->value;?>
/notice.png" alt="" title="" class="sidebar_icon_right" />
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
		<?php  $_smarty_tpl->tpl_vars['Reports_FirstD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Reports_FirstD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Reports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Reports_FirstD']->key => $_smarty_tpl->tpl_vars['Reports_FirstD']->value) {
$_smarty_tpl->tpl_vars['Reports_FirstD']->_loop = true;
?>
			<tr>
				<td><a href="<?php echo $_smarty_tpl->tpl_vars['Reports_FirstD']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['Reports_FirstD']->value[1];?>
</a></td>
				<td><?php echo $_smarty_tpl->tpl_vars['Reports_FirstD']->value[2];?>
</td>
			</tr>
		<?php } ?>
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
</html><?php }} ?>
