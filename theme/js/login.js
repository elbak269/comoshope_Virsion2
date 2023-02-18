$(document).ready(function(){

on_mouse_leave_enter();




                                        // START CHEICK IF Username IS  EXISTS
  $("#usernameup").keyup(function(){


     if (($(this).val().length) < 3) {
      $("#availability").html("<p class='text-danger'>"+mylang("user_nam_cant_les_3")+"</p>");
    }

    else {
      var username = $(this).val();
      $.ajax({
        url:"check.php",
        method:"POST",
        data:{usersName:username},
        datatype:"text",
        success:function(html){
          $("#availability").html(html);
           $("#availability").animate({opacity:1}, 3000,function(){
             $(this).css("opacity","0");
           });
        }
      });

    }
  //  $("#availability").animate({opacity:0}, 1000);


  });


  function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  function validate() {
    const $result = $("#result");
    const email = $("#email").val();
    $result.text("");

    if (validateEmail(email)) {
      /*
      $result.text(email + " is valid :)");
      $result.css("color", "green"); */
      var username = $("#email").val();
      $.ajax({
        url:"check.php",
        method:"POST",
        data:{email:username},
        datatype:"text",
        success:function(html){
          $("#availabilityemail").html(html);

        }
      });
    } else {
      $("#availabilityemail").html("<p class='text-danger'>"+mylang("wrongEmail")+"</p>");

    }
    return false;
  }

                                      // END CHEICK IF Username IS  EXISTS
                                      // START CHEICK IF EMAIL IS  EXISTS

$("#email").keyup(function(){


   if (($(this).val().length) < 3) {
    $("#availabilityemail").html("<p class='text-danger'>"+mylang("email_cant_less3")+"</p>");
  }
  else {
      $("#availabilityemail").html("");
      $("#availabilityemail").animate({opacity:1}, 3000,function(){
        $(this).css("opacity","0");
      });
      validate();


  }

  //$("#availabilityemail").animate({opacity:0}, 1000);
});
                                      // ADD ITEM
  //NAME
$("#nameOfItem").keyup(function(){
$("#item_name").text($(this).val());

});

//Price
$("#priceofitem").keyup(function (){
  $("#price_span").text($(this).val());
})

// currency
$("#currencyitem").change(function (){
  $("#currency_item").text($("option:selected",$(this)).data("optional"));
})
$("#currency_item").text($("option:selected",$(this)).data("optional"));
// shippingMethod
$("#shippingitems").change(function(){
  $("#shippig_item").text($("option:selected",$("#currencyitem")).data("shippingitem"));
})
$("#shippig_item").text($("option:selected",$("#shippingitems")).data("shippingitem"));

// ITEM Picture1

// master pic

$("#BTN_CHOICE_IMG_1").click(function(){
  $("#chooseItemPic1").trigger("click");
})



$(function () {
    $("#chooseItemPic1").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
            $(".i_img1").fadeIn(300);
        }else{
          $(".i_img1").fadeOut(300);
        }
    });
});

function imageIsLoaded(e) {
    $(".fullpic").attr("src",e.target.result);
    $('.slider_item_pic_1').attr('src', e.target.result);
    $('#BTN_CHOICE_IMG_1').attr('src', e.target.result);

};
//thumnails pic
//pic2
$("#BTN_CHOICE_IMG_2").click(function(){
    $("#itemPic2").trigger("click");
})

$(function () {
    $("#itemPic2").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded2;
            reader.readAsDataURL(this.files[0]);
            $(".i_img2").fadeIn(300);

        }else{
          $(".i_img2").fadeOut(300);
        }
    });
});

function imageIsLoaded2(e) {
    $('.img_thumna2').attr('src', e.target.result);
    $('#BTN_CHOICE_IMG_2').attr('src', e.target.result);

};

//pic3

$("#BTN_CHOICE_IMG_3").click(function(){
    $("#itemPic3").trigger("click");
})

$(function () {
    $("#itemPic3").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded3;
            reader.readAsDataURL(this.files[0]);
              $(".i_img3").fadeIn(300);
        }else{
          $(".i_img3").fadeOut(300);
        }
    });
});

function imageIsLoaded3(e) {
    $('.img_thumna3').attr('src', e.target.result);
    $('#BTN_CHOICE_IMG_3').attr('src', e.target.result);

};

// click thumnials
$(".img_thuls img").click(function(){
  $(".selected").removeClass("selected");
  $(this).addClass("selected");
  $(".fullpic").attr("src",$(this).attr("src"));

})



