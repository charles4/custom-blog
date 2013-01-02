<?php /* Smarty version Smarty-3.1.12, created on 2012-12-10 05:36:28
         compiled from "smarty/templates/newpost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173465786250c574dc703025-81971530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19d92f3138693974882d2267f0945aa2bcf5895b' => 
    array (
      0 => 'smarty/templates/newpost.tpl',
      1 => 1354510852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173465786250c574dc703025-81971530',
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
  'unifunc' => 'content_50c574dc76bd16_52484786',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c574dc76bd16_52484786')) {function content_50c574dc76bd16_52484786($_smarty_tpl) {?><html>
  <head>
    <script type='text/javascript' src='js/jquery.js'> </script>
    <script type='text/javascript' src='js/loop_background.js'></script>
    <link rel="stylesheet" type="text/css" href='style.css'>
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['lastname']->value;?>
</title>
  </head>
  <body>
	<div id="backgrounds"></div>
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