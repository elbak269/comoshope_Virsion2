$(document).ready(function(){



  var current                   = "";

  var status                    = "";
  var category                  = "";
  var barnd                     ="";
  var operating_system_             = "";
  var camera_resolution         = "";
  var cpu                       = "";
  var gpu                       = "";
  var ram                       ="";
  var storage                   = "";
  var ssd                       ="";
  var network                   =[];
  var sim                       = "";
    //NGAZIDJA
  var ship_ngazidja             = "";
  var payments_ngazidja         = [];
  var ship_metho_ngazidja       = "";
  var ship__price_ngazidja      ="";
  var estamit_day_ngazidja_value="";

  // NDZUWANI

var ship_ndzuwani              = "";
var payme_id_ndzuwani          = [];
var ship_metho_ndzuwa_selc      = "";
var ship_ndzuwani_price         = "";
var estamit_day_ndzuwani_value  ="";

   //MWALI
var ship_wali               ="";
var paym_id_mwali           =[];
var ship_metho_mwali        ="";
var ship_mwali_price        ="";
var estamit_day_mwali_value ="";

//FRANCE
var ship_france                    ="";
var paym_id_france                 =[];
var ship_metho_france              ="";
var ship_france_price              ="";
var estamit_day_france_value       ="";

set_varable_on_change();
  $("#btn_add_itm_botom").click(function(){
    var productname               = $("#nameOfItem_id").val();
    var prod_description          = $("#itemDescription_id").val();
    var price                     = $("#priceofitem_id").val();
    var seller__                  = $("#seller__").val();
    var user__                    = $("#user__").val();
      payments_ngazidja    = [];
      payme_id_ndzuwani    = [];
      paym_id_mwali        = [];
      paym_id_france       = [];

      network             = [];


      set_varable_on_change();
  var myform                    = new FormData();



if(productname == ""){
  $(".div_eror_").text(mylang("cantNameItemEmpty"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#nameOfItem_id").offset().top
      }, 1000);
      $("#nameOfItem_id").focus();

   },2000)


}else if(price == "" || price < 1){

  $(".div_eror_").text(mylang("cantPriceItemEmpty"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#priceofitem_id").offset().top
      }, 1000);
  $("#priceofitem_id").focus();

},2000);


}
else if(current == "" ){

  $(".div_eror_").text(mylang("choice_curency"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#currencyitem_id").offset().top
      }, 1000);
  $("#currencyitem_id").focus();

},2000);


}
else if(status == "" ){

  $(".div_eror_").text(mylang("status_cant_empty"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#status_id").offset().top
      }, 1000);
  $("#status_id").focus();

},2000);


}

else if($("#select_box_cate").val() == "" || $("#select_box_cate").val() == 1 || $("#select_box_cate").val() == 2 || $("#select_box_cate").val() == 3 ){

  $(".div_eror_").text(mylang("choice_category"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#select_box_cate").offset().top
      }, 1000);
$("#select_box_cate").focus();

},2000);


}

else if($("#_BRAND_SELECT").val() == "" || $("#_BRAND_SELECT").val() == 1 || $("#_BRAND_SELECT").val() == 2 || $("#_BRAND_SELECT").val() == 3 ){
  $(".div_eror_").text(mylang("choice_the_brand"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#_BRAND_SELECT").offset().top
      }, 1000);
$("#_BRAND_SELECT").focus();

},2000);


}
// for computer
else if(($("#select_box_cate").val() == 8 || $("#select_box_cate").val() == 37 || $("#select_box_cate").val() == 26) && cpu == "" ){
  $(".div_eror_").text(mylang("cpu_cant_empty"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);
   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#__cpu_for_computer").offset().top
      }, 1000);
$("#__cpu_for_computer").focus();

},2000);


}

else if(($("#select_box_cate").val() == 8 || $("#select_box_cate").val() == 37 || $("#select_box_cate").val() == 26) && operating_system_ == "" ){
  $(".div_eror_").text(mylang("choice_os"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);
setTimeout(function(){
  $('html, body').animate({
       scrollTop: $("#__oprating_system_FOR_COMPUTER").offset().top
   }, 1000);
$("#__oprating_system_FOR_COMPUTER").focus();

},2000);

}

else if(($("#select_box_cate").val() == 8 || $("#select_box_cate").val() == 37 || $("#select_box_cate").val() == 26) && gpu == "" ){
  $(".div_eror_").text(mylang("choice_gpu"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#__gpu_forcomputer").offset().top
      }, 1000);
   $("#__gpu_forcomputer").focus();

   },2000);


}

