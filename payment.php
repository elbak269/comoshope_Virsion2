<?php
ob_start();
session_start();

if (isset($_SESSION["user"]) && isset($_GET['itemid'])) {


  $payment_css ="";
  $payment_js = "";
  $set_footer = "";
  $pageTitle = "payment";
  $normalize_css = " ";
include("init.php");
  $clientid_session = getclientID($_SESSION["user"]);

  ?>
  <input type="hidden" id="item_ID" name="itemid" value="<?php echo $_GET['itemid'];  ?>">
  <input id="customerid" type="hidden" name="" value="<?php echo $clientid_session ?>">
  <?php

  $item_nombre = 1;

$stm = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  categories.CategoryID as catid,
  categories.Name as catName,
  sellers.StoreName,
  sellers.SellerID as userId,
  currency.CurrencyName as currencyname,
  promo.Discount  AS DiscountPrice


  FROM items
  LEFT JOIN brand ON items.BrandID = brand.BrandID
  LEFT JOIN  sellers ON sellers.SellerID = items.MemberID
  LEFT JOIN categories ON categories.CategoryID = items.CategoryID
  LEFT JOIN currency ON items.CurrencyID = currency.CurrencyID
  LEFT JOIN promo ON items.Discount = promo.PromoID
  WHERE ItemID = :PRODUCT");
  $stm ->bindParam(":PRODUCT",$_GET['itemid'],PDO::PARAM_INT);
  $stm->execute();
  $fetch = $stm->fetchAll();
  foreach ($fetch as  $value) {

?>
<input type="hidden" id="saller__" name="" value="<?php echo $value["userId"]; ?>">
<div class="cont">
  <h1 class="text-center"><?php echo lang("itemInYourCart"); ?></h1>


<div class="row">
  <div class="col-sm-12 col-md-9">
    <div class="card card-item-in-cart">
  <div class="card-header">
    <?php echo lang("itemInYourCart"); ?>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-12 col-md-7">
        <div class="col_card_bo">

        <div class="row">
          <div class="col-6">
            <p><?php echo lang("productName").": "; ?> <span class="blue"> <a href="item.php?item=<?php echo $value['ItemID']  ?>" >  <?php
            echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($value['Name']))));
             ?> </a></span> </p>
          </div>
          <div class="col-6">
            <p class="float-right"><?php echo lang("seller").": ";  ?> <span class="blue"><a href="sellerpage.php?seller=<?php echo $value['userId']  ?> "> <?php
            echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($value['StoreName']))));
           ?> </a> </span> </p>
          </div>
          <div class="col-6">
            <?php echo lang("price")." : "; ?>
              <span id="price_span"></span>
              <input type="hidden" id="item_rece_first_load_page" name="" value="<?php echo $value["Price"];  ?> ">


          </div>
          <div class="col-6">

              <div class="col-7 quantity_div float-right">
                    <div id="quantity_select_div">
                    </div>
              </div>

          </div>
          <div class="col-12 ">
            <div class="div_for_img">
              <img src="<?php echo $img."uploade_img/".$value['Pic1']; ?>" class="pic " alt="<?php echo $value['Name']; ?>">
            </div>
          </div>
        </div>
      </div>
      </div>
                             <!--ADRESSS -->
      <div id="top_adress" class="col-sm-12 col-md-5 top_adress">
              <div class="col_card_bo">
              <div class="row">
                <div class="col col-md-12 ">
                  <div  class="adress_div">



                    <?php
                     $stmtadres = $conn->prepare("SELECT AdressID, PlaceDescription
                       FROM  adress
                       INNER JOIN clients ON clients.ClientID = adress.ClientID
                       WHERE clients.ClientID = :CLINDID   ORDER BY AdressID DESC LIMIT 3
                        ");
                        $stmtadres ->bindParam(":CLINDID",$clientid_session,PDO::PARAM_INT);
                        $stmtadres -> execute();
                        $fetc_stm6  = $stmtadres->fetchAll();
                        ?>
                        <p class="text-center"><strong ><?php echo lang("choiceShippingAdress"); ?></strong></p>

                  </div>


                </div>

              </div>
              <div class="edit_adre_di  ">
                <div class="row">



                  <div class="col-12 ">
                    <div class="form-group">
                      <label for="placeDescripyionid"><?php echo lang("placeDescripyion"); ?></label>
                      <input type="text" class="form-control" id="placeDescripyionid" aria-describedby="emailHelp" placeholder="<?php echo lang("enter")." ".lang('placeDescripyion'); ?>">
                    </div>

                  </div>



                </div>
              </div>
            </div>

            <div class="div_for_recep_top">
            </div>
            <div class="telephone_clien_div">
              <label for="inpu_phone"><?php echo lang("phone"); ?></label>
              <input type="number" class="form-control inpu_phone_top" id="inpu_phone" aria-describedby="emailHelp" placeholder="<?php echo lang("enter")." ".lang('phone'); ?>">

            </div>
      </div>


      <!--End ADRESSS -->

    </div>


  </div>
</div>


  </div>
  <div class="col-sm-12 col-md-3 sidebar_right sidebar_right_top">
    <div class="shop-div">

      <input type="hidden" id="ID_Pri" name="" value="<?php echo $value['Price']; ?>">
      <input type="hidden" id="itm_no_br" name="" value="<?php echo $item_nombre; ?>">

      <div class="form-group saving_div">
        <label for="savingid"> <strong> <?php echo lang('saving') ?> </strong></label>
        <input type="text" class="form-control" id="savingid" aria-describedby="emailHelp" placeholder="<?php echo lang("enterPromoAndRewardsCode"); ?>">
        <button type="button" id="btn_apply" class="btn btn-primary btn-sm" name="button"><?php echo lang("apply"); ?></button>
        <p><?php echo lang("productDiscount").": "; ?> <span id="productDiscount_span_id" class="float-right productDiscount_span_clas_">0</span> </p>
      </div>
      <hr>
      <div class="orderSummary_div">
        <p class="text-center"> <strong> <?php echo lang("orderSummary"); ?> </strong> </p>
        <p><?php echo lang("orderValue").": "; ?> <span id="order_value_span"class="float-right order_value_span_class"></span> </p>
        <p><?php echo lang("saving").": "; ?> <span id="saving_span_order" class="float-right saving_span_order_clas_"></span> </p>
        <hr>
      </div>
      <div class="">
        <p><?php echo lang("subtotal").": "; ?> <span id="subtotal_span_order" class="float-right subtotal_span_order_lass"> </span> </p>
        <p><?php echo lang("shipping").": "; ?> <span id="shipping_span_order" class="float-right shipping_span_order"></span> </p>

   <input type="hidden" id="SHIPIN_PRICE_FOR_" name="" value="<?PHP //echo  $value["SHIPING_PRICE"]; ?>">
        <hr>
      </div>
      <div class="">
        <p><?php echo lang("orderTotal").": "; ?> <span id="ordertotal_span_oorder" class="float-right order_total_clas_"></span> </p>
      </div>
      <hr>
      <?php /*>
      <div id="div_to_paypal" class="proceedToCheckout_div div_btnconfirm ">
        <button type="button"  id="proceedToCheckout_btn_top" class="btn btn-primary" name=""><?php echo lang('go_pay'); ?></button>
        <div class="proceedToCheckout_div text-center">
          <div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>

  <script src="https://www.paypal.com/sdk/js?client-id=ASvNaabsdeh9N_nxtfsxc04_DmUWNTjHJtY-d4GGkCp-3FDFFv3AM0jnZzOHwfTdmBSKGKp3081izByQ&currency=EUR" data-sdk-integration-source="button-factory"></script>
  <script>

  </script>
        </div>
      </div>
      <?php */ ?>
    </div>
  </div>


</div>
<div class="">

</div>
                                <!-- START ADRESSE-->
   <div id="buttomadress" class="buttomadress">
  <div class="card">
  <div class="card-header">
   <strong><?php echo lang("shippingAdress"); ?></strong>



  </div>


  <div class="card-body">
  <div class="">
        <div class="col_card_bo">
        <div class="row">
          <div class="col col-md-12">
            <div class="adress_div">
            </div>


          </div>


        </div>
        <div class="edit_adre_di1 ">
          <div class="row">

            <div class="col-12 ">
              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang("placeDescripyion"); ?></label>
                <input type="text" class="form-control plac_desc_" id="placeDescripyionid1"  aria-describedby="emailHelp" placeholder="<?php echo lang("enter")." ".lang('placeDescripyion'); ?>">
              </div>

            </div>
            <div class="telephone_clien_div">
              <label for="inpu_phone"><?php echo lang("phone"); ?></label>
              <input type="number" class="form-control inpu_phone_botom" id="inpu_phone" aria-describedby="emailHelp" placeholder="<?php echo lang("enter")." ".lang('phone'); ?>">

            </div>


          </div>
        </div>
      </div>
      </div>

      <div class="rec_p_man_dv ">
        <p class="text-center"><strong class=""><?php echo lang("choiceTheReceipient"); ?></strong></p>
      <?php
      $fetchnames = getnaems($clientid_session);
      ?>
      <div class="row">
        <input id="clid_inp1" type="hidden" name="" value="<?php echo $clientid_session ?>">

      <?php
      foreach ($fetchnames as $value) {
       ?>
       <div id="div_rec_names" class="row">
             <div  class="col-sm-12">
               <div id="<?php  echo 'div'.$value['NameID'];?>" class="form-check <?php echo 'div'.$value['NameID'];?>  div_adres_pare">
                 <input class="form-check-input" data-fuln_na="<?php echo $value['fullname']; ?>" type="radio" name="d" id="<?php echo 'client_ad'.$value['NameID'];?>" value="<?php echo $value['NameID'];?>" >
                <label class="form-check-label" for="<?php  echo 'client_ad'.$value['NameID'];?>">
                  <p> <strong><?php echo lang("recipient_full_nam").": "; ?></strong>
                     <span ><?php echo $value['fullname']; ?></span>
                 </label>
               </div>
           </div>

         </div>

       <?php
      }?>
      <div class="col-sm-12">
        <label for="full_name_id"  > <strong> <?php echo lang('fullName') ?> </strong></label>
        <input type="text" class="form-control" id="full_name_id" aria-describedby="emailHelp" placeholder="<?php echo lang("enter_full_name"); ?>">
    <?php /* ?>    <div class="but_for_add_new_recepient">
            <button type="button" id="btn_add_recepairnt" class="btn btn-sm btn-primary " name="button"><?php echo lang("add_new_reception"); ?></button>
        </div> <?php */ ?>

      </div>
       </div>
       </div><!--END RECEIP MAN-->

  </div>



</div>
 </div>


 <div class="sidebar_right_contnr"> <!-- SIDEBAR BUTTOM-->
 <div class="col-sm-12 col-md-3 sidebar_right sidebar_right_botom ">
    <div class="shop-div">

    <?php /* ?>  <input type="hidden" id="ID_Pri" name="" value="<?php echo $value['price']; ?>"> <?php */?>
      <input type="hidden" id="itm_no_br" name="" value="<?php echo $item_nombre; ?>">

      <div class="form-group saving_div">
        <label for="savingid"> <strong> <?php echo lang('saving'); ?> </strong></label>
        <input type="text" class="form-control" id="savingid" aria-describedby="emailHelp" placeholder="<?php echo lang("enterPromoAndRewardsCode"); ?>">
        <button type="button" id="btn_apply" class="btn btn-primary btn-sm" name="button"><?php echo lang("apply"); ?></button>
        <p><?php echo lang("productDiscount").": "; ?> <span id="productDiscount_span_id" class="float-right productDiscount_span_clas_">0</span> </p>
      </div>


      <hr>
      <div class="orderSummary_div">
        <p class="text-center"> <strong> <?php echo lang("orderSummary"); ?> </strong> </p>
        <p><?php echo lang("orderValue").": "; ?> <span id="order_value_span"class="float-right order_value_span_class"></span> </p>
        <p><?php echo lang("saving").": "; ?> <span id="saving_span_order" class="float-right saving_span_order_clas_"></span> </p>
        <hr>
      </div>
      <div class="">
        <p><?php echo lang("subtotal").": "; ?> <span id="subtotal_span_order" class="float-right subtotal_span_order_lass"> </span> </p>
        <p><?php echo lang("shipping").": "; ?> <span id="shipping_span_order"  class="shipping_span_order float-right"></span> </p>
        <hr>
      </div>
      <div class="">
        <p><?php echo lang("orderTotal").": "; ?> <span id="ordertotal_span_oorder" class="float-right order_total_clas_"></span> </p>
      </div>
      <hr>

    </div>
  </div>
</div> <!-- END SIDEBAR BUTTOM-->

<div class="proceedToCheckout_div div_btnconfirm text-center">
  <button type="button"  id="proceedToCheckout_btn_bottom" class="btn btn-primary" name=""><?php echo lang('go_pay'); ?></button>
  <div class="proceedToCheckout_div text-center ">
    <div id="smart-button-container div_paypal">
<div style="text-align: center;">
  <div id="paypal-button-container"></div>
</div>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=ASvNaabsdeh9N_nxtfsxc04_DmUWNTjHJtY-d4GGkCp-3FDFFv3AM0jnZzOHwfTdmBSKGKp3081izByQ&currency=EUR" data-sdk-integration-source="button-factory"></script>
<script>

</script>
  </div>
</div>

</div>
<div id="result_request" class=""></div>

<?php

}
include($template ."footer.php");
}
else {
  if(isset($_GET['itemid'])){
    header("location:login.php?apyment=pay&itemid=".$_GET['itemid']."");
    exit();
  }else{
    header("location:login.php");
    exit();
  }


}



ob_end_flush();
 ?>
