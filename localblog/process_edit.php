<?php

session_start();

include_once('checkcanary.php');
include_once('db.inc.php');

if (!isset($_POST['comments_enabled']))
	$_POST['comments_enabled'] = -1;

$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//setup update query
$update_query = $db->prepare("
	UPDATE `posts` SET `title` = :title, `body` = :body, `comments_enabled` = :co WHERE `id` = :postid
");

$params_update = array(
	':postid' => $_POST['postid'],
	':title' => $_POST['title'],
	':body' => $_POST['body'],
	':co' => $_POST['comments_enabled']
);

try{$update_query -> execute($params_update);}
catch(Exception $e){die($e->getMessage());}

//grab the post id
$post_id = $_POST['postid'];

//now do tags
//first remove existign tags w/ this posts id (otherwise we have to do
//complicated things to determine what tags to keep

$removetags_query = $db->prepare("
	DELETE FROM `tags` WHERE `post_id` = :id 
");
$removetags_query->execute(array(':id' => $post_id));



//parse tags into array
$tags = explode(" ", $_POST['tags']);

//parse out non-normal textcharacters
$temp = array();
foreach($tags as $tag){
	$temp[] = ereg_replace("[^A-Za-z0-9\-]", "", $tag);
}
$tags = $temp;

//generate ID for each tag
$tag_ids = array();
foreach($tags as $tag){
	$tag_ids[$tag] = md5($tag);
}

$insert_tag_query = $db->prepare("
	INSERT INTO `tags` (`post_id`, `tag`, `tag_id`)
	VALUES (:postid, :tag, :tagid)
");

//insert tags
foreach($tags as $tag){
	try{
		$insert_tag_query->execute(
					array(
						':tagid'=>$tag_ids[$tag],
						'postid'=>$post_id, 
						'tag' => $tag
					));
	}catch(Exception $e){
		echo $e->getMessage();
	}

}

header("Location: private_index.php");
?>
