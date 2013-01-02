<?php

session_start();

include_once('db.inc.php');

$getcomments_query = $db->prepare("
	SELECT * FROM `comments` WHERE `post_id` =  :postid AND `id` > :id
");
	
$params = array(
	':postid' => $_GET['postid'],
	':id' => $_GET['id']
);

$getcomments_query->execute($params);

$comments = $getcomments_query->fetchALL(PDO::FETCH_ASSOC);

echo json_encode($comments);

?>
