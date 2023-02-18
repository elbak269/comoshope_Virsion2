$(document).ready(function(){

// CHECK IF MOBILE SELLER EXISTS
$("#inputGroupSelect04").blur(function (){
  var mobil = $(this).val();
$.ajax({
url:"check.php",
method:"POST",
data:{
  store_mobile :mobil
},
datatype:"text",
success:function(html){
  $("#mobileavilable").html(html);
}

})
});
// END CHECK IF MOBILE SELLER EXISTS

/*$('input[type=radio]').change(function() {
  console.log($(this).val());
});*/
/*
$("#fa_prime").mouseenter(function (){
  $('#prime_info').show();

});

$("#fa_prime").mouseleave(function (){
  $('#prime_info').hide();
});
*/

 $("#card_visa").change(function (){
   if ($(this).prop('checked')) {
     $(".card_visa_div").show();
     // card_visa
$("#btn_next_setupcard").click(function (){
var cardnam = $("#cardname").val();
var cardnum = $("#cardnumber").val();
var m = $("#mm").val();
var y = $("#yy").val();
var cv = $("#cvc").val();
$(".footer").css("margin-top","5px");


$.ajax({
url:"comoshopseller.php",
method:"POST",
data:{
cardname:cardnam, cardnumber:cardnum, mm:m, yy:y, cvc:cv
},
datatype:"text"
});
location.reload();
})


   }
   else {
     $(".card_visa_div").hide();
   }

 });

   // PAYPAL
 $("#paypal").change(function (){
   if ($(this).prop('checked')) {
     $(".paypal_email_div").show();


$("#btn_next_setupcard").click(function(){
var payp = $("#paypal_email").val();
console.log(payp);
$.ajax({
url:"comoshopseller.php",
method:"POST",
data:{
paypal:payp
},
datatype:"text"

});
location.reload();
})

   }
   else {
     $(".paypal_email_div").hide();
   }

 });


                       //SELF

 $("#self").change(function (){

 $("#btn_next_setupcard").click(function(){
   var  sel = $("#self").val();
   console.log(sel)
   $.ajax({
     url:"comoshopseller.php",
     method:"POST",
     data:{
       self:sel
     },
     datatype:"text"

   });

   location.reload();
 })

 })

var busilocation =  $("#seletc_busnes_location").val();

 $("#nxt_seller_agrement").click(function(){


$.ajax({
  method:"POST",
  url:"comoshopseller.php",
  data:{

  }
})


 })

// FOR AGREE CONDITION CHECKBOX
$("#chck_bx_agree").change(function(){
  if ($("#chck_bx_agree").is(":checked")) {
    $("#lbl_chkbx___").css("color","black");
  }else{
    $("#lbl_chkbx___").css("color","red");
  }
})
if ($("#chck_bx_agree").is(":checked")) {
  $("#lbl_chkbx___").css("color","black");
}else{
  $("#lbl_chkbx___").css("color","red");
}



});
