<?php /* Smarty version Smarty-3.1.12, created on 2012-12-10 06:14:07
         compiled from "smarty/templates/editpost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:101190234150c57daf950f79-68959816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46c00ac4df28625dbfb0741a1c66bd3bb44c0970' => 
    array (
      0 => 'smarty/templates/editpost.tpl',
      1 => 1354510852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101190234150c57daf950f79-68959816',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'lastname' => 0,
    'canary' => 0,
    'created' => 0,
    'postid' => 0,
    'existing_tags' => 0,
    'existing_title' => 0,
    'existing_body' => 0,
    'comments_enabled' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50c57daf9d8fa1_29483961',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c57daf9d8fa1_29483961')) {function content_50c57daf9d8fa1_29483961($_smarty_tpl) {?><html>
  <head>
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/loop_background.js'></script>

    </script>
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
	<form method='post' action='process_edit.php'>
		<input id='canary' name='canary' type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['canary']->value;?>
">	
		<input id='created' name='created' type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['created']->value;?>
">
		<input id='postid' name='postid' type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['postid']->value;?>
">
	<div id="new_tags" class='newpost'>
		<label for='input_tags'>Tags</label>
		<input id='input_tags' class='newpost' name='tags' type='text' value="<?php echo $_smarty_tpl->tpl_vars['existing_tags']->value;?>
">
	</div>
	<div id='new_title' class='newpost'>
		<label for='input_title'>Title</label>
		<input id='input_title' class ='newpost' name='title' type='text' value="<?php echo $_smarty_tpl->tpl_vars['existing_title']->value;?>
">
	</div>
	<div id="new_blogbody" class='newpost'>
		<label for="input_body">Body</label>
		<textarea id='input_body' class='newpost' name='body' rows='30' cols='60'><?php echo $_smarty_tpl->tpl_vars['existing_body']->value;?>
</textarea>
	</div>
	<div id="new_comments" class='newpost'>
		Enable Comments: 
		<input id='comments_enabled' class='newpost' name='comments_enabled' type='checkbox' checked="<?php echo $_smarty_tpl->tpl_vars['comments_enabled']->value;?>
">
	</div>
	<input id='submit' name='submit' type='submit' value='Save Changes'>
	</form>
     </div>
  </body>
</html>
<?php }} ?>