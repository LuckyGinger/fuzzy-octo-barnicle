<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body style="background-color: black; color: red;">
    <style>
        #wanted{
            font-weight: bold;
            font-size:50px;
        }
        #container{
            width: 100%;
            font-family: Goudy Stout;
        }

        #container table{
            margin-left: 30%;
            min-width:600px;
            text-align: center;
        }
        #gender {
			font-size: 30px;
        }
    </style>
    <div id="container">
        <table>
            <tr>
                <td id="wanted">
                    WANTED <br />
					<?php echo $_POST["first_name"] . " " . $_POST["last_name"]?>
                </td>
            </tr>
            <tr>
				<td id="gender">
					For Stealing the<br /> heart of many
					<?php
						if ($_POST["gender"] == "male") {
							echo " girls";
						} else {
							echo " boys";
						}
					 ?>
					 <br />
				</td>
        	</tr>
        	<tr>
        		<td>
					Last seen in<br />
						<?php
						foreach ($_POST["places"] as $key => $value) {
						echo $value . "<br />";	# code...
						}
					?>
        		</td>
        	</tr>
        	<tr>
                <td >
                    Well known for <br />
					<?php echo $_POST["fact"];?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