else if(($("#select_box_cate").val() == 8 || $("#select_box_cate").val() == 37 || $("#select_box_cate").val() == 26) && ram == "" ){
  $(".div_eror_").text(mylang("choice_ram"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#_ram__computer").offset().top
      }, 1000);
   $("#_ram__computer").focus();

   },2000);


}

else if(($("#select_box_cate").val() == 8 || $("#select_box_cate").val() == 37 || $("#select_box_cate").val() == 26) && storage == "" ){
  $(".div_eror_").text(mylang("choice_storage"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);
   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#__storage_FOR_COMPUTER").offset().top
      }, 1000);
   $("#__storage_FOR_COMPUTER").focus();

   },2000);


}

else if(($("#select_box_cate").val() == 8 || $("#select_box_cate").val() == 37 || $("#select_box_cate").val() == 26) && ssd == "" ){
  $(".div_eror_").text(mylang("choice_ssd"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);
   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#__ssd").offset().top
      }, 1000);
   $("#__ssd").focus();

   },2000);


}

else if(($("#select_box_cate").val() == 8 || $("#select_box_cate").val() == 37 || $("#select_box_cate").val() == 26) && network.length <1){
  $(".div_eror_").text(mylang("choice_network"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $(".network_for_COMPUTER").offset().top
      }, 1000);
   $(".network_for_COMPUTER").focus();

   },2000);


}




// for phone
else if($("#select_box_cate").val() == 28 && operating_system_ == ""){
  $(".div_eror_").text(mylang("choice_os"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#__oprating_system").offset().top
      }, 1000);
   $("#__oprating_system").focus();

   },2000);


}

else if($("#select_box_cate").val() == 28 && ram == ""){
  $(".div_eror_").text(mylang("choice_ram"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#_ram_").offset().top
      }, 1000);
   $("#_ram_").focus();

   },2000);

}

else if($("#select_box_cate").val() == 28 && storage == ""){
  $(".div_eror_").text(mylang("choice_storage"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#__storage").offset().top
      }, 1000);
   $("#__storage").focus();

   },2000);


}

else if($("#select_box_cate").val() == 28 && sim == ""){
  $(".div_eror_").text(mylang("choice_sim"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#__SIM").offset().top
      }, 1000);
   $("#__SIM").focus();

   },2000);


}

else if($("#select_box_cate").val() == 28 && network.length < 1){
  $(".div_eror_").text(mylang("choice_network"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $(".network_for_mobile").offset().top
      }, 1000);
   $(".network_for_mobile").focus();

   },2000);

}

else if(ship_ngazidja == 1 && payments_ngazidja.length < 1 ){
  $(".div_eror_").text(mylang("choice_payt_mth_nga"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $(".payments_ngazidja").offset().top
      }, 1000);
   $(".payments_ngazidja").focus();

   },2000);


}


else if(ship_ngazidja == 1 && ship_metho_ngazidja == ""){
  $(".div_eror_").text(mylang("choice_ship_mth_nga"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#ship_metho_ngazidja").offset().top
      }, 1000);
   $("#ship_metho_ngazidja").focus();

   },2000);


}


else if(ship_ngazidja == 1 && ship__price_ngazidja == ""){
  $(".div_eror_").text(mylang("cant_ex_ship_price_ngaz_empty"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#ship__price_ngazidja").offset().top
      }, 1000);
   $("#ship__price_ngazidja").focus();

   },2000);


}


else if(ship_ngazidja == 1 && estamit_day_ngazidja_value == ""){
  $(".div_eror_").text(mylang("cant_ex_dat_ngaz_empty"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#estamit_day_ngazidja_value").offset().top
      }, 1000);
   $("#estamit_day_ngazidja_value").focus();

   },2000);


}

                            //NDZUWANI
