<?php
ob_start();
session_start();
$notheader="";
$pageTitle = "";
$itemsforshopping_css="";
$itemsforshopping_js ="";
$set_footer = "";
include("init.php");
$sellerid = getsellerid($_SESSION['user']);
$clientid  = getclientID($_SESSION['user']);
$ex = ifsellerexists($sellerid);
$check_own_prod = checkif_prudct_is_own_seller_order($_GET['itemid']);

if (isset($_SESSION['user']) && $check_own_prod == $sellerid  && $ex>0 && isset($_GET['itemid']) && isset($_GET['order'])) {
  ?>
<input type="hidden" id="prodct_id" name="" value="<?php echo $_GET['itemid']; ?>">
<input type="hidden" id="order_id" name="" value="<?php echo $_GET['order']; ?>">
<input type="hidden" id="seler___" name="" value="<?php echo $sellerid; ?>">
  <?php
?>
<div class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <?php echo lang("brand"); ?>
  </a>

  <div class="float-right">
     <i class="fas fa-user seller_user"></i>
  </div>
</div>
<div class="cont">
<?php

$stmt = $conn->prepare("SELECT currency.CurrencyName AS curencyName,
items.Pic1,
items.Price AS itemPrice,
items.Name AS itemName,
orders.requestDate as requestorderdate,
orderdetails.Discount AS usingpromo,
orderdetails.QTY AS nombreofitem,
orderdetails.total_amount AS ordertotal,
orders.OrderID  AS orderId,
orders.ClientID AS orderclientid,
clients.FirstName AS clientfirstname,
clients.LastName AS clientlastname,
orderdetails.StatusOrder,
orderdetails.Shipr_Price,
orders.Adress,
orders.RECEPIENT,
items.ItemID,
items.Price,
orderdetails.OrderID as order_number,
orders.RequestDate,
orderdetails.StatusOrder,
orders.payment_method,
items.Ship_Method_Ngazidja,
items.Ship_Method_Ndzuwani,
items.Ship_Method_Mwali,
items.Ship_Method_France,
orders.Place_shipping,
orderdetails.Expected_delvery_date,
orderdetails.Code_For_Self_Ship,
orderdetails.DelevredDate,
orderdetails.Product_Img_For_Return,
orderdetails.reason_for_returned_orders,
orderdetails.Order_Returned_Code

 FROM orderdetails
 INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
 INNER JOIN items ON items.ItemID = orderdetails.ProductID
 INNER JOIN sellers ON sellers.SellerID = orderdetails.SallerID
 INNER JOIN currency ON currency.CurrencyID = items.CurrencyID
 INNER JOIN clients ON clients.ClientID = orders.ClientID


WHERE sellers.SellerID = ? AND items.ItemID=? AND orderdetails.OrderID =?");
$stmt->execute(array($sellerid,$_GET['itemid'],$_GET['order']));
$fetch = $stmt->fetchAll();
$rowcot = $stmt->rowCount();
if($rowcot <= 0){
header("location:dashboard.php");
exit();

}
foreach ($fetch as  $value) {
?>
<input type="hidden" id="code_for_slef_ship" name="" value="<?php echo $value["Code_For_Self_Ship"]?>">
<div class="row">
  <div class="col-sm-12 col-lg-8">
    <div class="content_info">
    <!--  <h5 class="text-center ">  <strong><?php// echo lang("product"); ?></h5></strong> -->
      <div class="row">
        <div class="col-sm-12 col-lg-7">
          <div class="sup_1_content_info">
              <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self" alt="">
          </div>

        </div>

        <div class="col-sm-12 col-lg-5">

          <div class="content_info_2">
            <div class="">
              <h5 class=""><strong><?php echo lang("client"); ?></strong></h5>
            <!--  <img class="client_img" src="<?php //echo $img."client.png" ?>"  alt="client"> -->
            <?php if ($value["StatusOrder"] == 4) {?>

            <div class="return_client">
              <h5 class="text-center"> <strong class="h5_return_pr"><?php echo lang("client_asked_return_product"); ?></strong> </h5>
              <div class="div_return_img text-center">
                <img id="img_return_prod" src="<?php echo $value["Product_Img_For_Return"]; ?>" alt="">
              </div>
              <div class="reson_return">
                <p class="text-center tile_reason_retu"> <strong><?php echo lang("reason_for_retunr_prod"); ?></strong> </p>
                <p class="text-center p_rason_ret"><?php echo $value["reason_for_returned_orders"] ?></p>

              </div>

            </div>

          <?php }
          else if($value["StatusOrder"] == 5) {
          ?>
          <h5 class="h5_return_pr"> <strong> <?php echo lang("ALREADY_RETURNED_PR")  ?> </strong> </h5>
      
          <?php
          } ?>

            <div class="adress_div">
              <h5 > <strong><?php echo lang("shippingAdress"); ?></strong> </h5>
              <p class="bold_ _green_"><i class="fas fa-map-marker"></i> <strong> <?php echo lang("shippingAdress").": "; ?> </strong>
              <span > <?php echo $value['Adress'];?> </span>
             </p>
            <p> <i class="fas fa-truck"></i> <strong><?php echo lang("shippingPrice").": ";?></strong><span id="_ship_pric"></span></p>
            <p> <i class="fas fa-truck"></i> <strong><?php echo lang("shipment_method")." : "; ?></strong> <span><?Php
            $ship_m = null;
             if ($value["Place_shipping"] == 1) {
            echo  get_shipment_method_name($value["Ship_Method_Ngazidja"]);
            $ship_m = $value["Ship_Method_Ngazidja"];
            }elseif ($value["Place_shipping"] == 2) {
              echo  get_shipment_method_name($value["Ship_Method_Ndzuwani"]);
              $ship_m = $value["Ship_Method_Ndzuwani"];
            }elseif ($value["Place_shipping"] == 3) {
                echo  get_shipment_method_name($value["Ship_Method_Mwali"]);
                $ship_m = $value["Ship_Method_Mwali"];
            }elseif ($value["Place_shipping"] == 3) {
              echo  get_shipment_method_name($value["Ship_Method_France"]);
              $ship_m = $value["Ship_Method_France"];
            } ?></span> </p>
            <?php
            if( $value["StatusOrder"] == 2){
             ?>
             <p>  <strong><?php echo lang("expect_date")." : ".$value["Expected_delvery_date"] ?></strong> </p>
             <?php
            }else{

            }

            if ($value["StatusOrder"] == 2  && $ship_m == 3) {
              ?>
              <div class="form-group">
                <label for="order_code"><?php echo lang("order_code")?></label> <span class="reqired"></span>
                <input type="number" class="form-control" id="order_code" name="truck_numer__" required  aria-describedby="emailHelp" placeholder="<?php echo lang("enter_order_code")?>" autocomplete="off">
              </div>
              <?php

            }

            if ($value["StatusOrder"] == 3) {
              ?>
              <p> <strong><?php echo lang("delevred_date")." : "; ?></strong> <span><?php echo  $value["DelevredDate"] ?></span> </p>
              <?php
            }

             ?>
            </div>

            <div class="reci_ma_div">
              <h5> <strong><?php echo lang("recp_name") ?></strong> </h5>
              <p class="bold_ _green_" >
               <i class="fas fa-user"></i> <strong><?php echo lang("recp_name").": ";?></strong>
               <span class=" bold_ _green_"><?php echo $value["RECEPIENT"];?></span>
              </p>

              <p>
                <i class="fas fa-user"></i> <strong><?php
                $stmclenm = $conn->prepare("SELECT Username FROM Clients
                  INNER JOIN orders ON orders.ClientID = clients.ClientID
                  WHERE orders.ClientID = ? AND orders.OrderID = ? ");
                  $stmclenm -> execute(array($value['orderclientid'],$_GET['order']));
                  $fetchclenm = $stmclenm->fetchAll();
                  foreach ($fetchclenm as  $value22) {


                 echo lang("clientUsername").": ";?></strong>
                 <a href="#"><span><?php echo get_client_user_by_orderid($value["orderId"]); }  ?></span></a>
              </p>
            </div>

            <?php


             if ($ship_m != "3" && $value["StatusOrder"] == 1) {
             ?>
             <input id="_ship_meth__" type="hidden" name="" value="<?php echo  $ship_m?>">
            <div class="form-group">
              <label for="truck_numer__"><?php echo lang("tracking_number")?></label> <span class="reqired">*</span>
              <input type="number" class="form-control" id="truck_numer__" name="truck_numer__" required  aria-describedby="emailHelp" placeholder="<?php echo lang("enter_tracking_number")?>" autocomplete="off">
            </div>
          <?php }elseif ($ship_m != "3" && $value["StatusOrder"] == 2) {
            ?>
            <div  class="_edit_truck_num_div row">
              <div class="din_in_trac_n">
                <div class="form-group">
                  <label for="truck_numer__"><?php echo lang("edit_tracking_number")?></label> <span class="reqired"></span>
                  <input type="number" class="form-control" id="edit_truck_numer__" name="truck_numer__" required  aria-describedby="emailHelp" placeholder="<?php echo lang("edit_tracking_number")?>" autocomplete="off">
                </div>

              </div>
              <div class="btn_di_in_trac_n">
                <button type="button" id="btn_tuck_number_edit" class="btn btn-primary" name="button"> <i class="fas fa-edit"></i> <?php echo lang("edit_tracking_number"); ?></button>

              </div>

            </div>

            <?php

          }


           ?>
            </div>



          </div>

        </div>

      </div>

    </div>
  </div>


  <div class="col-sm-12 col-lg-4">



    <div class="order_div_">
      <?php if ($value["StatusOrder"] == "1") {
  ?>
      <h5 class="text-center wait_cls"> <strong><?php echo lang("wating_your_aproval");?></strong> </h5>
    <?php }?>
      <p><strong><?php echo lang("order_number")." :"; ?> <span><?php echo  $value["order_number"]; ?></span> </strong> </p>
      <p> <strong><?php echo lang("requestDate")." : "; ?></strong> <span><?php echo $value["RequestDate"];?></span> </p>

    </div>
    <div class="sup_2_content_info">
      <p> <strong><?php echo  lang("payment_method")." : "; ?></strong>  <span><?php if($value["payment_method"] != "2" ){echo lang("online_payment");}else{ echo lang("cash");} ?></span> </p>
      <p><i class="fas fa-shopping-basket"></i> <strong> <?php echo lang("nameOfItem").": "; ?> </strong><span><?php echo$value['itemName']; ?></span></p>
     <p class="bold_ _green_"><i class="fas fa-shopping-basket"></i> <strong> <?php echo lang("nombreOfProduct").": "; ?> </strong><span class="bold_ _green_"><?php echo $value['nombreofitem']?></span></p>
     <input id="id_price_"type="hidden" name="" value="<?php echo $value["Price"]; ?>">
     <input id="product__id"type="hidden" name="" value="<?php echo $value["ItemID"]; ?>">
     <p ><i class="fas fa-money-bill-wave"></i> <strong><?php echo lang("price")." : "; ?></strong> <span id="pr_ce_ND_CURE__"></span></p>
     <p><i class="fas fa-tags"></i> <strong><?php echo lang("discount").": ";?></strong> <span id="discd_"></span>
     </p>


     <p><i class="fas fa-shopping-basket"></i> <strong><?php echo lang("amount").":"; ?> </strong><span id="amunt_"></span></p>
     <p><i class="fas fa-shopping-basket"></i> <strong><?php echo lang("orderTotal").":"; ?> </strong><span id="order_total"></span></p>

     <div class="sub_2_info_2">

<?php if ($value["StatusOrder"] == 1) {?>
      <div class="expected_date_class">
         <i class="fas fa-table"></i>    <label for=""><?php echo lang("expected_date"); ?> </label>
         <input id="expected_deliver_da_inp"  type="date" class="form-control" >
      </div>

    <?php }
    if ($value["StatusOrder"] == 4) {
      ?>
      <div class="form-group">
        <input type="hidden" id="code_or_" name=" " value="<?php echo $value["Order_Returned_Code"]; ?>">
        <label for="code_return_ord"><?php echo lang("order_return_code")?></label> <span class="reqired"> *</span>
        <input type="number" class="form-control" id="code_return_ord" name="truck_numer__" required  aria-describedby="emailHelp" placeholder="<?php echo lang("order_return_code")?>" autocomplete="off">
      </div>
      <?php
    }

    ?>

      <div class="send_clent_msg_div_btn ">
        <?php
        if($value["StatusOrder"] == "1") {
        ?>
        <button type="button" id="btn_chat" class="btn btn-primary"><?php echo lang("sendMessage"); ?></button>
        <button id="btn_cencel_order" type="button" class="btn btn-danger btn_deliver "><?php echo lang("cancelOrder"); ?></button>
        <button id="btn_confirm_order" type="button" class="btn btn-success btn_deliver "><?php echo lang("deliverProduct"); ?></button>
        <?php
      } // IEND IF ISSET GET[WAITINGORDERS]
      elseif ($value["StatusOrder"] == "2") {
        ?>

         <?php if ($ship_m == 3) {
          ?>
          <button type="button" id="btn_delver_ord" class="btn btn-primary"><?php echo lang("delver_the_order"); ?></button>
          <?php
         } ?>
        <button id="btn_cencel_order" type="button" class="btn btn-danger btn_deliver "><?php echo lang("cancelOrder"); ?></button>
         <button type="button" id="btn_chat" class="btn btn-primary"><?php echo lang("sendMessage"); ?></button>
        <?php

      }
      elseif ($value["StatusOrder"] == "3") {
        ?>
   <!--<button type="button" id="btn_chat" class="btn btn-primary"><?php// echo lang("sendMessage"); ?></button> -->
         <?php

      }
      elseif ($value["StatusOrder"] == "4") {
        ?>
   <button type="button" id="btn_chat" class="btn btn-primary"><?php echo lang("sendMessage"); ?></button>
    <button type="button" id="btn_return_prod" class="btn btn-primary"><?php echo lang("return_the_product"); ?></button>
         <?php

      }
      elseif ($value["StatusOrder"] == "5") {
        ?>
<button type="button" id="btn_chat" class="btn btn-primary"><?php echo lang("sendMessage"); ?></button>
         <?php

      }
        ?>
        <input id="orderinput" type="hidden" name="" value="<?php echo $value['orderId'];?>">
        <div class="clear">

        </div>
      </div>

     </div>

    </div>



      <div id="chat_div" class="">

                <div class="row">

                        <div id="chat">
                          <!--  <input type="text" name="" id="username" class="form-control" placeholder="enter your username">
                            <br> -->
                            <div class="card">
                                <div id="message" class="card-block">
                                    <input type="hidden" id="client1" value=" <?php echo trim($sellerid); ?> " >
                                    <input type="hidden" id="client2"  value=" <?php echo trim($value["orderclientid"]); ?> " >
                                    <input type="hidden" id="lick_conn"  name="" value="<?php echo $nodejs ?>">

                                </div>
                            </div>

                            <input id="textarea" class="form-control" name="" placeholder="enter message" cols="30" rows="1"></input>
                        </div>

                </div>
      </div>



  </div>


</div>
<?php
}
 ?>

 <div id="alert_delever_success" class="alert alert-success text-center" role="alert">
   <strong>
 <?php
 echo lang("succfullAccomplished").lang("buyerWating");
 ?>
 </strong>
 </div>
 <div id="alert_delever_danger" class="alert alert-danger text-center" role="alert">
   <strong>
<?php echo lang("operationFailed"); ?>
</strong>
</div>

</div>
<?php
include($template ."footer.php");
}
else {
  header("location:index.php");
  exit();
}


  ob_end_flush();
?>
