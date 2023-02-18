<?php
session_start();
if (isset($_GET['item'])) {
$item_css ="";
$item_js = "";
$set_footer ="";
$pageTitle = "item";
$normalize_css = " ";
include("init.php");
$stm = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  categories.CategoryID as catid,
  categories.Name as catName,
  sellers.StoreName,
  sellers.SellerID as userId,
  currency.CurrencyName as currencyname,
  sellers.Verificated,
  sellers.BestSeller,
  items.CurrencyID as curency_id

  FROM items
  INNER JOIN brand ON items.BrandID = brand.BrandID
  INNER JOIN  sellers ON sellers.SellerID = items.MemberID
  INNER JOIN categories ON categories.CategoryID = items.CategoryID
  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
  WHERE ItemID = ?");

  $stm->execute(array($_GET['item']));
  $fetch = $stm->fetchAll();

?>
<div class="cont">

  <div class="row conte">
    <div class="col-sm-12 col-md-4 div_inf_c">
      <div>
      <?php

      foreach ($fetch as  $value) {
       ?>
      <div class="img_slider">
<input type="hidden" name="" id="cureny_id" value="<?php echo $value["curency_id"]; ?>">
<input type="hidden" name="" id="_pr_price" value="<?php echo $value["Price"]; ?>">
       <p><?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($value["Name"].",")))).
       str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($value["brandname"]." , ")))).
       str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($value["catName"]))));

       ?>
       <span> </span>
       <?php

       for ($i=0; $i <5 ; $i++) {
        ?>

        <span class="fa fa-star checked _best_saler_starts"></span>
        <?php
       }

       ?>

         <img class="img_veri_sale" class="img_veri" src="theme/image/verified.png" alt="">


       </p>

        <div class="sil_imges">
        <img src="<?php echo $img."uploade_img/".$value['Pic1']; ?>" class="pic master_img" alt="">
         <div class="img_thumn_div">
           <div class="row">
             <div class="col">
               <div class="img_div_child ">
                 <img src="<?php echo $img."uploade_img/".$value['Pic1']; ?>" class="pic  img_thimnals img_active" alt="">
               </div>
             </div>
             <div class="col">
               <div class="img_div_child">
                 <img src="<?php echo $img."uploade_img/".$value['Pic2']; ?>" class="pic img_thimnals" alt="">
               </div>
             </div>
             <div class="col">
               <div class="img_div_child">
                 <img src="<?php echo $img."uploade_img/".$value['Pic3']; ?>" class="pic img_thimnals" alt="">
               </div>
             </div>

           </div>

         </div>
       </div>
       </div>
    <?php

      }
       ?>
     </div>
  </div> <!-- END ITEM PICS-->
<hr>
  <div class="col-sm-12 col-md-5 div_inf_c">
    <div>
    <p class=""> <strong><?php echo lang("price").":"  ?></strong > <span class="price_apan" ><?php echo $value['Price']." ".$value['currencyname']?></span>
      <strong> <span class="float-right"> <?php echo lang("seller").": " ?><span class=""><?php echo $value['StoreName'] ?> </span> </span> </strong>
     </p>

<!--    <p><strong> <?php// echo lang("shippingMethod").": "; ?></strong> <span class="blue"><?php// echo $value['ShippingName']; ?> </span> -->

    </p>
    <p>
    <strong> <?php echo lang("description").": "; ?> </strong>
    <span class="span ">
    <?php
    if (!empty($value['Description'])) {
      $des = strlen($value['Description']);
      if ($des > 1000) {

        echo substr($value['Description'],0,1000);
      }

      else {
      echo  $value['Description'];
      }

    }
    else {
      echo lang("noItemCategory");
    }
     ?>
     </span>
    </p>
  </div>
   </div> <!-- END DISCREPTION ITEM-->

  <div class="col col-md-3 div_inf_c">
    <div class="shop-div">
    <div >
      <form class="" action="payment.php" method="GET">

        <table class="table table-borderless">
          <thead>
            <tr>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>

          <tr>
            <td><strong class=""><?php echo lang('price'); ?></strong></td>
            <td> <span class="text-center price_apan"><?php echo $value['Price']."  ".$value['currencyname']; ?><span></td>
          </tr>

          </tbody>
        </table>

      <input type="hidden" id="ID_Pri" name="" value="<?php echo $value['Price']; ?>">
      <input type="hidden" id="item_ID" name="itemid" value="<?php echo $_GET['item'];  ?>">
      <div class="row row_btn_it">
        <div class="col-sm-12 col-md-6">
          <button type="submit" class="btn btn-primary" value="btn" name="addToCart"> <?php echo lang('proceedToCheckout'); ?> <i class="fas fa-cart-plus"></i></button>

        </div>

        <div class="cilo-sm-12 col-md-6">
          <button type="button" id="add_btn_cart" data-product="<?php echo $_GET['item'];  ?>"  class="btn btn-primary" value="btn" name="addToCart"> <?php echo lang('add_to_cart'); ?> <i class="fas fa-plus"></i></button>

        </div>

      </div>

    </form>
    </div>
  </div>
  </div> <!-- END ADD CART DIV-->
