<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>change email - mymeetic</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="./assets/modifyemail.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  
</head>
    <body class="flex bg-gray-50 dark:bg-gray-900 min-h-[1200px] flex-col w-full h-screen  justify-start items-center overflow-none-y">
    
    <?php 
  session_start();
  require_once('./templates/nav.php');
 

   
?>
<div class="container h-screen relative mx-auto shadow-lg rounded-lg">
    
    <div class="flex flex-row h-full justify-between bg-white">

      <?php 
        session_start();
        include "./config/dbh.classes.php";
        include "./src/models/account.classes.php";
        include "./src/controllers/account.contr.classes.php";
        include "./src/views/account.view.classes.php";

        $account = new AccountView($_SESSION["id"],$_SESSION["email"]);
       
        $account->fetchConvList();

        ?>
      
        <div class="w-full px-5 flex flex-col justify-between">
          <div class="flex flex-col mt-5">
            <?php
            if(isset($_GET["otherid"])){
              $account->fetchConv($_GET["otherid"]);
              $_SESSION["otherid"]=$_GET["otherid"];
            }
            ?>
          <div class="py-5 absolute bottom-0 w-3/5">
            <form action="./src/includes/sendmessage2.inc.classes.php" method="post">
            <input
              class="w-full  bg-gray-300 py-5 px-3 rounded-xl"
              type="text"
              name="message"
              placeholder="type your message here..."
            />
            </form>
           
          </div>
        </div>
      
    </div>
</div>

</div>

      

    
    </body>
</html>
