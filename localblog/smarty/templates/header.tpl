	<script>
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
	  <div id='logindropdown' class='hidden dropdownmenu'><br>{include file='login.tpl'}</div>
	</form>
	  </div>
	</div>
	<div id="titlebanner">
		<span id ='firstname' class=''>{$name}</span>
		<span id ='lastname' class=''>{$lastname}</span>
		<span id ='occupation' class=''>{$occupation}</span>
	</div> 
</div>
