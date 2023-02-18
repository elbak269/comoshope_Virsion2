
$(document).ready(function(){
var promo_price =0;
var promid = "";
var actin = "ACTION";
var ite_no_mbr = $("#itm_no_br").val();
var itemid56 = $("#item_ID").val();
var priceitem  = $("#item_rece_first_load_page").val();
var curencyprice ;
var quanttity_selected;
var sellerid ;
var clie = $("#clid_inp1").val();
var orderAdress;
var curcyid ;
//var  prouuct_disc ;
var shipping_price = 0;
var tota_or ;
var ordpapl = 0;

//var nbr_itmafteredited; // NOMBRE OF ITEM AFTER EDITED
//  LANG
var  lang;

var islandid = $("#islad_id").val();

var  recepient_name_id ; //RECEPIENT'S NAME ID
var shipe_adress_id ;
var ship_price_ngazidja =0;
var ship_price_ndzuwani =0;
var ship_price_mwali =0;
var ship_price_france =0;
var weight = 0;

var Fixed_shipping_price_Ngazidja = 0;
var Fixed_shipping_price_Ndzuwani = 0;
var Fixed_shipping_price_Mwali    = 0;
var Fixed_shipping_price_France   = 0;
var fixe_sship_order = 0;


// remove phone input by weight size
if(width = window.innerWidth >767){
  $(".inpu_phone_botom").remove();
 
}else {
  $(".inpu_phone_top").remove();

}

//KEPP SELECT OPTION SELECTED AFTER REFRESH
 $(function() {
if (localStorage.getItem('form_frame')) { //KEPP SELECT OPTION SELECTED AFTER REFRESH
  $("select option").eq(localStorage.getItem('form_frame')).prop('selected', true);
}
$(this).on('change', function() {
  localStorage.setItem('form_frame', $('option:selected', this).index());

});

});

set_texts();

                         // FETCH ADRESS
  $.ajax({
    async:false,
    url:"setdata.php",
    method:"post",
    data:{clientid:$("#customerid").val(),get_adres:"get_adres",showaddress:"showaddress",product:$("#item_ID").val()},
    success:function(data){
    cheickifradiobuttonischeked(); // CALL cheickifradiobuttonischeked FUNCTION

    if(width = window.innerWidth >767){
        $(".top_adress .adress_div").html(data);
    //  $(".buttomadress adress_div").remove();
    }else{
    //  $("top_adress adress_div").remove();
        $(".buttomadress .adress_div").html(data);

    }

    $("#place_shi___").change(function(){
      calcul_ship_price();
      $.ajax({
        async:false,
        url:"setdata.php",
        method:"post",
        data:{get_all_payment_me:"get_all_payment_me",prdct:$("#item_ID").val(),place_shi:$(this).val()},
        success:function(dta){
         $(".div_payment_method").html(dta);
          if ($("#place_shi___").val() == 1) {
            shipping_price   = ship_price_ngazidja;
            fixe_sship_order = Fixed_shipping_price_Ngazidja;


            set_texts();
          }
          else if($("#place_shi___").val() ==2){
            shipping_price = ship_price_ndzuwani;
            fixe_sship_order = Fixed_shipping_price_Ndzuwani;

            set_texts();
          }else if($("#place_shi___").val() == 3){
            shipping_price = ship_price_mwali;
            fixe_sship_order = Fixed_shipping_price_Mwali;

            set_texts();
          }else if($("#place_shi___").val() == 4){
            shipping_price = ship_price_france;
            fixe_sship_order = Fixed_shipping_price_France;
            set_texts();
          }


        }
      })

    });

      $.ajax({

        url:"setdata.php",
        method:"post",
        async:false,
        data:{get_all_payment_me:"get_all_payment_me",prdct:$("#item_ID").val(),place_shi:$("#place_shi___").val()},
        success:function(dta){
          $(".div_payment_method").html(dta);
          if ($("#place_shi___").val() == 1) {
            shipping_price = ship_price_ngazidja;
            fixe_sship_order = Fixed_shipping_price_Ngazidja;
            set_texts();
          }else if($("#place_shi___").val() ==2){
            shipping_price = ship_price_ndzuwani;
            fixe_sship_order = Fixed_shipping_price_Ndzuwani;
            set_texts();
          }else if($("#place_shi___").val() == 3){
            shipping_price = ship_price_mwali;
            fixe_sship_order = Fixed_shipping_price_Mwali;
            set_texts();
          }else if($("#place_shi___").val() == 4){
            shipping_price = ship_price_france;
            fixe_sship_order = Fixed_shipping_price_France;
            set_texts();
          }

/*
          if ($("#payme_meth_sel").val() == 1 ) {

            $("#paypal-button-container").show();
            $("#proceedToCheckout_btn_bottom").hide();
          }else{

              $("#paypal-button-container").hide();
              $("#proceedToCheckout_btn_bottom").show();

          }


          $("#payme_meth_sel").change(function(){

            if ($("#payme_meth_sel").val() == 1 ) {

              $("#paypal-button-container").show();
              $("#proceedToCheckout_btn_bottom").hide();

            }else{
                $("#paypal-button-container").hide();
                $("#proceedToCheckout_btn_bottom").show();

            }


          }) */
        }
      })



  }
}) // END SHOW ADDRESS







// TOTAL DIV
$("#nbr_itm").change(function(){
var price_ite = priceitem*ite_no_mbr;
$("#totali_div").text(price_ite+" "+get_curency_name(localStorage.getItem("curency_id")))
if (localStorage.getItem("curency_id") != 1) {
  var pri = price_ite * GET_EXCHANGE_(localStorage.getItem("curency_id"));
$("#totali_div").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
}

})

var price_ite = priceitem*ite_no_mbr;
$("#totali_div").text(price_ite+" "+get_curency_name(localStorage.getItem("curency_id")))
if (localStorage.getItem("curency_id") != 1) {
  var pri = price_ite * GET_EXCHANGE_(localStorage.getItem("curency_id"));
$("#totali_div").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
}




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



// loopforanyradiobutton();
cheickifradiobuttonischeked();

function cheickifradiobuttonischeked(){ // CHECK IF RADIO BUTTON IS CHANGE
  $(".adress_div input:radio").change(function(){

  $(this).each(function(){

    $(".adress_div div").removeClass("select_radi_div");
  //  $(".form-check  span").removeClass("div_adres_pare");
    if ($(this).is(":checked")) {
    orderAdress = $(this).val();
    $(".adress_div .form-check  span").removeClass("blue");
    $(".adress_div #"+"div"+$(this).val()).addClass("select_radi_div");
    $(".adress_div #"+"div"+$(this).val()+"  span ").addClass("blue");



    shipe_adress_id = $(this).val();


    $("#placeDescripyionid").val($(this).data("adres_desc"));
    $("#placeDescripyionid1").val($(this).data("adres_desc"));

    }
  })
  })
} // END CHECK IF RADIO BUTTON IS CHANGE


cheickifradiobuttonischekednames(); //CALL CHEICK RADIO BUTTON FUNCTION FOR GET NAMES


// CHECK IF RADIO BUTTON IS CHANGE
function cheickifradiobuttonischekednames(){ // CHECK IF RADIO BUTTON IS CHANGE FOR NAMES
  $(".rec_p_man_dv input:radio").change(function(){
  $(this).each(function(){

    $(".rec_p_man_dv div").removeClass("select_radi_div");
  //  $(".form-check  span").removeClass("div_adres_pare");
    if ($(this).is(":checked")) {
    orderAdress = $(this).val();
    $(".rec_p_man_dv .form-check  span").removeClass("blue");
    $(".rec_p_man_dv #"+"div"+$(this).val()).addClass("select_radi_div");
    $(".rec_p_man_dv #"+"div"+$(this).val()+"  span ").addClass("blue");
      recepient_name_id = $(this).val();
      $("#full_name_id").val("");
    $("#full_name_id").val($(this).data("fuln_na"));

    }
  })
  })
} // END CHECK IF RADIO BUTTON IS CHANGE FOR NAMES


// RQUEST ORDER
function set_texts(){

  $.ajax({
    dataType:"json",
    async:false,
    url:"showitems.php",
    method:"POST",
    data:{
      action:actin,order_details_for_payment:ite_no_mbr,itemid:itemid56,curency:localStorage.getItem("curency_id")
    },
    success:function(data1){
      for (var i = 0; i < data1.requestOrder.length; i++) {
         item           = data1.requestOrder[i].price; // ITEM PRICE
         curencyprice        = data1.requestOrder[i].currency; //CURRENCY ITEM
         prouuct_disc        = data1.requestOrder[i].promo;// PRODUCT DISCOUNT
        // shipping_price      = data1.requestOrder[i].shippingprice;// SHIPPINGPRICE
        sellerid             = data1.requestOrder[i].saller;
        curcyid              = data1.requestOrder[i].currencyid;

         ship_price_ngazidja    = data1.requestOrder[i].ship_price_ngazidja;
         ship_price_ndzuwani = data1.requestOrder[i].ship_price_ndzuwani;
         ship_price_mwali    = data1.requestOrder[i].ship_price_mwali;
         ship_price_france   = data1.requestOrder[i].ship_price_france;
         weight              = data1.requestOrder[i].pr_weight;
          Fixed_shipping_price_Ngazidja = data1.requestOrder[i].Fixed_shipping_price_Ngazidja;
          Fixed_shipping_price_Ndzuwani = data1.requestOrder[i].Fixed_shipping_price_Ndzuwani;
          Fixed_shipping_price_Mwali      = data1.requestOrder[i].Fixed_shipping_price_Mwali;
          Fixed_shipping_price_France   = data1.requestOrder[i].Fixed_shipping_price_France;

      }
                    // item price

      $("#price_span").text(priceitem+" "+curencyprice);
      if (localStorage.getItem("curency_id") != 1) {
        var pri = priceitem * GET_EXCHANGE_(localStorage.getItem("curency_id"));
      $("#price_span").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
      }





                     // QUANTITY SLECTED BOX
      var slect_qua_div = '<div class="input-group mb-3">';
      slect_qua_div += '<select class="custom-select qtt_class"  id="nbr_itm">';
      for (var quantity_select_for = 1; quantity_select_for < 100; quantity_select_for++) {
        slect_qua_div += '<option ';
         slect_qua_div += 'value="'+quantity_select_for+'" ';
         if (quantity_select_for==1) {
           slect_qua_div += "selected";
         }
         slect_qua_div +='>'+quantity_select_for+'</option>';
      }
      slect_qua_div += '</select>';
      slect_qua_div += '<div class="input-group-append ">';
      slect_qua_div += '<label class="input-group-text" for="nbr_itm">QTY</label>';
      slect_qua_div += '</div>';
      slect_qua_div += '</div>';
      $("#quantity_select_div").html(slect_qua_div); // END QUANTITY SELECT BOX


      //promo
      $("#btn_apply").click(function(){

        var prom = $("#savingid").val();
         itemid56 = $("#item_ID").val();
        $.ajax({
          async :false,
          dataType:"json",
          url:"check.php",
          method:"POST",
          data:{
            promo:prom,itempormo:itemid56
          },
          success:function(data){
            for (var i = 0; i < data.promo.length; i++) {
              promo_price = data.promo[i].promovalue;
              promid      = data.promo[i].promoid ;
            }

      $(".productDiscount_span_clas_").text(promo_price+" "+curencyprice);
      if (localStorage.getItem("curency_id") != 1) {
        var pri = promo_price * GET_EXCHANGE_(localStorage.getItem("curency_id"));
      $(".productDiscount_span_clas_").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
      }

      $("#nbr_itm").change(function(){ // REDECLARING PRICE NOMBR E OF ITEM VARAIBLE AFTER EDITED
        localStorage.setItem("nombreofitem",ite_no_mbr);
        var ordervalu = priceitem*ite_no_mbr;


        $(".order_value_span_class").text(ordervalu+" "+curencyprice); //PRICE*NOMBRE OF ITEM

        if (localStorage.getItem("curency_id") != 1) {
          var pri = ordervalu * GET_EXCHANGE_(localStorage.getItem("curency_id"));
        $(".order_value_span_class").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
        }

        promo_price
        var savingit = promo_price*ite_no_mbr;
        $(".saving_span_order_clas_").text(savingit+" "+curencyprice); // SAVING

        if (localStorage.getItem("curency_id") != 1) {
          var pri = savingit * GET_EXCHANGE_(localStorage.getItem("curency_id"));
        $(".saving_span_order_clas_").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
        }

        var subtota1 = ordervalu-savingit;
        $(".subtotal_span_order_lass").text(subtota1*ite_no_mbr+" "+curencyprice); // SUBTOTAL PRICE
        //$(".shipping_span_order").text(shipping_price+" "+curencyprice);//SHIPPING PRICE
        calcul_ship_price();
         tota_or = parseInt(shipping_price)+parseInt(subtota1);
        $(".order_total_clas_").text(tota_or+" "+curencyprice); //TOTAL ORDER PRICS
        ordpapl = tota_or;

        if (localStorage.getItem("curency_id") != 1) {
          var pri = tota_or * GET_EXCHANGE_(localStorage.getItem("curency_id"));
        $(".order_total_clas_").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
        ordpapl = tota_or;
      }



      })




      var ordervalu = priceitem*ite_no_mbr;
      $(".order_value_span_class").text(ordervalu+" "+curencyprice); //PRICE*NOMBRE OF ITEM
      if (localStorage.getItem("curency_id") != 1) {
        var pri = ordervalu * GET_EXCHANGE_(localStorage.getItem("curency_id"));
      $(".order_value_span_class").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
      }
      var savingit = promo_price*ite_no_mbr;
      $(".saving_span_order_clas_").text(savingit+" "+curencyprice); // SAVING

      if (localStorage.getItem("curency_id") != 1) {
        var pri = savingit * GET_EXCHANGE_(localStorage.getItem("curency_id"));
      $(".saving_span_order_clas_").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
      }

      var subtota1 = ordervalu-savingit;
      $(".subtotal_span_order_lass").text(subtota1+" "+curencyprice); // SUBTOTAL PRICE

      if (localStorage.getItem("curency_id") != 1) {
        var pri = subtota1 * GET_EXCHANGE_(localStorage.getItem("curency_id"));
      $(".subtotal_span_order_lass").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
      }
      //$(".shipping_span_order").text(shipping_price+" "+curencyprice);//SHIPPING PRICE
      calcul_ship_price();
       tota_or = parseInt(shipping_price)+parseInt(subtota1);
      $(".order_total_clas_").text(tota_or+" "+curencyprice); //TOTAL ORDER PRICS
      ordpapl = tota_or;

      if (localStorage.getItem("curency_id") != 1) {
        var pri = tota_or * GET_EXCHANGE_(localStorage.getItem("curency_id"));
      $(".order_total_clas_").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
      ordpapl = tota_or;
      }



          }
        })
      })



      $("#nbr_itm").change(function(){ // REDECLARING PRICE NOMBR E OF ITEM VARAIBLE AFTER EDITED
        ite_no_mbr = $(this).val();
        var ordervalu = priceitem*ite_no_mbr;
        $(".order_value_span_class").text(ordervalu+" "+curencyprice); //PRICE*NOMBRE OF ITEM

        if (localStorage.getItem("curency_id") != 1) {
          var pri = ordervalu * GET_EXCHANGE_(localStorage.getItem("curency_id"));
        $(".order_value_span_class").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
        }


        var savingit = promo_price*ite_no_mbr;
        $(".saving_span_order_clas_").text(savingit+" "+curencyprice); // SAVING

        if (localStorage.getItem("curency_id") != 1) {
          var pri = savingit * GET_EXCHANGE_(localStorage.getItem("curency_id"));
        $(".saving_span_order_clas_").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
        }

        var subtota1 = ordervalu-savingit;
        $(".subtotal_span_order_lass").text(subtota1+" "+curencyprice); // SUBTOTAL PRICE

        if (localStorage.getItem("curency_id") != 1) {
          var pri = subtota1 * GET_EXCHANGE_(localStorage.getItem("curency_id"));
        $(".subtotal_span_order_lass").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
        }

      //  $(".shipping_span_order").text(shipping_price+" "+curencyprice);//SHIPPING PRICE
        calcul_ship_price();
         tota_or = parseInt(shipping_price)+parseInt(subtota1);


        $(".order_total_clas_").text(tota_or+" "+curencyprice); //TOTAL ORDER PRICS
        ordpapl = tota_or;

        if (localStorage.getItem("curency_id") != 1) {
          var pri = tota_or * GET_EXCHANGE_(localStorage.getItem("curency_id"));
        $(".order_total_clas_").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
        ordpapl = tota_or;
        }



          calcul_ship_price();

      })


        // SET TEXT FRO FIRST LOAD PAGE

      var ordervalu = priceitem*ite_no_mbr;
      $(".order_value_span_class").text(ordervalu+" "+curencyprice); //PRICE*NOMBRE OF ITEM

      if (localStorage.getItem("curency_id") != 1) {
        var pri = ordervalu * GET_EXCHANGE_(localStorage.getItem("curency_id"));
      $(".order_value_span_class").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
      }

      var savingit = promo_price*ite_no_mbr;
      $(".saving_span_order_clas_").text(savingit+" "+curencyprice); // SAVING

      if (localStorage.getItem("curency_id") != 1) {
        var pri = savingit * GET_EXCHANGE_(localStorage.getItem("curency_id"));
      $(".saving_span_order_clas_").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
      }


      var subtota1 = ordervalu-savingit;
      $(".subtotal_span_order_lass").text(subtota1+" "+curencyprice); // SUBTOTAL PRICE

      if (localStorage.getItem("curency_id") != 1) {
        var pri = subtota1 * GET_EXCHANGE_(localStorage.getItem("curency_id"));
      $(".subtotal_span_order_lass").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
      }
    //  $(".shipping_span_order").text(shipping_price+" "+curencyprice);//SHIPPING PRICE
       calcul_ship_price();
       tota_or = parseInt(shipping_price)+parseInt(subtota1);


      $(".order_total_clas_").text(tota_or+" "+curencyprice); //TOTAL ORDER PRICS
      ordpapl = tota_or;
      if (localStorage.getItem("curency_id") != 1) {
        var pri = tota_or * GET_EXCHANGE_(localStorage.getItem("curency_id"));
      $(".order_total_clas_").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
      ordpapl = tota_or;
      }

    // END  SET TEXT FRO FIRST LOAD PAGE

  }
  })

}
//END FOR SET TEXT AND PRODUCT INFO
//END RQUEST ORDER

$("#btn_add_recepairnt").click(function(){
  add_new_reception();
})


function add_new_reception(){

if($("#intpt_receipientFirstName").val()==""){
$("#result_request").html("<div class='alert alert-danger text-center'>"+mylang("recIT_fst_nm_ct_emt")+"</div>");
window.location.hash = "#result_request";
}else if($("#input_receipientlastName").val() == ""){
$("#result_request").html("<div class='alert alert-danger text-center'>"+mylang("recIT_last_nm_ct_emt")+"</div>");
window.location.hash = "#result_request";
}else{
$.ajax({

  async:false,
  url:"setdata.php",
  method:"POST",
  data:{
    set_name:"setname",client_id:$("#customerid").val(),fullname:$("#full_name_id").val()},
    success:function(data){
      get_recipient_names(clie);
$("#result_request").html(data);
setTimeout(function(){
  $("#result_request").fadeOut(1000);
//  location.reload();
},2000);

    }
})

}

}


mvore_recep_div();  // MOVE RECIPIENT DIV
function mvore_recep_div(){
  if(width = window.innerWidth >767){

$(".top_adress adress_div").prepend("#div_pace_ship");
$(".rec_p_man_dv").appendTo(".div_for_recep_top");

  }
}

// REQUEST ORDER   TOP
$("#proceedToCheckout_btn_top").click(function(){  // PRCOCCED TO Checkout

request_order();
})


// REQUEST ORDER   BOTTOM
$("#proceedToCheckout_btn_bottom").click(function(){  // PRCOCCED TO Checkout
request_order();
});

// REQUEST ORDER
function request_order(){

var qtt = $(".qtt_class").val()
var productid  = $("#item_ID").val();
var customer_id  = $("#customerid").val();


  if( ($("#placeDescripyionid").val()=="" || $("#placeDescripyionid").val()==null  ) && window.innerWidth >767 ){
    $('html, body').animate({
        scrollTop: $("#result_request").offset().top
    }, 1000);

    $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("chooceOrAddShippinAddress")+'</div>');
      $("#placeDescripyionid").focus();
    setTimeout(function(){
      $("#result_request").fadeOut(2000);
      $('html, body').animate({
          scrollTop: $("#placeDescripyionid").offset().top
      }, 1000);


    },2000);

  }  else if( ($("#placeDescripyionid1").val()=="" || $("#placeDescripyionid1").val()==null  ) && window.innerWidth <767 ){
      $('html, body').animate({
          scrollTop: $("#result_request").offset().top
      }, 1000);

      $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("chooceOrAddShippinAddress")+'</div>');
        $("#placeDescripyionid").focus();
      setTimeout(function(){
        $("#result_request").fadeOut(2000);
        $('html, body').animate({
            scrollTop: $("#placeDescripyionid").offset().top
        }, 1000);


      },2000);

    }else if ($("#full_name_id").val() == "" || $("#full_name_id").val() ==null) {
        $("#result_request").fadeIn(1000);
    $('html, body').animate({
        scrollTop: $("#result_request").offset().top
    }, 1000);

      $("#full_name_id").focus();
    $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("chooceOrAddShippinrecepient")+'</div>');
    setTimeout(function(){
      $("#result_request").fadeOut(2000);
      $('html, body').animate({
          scrollTop: $("#placeDescripyionid").offset().top
      }, 1000);


    },2000);


    setTimeout(function(){
      $('html, body').animate({
          scrollTop: $("#full_name_id").offset().top
      }, 1000);
    },5000);
  }else if($("#inpu_phone").val() == "" || $("#inpu_phone").val() == null){

    $("#result_request").fadeIn(1000);
$('html, body').animate({
    scrollTop: $("#result_request").offset().top
}, 1000);

  $("#inpu_phone").focus();
$("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("mobileCantEmpty")+'</div>');
setTimeout(function(){
  $("#result_request").fadeOut(2000);
  $('html, body').animate({
      scrollTop: $("#inpu_phone").offset().top
  }, 1000);


},2000);


setTimeout(function(){
  $('html, body').animate({
      scrollTop: $("#full_name_id").offset().top
  }, 1000);
},5000);

  }
  else{
    if (promo_price > 0) {
      promo_price = promo_price;
    }
    else {
      promo_price  = 0;
    }

  var adres_shi ;
  if(width = window.innerWidth >767){
    adres_shi = $("#placeDescripyionid").val();
  }else{
    adres_shi = $("#placeDescripyionid1").val();
  }
  $.ajax({
    dataType:"json",
    url:"confirm_order.php",
    method:"post",
    data:{
      requestorder:'resat',clientid:$("#customerid").val().trim(),Nombre_ofitem:qtt,itemid:$("#item_ID").val().trim(),order_address:adres_shi,promocode:promid,recep_name:$("#full_name_id").val(),
      payment_method:$("#payme_meth_sel").val().trim(),currecny:localStorage.getItem("curency_id"),place_shi_id:$("#place_shi___").val().trim(),selerid:$("#saller__").val().trim(),phone:$("#inpu_phone").val()
    },
    success:function(success){
      
      if (success.order_id != null || success.order_id != "" || success.order_id  != "undefined") {

        $('html, body').animate({
            scrollTop: $("#result_request").offset().top
        }, 1000);

        $("#result_request").html('<div class="alert alert-success text-center" role="alert">'+mylang("successfulPreogress")+'</div>');
          $("#inpu_phone").focus();
        setTimeout(function(){
        window.location.href = "bill.php?order_id="+success.order_id+" ";
      },2000);
    }else{
      $('html, body').animate({
          scrollTop: $("#result_request").offset().top
      }, 1000);

      $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("failedProgress")+'</div>');
    }
      /*
      if (data==1){

        var suceepr = mylang("successfulPreogress");
          window.location.hash = "#result_request";
        $("#result_request").html("<div class='alert alert-success text-center'> "+suceepr+" <div>");
        $("#result_request").fadeIn(1000);

        setTimeout(function(){
          $("#result_request").fadeOut(1000);
        },4000);
        setTimeout(function(){window.location.href = "profile.php" },5000)
      }
      else{
        failledpr = mylang("failedProgress");
        window.location.hash = "#result_request";
        $("#result_request").html("<div class='alert alert-danger text-center'> "+failledpr+" <div>");
        $("#result_request").fadeIn(1000);
        setTimeout(function(){
          $("#result_request").fadeOut(1000);
        },5000);
      }
      */

    },
    error:function(error){
      console.log(error);
    }

  })

  }
}

