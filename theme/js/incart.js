$(document).ready(function(){

  var product_weight  = 0;
  var shipping_price ;
  var sub_total = 0;
  var shipping_price__ = 0;
  var total_order = 0;
  var promocode = 0;
var total_shipping_price = 0;

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




function calcul_all_weight(){
  var subtotal_weight = 0;
  var sub_to_qty = 0;
  var tota_weight =0;
  $(".weight_product").each(function(){
     subtotal_weight   += parseInt($(this).val());
  });

  $(".selqty_in_cart").each(function(){
    sub_to_qty += parseInt($(this).val());
  })
  tota_weight = sub_to_qty*subtotal_weight;
  return tota_weight;
}


/*

function calcul_shiping_price(){
  var sub_total_ship = 0;
  var total_shiping = 0;
  var total_weight = calcul_all_weight();
  var total_price_weight = 0;


if ($("#sele_islands").val() == 1) {

  if (localStorage.getItem("curency_id") != 1) {
    total_price_weight = 20;
    sub_total_ship = Math.ceil(total_price_weight);
    var  toat_ship_pr = (sub_total_ship * GET_EXCHANGE_(localStorage.getItem("curency_id")));
    total_shiping     =sub_total_ship;
  $("#shipping_span_order").text(toat_ship_pr+" "+get_curency_name(localStorage.getItem("curency_id"))) ;

}else{

  if (total_weight < 1) {
    total_price_weight = 20;
      total_shiping = Math.ceil(total_price_weight);
  }else{
    total_price_weight = 20;
    total_shiping = Math.ceil(total_price_weight);


  }

  $("#shipping_span_order").text(total_shiping+" "+get_curency_name(localStorage.getItem("curency_id"))) ;

}


}else {

  if (localStorage.getItem("curency_id") != 1) {
    total_price_weight = total_weight*100;
    sub_total_ship = Math.ceil(total_price_weight);
    var  toat_ship_pr = (sub_total_ship * GET_EXCHANGE_(localStorage.getItem("curency_id")));
  $("#shipping_span_order").text(toat_ship_pr+" "+get_curency_name(localStorage.getItem("curency_id"))) ;

}else{

  if (total_weight < 1) {
    total_price_weight = total_weight*50;
      total_shiping = Math.ceil(total_price_weight);
  }else{
    total_price_weight = total_weight*100;
    total_shiping = Math.ceil(total_price_weight);
  }
  $("#shipping_span_order").text(total_shiping+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
}

}

return total_shiping;
}
calcul_shiping_price();

*/






function calcul_sub_total(){
  var sub_total = 0;
 $(".sub_total").each(function(){
//  sub_total +=  (parseInt($(this).val()) * parseInt($this).)
 })


}



function set_sub_toal(){
  sub_total = 0;
  $(".total_pr").each(function(){
  var qty_it = $("#selc_qty_"+$(this).data("product_id")).val();
  var price  = $(this).data("price");
  var total = price*qty_it;
  sub_total += total;
  $(this).text("Total : "+total+" "+get_curency_name(localStorage.getItem("curency_id")));
  if (localStorage.getItem("curency_id") != 1) {
    var pri = total * GET_EXCHANGE_(localStorage.getItem("curency_id"));
  $(this).text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;

  }

  })

return sub_total;
}

set_sub_toal();


function set_text(){
  total_order = 0;

  total_order = set_sub_toal()+get_ship_prices();
  var sub_tola = set_sub_toal();
  $("#ordertotal_span_oorder").text(total_order+" "+get_curency_name(localStorage.getItem("curency_id")));
  $("#subtotal_span_order").text(sub_tola+" "+get_curency_name(localStorage.getItem("curency_id")))
  if (localStorage.getItem("curency_id") != 1) {
      total_order = sub_total+get_ship_prices();
    var tota_order__ = total_order * GET_EXCHANGE_(localStorage.getItem("curency_id"));

  $("#ordertotal_span_oorder").text(tota_order__+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
   sub_tola *= GET_EXCHANGE_(localStorage.getItem("curency_id"));
  $("#subtotal_span_order").text(sub_tola+" "+get_curency_name(localStorage.getItem("curency_id")))


  }


  return sub_total;
}

set_text();


$("#sele_islands").change(function(){

  set_text();
  set_sub_toal();
  get_ship_prices();
})

$(".selqty_in_cart").change(function(){
  set_text();
  set_sub_toal();
  get_ship_prices();
})

// PRODUCTS PRICES
if (localStorage.getItem("curency_id") != 1) {
  $(".price_item").each(function(){
    var pri = $(this).data("price") * GET_EXCHANGE_(localStorage.getItem("curency_id"));
  $(".price_item").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
  })


}

/*
if ($("#payme_meth_sel").val() == 1 ) {

  $("#paypal-button-container").show();
  $("#proceedToCheckout_btn_bottom").hide();
}else{
    $("#paypal-button-container").hide();
    $("#proceedToCheckout_btn_bottom").show();

}


$("#paym_met_").change(function(){

  if ($("#paym_met_").val() == 1 ) {

    $("#paypal-button-container").show();
    $("#proceedToCheckout_btn_bottom").hide();

  }else{
      $("#paypal-button-container").hide();
      $("#proceedToCheckout_btn_bottom").show();

  }


})

*/

function initPayPalButton() {
  paypal.Buttons({
    style: {
      shape: 'rect',
      color: 'gold',
      layout: 'vertical',
      label: 'paypal',
    },
    createOrder: function(data, actions) {

      var check_inp = check_inputs_is_empty();
    if (check_inp == 0 ) {
      return actions.order.create({
        purchase_units: [{"amount":{"currency_code":"EUR","value":total_order}}]
      });

    }else{
      check_inputs_is_empty();
    }

    },

    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
      //  alert('Transaction completed by ' + details.payer.name.given_name + '!');
              confirm_order();
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

      $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("failedProgress")+'</div>');


    }
  }).render('#paypal-button-container');
}
initPayPalButton();




function check_inputs_is_empty(){
  var result = 0;
  if($("#sele_islands").val() == "" || $("#sele_islands").val() == null){
    $('html, body').animate({
        scrollTop: $("#result_request").offset().top
    }, 1000);

    $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("chooceOrAddShippinAddress")+'</div>');
      $("#sele_islands").focus();
    setTimeout(function(){
      $("#result_request").fadeOut(2000);
      $('html, body').animate({
          scrollTop: $("#sele_islands").offset().top
      }, 1000);


    },2000);
    result = 1
  }else if($("#inp_adress_deatils").val() == "" || $("#inp_adress_deatils").val() == null){

    $('html, body').animate({
        scrollTop: $("#result_request").offset().top
    }, 1000);

    $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("chooceOrAddShippinAddress")+'</div>');
      $("#inp_adress_deatils").focus();
    setTimeout(function(){
      $("#result_request").fadeOut(2000);
      $('html, body').animate({
          scrollTop: $("#inp_adress_deatils").offset().top
      }, 1000);


    },2000);

        result = 1

  }else if($("#inp_resc_man").val() == "" || $("#inp_resc_man").val() == null){

    $('html, body').animate({
        scrollTop: $("#result_request").offset().top
    }, 1000);

    $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("chooceOrAddShippinAddress")+'</div>');
      $("#inp_resc_man").focus();
    setTimeout(function(){
      $("#result_request").fadeOut(2000);
      $('html, body').animate({
          scrollTop: $("#inp_resc_man").offset().top
      }, 1000);


    },2000);

        result = 1

  }else if($("#paym_met_").val() == "" && $("#paym_met_").val() == null){

    $('html, body').animate({
        scrollTop: $("#result_request").offset().top
    }, 1000);

    $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("chooceOrAddShippinAddress")+'</div>');
      $("#paym_met_").focus();
    setTimeout(function(){
      $("#result_request").fadeOut(2000);
      $('html, body').animate({
          scrollTop: $("#paym_met_").offset().top
      }, 1000);


    },2000);

        result = 1

  }

  else if($("#inpu_phone").val() == "" && $("#inpu_phone").val() == null){

    $('html, body').animate({
        scrollTop: $("#result_request").offset().top
    }, 1000);

    $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("mobileCantEmpty")+'</div>');
      $("#inpu_phone").focus();
    setTimeout(function(){
      $("#result_request").fadeOut(2000);
      $('html, body').animate({
          scrollTop: $("#inpu_phone").offset().top
      }, 1000);


    },2000);

        result = 1

  }





  return result;
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


