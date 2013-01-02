<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

// put full path to Smarty.class.php
require('/var/www/localblog/SmartyLib/libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->setTemplateDir('smarty/templates');
$smarty->setCompileDir('smarty/templates_c');
$smarty->setCacheDir('smarty/cache');
$smarty->setConfigDir('smarty/configs');

?>