$("#quantity_select_div").change(function(){
  calcul_ship_price();

})

function calcul_ship_price(){
/*
var total_ship_weight =ite_no_mbr*weight;
if ($("#place_shi___").val() == 1) {

    if (total_ship_weight >= 600) {

      shipping_price = 200
    }else {

      shipping_price = 20;
    }
}else{

  if (total_ship_weight <= 0.5) {

    shipping_price = 50;

  }else if(total_ship_weight <= 1){

    shipping_price = 100*total_ship_weight;



}

}
*/

if(fixe_sship_order == 1){
  $(".shipping_span_order").text(shipping_price+" "+get_curency_name(localStorage.getItem("curency_id")))
  if (localStorage.getItem("curency_id") != 1) {
    var pri = shipping_price * GET_EXCHANGE_(localStorage.getItem("curency_id"));
  $(".shipping_span_order").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;

  }

}else{

  var total_ship = shipping_price * $("#nbr_itm").val();
  $(".shipping_span_order").text(total_ship+" "+get_curency_name(localStorage.getItem("curency_id")))
  if (localStorage.getItem("curency_id") != 1) {
    var pri = total_ship * GET_EXCHANGE_(localStorage.getItem("curency_id"));
  $(".shipping_span_order").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;

  }
}

}


function initPayPalButton() {
  var tlord =  ordpapl;

  var total_order = shipping_price+tota_or;
  if(fixe_sship_order == 1){
    total_order = shipping_price+tota_or;
  }else{
    var total_ship = shipping_price * $("#nbr_itm").val();
    total_order = total_ship+tota_or;
  }
  paypal.Buttons({
    style: {
      shape: 'rect',
      color: 'gold',
      layout: 'vertical',
      label: 'paypal',
    },

    createOrder: function(data, actions) {
      var qtt = $(".qtt_class").val()
      var productid  = $("#item_ID").val();
      var customer_id  = $("#customerid").val();


        if( ($("#placeDescripyionid").val()=="" || $("#placeDescripyionid").val()==null  ) && window.innerWidth >767 ){
          $('html, body').animate({
              scrollTop: $("#result_request").offset().top
          }, 1000);

          $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("chooceOrAddShippinAddress")+'</div>');
            $("#placeDescripyionid").focus();
          setTimeout(function(){
            $("#result_request").fadeOut(2000);
            $('html, body').animate({
                scrollTop: $("#placeDescripyionid").offset().top
            }, 1000);


          },2000);

        }  else if( ($("#placeDescripyionid1").val()=="" || $("#placeDescripyionid1").val()==null  ) && window.innerWidth <767 ){
            $('html, body').animate({
                scrollTop: $("#result_request").offset().top
            }, 1000);

            $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("chooceOrAddShippinAddress")+'</div>');
              $("#placeDescripyionid").focus();
            setTimeout(function(){
              $("#result_request").fadeOut(2000);
              $('html, body').animate({
                  scrollTop: $("#placeDescripyionid").offset().top
              }, 1000);


            },5000);

          }else if ($("#full_name_id").val() == "" || $("#full_name_id").val() ==null) {
              $("#result_request").fadeIn(1000);
          $('html, body').animate({
              scrollTop: $("#result_request").offset().top
          }, 1000);

            $("#full_name_id").focus();
          $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("chooceOrAddShippinrecepient")+'</div>');
          setTimeout(function(){
            $("#result_request").fadeOut(2000);
            $('html, body').animate({
                scrollTop: $("#placeDescripyionid").offset().top
            }, 1000);


          },5000);


          setTimeout(function(){
            $('html, body').animate({
                scrollTop: $("#full_name_id").offset().top
            }, 1000);
          },5000);
        }else if($("#inpu_phone").val() == "" || $("#inpu_phone").val() == null){

          $("#result_request").fadeIn(1000);
      $('html, body').animate({
          scrollTop: $("#result_request").offset().top
      }, 1000);

        $("#full_name_id").focus();
      $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("mobileCantEmpty")+'</div>');
      setTimeout(function(){
        $("#result_request").fadeOut(2000);
        $('html, body').animate({
            scrollTop: $("#inpu_phone").offset().top
        }, 1000);


      },5000);


      setTimeout(function(){
        $('html, body').animate({
            scrollTop: $("#inpu_phone").offset().top
        }, 1000);
      },5000);

    }else{
      return actions.order.create({
        purchase_units: [{"amount":{"currency_code":"EUR","value":total_or_for_papl()}}]
      });
    }
    },

    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        confirm_order_wihtout_checking();
      //  alert('Transaction completed by ' + details.payer.name.given_name + '!');
        $('html, body').animate({
            scrollTop: $("#result_request").offset().top
        }, 1000);

        $("#result_request").html('<div class="alert alert-success text-center" role="alert">'+mylang("successfulPreogress")+'</div>');

        setTimeout(function(){
       window.location.href = "profile.php";
        },2000);
      });
    },

    onError: function(err) {
      $('html, body').animate({
          scrollTop: $("#result_request").offset().top
      }, 1000);

      $("#result_request").html('<div class="alert alert-success text-center" role="alert">'+mylang("failedProgress")+'</div>');


    }
  }).render('#paypal-button-container');
}