function confirm_order(){
  var products = JSON.stringify(count_product());
  var client_id = $("#customerid").val();
  $.ajax({
    dataType:"json",
    async:false,
    url:"incart__db.php",
    method:"post",
    data:{
   confirm_order:"confirm_order",product_ids:products,client_id:client_id,order_address:$("#inp_adress_deatils").val(),promocode:promocode,
   recep_name:$("#inp_resc_man").val(),payment_method:$("#paym_met_").val(),currecny:localStorage.getItem("curency_id"),place_shi_id:$("#place_shi___").val(),
   place_shi_id:$("#sele_islands").val(),phone:$("#inpu_phone").val()
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

      $('html, body').animate({
          scrollTop: $("#result_request").offset().top
      }, 1000);

      $("#result_request").html('<div class="alert alert-danger text-center" role="alert">'+mylang("failedProgress")+'</div>');

    }
  })
}

function count_product(){
  var array_prducts = new Array();
  $(".select_prod_qty").each(function(){
    var obj = {id:$(this).data("sel_"),qty:$(this).val(),sellerid:$(this).data("seller")};
    array_prducts.push(obj);


  })

  return array_prducts;
}
count_product();

function calcul_price_total(){
total_shipping_price = 0;
$(".total_pr").each(function(){
ship_price_bu_place($(this).data("product__id"));


})

}


