<?php
ini_set('display_errors',1);
error_reporting(E_ALL);


session_start();

//check canary attacks
include_once('includes/checkcanary.php');

//check to make sure we're passed a email(username) and password
if(!isset($_POST['email']) || empty($_POST['email']))
	die("Error: email required");

if(!isset($_POST['password']) || empty($_POST['password']))
	die("Error: password required");

//setup pdo object
include_once('db.inc.php');
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//check if email address exist in db already
$checkexist_query = $db->prepare("
	SELECT `email` FROM `users` WHERE `email` = :email 
");

$email = $_POST['email'];
$params = array(
	':email' => $email
);

try{
	$checkexist_query->execute($params);	
}
catch (Exception $e){
	echo $e->getMessage();
}
$user = $checkexist_query->fetch();
if(!empty($user)){
	die ("account exists already");
}
//now setup password encryption
//generate random string
$alaphet = '/.abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$mix = str_shuffle(str_repeat($alaphet, 1000));

//setup for bcrypt
$salt = '2a$12$' . $mix . '$';

//encrypt
$password = crypt($_POST['password'], $salt);

//insert to db
$adduser_query = $db->prepare("
	INSERT INTO `users` (`email`, `password`)
	VALUES (:email, :password)
");

$au_params = array(
	':email' => $_POST['email'],
	':password' => $password
);

try{
	$adduser_query->execute($au_params);
}
catch (Exception $e){
	echo $e->getMessage();
}

$uid = $db->lastInsertID();

$_SESSION['user_id'] = $uid;

//header ("Location: index.php");

?>
