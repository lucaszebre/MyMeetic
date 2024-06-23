<?php 

if($_SERVER["REQUEST_METHOD"] == "POST" ){

session_start();
    // Grab the data -_-
$newpassword = $_POST["newpassword"]; 
$oldpassword = $_POST["oldpassword"]; 


echo $oldpassword;

echo "\n";

echo $newpassword;

// Instantiate the Login class controler 
include '../../config/dbh.classes.php';



// Going back to the page 

include "../models/account.classes.php";
include "../controllers/account.contr.classes.php";

$account = new AccountController($_SESSION["id"],$_SESSION["email"]);

$account->changePassword($_SESSION["email"],$newpassword,$oldpassword);

header('location:../../modifyPassword.php?sucess=sucess');
exit();
}


