<?php


if (empty($_SESSION['canary']) || !isset($_SESSION['canary']))
	die("the canary died. Session not set..");

if (!empty($_GET['canary']) || isset($_GET['canary'])){}
else{
	die("the canary died. post or get not set. ");
}

if ($_GET['canary'] !== $_SESSION['canary']){
	die("session & post canary do not agree.");
}
?>
