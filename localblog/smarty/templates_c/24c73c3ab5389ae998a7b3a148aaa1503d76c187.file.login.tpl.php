<?php /* Smarty version Smarty-3.1.12, created on 2012-12-03 05:04:53
         compiled from "smarty/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110035241650bc32f54f6485-08061711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24c73c3ab5389ae998a7b3a148aaa1503d76c187' => 
    array (
      0 => 'smarty/templates/login.tpl',
      1 => 1354510852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110035241650bc32f54f6485-08061711',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'canary' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50bc32f54fd690_75391113',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50bc32f54fd690_75391113')) {function content_50bc32f54fd690_75391113($_smarty_tpl) {?><form action="processlogin.php" method="POST">
	<input type='hidden' name='canary' value="<?php echo $_smarty_tpl->tpl_vars['canary']->value;?>
">
	<input type='email' name='email' placeholder="Email..." required >
	<input type='password' name='password' placeholder="Password..." required >
	<input type='submit' value="Login">
</form>
<?php }} ?>