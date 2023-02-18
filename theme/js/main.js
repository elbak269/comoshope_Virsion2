


$(document).ready(function(){

var curency_id = $("#currency_selec").val();

var resul_arra = new Array();
var rs = localStorage.getItem("incart");
var str = new Array();
if (rs != null) {
  str = rs.split(",");
}

  //$("#counter_id").text(str.length);

//  $("#currencyitem select").val("2");


 var width = window.innerWidth
$(window).on('resize', function() {
  if ($(this).width() != width) {
   location.reload();
  }
}); // END RELOAD PAGE AFTER RESIZE SCREEN

if(curency_id != null){
  localStorage.setItem("curency_id", curency_id);
}

$("#btn_sub_mt").click(function(){
localStorage.setItem("curency_id", curency_id);
})

$(function() {
    $("#currencyitem").val(localStorage.getItem("curency_id"));
});
                                                 //  START NAVBAR
$(".mynavabar .navbar-dark .navbar-nav .nav-link").click( function (){
  var catid= $(this).data("catid");
  $.ajax({
    url:"navcat.php",
    method:"POST",
    data:{cateid:catid},
    datatype:"text",
    success:function(html){
      $(".dro").html(html);
    }
  });


})
                                                //END NAVBAR

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

                                    // LOGIN
$(".login h1 span").click(function(){
$(this).addClass("active").siblings().removeClass("active");
$(".login form").hide();
$("."+$(this).data("class")).fadeIn();

})

                                                                     // TAGS

//  LOADE CSS 3 SPINNER
$(window).on('load', function(){
  $(".loading_section").fadeOut(1000,function(){
    $("body").css("overflow","auto");
  });
});

// wrapper slider
/*
  $(".slider_center").slick({
    dots: true,
    infinite: true,
    centerMode: true,
    slidesToShow: itemslide,
    slidesToScroll: itemslide
  });
*/


// RECIZE SLIDER
var slide_value = 5;
var page_width = window.innerWidth;
resize ();
if( window.innerWidth !=page_width){
resize ();
window.reload();
}

function resize (){
  if(window.innerWidth<416){

    slide_value  = 1.12;
  }else if(window.innerWidth > 416 && window.innerWidth < 765){
    slide_value  = 2;

  }
  else if(window.innerWidth > 765 && window.innerWidth  < 1200){
    slide_value  = 3;
  }else if(screen.width > 1200){
    slide_value  = 5;
  }
}// END  RECIZE SLIDER


$(".slider_center").slick({
  dots: true,
  infinite: false,
  centerMode: false,
  slidesToShow: slide_value,
  slidesToScroll: slide_value

});

var div__is_sjown = 1;
$(".dra__img_nav").click(function(){
  $(".dor_down_con___").show();
  div__is_sjown = 0;
})

$(document).on('click', function (event) {
  if (!$(event.target).closest('.drow_div_navb').length) {
    $(".dor_down_con___").hide();
  }
});
/*
$("body").click(function(){
  if(div__is_sjown == 0){
  $(".dor_down_con___").hide();
    div__is_sjown = 0;
}
}) */

$(".img_veri_sale").click(function(){
  $(".verfi_eid__dailog").css("display","flex");

});

$(document).on('click', function (event) {
  if (!$(event.target).closest('.isd_verfi_eid__dailog').length && !$(event.target).closest('.img_veri_sale').length  ) {
    $(".verfi_eid__dailog").css("display","none");
  }
});


$("._best_saler_starts").click(function(){
  $(".starts_eid__dailog").css("display","flex");
});

$(document).on('click', function (event) {
  if (!$(event.target).closest('.isd_satars_eid__dailog').length && !$(event.target).closest('._best_saler_starts').length  ) {
    $(".starts_eid__dailog").css("display","none");
  }
});


if(window.innerWidth < 992){
  //$(".for_mm_").appendTo
  $(".mynavabar  .for_mm_").remove();
}
/*
$('#tags').tokenfield({
 autocomplete:{
  source: ['PHP','Codeigniter','HTML','JQuery','Javascript','CSS','Laravel','CakePHP','Symfony','Yii 2','Phalcon','Zend','Slim','FuelPHP','PHPixie','Mysql'],
  delay:100
 },
 showAutocompleteOnFocus: true
});
*/


// FOR IN CART

function set_text_cart_icon(data){
  $("#counter_id").text(data);

}


/*
function add_in_cart(data){
  var array_data = new Array();
  if (localStorage.getItem("incart") != null) {
    var data_local =  localStorage.getItem("incart");
    array_data.push(data_local);
    array_data.push(data);
    localStorage.setItem("incart",array_data);
  }else{
    array_data.push(data);
    localStorage.setItem("incart",array_data);

  }

  var resul_arra = new Array();
  var rs = localStorage.getItem("incart");
  var str = rs.split(",");
  resul_arra.push(str);
  set_text_cart_icon(str.length);

} */
//set_counter();

$("#add_btn_cart").click(function(){
  var prou_id = $(this).data("product");
  //add_in_cart(prou_id);

  add_product_in_cart_in_db(prou_id,1);
  COUNT_PRODUCT_IN_CART();

});


$(".div_car_dot").click(function(){
  window.location.href = "incart.php";

})




function add_product_in_cart_in_db(product_id,qtt){
  $.ajax({
    url:"incart__db.php",
    method:"post",
    async:false,
    data:{
      isset_insert_incart:"isset_insert_incart",product_id:product_id,qtt:qtt
    },
    success:function(succ){
    },
    error:function(error){
    }
  })
}



function get_prdct_in_cart_db(){
  $.ajax({
    dataType:"json",
    url:"incart__db.php",
    method:"post",
    async:false,
    data:{
      get_prdct_in_cart_fb:"get_prdct_in_cart_fb"
    },
    success:function(succ){

      var num_in_cart = 0;
     for (var i = 0; i < succ.length; i++) {
      num_in_cart += succ[i].QTY;
     }

    },
    error:function(error){

    }
  })
}

get_prdct_in_cart_db();



function COUNT_PRODUCT_IN_CART(){
  $.ajax({
    dataType:"json",
    url:"incart__db.php",
    method:"post",
    async:false,
    data:{
      COUNT_PRODUCT_IN_CART:"COUNT_PRODUCT_IN_CART"
    },
    success:function(succ){
 $("#counter_id").text(succ)
    },
    error:function(error){
    }
  })
}
COUNT_PRODUCT_IN_CART();


});

$("#search_input , .search_input_for_m").on('keyup',function(e) {
    var code = e.keyCode || e.which;
    if(code==13){
      $("#btn_searc").trigger("click");
    }
});




$(window).on('load', function(){

  $(".div_loader").fadeOut();
  $("body").css("overflow","auto");
});