initPayPalButton();


calcul_ship_price();



/// GET EXCHANGE
function GET_EXCHANGE_(curencyid){
var result ;
 var get_exchange = "get_exchange";
 $.ajax({
   dataType:"json",
   url:"get_data_for_search.php",
   method:"post",
   async:false,
   data:{get_exchange:get_exchange,currency_id:curencyid},
   success:function(data){


  result = data;

   }

 })

    return result;
};

function get_curency_name(curencyid){
var result ;
 var get_curency_name_ = "get_exchange";
 $.ajax({
   dataType:"json",
   url:"get_data_for_search.php",
   method:"post",
   async:false,
   data:{get_curency_name_:get_curency_name_,currency_id:curencyid},
   success:function(data){
  result = data;

   }

 })

    return result;
}

/*
if ($("#payme_meth_sel").val() == 1) {
  $(".div_paypal").show();
  $("#proceedToCheckout_btn_bottom").hide();
    $("#proceedToCheckout_btn_top").hide();
}else{

  $(".div_paypal").hide();
  $("#proceedToCheckout_btn_bottom").show();
  $("#proceedToCheckout_btn_top").show();

}


$("#payme_meth_sel").change(function(){

  if ($("#payme_meth_sel").val() == 1) {
    $(".div_paypal").show();
  }else{
    $(".div_paypal").hide();
  }

})
*/

