<?php

session_start();


if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id']))
	if(!isset($_GET['tag']) || empty($_GET['tag']))
		header("Location: index.php");
	else
		header("location: index.php?tag=" . $_GET['tag']);

require_once('includes/enable_errorchecking.inc.php');
require_once('includes/createcanary.inc.php');
require_once('db.inc.php');


if(!isset($_GET['tag']) || empty($_GET['tag'])){
	//get all posts
	$getposts_query = $db->prepare("
		SELECT * FROM `posts` ORDER BY `id` DESC;
	");
	$getposts_query->execute();
}else{
	//get all posts w/ specified tag
	$getposts_query = $db->prepare("
		select DISTINCT * from `tags` left join `posts` on posts.id = tags.post_id where tags.tag_id = :tagid ORDER BY `id` DESC;	
	");
	$params = array(
		':tagid' => $_GET['tag']
	);
	$getposts_query->execute($params);
}

$posts = $getposts_query->fetchALL();


//get tags for each post
$gettags_query = $db->prepare("
	SELECT DISTINCT `tag`, `tag_id` FROM `tags` WHERE `post_id` = :postid 
");

//get comments for eachpost
$getcomments_query = $db->prepare("
	SELECT * FROM `comments` where `post_id` = :postid
");

#final posts is an array of posts with tags appended on
$final_posts = array();

foreach($posts as $post){
	$gettags_query->execute(array(':postid' => $post['id']));
	$tags = $gettags_query->fetchALL(PDO::FETCH_ASSOC);
	
	#build array of tags
	$tmpray=array();
	foreach($tags as $tag){
		$tmptag = array();
		//should be safe, most special chars parsed out, but whatever
		$tmptag['name'] =  htmlspecialchars($tag['tag']); 
		$tmptag['id'] = $tag['tag_id'];
		$tmpray[] = $tmptag;
	}
	$post['tags'] = $tmpray;
	$post['5'] = $tmpray;

	#after adding tags, need to escape all userinputted content
	$post['title'] = htmlspecialchars($post['title']);
	$post['body'] = str_replace("  ", "&nbsp&nbsp", $post['body']);
	
	#comments are via ajax
	$post['comments'] = "----Loading Comments-----";
	$final_posts[] = $post;
}

require_once('smartyconfig.php');

$smarty->assign('name', 'Charles');
$smarty->assign('lastname','Steinke');
$smarty->assign('occupation', 'Writer, Programmer, Layabout');
$smarty->assign('posts', $final_posts);
$smarty->assign('canary', $canary);

$smarty->display('private_index.tpl');



?>
