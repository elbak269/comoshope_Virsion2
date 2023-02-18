$(document).ready(function(){



$(".div_img__").click(function(){
  $("#file_retu_prd").trigger("click");
})

$(function () {
    $("#file_retu_prd").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
          //  $(".i_img1").fadeIn(300);
        }else{
        //  $(".i_img1").fadeOut(300);
        }
    });
});

function imageIsLoaded(e) {
  $(".p_prd_img").hide();
    $("#img_ret").attr("src",e.target.result);
    $(".div_img__").css("background","none");


};

$("#btn_congirm_ask_return_or").click(function(){
  if($("#text_ar_reason_").val() == ""){
    $(".alert__").show(1000);
    $(".alert__").append("<strong>"+mylang("cause_return_cant_empty")+"</strong>");

    $('html, body').animate({
         scrollTop: $(".alert__").offset().top
     }, 1000);

     setTimeout(function(){
       $('html, body').animate({
            scrollTop: $("#text_ar_reason_").offset().top

        }, 1000);
        $("#text_ar_reason_").focus();

  });


}else if($("#file_retu_prd").get(0).files.length == 0){


  $(".alert__").show(1000);
  $(".alert__").append("<strong>"+mylang("img_cant_empty")+"</strong>");

  $('html, body').animate({
       scrollTop: $(".alert__").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $(".div_img__").offset().top

      }, 1000);


});
}else{

  var myform                    = new FormData();
  myform.append("img_prd", $("#file_retu_prd")[0].files[0]);
  myform.append("reason_re",$("#text_ar_reason_").val());
    myform.append("order",$("#inp_orde").val());
    myform.append("prodtc",$("#inp_prdo").val());
    myform.append("ask_return_order","ask_return_order");

  $.ajax({
    url:"setdata.php",
    type:"POST",
    data:myform,
    contentType:false,
    processData:false,
    success:function(suc){

      if (suc == "1") {

        $("#alrt_stat").removeClass("alert-danger");
        $("#alrt_stat").addClass("alert-success");
          $("#alrt_stat").text(mylang("successfulPreogress"));
          $("#alrt_stat").show();
        $('html, body').animate({
            scrollTop: $("#alrt_stat").offset().top
        }, 1000);

        setTimeout(function(){
          location.replace("profile.php");
        },3000)


      }else{
        $("#alrt_stat").removeClass("alert-success");
        $("#alrt_stat").addClass("alert-danger");
        $("#alrt_stat").show();
          $("#alrt_stat").text(mylang("failedProgress"));
        $('html, body').animate({
            scrollTop: $("#alrt_stat").offset().top
        }, 1000);
      }
    },
    error:function(er){
      console.log(er);
    }
  })

}

})

function mylang(word){
   var dat;
  $.ajax({
    dataType: "json",
    async:false,
    url:"admin/includes/languages/english.php",
    method:"GET",
    data:{lang:word},
    success:function(data){
      dat =  data;
    }
    })
    return dat;
}




})
