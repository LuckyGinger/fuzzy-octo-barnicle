<?php

    require_once('./db_user1.php');


    $apt_id = htmlspecialchars($_GET['apt_id']);
    $name = $description = $gender_housing = $average_rating = $semester_price = 0;
    $user_review[] = 0;
    $user_rating[] = 0;
    $first_name[] = 0;
    $last_name[] = 0;

    try
    {
        // $result = $db->query("SELECT name, description, gender_housing, average_rating, semester_price FROM complex WHERE id=$apt_id");
        // if(!$result) {
        //     die('Invalid query: ' . mysql_error());
        // }

        foreach($db->query("SELECT name, description, gender_housing, average_rating, semester_price FROM complex WHERE id=$apt_id") as $row)
        {
            $apt_name = $row['name'];
            $description = $row['description'];
            $gender_housing = $row['gender_housing'];
            $average_rating = $row['average_rating'];
            $semester_price = $row['semester_price'];
        }

        // TODO: Somehow fix this two queries garbage
        $results = $db->query("SELECT user_review.review, user_review.user_rating, user.first_name, user.last_name FROM user_review JOIN user ON user_review.user_id = user.id WHERE apt_id=$apt_id");
        $reviews = $results->fetchAll(PDO::FETCH_ASSOC);

        // echo json_encode($reviews["review"]);

    }
    catch (PDOException $ex)
    {
       echo 'Error!: ' . $ex->getMessage();
       die();
    }
?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/cs313/app/css/main.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <script src="myscripts.js"></script>

    <title>.::HotThomics::.</title>
</head>
<body>
    <?php include "./ht_nav.html" ?>
    <div class="row">
    <div class="col-md-1 col-sm-2"></div>
    <div class="content_div col-md-7 col-sm-8">
        <h1>HotThomics</h1>
        <h4>A Quite Disreputable Apartment Rater</h4>
        <a type="button" class="btn btn-default" role="button" href="./hotthomics.php">Back</a>
        <?php
            echo "<h3>" . $apt_name . "</h3>";

            echo "<div class='row'>";
            if (!$gender_housing) {
                echo "<h4 class='col-md-4 pull-left'>Men's</h4>";
            } else {
                echo "<h4 class='col-md-4 pull-left'>Women's</h4>";
            }
            echo "<div class='col-md-8 pull-right'>Hot Thomic Rating: <b>" . $average_rating . "</b></div>";
            echo "</div>";

            echo "<div class='row'>";
            echo "  <div class='col-md-6'>" . $description . "</div>";
            echo "  <div class='col-md-6'></div>";
            echo "</div>";
            echo "<br />";
            echo "<br />";
            echo "<h3>Reviews</h3><br />";
            echo "<br />";


            echo "<div class='row'>";
            foreach ($reviews as $value) {
                echo "<div class='user_review col-md-6'>";
                echo "<label class='pull-left'>" . $value["first_name"] . " " . $value["last_name"] . "</label>";
                echo "<div class='pull-right'>" . $value["first_name"]. "'s Hot Thomic Rating: <b>" . $value["user_rating"] . "</b></div><br />";
                echo "<br />";
                echo "<div class='pull-left'>" . $value["review"] . "</div>";
                echo "</div>";
                echo "<div class='col-md-6'></div>";
            }
            echo "</div>";

            // for ($i = 0; $i < count($user_review); $i++)
            // {
            //     echo $user_review[$i];
            //     echo $user_rating[$i];
            //     echo $first_name[$i];
            //     echo $last_name[$i];
            // };
         ?>

        <!-- http://bountifulplace.com/gallery_images//24.jpg -->


    </div>
    <div class="col-md-4 col-sm-2"></div>


</body>
</html>
