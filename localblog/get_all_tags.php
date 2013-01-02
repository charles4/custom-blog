<?php

include_once('db.inc.php');

$gettags_query = $db->prepare("
	SELECT DISTINCT * FROM `tags`
");

$gettags_query->execute();

$allstuff = $gettags_query->fetchAll(PDO::FETCH_ASSOC);

$output=array();
foreach($allstuff as $tag){
	$temptag = array();
	$temptag['name'] = "#" . ltrim($tag['tag'], "#");
	$temptag['id'] = $tag['tag_id'];
	$output[] = $temptag;
}
echo json_encode($output);
?>
