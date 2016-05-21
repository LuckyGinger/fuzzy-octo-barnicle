<?php
    try
    {
       $user = 'hotthom';
       $password = '7zhC5d5pmPPdVudm';
       $db = new PDO('mysql:host=127.0.0.1;port=3306;dbname=hotthom',$user, $password);
    }
    catch (PDOException $ex)
    {
       echo 'Error!: ' . $ex->getMessage();
       die();
    }
?>
