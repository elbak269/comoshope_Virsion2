
$(document).ready(function(){
var saller = $("#saler__inp").val();
// RECIZE SLIDER
var src_img = "theme/image/";
var slide_value = 5;
var page_width = window.innerWidth;
var prod_id_for_del = null;
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


$(".nav-link").click(function () {
var id = $(this).attr("id");

localStorage.setItem("selectedolditem", id);
});

var selectedolditem = localStorage.getItem('selectedolditem');

if (selectedolditem != null) {
$('#' + selectedolditem).siblings().find(".active").removeClass("active");
//                                        ^ you forgot this
$('#' + selectedolditem).addClass("active");
}


var curency = localStorage.getItem("curency_id");
$.ajax({
  dataType:"json",
  url:"show_products_for_edit.php",
  method:"post",
  data:{curencyid:curency,sellerid:saller
},
success:function(data){
set_data();
function set_data(){
var stars = "";

for (var i = 0; i < 5; i++) {
  stars += '<span class="fa fa-star checked"></span>';
}
  var content =  "<div class='row'>";
  for (var i = 0; i < data.item.length; i++) {

    var color = "";
    if(data.item[i].color != null){
      color =data.item[i].color;
    }

    content += "<div class='col-sm-12 col-md-6 col-lg-4'>";

    content += "<div class = 'cont_pr__ text-center'>";

    content += "<div class='div_fro_img'>";
    content += "<img   src='"+src_img+'uploade_img/'+data.item[i].pic1+"' >"
    content += "</div>";

    content += "<p>"+data.item[i].name+color+"</p>"
    content += "<p>"+data.item[i].price+' '+ data.item[i].currency_name+"</p>";

    content += "<div>";
    content += stars;
    content += "</div>";

    content += "<div>";
    content += "<img class='verfica_img' src='"+src_img+'verified.png'+"' >"
    content += "</div>";

    content += "<div>";
    content += "<a  data-pr_id='"+data.item[i].id+"' href='edit_product.php?edit_product=1&product_id="+data.item[i].id+"' class='btn btn-primary btn_edit_prod '>"+mylang("edit")+"</a>";
    content += "</div>";

    content += "<div>";
    content += "<button  data-pr_id__='"+data.item[i].id+"'  class='btn btn-danger btn_delete_prod '>"+mylang("delete")+"</button>";
    content += "</div>";



    content += "</div>";

    content += "</div>";
  }
  content +=  "</div";

  $("#my_prod_cont").append(content);
}


//  console.log(data);
var product_id = null;
$(".btn_delete_prod").click(function(){
  var product_name  = "product_name";
   product_id    = $(this).data("pr_id__");
  $.ajax({
    dataType:"json",
    url:"delete_product.php",
    method:"post",
    data:{product_name:product_name,product_id:product_id},
    success:function(data){
      $(".cont").css("opacity",".2");
      $(".alert_delte_prod_div").css("display","flex");
      $("#sure_delet_pr").append(data.result + " ?");
      $('html, body').animate({
          scrollTop: $(".alert_delte_prod_div").offset().top
      }, 1000);
    },
    error:function(ere){
      console.log(ere);
    }
  })

})

$("#btn_deny_dlete").click(function(){
  $(".cont").css("opacity","1");
  $(".alert_delte_prod_div").css("display","none");

  $('html, body').animate({
      scrollTop: $("#my_prod_cont").offset().top
  }, 1000);

});


$("#btn_confr_dlete").click(function(){
  $.ajax({
    url:"delete_product.php",
    method:"post",
    data:{remove:"remove",product_id:product_id,seller__:saller},
    success:function(dta){
      if (dta == 1) {

        $(".cont").css("opacity","1");
        $(".alert_delte_prod_div").css("display","none");
        $(".div_info__dle").show();
        $(".div_info__dle").append("<strong>"+mylang("successfulPreogress")+"</strong>");
        $('html, body').animate({
             scrollTop: $(".div_info__dle").offset().top
         }, 1000);

         setTimeout(function(){
           location.reload();
         },3000)

      }
    }
  })
})


},error:function(er){
  console.log(er);
}
})






$(".slider_center").slick({
  dots: true,
  infinite: false,
  centerMode: false,
  slidesToShow: slide_value,
  slidesToScroll: slide_value

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

if(window.location.href.indexOf("myproducts") > -1){
  $('html, body').animate({
       scrollTop: $("#my_prod_cont").offset().top
   }, 1000);
}



if(window.location.href.indexOf("?orders=waitingaction_1") > -1){
  $('html, body').animate({
       scrollTop: $(".not_aproved_order__").offset().top
   }, 1000);

}

if(window.location.href.indexOf("orders=on_way_orders") > -1){
  $('html, body').animate({
       scrollTop: $(".on_way_orders").offset().top
   }, 1000);

}

if(window.location.href.indexOf("orders=completeorder") > -1){
  $('html, body').animate({
       scrollTop: $(".completes_orders__").offset().top
   }, 1000);

}

if(window.location.href.indexOf("?orders=returnedOrder") > -1){
  $('html, body').animate({
       scrollTop: $(".asked_returned_orders__").offset().top
   }, 1000);

}
/*
$("#id_order_dah").click(function(){

  $('html, body').animate({
       scrollTop: $(".count_orde_div_").offset().top
   }, 1000);

}) */



})