else if(ship_ndzuwani == 1 && payme_id_ndzuwani.length < 1 ){
  $(".div_eror_").text(mylang("choice_payt_mth_ndzu"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $(".payme_id_ndzuwani").offset().top
      }, 1000);
   $(".payme_id_ndzuwani").focus();

   },2000);


}
else if(ship_ndzuwani == 1 && ship_metho_ndzuwa_selc == ""){
  $(".div_eror_").text(mylang("choice_ship_mth_ndzu"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#ship_metho_ndzuwa_selc").offset().top
      }, 1000);
   $("#ship_metho_ndzuwa_selc").focus();

   },2000);


}

else if(ship_ndzuwani == 1 && ship_ndzuwani_price == ""){
  $(".div_eror_").text(mylang("cant_ex_ship_price_ndzu_empty"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#ship_ndzuwani_price").offset().top
      }, 1000);
   $("#ship_ndzuwani_price").focus();

   },2000);


}

else if(ship_ndzuwani == 1 && estamit_day_ndzuwani_value == ""){
  $(".div_eror_").text(mylang("cant_ex_dat_ndzu_empty"));
  $(".div_eror_").fadeIn(1000);
  $('html, body').animate({
       scrollTop: $(".div_eror_").offset().top
   }, 1000);

   setTimeout(function(){
     $('html, body').animate({
          scrollTop: $("#estamit_day_ndzuwani_value").offset().top
      }, 1000);
   $("#estamit_day_ndzuwani_value").focus();

   },2000);


}

         // MWALI
 else if(ship_wali == 1 && paym_id_mwali.length < 1 ){
   $(".div_eror_").text(mylang("choice_payt_mth_mwali"));
   $(".div_eror_").fadeIn(1000);
   $('html, body').animate({
        scrollTop: $(".div_eror_").offset().top
    }, 1000);

    setTimeout(function(){
      $('html, body').animate({
           scrollTop: $(".paym_id_mwali").offset().top
       }, 1000);
    $(".paym_id_mwali").focus();

    },2000);


 }

 else if(ship_wali == 1 && ship_metho_mwali == ""){
   $(".div_eror_").text(mylang("choice_ship_mth_mwal"));
   $(".div_eror_").fadeIn(1000);
   $('html, body').animate({
        scrollTop: $(".div_eror_").offset().top
    }, 1000);

    setTimeout(function(){
      $('html, body').animate({
           scrollTop: $("#ship_metho_mwali").offset().top
       }, 1000);
    $("#ship_metho_mwali").focus();

    },2000);


 }
 else if(ship_wali == 1 && ship_mwali_price == ""){
   $(".div_eror_").text(mylang("cant_ex_ship_price_mwal_empty"));
   $(".div_eror_").fadeIn(1000);
   $('html, body').animate({
        scrollTop: $(".div_eror_").offset().top
    }, 1000);

    setTimeout(function(){
      $('html, body').animate({
           scrollTop: $("#ship_mwali_price").offset().top
       }, 1000);
    $("#ship_mwali_price").focus();

    },2000);

 }

 else if(ship_wali == 1 && estamit_day_mwali_value == ""){
   $(".div_eror_").text(mylang("cant_ex_dat_mwal_empty"));
   $(".div_eror_").fadeIn(1000);
   $('html, body').animate({
        scrollTop: $(".div_eror_").offset().top
    }, 1000);

    setTimeout(function(){
      $('html, body').animate({
           scrollTop: $("#estamit_day_mwali_value").offset().top
       }, 1000);
    $("#estamit_day_mwali_value").focus();

    },2000);

 }

 // FRANCE

 else if(ship_france == 1 && paym_id_france.length < 1 ){
   $(".div_eror_").text(mylang("choice_payt_mth_france"));
   $(".div_eror_").fadeIn(1000);
   $('html, body').animate({
        scrollTop: $(".div_eror_").offset().top
    }, 1000);

    setTimeout(function(){
      $('html, body').animate({
           scrollTop: $(".paym_id_france").offset().top
       }, 1000);
    $(".paym_id_france").focus();

    },2000);


 }

 else if(ship_france == 1 && ship_metho_france == ""){
   $(".div_eror_").text(mylang("choice_ship_mth_fran"));
   $(".div_eror_").fadeIn(1000);
   $('html, body').animate({
        scrollTop: $(".div_eror_").offset().top
    }, 1000);

    setTimeout(function(){
      $('html, body').animate({
           scrollTop: $("#ship_metho_france").offset().top
       }, 1000);
    $("#ship_metho_france").focus();

    },2000);


 }


 else if(ship_france == 1 && ship_france_price == ""){
   $(".div_eror_").text(mylang("cant_ex_ship_price_fran_empty"));
   $(".div_eror_").fadeIn(1000);
   $('html, body').animate({
        scrollTop: $(".div_eror_").offset().top
    }, 1000);

    setTimeout(function(){
      $('html, body').animate({
           scrollTop: $("#ship_france_price").offset().top
       }, 1000);
    $("#ship_france_price").focus();

    },2000);
 }



 else if(ship_france == 1 && estamit_day_france_value == ""){
   $(".div_eror_").text(mylang("cant_ex_dat_fran_empty"));
   $(".div_eror_").fadeIn(1000);
   $('html, body').animate({
        scrollTop: $(".div_eror_").offset().top
    }, 1000);

    setTimeout(function(){
      $('html, body').animate({
           scrollTop: $("#estamit_day_france_value").offset().top
       }, 1000);
    $("#estamit_day_france_value").focus();

    },2000);

 }

 else if($("#chooseItemPic1").get(0).files.length === 0){
   $(".div_eror_").text(mylang("antpic1"));
   $(".div_eror_").fadeIn(1000);
   $('html, body').animate({
        scrollTop: $(".div_eror_").offset().top
    }, 1000);

    setTimeout(function(){
      $('html, body').animate({
           scrollTop: $("#BTN_CHOICE_IMG_1").offset().top
       }, 1000);
    $("#BTN_CHOICE_IMG_1").focus();

    },2000);

 }

 else if($("#itemPic2").get(0).files.length === 0){
   $(".div_eror_").text(mylang("antpic2"));
   $(".div_eror_").fadeIn(1000);
   $('html, body').animate({
        scrollTop: $(".div_eror_").offset().top
    }, 1000);

    setTimeout(function(){
      $('html, body').animate({
           scrollTop: $("#BTN_CHOICE_IMG_2").offset().top
       }, 1000);
    $("#BTN_CHOICE_IMG_2").focus();

    },2000);

 }

 else if($("#itemPic3").get(0).files.length === 0){
   $(".div_eror_").text(mylang("antpic3"));
   $(".div_eror_").fadeIn(1000);
   $('html, body').animate({
        scrollTop: $(".div_eror_").offset().top
    }, 1000);

    setTimeout(function(){
      $('html, body').animate({
           scrollTop: $("#BTN_CHOICE_IMG_3").offset().top
       }, 1000);
    $("#BTN_CHOICE_IMG_3").focus();

    },2000);

 }







