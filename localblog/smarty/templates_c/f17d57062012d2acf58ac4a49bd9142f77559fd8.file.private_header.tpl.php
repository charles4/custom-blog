<?php /* Smarty version Smarty-3.1.12, created on 2012-12-09 22:04:54
         compiled from "smarty/templates/private_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84507923750bc33202071c9-81238110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f17d57062012d2acf58ac4a49bd9142f77559fd8' => 
    array (
      0 => 'smarty/templates/private_header.tpl',
      1 => 1355090681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84507923750bc33202071c9-81238110',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50bc3320226c28_54071348',
  'variables' => 
  array (
    'name' => 0,
    'lastname' => 0,
    'occupation' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50bc3320226c28_54071348')) {function content_50bc3320226c28_54071348($_smarty_tpl) {?>	<script>
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
		var px = 250;
		var postNumber = 0;
		$.each($('.postwrapper'), function(){
			var post = this;
			var my_height = this.scrollHeight;
			var my_ypos = px;
			px += Math.floor(my_height*1.455);
			var my_title = $(this).children("#title").children('#titlespan').text();
			var my_date = $(this).children("#title").children('#titledate').text();
			$('#navdropdown').append("<li id='" + my_ypos + "' class='navitem'><a class='navlink' href=''>" + my_date + "</a>"
				+ "<span class='navlinkdate'>---" + my_title + "</span>" + my_height + "</li>"
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
			postNumber+=1;
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
		<a href='newpost.php'><span id='newpostlink' class='menuitem'>New Post</span></a>	
		<a href='logout.php'><span id= 'logoutlink' class='menuitem'>Logout</span></a>	
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