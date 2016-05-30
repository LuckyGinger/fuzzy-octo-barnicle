
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

			<h1 class="text_center" >Survey Says!</h1>
			<p class="text_center">Results</p>

			<script type="text/javascript">
				// Get the results from the csv file in php and send them to javascript for manipulation
				var results = <?php

					session_start();

					$data = array();

					$file = fopen("datastore.csv", "r");

					$sums = array(array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0),array(0,0,0,0,0));
					$totals = array(0,0,0,0,0);

					while(($line = fgetcsv($file)) !== FALSE) {
						for ($i = 0; $i < sizeof($line) - 1; $i++) {
							for ($j = 0; $j < sizeof($sums[$i]); $j++) {
								if ($j == $line[$i]) {
									$sums[$i][$j] += 1;
								}
							}
						}
					}
					for ($i = 0; $i < sizeof($sums); $i++) {
						for ($j = 0; $j < sizeof($sums[$i]); $j++) {
							$totals[$i] += $sums[$i][$j];
						}
						for ($j = 0; $j < sizeof($sums[$i]); $j++) {
							$sums[$i][$j] = $sums[$i][$j] / $totals[$i] * 100;
						}
					}

					fclose($file);

					echo json_encode($sums);
				 ?>

				console.log(results);
			</script>

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
						<th><?php echo number_format((float)$sums[0][0], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[0][1], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[0][2], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[0][3], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[0][4], 2, '.', '') . '%'; ?></th>
					</tr>
					<tr>
						<th><label>Idaho has the best Potato Salad</label></th>
						<th><?php echo number_format((float)$sums[1][0], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[1][1], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[1][2], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[1][3], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[1][4], 2, '.', '') . '%'; ?></th>
					</tr>
					<tr>
						<th><label>Hugh Jackman</label></th>
						<th><?php echo number_format((float)$sums[2][0], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[2][1], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[2][2], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[2][3], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[2][4], 2, '.', '') . '%'; ?></th>
					</tr>
					<tr>
						<th><label>SpongeBob S3 Ep17</label></th>
						<th><?php echo number_format((float)$sums[3][0], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[3][1], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[3][2], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[3][3], 2, '.', '') . '%'; ?></th>
						<th><?php echo number_format((float)$sums[3][4], 2, '.', '') . '%'; ?></th>
					</tr>
				</tbody>
			</table>

		</div>
		<div class="col-md-4 col-sm-2"></div>

	</div>
	</div>
 </body>
 </html>
