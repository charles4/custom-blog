<?php

/*THIS SCRIPT MUST RUN FROM THE PLACE WHERE YOU WANT TO REFERENCE THE IMAGES FROM */


function add_backgrounds ( $pathtoimages ) 
{
	include_once('db.inc.php');
	//define sql queries
	$dropallimages_query = $db->prepare("REMOVE * FROM `backgrounds`");
	$addimage_query = $db->prepare("INSERT INTO `backgrounds` (`path`) VALUES (:path)");


	//drop all current backgrounds in db, since there's not that many and its easier
	$dropallimages_query -> execute();
	
	//open dir
	$dir = opendir($pathtoimages);
	//loop through for images
	while (false !== ($fname = readdir($dir))){
			
		$f_info = pathinfo($pathtoimages . $fname);
		if ( (strtolower($f_info['extension'])  == 'jpg') || (strtolower($f_info['extension']) == 'png'))
		{
			//add to the db
			try{
				$addimage_query -> execute(array(':path' => "{$pathtoimages}{$fname}"));
			}catch(Exception $e){
				die($e->getMessage());
			}

		}

	}
	


}

add_backgrounds('images/');

?>
