<html>
  <head>
    <script type='text/javascript' src='js/jquery.js'> </script>
    <script type='text/javascript' src='js/comment_ajax.js'></script>
    <script type='text/javascript' src='js/loop_background.js'></script>
    <script type='text/javascript' src='js/remove_post.js'></script>
    <link href='http://fonts.googleapis.com/css?family=Cutive+Mono' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Give+You+Glory' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href='style.css'>
    <title>{$name} {$lastname}</title>
    <script>
    </script>
  </head>
  <body>
	<div id="backgrounds"></div>
	{include file='private_header.tpl'}
     <div id="everything">
	{foreach from=$posts item=post name=blog}
	<div class='postwrapper'>
	<div id="tags">
		{foreach from=$post.tags item=tag name=tags}
		<a href="private_index.php?tag={$tag.id}"><div id="{$tag.name}" class='tag'>#{$tag.name}</div></a>
		{/foreach}
	</div>
	<div id="title"><div id='titledate'>{$post.created}</div><div id="titlespan">{$post.title}</div></div>
	<div id='managepostmenu'><span class='managemenu'><a href='editpost.php?post_id={$post.id}'>Edit Post</a></span><span class='managemenu'><a class='removepostlink' href="deletepost.php?post_id={$post.id}&canary={$canary}">Remove Post</a></span></div>

	<div class="blogbody">{$post.body}</div>
	<div id="{$post.id}" class="hidden showhidecomments">{$post.comments_enabled}</div>
	<div id="{$post.id}" class='comments'>{$post.comments}</div>
	<form id='{$post.id}'class='comment_form'  action='addcomment.php' method='post'>
		<input id='canary' type='hidden' name='canary' value="{$canary}">
		<input id="input{$post.id}" type='text' class='comment_input' name='comment' placeholder="Type your comment here..." required>
		<input id="inputmail" type='email' class='email_input' name='email' placeholder="email@email.com">
		<input id="" type='submit' class='comment_submit' name='submit' value='Post'>	
	</form>
	</div>
	{/foreach}
     </div>
  </body>
</html>