else{
  $(".div_eror_").hide();
  myform.append("isert_items","isert_items");
  myform.append("itemName",productname);
  myform.append("itemDescription",prod_description);
  myform.append("price",price);
  myform.append("current",current);
  myform.append("status",status);
  myform.append("categoryid",$("#select_box_cate").val());
  myform.append("brand",$("#_BRAND_SELECT").val());
  myform.append("operating_System",operating_system_);
  myform.append("camera_resolution",camera_resolution);
  myform.append("cpu",cpu);
  myform.append("gpu",gpu);
  myform.append("ram",ram);
  myform.append("storage",storage);
  myform.append("ssd",ssd);
  myform.append("network",JSON.stringify(network));
  myform.append("sim",sim);

  myform.append("ship_ngazidja",ship_ngazidja);
  myform.append("payments_ngazidja",JSON.stringify(payments_ngazidja));
  myform.append("ship_metho_ngazidja",ship_metho_ngazidja);
  myform.append("ship__price_ngazidja",ship__price_ngazidja);
  myform.append("estamit_day_ngazidja_value",estamit_day_ngazidja_value);

  myform.append("ship_mwali",ship_wali);
  myform.append("paym_id_mwali",JSON.stringify(paym_id_mwali));
  myform.append("ship_metho_mwali",ship_metho_mwali);
  myform.append("ship_mwali_price",ship_mwali_price);
  myform.append("estamit_day_mwali_value",estamit_day_mwali_value);
  var fixed_shipping_price_ngazidja = "1";
  if($("#fixed_shpping_price_ngazidja").is("checked")){
    fixed_shipping_price_ngazidja = "0";
  }
  myform.append("fixed_shipping_price_ngazidja",fixed_shipping_price_ngazidja);


                    //NDZUWANI
  myform.append("ship_ndzuwani",ship_ndzuwani);
  myform.append("payme_id_ndzuwani",JSON.stringify(payme_id_ndzuwani));
  myform.append("ship_metho_ndzuwa_selc",ship_metho_ndzuwa_selc);
  myform.append("ship_ndzuwani_price",ship_ndzuwani_price);
  myform.append("estamit_day_ndzuwani_value",estamit_day_ndzuwani_value);
  var fixed_shipping_price_ndzuwani = "1";
  if($("#fixed_shpping_price_ndzuwani").is("checked")){
    fixed_shipping_price_ndzuwani = "0";
  }
  myform.append("fixed_shipping_price_ndzuwani",fixed_shipping_price_ndzuwani);

                      //MWALI
  myform.append("ship_mwali",ship_wali);
  myform.append("paym_id_mwali",JSON.stringify(paym_id_mwali));
  myform.append("ship_metho_mwali",ship_metho_mwali);
  myform.append("ship_mwali_price",ship_mwali_price);
  myform.append("estamit_day_mwali_value",estamit_day_mwali_value);
  var fixed_shipping_price_mwali = "1";
  if($("#fixed_shpping_price_mwali").is("checked")){
    fixed_shipping_price_mwali = "0";
  }
  myform.append("fixed_shipping_price_mwali",fixed_shipping_price_mwali);
                   // france
  myform.append("ship_france",ship_france);
  myform.append("paym_id_france",JSON.stringify(paym_id_france));
  myform.append("ship_metho_france",ship_metho_france);
  myform.append("ship_france_price",ship_france_price);
  myform.append("estamit_day_france_value",estamit_day_france_value);
  var fixed_shipping_price_france = "1";
  if($("#fixed_shpping_price_france").is("checked")){
    fixed_shipping_price_france = "0";
  }
  myform.append("fixed_shipping_price_france",fixed_shipping_price_france);

  myform.append("chooseItemPic1",$("#chooseItemPic1")[0].files[0]);
  myform.append("itemPic2",$("#itemPic2")[0].files[0]);
  myform.append("itemPic3",$("#itemPic3")[0].files[0]);
  myform.append("seller__",seller__);
  myform.append("user__",user__);



  $.ajax({
    url:"set_product_in_db.php",
    type:"POST",
    data:myform,
    contentType:false,
    processData:false,
    success:function(data){

      if (data == 1) {
         $(".div_success_").show();
         $(".div_success_").text(mylang("operation_was_successful"))
        $('html, body').animate({
             scrollTop: $(".div_success_").offset().top
         }, 1000);

         setTimeout(function(){
           window.location.href = "dashboard.php?myproducts=1";
         },2000);

      }else {
        console.log(data);
        $(".div_eror_").show();
        $(".div_eror_").text(mylang("failed_operation"))
       $('html, body').animate({
            scrollTop: $(".div_eror_").offset().top
        }, 1000);
      }


    },
    error:function(erer){
      console.log(erer);

      $(".div_eror_").show();
      $(".div_eror_").text(mylang("failed_operation"))
     $('html, body').animate({
          scrollTop: $(".div_eror_").offset().top
      }, 1000);


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


  function set_varable_on_change(){

    // currency
       current = $("#currencyitem_id").val();

     // status
      status = $("#status_id").val();

    // category
    $("#select_box_cate").change(function(){
      category = $("#select_box_cate").val();
    });

    //brand
    $("#_BRAND_SELECT").change(function(){
      barnd = $("#_BRAND_SELECT").val();
    });


                      // FOR COMPUTER

    // operating system
    $("#__oprating_system_FOR_COMPUTER").change(function(){
      operating_system_ = $("#__oprating_system_FOR_COMPUTER").val();
    })

    $("#__cpu_for_computer").change(function(){
      cpu = $("#__cpu_for_computer").val();
    });


    $("#__gpu_forcomputer").change(function(){
      gpu = $("#__gpu_forcomputer").val();
    });

    $("#_ram__computer").change(function(){
      ram = $("#_ram__computer").val();
    });

    $("#__storage_FOR_COMPUTER").change(function(){
      storage = $("#__storage_FOR_COMPUTER").val();
    });

    $("#__ssd").change(function(){
      ssd = $("#__ssd").val();
    });



    $(".network_for_COMPUTER").change(function(){
      $("input:checkbox[name=network_for_COMPUTER]").each(function(){
      if($(this).is(":checked")){
      network.push($(this).val());
      }
      });
    })
      $("input:checkbox[name=network_for_COMPUTER]").each(function(){
      if($(this).is(":checked")){
       network.push($(this).val());
      }
      });




                // FOR PHONE
    // oprating system
    $("#__oprating_system").change(function(){
      operating_system_ = $("#__oprating_system").val();
    });

    // camera resolution

    $("#camera_resolution__").change(function(){
      camera_resolution = $("#camera_resolution__").val();
    });

    $("#_ram_").change(function(){
      ram = $("#_ram_").val();
    });

    $("#__storage").change(function(){
      storage = $("#__storage").val();
    });

    $("#__SIM").change(function(){
      sim = $("#__SIM").val();
    });


      $("input:checkbox[name=network_for_mobile]").each(function(){
      if($(this).is(":checked")){
       network.push($(this).val());
      }
      });




                            //NGAZIDJA
  if($("#ship_ngazidja").is(":checked")){
    ship_ngazidja = $("#ship_ngazidja").val();
  }
// pyeymant_ngazidja
  $("input:checkbox[name=paym_id_ngazidja]").each(function(){
  if($(this).is(":checked")){
   payments_ngazidja.push($(this).val());
  }
  });
///SHIPPING NGAZIDJA
    ship_metho_ngazidja = $("#ship_metho_ngazidja").val();
///SHIPPING PRICE NGAZIDJA
ship__price_ngazidja = $("#ship__price_ngazidja").val();

//Expected Date ngazidja
estamit_day_ngazidja_value = $("#estamit_day_ngazidja_value").val();

                         //NDZUWANI
 if($("#ship_ndzuwani").is(":checked")){
   ship_ndzuwani = $("#ship_ndzuwani").val();
 }

// pyeymant_ndzuwani
 $("input:checkbox[name=payme_id_ndzuwani]").each(function(){
 if($(this).is(":checked")){
  payme_id_ndzuwani.push($(this).val());
 }
 });

///shipping ndzuwani
   ship_metho_ndzuwa_selc = $("#ship_metho_ndzuwa_selc").val();
 ///shipping price ndzuwani
 ship_ndzuwani_price = $("#ship_ndzuwani_price").val();
 //Expected Date ndzuwani
 estamit_day_ndzuwani_value = $("#estamit_day_ndzuwani_value").val();

          //MWALI
if($("#ship_wali").is(":checked")){
  ship_wali = $("#ship_wali").val();
}

// pyeymant_mwali
 $("input:checkbox[name=paym_id_mwali]").each(function(){
 if($(this).is(":checked")){
  paym_id_mwali.push($(this).val());
 }
 });

 ///shipping mwali
  ship_metho_mwali = $("#ship_metho_mwali").val();
///shipping price mwali
ship_mwali_price = $("#ship_mwali_price").val();
//Expected Date mwali
estamit_day_mwali_value = $("#estamit_day_mwali_value").val();

       //FRANCE
if($("#ship_france").is(":checked")){
 ship_france = $("#ship_france").val();
}

// pyeymant_france
 $("input:checkbox[name=paym_id_france]").each(function(){
 if($(this).is(":checked")){
  paym_id_france.push($(this).val());
 }
 });

 ///shipping france
  ship_metho_france = $("#ship_metho_france").val();
///shipping price france
ship_france_price = $("#ship_france_price").val();
//Expected Date france
estamit_day_france_value = $("#estamit_day_france_value").val();



  }



  $(".curen_logo").text($("#currencyitem_id option:selected").text());
  $("#currencyitem_id").change(function(){
    $(".curen_logo").text($("#currencyitem_id option:selected").text());
  })



/*  $("#select_box_cate").change(function(){
         network = [];
    })*/

})