function check_unpu_is_empty(){
  if( ($("#placeDescripyionid").val()=="" || $("#placeDescripyionid").val()==null  ) && window.innerWidth >767 ){
    $('html, body').animate({
        scrollTop: $("#result_request").offset().top
    }, 1000);

    $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("chooceOrAddShippinAddress")+'</div>');
      $("#placeDescripyionid").focus();
    setTimeout(function(){
      $("#result_request").fadeOut(2000);
      $('html, body').animate({
          scrollTop: $("#placeDescripyionid").offset().top
      }, 1000);


    },2000);

  }  else if( ($("#placeDescripyionid1").val()=="" || $("#placeDescripyionid1").val()==null  ) && window.innerWidth <767 ){
      $('html, body').animate({
          scrollTop: $("#result_request").offset().top
      }, 1000);

      $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("chooceOrAddShippinAddress")+'</div>');
        $("#placeDescripyionid").focus();
      setTimeout(function(){
        $("#result_request").fadeOut(2000);
        $('html, body').animate({
            scrollTop: $("#placeDescripyionid").offset().top
        }, 1000);


      },2000);

    }else if ($("#full_name_id").val() == "" || $("#full_name_id").val() ==null) {
        $("#result_request").fadeIn(1000);
    $('html, body').animate({
        scrollTop: $("#result_request").offset().top
    }, 1000);

      $("#full_name_id").focus();
    $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("chooceOrAddShippinrecepient")+'</div>');
    setTimeout(function(){
      $("#result_request").fadeOut(2000);
      $('html, body').animate({
          scrollTop: $("#placeDescripyionid").offset().top
      }, 1000);


    },2000);


    setTimeout(function(){
      $('html, body').animate({
          scrollTop: $("#full_name_id").offset().top
      }, 1000);
    },5000);
  }else if($("#inpu_phone").val() == "" || $("#inpu_phone").val() == null){

    $("#result_request").fadeIn(1000);
$('html, body').animate({
    scrollTop: $("#result_request").offset().top
}, 1000);

  $("#inpu_phone").focus();
$("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("mobileCantEmpty")+'</div>');
setTimeout(function(){
  $("#result_request").fadeOut(2000);
  $('html, body').animate({
      scrollTop: $("#inpu_phone").offset().top
  }, 1000);


},2000);


setTimeout(function(){
  $('html, body').animate({
      scrollTop: $("#inpu_phone").offset().top
  }, 1000);
},5000);

  }
}

