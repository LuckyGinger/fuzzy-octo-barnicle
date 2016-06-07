<?php
    // session_start();

    require_once('./db_user1.php');
    $db = connectToDb();

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

        $average = 0;
        $count = 0;
        foreach($db->query("SELECT user_rating  FROM user_review WHERE apt_id=$apt_id") as $row2)
        {
            $average += $row2['user_rating'];
            $count++;
        }
        $average_rating = $average / $count;



        // TODO: Somehow fix this two queries garbage
        $results = $db->query("SELECT user_review.review, user_review.user_rating, user_review.time_stamp, user.user_name FROM user_review JOIN user ON user_review.user_id = user.id WHERE apt_id=$apt_id");
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
        <a type="button" class="btn btn-default" role="button" href="./hotthomics.php">Back</a>
        <?php
            echo "<h3>" . $apt_name . "</h3>";

            echo "<div class='row'>";
            if (!$gender_housing) {
                echo "<h4 class='col-md-4 pull-left'>Men's</h4>";
            } else {
                echo "<h4 class='col-md-4 pull-left'>Women's</h4>";
            }
            echo "<div class='col-md-8 pull-right'>Hot Thomic Rating: <b>" . number_format($average_rating, 2) . "</b></div>";
            echo "</div>";

            echo "<div class='row'>";
            echo "  <div class='col-md-6'>" . $description . "</div>";
            echo "  <div class='col-md-6'></div>";
            echo "</div>";
            echo "<br />";
            echo "<br />";
        ?>
        <form action="comment.php?apt_id=<?php echo $apt_id ?>" method="POST">
            <h4>Leave a Review:</h4>
            <table class="table hotthomic_rating">
                <tbody>
                    <tr>
                        <th><label>Your Hot Thomic Rating for <?php echo $apt_name ?>: </label></th>
                        <th><label>0</label> <input type="radio" name="new_user_rating" value="0"></input></th>
                        <th><label>1</label> <input type="radio" name="new_user_rating" value="1"></input></th>
                        <th><label>2</label> <input type="radio" name="new_user_rating" value="2"></input></th>
                        <th><label>3</label> <input type="radio" name="new_user_rating" value="3"></input></th>
                        <th><label>4</label> <input type="radio" name="new_user_rating" value="4"></input></th>
                        <th><label>5</label> <input type="radio" name="new_user_rating" value="5"></input></th>
                        <th><label>6</label> <input type="radio" name="new_user_rating" value="6"></input></th>
                        <th><label>7</label> <input type="radio" name="new_user_rating" value="7"></input></th>
                        <th><label>8</label> <input type="radio" name="new_user_rating" value="8"></input></th>
                        <th><label>9</label> <input type="radio" name="new_user_rating" value="9"></input></th>
                        <th><label>10</label> <input type="radio" name="new_user_rating" value="10"></input></th>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <label for="comment">Comment (1000 characters max):</label>
                <textarea class="form-control" rows="5" id="new_review" name="new_review"></textarea>
                <?php if(isset($_SESSION['user_name'])): ?>
                    <button type="submit" id="sign_up_submit" class="btn btn-primary btn-lg btn-block">Post</button>
                <?php else: ?>
                    <button type="submit" id="sign_up_submit" class="btn btn-primary btn-lg btn-block" disabled>Post</button>
                <?php endif; ?>
            </div>
        </form>
        <?php
            echo "<h3>Reviews</h3><br />";
            echo "<br />";
            echo "<div class='row'>";
            foreach ($reviews as $value) {
                echo "<div class='user_review col-md-6'>";
                echo "<label class='pull-left'>" . $value["user_name"] . "</label> <p>_at" . $value['time_stamp'] . "</p>";
                echo "<div class='pull-right'>" . $value["user_name"]. "'s Hot Thomic Rating: <b>" . $value["user_rating"] . "</b></div><br />";
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
