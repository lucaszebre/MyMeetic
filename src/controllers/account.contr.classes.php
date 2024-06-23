<?php

class AccountController extends Account{

    private $id;
    private $email;

    public function __construct($id,$email){
        $this->email=$email;
        $this->id=$id;
    }

    
    public function checkUserId(){
        $stmt = $this->connect()->prepare("SELECT * FROM  user WHERE id = ? AND email = ?;");
        $stmt->execute(array($this->id,$this->email));

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($data ) > 0) {
            // echo "here";
            return true;
            // $stmt=null;
            
        }

        header('location:../../account.php?error=alreadyregister');
        exit();
        // echo "check not done";

    }  
    
    public function deleteAccount() {

        

   

        // if ($this->CheckBanAccount($this->id)) {
        //     header('location:../../a.php?error=useralreadydeleted');
        //     exit();
        // }

        $queryDelete = "INSERT INTO user_deleted (id_user,email) VALUES (?,?)";
        $stmtDelete = $this->connect()->prepare($queryDelete);
        $stmtDelete->execute([$this->id,$this->email]);


       
    }

    private function emptyInput(){
        
        return (empty($this->email)||empty($this->id));

    } 


    

    public function changeEmail($email,$newemail){
        echo "beofre change";
        echo $email;
        echo "\n";
        echo $newemail;
        // check the input
        if( empty($newemail)||empty($email)){
            header('location:../../modifyEmail.php?error=inputneedfill');
            exit();
            // echo "here empty";
        }   

        echo "step1";

        // chek the email 
        if($email==$newemail){
            header('location:../../modifyEmail.php?error=emailsame');
            exit();
        }

        echo "step2";

        echo $email;

        echo "\n";

        echo $this->email;
        // check if new and old are the same
        if($email!=$this->email){
            header('location:../../modifyEmail.php?error=oldemailwrong');
            exit();
        }


        // check if email already take

        if($this->CheckEmailAlreadyTake($email)){
            header('location:../../modifyEmail.php?error=emailalreadytake');
            exit();
        }
        
        echo "step3";

        

        $stmt=$this->connect()->prepare("UPDATE user SET email = ? WHERE email = ?;");
        if(!$stmt->execute(array($newemail,$email))){
            $stmt=null;
            header('location:../../modifyEmail.php?error=stmtfailed');
            exit();
        };

        echo "step4";


        $this->setEmail($newemail);


       

    
    } 
    public function changePassword($email,$password,$oldpassword){

        if($this->emptyInput()==false && empty($password) && empty($oldpassword)){
            header('location:../../modifyPassword.php?error=inputneedfill');
            exit();
        }

        if($password==$oldpassword){
            header('location:../../modifyPassword.php?error=newpasswordsame');
            exit();
        }

        if(!password_verify($oldpassword,$this->getPassword())){
            header('location:../../modifyPassword.php?error=oldpasswordwrong');
            exit();
        }

        $hashedpassword= password_hash($password,1);

        $stmt=$this->connect()->prepare("UPDATE user SET password = ? WHERE email = ?");
        if(!$stmt->execute(array($hashedpassword,$email))){
            $stmt=null;
            header('location:../../modifyPassword.php?error=stmtfailed');
            exit();
        };
       

    
    }

   

    private function getPassword(){
        $stmt=$this->connect()->prepare("SELECT * FROM user WHERE email = ? ");
        if(!$stmt->execute(array($this->email))){
            $stmt=null;
            header('location:../../modifyPassword.php?error=stmtfailed');
            exit();
        };

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data[0]["password"];
    }

    private function setEmail($email){

        $_SESSION["email"]=$email;
        $this->email=$email;
        echo "set made";
    }


    public function sendMessages($receiveID,$message){
        $stmt=$this->connect()->prepare("INSERT INTO messages (sender_id, receiver_id, message_text) VALUES (?, ?, ?)");

        if(!$stmt->execute(array($this->id,$receiveID,$message))){
            $stmt=null;
            header('location:../../messages.php?error=stmtfailed');
            exit();
        };


    }

    public function getMessage($otherUserID){
        
        $conn = $this->connect();
    
        $stmt = $conn->prepare("SELECT * FROM messages WHERE  (sender_id = ? AND receiver_id = ? ) OR (receiver_id = ? AND sender_id = ?)");
    
        if (!$stmt->execute([$this->id, $otherUserID,$otherUserID,$this->id])) {
            $stmt = null;
            header('location:../../messages.php?error=stmtfailed');
            exit();
        }
    
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function getConvList(){
        $conn = $this->connect();
    
        $stmt = $conn->prepare("SELECT receiver_id, sender_id FROM messages WHERE sender_id = ? OR receiver_id = ?");
    
        if (!$stmt->execute([$this->id, $this->id])) {
            $stmt = null;
            header('location:../../messages.php?error=stmtfailed');
            exit();
        }
    
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $convList = [];
    
        foreach ($data as $row) {
            $smt = $conn->prepare("SELECT id, firstname, lastname FROM user WHERE id = ?");
    
            if (!$smt->execute([$row['receiver_id']])) {
                header('location:../../messages.php?error=stmtfailed');
                exit();
            }
    
            $userData = $smt->fetch(PDO::FETCH_ASSOC);
    
            $convList[] = $userData;
        }
    
        return $convList;
    }
    
    
    
    
}