// FOR ADD ITEMS
//NGAZIDJA
if($("#ship_ngazidja").is(":checked")){
 $("#ship_ngazidja_value").prop('disabled', false);
  $("#estamit_day_ngazidja_value").prop('disabled', false);
  $(".td_ngazidja").show();
}else{
    $("#ship_ngazidja_value").prop('disabled', true);
   $("#estamit_day_ngazidja_value").prop('disabled', true);
     $(".td_ngazidja").hide();
}
$("#ship_ngazidja").change(function(){
  if($(this).is(":checked")){
    $("#ship_ngazidja_value").prop('disabled', false);
    $("#estamit_day_ngazidja_value").prop("disabled",false);
    $(".td_ngazidja").show();
  }else{
      $("#ship_ngazidja_value").prop('disabled', true);
      $("#estamit_day_ngazidja_value").prop("disabled",true);
      $(".td_ngazidja").hide();
  }

  })
//END NGAZIDJA

//NZDUWANI
if($("#ship_ndzuwani").is(":checked")){
  $("#ship_ndzuwani_value").prop('disabled', false);
  $("#estamit_day_ndzuwani_value").prop('disabled', false);
  $(".td_ndzuwani").show();


}else{
    $("#ship_ndzuwani_value").prop('disabled', true);
    $("#estamit_day_ndzuwani_value").prop('disabled', true);
    $(".td_ndzuwani").hide();
}
$("#ship_ndzuwani").change(function(){

  if($(this).is(":checked")){
    $("#ship_ndzuwani_value").prop('disabled', false);
    $("#estamit_day_ndzuwani_value").prop('disabled', false);
    $(".td_ndzuwani").show();
  }else{
      $("#ship_ndzuwani_value").prop('disabled', true);
      $("#estamit_day_ndzuwani_value").prop('disabled', true);
      $(".td_ndzuwani").hide();
  }

  })
//END NZDUWANI


//MWALI
if($("#ship_wali").is(":checked")){
  $("#ship_mwali_value").prop('disabled', false);
  $("#estamit_day_mwali_value").prop('disabled', false);
  $(".td_mwali").show();


}else{
    $("#ship_mwali_value").prop('disabled', true);
    $("#estamit_day_mwali_value").prop('disabled', true);
      $(".td_mwali").hide();
}
$("#ship_wali").change(function(){

  if($(this).is(":checked")){
    $("#ship_mwali_value").prop('disabled', false);
    $("#estamit_day_mwali_value").prop('disabled', false);
      $(".td_mwali").show();
  }else{
      $("#ship_mwali_value").prop('disabled', true);
      $("#estamit_day_mwali_value").prop('disabled', true);
        $(".td_mwali").hide();
  }

  })
//END MWALI

//France
if($("#ship_france").is(":checked")){
  $("#ship_france_value").prop('disabled', false);
  $("#estamit_day_france_value").prop('disabled', false);
  $(".td_france").show();


}else{
    $("#ship_france_value").prop('disabled', true);
    $("#estamit_day_france_value").prop('disabled', true);
      $(".td_france").hide();
}
$("#ship_france").change(function(){

  if($(this).is(":checked")){
    $("#ship_france_value").prop('disabled', false);
    $("#estamit_day_france_value").prop('disabled', false);
      $(".td_france").show();
  }else{
      $("#ship_france_value").prop('disabled', true);
      $("#estamit_day_france_value").prop('disabled', true);
        $(".td_france").hide();
  }

});
//END France

// FIX CURRENCY LOG NEXT INPUT

  if(localStorage.getItem("curency_id") ==1){
    $(".curen_logo").text("EUR");
  }
   else if (localStorage.getItem("curency_id")==2){
    $(".curen_logo").text("KMF");
  }




$("#currencyitem").change(function(){

  if($("#currencyitem").val()==1){
    $(".curen_logo").text("EUR");
  }
   else if ($("#currencyitem").val()==2){
    $(".curen_logo").text("KMF");
  }

});





//trigger submit BUTTON

/*$("#btn_add_itm_botom").click(function(){
  $("#btn_subm").trigger("click");
})*/


// ADD Category

