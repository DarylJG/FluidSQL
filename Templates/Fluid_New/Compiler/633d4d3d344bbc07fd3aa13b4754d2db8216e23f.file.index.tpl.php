<?php /* Smarty version Smarty-3.1.15, created on 2014-02-02 02:07:15
         compiled from ".\Templates\Fluid_New\HTML\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:230295286d65aa519e2-82748465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '633d4d3d344bbc07fd3aa13b4754d2db8216e23f' => 
    array (
      0 => '.\\Templates\\Fluid_New\\HTML\\index.tpl',
      1 => 1390784025,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '230295286d65aa519e2-82748465',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5286d65aa8c370_10823625',
  'variables' => 
  array (
    'LoginErr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5286d65aa8c370_10823625')) {function content_5286d65aa8c370_10823625($_smarty_tpl) {?><body>
<div id="main_container">

	<div class="header_login">
    <div class="logo"><a href="#"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>
    
    </div>

     
         <div class="login_form">
         
         <h3>Error Log Report Login</h3>
         
         <a href="../ForgotPass/" class="forgot_pass">Forgot password</a> 
         
         <form action="" method="post" class="niceform">
				<?php echo $_smarty_tpl->tpl_vars['LoginErr']->value;?>

                <fieldset>
                    <dl>
                        <dt><label for="email">Username:</label></dt>
                        <dd><input type="text" name="Username" id="" size="54" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="password">Password:</label></dt>
                        <dd><input type="password" name="Password" id="" size="54" /></dd>
                    </dl>
                    <dl>
						<dd><input type="hidden" name="FormID" value="1" size="54"></dd>
					</dl>
                    
                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="Enter" />
                     </dl>
                    
                </fieldset>
                
         </form>
         </div>  
          
	
    
    <div class="footer_login">    
    	<div class="left_footer_login">FluidSQL | Powered by <a href="#">Daryls Development</a></div>    
    </div>

</div>		
</body>
</html><?php }} ?>
