<?php

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>.::FunWithForms::.</title>
</head>
<body>
<style>
	ul{
		list-style: none;
	}
</style>
	<div style="text-align: center;">
		<form action="action.php" method="post">
			<label>First Name: </label><input type="text" name="first_name"></input><br />
			<label>Last  Name: </label><input type="text" name="last_name"></input><br />
			<label>Gender:</label><br />
			<label>Male: </label><input type="radio" value="male" name="gender"><label> Female: </label><input type="radio" value="female" name="gender"><br />
			<label>Cities Lived in:</label><br />
			<ul>
				<li><label>Rexburg, ID</label><input type="checkbox" name="places[]" value="Rexburg, ID"></input></li>
				<li><label>Denver, CO</label><input type="checkbox" name="places[]" value="Denver, Co"></input></li>
				<li><label>Provo, UT</label><input type="checkbox" name="places[]" value="Provo, UT"></input></li>
				<li><label>Los Angeles, CA</label><input type="checkbox" name="places[]" value="Los Angeles, CA"></input></li>
				<li><label>Paris, France</label><input type="checkbox" name="places[]" value="Paris, France"></input></li>
			</ul>
			<label>Random Fact:</label><br />
			<textarea name="fact" rows="10" cols="100"></textarea><br />

			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>
