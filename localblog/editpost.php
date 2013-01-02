<?php

session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id']))
	header("Location: login.php");

if (!isset($_GET['post_id']) || empty($_GET['post_id']))
	die("need post_id");

ini_set('display_errors',1);
error_reporting(E_ALL);

require_once('db.inc.php');

$canary_key = sha1(mt_rand());
$_SESSION['canary'] = $canary_key;

//setup query to fetch specified post
$getpost_query = $db -> prepare("
	SELECT * FROM `posts` WHERE `id` = :id
");

$params_gp = array(
	':id' => $_GET['post_id']
);

$getpost_query -> execute($params_gp);
$post = $getpost_query -> fetch();

//fetch tags for the tag line
$gettags_query = $db -> prepare("
	SELECT `tag` FROM `tags` WHERE `post_id` = :id
");

$gettags_query -> execute(array(':id' => $_GET['post_id']));
$tags = $gettags_query -> fetchALL(PDO::FETCH_ASSOC);
$tags_str  = '';
foreach($tags as $tag){
	$tags_str = $tags_str . " " . $tag['tag'];
}

require_once('smartyconfig.php');

$smarty->assign('name', 'Charles');
$smarty->assign('lastname','Steinke');
$smarty->assign('occupation', 'Writer, Programmer, Genius.');
$smarty->assign('canary', $canary_key);
$smarty->assign('existing_tags', $tags_str);
$smarty->assign('existing_title', $post['title']);
$smarty->assign('existing_body', $post['body']);
$smarty->assign('comments_enabled', $post['comments_enabled']);
$smarty->assign('created', $post['created']);
$smarty->assign('postid', $post['id']);
$smarty->display('editpost.tpl');



?>
