<?php


session_start();

if(empty($_GET['id']) || !isset($_GET['id']))
	die("No post id specified for removal.");

include_once('db.inc.php');
include_once('includes/checkcanary_get.inc.php');

//remove comment from db
$removepost_query = $db -> prepare("
	DELETE FROM `comments` WHERE `id` = :id
");
try{$removepost_query -> execute(array(':id'=>$_GET['id']));}
catch(Exception $e){die($e->getMessage());}


echo "success!... hopefully.";


?>
