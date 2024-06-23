



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>mymeetic</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="./assets/modifypassword.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  
</head>
    <body class="flex bg-gray-50 dark:bg-gray-900 min-h-[1200px] flex-col w-full h-screen  justify-start items-center overflow-none-y">
    
    <?php 
  session_start();
  require_once('./templates/nav.php');
  


   
?>

<div class="flex flex-col items-center justify-center w-screen h-screen  px-6 py-8 mx-auto md:h-screen lg:py-0">
     
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Modify your password
              </h1>
              <form id="modifyPass" action="./src/includes/accountpassword.inc.php" method="post" class="space-y-4 md:space-y-6" >
                    
                  
                  <div>
                      <label for="newpassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old password</label>
                      <input type="password" name="oldpassword" id="oldpassword" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        <span class="error text-red-500"></span>
                    </div>
                     <div>
                      <label for="newpassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New password</label>
                      <input type="password" name="newpassword" id="newpassword" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        <span class="error text-red-500"></span>
                    </div>
                 
                  
                      

                  </div>
                  <button name="modifyPassword" disabled id="submitpassword" type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Change</button>
                  <?php
                  $error=$_GET["error"];
                  $message;
                  if($error=="inputneedfill"){
                    $message= "You need to fill your input";
                    
                  }else if($error=="newpasswordsame"){
                    $message= "Your new password is identic to the old";
                  }else if ($error=="oldpasswordwrong"){
                    $message= "The old password is wrong";
                  }else if($error=="stmtfailed"){
                    $message="Oupi a error occur";
                  }

                  $sucess=$_GET["sucess"];
                  $message;
                  if($sucess=="sucess"){
                    $message= "Sucess the password was change";
                    
                  }
                  // echo $message;
                  // echo $error;
                  if(!empty($message))
                  {

                  
                  ?>
                 

                  <div class=" <?php echo $error?  "bg-red-100 border border-red-400 text-red-700":  "bg-green-100 border border-green-400 text-green-700"; ?> px-4 py-3 rounded relative" role="alert">
                    <span class="block text-sm sm:inline">
                    <?php echo $message ?>
                    
                     </span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg class="fill-current h-6 w-6  <?php echo $error?  "text-red-500":  "text-green-500"; ?>" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>
                  <?php
                  }
                  ?>
              </form>
          </div>
      </div>
  </div>

      

    
    </body>
</html>