<?php

class Login extends Dbh{

    protected function getUser($email,$password){

        $stmt = $this->connect()->prepare("SELECT * FROM  user WHERE email = ?;");
        
        if(!$stmt->execute(array($email))){
            $stmt=null;
            header('location:../../index.php?error=smtfailed');
            exit();
        }



        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // check if there is a least user
            if(count($result) == 0) {
                $stmt=null;
                header("location:../../index.php?error=usernotfound");
                exit();
            }
        
        
       
      
        $checkPwd= password_verify($password,$result[0]['password']);
        
            // check if password correspond
        if($checkPwd){

            session_start();
            $_SESSION['login'] = true;
            $_SESSION['id'] = $result[0]["id"];
            $_SESSION['email'] = $result[0]["email"];
            $stmt=null;

            header('location:../../index.php');
            exit();
            
        }else{
            header('location:../../index.php?error=wrongpassword');
            exit();
           
  
    
        }
    }


    protected function CheckBanAccount($email){
        $queryCheck = "SELECT * FROM user_deleted WHERE email = ?";
        $stmtCheck = $this->connect()->prepare($queryCheck);
        $stmtCheck->execute([$email]);
        echo "here also";
        if ($stmtCheck->rowCount() > 0) {

            echo "vrai !";
           return true;
        }

        return false;

    }
}