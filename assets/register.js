
//jquery kinda suck


$(document).ready(function(){
// manage the input for the register.php file 
    // e.preventDefault();
$('#firstname').on('input',()=>{
      const firstname= $("#firstname").eq(0);
      let parent = firstname.parent()
      let error = parent.children('span');
    if(firstname.val()==""){
      firstname.toggleClass("border-2 border-rose-600");
      firstname.addClass('invalid-input').removeClass('valid-input');
      error.html("need a first name");
    }else{
      firstname.addClass('valid-input').removeClass('invalid-input');
      firstname.toggleClass("border-0");
      error.html("");
    }
})
    
$('#lastname').on('input',()=>{
  const lastname= $("#lastname").eq(0);
  parent = lastname.parent()
  error = parent.children('span');
  if(lastname.val()==""){
   lastname.toggleClass("border-2 border-rose-600");
   lastname.addClass('invalid-input').removeClass('valid-input');
   error.html("need a last name");
 }else{
   error.html("");
   lastname.toggleClass("border-0");
   lastname.addClass('valid-input').removeClass('invalid-input');

 }
})

$('#date').on('input',()=>{
  const date = $("#date").eq(0);
  const dateString = date.val(); 
   parent = date.parent();
   error = parent.children("span");
  const parts = dateString.split("/");
  const dtDOB = new Date(parts[2] + "/" + parts[1] + "/" + parts[0]); 
  const currdate = new Date();
  if (currdate.getFullYear() - dtDOB.getFullYear() < 18) {
      date.toggleClass("border-2 border-rose-600");
      error.html("You need to be 18 years or older");
      date.addClass('invalid-input').removeClass('valid-input');
  } else {
      error.html("");
      date.toggleClass("border-0");
      date.addClass('valid-input').removeClass('invalid-input');
  }
})
 

$('#genre').on('change',()=>{
  const genre= $("#genre").eq(0);
  parent = genre.parent()
   error = parent.children('span');
   if(!genre.val()){
    genre.toggleClass("border-2 border-rose-600")
    error.html("need to choose your genre");
    genre.addClass('invalid-input').removeClass('valid-input');
  }else{
    error.html("");
    genre.toggleClass("border-0");
    genre.removeClass('invalid-input').addClass('valid-input');
  }
})


  $('#email').on('input',()=>{
    const email= $("#email").eq(0);
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    parent = email.parent()
     error = parent.children('span');
     if(email.val()==""){
      email.toggleClass("border-2 border-rose-600");
      error.html("need to write a email");
      email.addClass('invalid-input').removeClass('valid-input');
  
    }else if (  !regex.test(email.val())){
      email.toggleClass("border-2 border-rose-600");
      error.html("need a valid email");
      email.addClass('invalid-input').removeClass('valid-input');
  
    }else{
      email.toggleClass("border-0");
      error.html("");
      email.removeClass('invalid-input').addClass('valid-input');
  
    }
  })
 
  const password= $("#password").eq(0);
  const conpassword= $("#conpassword").eq(0);

  $('#conpassword').on('input',()=>{
    parent = conpassword.parent()
    error = parent.children('span');
    if(conpassword.val()==""){
      conpassword.toggleClass("border-2 border-rose-600");
    error.html("need to write a password");
    conpassword.addClass('invalid-input').removeClass('valid-input');

  }else{
    conpassword.toggleClass("border-0");
    error.html("");
    conpassword.removeClass('invalid-input').addClass('valid-input');

  }

  if(password.val()!==conpassword.val()){
    password.toggleClass("border-2 border-rose-600");
    conpassword.toggleClass("border-2 border-rose-600");
    password.addClass('invalid-input').removeClass('valid-input');
    conpassword.addClass('invalid-input').removeClass('valid-input');

    error.html("Password are not the same");
  }else{
    conpassword.toggleClass("border-0");
    password.toggleClass("border-0");
    password.removeClass('invalid-input').addClass('valid-input');
    conpassword.removeClass('invalid-input').addClass('valid-input');

    error.html("");
  }
  })
 
$('#password').on('input',()=>{
  parent = password.parent()
  error = parent.children('span');
  if(password.val()==""){
   password.toggleClass("border-2 border-rose-600");
   error.html("need to write a password");
   password.addClass('invalid-input').removeClass('valid-input');

 }else{
   password.toggleClass("border-0");
   error.html("");
   password.removeClass('invalid-input').addClass('valid-input');

 }


 if(password.val()!==conpassword.val()){
  password.toggleClass("border-2 border-rose-600");
  conpassword.toggleClass("border-2 border-rose-600");
  password.addClass('invalid-input').removeClass('valid-input');
  conpassword.addClass('invalid-input').removeClass('valid-input');

  error.html("Password are not the same");
}else{
  conpassword.toggleClass("border-0");
  password.toggleClass("border-0");
  password.removeClass('invalid-input').addClass('valid-input');
  conpassword.removeClass('invalid-input').addClass('valid-input');

  error.html("");
}

})

  

 


$('#city').on('input',()=>{
  const city= $("#city").eq(0);
  parent = city.parent()
   error = parent.children('span');
   if(city.val()==""){
    city.toggleClass("border-2 border-rose-600");
    error.html("need to write a city");
    city.addClass('invalid-input').removeClass('valid-input');

  }else{
    city.toggleClass("border-0");
    error.html("");
    city.removeClass('invalid-input').addClass('valid-input');

  }
})

  
$('#passion').change(()=>{
  const passion= $("#passion").eq(0);
  parent = passion.parent()
   error = parent.children('span');
   if(!passion.val()){
    passion.toggleClass("border-2 border-rose-600");
    error.html("need to choose a passion");
    passion.addClass('invalid-input').removeClass('valid-input');

  }else{
    passion.toggleClass("border-0");
    error.html("");
    passion.removeClass('invalid-input').addClass('valid-input');

  }
})
  
  
  $('#term').change(()=>{
    const terms = $("#terms");
    const errorterms = $("#errorterms");
    
    if (!terms.prop("checked")) {
        terms.toggleClass("border-2 border-rose-600");
        errorterms.html("You need to accept the terms");
        terms.addClass('invalid-input').removeClass('valid-input');
    
    } else {
        terms.toggleClass("border-0");
        errorterms.html("");
        terms.removeClass('invalid-input').addClass('valid-input');
    
    }
  })




$('input').on('input',function(e){
 console.log($('#registration').find('.valid-input').length)
 

  if($('#registration').find('.valid-input').length==9){
      $('#submit').removeClass('allowed-submit');
      $('#submit').removeAttr('disabled');
  }
 else{
      e.preventDefault();
      $('#submit').attr('disabled','disabled');
      
     }
});
  
 
  

  
 
  
});


