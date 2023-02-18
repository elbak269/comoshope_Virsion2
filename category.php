<?php
ob_start();
$category_css ="";
$category_js = "";
$set_footer ="";
$pageTitle = "Categories";
include("init.php");
if (isset($_GET['pagename']) ) {


?>
<div class="_filter_for_mobole_div"></div>
<div class="img_fil">
<img id="img_filter" src="theme/image/filter.png" alt="">
</div>
<div class="cont">
<!--
  <div id="dropdown_div_id" class="dropdown show side_fo_mo card  d-sm-block d-md-none  d-lg-none d-xl-none">
    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="filter_of_mobile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php// echo lang("filter")?>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    </div>
  </div> -->



  <h5 class="text-center _titl_cat"><?php echo $_GET["pagename"]; ?></h5>

  <input type="hidden" id="category_" name="" value="<?php echo $_GET['pageid']; ?>"> <!--brand_id-->

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
      <h5><?php echo lang('brandM'); ?></h5>
     <ul class="list-group list-group-flush">
       <?php
       $sql = $conn->prepare("SELECT 	brand.BrandID, brand.BrandName FROM brand");
       $sql ->execute();
       $sqlfetc = $sql->fetchAll();
       foreach ($sqlfetc as  $value) {
         if($value['BrandID'] != 1 && $value['BrandID'] != 2 && $value['BrandID'] != 3 ){
        echo '<li class="list-group-item">'.
        '<div class="form-check">
          <input class="form-check-input common_selector brand_classin" type="checkbox" data-brad_id_va="'.$value['BrandID'].'"  value="'.$value['BrandID'].'" id="'.$value['BrandID']."catid".'">
          <label class="form-check-label" for="'.$value['BrandID']."catid".'">
            '.$value['BrandName'].'
          </label>
        </div>'.'</li>';
         }
       } ?>

     </ul>
   </div> <!--end sidebar brand-->

   <div class="div_btn_aply  text-center">
     <button id="btn_aply_fil" type="button"  class="btn btn-sm btn-primary" name="button"><?php echo lang("apply") ?></button>
   </div>


  <!---  <div class="card side_bar_pric d-none d-sm-none d-md-block card_lg_xl" >
    <!---    <h5><?php// echo lang('price'); ?></h5>
     <ul class="list-group list-group-flush">
        <li class="list-group-item">
        <div class="form-check">
          <input class="form-check-input   common_selector default_price " type="checkbox" value="100" id="defaultCheck50">
          <label class="form-check-label" for="defaultCheck50">
            <?php //echo " <strong>".'<i class="fas fa-greater-than-equal"></i>'." ".lang("euro")." ".lang("100")." </strong>"; ?>
          </label>
        </div>
        </li>
        <li class="list-group-item">
        <div id="data-price_div" class="form-check ">
          <input class="form-check-input common_selector default_price " type="checkbox" value="200" id="defaultCheck100">
          <label class="form-check-label " for="defaultCheck100">
            <?php //echo " <strong>".'<i class="fas fa-greater-than-equal"></i>'." ".lang("euro")." ".lang("200")." </strong>"; ?>
          </label>
        </div>
        </li>
        <li class="list-group-item">
        <div class="form-check">
          <input class="form-check-input common_selector default_price " type="checkbox" value="300" id="defaultCheck200">
          <label class="form-check-label" for="defaultCheck200">
            <?php// echo " <strong>".'<i class="fas fa-greater-than-equal"></i>'." ".lang("euro")." ".lang("300")." </strong>"; ?>
          </label>
        </div>
        </li>

        <li class="list-group-item">
        <div class="form-check">
          <input class="form-check-input common_selector default_price" type="checkbox" value="500" id="defaultCheck500">
          <label class="form-check-label" for="defaultCheck500">
            <?php// echo " <strong>".'<i class="fas fa-greater-than-equal"></i>'." ".lang("euro")." ".lang("500")." </strong>"; ?>
          </label>
        </div>
        </li>
        <li class="list-group-item">
        <div class="form-check">
          <input class="form-check-input common_selector default_price" type="checkbox" value="1000" id="defaultCheck1000">
          <label class="form-check-label" for="defaultCheck1000">
            <?php// echo " <strong>".'<i class="fas fa-greater-than-equal"></i>'." ".lang("euro")." ".lang("1000")." </strong>"; ?>
          </label>
        </div>
        </li>

     </ul>
   </div> --><!--end sidebar prices-->
                                        <!--Rating-->
<!--    <div class="card side_bar_ratin d-none d-sm-none d-md-block card_lg_xl" >
      <h5><?php //echo lang('rating'); ?></h5>
     <ul class="list-group list-group-flush">
       <li class="list-group-item">
         <div class="form-check">
            <input class="form-check-input common_selector rating_classin " type="checkbox" value="1" id="rating1">
            <label class="form-check-label" for="rating1">
              <div class=" rating_star ">
                <span class="fa fa-star checked_f"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
              </div>
            </label>
          </div>
       </li>
       <li class="list-group-item">
         <div class="form-check">
            <input class="form-check-input common_selector rating_classin" type="checkbox" value="2" id="rating2">
            <label class="form-check-label" for="rating2">
              <div class=" rating_star ">
                <span class="fa fa-star checked_f"></span>
                <span class="fa fa-star checked_f "></span>
                <span class="fa fa-star "></span>
                <span class="fa fa-star "></span>
                <span class="fa fa-star "></span>
              </div>
            </label>
          </div>
       </li>
       <li class="list-group-item">
         <div class="form-check">
            <input class="form-check-input common_selector rating_classin" type="checkbox" value="3" id="rating3">
            <label class="form-check-label" for="rating3">
              <div class=" rating_star ">
                <span class="fa fa-star checked_f"></span>
                <span class="fa fa-star checked_f "></span>
                <span class="fa fa-star checked_f"></span>
                <span class="fa fa-star "></span>
                <span class="fa fa-star "></span>
              </div>
            </label>
          </div>
       </li>
       <li class="list-group-item">
         <div class="form-check">
            <input class="form-check-input common_selector rating_classin" type="checkbox" value="4" id="rating4">
            <label class="form-check-label" for="rating4">
              <div class=" rating_star ">
                <span class="fa fa-star checked_f"></span>
                <span class="fa fa-star checked_f "></span>
                <span class="fa fa-star checked_f"></span>
                <span class="fa fa-star checked_f"></span>
                <span class="fa fa-star "></span>
              </div>
            </label>
          </div>
       </li>
       <li class="list-group-item">
         <div class="form-check">
            <input class="form-check-input common_selector rating_classin" type="checkbox" value="5" id="rating5">
            <label class="form-check-label" for="rating5">
              <div class=" rating_star ">
                <span class="fa fa-star checked_f"></span>
                <span class="fa fa-star checked_f "></span>
                <span class="fa fa-star checked_f"></span>
                <span class="fa fa-star checked_f"></span>
                <span class="fa fa-star checked_f"></span>
              </div>
            </label>
          </div>
       </li>

     </ul>
   </div>  --><!--end sidebar rating-->

  </div>  <!--END SIDEBAR-->

          <!--Start Content-->
  <div class="content col-12 col-sm-12 col-md-9 col-lg-10 col-xl-10">
    <div id="item_content" class="row">
      <?php
      $stm = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
        brand.BrandName as brandname,
        categories.CategoryID as catid,
        categories.Name as catName,
        sellers.SellerID as userId,
        currency.CurrencyName as currencyname
        FROM items
        INNER JOIN brand ON items.BrandID = brand.BrandID
        INNER JOIN  sellers ON sellers.SellerID = items.MemberID
        INNER JOIN categories ON categories.CategoryID = items.CategoryID
        INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
        WHERE categories.CategoryID = ?");

        $stm->execute(array($_GET['pageid']));
        $fetch = $stm->fetchAll();

 /*
      foreach ($fetch as $value) {
        ?>
      <div  class=' col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-ite'>
        <a href="item.php?item=<?php echo $value['ItemID']; ?> ">
      <div id="item_border"  class='item_border'>
        <?php
      echo "<img id='pic_item_'  class='pic' src='".$img."uploade_img/".$value["Pic1"]."'/>";


      ?>
          <p id="_item_name_"><?php echo $value['Name'];  ?></p>
          <p><?php echo "<span>".$value['Price'] ."</span>  <span>".$value['currencyname']."</span>";?></p>
          <p><?php if ($value['Rating']==0) {
          ?>
          <div class=" rating_star ">
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
          </div>
          <?php
          }
          elseif ($value['Rating']==1) {
          ?>
          <div class=" rating_star ">
            <span class="fa fa-star checked_f"></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
          </div>
          <?php
          }
          elseif ($value['Rating']==2) {
          ?>
          <div class=" rating_star ">
            <span class="fa fa-star checked_f"></span>
            <span class="fa fa-star checked_f "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
          </div>
          <?php
          }
          elseif ($value['Rating']==3) {
          ?>
          <div class=" rating_star ">
            <span class="fa fa-star checked_f"></span>
            <span class="fa fa-star checked_f"></span>
            <span class="fa fa-star checked_f"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
          </div>
          <?php
          }
          elseif ($value['Rating']==4) {
          ?>
          <div class=" rating_star ">
            <span class="fa fa-star checked_f"></span>
            <span class="fa fa-star checked_f "></span>
            <span class="fa fa-star checked_f"></span>
            <span class="fa fa-star checked_f "></span>
            <span class="fa fa-star"></span>
          </div>
          <?php
          }
          elseif ($value['Rating']==5) {
          ?>
          <div class=" rating_star ">
            <span class="fa fa-star checked_f"></span>
            <span class="fa fa-star checked_f "></span>
            <span class="fa fa-star checked_f"></span>
            <span class="fa fa-star checked_f"></span>
            <span class="fa fa-star checked_f"></span>
          </div>
          <?php
          }
           ?>
         </p>
         <p id="ship_methodd">
          <?php echo lang("shippingMethod") ?>
          <span class="float-right">DHL</span>
        </p>
      </div> <!--END BORDER ITEM-->
    </a>
  </div>
      <?php

    }*/
       ?>

    </div>

  </div>

  </div>

</div>


<?php

include($template ."footer.php");
}
else {
  header("location:index.php");
}
ob_end_flush ();
?>
