<?php

define('DSN', 'mysql:host=localhost;dbname=ajaxForm;charset=utf8;');
define('USER', 'testuser');
define('PASSWORD', '9999');

function connectDb()
{

// try catchではないもの

  try
  {
        $dbh = new PDO(DSN, USER, PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;


  }
  catch (PDOException $e)
  {
      echo $e->getMessage();
      exit;
  }
}

?>