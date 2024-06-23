<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Grab the data -_-
    $values = [
        "age-1"     => $_POST["age-1"] ?"1":"",
        "age-2"     => $_POST["age-2"] ?"2":"",
        "age-3"     => $_POST["age-3"] ?"3":"",
        "age-4"     => $_POST["age-4"] ?"4":"",
        "passion-dance" => $_POST["passion-dance"] ? "dance":"",
        "passion-cooker" => $_POST["passion-cooker"] ? "cooker":"",
        "passion-licorn" => $_POST["passion-licorn"] ? "licorn":"",
        "passion-skateboard" => $_POST["passion-skateboard"] ? "skateboard":"",
        "passion-manga" => $_POST["passion-manga"] ? "manga":"",
        "genre-male"   => $_POST["genre-male"] ? "male":"",
        "genre-female"   => $_POST["genre-female"] ?"female":"",
        "genre-cyborg"   => $_POST["genre-cyborg"] ?"cyborg":"",
        "genre-other"   => $_POST["genre-other"] ?"other":"",
        "city-paris"    => $_POST["city-paris"] ? "Paris":"",
        "city-lyon"    => $_POST["city-lyon"] ? "Lyon":"",
        "city-marseille"    => $_POST["city-marseille"] ? "Marseille":"",
        "value"   => $_POST["search"] ?? $_GET["search"]
      ];

 
      $_SESSION["values"]=$values;


// Instantiate the Register class controler 
include '../../config/dbh.classes.php';
include '../models/search.classes.php';
include '../controllers/search.contr.classes.php';
$search= new searchController($values);
// Going back to the page 
echo "just after Register User";

header('location:../../index.php');
exit();
}