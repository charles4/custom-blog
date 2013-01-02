<?php


if (empty($_SESSION['canary']) || !isset($_SESSION['canary']))
	die("the canary died. Session not set..");

if (!empty($_POST['canary']) || isset($_POST['canary'])){}
else{
	die("the canary died. post or get not set. ");
}

if ($_POST['canary'] !== $_SESSION['canary']){
	die('the canary died.');
}
?>