function confirm_order_wihtout_checking(){
  var qtt = $(".qtt_class").val()
  var productid  = $("#item_ID").val();
  var customer_id  = $("#customerid").val();
  var adres_shi ;
  if(width = window.innerWidth >767){
    adres_shi = $("#placeDescripyionid").val();
  }else{
    adres_shi = $("#placeDescripyionid1").val();
  }
  $.ajax({
    dataType:"json",
    url:"confirm_order.php",
    method:"post",
    data:{
      requestorder:'resat',clientid:$("#customerid").val().trim(),Nombre_ofitem:qtt,itemid:$("#item_ID").val().trim(),order_address:adres_shi,promocode:promid,recep_name:$("#full_name_id").val(),
      payment_method:$("#payme_meth_sel").val().trim(),currecny:localStorage.getItem("curency_id"),place_shi_id:$("#place_shi___").val().trim(),selerid:$("#saller__").val().trim(),phone:$("#inpu_phone").val()
    },
    success:function(success){

     
      if (success.order_id != null || success.order_id != "" || success.order_id  != "undefined") {

        $('html, body').animate({
            scrollTop: $("#result_request").offset().top
        }, 1000);

        $("#result_request").html('<div class="alert alert-success text-center" role="alert">'+mylang("successfulPreogress")+'</div>');
          $("#inpu_phone").focus();
        setTimeout(function(){
        window.location.href = "bill.php?order_id="+success.order_id+" ";
      },2000);
    }else{
      $('html, body').animate({
          scrollTop: $("#result_request").offset().top
      }, 1000);

      $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("failedProgress")+'</div>');
    }

},
error:function(error){
  console.log(error);
}
  })
}

