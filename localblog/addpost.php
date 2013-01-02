<?php

session_start();

include_once('includes/checkcanary.php');
include_once('db.inc.php');

//using notset for disabled comments and -1 for enabled because i'm a rebel
if (!isset($_POST['comments_enabled']))
	$_POST['comments_enabled'] = -1;

$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//check if post title exists
$checktitle_query = $db->prepare("
	SELECT * FROM `posts` WHERE `title` = :title
");

$params_ctq = array(
	':title' => $_POST['title']
);

$checktitle_query -> execute($params_ctq);
$post = $checktitle_query -> fetch();

if(!empty($post['title']) || isset($post['title']))
	die("Error: A post by the title: " . $post['title'] . ", already exists. Please use a different title.");


$insert_post_query = $db->prepare("
	INSERT INTO `posts` (`title`, `body`, `user_id`, `comments_enabled`) 
	VALUES (:title, :body, :uid, :comments)
");

/*lets setup the postbody, newslines to <br> and whatnot*/
$newbody = str_replace("\n", "<br>", htmlspecialchars($_POST['body']));

$params_ipq = array(
	':title' => htmlspecialchars($_POST['title']),
	':body' => $newbody,
	':uid' => $_SESSION['user_id'],
	'comments' => $_POST['comments_enabled']
);

try{
$insert_post_query->execute($params_ipq);
}
catch (Exception $e){
	die($e->getMessage());
}

//grab the post id
$post_id = $db->lastInsertId();

//now do tags
//parse tags into array
$tags = explode(" ", $_POST['tags']);

//remove  hash tag(s)
$temp = array();
foreach($tags as $tag){
	$temp[] = ereg_replace("[^A-Za-z0-9\-]", "", $tag);
}
$tags = htmlspecialchars($temp);

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
