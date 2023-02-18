$(document).ready(function(){



var  chengazidja = "8";
var  checknduwani = "8";
var  checkmwali = "8";
var  checkfrance = "8";
var  lang;
var cartego_array  = [];
var bardnds_id_array  = [];
cartego_array.push($("#category_").val());
var orgin_pace = $("#place_orgina").val();

var curency_orgin = $("#currency_selec").val();

var cookiies_curency_vale = $("#currency_selec").val();



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

filter_data();
})

var plasce_ship = $("#place_select").val();
$.ajax({
dataType: "json",
url:"admin/includes/languages/english.php",
method:"GET",
data:{lang:"yes"},
success:function(data){
  lang = data;
}
})




  var x = $(".pic").css("width");
  $(".pic").css("height",x);

  var width = $(window).width();
  $(window).on('resize', function() {
    var x = $(".pic").css("width");
    $(".pic").css("height",x);
  });

//

filter_data();
function filter_data()
{

  show_load();
    var div_price = document.getElementById('data-price_div');
    var category_ids = $("#category_").val();
    /*var pric_def = get_filter('default_price');
    var ratings =  get_filter('rating_classin');
    var brand_ids = get_filter('brand_classin'); */
    var categorypages = " ";


    var act = "action";
    $.ajax({
      dataType:"json",
      url:"showitems.php",
      method:"POST",
      data:{action:act,category_page:categorypages,brand:bardnds_id_array,category:cartego_array,chengazidja:chengazidja,checknduwani:checknduwani
      ,checkmwali:checkmwali,checkfrance:checkfrance,orgin_pace:orgin_pace,curency_orgin:curency_orgin,curency:localStorage.getItem("curency_id")},
      success:function(data){
        let datax = data;
        var content = "";
        var x;

        for( x=0; x < datax.item.length; x++){
          content += "<div class='col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-ite text-center'>";
          content += '<a href="item.php?item='+datax.item[x].id+' ">';
          content += "<div class='item_border'>";
          content += "<img src = 'theme/image/uploade_img/"+datax.item[x].pic1+"' class='pic' >";
          content += "<p>"+datax.item[x].name+"</p>";


            content += "<p>"+datax.item[x].price+" <span>"+get_curency_name(localStorage.getItem("curency_id"))+"<span>"+"</p>";

        //  content += "<p>"+datax.item[x].price+" <span>"+datax.item[x].currency+"<span>"+"</p>";

           content+= '<div class=" rating_star "><span class="fa fa-star checked_f"></span><span class="fa fa-star checked_f "></span><span class="fa fa-star checked_f"></span><span class="fa fa-star checked_f"></span><span class="fa fa-star checked_f"></span></div>';

      //   content+= "<p id='ship_methodd'>"+lang.shippingMethod+"<span class='float-right'>"+datax.item[x].shippingname+"</span></p>"

          content +="</div>";
          content +="</a>";
          content +="</div>";
        }

        document.getElementById("item_content").innerHTML= content;
        var x = $(".item_border").css("width");
        $(".pic").css("height",x);

        var width = $(window).width();
        $(window).on('resize', function() {
          var x = $(".pic").css("width");
          $(".pic").css("height",x);
        });

          hide_load();

      },
      error:function(erro){
hide_load();

      }
    })


}
/*
  function get_filter(class_name)
  {
      var filter = [];
      $('.'+class_name+':checked').each(function(){
          filter.push($(this).val());
      });
      return filter;
  }*/
/*
  $('.common_selector').click(function(){
      filter_data();
  });*/

// filter_for _mobile
/*
$("#filter_of_mobile").click(function(){

  $(".side_bar_categ").fadeToggle();
  $(".side_bar_pric").fadeToggle();
  $(".side_bar_ratin").fadeToggle();

})*/


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
 filter_data();
})

set_place_check();
function set_place_check(){
  if(plasce_ship=="ngazidja"){
    $("#ngazidja_chke").prop('checked', true);
  }else if(plasce_ship=="ndzuwani" ){
      $("#ndzuwani_chke").prop('checked', true);
  }
  else if(plasce_ship=="mwali" ){
      $("#mwali_chke").prop('checked', true);
  }
  else if(plasce_ship=="france" ){
      $("#france_chke").prop('checked', true);
  }
}



$("#img_filter").click(function(){
  //window.location.hash = ".all_div_sdi_bar";
  $('html, body').animate({ scrollTop: $('.div_place_top').offset().top }, 'slow');
  $(".sid_bar").appendTo("._filter_for_mobole_div");
  $(".sid_bar").css("display","block");
    $("._filter_for_mobole_div").show(500);
  $(".cont").css('opacity', '0.1');

 $(this).hide();
})

$("#btn_aply_fil").click(function(){
  $(".cont").css('opacity', '1');
$("._filter_for_mobole_div").hide(500);
 $("#img_filter").show();

})


$(".brand_classin").change(function(){
  bardnds_id_array = [];
$(".brand_classin").each(function(){
  if($(this).is(":checked")){
    console.log(bardnds_id_array);
    bardnds_id_array.push($(this).data("brad_id_va"));
    filter_data();
  }
})


})

check_first_load();
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

 filter_data();

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
})


function show_load(){
  $(".div_loader").fadeIn();
  $("body").css("overflow","hiden");
}

function hide_load(){
  $(".div_loader").fadeOut();
  $("body").css("overflow","auto");
}
