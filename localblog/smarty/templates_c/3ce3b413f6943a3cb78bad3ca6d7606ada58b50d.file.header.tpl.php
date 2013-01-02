<?php /* Smarty version Smarty-3.1.12, created on 2012-12-10 06:33:21
         compiled from "smarty/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144085050850bc32f54cb133-65731451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ce3b413f6943a3cb78bad3ca6d7606ada58b50d' => 
    array (
      0 => 'smarty/templates/header.tpl',
      1 => 1355120892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144085050850bc32f54cb133-65731451',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50bc32f54f3239_97962968',
  'variables' => 
  array (
    'name' => 0,
    'lastname' => 0,
    'occupation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50bc32f54f3239_97962968')) {function content_50bc32f54f3239_97962968($_smarty_tpl) {?>	<script>
	    $(document).ready(function(){
		/*this animates the tag dropdown menu*/
		$('#tagslink').click(function() {
			if($('#tagsdropdown').is(":hidden")){
				$.each($('.dropdownmenu'), function(){
					$(this).hide();
				});
			  	$('#tagsdropdown').slideDown("fast");
			} else {
				$('#tagsdropdown').hide();
			}
			return false;
		});
		/*this animates the nav dropdown menu*/
		$('#navlink').click(function() {
			if($('#navdropdown').is(":hidden")){
				$.each($('.dropdownmenu'), function(){
					$(this).hide();
				});
			  	$('#navdropdown').slideDown("fast");
			} else {
				$('#navdropdown').hide();
			}
			return false;
		});
		/*this animates the login dropdown menu*/
		$('#loginlink').click(function() {
			if($('#logindropdown').is(":hidden")){
				$.each($('.dropdownmenu'), function(){
					$(this).hide();
				});
			  	$('#logindropdown').slideDown("fast");
			} else {
				$('#logindropdown').hide();
			}
			return false;
		});

		/*this loop hides any comment functionality for those posts with comments disabled*/
		$.each($('.comments'), function(){
			var myid = $(this).attr('id');
			var showcomments = $('.showhidecomments[id='+myid+']');
			if ($(showcomments).html() == -1){
				$(this).css("visibility", "hidden");
				$('form[id='+myid+']').css("visibility", "hidden");
			}
		});


		/*this outlines the page & creates links to each post*/
		var temphtml = '';
		$.each($('.postwrapper'), function(){
			var post = this;
			var my_title = $(this).children("#title").children('#titlespan').text();
			var my_date = $(this).children("#title").children('#titledate').text();
			$('#navdropdown').append("<li id='" + my_title + "' class='navitem'><a class='navlink' href=''>" + my_date
				+ "<span class='navlinktitle'>" + my_title + "</span></a></li>"
			);
			$("li[id='"+my_title+"']").click(function(){
				$.each($('.postwrapper'), function(){
					if($(this).children("#title").children('#titlespan').text() != my_title)
						$(this).fadeOut();
					else
						$(this).fadeIn();
				});
				$('#navdropdown').hide();
				return false;	
			});
		});

		/*this loop retrieves all tags and inserts them into the tag navigation menu*/
		$.getJSON(
 		  'get_all_tags.php',
		  function(data){
			$.each(data, function(key, val){
				var htmlstring = "<a href='private_index.php?tag=" + val.id + "'><div class='tag'>" + val.name + "</div></a>";
				$('#tagsdropdown').append(htmlstring);
			});
		   }
	        );
		


	    });
	</script>

<div id='header'>


	<div id="menubanner">
		<a href='index.php'><span id='homelink' class='menuitem'>Home</span></a>
		<a href=''><span id= 'tagslink' class='menuitem'>Tags</span></a>
		<a href=''><span id= 'navlink' class='menuitem'>Navigate</span></a>
		<a href='login.php'><span id= 'loginlink' class='menuitem'>Login</span></a>	
 	  <div id="tagsdropdown" class="hidden dropdownmenu"></div>
	  <ul id="navdropdown" class="hidden dropdownmenu"></ul>
	  <div id='logindropdown' class='hidden dropdownmenu'><br><?php echo $_smarty_tpl->getSubTemplate ('login.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
	</form>
	  </div>
	</div>
	<div id="titlebanner">
		<span id ='firstname' class=''><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</span>
		<span id ='lastname' class=''><?php echo $_smarty_tpl->tpl_vars['lastname']->value;?>
</span>
		<span id ='occupation' class=''><?php echo $_smarty_tpl->tpl_vars['occupation']->value;?>
</span>
	</div> 
</div>
<?php }} ?>