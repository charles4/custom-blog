<?php /* Smarty version Smarty-3.1.12, created on 2012-11-28 15:39:33
         compiled from "/var/www/blog/smarty/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211877264150b630352fe3d1-48644787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b6adfbcad1dd290beca01e9b6d8077509ce1eb2' => 
    array (
      0 => '/var/www/blog/smarty/templates/login.tpl',
      1 => 1353271658,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211877264150b630352fe3d1-48644787',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'lastname' => 0,
    'canary' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50b630353657e3_16483041',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b630353657e3_16483041')) {function content_50b630353657e3_16483041($_smarty_tpl) {?>
<html>
  <head>
    <script type='text/javascript' src='/blog/jquery.js'> </script>
    <script type='text/javascript'></script>
    <link rel="stylesheet" type="text/css" href='/blog/login.css'>
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['lastname']->value;?>
</title>
  </head>
  <body>
    <div id="loginform">
	<form id='login' name='login' method='post' action='processlogin.php'>
		<input type='hidden' name='canary' value="<?php echo $_smarty_tpl->tpl_vars['canary']->value;?>
">

		<label for='email'>Email --</label>
		
		<input id='email' type='email' required name='email'>

		<label for='password'>Password --</label>
		<input id='password' type='password' required name='password'>
		
		<input type='submit' value='log in'>
	</form>
    </div>

  </body>
</html>
<?php }} ?>