<?php
session_start();
$index_css ="";
$index_js = "";
$set_footer ="";
$pageTitle = "Search";
$searchproducts_css = "";
$searchproducts_js = "";
include("init.php"); // include init.php
$sort="DESC";
$check_ngazidja = "9";
$check_ndzuwani = "9";
$check_mwali = "9";
$check_france = "9";
$word_search = "";
if(isset($_POST["searc_word"])){
  $word_search = $_POST["searc_word"];
}


?>
<input type="hidden" id="_INPU_HIDEN_WORD" name="" value="<?php echo   $word_search ?>">
<input type="hidden" name="" id="_img_url" value="<?php echo  $img."uploade_img/"; ?>">
<div class="_filter_for_mobole_div"></div>
<div class="img_fil">
<img id="img_filter" src="theme/image/filter.png" alt="">
</div>

<div class="cont ">


<div class="div_for_searc">
  <form autocomplete="off" class="form-inline my-2 my-lg-0 ml-auto for_mm_" action="searchproducts.php" method="post">

    <div class="autocomplete"  >
<input id="search_input"  class="form-control mr-sm-2 search_input_for_m" type="text" name="searc_word" placeholder="<?php echo lang("search"); ?>">

</div>
<button id="btn_searc" type="submit" class="btn btn-primary " name="button"> <i class="fa fa-search"></i><?php echo lang("search"); ?></button>

  </form>
</div>





  <div class="row">
    <div class="col-md-3">
  <!--    <div class="div_filt text-center">
         <span> <i class ='fa fa-sort'></i> <strong><?php echo lang("ordering") ?> :</strong> [</span>
         <span class="<?php //if($sort=="DESC"){ echo "active";}; ?>"><?php //echo lang("desc"); ?></span> |
          <span class="<?php // if($sort=="ASC"){ echo "active";}; ?>"><?php //echo lang("asc"); ?></span> ]

      </div> -->
      <div class="all_div_sdi_bar">
        <div class="div_content_top">
          <p class=" _my_pp"> <strong><?php echo lang("place_shiping"); ?> </strong>  <i id="fa_place_de_" class="fas fa-plus-square"></i></p>
          <div id="di_pla_sh" data-status_plac_de_div="1" class="div_chek_bo_x" >

            <div class="form-check">
             <input type="checkbox" class="form-check-input check_box_place__" id="ngazidja_chke">
             <label class="form-check-label" for="ngazidja_chke"><?php echo lang("ngazidja") ?></label>
           </div>

           <div class="form-check">
           <input type="checkbox" class="form-check-input check_box_place__" id="ndzuwani_chke">
           <label class="form-check-label" for="ndzuwani_chke"><?php echo lang("ndzuwani") ?></label>
         </div>

         <div class="form-check">
           <input type="checkbox" class="form-check-input check_box_place__" id="mwali_chke">
           <label class="form-check-label" for="mwali_chke"><?php echo lang("mwali") ?></label>
         </div>

          <div class="form-check">
            <input type="checkbox"  class="form-check-input check_box_place__" id="france_chke">
            <label class="form-check-label" for="france_chke"><?php echo lang("france") ?></label>
          </div>



          </div>
        </div>
  <p  class="r cate_pp"><strong> <?php echo lang("category"); ?> </strong> <i id="fa_cate_" class="fas fa-plus-square"></i></p>
  <div class="div_for_cat">

    <div id="sid_cat" data-status_cat_div="1" class="sid_cat"></div>
  </div>

  <div class="div_fr_brand">
  <p  class=" brand_pp"> <strong> <?php echo lang("brandM"); ?> </strong> <i id="fa_brand" class="fas fa-plus-square"></i></p>
  <div id="sid_brand" data-status_bran_div="1" class="sid_brand"></div>
  </div>



      <div class="side_bar">
        <p class="pric_ran_pp"> <strong> <?php echo lang("range_price"); ?> </strong> <i id="fa_rang_pric" class="fas fa-plus-square"></i> </p>
        <p id="ran__price__P" class="text-center"></p>
        <div class="super_div_ran_pr">
            <div id="_prici_silder_div" class=""></div>
        </div>

      </div>

  <div class="div_btn_aply  text-center">
    <button id="btn_aply_fil" type="button"  class="btn btn-sm btn-primary" name="button"><?php echo lang("apply") ?></button>
  </div>

      </div>




    </div>
    <div class="col-md-9">
      <div class="produ_ctus text-center">

        <div class="row _random_all_products">

        </div>

      </div>



    </div>

  </div>






</div>
<?PHP



 ?>
<?php include($template ."footer.php"); // footer ?>
