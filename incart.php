<?php
ob_start();
session_start();

if (isset($_SESSION["user"])) {
  $incart_css ="";
  $incart_js = "";
  $set_footer = "";
  $pageTitle = "payment";
  $normalize_css = " ";
  $ngazidja  = 1;
  $payment_css ="";


  include("init.php");

  $clientid_session = getclientID($_SESSION["user"]);
  $client_id = getclientID($_SESSION["user"]);

  $products_in_cart = PRODUCT_INCART($client_id);
?>
<div class="conatiner">
 <h5 class="text-center"> <strong id="h5_item_in_cart" class="text-center"><?php echo lang("iten_incart") ?> </strong> </h5>
   <input id="customerid" type="hidden" name="" value="<?php echo $clientid_session ?>">


 <div class="row">
   <div class="col-sm-12 col-lg-8">
     <div class="row div_prd_in_c">
      <?php


      if (count($products_in_cart) > 0) {

      foreach ($products_in_cart as  $value){
      ?>
        <div data-ship_ngazidja = "<?php echo $value["ship_ngazidja"]; ?>"  data-ship_ndzuwani="<?php echo $value["ship_ndzouwani"]; ?>" data-ship_mwali="<?php echo $value["ship_mwali"]; ?>" data-ship_france = "<?php echo $value["ship_france"]; ?>"  class="col-sm-12 col-md-6 col-lg-4 col-xl-2 div_col______ ">
          <div  class="itm_in_cart_co">
            <i data-product_id="<?php echo $value["ItemID"];?>" class="fas fa-times-circle fa_remove_item"></i>

            <input type="hidden" name="" class="weight_product" id="" value="<?php echo $value["Weight"]; ?>">

             <div class="div_img">
               <img class="img_in_car" src="<?php ECHO $img."uploade_img/".$value["Pic1"] ?>" alt="">
             </div>
             <p class="text-center"><?php echo $value["Name"] ?></p>
             <p data-price="<?php echo  $value["Price"];  ?>" class="price_item text-center"><?php echo $value["Price"]." ".lang("euro"); ?></p>

            <div class="con_sele">
              <div class="row">
                <div class="col">
                  <label for="selc_qty_"><?php echo lang("qty")." : "; ?></label>

                </div>
                <div class="col">
                  <select  id="<?php echo "selc_qty_".$value["ItemID"]; ?>" data-seller="<?php echo $value["userId"]; ?>" data-product__id="<?php echo $value["ItemID"]; ?>" data-sel_="<?php echo $value["ItemID"];?>" class="form-control form-control-sm selqty_in_cart select_prod_qty">
                   <?php
                   for ($i=0; $i <=100 ; $i++) {
                     if ($i == $value["qty"]) {
                     ?>
                     <option <?php echo "selected";?>><?PHP ECHO $i; ?></option>
                     <?PHP
                   }else{
                     ?>
                     <option ><?PHP ECHO $i; ?></option>
                     <?php
                   }
                   }
                   ?>
                 </select>

                </div>

              </div>

            </div>
            <div class="">
            <p><span><?php echo lang("total")." : "; ?></span>  <span data-product_id="<?php echo $value["ItemID"]; ?>" id="<?php echo "id_prd_".$value["ItemID"]; ?>"  data-price="<?php echo $value["Price"];?>" class="total_pr"></span> </p>
            </div>

          </div>

        </div>
      <?php
      }
    }else{
      header("location:index.php");
      exit();
    }
       ?>
     </div>



 <div class="">
   <label for="sele_islands"><?php echo lang("choice_adress");?></label>
   <select id="sele_islands" class="form-control">
     <option value="1">Ngazidja</option>
     <?php /* ?> <option>Ndzuwani</option> <?php  */?>
    <?php /* ?> <option>Mwali</option> <?php */ ?>
     <option value="4">France</option>
   </select>
</div>

<div class="div_in_detail_adres">
  <label for="inp_adress_deatils"><?PHP ECHO lang("placeDescripyion");?></label>
  <input class="form-control form-control-lg" id="inp_adress_deatils" type="text" placeholder="<?PHP ECHO lang("placeDescripyion");?>">
</div>



<div class="div_recep">
  <label for="inp_resc_man">Le Nom Du Destinataire</label>
  <input class="form-control form-control-lg" id="inp_resc_man" type="text" placeholder="Entrez Le Nom Du Destinataire">
</div>

<div class="div_payment_method">
  <label for="paym_met_"><?php echo lang("payment_method"); ?></label>
   <select id="paym_met_" class="form-control" >
     <option value="1"><?PHP ECHO "Payapl Ou Credit Card" ?></option>
     <option value="2"><?PHP ECHO "En espèces" ?></option>

   </select>
</div>

<div class="telephone_clien_div">
  <label for="inpu_phone"><?php echo lang("phone"); ?></label>
  <input type="number" class="form-control" id="inpu_phone" aria-describedby="emailHelp" placeholder="<?php echo lang("enter")." ".lang('phone'); ?>">

</div>



   </div>
   <div class="col-sm-12 col-lg-4">
     <div class="side_bar">
       <div class="row">
         <div class="col">
           <label for="promo_inp"><?php echo lang('saving'); ?></label>
           <input class="form-control form-control-lg" id="promo_inp" type="text" placeholder="<?php echo lang("enterPromoAndRewardsCode"); ?>">
         </div>
         <div class="col div_btn_p_rom">
           <button type="button" class="btn btn-sm btn-primary" name="button"><?php echo lang("apply"); ?></button>
         </div>

       </div>
      <p><strong><?php echo lang("productDiscount")." : " ?></strong>  <span class="float-right">0</span> </p>

      <div class="">

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
        <div class="proceedToCheckout_div text-center">
          <button type="button"  id="proceedToCheckout_btn_bottom" class="btn btn-primary" name=""><?php echo lang('go_pay'); ?></button>
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

     </div>


   </div>
 </div>

   <div id="result_request" class=""></div>
</div>
<?PHP
/*
  $islandid = "";

    $clientid_session = getclientID($_SESSION["user"]);
  $islandexistngazidja =  prudctsinyourcartbyisland($clientid_session,$ngazidja);
  ?>
  <div class="cont">
      <h1 class="text-center"><?php echo lang("productInYourCart"); ?> (<span id="incart_count_id_span" class="orange"></span>)</h1>
      <input type="hidden" id="clidid_input_hid" name="" value="<?php echo $clientid_session;  ?>">
      <input type="hidden" id="img_resorc" name="" value="<?php echo $img?>">
          <div class="row">
              <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                <div class="content">
                  <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                      <section class="slider_center">
                      <?php
                      $int = 1;
                      $stm = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
                        brand.BrandName as brandname,
                        categories.CategoryID as catid,
                        categories.Name as catName,
                        sellers.StoreName ,
                        sellers.SellerID as userId,
                        currency.CurrencyName as currencyname,
                        shipping.ShippingName,
                        promo.Discount  AS DiscountPrice,
                        incart.QTY  as qty
                        FROM items
                        LEFT JOIN brand ON items.BrandID = brand.BrandID
                        LEFT JOIN  sellers ON sellers.SellerID = items.MemberID
                        LEFT JOIN categories ON categories.CategoryID = items.CategoryID
                        LEFT JOIN currency ON items.CurrencyID = currency.CurrencyID
                        LEFT JOIN shipping ON shipping.ShippingID = items.ShippingID
                        LEFT JOIN promo ON items.Discount = promo.PromoID
                        INNER JOIN incart ON incart.ProductID=items.ItemID
                        INNER JOIN clients ON incart.ClientID=clients.ClientID
                        WHERE clients.ClientID = :CLIENTID AND IslandID = :ISLNAD");
                       $stm->bindParam(":CLIENTID",$clientid_session,PDO::PARAM_INT);
                       $stm->bindParam(":ISLNAD",2,PDO::PARAM_INT);
                       $stm->bindParam(":CLIENTID",$clientid_session,PDO::PARAM_INT);
                       $stm->bindParam(":ISLNAD",$ngazidja,PDO::PARAM_INT);
                        $stm->execute();
                        $fetch = $stm->fetchAll();
                        foreach ($fetch as $value) {

                       ?>
                    <div class="products_info_for_padding">
                      <div  class="products_info">
                        <div class="div_for_imag">
                          <img src="<?php echo $img."uploade_img/".$value['Pic1']; ?>" class="pic" alt="<?php echo $value['Name']; ?>">
                        </div>
                        <p ><?phpecho $value['Name']?></p>
                        <p ><?php echo $value['Price']." ".$value['currencyname']?></p>
                        <p ><?php echo lang("seller").": "."<span class='blue' >".$value['StoreName']."</pan>"?></p>
                          <div class="input-group mb-3 ">
                            <select class="custom-select" id="nbr_itm">
                              <?php
                              for ($i=0; $i <= 100; $i++) {?>
                                  <option value="<?php echo $i?>" <?php if ($i == $value['qty']){echo "selected";} ?> > <?php echo $i?></option> <?php }?>
                            </select>
                            <div class="input-group-append">
                          <label class="input-group-text" for="nbr_itm">QTY</label>
                          </div>
                          </div>
                        <input type="text" class="form-control" placeholder="<?php echo lang("enterpromocode"); ?>"/>
                        <div class="btn_dives ">
                          <div class="row">
                            <div class="col-7">
                                <button type="button" class="btn btn-sm btn-primary" name="button"><?php echo lang("message") ?></button>
                            </div>
                            <div class="col-4">
                              <button type="button" class="btn btn-sm btn-danger" name="button"><?php echo lang("remove") ?></button>
                            </div>

                          </div>



                        </div>
                      </div>
                    </div>

                        <?php }


                         ?>
                       </section>

                       <!-- START ADRESSE-->
<div id="buttomadress" class="buttomadress">
<div class="card">
<div class="card-header">
<strong><?php echo lang("shippingAdress"); ?></strong>
</div>


</div>
</div>




                      <?php


                        ?>



                     </div>

                  </div>

              </div>
        </div>

        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
          <div class="sidebar_right_contnr"> <!-- SIDEBAR BUTTOM-->
          <div class=" sidebar_right ">
             <div class="shop-div">

               <input type="hidden" id="ID_Pri" name="" value="<?php echo $value['Price']; ?>">
               <input type="hidden" id="item_ID" name="itemid" value="<?php echo $_GET['itemid'];  ?>">
               <input type="hidden" id="itm_no_br" name="" value="<?php echo $item_nombre; ?>">

               <div class="form-group saving_div">
                 <label for="savingid"> <strong> <?php echo lang('saving') ?> </strong></label>
                 <input type="text" class="form-control" id="savingid" aria-describedby="emailHelp" placeholder="<?php echo lang("enterPromoAndRewardsCode"); ?>">
                 <button type="button" id="btn_apply" class="btn btn-primary btn-sm" name="button"><?php echo lang("apply"); ?></button>
                 <p><?php echo lang("productDiscount").": "; ?> <span id="productDiscount_span_id" class="float-right">0</span> </p>
               </div>
               <hr>
               <div class="orderSummary_div">
                 <p class="text-center"> <strong> <?php echo lang("orderSummary"); ?> </strong> </p>
                 <p><?php echo lang("orderValue").": "; ?> <span id="order_value_span"class="float-right"></span> </p>
                 <p><?php echo lang("saving").": "; ?> <span id="saving_span_order" class="float-right"></span> </p>
                 <hr>
               </div>
               <div class="">
                 <p><?php echo lang("subtotal").": "; ?> <span id="subtotal_span_order" class="float-right"> </span> </p>
                 <p><?php echo lang("shipping").": "; ?> <span id="shipping_span_order" class="float-right"></span> </p>
                 <hr>
               </div>
               <div class="">
                 <p><?php echo lang("orderTotal").": "; ?> <span id="ordertotal_span_oorder" class="float-right"></span> </p>
               </div>
               <hr>
               <div class="proceedToCheckout_div text-center">
                 <button type="button"  id="proceedToCheckout_btn" class="btn btn-primary" name=""><?php echo lang('proceedToCheckout'); ?></button>
               </div>
             </div>
           </div>
         </div> <!-- END SIDEBAR BUTTOM-->
    </div>



    </div>

</div>

  <?php

*/
include($template ."footer.php");

}
else {
  header("location:login.php");
  exit();
}

 ?>
