<?php /* Smarty version Smarty-3.1.15, created on 2014-01-27 01:07:46
         compiled from ".\Templates\Fluid_New\HTML\ForgotPass.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1773052e5aeebc5cc73-27333758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f51d68d2065b4c56a8aa683ad238edb4973a87d' => 
    array (
      0 => '.\\Templates\\Fluid_New\\HTML\\ForgotPass.tpl',
      1 => 1390784860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1773052e5aeebc5cc73-27333758',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52e5aeebd20191_26416797',
  'variables' => 
  array (
    'LoginErr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e5aeebd20191_26416797')) {function content_52e5aeebd20191_26416797($_smarty_tpl) {?><body>
<div id="main_container">

	<div class="header_login">
    <div class="logo"><a href="#"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>
    
    </div>

     
         <div class="login_form">
         
         <h3>Forgot Password</h3>
         
         <a href="#" class="forgot_pass">Forgot password</a> 
         
         <form action="" method="post" class="niceform">
				<?php echo $_smarty_tpl->tpl_vars['LoginErr']->value;?>

                <fieldset>
                    <dl>
                        <dt><label for="Username">Username:</label></dt>
                        <dd><input type="text" name="Username" id="" size="54" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="RecoveryType">Recovery Type:</label></dt>
                        <dd>
							<select name="Type">
								<option value="Email">Email</option>
								<option value="Mobile">Mobile</option>
							</select>						
						</dd>
                    </dl>
                    <dl>
						<dd><input type="hidden" name="FormID" value="5698" size="54"></dd>
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
