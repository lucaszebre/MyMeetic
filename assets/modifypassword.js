//jquery kinda suck

$(document).ready(function(){

    
  // for the modifyPassword.php
  const newpassword= $("#newpassword").eq(0);
 
  $('#newpassword').on('input', function () {
  
    let parent = newpassword.parent()
    let error = parent.children('span');
     if(newpassword.val()==""){
        newpassword.addClass('invalid-input').removeClass('valid-input');
        newpassword.addClass("border-2 border-rose-600").removeClass("border-0");
        error.text("need to write a password");
    }else{
        newpassword.addClass('valid-input').removeClass('invalid-input');
        newpassword.removeClass("border-2 border-rose-600").addClass("border-0");
      error.text("");
    }

 


  })

// finally allow to submit the form or not 
$('input').on('input',function(e){
    console.log(newpassword.val());
    console.log($('#modifyPass').find('.valid-input').length)
   

    if($('#modifyPass').find('.valid-input').length==1){
        $('#submitpassword').removeClass('allowed-submit');
        $('#submitpassword').removeAttr('disabled');
    }
   else{
        e.preventDefault();
        $('#submitpassword').attr('disabled','disabled');
        
       }
 });


    
   
    
  });
  