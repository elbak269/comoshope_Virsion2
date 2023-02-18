$(document).ready(function(){



  if($("#_INPU_HIDEN_WORD").val() != ""){
    $("#search_input").val($("#_INPU_HIDEN_WORD").val());
  }

if($("#place_select").val() == "ngazidja"){
  $("#ngazidja_chke").attr('checked','checked');
}else if($("#place_select").val() == "ndzuwani"){
  $("#ndzuwani_chke").attr('checked','checked');
}
else if($("#place_select").val() == "mwali"){
  $("#mwali_chke").attr('checked','checked');
}
else if($("#place_select").val() == "france"){
  $("#france_chke").attr('checked','checked');
}


var  get_prod_searc = "GET_PRODUCTS_SEARC";
var  chengazidja = "1";
var  checknduwani = "8";
var  checkmwali = "8";
var  checkfrance = "8";
var cookiies_curency_vale = $("#currency_selec").val();
var check_cateds = [];
var check_brandss = [];
var max_range_price = 1000000000;
var min_range_price = 1;
var products_name_array = [];
check_first_load();
var curency = $("#currency_selec").val();


var img_url = $("#_img_url").val();
var word_for_search = $("#search_input").val();
if($("#search_input").val() == ""){
  word_for_search = "son";
}

var word_sear_cate = $("#search_input").val();
if($("#search_input").val() == ""){
  word_sear_cate = "Telephone";
}
set_category(word_sear_cate);

var word_searc = $("#search_input").val();
if($("#search_input").val() == ""){
  word_searc = "phone";
}

set_brands(word_searc);
get_prodts();




function get_prodts(){
  if(check_brandss.length < 1){
    check_brandss = 0;
  }

  if(check_cateds.length < 1){
    check_cateds = 0;
  }

  show_load();


  $.ajax({
    dataType:"json",
    url:"get_data_for_search.php",
    method:"post",
    data:{get_prod_searc:get_prod_searc,ngazidja:chengazidja,ndzuwani:checknduwani,mwali:checkmwali,france:checkfrance,word:word_for_search,bards_id:check_brandss,categories_id:check_cateds,curency:localStorage.getItem("curency_id"),max_range_price:max_range_price,
    min_range_price:min_range_price},
    success:function(data){

    var div_prustc = "";
    for (var i = 0; i < data.length; i++) {
     div_prustc         += '<div class="prodcuts_coentid col-sm-12 col-md-6 col-lg-3">';
     div_prustc         += '<div class="prdu_div_sub">';
     div_prustc         += '<a href = "item.php?item='+data[i].productid+'">';
     div_prustc         += '<div class="img_prod_div">';
     div_prustc         += '<img src="'+img_url+data[i].pic+'" class="img-thumbnail pic_self"  alt="">';
     div_prustc         += '</div>';

     div_prustc         += '<div class="product_info" >';
     div_prustc         += '<p class="cls_prod_name text-center"> '+data[i].name+' </p> ';


     div_prustc         += '<p class="text-center">';
     if(localStorage.getItem("curency_id") == data[i].CurrencyID ){
        div_prustc      += '<span>'+data[i].price+' '+get_curency_name(localStorage.getItem("curency_id"))+'</span>';
     } else{
       var tol_price = data[i].price;
        div_prustc     +=  tol_price+' '+get_curency_name(localStorage.getItem("curency_id"));
     }
        div_prustc     += '</p>';
        if(data[i].Verificated == "true"){
        div_prustc    +=  '<div class="div_img_ver text-center">';
        div_prustc    +=  '<img class="img_veri_sale"  class="img_veri" src="theme/image/verified.png" alt="">';
        div_prustc    +=  '</div>';
        }
        if(data[i].Verificated == "true"){
        div_prustc    +=  '<div class="_start text-center">';
        div_prustc    +=  ' <span class="fa fa-star checked _best_saler_starts"></span>';
        div_prustc    +=  ' <span class="fa fa-star checked _best_saler_starts"></span>';
        div_prustc    +=  ' <span class="fa fa-star checked _best_saler_starts"></span>';
        div_prustc    +=  ' <span class="fa fa-star checked _best_saler_starts"></span>';
        div_prustc    +=  ' <span class="fa fa-star checked _best_saler_starts"></span>';
        div_prustc    +=  '</div>';
        }
      /*  div_prustc    +=  '<p class="text-center"> <span>' +mylang("shippingMethod")+'</span> <span> : '+data[i].shippingname+'</span>  </p> '; */


     div_prustc      += '</div>';

    div_prustc       += "</a>"
    div_prustc      += '</div>';
     div_prustc     += '</div>';

    }

      $("._random_all_products").empty();
    $("._random_all_products").append(div_prustc);


  hide_load();

  },
  error:function(erro){
  hide_load();
  }
  });
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

 // GET CURRENCY NAME
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



function set_category(word){
  var get_cate_go  ="get_cate_go";
$.ajax({
  dataType: "json",
  async:false,
  url:"get_data_for_search.php",
  method:"POST",
  data:{get_cate_go:get_cate_go,word:word},
  success:function(data){
    var elem ="";
    var cat_cla = "cat_";
  for (var i = 0; i < data.length; i++) {
  elem +=  '<div class="form-check">';
  elem +=  '<input type="checkbox" data-cat_id="'+data[i].catid+'" class="form-check-input check_cates"  id="'+cat_cla+data[i].catid+'">';
  elem +=  ' <label class="form-check-label" for="'+cat_cla+data[i].catid+'">'+ " "+data[i].catname+'</label>';
  elem +=  ' </div>';

  }
  $("#sid_cat > div").empty();
  $("#sid_cat").append(elem);
  }

})
}


function set_brands(word){
  var get_brand_go  ="get_brand_go";
  var catids = get_checked_category();

$.ajax({
  dataType: "json",
  async:false,
  url:"get_data_for_search.php",
  method:"POST",
  data:{get_brand_go:get_brand_go,word:word,cateid:catids},
  success:function(data){
  var elem ="";
  var bar_cl  = "bran_";

  for (var i = 0; i < data.length; i++) {
    elem +=  '<div class="form-check">';
    elem +=  '<input type="checkbox" data-bard_id="'+data[i].brandid+'" class="form-check-input check_barnds"  id="'+bar_cl+data[i].brandid+'">';
    elem +=  ' <label class="form-check-label" for="'+bar_cl+data[i].brandid+'">'+ " "+data[i].brandname+'</label>';
    elem +=  ' </div>';
}
$("#sid_brand > div").empty();
  $("#sid_brand").append(elem);

}

})
}

function get_checked_category(){
check_cateds = [];
  $(".check_cates:checked").each(function(){
    check_cateds.push($(this).data("cat_id"));
  });

  return check_cateds;
}

function get_checked_brand(){
check_brandss = [];
  $(".check_barnds:checked").each(function(){
    check_brandss.push($(this).data("bard_id"));
  });

  return check_brandss;
}



 // LANGUE
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

var mx = 1000000;
var mn = 1;
var ste = 1;
var mycur = "EUR";
if(curency == "1"){
  mx = 900000;
  mn = 1;
  ste = 1;
  mycur = "EUR";
}else if(curency == "2"){
  mx = 1000000000;
  mn = 1;
  ste = 500;
   mycur = "KMF";
}


$("#_prici_silder_div").slider({
  range:true,
  min:mn,
  max:mx,
  values:[mn,mx],
  step:ste,
  stop:function(event,ui){

  $("#ran__price__P").html(ui.values[0] +" "+mycur+ " - "+ui.values[1] + " "+mycur);

  max_range_price = ui.values[1];
  min_range_price = ui.values[0];
  get_prodts();

  }
})



$(".check_cates ").change(function(){
  var word_searc = $("#search_input").val();
  if($("#search_input").val() == ""){
    word_searc = "phone";
  }
//get_checked_category($("#search_input").val());
set_brands(word_searc)
get_prodts();
$(".check_barnds").change(function(){
  var word_searc = $("#search_input").val();
  if($("#search_input").val() == ""){
    word_searc = "phone";
  }


get_prodts();
});
});



$(".check_barnds").change(function(){
  alert("yes");
  var word_searc = $("#search_input").val();
  if($("#search_input").val() == ""){
    word_searc = "phone";
  }



});




$(".check_box_place__").change(function(){
  if($("#france_chke").is(":checked")){
    checkfrance = 1;
  }else{
    checkfrance = 8;
  }

  if($("#mwali_chke").is(":checked")){
    checkmwali = 1;
  }else{
    checkmwali = 8;
  }

  if($("#ndzuwani_chke").is(":checked")){
    checknduwani = 1;
  }else{
    checknduwani = 8;
  }

  if($("#ngazidja_chke").is(":checked")){
    chengazidja = 1;
  }else{
    chengazidja = 8;
  }

 get_prodts();
})


$("#fa_cate_").click(function(){
  if($("#sid_cat").data("status_cat_div")=="1"){
    $("#sid_cat").hide(1000);
    $("#sid_cat").data("status_cat_div",0);
  }else{
    $("#sid_cat").show(1000);
    $("#sid_cat").data("status_cat_div",1);
  }

});

$("#fa_place_de_").click(function(){
  if($("#di_pla_sh").data("status_plac_de_div")=="1"){
    $(".div_chek_bo_x").hide(1000);
    $("#di_pla_sh").data("status_plac_de_div",0);
  }else{
    $(".div_chek_bo_x").show(1000);
    $("#di_pla_sh").data("status_plac_de_div",1);
  }

})



$("#fa_brand").click(function(){
  if($("#sid_brand").data("status_bran_div")=="1"){
    $("#sid_brand").hide(1000);
    $("#sid_brand").data("status_bran_div",0);
  }else{
    $("#sid_brand").show(1000);
    $("#sid_brand").data("status_bran_div",1);
  }

})


//

$("#img_filter").click(function(){
  //window.location.hash = ".all_div_sdi_bar";
  $('html, body').animate({ scrollTop: $('.all_div_sdi_bar').offset().top }, 'slow');
  $(".all_div_sdi_bar").appendTo("._filter_for_mobole_div");
  $(".all_div_sdi_bar").css("display","block");
    $("._filter_for_mobole_div").show(500);
  $(".cont").css('opacity', '0.1');

 $(this).hide();
})

$("#btn_aply_fil").click(function(){
  $(".cont").css('opacity', '1');
$("._filter_for_mobole_div").hide(500);
 $("#img_filter").show();

})



$("#search_input").click(function(){
  var get_all_products_names_and_tags = "get_all_products_names_and_tags";
$.ajax({
  dataType:"json",
  url:"get_data_for_search.php",
  method:"POST",

  data:{get_all_products_names_and_tags:get_all_products_names_and_tags},
  success:function(data){
for (var i = 0; i < data.length; i++) {
  products_name_array.push(data[i]);
}

  }
})
})


$("#search_input").keyup(function(){

  for (var i = 0; i < products_name_array.length; i++) {
    if (products_name_array[i].icludes) {

    }
  }

})




function check_first_load(){
  if($("#france_chke").is(":checked")){
    checkfrance = 1;
  }else{
    checkfrance = 8;
  }

  if($("#mwali_chke").is(":checked")){
    checkmwali = 1;
  }else{
    checkmwali = 8;
  }

  if($("#ndzuwani_chke").is(":checked")){
    checknduwani = 1;
  }else{
    checknduwani = 8;
  }

  if($("#ngazidja_chke").is(":checked")){
    chengazidja = 1;
  }else{
    chengazidja = 8;
  }

}


})


function show_load(){
  $(".div_loader").fadeIn();
  $("body").css("overflow","hiden");
}

function hide_load(){
  $(".div_loader").fadeOut();
  $("body").css("overflow","auto");
}
