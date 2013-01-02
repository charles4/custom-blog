<html>
  <head>
    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/loop_background.js'></script>

    </script>
    <link rel="stylesheet" type="text/css" href='style.css'>
    <title>{$name} {$lastname}</title>
  </head>
  <body>
	<div id="backgrounds"></div>
	<div id=header>
		{include file='private_header.tpl'}
	</div>
    <div id='everything'>
	<form method='post' action='process_edit.php'>
		<input id='canary' name='canary' type='hidden' value="{$canary}">	
		<input id='created' name='created' type='hidden' value="{$created}">
		<input id='postid' name='postid' type='hidden' value="{$postid}">
	<div id="new_tags" class='newpost'>
		<label for='input_tags'>Tags</label>
		<input id='input_tags' class='newpost' name='tags' type='text' value="{$existing_tags}">
	</div>
	<div id='new_title' class='newpost'>
		<label for='input_title'>Title</label>
		<input id='input_title' class ='newpost' name='title' type='text' value="{$existing_title}">
	</div>
	<div id="new_blogbody" class='newpost'>
		<label for="input_body">Body</label>
		<textarea id='input_body' class='newpost' name='body' rows='30' cols='60'>{$existing_body}</textarea>
	</div>
	<div id="new_comments" class='newpost'>
		Enable Comments: 
		<input id='comments_enabled' class='newpost' name='comments_enabled' type='checkbox' checked="{$comments_enabled}">
	</div>
	<input id='submit' name='submit' type='submit' value='Save Changes'>
	</form>
     </div>
  </body>
</html>
