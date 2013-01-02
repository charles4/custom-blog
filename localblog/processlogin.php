<?php

session_start();

if (empty($_POST['email']))
	die("need username & password");
if (empty($_POST['password']))
	die("need username & password");

include_once('includes/checkcanary.php');
include_once('db.inc.php');

//query for user info
$checkuserpass_query = $db->prepare("
	SELECT * FROM `users` WHERE `email` = :email
");

//php seems to hate $_POST['emai'] inside arrays
$email = $_POST['email'];
$params = array(
	':email' => $email
);

try{
	$checkuserpass_query->execute($params);
}catch(Exception $e){
	$e -> getMessage();
}

$user = $checkuserpass_query->fetch();
if(empty($user))
	die ('invalid login');
print_r($user);
//check password
	
// existing password hash
$existing_password = $user['password'];
$form_password = $_POST['password'];

if (crypt($form_password, $existing_password) != $existing_password) {
    die("bad password");
}

$_SESSION['user_id'] = $user['id'];
$_SESSION['email'] = $user['email'];
header("Location: private_index.php");

?>