$("div_btnconfirm").addClass("disabledbutton");

$("#payme_meth_sel").change(function(){
  if ($(this).val() == 1) {
      $("#paypal-button-container").show();
      $("#proceedToCheckout_btn_top , #proceedToCheckout_btn_bottom").hide();
  }else{
    $("#paypal-button-container").hide();
    $("#proceedToCheckout_btn_top , #proceedToCheckout_btn_bottom").show();
  }

});


if ($("#payme_meth_sel").val() == 1) {

    $("#paypal-button-container").show();
    $("#proceedToCheckout_btn_top , #proceedToCheckout_btn_bottom").hide();
}else{

  $("#paypal-button-container").hide();
  $("#proceedToCheckout_btn_top , #proceedToCheckout_btn_bottom").show();
}

/*
function clacl_euro(va){
  var resul = 0;
  if(localStorage.getItem("curency_id") == 1){
    resul = va;
  }else{
    resul = va / GET_EXCHANGE_(localStorage.getItem("curency_id"));
  }
  return resul;
}
alert(ordpapl); */


var tex = $(".order_total_clas_:last").text();

//alert(  tex.replace(/\D/g, "") );
//console.log(GET_EXCHANGE_(localStorage.getItem("curency_id")));



function total_or_for_papl(){
      var resl = 0 ;
      var tl_or = $(".order_total_clas_:last").text();

      if(localStorage.getItem("curency_id") == 1){
        resl = tl_or.replace(/\D/g, "") ;
        }else{

          resl =tl_or.replace(/\D/g, "")  / GET_EXCHANGE_(localStorage.getItem("curency_id"));
        }
        return resl;
}


if (window.innerWidth < 765) {
  //$("#div_to_paypal").remove();


}

})
