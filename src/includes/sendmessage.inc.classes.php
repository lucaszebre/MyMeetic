<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "GET"){


    // Grab the data -_-
 
    $receiverId=$_GET["receiverId"];
 
      $_SESSION["values"]=$values;


// Instantiate the Register class controler 
include '../../config/dbh.classes.php';
include '../models/account.classes.php';
include '../controllers/account.contr.classes.php';
$account= new AccountController($_SESSION["id"],$_SESSION["email"]);
// Going back to the page 
$account->sendMessages($receiverId,"salut");


header('location:../../messages.php');
exit();
}