<?php
?>

<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="./js/main.js"></script>


	<title>.::Assignments - Thom's Muffins::.</title>
</head>
<body>
	<?php include "../app/html/navbar.html" ?>
	<div class="row">
		<div class="col-md-1 col-sm-2"></div>
		<div class="content_div col-md-7 col-sm-8">
			<h1 class="coming_soon" >Assignments:</h1>

			<button type="button" class="btn btn-primary btn-lg btn-block" onclick="parent.location='/cs313/app/assignments/phpSurvey/survey.php'">1. PHP Survey</button>
			<button type="button" class="btn btn-primary btn-lg btn-block" onclick="parent.location='/cs313/app/assignments/phpDA/hotthomics.php'">2. PHP Database Access</button>
			<!-- <img src="./images/t_rex.gif" class="img-responsive center-block" alt="t-rex"> -->


		</div>
		<div class="col-md-4 col-sm-2"></div>

	</div>


</body>
</html>
