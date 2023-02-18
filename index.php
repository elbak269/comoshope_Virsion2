<?php

session_start();
$pageTitle = "Comoshope";




if(isset($_COOKIE["ship_pale"]) && isset($_COOKIE["curency"])){
  $index_css ="";
  $index_js = "";
  $set_footer ="";
include("init.php"); // include init.php
?>



<div class="cont">

  <div class="div_for_searc">
    <form autocomplete="off" class="form-inline my-2 my-lg-0 ml-auto for_mm_" action="searchproducts.php" method="post">

      <div class="autocomplete"  >
  <input id="search_input" class="form-control mr-sm-2 search_input_for_m" type="text" name="searc_word" placeholder="<?php echo lang("search"); ?>">

  </div>
  <button id="btn_searc" type="submit" class="btn btn-primary " name="button"> <i class="fa fa-search"></i><?php echo lang("search"); ?></button>

    </form>
  </div>


<div class="slider">
  <!--
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" height="250" src="theme/image/1.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" height="250" src="theme/image/2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" height="250" src="theme/image/3.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</div>
-->
<div class="s_slider_div">
    <h4 class="text-center"><?PHP echo lang("best_prducts"); ?></h4>
  <section class="slider_center text-center">

    <?php

$get_bes_prdo ;
if($_COOKIE["ship_pale"] == "ngazidja"){
  $get_bes_prdo = get_best_products(1);
}else if($_COOKIE["ship_pale"] == "ndzuwani"){
  $get_bes_prdo = get_best_products(5,1);
}else if($_COOKIE["ship_pale"] == "mwali"){
  $get_bes_prdo = get_best_products(5,5,1);
}else if($_COOKIE["ship_pale"] == "france"){
$get_bes_prdo = get_best_products(5,5,5,1);
}else{

}
if($get_bes_prdo != 0){

   foreach($get_bes_prdo AS $value ){
   ?>

   <?php ?>
  <div class="col-img  supper_div_link_div div_wattingorder swiper-slide ">
      <div data-item="<?php echo $value['ItemID']; ?> " class="supper_div_im1   ">
  <!--  <a href="item.php?item=" class="div_li">  -->
    <div class="div_img_item_1">
      <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self" alt="">
    </div>
    <div class="name_of_item ">
      <p> <?php ?> <span> <?PHP echo $value['Name'];?> </span></p>
      <p><?php
      if ($value["CurrencyID"] == $_COOKIE["curency"]  ) {
        echo $value["Price"]." ".$value["currencyname"];

      }else{

  $res = $value["Price"] * get_exchange($_COOKIE["curency"]);
        echo $res." ".get_curency_name($_COOKIE["curency"]);
      }

      ?> </p>
      <div class="div_img__">
        <img src="theme/image/verified.png" alt="">
      </div>
      <div class="_start">
        <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
      </div>
    <!--  <p><?php echo lang("shippingMethod")." : "  ?> <span><?php echo $value["shippingname"]; ?></span> </p> -->

    </div>
<!--  </a> -->
  </div>
  </div>

  <?php  }
}else{
  echo "<div class='alert alert-danger text-center'> ".lang("no_product")." </div>";
}

  ?>

  </section>

</div>

<h4 class="text-center"><?php echo lang("recomended_for_you"); ?></h4>

<div class="_random_all_products">
  <div class="row">
<?php
$get_all_prdo ;
if($_COOKIE["ship_pale"] == "ngazidja"){
  $get_all_prdo = get_all_by_island_products(1);

}else if($_COOKIE["ship_pale"] =="ndzuwani"){
  $get_all_prdo = get_all_by_island_products(5,1);

}else if($_COOKIE["ship_pale"] == "mwali"){
  $get_all_prdo = get_all_by_island_products(5,5,1);

}else if($_COOKIE["ship_pale"] == "france"){
$get_all_prdo = get_all_by_island_products(5,5,5,1);

}

if($get_all_prdo != 0){
foreach ($get_all_prdo  as  $value) {
?>

<div class="col-sm-12 col-md-6 col-lg-3  coul_cont ">
  <a href="item.php?item=<?php echo $value['ItemID']; ?> ">
  <div class="clum_div">
    <div class="div_img_item_1">
  <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self"  alt="">
    </div>
    <div class="_all_prd_conte">
      <p class="text-center"> <?php ?> <span> <?PHP echo $value['Name'];?> </span></p>
      <p class="text-center"><?php
      if ($value["CurrencyID"] == $_COOKIE["curency"]   ) {
        echo $value["Price"]." ".$value["currencyname"];
      }else{

  $res = $value["Price"] * get_exchange($_COOKIE["curency"]);
        echo $res." ".get_curency_name($_COOKIE["curency"]);
        //echo  $value["Price"] * get_exchange($default_curencu);
      }

?>
  </p>

  <?php if($value["Verificated"] == "true"){ ?>
    <div class="div_img_ver">
      <img class="img_veri" src="theme/image/verified.png" alt="">
    </div>
<?php }

if($value["BestSeller"] == "true"){
?>
      <div class="_start text-center">
        <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
              <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
      </div>
  <?php }?>
      <!--<p class="text-center"><?php echo lang("shippingMethod")." : "  ?> <span><?php echo $value["shippingname"]; ?></span> </p>-->
    </div>

  </div>
</a>
</div>

<?php
}
}else{
  echo "<div class='alert alert-danger text-center div_empty_prod'> ".lang("no_product")." </div>";
}

 ?>

  </div>

</div>


<?php include($template ."footer.php"); // footer ?>
</div>

<?php


}else{


  $index_css ="";
  $index_js = "";
  $set_footer ="";
include("init.php"); // include init.php
?>
<div class="cont">

  <div class="div_for_searc">
    <form autocomplete="off" class="form-inline my-2 my-lg-0 ml-auto for_mm_" action="searchproducts.php" method="post">

      <div class="autocomplete"  >
  <input id="search_input" class="form-control mr-sm-2" type="text" name="searc_word" placeholder="<?php echo lang("search"); ?>">

  </div>
  <button id="btn_searc" type="submit" class="btn btn-primary " name="button"> <i class="fa fa-search"></i><?php echo lang("search"); ?></button>

    </form>
  </div>
<!--
<div class="slider">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" height="250" src="theme/image/1.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" height="250" src="theme/image/2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" height="250" src="theme/image/3.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</div> -->

<div class="s_slider_div">
    <h4 class="text-center"><?PHP echo lang("best_prducts"); ?></h4>
  <section class="slider_center text-center">

    <?php



$get_bes_prdo ;
if($_SESSION["SHIP_PALCE_SESS"] == "ngazidja"){
  $get_bes_prdo = get_best_products(1);
}else if($_SESSION["SHIP_PALCE_SESS"] == "ndzuwani"){
  $get_bes_prdo = get_best_products(5,1);
}else if($_SESSION["SHIP_PALCE_SESS"] == "mwali"){
  $get_bes_prdo = get_best_products(5,5,1);
}else if($_SESSION["SHIP_PALCE_SESS"] == "france"){
$get_bes_prdo = get_best_products(5,5,5,1);
}
if($get_bes_prdo != 0){

   foreach($get_bes_prdo AS $value ){
   ?>

   <?php ?>
  <div class="col-img  supper_div_link_div div_wattingorder swiper-slide ">
      <div data-item="<?php echo $value['ItemID']; ?> " class="supper_div_im1   ">
  <!--  <a href="item.php?item=" class="div_li">  -->
    <div class="div_img_item_1">
      <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self" alt="">
    </div>
    <div class="name_of_item ">
      <p> <?php ?> <span> <?PHP echo $value['Name'];?> </span></p>
      <p><?php
      if ($value["CurrencyID"] == $_SESSION["CURENCY_SESION"]  ) {
        echo $value["Price"]." ".$value["currencyname"];

      }else{



  $res = $value["Price"] * get_exchange($_SESSION["CURENCY_SESION"]);
        echo $res." ".get_curency_name($_SESSION["CURENCY_SESION"]);
      }

      ?> </p>
      <div class="div_img__">
        <img class="img_veri_sale"  src="theme/image/verified.png" alt="">
      </div>
      <div class="_start">
        <span class="fa fa-star checked _best_saler_starts"></span>
          <span class="fa fa-star checked _best_saler_starts"></span>
            <span class="fa fa-star checked _best_saler_starts"></span>
              <span class="fa fa-star checked _best_saler_starts"></span>
                <span class="fa fa-star checked _best_saler_starts"></span>
      </div>


    </div>
<!--  </a> -->
  </div>
  </div>

  <?php  }
}else{
  echo "<div class='alert alert-danger text-center'> ".lang("no_product")." </div>";
}

  ?>

  </section>

</div>

<h4 class="text-center"><?php echo lang("recomended_for_you"); ?></h4>

<div class="_random_all_products">
  <div class="row">
<?php
$get_all_prdo ;


if($_SESSION["SHIP_PALCE_SESS"]== "ngazidja"){
  $get_all_prdo = get_all_by_island_products(1);

}else if($_SESSION["SHIP_PALCE_SESS"] =="ndzuwani"){
  $get_all_prdo = get_all_by_island_products(5,1);

}else if($_SESSION["SHIP_PALCE_SESS"] == "mwali"){
  $get_all_prdo = get_all_by_island_products(5,5,1);

}else if($_SESSION["SHIP_PALCE_SESS"] == "france"){
$get_all_prdo = get_all_by_island_products(5,5,5,1);

}

if($get_all_prdo != 0){
foreach ($get_all_prdo  as  $value) {
?>

<div class="col-sm-12 col-md-6 col-lg-3  coul_cont ">
  <a href="item.php?item=<?php echo $value['ItemID']; ?> ">
  <div class="clum_div">
    <div class="div_img_item_1">
  <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self"  alt="">
    </div>
    <div class="_all_prd_conte">
      <p class="text-center"> <?php ?> <span> <?PHP echo $value['Name'];?> </span></p>
      <p class="text-center"><?php
      if ($value["CurrencyID"] == $_SESSION["CURENCY_SESION"]   ) {
        echo $value["Price"]." ".$value["currencyname"];
      }else{

  $res = $value["Price"] * get_exchange($_SESSION["CURENCY_SESION"]);
        echo $res." ".get_curency_name($_SESSION["CURENCY_SESION"]);
        //echo  $value["Price"] * get_exchange($default_curencu);
      }

?>
  </p>

  <?php if($value["Verificated"] == "true"){ ?>
    <div class="div_img_ver">
      <img class="img_veri_sale"  class="img_veri" src="theme/image/verified.png" alt="">
    </div>
<?php }

if($value["BestSeller"] == "true"){
?>
      <div class="_start text-center">
        <span class="fa fa-star checked _best_saler_starts"></span>
          <span class="fa fa-star checked _best_saler_starts"></span>
            <span class="fa fa-star checked _best_saler_starts"></span>
              <span class="fa fa-star checked _best_saler_starts"></span>
                <span class="fa fa-star checked _best_saler_starts"></span>
      </div>
  <?php }?>
    </div>

  </div>
</a>
</div>

<?php
}
}else{
  echo "<div class='alert alert-danger text-center div_empty_prod'> ".lang("no_product")." </div>";
}

 ?>

  </div>

</div>


<?php include($template ."footer.php"); // footer ?>
</div>

<?php


  /*
  $index_css ="";
  $index_js = "";
  $set_footer ="";
$notheader ="";
include("init.php");

?>
<div class="cont2">
  <div class="dv_titl text-center">
    <h1><?php echo lang("comoshop"); ?></h1>
    <p><?PHP ECHO lang("welcome_to_comoshop"); ?></p>
  </div>

  <div class="mycontent text-center">

<form class="" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

    <div class="_div_rdbtn ">
    <p><?php echo lang("choice_place_shipping"); ?></p>
        <input type="radio"  id="ngazidja_radibtn" name="place__sho" value="ngazidja">
          <label for="ngazidja_radibtn"><?php echo lang("ngazidja"); ?></label>


        <input type="radio"  id="ndzuwani_radibtn" name="place__sho" value="ndzuwani">
          <label for="ndzuwani_radibtn"><?php echo lang("ndzuwani"); ?></label>


        <input type="radio"  id="mwali_radibtn" name="place__sho" value="mwali">
          <label for="mwali_radibtn"><?php echo lang("mwali"); ?></label>


        <input type="radio"  id="france_radibtn" name="place__sho" value="france">
          <label for="france_radibtn"><?php echo lang("france"); ?></label>


    </div>

    <div class="div_curency text-center">
      <p><?php echo lang("choice_currency"); ?></p>
      <input type="radio"  id="kmf_radibtn" name="curency__" value="2">
        <label for="kmf_radibtn"><?php echo lang("kmf"); ?></label>


      <input type="radio"  id="eur_radibtn" name="curency__" value="1">
        <label for="eur_radibtn"><?php echo lang("euro"); ?></label>

    </div>

    <div class="div_btn_aply text-center">
      <button id="btn_su_cook" type="submit" class="btn btn-primary" name="button"><i class="fas fa-check"></i>  <?php echo lang("apply"); ?></button>

    </div>
</form>
  </div>

</div>

<?php
include($template ."footer.php"); // footer

*/
}



?>



<?php



?>
