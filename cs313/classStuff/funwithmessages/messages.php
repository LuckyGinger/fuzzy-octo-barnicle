<?php
	$file = fopen("thread.txt","r");

	while(! feof($file)) {
		echo fgets($file). "<br />";
	}

	fclose($file);
 ?>
