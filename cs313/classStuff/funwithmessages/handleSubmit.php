<?php

	$username = htmlspecialchars($_POST["name"]);
	$comment = htmlspecialchars($_POST["comment"]);

	$txt = "$username: $comment";
	$myfile = file_put_contents('thread.txt', $txt.PHP_EOL , FILE_APPEND);

	header( 'Location: messages.php' );

 ?>
