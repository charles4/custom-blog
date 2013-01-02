<?php

session_start();

if(empty($_GET['post_id']) || !isset($_GET['post_id']))
	die("No post id specified for removal.");

include_once('includes/enable_errorchecking.inc.php');
include_once('db.inc.php');
include_once('includes/checkcanary_get.inc.php');

//remove post from db
$removepost_query = $db -> prepare("
	DELETE FROM `posts` WHERE `id` = :id
");
try{$removepost_query -> execute(array(':id'=>$_GET['post_id']));}
catch(Exception $e){die($e->getMessage());}
//remove assoc tags from db
$removetags_query = $db -> prepare("
	DELETE FROM `tags` WHERE `post_id` = :id
");
try{$removetags_query -> execute(array(':id'=>$_GET['post_id']));}
catch(Exception $e){die($e->getMessage());}


header('location:index.php');

?>