</div>
<div class=" inf">
<div class="tabl">
<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th class="" scope="col"><?php echo lang("prductInformation"); ?></th>
    </tr>
  </thead>

  <?php if (!empty($value['Expirable'])){ ?>
  <tr>
    <th scope="col"><strong><?php echo lang("Expirable");?></strong></th>
    <th class="" scope="col"><?php echo $value['Expirable'];?></th>
  </tr>
  <?php
}
  // Expirable ?>

  <?php if (!empty($value['Color'])){ ?>
  <tr>
    <th scope="col"><strong><?php echo lang("color");?></strong></th>
    <th class="" scope="col"><?php echo get_color_name( $value['Color']);?></th>
  </tr>
  <?php
}
  // COLOR ?>

   <?php if (!empty($value['brandname'])){ ?>
   <tr>
     <th scope="col"><strong><?php echo lang("brandM");?></strong></th>
     <th class="" scope="col"><?php echo $value['brandname'];?></th>
   </tr>
   <?php
 }
  // END BRANDNAME  ?>



<div class="read_more">
  <a href="#">
  <tr class="readm">
    <th scope="col"><span> <strong id="readm"><?php echo lang("ReadMore");?></strong> </span></th>
    <th class="" scope="col"></th>
  </tr>
</a>
</div>
    <tbody id="more_infon" class="more_infon ">

    <?php if (!empty($value['CPUSpeed'])){ ?>
    <tr>
      <th scope="col"><strong><?php echo lang("CPUSpeed");?></strong></th>
      <th class="" scope="col"><?php echo $value['CPUSpeed'];?></th>
    </tr>
    <?php
  }
  //END CPUSPEED   ?>

     <?php if (!empty($value['MobilePhoneType'])){ ?>
     <tr>
       <th scope="col"><strong><?php echo lang("MobilePhoneType");?></strong></th>
       <th class="" scope="col"><?php echo $value['MobilePhoneType'];?></th>
     </tr>
     <?php
   }
   // END MobilePhoneType   ?>

   <?php if (!empty($value['CPU'])){ ?>
   <tr>
     <th scope="col"><strong><?php echo lang("CPU");?></strong></th>
     <th class="" scope="col"><?php echo get_cpu($value['CPU']) ;?></th>
   </tr>
   <?php
 }
 // END CPU   ?>

 <?php if (!empty($value['MemoryRAM'])){ ?>
 <tr>
   <th scope="col"><strong><?php echo lang("Memory RAM");?></strong></th>
   <?php
   if (get_ram($value['MemoryRAM']) < 1) {
     ?>
      <th class="" scope="col"><?php echo get_ram($value['MemoryRAM']).lang("mb"); ;?></th>
     <?php
   }else{
     ?>
      <th class="" scope="col"><?php echo get_ram($value['MemoryRAM']).lang("gb"); ;?></th>
     <?php
   }
    ?>

 </tr>
 <?php
}
  ?>

<?php if (!empty($value['MemoryStorage'])){ ?>
<tr>
  <th scope="col"><strong><?php echo lang("storage");?></strong></th>
  <?php
  if (get_ram($value['MemoryRAM']) > 1) {
    ?>
     <th class="" scope="col"><?php echo get_storage($value['MemoryStorage']).lang("mg"); ;?></th>
    <?php
  }else{
    ?>
     <th class="" scope="col"><?php echo get_storage($value['MemoryStorage']).lang("gb"); ;?></th>
    <?php
  }
   ?>

</tr>
<?php
}
  ?>


  <?php if (!empty($value['SSD_ID'])){ ?>
  <tr>
    <th scope="col"><strong><?php echo lang("ssd");?></strong></th>
    <?php
    if (get_ssd($value['SSD_ID']) > 1) {
      ?>
       <th class="" scope="col"><?php echo get_ssd($value['SSD_ID']).lang("gb"); ;?></th>
      <?php
    }else{
      ?>
       <th class="" scope="col"><?php echo get_ssd($value['SSD_ID']).lang("mg"); ;?></th>
      <?php
    }
     ?>

  </tr>
  <?php
  }
    ?>


    <?php if (!empty($value['sim_id'])){ ?>
    <tr>
      <th scope="col"><strong><?php echo lang("NumberOfSIM");?></strong></th>
      <?php
        ?>
         <th class="" scope="col"><?php echo get_sim__($value['sim_id']); ;?></th>
        <?php

       ?>

    </tr>
    <?php
    }
      ?>


<?php if (!empty($value['Imagequality'])){ ?>
<tr>
  <th scope="col"><strong><?php echo lang("Imagequality");?></strong></th>
  <th class="" scope="col"><?php echo $value['Imagequality'];?></th>
</tr>
<?php
}
// END Imagequality  ?>

