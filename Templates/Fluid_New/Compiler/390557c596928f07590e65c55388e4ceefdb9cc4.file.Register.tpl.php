<?php /* Smarty version Smarty-3.1.15, created on 2013-11-14 22:27:29
         compiled from ".\Templates\Fluid\HTML\Register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28979528197fac23e97-57747984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '390557c596928f07590e65c55388e4ceefdb9cc4' => 
    array (
      0 => '.\\Templates\\Fluid\\HTML\\Register.tpl',
      1 => 1384463815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28979528197fac23e97-57747984',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_528197fac66522_74286458',
  'variables' => 
  array (
    'Location' => 0,
    'Type' => 0,
    'Input_1' => 0,
    'Default_Value_1' => 0,
    'Submit_Name' => 0,
    'Submit_Value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528197fac66522_74286458')) {function content_528197fac66522_74286458($_smarty_tpl) {?><form action="<?php echo $_smarty_tpl->tpl_vars['Location']->value;?>
" method="<?php echo $_smarty_tpl->tpl_vars['Type']->value;?>
">
	<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['Input_1']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['Default_Value_1']->value;?>
">
	<input type="hidden" name="FormID" value="192">
	<input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['Submit_Name']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['Submit_Value']->value;?>
">

</form><?php }} ?>
