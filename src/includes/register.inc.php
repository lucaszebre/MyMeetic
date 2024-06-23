<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Grab the data -_-
$firstname = $_POST["firstname"]; 
$lastname = $_POST["lastname"] ;
$birthdate = $_POST["date"] ;
$city = $_POST["city"] ;
$email = $_POST["email"] ;
$password = $_POST["password"]; 
$passwordRepeat = $_POST["conpassword"]; 
$passion = $_POST["passion"];
$genre = $_POST["genre"];

 



// Instantiate the Register class controler 
include '../../config/dbh.classes.php';
include '../models/register.classes.php';
include '../controllers/register.contr.classes.php';
$register = new RegisterContr($firstname,$lastname,$passion,$genre,$birthdate,$city,$email,$password,$passwordRepeat);
$register->RegisterUser();
// Going back to the page 
echo "just after Register User";

header('location:../../index.php');
exit();
}