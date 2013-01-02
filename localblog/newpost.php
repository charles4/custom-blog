<?php

session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id']))
	header("Location: login.php");

require_once('includes/createcanary.inc.php');
require_once('includes/enable_errorchecking.inc.php');
require_once('db.inc.php');
require_once('smartyconfig.php');

$smarty->assign('name', 'Charles');
$smarty->assign('lastname','Steinke');
$smarty->assign('occupation', 'Writer, Programmer, Layabout.');
$smarty->assign('canary', $canary);
$smarty->display('newpost.tpl');



?>
