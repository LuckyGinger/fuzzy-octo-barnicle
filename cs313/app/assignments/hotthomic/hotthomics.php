<?php
    session_start();
    require_once('./db_user1.php');
    $db = connectToDb();


?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/cs313/app/css/main.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/hot.css">
    <script src="myscripts.js"></script>

    <title>.::HotThomics::.</title>
</head>
<body>
    <?php include "./ht_nav.php" ?>
    <div class="row">
    <div class="col-md-1 col-sm-2"></div>
    <div class="content_div col-md-7 col-sm-8">
        <h1>HotThomics</h1>
        <h4>A Quite Disreputable Apartment Rater</h4>

        <h3>Top Apartments this week</h3>
        <?php
            foreach ($db->query('SELECT id, name, description, gender_housing, average_rating, semester_price FROM complex ORDER BY average_rating DESC') as $row)
            {
                echo "<h3><a  href='reviews.php?apt_id=" . $row['id'] . "'>" . $row['name'] . "</a></h3>";

                echo "<div class='row'>";
                if (!$row['gender_housing']) {
                    echo "<h4 class='col-md-4 pull-left'>Men's</h4>";
                } else {
                    echo "<h4 class='col-md-4 pull-left'>Women's</h4>";
                }
                echo "<div class='col-md-8 pull-right'>Hot Thomic Rating: <b>" . $row['average_rating'] . "</b></div>";
                echo "</div>";

                echo "<div class='row'>";
                echo "  <div class='col-md-6'>" . $row['description'] . "</div>";
                echo "  <div class='col-md-6'></div>";
                echo "</div>";
            }
        ?>
        <!-- http://bountifulplace.com/gallery_images//24.jpg -->


    </div>
    <div class="col-md-4 col-sm-2"></div>


</body>
</html>
