<?php
    try
    {
       $user = 'hotthom';
       $password = '7zhC5d5pmPPdVudm';
       $db = new PDO('mysql:host=127.4.167.2;port=3306;dbname=hotthom',$user, $password);
    }
    catch (PDOException $ex)
    {
       echo 'Error!: ' . $ex->getMessage();
       die();
    }
?>
