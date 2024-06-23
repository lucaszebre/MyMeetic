<?php

class Account extends Dbh{

    protected function getAccount($id){
       $stmt=$this->connect()->prepare(" SELECT * FROM user  WHERE id = ?;");
        if(!$stmt->execute(array($id))){
            $stmt=null;
            header('../../account.php?error=stmtfailed');
            exit();
        };

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!count($result)){
            header('../../account.php?error=accountnotfound');
            exit();
        }

        return $result;
    }


    protected function CheckBanAccount($id){
        $queryCheck = "SELECT * FROM user_deleted WHERE id_user = ?";
        $stmtCheck = $this->connect()->prepare($queryCheck);
        $stmtCheck->execute([$id]);

        if ($stmtCheck->rowCount() > 0) {
           return true;
        }

        return false;

    }
    protected function CheckEmailAlreadyTake($email){
        $queryCheck = "SELECT * FROM user WHERE email = ?";
        $stmtCheck = $this->connect()->prepare($queryCheck);
        $stmtCheck->execute([$email]);

        if ($stmtCheck->rowCount() > 0) {
           return true;
        }

        return false;

    }
   
}