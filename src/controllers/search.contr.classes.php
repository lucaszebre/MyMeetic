<?php 


class searchController extends Search{

    private $values;
    public function __construct($values){
        $this->values=$values;
    }

    public function searchPost(){
        
$conditionsA = [];
$conditionsP = [];
$conditionsG = [];
$conditionsC = [];
$conditions ="";
$arrayArg=[];

foreach ($this->values as $key => $val) {
  if (isset($val) && !empty($val)) {
    // var_dump(explode("-",$key)[0]);
     if(explode("-",$key)[0]=="age"){
      if(explode("-",$key)[1]=="1"){
        $conditionsA[]= "(18  <= (year(NOW())- year(birthdate)) AND  (year(NOW())- year(birthdate)) <= 25)";
   

      }else if($val=="2"){
        $conditionsA[]= "(25  <=  (year(NOW())- year(birthdate)) AND (year(NOW())- year(birthdate)) <= 35)";

      }else if($val=="3"){
        $conditionsA[]= "(35  <= (year(NOW())- year(birthdate)) AND (year(NOW())- year(birthdate)) <= 45)";
       
      }else if($val=="4"){
        $conditionsA[]= "(45  <=  (year(NOW())- year(birthdate)) )";

      }
    }else if(explode("-",$key)[0]=="genre"){
      $var=explode("-",$key)[1];
      $conditionsG[]= "genre=?";
      array_push($arrayArg,$val);
    }else if(explode("-",$key)[0]=="passion"){
      $var=explode("-",$key)[1];
      $conditionsP[]="passion=?";
      array_push($arrayArg,$val);
    }else if(explode("-",$key)[0]=="city"){
      $var=explode("-",$key)[1];
      $conditionsC[]="city=?";
      array_push($arrayArg,$val);

    }else if ($key == "value") {
      $conditions = "(lastname LIKE ? OR firstname LIKE ?)";
      array_push($arrayArg,"$val%");
      array_push($arrayArg,"$val%");
    }
  }
}

$implodeA = implode(" OR ",$conditionsA);

$implodeP = implode(" OR ",$conditionsP);

$implodeG = implode(" OR ",$conditionsG);

$implodeC = implode(" OR ",$conditionsC);

$end = implode(" AND ",array_filter(array($implodeA,$implodeP,$implodeG,$implodeC,$conditions)));
if (!empty($end)) {
  $query = "SELECT * FROM user WHERE " . $end . ";";
} else {
  $query = "SELECT * FROM user;";
}

$result= $this->connect()->prepare($query);

// $_SESSION['array']=$arrayArg;
// $_SESSION['query']=$query;


    if(!$result->execute($arrayArg)){
        header("location:..//index.php?error=stmtfailed");
        exit();
    }
 
    

    $data = $result->fetchAll(PDO::FETCH_ASSOC);

        // if(count($data ) <= 0) {
        //     header("location:../index.php?state=noresult");
        //     exit();
        // }

        return $data;

    }
}