function ship_price_bu_place(product_id){
var ship_prc_by_palce = 0;
  $.ajax({
    url:"setdata.php",
    method:"post",
    async:false,
    data:{get_all_payment_me:"get_all_payment_me",product_id,place_shi:$("#sele_islands").val()},
    success:function(dta){
      $(".div_payment_method").html(dta);
      if ($("#place_shi___").val() == 1) {
    //    ship_prc_by_palce += ship_price_ngazidja;
        set_texts();
      }else if($("#place_shi___").val() ==2){
    //    ship_prc_by_palce += ship_price_ndzuwani;
        set_texts();
      }else if($("#place_shi___").val() == 3){
      //  ship_prc_by_palce += ship_price_mwali;
        set_texts();
      }else if($("#place_shi___").val() == 4){
  //      ship_prc_by_palce += ship_price_france;
        set_texts();
      }
}
})
return ship_prc_by_palce;
}


get_ship_prices();
function get_ship_prices(){
 ship_prc_by_palce = 0;

$(".select_prod_qty").each(function(){
  var qty  =  $(this).val();
  $.ajax({
    dataType:"json",
    url:"incart__db.php",
    method:"post",
    async:false,
    data:{GET_SHPI_PRICE:"GET_SHPI_PRICE",product_id:$(this).data("product__id")},
    success:function(dta){


      for (var i = 0; i < dta.length; i++) {
      if($("#sele_islands").val() == 1){
     ship_prc_by_palce += parseInt(calcul_sub_ship_price(dta[i].Fixed_shipping_price_Ngazidja,dta[i].ship_ngazidja_price,qty));
   }
   else if($("#sele_islands").val() == 2){
   ship_prc_by_palce += parseInt(calcul_sub_ship_price(dta[i].Fixed_shipping_price_Ndzuwani,dta[i].ship_ndzouwani,qty));
 }else if($("#sele_islands").val() == 3){
   ship_prc_by_palce += parseInt(calcul_sub_ship_price(dta[i].Fixed_shipping_price_Mwali,dta[i].ship_mwali,qty));

 }else if($("#sele_islands").val() == 4){
   ship_prc_by_palce += parseInt(calcul_sub_ship_price(dta[i].Fixed_shipping_price_France,dta[i].ship_france,qty));

 }
      }

$(".shipping_span_order").text(ship_prc_by_palce);
if (localStorage.getItem("curency_id") != 1) {
  var  toat_ship_pr = (ship_prc_by_palce * GET_EXCHANGE_(localStorage.getItem("curency_id")));
$(".shipping_span_order").text(toat_ship_pr+" "+get_curency_name(localStorage.getItem("curency_id"))) ;

}
    }


})

})

return ship_prc_by_palce;
}