$("#select_box_cate").change(function(){
  if($(this).children("option:selected").val() == 2){
    $(".cont").css('opacity', '0.1')
    $(".pro").fadeIn(400);
  /*  //$("")promt_add_category
    $('html, body').animate({
         scrollTop: $(".p_ad_cat__").offset().bottom
     }, 1000);*/
  }


$("#btn_add_new_catego").click(function(){
  if($("#inpuy_add_catego").val()==""){
    $("#ALET_EMPTY_CAT_IMPT").fadeIn(300);
  }else {
      var categoryname = $("#inpuy_add_catego").val();
      var inset_catego ="inset_catego";
    $($.ajax({
      url:"setdata.php",
      method:"POST",
      data:{categoryname:categoryname,inset_catego:inset_catego},
      success:function(data){
    if(data == "0"){
      $("#ALET_EMPTY_CAT_IMPT > p").text(mylang("failedProgress"));
      $(".cont").css('opacity', '0.1')
      $("#ALET_EMPTY_CAT_IMPT").fadeIn(300);
    }else{
      $("#select_box_cate").html(data);
      $("#btn_cacel_category").trigger("click");

    }
      }
    }))
  }
})

})


$("#btn_cacel_category").click(function(){
  $(".cont").css('opacity', '1');
    $(".pro").fadeOut(400);
})


//end  ADD Category


// ADD BRAND

$("#_BRAND_SELECT").change(function(){

    if($(this).children("option:selected").val() == 2){
      $(".pro_BRAND").fadeIn(300);
        $(".cont").css('opacity', '0.1')
    }

})


$("#_BRAND_SELECT").click(function(){
  if($(this).children("option:selected").val() == 2){
    $(".pro_BRAND").fadeIn(300);
      $(".cont").css('opacity', '0.1')
  }



})

$("#btn_add_new_brand").click(function(){


var catid = $("#select_box_cate").val();
  if($("#inpuy_add_brand").val()==""){
    $("#ALET_EMPTY_BRAND_IMPT > p").text(mylang("brand_name_cant"))
    $("#ALET_EMPTY_BRAND_IMPT").fadeIn(300);
  }
else if($("#select_box_cate").val() == 1 || $("#select_box_cate").val() == 2 || $("#select_box_cate").val() == 3){
  $("#ALET_EMPTY_BRAND_IMPT > p").text(mylang("choice_categoty"))
  $("#ALET_EMPTY_BRAND_IMPT").fadeIn(300);
}
  else{

    var barndoryname = $("#inpuy_add_brand").val();
    var inset_brand ="inset_brand";
  $($.ajax({
    url:"setdata.php",
    method:"POST",
    data:{barndoryname:barndoryname,inset_brand:inset_brand,category_id:catid},
    success:function(data){
      console.log(data);
  if(data == "0"){
    $("#ALET_EMPTY_CAT_IMPT > p").text(mylang("failedProgress"));
    $(".cont").css('opacity', '0.1')
    $("#ALET_EMPTY_BRAND_IMPT").fadeIn(300);
  }else{

    $("#_BRAND_SELECT").html(data);
    $("#btn_cacel_BRAND").trigger("click");

  }
},
error:function(error){
  console.log(error);
}

  }))

  }

})

$("#btn_cacel_BRAND").click(function(){
  $(".cont").css('opacity', '1');
    $(".pro_BRAND").fadeOut(400);
});

// end add BRAND

/*

$("#btn_add_itm_botom").click(function(event){

  if($("#itemPic1").get(0).files.length === 0){
     event.preventDefault();
    $$(".status_div__ > p").text(lang("antpic1"));
  }
})*/






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


