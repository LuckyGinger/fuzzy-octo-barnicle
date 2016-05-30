<?php

    try
    {
       $user = 'testuser';
       $password = 'testpass';
       $db = new PDO('mysql:host=localhost;dbname=script', $user, $password);
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
        <table>
            <tbody>
                <tr>
                    <td>Book</td>
                    <td><input type="text" name="book_name"></td>
                </tr>
                <tr>
                    <td>Chapter</td>
                    <td><input type="text" name="chapter"></td>
                </tr>
                <tr>
                    <td>Verse</td>
                    <td><input type="text" name="verse"></td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td><input type="text" name="content"></td>
                </tr>
                <tr>
                    <td>Topic</td>
                    <td><span>
                    <?php
                        foreach ($db->query('SELECT (id, name) FROM topic') as $row)
                        {
                            // echo "$row['name'] <input type='checkbox' name='topic' value='$row['name']'><br />"
                        }
                    ?>
                    </span></td>
                </tr>

            </tbody>
    </div>

</body>
</html>