function calcul_sub_ship_price(fixed_ship_price,ship_price,qty){
 var sub_total = 0;
  if (fixed_ship_price  == 1 ) {
  sub_total = ship_price;
}else{
  sub_total = ship_price*qty;
}
return sub_total;
}
remove_items_by_place_shipping();
function remove_items_by_place_shipping(){
  $(".div_col______").each(function(){
    var place_ship = $("#sele_islands").val();
    if( place_ship == 1 &&$(this).data("ship_ngazidja") !=1 ){
       $(this).remove();
    }else if(place_ship == 2 &&$(this).data("ship_ndzouwani") !=1 ){
    $(this).remove();
    }
    else if(place_ship == 3 &&$(this).data("ship_mwali") !=1 ){
    $(this).remove();
    }
    else if(place_ship == 4 &&$(this).data("ship_france") !=1 ){
    $(this).remove();
    }
  })

  get_ship_prices();
  set_sub_toal();
  set_text();
  calcul_sub_total();




}



$("#sele_islands").change(function(){
  get_product_in_cart();
remove_items_by_place_shipping();

})

get_product_in_cart();
function get_product_in_cart(){
  $.ajax({
    url:"incart__db.php",
    method:"post",
    async:false,
    data:{
      get_all_products_in_cart:"get_all_products_in_cart",ship_place_id:$("#sele_islands").val(),CLIENT_ID:$("#customerid").val()
    },
    success:function(data){
      $(".div_prd_in_c").html(data);
      if (localStorage.getItem("curency_id") != 1) {
        $(".price_item").each(function(){
          var pri = $(this).data("price") * GET_EXCHANGE_(localStorage.getItem("curency_id"));
        $(".price_item").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
        })


      }
    }
  })
}

$(".select_prod_qty").change(function(){
  get_ship_prices();
  set_sub_toal();
  set_text();
  calcul_sub_total();
})


$(".fa_remove_item").click(function(){
  $.ajax({
    url:"incart__db.php",
    method:"post",
    async:false,
    data:{
      remove_item_from_incart:"remove_item_from_incart",product_id:$(this).data("product_id"),CLIENT_ID:$("#customerid").val()
    },
    success:function(data){

         get_product_in_cart()
         get_ship_prices();
         set_sub_toal();
         set_text();
         calcul_sub_total();
    },error:function(error){

    }
  })
})



$("#paym_met_").change(function(){
  if($(this).val() == 1){
    $("#paypal-button-container").show();
    $("#proceedToCheckout_btn_bottom").hide();
  }else{
    $("#paypal-button-container").hide();
    $("#proceedToCheckout_btn_bottom").show();
  }
})

if($("#paym_met_").val() == 1){
  $("#paypal-button-container").show();
  $("#proceedToCheckout_btn_bottom").hide();
}else{
  $("#paypal-button-container").hide();
  $("#proceedToCheckout_btn_bottom").show();
}


$("#proceedToCheckout_btn_bottom").click(function(){

  if(check_inputs_is_empty() == 0){
    confirm_order();
  }else{
    check_inputs_is_empty();
  }

})
})
