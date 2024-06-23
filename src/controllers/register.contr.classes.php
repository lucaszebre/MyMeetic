<?php

class RegisterContr extends Register{

    private $firstname;
    private $lastname;
    private $birthdate;
    private $email;
    private $genre;
    private $passion;
    private $city;
    private $password;
    private $passwordRepeat;


    public function __construct($firstname,$lastname,$passion,$genre,$birthdate,$city,$email,$password,$passwordRepeat){
        $this->email = $email;
        $this->passion = $passion;
        $this->city = $city;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->genre = $genre;
        $this->birthdate = $birthdate;


        
// echo "\nfirstname: $firstname";
// echo "\nemail: $email";
// echo "\nlastname: $lastname"; 
// echo "\npassion: $passion"; 
// echo "\ncity: $city"; 
// echo "\npassword: $password"; 
// echo "\npasswordRepeat: $passwordRepeat"; 
// echo "\ngenre: $genre"; 
// echo "\nbirthdate: $birthdate";
      


    }

    public function RegisterUser(){
        // echo "just before the set User";

        // check for empty input you know just to be sure
        if($this->EmptyInput()){
            echo "inside empty input";
            header('location:../../templates/register.php?error=emptyInput');
            exit();
        }
        // password need to be the same -ç-
        if($this->SamePassword()){
            echo "inside same password";
            header('location:../../templates/register.php?error=passwordnotthesame');
            exit();
        }
        // check if user not already register in the db 
        if($this->CheckUser($this->email)){
            echo "inside checkuser";
            header('location:../../templates/register.php?error=useralreadyregister');
            exit();
        }
        // then we procede to the register
        echo "just before the set User";
        $this->setUser($this->email,$this->password,$this->passwordRepeat,$this->firstname,$this->lastname,$this->passion,$this->genre,$this->city,$this->birthdate);}

    private function EmptyInput(){
        $result=false;
       if(empty($this->email) || empty($this->password) || empty($this->genre)||empty($this->passion)||empty($this->passwordRepeat)||empty($this->lastname)||empty($this->firstname)||empty($this->birthdate)) {
            $result=true;
        }     
        return $result;
    }

    

    private function SamePassword(){
        $result=false;
        if($this->password!=$this->passwordRepeat){
            echo $this->password;
            echo $this->passwordRepeat;
            $result=true;
        }
        return $result;
    }



    
}