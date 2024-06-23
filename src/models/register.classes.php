<?php

class Register extends Dbh{
    protected function setUser($email,$password,$passwordRepeat,$firstname,$lastname,$passion,$genre,$city,$birthdate){
       echo "inside the set user";
       echo "\n";

        echo $firstname;
       echo "\n";
       echo $lastname; 
       echo "\n";

       echo $passion;
       echo "\n";

       echo $genre;
       echo "\n";

       echo $birthdate;
       echo "\n";

       echo $city;
       echo "\n";

       echo $email;
       echo "\n";

       echo $password;
        $hashedpassword =  password_hash($password,1);
        echo "Problem before prepare in the set user";
        $stmt=$this->connect()->prepare('INSERT INTO user (firstname, lastname, birthdate, city , email , password, passion, genre) VALUES (?, ?, ?, ?, ?, ?, ?, ?);');
        if(!$stmt->execute(array($firstname,$lastname,$birthdate,$city,$email,$hashedpassword,$passion,$genre))){
            $stmt=null;
            header('location:../../register.php?error=stmtfailed');
            exit();
        }
        echo "\nstep3";
    }


        protected function CheckUser($email){
            echo "beginning of check user";
            $stmt = $this->connect()->prepare("SELECT * FROM  user WHERE email = ?;");
            $stmt->execute(array($email));

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "execute check user";

            if(count($data ) > 0) {
                return true;
                // $stmt=null;
                // header('location:../register.php?error=alreadyregister');
                // exit();
            }

            return false;

        }
}