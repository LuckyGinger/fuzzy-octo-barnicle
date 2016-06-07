<?php

    session_start();
    require_once('./db_user1.php');
    $db = connectToDb();

    // $conf_pwd = mysql_real_escape_string($_POST["conf_pwd"]);

    if (htmlspecialchars($_GET["auth"]) == "sign_up") {
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        $user_name = mysql_real_escape_string($_POST["user_name"]);
        $pwd = mysql_real_escape_string($_POST["pwd"]);
        $first_name = mysql_real_escape_string($_POST["first_name"]);
        $last_name = mysql_real_escape_string($_POST["last_name"]);
        $gender = mysql_real_escape_string($_POST["gender"]);

        try {
            $sql = "INSERT INTO user (id, user_name, first_name, last_name, gender, pwd) VALUES (null, :user_name, :first_name, :last_name, :gender, :pwd)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
            $stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
            $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
            $stmt->bindValue(':gender', $gender, PDO::PARAM_BOOL);
            $stmt->bindValue(':pwd', $pwd, PDO::PARAM_STR);
            $stmt->execute();

            header( 'Location: auth_user.php?auth=login' );

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            echo "<br />";
            echo "<br />";
            echo "<img src='https://media0.giphy.com/media/oqVsm9kaUm0ow/200_s.gif' alt='oops'>";
            echo "<br />";
            echo "Awk... user name already in use, Sorry this was messy...";
            echo "<script>alert('Awk... user name, " . $user_name . ", already in use, Sorry this was messy...');";
            echo "location.replace('hotthomics.php')</script>";
            // header( 'Location: hotthomics.php' );
        }

    } else if (htmlspecialchars($_GET["auth"]) == "login") {
        $user_name = mysql_real_escape_string($_POST["user_name"]);
        $pwd = mysql_real_escape_string($_POST["pwd"]);

        try {
            $query = "SELECT id, user_name, first_name FROM user WHERE user_name=:user_name AND pwd=:pwd";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
            $stmt->bindValue(':pwd', $pwd, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user['first_name'] != null) {
                // echo $user['user_name'] . " " . $user['pwd'];
                session_start();
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['id'] = $user['id'];
                header( 'Location: hotthomics.php' );
            } else {
                echo "<script>alert('invalid user name or password')</script>";
                echo "<script>location.replace('hotthomics.php')</script>";
                // header( 'Location: hotthomics.php' );
            }


        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

    } else if (htmlspecialchars($_GET["auth"]) == "logout") {
        session_unset();
        session_destroy();
        header( 'Location: hotthomics.php' );
    } else {
        header( 'Location: hotthomics.php' );
    }

 ?>
