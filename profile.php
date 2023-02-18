<?php
ob_start();
session_start();
$profile_js=" ";
$profile_css =" ";
$pageTitle = "profile";
$set_footer = "";

include("init.php");


if(isset($_SESSION['user'])){
  $clientid = getclientID($_SESSION['user']);
?>

<?php
?>
<div id="vue_profile" class=" cont">
  <div class="profil-dashboard ">

  <div class='row'>
    <div class="car1 ">    <!--START SIDE CARD 1-->
      <div class="card">
      <div class="card-header card-1">
        <div class="avat-div">
            <img class="img-respo img-circle float-left" src="theme/image/avatar.png" width="100px" height="100px" alt="">
        </div>
        <p class="hey"> <strong><?php echo lang('hey') ?></strong> </p>
        <p class="cusdate"><?php
        $user ='';
        $ADRERSS ="";
        if (isset($_SESSION['user'])) {
          $user = $_SESSION['user'];
        }
        $st = $conn->prepare("SELECT clients.*
           FROM clients
          WHERE clients.Username = ?");
        $st->execute(array($user));
        $fe = $st->fetchAll();
        foreach ($fe as  $value) {
           $date =  $value['Date'];
           $ADRERSS = $value["Adress"];

          echo lang('custumerSince').subStr($date,0,4);
        }





         ?></p>

        <p class="myacus"> <strong><?php if (isset($_SESSION['user'])){
          echo $_SESSION['user'];
  }
  elseif (isset($_SESSION['username'])) {
    echo $_SESSION['username'];
  }
  else {
  echo lang('myAcount');
}?> </strong></p>
      </div>
      <ul class="list-group list-group-flush">
        <li id="l_orders" class="list-group-item blue"> <?php echo lang("orders"); ?></li>
        <li class="list-group-item"><a href='chat_client.php'><?php echo lang("messages"); ?></a></li>
        <li class="list-group-item"><a href='setting_mypage.php'><?php echo lang("mypage"); ?></a></li>
      </ul>
    </div>
    </div>

                                    <!-- END  SIDE CARD 1 -->


    <div class="car2  card_2_top_center">  <!-- START  CENTER CARD 1 -->
      <div class=" card  ">
      <div class="card-header">
       <i class="far fa-address-card"></i> <?php echo lang('myInformation'); ?>
      </div>
      <div class="card-body ">
        <ul class="list-group list-group-flush">

          <li class="list-group-item">
            <!--START ORGINE FULLNAME DIV-->
            <div class="orgin_full_div">
              <i class="fas fa-user"></i> <span> <strong> <?php echo lang("fullName") ?> :  </strong></span>
                <span >
                  <?php foreach ($fe as $key ) {
                    echo $key['FullName'];
                  } // end foreach
                 ?>
              </span>
              <button id="btn_edit_fullName" type="button" class="btn car2-btn btn-outline-success btn-sm float-right"> <i class="fas fa-user-edit"></i> <?php echo lang('edit') ?></button>
            </div> <!--END ORGINE FULLNAME DIV-->

                                 <!--START SVAE FULLNAME DIV-->
          <div class="save_fullname_div">
            <i class="fas fa-user"></i> <span> <strong> FullName :  </strong></span> <span >{{FullName}}</span>
            <div class="row">
              <div class="col-lg-4 col-xl-4  col-sm-6  col-12 ">
                <input id="id_edit_fullName" v-model='FullName' type="text" class="form-control" aria-describedby="emailHelp" placeholder="<?php echo lang("enter")." ".lang("fullName"); ?>">
              </div>
             <div class="col-lg-4 col-xl-4  col-sm-6  col-12">
                <button id="btn_save_fullname" type="button"  <?php foreach($fe as $value){
                  echo "data-id = '".$value['ClientID']."'";
                  echo "data-name='".$value['Username']."'";

                  }  ?> class="btn btn-success"> <i class="fas fa-sync-alt"></i> <?php echo lang("save") ?></button>
             </div>
             <div id="status_edit_fullname" class="col-lg-4 col-xl-4 col-sm-12  col-12  dispalay-none">
               <div class="alert alert-success text-center" role="alert">
                   <strong><?php echo lang("success") ?></strong>
              </div>

             </div>
           </div>
        </div> <!--END SVAE FULLNAME DIV-->
      </li>  <!--END LI FULLNAME-->
          <li class="list-group-item"> <!--START LI ADDRESS-->
            <div class="orgin_adress_div"> <!--START DIV ORGIN_ADRESS_DIV-->
              <i class="fas fa-map-marker-alt"></i> <span > <strong><?php echo lang("adress"); ?> :  </strong></span>
              <span><?php

              if ($ADRERSS != "") {
                echo $ADRERSS;

              }else{
                echo lang("there_is_no_adres");
              }

 /*YYYYYY
               foreach ($fe as $value){ echo $value['Country']." , ";
                 if(!empty($value["IslandName"])){echo $value["IslandName"]." , ";};
                 if(!empty($value["GouvernoratName"])){echo $value["GouvernoratName"]." , ";};
                 echo $value["CityName"];
            }*/ ?></span>
            <button id="btn_edit_address" type="button" class="btn btn-outline-success btn-sm  btn-edit_div float-right "> <i class="fas fa-user-edit"></i><?php echo lang('edit') ?></button>
          </div> <!--END DIV ORGIN_ADRESS_DIV-->

                                       <!--START DIV SAVE_ADRESS_DIV-->
          <div class="save_div_adress dispalay-none"> <!--START DIV SAVE_ADRESS_DIV-->
            <i class="fas fa-map-marker-alt"></i> <span > <strong><?php echo lang("adress"); ?> :  </strong></span> <span>{{ country }}</span>

            <div class="row">
              <div class="col-lg-7 col-xl-7 col-sm-12 col-sm-12"> <!--START DIV COUNTRY ORGIN_ADRESS_DIV-->
                <input id="input_save_adress" v-model='country' type="text" class="form-control" autocomplete="off" placeholder="<?php echo lang("enter")." ".lang("adress"); ?>">
                <input type="hidden" name="" id="user__id" value="<?php echo $_SESSION["user"]; ?>">
              </div> <!--END DIV COUNTRY ORGIN_ADRESS_DIV-->
               <?php /* ?>
              <div class="col-lg-3 col-xl-3 col-sm-12 col-sm-12"> <!--START DIV ISLANDS ORGIN_ADRESS_DIV-->
                <select v-model="island" id="island_select" class="custom-select" name="">
                  <option disabled value=""><?php echo lang("choiceyourIsland"); ?></option>
                  <option  data-idse="0"  value="0" >--</option>
                  <option  data-idse="1"  value="Ngazidja">Ngazidja</option>
                  <option  data-idse="2" value="Ndzwani">Ndzwani</option>
                  <option  data-idse="3" value="Mwali">Mwali</option>
                </select>
              </div> <!--END DIV ISLANDS ORGIN_ADRESS_DIV-->
              <div class="col"> <!--SATRT DIV GOUVERNORATE ORGIN_ADRESS_DIV-->
                <select v-model= "gouvernorate" id="gouvernorate_select_save" class="custom-select" name="">
                  <option disabled value=""><?php echo lang("choiceyourGovernorate") ?></option>
                  <option data-id_gou='0' value="--" >---</option>
                </select>
              </div> <!--END DIV GOUVERNORATE ORGIN_ADRESS_DIV-->

              <div class="col-lg-3 col-xl-3 col-sm-12 col-sm-12"> <!--START DIV CITY ORGIN_ADRESS_DIV-->
                <select v-model="city" id="city_select_save" class="custom-select" name="">
                  <option disabled value=""><?php echo lang("choiceYourCity"); ?></option>
                  <option data-id_cit='0' value='0' >---</option>
                </select> <!--END DIV CITY ORGIN_ADRESS_DIV-->
              </div>
              <?php */ ?>

              <div class="col-lg-5 col-xl-5 col-sm-12 col-sm-12">
                <div class="row">
                <div class="col">
                  <button id="btn_save_address"  <?php foreach($fe as $value){
                    echo "data-id = '".$value['ClientID']."'";
                    echo "data-name='".$value['Username']."'";
                    }  ?>
                  type="button" class="btn btn-success"> <i class="fas fa-sync-alt"></i> <?php echo lang("save") ?></button>
                </div>

              </div>
              </div>

              <div class="col-12">
                <div id="status_edit_address" class="alert  text-center dispalay-none" role="alert">
                    <strong><?php echo lang("success") ?></strong>
               </div>

              </div>

            </div>


          </div> <!--END DIV SAVE_ADRESS_DIV-->
        </li> <!--END LI ADDRESS-->

          <li class="list-group-item"> <!-- START EDIT LI EMAIL-->
            <div class="edit_div_email"> <!-- SATART EDIT DIV EMAIL-->
              <i class="fas fa-at"></i> <span> <strong> <?php echo lang('email'); ?> : </strong> </span>
              <span><?php foreach ($fe as  $value) {echo $value['Email'];}?></span>
              <button id="btn_edit_email" type="button" class="btn btn-outline-success btn-edit_div btn-sm float-right"> <i class="fas fa-user-edit"></i> <?php echo lang('edit') ?></button>
            </div> <!-- END EDIT DIV EMAIL-->

            <div class="save_div_email dispalay-none"> <!-- STRT SAVE DIV EMAIL-->
              <i class="fas fa-at"></i> <span> <strong> <?php echo lang('email'); ?> : </strong> </span> <span>{{email}}</span>

              <div class="row">
                <div class="col-lg-4 col-xl-4 col-sm-6  col-12">  <!-- STRT SAVE INPUT EMAIL-->
                  <input id="input_save_email" v-model='email' type="email" class="form-control" aria-describedby="emailHelp" placeholder="<?php echo lang("enter")." ".lang("email"); ?>">
                </div> <!-- END SAVE INPUT EMAIL-->

                <div class="col-lg-4 col-xl-4  col-sm-6  col-12"> <!-- STRT SAVE BTN EMAIL-->
                  <button id="btn_save_email"
                  <?php foreach($fe as $value){
                    echo "data-id = '".$value['ClientID']."'";
                    echo "data-name='".$value['Username']."'";
                    }  ?>
                  type="button" class="btn btn-success"> <i class="fas fa-sync-alt"></i> <?php echo lang("save") ?></button>

                </div> <!-- END SAVE BTN EMAIL-->
                <div id="status_edit_email" class="col-lg-4 col-xl-4 col-sm-12  col-12 dispalay-none">
                  <div class="alert alert-success text-center" role="alert">
                      <strong> <?php echo lang("success") ?></strong>
                 </div>

                </div>

              </div>
            </div>
          </li> <!-- END EDIT LI EMAIL-->

          <li class="list-group-item"> <!-- START EDIT LI MOBILE-->
            <div class=" edit_div_mobile"> <!-- START EDIT DIV MOBILE-->
              <i class="fas fa-mobile"></i>  <span> <strong><?php echo lang("telephone");?> : </strong> </span>
              <span>
                <?php foreach ($fe as  $value) {
                 if (empty($value["Mobile"])) {
                   echo lang('fieldEmpty');
                 }
                 else {
                   echo $value['Mobile'];
                 }
              } ?>
            </span>
            <button id="btn_edit_mobile" type="button" class="btn btn-outline-success btn-edit_div btn-sm float-right"> <i class="fas fa-user-edit"></i> <?php echo lang('edit') ?></button>

            </div> <!-- END EDIT DIV MOBILE-->
            <div class=" save_div_mobile dispalay-none"> <!-- START SAVE DIV MOBILE-->
              <i class="fas fa-mobile"></i>  <span> <strong><?php echo lang('mobile');?> : </strong> </span> <span>{{mobile}}</span>
                <div class="row">

                  <div class="col-lg-6 col-xl-6 col-md-6 col-xs-12 col-sm-12"> <!-- START SAVE INPUT MOBILE-->
                    <input id="input_save_mobile" v-model='mobile' type="number" class="form-control" aria-describedby="emailHelp" placeholder="<?php echo lang("enter")." ".lang("mobile"); ?>">
                  </div> <!-- END SAVE INPUT MOBILE-->
                  <div class="col-lg-6 col-xl-6 col-md-6 col-xs-12 col-sm-12"> <!-- START SAVE BTN MOBILE-->
                    <button id="btn_save_mobile"
                    <?php foreach($fe as $value){
                      echo "data-id = '".$value['ClientID']."'";
                      echo "data-name='".$value['Username']."'";
                      }  ?>
                     type="button" class="btn btn-success"> <i class="fas fa-sync-alt"></i> <?php echo lang("save") ?></button>

                  </div> <!-- END SAVE BTN MOBILE-->
                  <div id="status_edit_mobile" class="col-lg-4 col-xl-4 col-sm-12  col-12 dispalay-none">
                    <div class="alert alert-success text-center" role="alert">
                        <strong><?php echo lang("success") ?></strong>
                   </div>

                  </div>

                </div>



            </div> <!-- END SAVE DIV MOBILE-->
        </li> <!-- END EDIT LI MOBILE-->
        <!--  <li class="list-group-item"> <!-- START EDIT LI FAVORITE SALERS-->
          <!--  <i class="fas fa-store"></i> <span > <strong> <?php //echo lang("myFavoriteSeller"); ?> :  </strong> </span>

          </li>  END EDIT LI FAVORITE SALERS-->
        </ul>
      </div>
      </div>

    </div>  <!-- END  CENTER CARD 2 -->


                                    <!-- ORDERS-->
<div class="car2   ">   <!-- START UNAPPROVED ORDERS-->
  <div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col">
        <strong>  <?php echo lang("ORDERS_not_approvedgOrder"); ?> </strong>
      </div>

      <div class="col">
         <span class="delevred float-right"><strong id="no_aprov_span"><?php echo lang("not_approvedgOrder"); ?></strong></span>
      </div>
      <div class="clear"></div>

    </div>

  </div>
  <div class="card-body  cb_waitinorder">
  <?php

if (count_orders_for_client($clientid,1)>0) {
  ?>
          <section class="slider_center text-center">
              <?php
             foreach(orders_for_client($clientid,1) AS $value ){
             ?>
            <div class="col-img  supper_div_link_div div_wattingorder swiper-slide ">
                <div class="supper_div_im1 ">
                  <a class="supper_div_link" href="<?php echo "itemshoppingforclient.php?itemid=".$value["product_id"]."&order=".$value["orderID"];?>">
              <div class="div_img_item_1">
                <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self" alt="">
              </div>
              <div class="name_of_item card_body_unproved_orders ">
                <p> <?php ?> <span> <?PHP echo $value['Name'];?> </span></p>
                 <p> <span><?PHP  echo lang("qty")." : ";?> </span> <span><?PHP echo $value['QTY'] ?></span></p>
                <p class="text-center"><?php echo lang("requestDate").":"; ?> <span><?php echo  $value['requestorderdate']; ?></span> </p>
                <div class="text-center">
                   <strong class="ship_sp"><?php echo lang("shippingAdress"); ?></strong>
                   <p> <span><?php echo   $value['Adress']; ?></span> </p>
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
   }
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


</div> <!-- END  UNAPPROVED ORDERS-->





<div class="car2 ">  <!-- START  WATTING  ORDERS-->
<div class="card">
<div class="card-header">
<div class="row">
<div class="col">
<strong>  <?php echo lang("on_way"); ?> </strong>
</div>
<div class="col">

</div>
<div class="col">
<span class="delevred float-right"><strong id="on_way_span" ><?php echo lang("on_way"); ?></strong></span>
</div>
<div class="clear"></div>

</div>

</div>
<div class="card-body wating_orders__">

<?php

if (count_orders_for_client($clientid,2)>0) {
  ?>
          <section class="slider_center text-center">
              <?php
             foreach(orders_for_client($clientid,2) AS $value ){
             ?>
            <div class="col-img  supper_div_link_div div_wattingorder swiper-slide ">
                <div class="supper_div_im1 ">
                  <a class="supper_div_link" href="<?php echo "itemshoppingforclient.php?itemid=".$value["product_id"]."&order=".$value["orderID"];?>">
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
   } // end if there are orders Wating for orders
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
</div> <!-- END  WATTING  ORDERS-->

<div class="car2">  <!--START COMPLETED_ ORDERS -->
<div class="card">
<div class="card-header">
<div class="row">
<div class="col">
<strong>  <?php echo lang("completedOrder"); ?> </strong>
</div>
<div class="col">

</div>
<div class="col">
<span class="delevred float-right"><strong id="delevred_span"><?php echo lang("delevred"); ?></strong></span>
</div>
<div class="clear"></div>

</div>

</div>
<div class="card-body">

<?php

if (count_orders_for_client($clientid,3)>0) {
  ?>
          <section class="slider_center text-center">
              <?php
             foreach(orders_for_client($clientid,3) AS $value ){
             ?>
            <div class="col-img  supper_div_link_div div_wattingorder swiper-slide ">
                <div class="supper_div_im1 ">
                  <a class="supper_div_link" href="<?php echo "itemshoppingforclient.php?itemid=".$value["product_id"]."&order=".$value["orderID"];?>">
              <div class="div_img_item_1 text-center">
                <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self" alt="">
              </div>
              <div class="name_of_item ">
                <p> <?php ?> <span> <?PHP echo $value['Name'];?> </span></p>
                 <p> <span><?PHP  echo lang("qty")." : ";?> </span> <span><?PHP echo $value['QTY'] ?></span></p>
                <p class="text-center"><?php echo lang("requestDate").":"; ?> <span><?php echo  $value['requestorderdate']; ?></span> </p>

              </div>
              </a>
            </div>
            </div>
                          <!--Items -->
          <?php  }

          ?>
          </section>
    <?php
   } // end if there are orders Wating for orders
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
</div> <!--END COMPLETED_ ORDERS -->


<div class="car2">  <!--START COMPLETED_ ORDERS -->
<div class="card">
<div class="card-header">
<div class="row">
<div class="col">
<strong>  <?php echo lang("asked_return_order"); ?> </strong>
</div>
<div class="col">

</div>
<div class="col">
<span class="delevred float-right"><strong id="returned_span"><?php echo lang("asked_return_order"); ?></strong></span>
</div>
<div class="clear"></div>

</div>

</div>
<div class="card-body">

<?php

if (count_orders_for_client($clientid,4)>0) {
  ?>
          <section class="slider_center text-center">
              <?php
             foreach(orders_for_client($clientid,4) AS $value ){
             ?>
            <div class="col-img  supper_div_link_div div_wattingorder swiper-slide ">
                <div class="supper_div_im1 ">
                  <a class="supper_div_link" href="<?php echo "itemshoppingforclient.php?itemid=".$value["product_id"]."&order=".$value["orderID"];?>">
              <div class="div_img_item_1">
                <img src=" <?php echo $img."uploade_img/".$value['Pic1']?>" class="img-thumbnail pic_self" alt="">
              </div>
              <div class="name_of_item ">
                <p> <?php ?> <span> <?PHP echo $value['Name'];?> </span></p>
                <p class="text-center"><span><?php echo  $value['date_asked_for_return']; ?></span> </p>
                <div class="text-center">

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
   } // end if there are orders Wating for orders
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



</div> <!--END COMPLETED_ ORDERS -->











  </div>


  </div>
  <?php /* ?>
  <div class="card_adres">
  <div class="card">
<div class="card-header">
<p class="text-center"><?php echo lang("adress") ?></p>

</div>

<div class="card-body">
<?php $stmtsel = $conn -> prepare("SELECT CityName,GouvernoratName,PlaceDescription,AdressID FROM adress
INNER JOIN gouvernorate ON gouvernorate.GovernorateID = adress.Gouvernorate
INNER JOIN cities ON   cities.CityID =  adress.City
WHERE ClientID = ? LIMIT 5
");
          $stmtsel ->execute(array($clientid));
          $fect = $stmtsel -> fetchAll();
          echo "<ul class='latest-user'>";
          foreach ($fect as $value) {
            echo "<li>".'<strong>'.ucfirst(lang("adress")).' : '.'</strong>'.'<strong> <span>'.ucfirst($value['CityName'])." ".ucfirst($value['GouvernoratName'])."  ". ucfirst($value['PlaceDescription'])
             .'</span> </strong>'."<strong>  <a href='delete_adress.php?delete_adress=2 & adressid=".$value["AdressID"]."'> <span class='btn btn-danger float-right'> <i class='fa fa-trash'></i> delete</span> </a> </strong>". "</li>";

          }
        echo "</ul>";
           ?>


</div>
  </div>

  <div id="sucees_delete_div" class="alert alert-success text-center sucees_delete_div"> <strong> <?php echo lang("sucees_delete"); ?> </strong> </div>
  <div id="used_adres_delete_div" class="alert alert-danger text-center used_adres_delete_div"> <strong> <?php echo lang("this_adress_alreadyused"); ?> </strong> </div>
  <div id="something_wrong_delete_div" class="alert alert-danger text-center something_wrong_delete_div"> <strong> <?php echo lang("this_adress_alreadyused"); ?> </strong> </div>

</div>
<?php  */?>

</div>

<?php

include($template ."footer.php");
}else{
  header("location:index.php");
  exit();
}
ob_end_flush();
 ?>
