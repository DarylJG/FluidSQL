<?php /* Smarty version Smarty-3.1.15, created on 2013-11-16 04:21:05
         compiled from ".\Templates\Fluid_New\HTML\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99335286d6cedcade3-13696427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6ce5167cf8b4983101bf7fc9404fccd489f4458' => 
    array (
      0 => '.\\Templates\\Fluid_New\\HTML\\login.tpl',
      1 => 1384572062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99335286d6cedcade3-13696427',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5286d6cedfda77_15579927',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5286d6cedfda77_15579927')) {function content_5286d6cedfda77_15579927($_smarty_tpl) {?><body>
<div id="main_container">

	<div class="header_login">
    <div class="logo"><a href="#"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>
    
    </div>

     
         <div class="login_form">
         
         <h3>Error Log Report Login</h3>
         
         <a href="#" class="forgot_pass">Forgot password</a> 
         
         <form action="" method="post" class="niceform">
         
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
