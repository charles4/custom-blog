<?php

$canary = sha1(mt_rand());
$_SESSION['canary'] = $canary;

?>
