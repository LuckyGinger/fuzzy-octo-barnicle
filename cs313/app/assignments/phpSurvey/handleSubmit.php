<?php

	session_start();

	$user_name = htmlspecialchars($_POST["user_name"]);
	$gender = htmlspecialchars($_POST["gender"]);

	$churros = htmlspecialchars($_POST["churros_q"]);
	$potatos = htmlspecialchars($_POST["potatos_q"]);
	$hugh = htmlspecialchars($_POST["hugh_q"]);
	$spongebob = htmlspecialchars($_POST["spongebob_q"]);


	$line = array($churros, $potatos, $hugh, $spongebob, $user_name);
	$file = fopen("datastore.csv", "a");
	fputcsv($file, $line);
	fclose($file);

	$_SESSION["taken"] = true;

	header( 'Location: resultsPage.php' );

 ?>
