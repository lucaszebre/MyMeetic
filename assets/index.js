
$(document).ready(function(){

// for the login.php
const email= $("#email").eq(0);

   $("#email").on('input',()=>{
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    parent = email.parent()
     error = parent.children('span');
     if(email.val()==""){
      email.toggleClass("border-2 border-rose-600");
      error.html("need to write a email");
    }else if (  !regex.test(email.val())){
      email.toggleClass("border-2 border-rose-600");
      error.html("need a valid email");
    }else{
      email.toggleClass("border-0");
      error.html("");
    }
   })

   const password= $("#password").eq(0);


   $("#password").on('input',()=>{
    parent = password.parent()
     error = parent.children('span');
     if(password.val()==""){
      password.toggleClass("border-2 border-rose-600");
      error.html("need to write a password");
    }else{
      password.toggleClass("border-0");
      error.html("");
    }
   })




   $('input').on('input',function(e){
    console.log($('#registration').find('.valid-input').length)
    
   
     if($('#registration').find('.valid-input').length==2){
         $('#submit').removeClass('allowed-submit');
         $('#submit').removeAttr('disabled');
     }
    else{
         e.preventDefault();
         $('#submit').attr('disabled','disabled');
         
        }
   });
   
 
  


   // carrousel  jquery let'ts go -_- 


  //  $('#previous').click(previousSlide);
  // $('#next').click(nextSlide);
  

  // let width = $('#carousel').children().length * 800;

  // console.log(width)

  // function previousSlide(){
  //   var currentSlide = $('#carousel').find('div:first');
  //   console.log(currentSlide);
  //   // var width = currentSlide.width();
  //   var previousSlide = $('#carousel').find('div:last')
  //   previousSlide.css({marginLeft: width})
  //   // currentSlide.clone().before(previousSlide);
  //   console.log(width);
    
  // }

  // function nextSlide(){
  //   var currentSlide = $('#carousel').find('div:first');
  //   console.log(currentSlide);
  //   // var width = currentSlide.width();
  //   currentSlide.animate({marginLeft: -width}, 1000, function(){
  //     var lastSlide = $('#carousel').find('div:last')
  //     // lastSlide.clone().after(currentSlide);
  //     currentSlide.css({marginLeft: 0})
  //     console.log(width);

  //   });
  // }
  



      $('#buttonCity').click(()=>{
        $('#dropCity').toggleClass("hidden")
      });
 $('#buttonPassion').click(()=>{
        $('#dropPassion').toggleClass("hidden")
      });
 $('#buttonGenre').click(()=>{
        $('#dropGenre').toggleClass("hidden")
      });
 $('#buttonAge').click(()=>{
        $('#dropAge').toggleClass("hidden")
      });

    



const carousel= $("#carousel");
const slidesCount = $('#carousel').children().length ;
const maxLeft = (slidesCount - 1) * 800 * -1;

let current = 0;

// function for the carrousel 
function changeSlide(next = true) {
  if (next) {
    current += current > maxLeft ? -800 : current * -1;
  } else {
    current = current < 0 ? current + 800 : maxLeft;
  }

 
  carousel.animate({"left":current},"slow").css("left",current);
}




// move the carrousel to the left 
$('#previous').click(()=>{
  changeSlide(false);
});


// move the carrousel to the right

  $('#next').click(()=>{
    changeSlide();
  });


})