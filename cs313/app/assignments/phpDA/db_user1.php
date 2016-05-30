<?php
    // try
    // {
       // $user = 'hotthom';
       // $password = '7zhC5d5pmPPdVudm';
       // $db = new PDO('mysql:host=127.4.167.2;port=3306;dbname=hotthom',$user, $password);
    // }
    // catch (PDOException $ex)
    // {
       // echo 'Error!: ' . $ex->getMessage();
       // die();
    // }
?>

<?php
  function connectToDb() {
    try
    {
       $user = 'hotthom';
       $password = 'hot2211';
       $db = new PDO('mysql:host=127.0.0.1;dbname=hotthomics',$user, $password);
    }
    catch (PDOException $ex)
    {
       echo 'Error!: ' . $ex->getMessage();
       die();
    }

    return $db;
  }
?>
