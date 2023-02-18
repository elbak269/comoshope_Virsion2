$(document).ready(function(){
var update_pagenam =  "vupdate_pagenam";


$("#btn_edit_page_name").click(function(){
  var page_name_input = $("#page_name_input").val();
  $.ajax({
  dataType: "json",
  url:"set_data_mypage.php",
  method:"post",
  data:{
    update_pagenam:update_pagenam,page_name_input:page_name_input
  },
  success:function(data){
    if(data == 1){
      $("#satus").fadeToggle(700);
      $("#satus").html("<div class='alert alert-success text-center' >"+ mylang("successfulPreogress")+"</div>");
      setTimeout(function(){
    $("#satus").fadeToggle(700);
  },4000);


    }else{
      $("#satus").fadeToggle(700);
      $("#satus").html("<div class='alert alert-danger text-center' >"+ mylang("failedProgress")+"</div>");
      setTimeout(function(){
    $("#satus").fadeToggle(700);
  },4000);

    }

  }
});
});





// UPDATE DESCRIPTION
$("#btn_edit_DESC").click(function(){
  var update_page_descr = "update_page_descr";
  var pagedsecttetare = $("#pagedsecttetare").val().trim();
  $.ajax({
  dataType: "json",
  url:"set_data_mypage.php",
  method:"post",
  data:{
    update_page_descr:update_page_descr,pagedsecttetare:pagedsecttetare
  },
  success:function(data){
    if(data == 1){
      $("#satus").fadeToggle(700);
      $("#satus").html("<div class='alert alert-success' >"+ mylang("successfulPreogress")+"</div>");
      setTimeout(function(){
    $("#satus").fadeToggle(700);
  },4000)
      $("#satus").html("<div class='alert alert-success text-center' >"+ mylang("successfulPreogress")+"</div>");

    }else{
      $("#satus").fadeToggle(700);
      $("#satus").html("<div class='alert alert-danger text-cente' >"+ mylang("failedProgress")+"</div>");
      setTimeout(function(){
    $("#satus").fadeToggle(700);
  },4000);
    }

  }
});

});


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


$("#choiceimg").click(function(){
  $(this).fadeToggle(500);

  $("#customFile").trigger("click");
});


$(function () {
    $("#customFile").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded3;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded3(e) {
    $('#img_user').attr('src', e.target.result);
       $(".img_have_notuploded").fadeToggle(500);
      $("#btn_uplade_img").fadeToggle(500);
};

$("#img_have_notuploded").click(function(){
  $(this).fadeToggle(500);
   $(".img_have_notuploded").fadeToggle(500);
   //$("#choiceimg").fadeToggle(500);
})


$("#gridCheck").change(function(){
var change_show_img_state = "change_show_img_state";
var checkbxvale ;
if($("#gridCheck").is(":checked")){
  checkbxvale = "true";
}else{
  checkbxvale = "false";
}


  $.ajax({
    url:"set_data_mypage.php",
    method:"post",
    data:{change_show_img_state:change_show_img_state,show_img_stat:checkbxvale},
    success:function(data){

    }
  })
})


$("#btn_copy").click(function(){
  var mycopy = document.getElementById("link_my_page");

  mycopy.select();
  mycopy.setSelectionRange(0, 99999); /*For mobile devices*/

  document.execCommand("copy");
})

});
