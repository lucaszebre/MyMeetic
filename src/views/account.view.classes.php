<?php

class AccountView extends AccountController{

    private $accountInfo;

    public function __construct($id,$email) {
        parent::__construct($id,$email); 
        $this->accountInfo = $this->getAccount($id);
    }

   

    public function fetchBirth() {
        echo $this->accountInfo[0]["birthdate"];
    }
    public function fetchEmail() {
        echo $this->accountInfo[0]["email"];
    }

    public function fetchAddress() {
        echo $this->accountInfo[0]["address"];
    }

    public function fetchGenre() {
        echo $this->accountInfo[0]["genre"];
    }
    public function fetchCity(){
        echo $this->accountInfo[0]["city"];
    } 
    
    public function fetchPassion(){
        echo $this->accountInfo[0]["passion"];
    }
    public function fetchLastName(){
        echo $this->accountInfo[0]["lastname"];
    } 
    
    public function fetchFirstName(){
        echo $this->accountInfo[0]["firstname"];
    }  
    public function fetchInitial(){
        echo substr($this->accountInfo[0]["firstname"],0,1);echo " "; echo substr($this->accountInfo[0]["lastname"],0,1);
    }
    


    public function fetchConvList(){
        $data = $this->getConvList();
        echo '<div class="flex flex-col w-2/5 border-r-2 overflow-y-auto">';

        if(!empty($data)){
            foreach ($data as $row) {
                if (count($data) > 0) {
                    echo '<a href=./messages.php?otherid='.$row["id"].'>';
                echo '<div class="flex cursor-pointer flex-row py-4 px-2 justify-center items-center border-b-2">';
            echo '<div class="w-1/4">';
            echo '<div class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">';
                echo '<span class="font-bold text-lg text-gray-600 dark:text-gray-300">' . substr($row["firstname"], 0, 1) . ' ' . substr($row["lastname"], 0, 1) . '</span>';
                echo '</div>';
            echo    "</div>";
            echo   '<div class="w-full">';
            echo   '<div class="text-lg font-semibold">' . $row["firstname"] . ' ' . $row["lastname"] .'</div>';
            echo   '</div>';
            echo "</div>";
            echo '<div class="w-[800px] overflow-hidden">';
            echo '<section id="carousel" class="flex relative whitespace-nowrap shrink-0 flex-row w-[800px] max-h-[400px] h-full w-full">'; 
            echo "</a>";
        }else{

                
            }
       
         
        }
        }else{
            echo '<p>No message yet</p>';
        }
        echo '</div>';
        echo '</div>';

            
    }


    public function fetchConv($otherID){
        $data = $this->getMessage($otherID);

        foreach ($data as $row) {
            echo '<div class="flex justify-' . ($row["sender_id"] == $_SESSION["id"] ? 'end' : 'start') . ' mb-4">
                    <img src="https://source.unsplash.com/vpOeXr5wmR4/600x600" class="object-cover h-8 w-8 rounded-full" alt="" />';
        
            echo '<div class="' . ($row["sender_id"] == $_SESSION["id"] ? 'mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white' : 'ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white') . '">
                    ' . $row["message_text"] . '
                </div>';
        
            echo '</div>';
        }
    }


}