<?php /* Smarty version Smarty-3.1.12, created on 2012-11-28 15:19:02
         compiled from "/var/www/blog/smarty/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:163557250650b62b6602d0f5-88443462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39c6a6d921b3d9de74388e56ad0be63eba00e6e0' => 
    array (
      0 => '/var/www/blog/smarty/templates/header.tpl',
      1 => 1354115620,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163557250650b62b6602d0f5-88443462',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'lastname' => 0,
    'occupation' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50b62b6604c535_73585260',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b62b6604c535_73585260')) {function content_50b62b6604c535_73585260($_smarty_tpl) {?>	<script>
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


		/*this outlines the page & creates links to each post*/
		var temphtml = '';
		$.each($('.postwrapper'), function(){
			var post = this;
			var my_ypos = $(this).offset().top;
			var my_title = $(this).children("#title").children('#titlespan').text();
			var my_date = $(this).children("#title").children('#titledate').text();
			$('#navdropdown').append("<li id='" + my_ypos + "' class='navitem'><a class='navlink' href=''>" + my_date + "</a>"
				+ "<span class='navlinkdate'>" + my_title + "</span>" + my_ypos + "</li>"
			);
			$('li[id='+my_ypos+']').click(function(){
				$('html, body').animate({
					scrollTop: my_ypos
				}, 500);
				$('#navdropdown').hide();
				$('.postwrapper').css("background-color", "rgba(255,255,255,0.0)");
				$('.postwrapper').css("border", "");
				$(post).css("background-color", "rgba(255,255,255,1.0)");
				$(post).css("border", "solid black 5px");
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
		
		/*this loop hides any comment functionality for those posts with comments disabled*/
		$.each($('.comments'), function(){
			var myid = $(this).attr('id');
			var showcomments = $('.showhidecomments[id='+myid+']');
			if ($(showcomments).html() == -1){
				$(this).css("visibility", "hidden");
				$('form[id='+myid+']').css("visibility", "hidden");
			}
		});

	    });
	</script>

<div id='header'>


	<div id="menubanner">
		<a href='index.php'><span id='homelink' class='menuitem'>Home</span></a>
		<a href=''><span id= 'tagslink' class='menuitem'>Tags</span></a>
		<a href=''><span id= 'navlink' class='menuitem'>Navigate</span></a>
		<a href='login.php'><span id= 'logoutlink' class='menuitem'>Login</span></a>	
 	  <div id="tagsdropdown" class="hidden dropdownmenu">
	  </div>
	  <ul id="navdropdown" class="hidden dropdownmenu">
	  </ul>
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