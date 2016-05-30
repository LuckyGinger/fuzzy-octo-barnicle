<?php

	session_start();

 ?>

 <!DOCTYPE html>
 <html>
 <head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/cs313/app/css/main.css">
	<link rel="stylesheet" type="text/css" href="/cs313/app/css/survey.css">


 	<title>.::Survey::.</title>
 </head>
 <body>
	<?php include "../../html/navbar.html" ?>
		<div class="row">
		<div class="col-md-1 col-sm-2"></div>
		<div class="content_div col-md-7 col-sm-8">

			<h1 class="text_center" >A Survey On Pressing Matters</h1>
			<p class="text_center">Please answer the following questions on pressing matters</p>

			<br />
			<br />

			<?php if (isset($_SESSION["taken"])): ?>
				<?php header( 'Location: resultsPage.php' ); ?>
			<?php else: ?>
				<div>
					<form action="handleSubmit.php" method="post">

						<h3>Control Questions</h3>

						<table class="table">
							<tbody>
								<tr>
									<th>Name:</th>
									<th><input type="text" id="user_name" name="user_name"></th>
								</tr>
							</tbody>
						</table>

						<h3>How much do you agree with these statements?</h3>
						<table class="table">
							<thead>
								<tr>
									<th>Statement</th>
									<th>Strongly Disagree</th>
									<th>Disagree</th>
									<th>Indifferent</th>
									<th>Agree</th>
									<th>Strongly Agree</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th><label>Churros are absolutely to die for</label></th>
									<th><input type="radio" name="churros_q" value="0"></input></th>
									<th><input type="radio" name="churros_q" value="1"></input></th>
									<th><input type="radio" name="churros_q" value="2"></input></th>
									<th><input type="radio" name="churros_q" value="3"></input></th>
									<th><input type="radio" name="churros_q" value="4"></input></th>
								</tr>
								<tr>
									<th><label>Idaho has the best Potato Salad</label></th>
									<th><input type="radio" name="potatos_q" value="0"></input></th>
									<th><input type="radio" name="potatos_q" value="1"></input></th>
									<th><input type="radio" name="potatos_q" value="2"></input></th>
									<th><input type="radio" name="potatos_q" value="3"></input></th>
									<th><input type="radio" name="potatos_q" value="4"></input></th>
								</tr>
								<tr>
									<th><label>Hugh Jackman</label></th>
									<th><input type="radio" name="hugh_q" value="0"></input></th>
									<th><input type="radio" name="hugh_q" value="1"></input></th>
									<th><input type="radio" name="hugh_q" value="2"></input></th>
									<th><input type="radio" name="hugh_q" value="3"></input></th>
									<th><input type="radio" name="hugh_q" value="4"></input></th>
								</tr>
								<tr>
									<th><label>SpongeBob S3 Ep17</label></th>
									<th><input type="radio" name="spongebob_q" value="0"></input></th>
									<th><input type="radio" name="spongebob_q" value="1"></input></th>
									<th><input type="radio" name="spongebob_q" value="2"></input></th>
									<th><input type="radio" name="spongebob_q" value="3"></input></th>
									<th><input type="radio" name="spongebob_q" value="4"></input></th>
								</tr>
							</tbody>
						</table>
						<!-- <input type="submit" value="Submit"> -->
						<button type="submit" class="btn btn-primary btn-lg btn-block" onclick="parent.location='results.php'">Submit!</button>
					</form>
					<br />
					<button type="button" class="btn btn-primary btn-lg btn-block" onclick="parent.location='resultsPage.php'">Skip to Results</button>
				</div>
				<?php endif; ?>
		</div>
		<div class="col-md-4 col-sm-2"></div>

	</div>
	</div>
 </body>
 </html>