function on_mouse_leave_enter(){

    $("#img_info_tag").mouseenter(function(){
    $(".info_div").fadeIn();
    });

    $("#img_info_tag").mouseleave(function(){
    $(".info_div").fadeOut();
    });

    $("#img_id_info_ship_ngazidja").mouseenter(function(){
      $(".info_div_ship_price_ngazija").fadeIn();
    })

    $("#img_id_info_ship_ngazidja").mouseleave(function(){
      $(".info_div_ship_price_ngazija").fadeOut();
    });

    $("#img_id_info_expect_ngazidja").mouseenter(function(){
      $(".info_div_EAXPECT_DA_ngazija").fadeIn();
    })

    $("#img_id_info_expect_ngazidja").mouseleave(function(){
      $(".info_div_EAXPECT_DA_ngazija").fadeOut();
    });


    $("#img_id_info_ship_ndzuwani").mouseenter(function(){
      $(".info_div_ship_price_ndzuwani").fadeIn();
    })

    $("#img_id_info_ship_ndzuwani").mouseleave(function(){
      $(".info_div_ship_price_ndzuwani").fadeOut();
    });


    $("#img_id_info_expect_ndzuwani").mouseenter(function(){
      $(".info_div_EAXPECT_DA_ndzuwani").fadeIn();
    })

    $("#img_id_info_expect_ndzuwani").mouseleave(function(){
      $(".info_div_EAXPECT_DA_ndzuwani").fadeOut();
    });


    $("#img_id_info_ship_mwali").mouseenter(function(){
      $(".info_div_ship_price_mwali").fadeIn();
    })

    $("#img_id_info_ship_mwali").mouseleave(function(){
      $(".info_div_ship_price_mwali").fadeOut();
    });

    $("#img_id_info_expect_mwali").mouseenter(function(){
      $(".info_div_EAXPECT_DA_mwali").fadeIn();
    })

    $("#img_id_info_expect_mwali").mouseleave(function(){
      $(".info_div_EAXPECT_DA_mwali").fadeOut();
    });


    $("#img_id_info_ship_france").mouseenter(function(){
      $(".info_div_ship_price_france").fadeIn();
    })

    $("#img_id_info_ship_france").mouseleave(function(){
      $(".info_div_ship_price_france").fadeOut();
    });


    $("#img_id_info_expect_france").mouseenter(function(){
      $(".info_div_EAXPECT_DA_france").fadeIn();
    })

    $("#img_id_info_expect_france").mouseleave(function(){
      $(".info_div_EAXPECT_DA_france").fadeOut();
    });


    $("#img_id_info_paym_ngaz").mouseenter(function(){
      $(".info_div_payme_method_ngazija").fadeIn();
    })

    $("#img_id_info_paym_ngaz").mouseleave(function(){
      $(".info_div_payme_method_ngazija").fadeOut();
    });


    $("#img_inf_ship_meth_nga").mouseenter(function(){
      $(".info_div_ship_method_ngazija").fadeIn();
    })

    $("#img_inf_ship_meth_nga").mouseleave(function(){
      $(".info_div_ship_method_ngazija").fadeOut();
    });



    $("#img_id_info_paym_ndzu").mouseenter(function(){
      $(".info_div_payme_method_ndzuwani").fadeIn();
    })

    $("#img_id_info_paym_ndzu").mouseleave(function(){
      $(".info_div_payme_method_ndzuwani").fadeOut();
    });



    $("#img_inf_ship_meth_ndzu").mouseenter(function(){
      $(".info_div_ship_method_ndzuwani").fadeIn();
    })

    $("#img_inf_ship_meth_ndzu").mouseleave(function(){
      $(".info_div_ship_method_ndzuwani").fadeOut();
    });



    $("#img_id_info_paym_mwal").mouseenter(function(){
      $(".info_div_payme_method_mwali").fadeIn();
    })

    $("#img_id_info_paym_mwal").mouseleave(function(){
      $(".info_div_payme_method_mwali").fadeOut();
    });


    $("#img_inf_ship_meth_mwal").mouseenter(function(){
      $(".info_div_ship_method_mwali").fadeIn();
    })

    $("#img_inf_ship_meth_mwal").mouseleave(function(){
      $(".info_div_ship_method_mwali").fadeOut();
    });



    $("#img_id_info_paym_france").mouseenter(function(){
      $(".info_div_payme_method_france").fadeIn();
    })

    $("#img_id_info_paym_france").mouseleave(function(){
      $(".info_div_payme_method_france").fadeOut();
    });



    $("#img_inf_ship_meth_france").mouseenter(function(){
      $(".info_div_ship_method_france").fadeIn();
    })

    $("#img_inf_ship_meth_france").mouseleave(function(){
      $(".info_div_ship_method_france").fadeOut();
    });


}




$("#select_box_cate").change(function(){
  if($( "#select_box_cate " ).val() == 28){
    $(".div_feature_for_mobile").show();
  //  $(".col_div_storage").show();
  }else{
      $(".div_feature_for_mobile").hide();
    //  $(".col_div_storage").hide();
  }

  if ($("#select_box_cate " ).val() == 8 || $("#select_box_cate " ).val() == 37  || $("#select_box_cate " ).val() == 26 ) {
    $(".div_feature_for_computer").show();
  }else{
    $(".div_feature_for_computer").hide();
  }


})



$("#select_box_cate").change(function(){
  $.ajax({
    url:"get_data_info.php",
    method:"post",
    data:{get_brand_by_cat:"get_brand_by_cat",cat:$(this).val()},
    success:function(data){
      $("#_BRAND_SELECT").html(data);

    },
    error:function(er){
      console.log(er);
    }
  })
})



})
