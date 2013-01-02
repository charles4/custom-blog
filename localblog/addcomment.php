<?php

session_start();
//check xss
include_once("includes/checkcanary_get.inc.php");

if(empty($_GET['email']) || !isset($_GET['email']))
	$_GET['email'] = 'Anon';

include_once('db.inc.php');

//insert comment
$addcomment_query = $db->prepare("
	INSERT INTO `comments` (`post_id`, `user_id`, `body` )
	VALUES (:postid, :userid, :body)
");

$params = array(
	':postid' => $_GET['postid'],
	':userid' => $_GET['email'],
	':body' => $_GET['body']
);

try{
	$addcomment_query->execute($params);
}catch(Exception $e){
	echo $e.getMessage();
}


?> 
