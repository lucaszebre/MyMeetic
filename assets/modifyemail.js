$(document).ready(function () {
  const newemail = $("#newemail").eq(0);
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    // manage the rror forr the modifYEmail.php
  $('#newemail').on('input', function () {
      let parent = newemail.parent();
      let error = parent.children('span');
      if (newemail.val() == "") {
          newemail.addClass('invalid-input').removeClass('valid-input');
          newemail.addClass("border-2 border-rose-600").removeClass("border-0");
          error.text("need to write an email");
      } else if (!regex.test(newemail.val())) {
          newemail.addClass('invalid-input').removeClass('valid-input');
          newemail.addClass("border-2 border-rose-600").removeClass("border-0");
          error.text("need to write an email in the correct format");
      } else {
          newemail.addClass('valid-input').removeClass('invalid-input');
          newemail.removeClass("border-2 border-rose-600").addClass("border-0");
          error.text("");
      }
  });

  $('input').on('input', function (e) {
      console.log(newemail.val());
      console.log($('#modifyPass').find('.valid-input').length);

      if ($('#modifyPass').find('.valid-input').length == 1) {
          $('#submitpassword').removeClass('allowed-submit');
          $('#submitpassword').removeAttr('disabled');
      } else {
          e.preventDefault();
          $('#submitpassword').attr('disabled', 'disabled');
      }
  });
});
