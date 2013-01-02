<?php

include_once("db.inc.php");

$get_filepaths_query=$db->prepare("SELECT * FROM `backgrounds` ORDER BY RAND()");
$get_filepaths_query->execute();

$results = $get_filepaths_query->fetchALL(PDO::FETCH_ASSOC);


echo json_encode($results);

?>
