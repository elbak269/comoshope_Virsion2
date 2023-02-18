           //VUE.JS
var app = new Vue({
el:"#vue_profile",
data:{
FullName:null,
country:null,
island:"",
gouvernorate:"",
city:"",
email:null,
mobile:null

}
});


$(document).ready(function(){
 // ISLAND SLECT BOX

$("#island_select").on("change",function(){
var island = $(this).val();
$.ajax({
  url:"select_box.php",
  method:"POST",
  data:{island_name:island},
  datatype:"text",
  success:function(html){
    $("#gouvernorate_select_save").html(html);


  }
});
});   //END ISLAND SELECT BOX

//   START CITY SLECT BOX
$("#gouvernorate_select_save").on("change",function(){
var gouver = $(this).val();
$.ajax({
  url:"select_box.php",
  method:"POST",
  data:{city_name:gouver},
  datatype:"text",
  success:function(html){
    $("#city_select_save").html(html);


  }
});
});  // END CITY SELECT BOX

$("#btn_edit_address").on("click", function(){
  $(".save_div_adress").show();
  $(".orgin_adress_div").hide();
})

          // BTN SAVE ADDRESS
$("#btn_save_address").on("click",function(){
  var  ids = $(this).data("id");
  var  users = $(this).data("name");
  var user = $("#user__id").val();
  var adress = $("#input_save_adress").val();



  $(".save_div_adress").fadeOut(5000);
  $(".orgin_adress_div").delay(5000).fadeIn(function(){
  location.reload();
});

  $.ajax({
    url:"edit.php",
    method:"POST",
    data:{adress:adress,update_adress:"update_adress"},
    datatype:"text",
    success:function(html){
      console.log(html);
      $("#status_edit_address").html(html).show();
    }

  })




}); // END BTN SAVE ADDRESS


// EDIT FULLNAME
$("#btn_edit_fullName").click(function (){
  $(".save_fullname_div").show();
  $(".orgin_full_div").hide();
});

// START SAVE FullName
$("#btn_save_fullname").click(function (){
var  ids = $(this).data("id");
var  users = $(this).data("name");
var fullname = $("#id_edit_fullName").val();

  $(".save_fullname_div").fadeOut(3000);
  $(".orgin_full_div").delay(3000).fadeIn(function(){
    location.reload();
  });


  $.ajax({
    url:"edit.php",
    method:"POST",
    data:{name:fullname,id:ids,user:users},
    datatype:"text",
    success:function(html){
      $("#status_edit_fullname").html(html).show();
    }

  }) // END AJAX EDIT fullname
}); // END SAVE fullname

// START EDIT EMAIL
$("#btn_edit_email").click(function (){
  $(".save_div_email").show();
  $(".edit_div_email").hide();
}); // END EDIT EMAIL

// START SAVE EMAIL
$("#btn_save_email").click(function (){
  var emails = $("#input_save_email").val();
  var em_id = $(this).data("id");
  var user_email = $(this).data("name");
  $(".save_div_email").fadeOut(3000);
  $(".edit_div_email").delay(3000).fadeIn(function(){
    location.reload();
  });

$.ajax({
  url:"edit.php",
  method:"POST",
  data:{
    email_input:emails,email_user:user_email,email_id:em_id
  },
  datatype:"text",
  success:function(html){
    $("#status_edit_email").html(html).show();
  }
})
}); // END SAVE EMAIL

// START EDIT MOBILE
$("#btn_edit_mobile").click(function (){
  $(".save_div_mobile").show();
  $(".edit_div_mobile").hide();
}); // END EDIT MOBILE

// START SAVE MOBILE
$("#btn_save_mobile").click(function (){
  var mobileid = $(this).data("id");
  var mobilename  =  $(this).data("name");
  var mobileinpu = $("#input_save_mobile").val();
  $(".save_div_mobile").fadeOut(3000);
  $(".edit_div_mobile").delay(3000).fadeIn(function(){
    location.reload();
  });
  $.ajax({
    url:"edit.php",
    method:"POST",
    data:{
      mobile_id:mobileid,mobile_user:mobilename,mobile_input:mobileinpu
    },
    datatype:"text",
    success:function(html){
      $("#status_edit_mobile").html(html).show();
    }
  })


}); // END SAVE MOBILE

if(window.location.hash == "#succed_delete"){
  window.location.hash = "#sucees_delete_div";
  console.log(window.location.hash);
  $(".sucees_delete_div").show();
  setTimeout(function(){
    $(".sucees_delete_div").hide();
  },3000)

}else if(window.location.hash == "#address_alreadu_used"){

  window.location.hash = "#used_adres_delete_div";
  console.log(window.location.hash);
  $(".used_adres_delete_div").show();
  setTimeout(function(){
    $(".used_adres_delete_div").hide();
  },3000)

}else if(window.location.hash == "#something_wrong"){

  window.location.hash = "#something_wrong_delete_div";
  console.log(window.location.hash);
  $(".something_wrong_delete_div").show();
  setTimeout(function(){
    $(".something_wrong_delete_div").hide();
  },3000)

}

/*

$(".supper_div_link").hover(function(){
  $(this).css("border","1px solid red");
    $(this).css("display","block");
    $(this).css("background","red");

})*/









});
