<?php /* Smarty version Smarty-3.1.12, created on 2012-12-10 05:35:57
         compiled from "smarty/templates/newuser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99905062850c57370c40511-95195807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6a41d24b1919e5280a92383a83fcf96df3d0418' => 
    array (
      0 => 'smarty/templates/newuser.tpl',
      1 => 1355117754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99905062850c57370c40511-95195807',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50c57370cc1aa0_58786907',
  'variables' => 
  array (
    'canary' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c57370cc1aa0_58786907')) {function content_50c57370cc1aa0_58786907($_smarty_tpl) {?><h3>Use this to create a new user</h3>
<form action="adduser.php" method="POST">
	<input type='hidden' name='canary' value="<?php echo $_smarty_tpl->tpl_vars['canary']->value;?>
">
	<input type='email' name='email' placeholder="Email..." required >
	<input type='password' name='password' placeholder="Password..." required >
	<input type='submit' value="Login">
</form>
<?php }} ?>