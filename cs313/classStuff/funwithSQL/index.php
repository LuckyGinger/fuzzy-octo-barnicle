<?php

	try
	{
	   $user = 'testuser';
	   $password = 'testpass';
	   $db = new PDO('mysql:host=127.0.0.1;dbname=script', $user, $password);
	}
	catch (PDOException $ex)
	{
	   echo 'Error!: ' . $ex->getMessage();
	   die();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>.::Scriptures::.</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<h1>Scriptures</h1>

	<div id="container">
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Book</th>
	        <th>Chapter</th>
	        <th>Verse</th>
	        <th>Content</th>
	      </tr>
	    </thead>
		    <tbody>

<!-- 			<?php
				$bool = true;

				foreach ($db->query('SELECT book, chapter, verse, content FROM Scriptures') as $row)
				{
					if ($bool) {
						echo '<tr class="success">';
					} else {
						echo '<tr class="info">';
					}
					echo    '<td>'. $row['book'] . '</td>';
					echo    '<td>'. $row['chapter'] . '</td>';
					echo    '<td>'. $row['verse'] . '</td>';
					echo    '<td>'. $row['content'] . '</td>';
					echo '</tr>';
					$bool = !$bool;
				}
			?>
 -->
 			<?php
 				$book = 'Jogn; drop table;';
 				$db->query('SELECT book, chapter, verse, content FROM Scriptures WHERE book=$book');
 			?>
 	    </tbody>
	  </table>
	</div>

</body>
</html>
