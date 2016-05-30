<?php
    session_start();

    require_once('./db_user1.php');
    $db = connectToDb();

    $apt_id = htmlspecialchars($_GET['apt_id']);

    if (isset($_SESSION["first_name"])) {
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        $new_user_rating = htmlspecialchars($_POST['new_user_rating']);
        $new_review = htmlspecialchars($_POST['new_review']);

        try {
            // echo $_SESSION['id'] . ", $apt_id,  $new_review, $new_user_rating, $timestamp";
            $sql = "INSERT INTO user_review (id, user_id, apt_id, review, user_rating) VALUES (null, :user_id, :apt_id, :review, :user_rating)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':user_id', $_SESSION['id'], PDO::PARAM_STR);
            $stmt->bindValue(':apt_id', $apt_id, PDO::PARAM_STR);
            $stmt->bindValue(':review', $new_review, PDO::PARAM_STR);
            $stmt->bindValue(':user_rating', $new_user_rating, PDO::PARAM_BOOL);
            $stmt->execute();

            header( 'Location: reviews.php?apt_id=' . $apt_id );

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            echo "<br />";
            echo "<br />";
            echo "<img src='https://media0.giphy.com/media/oqVsm9kaUm0ow/200_s.gif' alt='oops'>";
            echo "<br />";
            echo "Awk... user name already in use, Sorry this was messy...";
            echo "<script>alert('Awk... user name already in use, Sorry this was messy...');";
            echo "</script>";
            header( 'Location: hotthomics.php' );
        }
    } else {
        header( 'Location: reviews.php' );
    }


 ?>
