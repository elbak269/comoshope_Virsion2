$(document).ready(function(){

//  "use strict";

// selectbox blugin
// Calls the selectBoxIt method on your HTML select box and uses the default theme
 $("select").selectBoxIt({
	 autoWidth: false
 });


$('[placeholder]').focus(function(){

	$(this).attr('data-text',$(this).attr('placeholder'));
	$(this).attr("placeholder","");

}).blur(function(){
	$(this).attr('placeholder',$(this).attr('data-text'));
});

// check username if is exists
$("#memberUsername").keyup(function(){
  $("#availability").html("");

})
function call(){
$("#memberUsername").keyup(function(){

  if (($(this).val())=="") {
call();
  }
  else if (($(this).val().length) < 3) {
    $("#availability").text("User Name Cant Be Less Than 3Words");

  }
                          // Cheick Username Is Exists
  else {
    var username = $(this).val();
    $.ajax({
      url:"check.php",
      method:"POST",
      data:{usersName:username},
      datatype:"text",
      success:function(html){
        $("#availability").html(html).fadeTagle('slow',function(){


        });


      }
    });

  }


});

}
$("#memberUsername").keyup(function(){
  call();
});

$("#memberpassword2").focus(function(){
  if ($("#memberPassword1").val()!==$("#memberpassword2").val()) {

  $("#pass2Status").text("");

  }


}).blur(function(){
  if ($("#memberPassword1").val()!==$("#memberpassword2").val()) {
  $("#pass2Status").text("password kazitsu faniahana");

  }

})




$("#memberBtn").on("click",function(){

var Username = $("#memberUsername").val();
var FullName = $("#memberFullname").val();
var email = $("#memberEmail").val();
var pass1 = $("#memberPassword1").val();
var pass2 = $("#memberpassword2").val();


if (pass1==pass2 &&  $("#availability").html()=='<p class="text-success">UserName Is Available</p>' ) {

  $.ajax({
    url:"addMember.php",
    method:"POST",
    data:{userName:Username,fullName:FullName,email:email,password:pass1,password2:pass2},
    datatype:"text"

  });
  window.location.href = "showMember.php";

}
else {

$('.member_status').html('<div class=" update-div-danger p-3 mb-2 bg-danger text-white text-center">SORRY CHECK IF YOUR USERNAME IS ALREADY EXISTS OR NOT</div>');

}

})
                                                  // Category
$(".category .catego h3").click(function(){
$(this).next(".catego .full-view").fadeToggle();
});

$(".order span").click(function(){
	$(this).addClass("active").siblings("span").removeClass("active");
	if ($(this).data("view")=="classic") {
		$(".catego .full-view").fadeOut();
	}
	else {
		$(".catego .full-view").fadeIn();
	}
});

});
