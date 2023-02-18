$(document).ready(function(){
  $("#readm").click(function (){
    $(".readm").hide();
    $("#more_infon").show();
  })

  $("#redLess").click(function (){

    $("#more_infon").hide();
    $(".readm").show();
  })

  // count price


$("#quantity_select").change(function(){
 var nomberofitem = $(this).children("option:selected").val();
 var item_Price  = $("#ID_Pri").val();
 var Item_iD = $("#item_ID").val();
localStorage.setItem("ItemId",Item_iD);
localStorage.setItem("nombreofitems",nomberofitem);
localStorage.setItem("item_price",item_Price);

$("#id_price").text(item_Price*nomberofitem);


})

// img slider
$(".img_div_child img").click(function(){
$(".img_active").removeClass("img_active");
$(this).addClass("img_active");
$(".master_img").attr("src",$(this).attr("src"))
});



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

if (localStorage.getItem("curency_id") != $("#cureny_id").val()) {
  var pri = $("#_pr_price").val() * GET_EXCHANGE_(localStorage.getItem("curency_id"));
$(".price_apan").text(pri+" "+get_curency_name(localStorage.getItem("curency_id"))) ;
}






})
