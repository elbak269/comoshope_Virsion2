<?php
ob_start();
session_start();
$notheader="";
$pageTitle = "";
$itemsforshopping_css="";
$itemsshopping_for_client_js ="";
$set_footer = "";
include("init.php");

if (isset($_SESSION['user'])  && isset($_GET['itemid']) && isset($_GET['order'])) {
  $clientid = getclientID($_SESSION['user']);
  $checkclient_is_who_bought = checkif_client_is_who_bought_order($_GET['order']);

  if ($checkclient_is_who_bought == $clientid ) {

  ?>
  <input id="clint__" type="hidden" name="" value="<?php echo $clientid; ?>">
<input type="hidden" id="prodct_id" name="" value="<?php echo $_GET['itemid']; ?>">
<input type="hidden" id="order_id" name="" value="<?php echo $_GET['order']; ?>">
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


<div class="alert_cancel_order disp_none">
  <div class="sup_alert_cancel_order">
    <p class="text-center"> <strong id="title_su_can_or"><?php echo lang("sure_cancel_order")." ? "; ?></strong> </p>
    <p id="prod_nam" class="text-center"></p>
    <div class="row">
      <div class="col-6 text-center">
        <button type="button" id="yes_cancel_ord" class="btn btn-primary" name="button"><?php echo lang("yes"); ?></button>
      </div>
      <div class="col-6 text-center">
       <button type="button" id="no_cancel_ord" class="btn btn-primary" name="button"><?php echo lang("no"); ?></button>
      </div>

    </div>

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
orderdetails.SallerID AS sellerid,
Orders.Adress as addrsid,
Orders.RECEPIENT as recipientid,
orderdetails.StatusOrder,
orders.RECEPIENT,
orderdetails.OrderID as order_id,
orders.RequestDate,
orders.Place_shipping,
items.Ship_Method_Ngazidja,
items.Ship_Method_Ndzuwani,
items.Ship_Method_Mwali,
items.Ship_Method_France,
orderdetails.Expected_delvery_date,
orders.Track_Number,
orders.DelevredDate,
items.ItemID
 FROM orderdetails
 INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
 INNER JOIN items ON items.ItemID = orderdetails.ProductID
 INNER JOIN sellers ON sellers.SellerID = items.MemberID
 INNER JOIN currency ON currency.CurrencyID =items.CurrencyID
 INNER JOIN clients ON clients.ClientID = orders.ClientID

WHERE orders.ClientID = :CLIENTID AND items.ItemID= :ITMEMID AND orderdetails.OrderID = :ORDERID");
$stmt->bindParam(":CLIENTID",$clientid,pdo::PARAM_INT);
$stmt->bindParam(":ITMEMID",$_GET['itemid'],pdo::PARAM_INT);
$stmt->bindParam(":ORDERID",$_GET['order'],pdo::PARAM_INT);
$stmt->execute();
$fetch = $stmt->fetchAll();
$rowcot = $stmt->rowCount();
if($rowcot <= 0){
  header("profile.php:dashboard.php");
  exit();

  }
foreach ($fetch as  $value) {
  $ship_m = null;
   if ($value["Place_shipping"] == 1) {
  $ship_m = $value["Ship_Method_Ngazidja"];
  }elseif ($value["Place_shipping"] == 2) {
    $ship_m = $value["Ship_Method_Ndzuwani"];
  }elseif ($value["Place_shipping"] == 3) {
      $ship_m = $value["Ship_Method_Mwali"];
  }elseif ($value["Place_shipping"] == 3) {
    $ship_m = $value["Ship_Method_France"];
  }


?>



<?php if ($value["StatusOrder"] == 2) { ?>
 <h5 class="text-center"> <strong id="ship_st"> <?php echo lang("on_way"); ?> </strong></h5>
<?php } ?>


<div class="row">
  <div class="col-sm-12 col-lg-8">
    <div class="content_info">
      <h5 class="text-center ">  <strong><?php echo lang("product"); ?></h5></strong>
      <div class="row">
        <div class="col-sm-12 col-lg-7">
          <div class="sup_1_content_info">
              <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self" alt="">
          </div>

        </div>

        <div class="col-sm-12 col-lg-5">
          <div class="sup_2_content_info">


            <?php if ($value["StatusOrder"] == 4) { ?>
              <div class="alert alert-info text-center">
                <strong> <?php echo lang("retu_pending"); ?> </strong>
              </div>

            <?php } ?>



            <p> <strong><?php echo lang("order_number")." : "; ?></strong> <span><?php echo $value["order_id"];?></span> </p>
            <p> <strong><?php echo lang("requestDate")." : "; ?></strong> <span> <?php echo  $value["RequestDate"]; ?></span> </p>
            <?php if ($value["StatusOrder"] == 3) {
              ?>
              <p> <strong><?php echo lang("delver_the_order")." : "; ?></strong>  <span><?php echo $value["DelevredDate"]; ?></span> </p>
              <?php
            } ?>
            <?php if($value["StatusOrder"] == 2){ ?>
            <p> <strong><?php echo lang("expect_date")." : "; ?></strong> <span> <?php echo $value["Expected_delvery_date"];  ?> </span> </p>
          <?php }

          if (($value["StatusOrder"] == 2 || $value["StatusOrder"] == 3) && ($ship_m != "3")) {
          ?>
          <p class="_green_"> <strong><?php echo lang("tracking_number")." : "; ?></strong> <span> <?php echo $value["Track_Number"];  ?> </span> </p>
          <?php
          }

           ?>
            <p><i class="fas fa-shopping-basket"></i> <strong> <?php echo lang("nameOfItem")." : "; ?> </strong>
            <span><?php echo $value['itemName']; ?></span>
               <input id="inp_prod_name" type="hidden" name="" value="<?php echo $value['itemName']; ?>">
           </p>
           <p><i class="fas fa-shopping-basket"></i> <strong> <?php echo lang("nombreOfProduct")." : "; ?> </strong>
             <span><?php echo $value['nombreofitem']?></span>

           </p>
           <p><i class="fas fa-money-bill-wave"></i> <strong><?php echo lang("price")." : " ?></strong>
             <span id="pr_ce_ND_CURE__"></span>
           </p>
           <p><i class="fas fa-tags"></i> <strong><?php echo lang("discount")." : ";?></strong>
             <span id="discd_"></span>
           </p>


           <p><i class="fas fa-shopping-basket"></i> <strong><?php echo lang("amount")." : "; ?> </strong>
             <span id="amunt_"></span>
           </p>

           <p><i class="fas fa-shopping-basket"></i> <strong><?php echo lang("orderTotal")." : "; ?> </strong>
             <span id="order_total"></span>
           </p>

          </div>

        </div>

      </div>

    </div>
  </div>
  <div class="col-sm-12 col-lg-4">

    <div class="content_info_2">
      <div class="">
      </div>
      <div class="ship__div">
        <p><strong> <?php echo lang("shipping"); ?></strong></p>
        <p> <i class="fas fa-truck"></i> <strong><?php echo lang("shippingPrice").": ";?></strong>
          <span id="_ship_pric"></span>
        </p>

       <p> <i class="fas fa-truck"></i> <strong> <?php echo lang("shipment_method")." : ";  ?> </strong> <span> <?Php
         if ($value["Place_shipping"] == 1) {
        echo  get_shipment_method_name($value["Ship_Method_Ngazidja"]);

        }elseif ($value["Place_shipping"] == 2) {
          echo  get_shipment_method_name($value["Ship_Method_Ndzuwani"]);
        }elseif ($value["Place_shipping"] == 3) {
            echo  get_shipment_method_name($value["Ship_Method_Mwali"]);
        }elseif ($value["Place_shipping"] == 3) {
          echo  get_shipment_method_name($value["Ship_Method_France"]);
        } ?>
       </span>  </p>



      </div>
      <div class="sub_2_info_2">

       <P> <strong> <i class="fas fa-user"></i> <?PHP echo lang("recepient")." : ";?> </strong> <span> <?php echo $value["RECEPIENT"]; ?></span> </P>
       <p>
       <i class="fas fa-store"></i> <strong><?php
         $stmclenm = $conn->prepare("SELECT StoreName FROM sellers
         INNER JOIN clients ON clients.ClientID = SELLERS.ClientID
           INNER JOIN orders ON orders.ClientID = clients.ClientID
           INNER JOIN orderdetails ON orderdetails.OrderID = orders.OrderID
           WHERE orderdetails.SallerID = :SELLERID AND orderdetails.ProductID = :PRDUCTID
           GROUP BY StoreName");
           $stmclenm->bindparam(":SELLERID",$value["sellerid"],PDO::PARAM_INT);
           $stmclenm->bindparam(":PRDUCTID",$_GET["itemid"],PDO::PARAM_INT);
           $stmclenm -> execute();
           $fetchclenm = $stmclenm->fetchAll();
           foreach ($fetchclenm as  $value22) {

          echo lang("seller").":";?></strong>
          <a href="#"><span><?php echo $value22['StoreName']; }  ?></span></a>
       </p>



       <div class="send_clent_msg_div_btn ">
         <?php
         if($value["StatusOrder"] == "1") {
         ?>
          <button type="button" id="btn_chat" class="btn btn-primary"><?php echo lang("sendMessage"); ?></button>
         <button id="btn_cencel_order" type="button" class="btn btn-danger btn_deliver "><?php echo lang("cancelOrder"); ?></button>
         <?php
       } // IEND IF ISSET GET[WAITINGORDERS]
       elseif ($value["StatusOrder"] == "2") {
         ?>
         <button type="button" id="btn_chat" class="btn btn-primary"><?php echo lang("sendMessage"); ?></button>
         <button id="btn_cencel_order" type="button" class="btn btn-danger btn_deliver "><?php echo lang("cancelOrder"); ?></button>
         <?php

       }
       elseif ($value["StatusOrder"] == "3") {
         ?>
          <button type="button" id="btn_chat" class="btn btn-primary"><?php echo lang("sendMessage"); ?></button>
         <a id="btn_return_order" href="return_product.php?return=rtn&prod=<?php echo $value["ItemID"]; ?>&order=<?php echo $value["order_id"]; ?>" type="button" class="btn btn-danger btn_deliver "><?php echo lang("returnorder"); ?></a>
         <?php

       }
       elseif ($value["StatusOrder"] == "5") {
         ?>
          <button type="button" id="btn_chat" class="btn btn-primary"><?php echo lang("sendMessage"); ?></button>
         <?php

       }else{
        // header("location:dashboard.php");
         //exit();
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
                                  <input type="hidden" id="clientid_inp" value=" <?php echo trim($clientid); ?> " >
                                  <input type="hidden" id="serlerid_inp"  value="     <?php echo trim($value["sellerid"]); ?> " >
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
}else{
  header("location:index.php");
  exit();
}
}
else {
  header("location:index.php");
  exit();
}


  ob_end_flush();
?>
