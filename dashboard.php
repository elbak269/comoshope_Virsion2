<?php
ob_start();
session_start();
$notheader="";
$pageTitle = "Dashboard";
$dashboard_css="";
$dashboard_js ="";
$set_footer = "";
include("init.php");

if (isset($_SESSION['user'])) {
$sellerid = getsellerid($_SESSION['user']);
$CLIENT_ID = getclientID($_SESSION['user']);
?>
<div class="div_loader">
	 <div class="loader"></div>
</div>
<input id="saler__inp" type="hidden" name="" value="<?php echo $sellerid; ?>">
<?php
$ex = ifseller_is_exists($CLIENT_ID);
if ($ex>0) {

$stmt = $conn ->prepare("SELECT items.* , currency.CurrencyName  FROM  items
INNER JOIN currency ON currency.CurrencyID = items.CurrencyID
WHERE MemberID = ?");
$stmt -> execute(array($sellerid));
$fetch  = $stmt-> fetchAll();
?>
<div class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
    <?php echo lang("brand"); ?>
  </a>

  <div class="float-right">
     <i class="fas fa-user seller_user"></i>
  </div>
</div>



<div class="alert_delte_prod_div disp_none">
<div class="cont_div_info_del_pr">
  <p class="text-center"> <strong id="sure_delet_pr"><?php echo lang("sure_delete_pruct");  ?></strong> </p>

  <div class="row text-center">
    <div class="col-6">
     <button id="btn_confr_dlete" type="button" class="btn btn-primary" name="button"><?php echo lang("yes"); ?></button>
    </div>
    <div class="col-6">
     <button id="btn_deny_dlete" type="button" class="btn btn-primary" name="button"><?php echo lang("no"); ?></button>
    </div>


  </div>

</div>

</div>


<div class="cont">



  <div class="row">
   <div class="side_bar col-12 col-sm-12 col-md-3 col-lg-3  col-xl-3">
    <div class="card ">
     <div class="card-header">
        <a href="?dashboard-dash"> <i class="fas fa-tachometer-alt"></i> <span><?php echo lang("dashboard") ?></span> </a>
     </div>
     <ul class="list-group list-group-flush">
      <!-- <li class="list-group-item">  <a id="item" href="?dash_item&allitem"><?php //echo lang("item") ?></a> </li> -->
    <!--  <li class="list-group-item">  <a  id="order"href="?order"><?php// echo lang("orders") ?></a> </li> -->
       <li class="list-group-item"> <a  id="myprdocuts_id" href="dashboard.php?myproducts=1"><?php echo lang("myproducts") ?></a> </li>
       <li class="list-group-item"> <a id="" href="dashboard.php?dashboard-dash"><?php echo lang("myorders") ?> </a> </li>
        <li class="list-group-item"> <a id="" href="<?php echo 'additem.php?add_item' ?>"><?php echo lang("addNewItem") ?></a> </li>
      <li class="list-group-item"> <a id="seting" href="chat.php"><?php echo lang("chat") ?> </a> </li>


     </ul>
   </div>

   <div class="card ">
    <div class="card-header">
       <a href="?dashboard-dash"> <i class="fas fa-tachometer-alt"></i> <span><?php echo lang("myAcitivity") ?></span> </a>
    </div>
    <ul class="list-group list-group-flush">
     <li class="list-group-item">  <a  id="order"href=""><?php echo lang("myreviews") ?></a> </li>
     <li class="list-group-item"> <a  id="advertising" ref="?advertising"><?php echo lang("myquestion") ?></a> </li>
       <li class="list-group-item"> <a  id="advertising" href="?advertising"><?php echo lang("advertising") ?></a> </li>

    </ul>
  </div>

  <div class="card ">
   <div class="card-header">
      <a href="?dashboard-dash"> <i class="fas fa-tachometer-alt"></i> <span><?php echo lang("setting") ?></span> </a>
   </div>
   <ul class="list-group list-group-flush">
     <li class="list-group-item">  <a id="item" href="?dash_item&allitem"><?php echo lang("acountInformation") ?></a> </li>
    <li class="list-group-item">  <a  id="order"href="?order"><?php echo lang("notificationList") ?></a> </li>
    <li class="list-group-item"> <a id="seting" href="?seting"><?php echo lang("setting") ?> </a> </li>
   </ul>
 </div>
  </div>
  <?php if (isset($_GET['dashboard-dash'])){ ?>
  <div class="con_tent card-dashboard col-12 col-sm-12 col-md-9 col-lg-9  col-xl-9">
  <div class="card  ">
    <div class="card-header">
      <i class="fas fa-tachometer-alt"></i> <span><?php echo lang("dashboard") ?></span>
       <a id="add_pr_lin_in_dash_card" href="<?php echo 'additem.php?add_item' ?>"> <span  class="float-right"> <i class="fas fa-plus">  </i> <?php echo lang("addNewItem") ?> </span> </a>
    </div>
    <div class="row  crad_bod_dashboard">

  <div class="col-12 col-sm-12 col-md-3 ">
    <div class="card">
      <a href="#">
      <div class="card-body awaitingaction ponter">
        <h5 class="card-title text-center "><?php echo lang("not_aproved_orders") ?></h5>
        <p class="text-center">
         <?php

            echo "<a href='dashboard.php?dashboard-dash&?orders=waitingaction_1'>".count_not_aproved_orders_for_saler($sellerid)."</a>";

          ?>
        </p>

      </div>
    </a>
    </div>
  </div>

  <div class="col-12  col-sm-12 col-md-3">
    <div class="card notShipped">
      <div class="card-body">
        <h5 class="card-title text-center "><?php echo lang("on_way") ?></h5>
        <p class="text-center">
          <?php

             echo "<a href='dashboard.php?dashboard-dash&?orders=on_way_orders'>".count_on_way_orders_for_saler($sellerid)."</a>";

           ?>
        </p>
      </div>
    </div>
  </div>

  <div class="col-12  col-sm-12 col-md-3">
    <div class="card completedOrder">
      <div class="card-body text-center">
        <h5 class="card-title "><?php echo lang("completedOrder") ?></h5>
        <p class="text-center">
          <?php

             echo "<a href='dashboard.php?dashboard-dash&?orders=completeorder'>".count_completed_orders_for_saler($sellerid)."</a>";

           ?>
        </p>
      </div>
    </div>
  </div>

  <div class="col-12  col-sm-12 col-md-3">
    <div class="card returnedOrder">
      <div class="card-body returnedOrder text-center">
        <h5 class="card-title "><?php echo lang("request_retu_ord") ?></h5>
        <p class="">
          <?php

             echo "<a href='dashboard.php?dashboard-dash&?orders=returnedOrder'>".count_returned_orders_for_saler($sellerid)."</a>";

           ?>
        </p>
      </div>
    </div>
  </div>



</div>
  </div>



  <div class="card cad_it_ms">
    <div class="card-header text-center">
     <strong> <span class= "h5_wating_prod"><?php echo lang("productNotShippedYet") ?></span> </strong>
    </div>
      <div class="card-body not_aproved_order__">
        <div class="card_ites_inf ">


            <?php

            if (count_not_aproved_orders_for_saler($sellerid)>0) {
              ?>
            <section class="slider_center text-center">
              <?php
             foreach(orders_for_salers($sellerid,1) AS $value ){
             ?>
            <div class="col-img  supper_div_link_div div_wattingorder  swiper-slide "> <!-- NOT Aproved yet -->
                <div class="supper_div_im1 ">
                  <a class="supper_div_link" href="<?php echo "itemforshipping.php?itemid=".$value["product_id"]."&order=".$value["orderID"]."&wattingorder";?>">
              <div class="div_img_item_1">
                <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self" alt="">
              </div>
              <div class="name_of_item ">
                <p> <?php ?> <span> <?PHP echo $value['Name'];?> </span></p>
                 <p> <span><?PHP  echo lang("qty")." : ";?> </span> <span><?PHP echo $value['QTY'] ?></span></p>
                <p class="text-center"><?php echo lang("requestDate").":"; ?> <span><?php echo  $value['requestorderdate']; ?></span> </p>
                <div class="text-center">
                   <strong class="ship_sp"><?php echo lang("shippingAdress"); ?></strong>
                   <p> <span><?php echo   $value['ship_adres']; ?></span> </p>
                </div>
              </div>
              </a>
            </div>
            </div>
                          <!--Items -->
          <?php  }

          ?>
          </section>
          <?php
         } // end if there are orders not aproved for orders

          else {
            ?>
            <div class="alert alert-info text-center col">
              <?php echo lang("noOrders"); ?>
            </div>
            <?php
          }?>


        </div>

      </div>
 </div>   <!-- END not aproved ITEMS-->

 <div class="card cad_it_ms"> <!-- order wating -->
   <div class="card-header text-center">
    <strong> <span class="span_not_ship_ye" ><?php echo lang("waitingproducts") ?></span> </strong>
   </div>
     <div class="card-body on_way_orders">
       <div class="card_ites_inf">
         <?php

         if (count_on_way_orders_for_saler($sellerid) > 0) {
          ?>
          <section class="slider_center">
          <?php
          foreach(orders_for_salers($sellerid,2) AS $value ){
          ?>
         <div id="div_notshiped" class="col-img   supper_div_link_div div_notshiped">
             <div class="supper_div_im1">
              <a class="supper_div_link" href="<?php echo "itemforshipping.php?itemid=".$value["product_id"]."&order=".$value["orderID"]."&notshiped"?>">
           <div class="div_img_item_1">
             <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self" alt="">
           </div>
           <div class="name_of_item ">
             <p> <?php ?> <span> <?PHP echo $value['Name'];?> </span></p>
              <p> <span><?PHP  echo lang("qty")." : ";?> </span> <span><?PHP echo $value['QTY'] ?></span></p>
             <p class="text-center"><?php echo lang("expect_date").":"; ?> <span><?php echo  $value['Expected_delvery_date']; ?></span> </p>
             <div class="text-center">
                <strong class="ship_sp"><?php echo lang("shippingAdress"); ?></strong>
                <p> <span><?php echo   $value['ship_adres']; ?></span> </p>
             </div>
           </div>
           </a>
         </div>

         </div>

       <?php  }
       ?>
     </section>
       <?php
      } // end if there are on way orders

       else {
         ?>
         <div class="alert alert-info text-center col">
           <?php echo lang("noOrders"); ?>
         </div>
         <?php
       }
       ?>

       </div>

     </div>
</div>  <!--orders on way shipped-->

<div class="card cad_it_ms"> <!-- orders completed-->
  <div class="card-header text-center">
   <strong> <span id="delevred_span"><?php echo lang("ordersCompleted") ?></span> </strong>
  </div>
    <div class="card-body completes_orders__">
      <div class="card_ites_inf">
        <?php

        if (count_completed_orders_for_saler($sellerid)>0) {
          ?>
          <section class="slider_center">

          <?php
         foreach(orders_for_salers($sellerid,3) AS $value ){


         ?>
         <div id="div_notshiped" class="col-img   supper_div_link_div div_notshiped">
             <div class="supper_div_im1">
             <a class="supper_div_link" href="<?php echo "itemforshipping.php?itemid=".$value["product_id"]."&order=".$value["orderID"]."&ordercompleted"?>">
           <div class="div_img_item_1">
             <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self" alt="">
           </div>
           <div class="name_of_item ">
             <p> <?php ?> <span> <?PHP echo $value['Name'];?> </span></p>
              <p> <span><?PHP  echo lang("qty")." : ";?> </span> <span><?PHP echo $value['QTY'] ?></span></p>
             <div class="text-center">
                <strong class="ship_sp"><?php echo lang("shippingAdress"); ?></strong>
                <p> <span><?php echo   $value['ship_adres']; ?></span> </p>
             </div>
           </div>
           </a>
         </div>
         </div>

      <?php  }
      ?>
    </section>
      <?php
    } //  if row count complete orders
    else {
      ?>
      <div class="alert alert-info text-center col">
        <?php echo lang("noOrders"); ?>
      </div>
      <?php
    }?>

      </div>

    </div>
</div> <!-- End orders completed-->






<div class="card cad_it_ms"> <!-- ASKED RETURN-->
  <div class="card-header text-center">
   <strong> <span id="returned_span"><?php echo lang("asked_return_order") ?></span> </strong>
  </div>
    <div class="card-body asked_returned_orders__">
      <div class="card_ites_inf">
        <?php

        if (count_returned_orders_for_saler($sellerid)>0) {
          ?>
          <section class="slider_center">

          <?php
         foreach(orders_for_salers($sellerid,4) AS $value ){


         ?>
         <div id="div_notshiped" class="col-img   supper_div_link_div div_notshiped">
             <div class="supper_div_im1">
             <a class="supper_div_link" href="<?php echo "itemforshipping.php?itemid=".$value["product_id"]."&order=".$value["orderID"]."&ordercompleted"?>">
           <div class="div_img_item_1">
             <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self" alt="">
           </div>
           <div class="name_of_item ">
             <p> <?php ?> <span> <?PHP echo $value['Name'];?> </span></p>
             <div class="text-center">
                <strong class="ship_sp"><?php echo lang("shippingAdress"); ?></strong>
                <p> <span><?php echo   $value['ship_adres']; ?></span> </p>
             </div>
             <div class="text-center">
               <p class="text-center "> <strong  class="date_reqs_ret"> <?php echo lang("asked_return_date"); ?> </strong> </p>
               <p><?php echo  $value['date_asked_for_return']; ?></p>

             </div>
           </div>
           </a>
         </div>
         </div>

      <?php  }
      ?>
    </section>
      <?php
    } //  if row count complete orders
    else {
      ?>
      <div class="alert alert-info text-center col">
        <?php echo lang("noOrders"); ?>
      </div>
      <?php
    }?>

      </div>

    </div>
</div>  <!--asked for return -->


<div class="card cad_it_ms"> <!-- ASKED RETURN-->
  <div class="card-header text-center">
   <strong> <span id="returned_span"><?php echo lang("asked_return_order") ?></span> </strong>
  </div>
    <div class="card-body asked_returned_orders__">
      <div class="card_ites_inf">
        <?php

        if (count__already_returned_orders_for_saler($sellerid)>0) {
          ?>
          <section class="slider_center">

          <?php
         foreach(orders_for_salers($sellerid,5) AS $value ){


         ?>
         <div id="div_notshiped" class="col-img   supper_div_link_div div_notshiped">
             <div class="supper_div_im1">
             <a class="supper_div_link" href="<?php echo "itemforshipping.php?itemid=".$value["product_id"]."&order=".$value["orderID"]."&ordercompleted"?>">
           <div class="div_img_item_1">
             <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self" alt="">
           </div>
           <div class="name_of_item ">
             <p> <?php ?> <span> <?PHP echo $value['Name'];?> </span></p>
              <p> <span><?PHP  echo lang("qty")." : ";?> </span> <span><?PHP echo $value['QTY'] ?></span></p>
             <div class="text-center">
                <strong class="ship_sp"><?php echo lang("shippingAdress"); ?></strong>
                <p> <span><?php echo   $value['ship_adres']; ?></span> </p>
             </div>

           </div>
           </a>
         </div>
         </div>

      <?php  }
      ?>
    </section>
      <?php
    } //  if row count complete orders
    else {
      ?>
      <div class="alert alert-info text-center col">
        <?php echo lang("noOrders"); ?>
      </div>
      <?php
    }?>

      </div>

    </div>
</div>



</div> <!-- END CARD DASHBOARD-->
<?php  }
elseif (isset($_GET['dash_item'])) {
?>
<!--START ITEM-->
<div class="card_item  col-12 col-sm-12 col-md-9 col-lg-9  col-xl-9">
  <div class="card ">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs row">
        <li class="nav-item ">
          <a class="nav-link  " id="allItem" href="?dash_item&allitem"><?php echo lang("allItem") ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="itemHasReported" href="?dash_item&itemsreported"><?php echo lang("itemHasReported") ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " id="itemHasComment" href="?dash_item&commentsitem"> <?php echo lang("itemHasComment") ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " id="itemRemoved" href="?dash_item&itemsremoved"> <?php echo lang("itemRemoved") ?></a>
        </li>
      </ul>
    </div>

    <div class="card-body item_body">
      <?php if(isset($_GET['allitem']) && isset($_GET['dash_item'])){ ?>
      <div class="row">
      <?php
      foreach ($fetch as  $value) {

        ?>
        <div class="col-img col-12 col-sm-12 col-md-4 col-lg- col-xl-4">
          <div class="supper_div_im1">
          <div class="div_img_item_1">
            <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self" alt="">
          </div>
          <div class="name_of_item">
            <p> <?php echo lang("name")." : "; ?> <span> <?PHP echo $value['Name'];?> </span></p>
            <p><?php echo lang("price")." : "; ?> <span><?PHP  echo $value['Price'] ?> </span> <span><?PHP echo $value['CurrencyName'] ?></span></p>
            <p><?php echo lang("addedDate")." : "; ?> <span><?php echo $value['AddDate']; ?>  </span></p>
            <p><?PHP echo lang("offer"). " : ";  if (empty($value['Offer'])) {
              echo "<span> ".lang("itemHasNotOffoer")." </span>";
            }else {
              echo "<span>".$value['Offer']."</span>";
            } ?></p>

          </div>
        </div>
        </div>
      <?php
      }
       ?>
      </div>
      <?PHP }
      elseif (isset($_GET['itemsreported']) && isset($_GET['dash_item'])) {
        echo "items reported";
      }
      elseif (isset($_GET['commentsitem']) && isset($_GET['dash_item'])) {
        echo "comment has comments";
      }
      elseif (isset($_GET['itemsremoved']) && isset($_GET['dash_item'])) {
        echo "comment has Removed";
      }  ?>
    </div>
  </div>

</div>
<?php }
else if($_GET["myproducts"]){
  ?>

 <div id="my_prod_cont"   class="my_prod_cont col-12 col-sm-12 col-md-9 col-lg-9  col-xl-9">
    <h4 class="text-center"><?php echo lang("myproducts"); ?></h4>
 </div>
 <div class="col-12 div_info__dle alert alert-success d-none text-center">

 </div>
  <?php
}
else {
  header("location:?dashboard-dash");
  exit();
}
 ?>


    </div>

</div>

<?php

include($template ."footer.php");
}
else {
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