<?php if (!empty($value['camera_resolution'])){ ?>
<tr>
  <th scope="col"><strong><?php echo lang("camera_resolution");?></strong></th>
  <th class="" scope="col"><?php echo get_resolution_img($value['camera_resolution']);?></th>
</tr>
<?php
}
// END Imagequality  ?>

<?php if (!empty($value['FastCharge'])){ ?>
<tr>
  <th scope="col"><strong><?php echo lang("FastCharge");?></strong></th>
  <th class="" scope="col"><?php echo $value['Fast Charge'];?></th>
</tr>
<?php
}
// END Imagequality  ?>

<?php if (!empty($value['SerialScanRequired'])){ ?>
<tr>
  <th scope="col"><strong><?php echo lang("SerialScanRequired");?></strong></th>
  <th class="" scope="col"><?php echo $value['SerialScanRequired'];?></th>
</tr>
<?php
}
if (sizeof(get_network($value["ItemID"]))  > 0) {
?>
<tr>
  <th scope="col"><strong><?php echo lang("network");?></strong></th>
  <th class="" scope="col"><?php
$netwks  = get_network($value["ItemID"]);
$lst_itm = end($netwks);
  foreach ( get_network($value["ItemID"]) as   $value1) {
    if($value1 != $lst_itm){
      echo get_network_names($value1)." , ";
    }else{
      echo get_network_names($value1);
  }

  }?></th>
</tr>
<?php
}


if (!empty($value["GPU_ID"])) {
?>
<tr>
  <th scope="col"><strong><?php echo lang("gpu");?></strong></th>
  <th class="" scope="col"><?php


    echo get_gpu_names($value["GPU_ID"]);
  ?></th>
</tr>
<?php
}



// END SerialScanRequired  ?>
<?php if (!empty($value['SerialScanRequired'])){ ?>
<tr>
  <th scope="col"><strong><?php echo lang("SerialScanRequired");?></strong></th>
  <th class="" scope="col"><?php echo $value['SerialScanRequired'];?></th>
</tr>
<?php
}
?>

  <tr class="redLess">
  <th scope="col"><strong id="redLess" class="redLess"><?php echo lang("ReadLess");?></strong></th>
    <th scope="col"></th>
  </tr>


</tbody>
</table>
</div>

<div class="comments">
<?php
$itemID = $value['ItemID'];
$st = $conn->prepare("SELECT comments.*,
clients.Username
FROM comments
 INNER JOIN clients ON clients.ClientID = comments.ClientID
  WHERE ItemID = ? ");
$st->execute(array($itemID));
$fe = $st->fetchAll();
foreach ($fe as $value2) {

  ?>
  <div class="comment_child">
  <?php
  echo "<p>".lang("by").": "."<span class='blue'>".$value2['Username']."</span>";
switch ($value2['Rating']) {
  case 0:

  ?>
  <input type="hidden" name="" value="">
  <span class=" rating_star ">
    <span class="fa fa-star "></span>
    <span class="fa fa-star  "></span>
    <span class="fa fa-star "></span>
    <span class="fa fa-star  "></span>
    <span class="fa fa-star"></span>
  </span>
  <?php
    break;

    case 1:
    ?>
    <span class=" rating_star ">
      <span class="fa fa-star checked_f"></span>
      <span class="fa fa-star  "></span>
      <span class="fa fa-star "></span>
      <span class="fa fa-star "></span>
      <span class="fa fa-star"></span>
    </span>
    <?php
      break;

      case 2:
      ?>
      <span class=" rating_star ">
        <span class="fa fa-star checked_f"></span>
        <span class="fa fa-star checked_f "></span>
        <span class="fa fa-star "></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
      </span>
      <?php
        break;

        case 3:
        ?>
        <span class=" rating_star ">
          <span class="fa fa-star checked_f"></span>
          <span class="fa fa-star checked_f "></span>
          <span class="fa fa-star checked_f"></span>
          <span class="fa fa-star "></span>
          <span class="fa fa-star"></span>
        </span>
        <?php
          break;

          case 4:
          ?>
          <span class=" rating_star ">
            <span class="fa fa-star checked_f"></span>
            <span class="fa fa-star checked_f "></span>
            <span class="fa fa-star checked_f"></span>
            <span class="fa fa-star  "></span>
            <span class="fa fa-star"></span>
          </span>
          <?php
            break;

            case 5:
            ?>
            <span class=" rating_star ">
              <span class="fa fa-star checked_f"></span>
              <span class="fa fa-star checked_f "></span>
              <span class="fa fa-star checked_f"></span>
              <span class="fa fa-star checked_f "></span>
              <span class="fa fa-star checked_f"></span>
            </span>
            <?php
              break;


  default:
    // code...
    break;
}

  echo "</p>";
echo $value2['Comment'];
?>

</div>
<?php
}

 ?>

</div>

</div>
</div>
<?php
 ?>
<?php include($template ."footer.php");
}
?>
