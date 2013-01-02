<?php /* Smarty version Smarty-3.1.12, created on 2012-11-29 04:21:21
         compiled from "/var/www/blog/smarty/templates/newpost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141288679350b6e2c1762a50-42140029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b7f54250261eec21602df830740155d1b7d4f84' => 
    array (
      0 => '/var/www/blog/smarty/templates/newpost.tpl',
      1 => 1353655182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141288679350b6e2c1762a50-42140029',
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
  'unifunc' => 'content_50b6e2c17a2105_96387940',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b6e2c17a2105_96387940')) {function content_50b6e2c17a2105_96387940($_smarty_tpl) {?><html>
  <head>
    <script type='text/javascript' src='/blog/jquery.js'> </script>
    <script type='text/javascript'>

    </script>
    <link rel="stylesheet" type="text/css" href='/blog/style.css'>
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['lastname']->value;?>
</title>
  </head>
  <body>
	<div id=header>
		<?php echo $_smarty_tpl->getSubTemplate ('private_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
    <div id='everything'>
	<form method='post' action='addpost.php'>
		<input id='canary' name='canary' type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['canary']->value;?>
">	

	<div id="new_tags" class='newpost'>
		<input id='input_tags' class='newpost' name='tags' type='text' placeholder="#hashtags...">
	</div>
	<div id='new_title' class='newpost'>
		<input id='input_title' class ='newpost' name='title' type='text' placeholder="Post title...">
	</div>
	<div id="new_blogbody" class='newpost'>
		<textarea id='input_body' class='newpost' name='body' rows='30' cols='60' placeholder="Start writing here"></textarea>
	</div>
	<div id="new_comments" class='newpost'>
		Enable Comments: 
		<input id='comments_enabled' class='newpost' name='comments_enabled' type='checkbox'>
	</div>
	<input id='submit' name='submit' type='submit' value='Post'>
	</form>
     </div>
  </body>
</html>
<?php }} ?>