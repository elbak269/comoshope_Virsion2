<?php
session_start();
if (isset($_GET['brand']) && isset($_GET['name']))
{
  $brand_css ="";
  $brand_js = "";
  $set_footer ="";
  $pageTitle = "Brands";
include("init.php");

?>
<div class="_filter_for_mobole_div"></div>
<div class="img_fil">
<img id="img_filter" src="theme/image/filter.png" alt="">
</div>
<div class="cont ">
  <div class="div_for_searc text-center"></div>
<!--
  <div id="dropdown_div_id" class="dropdown show side_fo_mo card  d-sm-block d-md-none  d-lg-none d-xl-none">
    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="filter_of_mobile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php// echo lang("filter")?>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    </div>
  </div> -->

  <div class=" side_fo_mo card   ">

  <input type="hidden" id="brandid_" name="" value="<?php echo $_GET['brand']; ?>"> <!--brand_id-->

  <div class="row">
    <div class="sid_bar  col-12 col-sm-12 col-md-3 col-lg-2 col-xl-2"> <!--start sidebar -->


      <div class="div_place_top">
        <p class=" _my_pp"> <strong><?php echo lang("place_shiping"); ?> </strong> </p>
        <div class="div_chek_bo_x">

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

    <div id="side_bar_categ" class="card  side_bar_categ  card_lg_xl" > <!--start sidebar categories-->
      <h5><?php echo lang('categories'); ?></h5>
     <ul class="list-group list-group-flush">
       <?php
       $sql = $conn->prepare("SELECT 	categories.CategoryID, categories.Name FROM categories");
       $sql ->execute();
       $sqlfetc = $sql->fetchAll();
       foreach ($sqlfetc as  $value) {
         if( $value['CategoryID'] != 1 && $value['CategoryID'] != 2 && $value['CategoryID'] != 3 ){
        echo '<li class="list-group-item">'.
        '<div class="form-check">
          <input class="form-check-input common_selector category_classin cat_ids__" data-cate_id="'.$value['CategoryID'].'"  type="checkbox" value="'.$value['CategoryID'].'" id="'.$value['CategoryID']."catid".'">
          <label class="form-check-label" for="'.$value['CategoryID']."catid".'">
            '.$value['Name'].'
          </label>
        </div>'.'</li>';
        }
       } ?>

     </ul>
   </div> <!--end sidebar categories-->

   <div class="div_btn_aply  text-center">
     <button id="btn_aply_fil" type="button"  class="btn btn-sm btn-primary" name="button"><?php echo lang("apply") ?></button>
   </div>

  </div>  <!--END SIDEBAR-->

          <!--Start Content-->

  <div class="content col-12 col-sm-12 col-md-9 col-lg-10 col-xl-10">
    <div id="item_content" class="row"></div>



<?php

include($template ."footer.php");
}
else {
  header("location:index.php");
}

?>
