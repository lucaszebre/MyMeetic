<?php

class Dbh{

    protected function connect(){
      
        try {
            $servername = "localhost";
            $username = "lucas";
            $password = "root";
            $db = "meetic";
            $dbh = new PDO('mysql:host=localhost;dbname=meetic', $username, $password);
            return $dbh;
        } catch (PDOException $e) {
            print "Error " . $e->getMessage();
            die();      
          }
    }
}