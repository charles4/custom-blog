<html>
  <head>
    <script type='text/javascript' src='js/jquery.js'> </script>
    <script type='text/javascript' src='js/loop_background.js'></script>
    <link rel="stylesheet" type="text/css" href='style.css'>
    <title>{$name} {$lastname}</title>
  </head>
  <body>
	<div id="backgrounds"></div>
	<div id=header>
		{include file='private_header.tpl'}
	</div>
    <div id='everything'>
	<form method='post' action='addpost.php'>
		<input id='canary' name='canary' type='hidden' value="{$canary}">	

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
