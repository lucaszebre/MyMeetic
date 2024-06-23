<?php 

if($_SERVER["REQUEST_METHOD"] == "POST" ){

session_start();
    // Grab the data -_-
$newemail = $_POST["newemail"]; 
$oldemail = $_POST["oldemail"]; 


echo $oldemail;

echo "\n";

echo $newemail;

// Instantiate the Login class controler 
include '../../config/dbh.classes.php';



// Going back to the page 

include "../models/account.classes.php";
include "../controllers/account.contr.classes.php";

$account = new AccountController($_SESSION["id"],$_SESSION["email"]);

$account->changeEmail($oldemail,$newemail);



header('location:../../modifyEmail.php?sucess=sucess');
exit();
}
