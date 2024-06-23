<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Account - mymeetic</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="./assets/account.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>

</head>
    <body class="relative">
        <?php 
        session_start();
        include_once('./templates/nav.php');
        include "./config/dbh.classes.php";
        include "./src/models/account.classes.php";
        include "./src/controllers/account.contr.classes.php";
        include "./src/views/account.view.classes.php";

        $account = new AccountView($_SESSION["id"],$_SESSION["email"]);
       
        // $account->checkUserId();

?>
    <div class="min-h-full">
  <main>
    <div class="flex mt-3 mb-3 flex-row w-full justify-center items-center">
      
    

  <div class=" flex flex-col justify-center items-center gap-3 mb-3">
 

<div class="flex flex-row max-w-[800px] w-full mt-[20px]  gap-40 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <div class="relative inline-flex items-center justify-center w-40 h-40 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
              <span class="font-bold text-lg text-gray-600 dark:text-gray-300"><?php $account->fetchInitial()  ?></span>
          </div>   
          <div>
            <a href="#">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white"> <?php  $account->fetchFirstName()?> <?php $account->fetchLastName($_SESSION["id"]) ?></h5>
            </a> 
            <a href="#">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Email: <?php $account->fetchEmail()  ?></h5>
            </a>
             <a href="#">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Birt date: <?php  $account->fetchBirth()  ?></h5>
            </a>
            <a href="#">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Adress: <?php  $account->fetchAddress()  ?></h5>
            </a>
        
            <a href="#">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Genre: <?php   $account->fetchGenre()  ?></h5>
            </a>
            <a href="#">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">City: <?php  $account->fetchCity()  ?></h5>
            </a>
            <a href="#">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Passion: <?php  $account->fetchPassion()  ?></h5>
            </a>

            <a href="modifyPassword.php" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Change Password
                
            </a>
            <a href="modifyEmail.php" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Change Email
                
            </a>
            
            <a id="deleteAccount"  class="cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Delete Account
                
            </a>

            
         

          <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-[50%] right-[50%] left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 w-full max-w-md max-h-full">
                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <form method="post" action="./src/includes/deleteaccount.inc.php">
                      <button id="close" type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                      </button>
                      <div class="p-4 md:p-5 text-center">
                          <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                          </svg>
                          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you you want to delete the account ?</h3>
                          <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                              Yes, I'm sure
                          </button>
                          <button id="cancel" data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                      </div>
                    </form>
                      
                  </div>
              </div>
          </div>
          
            </div>

           
</div>

  
  

</div>

           <?php  

    // var_dump($_SESSION['debug']);
    // echo $_SESSION['query'];

?>
     
  </main>
</div>
    </body>
</html>
