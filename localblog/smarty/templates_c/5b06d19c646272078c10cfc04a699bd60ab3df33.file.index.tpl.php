<?php /* Smarty version Smarty-3.1.12, created on 2012-12-27 22:32:03
         compiled from "smarty/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41663169650bc32f5425933-78894294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b06d19c646272078c10cfc04a699bd60ab3df33' => 
    array (
      0 => 'smarty/templates/index.tpl',
      1 => 1356647517,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41663169650bc32f5425933-78894294',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50bc32f54c60d0_06636721',
  'variables' => 
  array (
    'name' => 0,
    'lastname' => 0,
    'posts' => 0,
    'post' => 0,
    'tag' => 0,
    'canary' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50bc32f54c60d0_06636721')) {function content_50bc32f54c60d0_06636721($_smarty_tpl) {?><html>
  <head>
    <script type='text/javascript' src='js/jquery.js'> </script>
    <script type='text/javascript' src='js/public_comment_ajax.js'></script>
    <script type='text/javascript' src='js/loop_background.js'></script>
    <link href='http://fonts.googleapis.com/css?family=Cutive+Mono' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Give+You+Glory' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href='style.css'>
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['lastname']->value;?>
</title>
    <script>
    </script>
  </head>
  <body>
	<div id='backgrounds'></div>
	<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

     <div id="everything">
	<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
	<div class='postwrapper'>
	<div id="tags">
		<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['post']->value['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
		<a href="private_index.php?tag=<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
"><div id="<?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
" class='tag'>#<?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</div></a>
		<?php } ?>
	</div>
	<div id="title"><div id='titledate'><?php echo $_smarty_tpl->tpl_vars['post']->value['created'];?>
</div><div id="titlespan"><?php echo $_smarty_tpl->tpl_vars['post']->value['title'];?>
</div></div>
	<div class="blogbody"><?php echo $_smarty_tpl->tpl_vars['post']->value['body'];?>
</div>
	<div id="<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" class="hidden showhidecomments"><?php echo $_smarty_tpl->tpl_vars['post']->value['comments_enabled'];?>
</div>
	<div id="<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" class='comments'><?php echo $_smarty_tpl->tpl_vars['post']->value['comments'];?>
</div>
	<form id='<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
'class='comment_form'  action='addcomment.php' method='post'>
		<input id="canary" type="hidden" class='hidden' value ="<?php echo $_smarty_tpl->tpl_vars['canary']->value;?>
">
		<input id="input<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" type='text' class='comment_input' name='comment' placeholder="Type your comment here..." required>
		<input id="inputmail" type='email' class='email_input' name='email' placeholder="email@email.com">
		<input id="" type='submit' class='comment_submit' name='submit' value='Post'>	
	</form>
	</div>
	<?php } ?>
     </div>
  </body>
</html>
<?php }} ?>