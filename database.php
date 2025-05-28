<?php


require_once('config.php');

function db_connect(){ 
    try {
        $dbh = new PDO ('mysql:host='. DB_HOST .';port='.
DB_PORT . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
       return $dbh;
    } catch (PDOException $e){
      echo 23;
        die("Database connection failed: " . $e->getMessage());
   //We should set a global variable here so we know the DB is down

            }
        }


?>