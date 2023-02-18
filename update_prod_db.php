<?php

session_start();
include("admin/connect.php");
include("admin/includes/languages/english.php");
$functions = "admin/includes/functions/";
include($functions."functions.php");
$img = "theme/image/";


  if (isset($_SESSION['user']) && isset($_POST['isert_items']) && isset($_POST['itemName']) && isset($_POST['itemDescription']) && isset($_POST['price']) && isset($_POST['current']) && isset($_POST['status']) &&
  isset($_POST['categoryid']) && isset($_POST['brand'])
 && isset($_POST["seller__"]) && isset($_POST["user__"]) && isset($_POST["product__"])){



$ship_ngazidja              = 0;
$ship_metho_ngazidja        = null;
$ship__price_ngazidja       = null;
$estamit_day_ngazidja_value = null;
$fixed_shipping_price_ngazidja = 1;
if (isset($_POST["ship_ngazidja"])) {
if($_POST["ship_ngazidja"] == 1){
  $ship_ngazidja = 1;
  $ship_metho_ngazidja         = $_POST["ship_metho_ngazidja"];
  $ship__price_ngazidja        = $_POST["ship__price_ngazidja"];
  $estamit_day_ngazidja_value  = $_POST["estamit_day_ngazidja_value"];
  $fixed_shipping_price_ngazidja = $_POST["fixed_shipping_price_ngazidja"];
}

}

$ship_ndzuwani               = 0;
$ship_metho_ndzuwa_selc      = null;
$ship_ndzuwani_price         = null;
$estamit_day_ndzuwani_value  = null;
$fixed_shipping_price_ndzuwani =1;
if(isset($_POST["ship_ndzuwani"])){
if ($_POST["ship_ndzuwani"] == 1) {
$ship_ndzuwani                 = 0;
$ship_metho_ndzuwa_selc        = $_POST["ship_metho_ndzuwa_selc"];
$ship_ndzuwani_price           = $_POST["ship_ndzuwani_price"];
$estamit_day_ndzuwani_value    = $_POST["estamit_day_ndzuwani_value"];
$fixed_shipping_price_ndzuwani = $_POST["fixed_shipping_price_ndzuwani"];
}
}


$ship_mwali                         = 0;
$ship_metho_mwali                  = null;
$ship_mwali_price                  = null;
$estamit_day_mwali_value           = null;
$fixed_shipping_price_mwali = 1;
if(isset($_POST["ship_mwali"])){
  if ($_POST["ship_mwali"] == 1) {
   $ship_mwali                  = 1 ;
   $ship_metho_mwali           = $_POST["ship_metho_mwali"];
   $ship_mwali_price           = $_POST["ship_mwali_price"];
   $estamit_day_mwali_value    = $_POST["estamit_day_mwali_value"];
   $fixed_shipping_price_mwali  = $_POST["fixed_shipping_price_mwali"];

  }
}


$ship_france                 = 0;
$ship_metho_france           = null;
$ship_france_price           = null;
$estamit_day_france_value    = null;
$fixed_shipping_price_france = 1;
if(isset($_POST["ship_france"])){
  if ($_POST["ship_france"] == 1) {
    $ship_france                  = 1;
    $ship_metho_france            = $_POST["ship_metho_france"];
    $ship_france_price            = $_POST["ship_france_price"];
    $estamit_day_france_value     = $_POST["estamit_day_france_value"];
    $fixed_shipping_price_france = $_POST["fixed_shipping_price_france"];

  }
}

$ram = null;
if(isset($_POST["ram"])){
  if ($_POST["ram"] != "") {
    $ram  = $_POST["ram"];
  }
}

$cpu = null;
if (isset($_POST["cpu"])) {
  if ($_POST["cpu"] != "") {
    $cpu = $_POST["cpu"];
  }
}


$gpu = null;
if (isset($_POST["gpu"])) {
  if ($_POST["gpu"] != "") {
    $gpu = $_POST["gpu"];
  }
}

$camera_resolution = null;
if (isset($_POST["camera_resolution"])) {
  if ($_POST["camera_resolution"] != "") {
    $camera_resolution = $_POST["camera_resolution"];
  }
}


$sim = null;
if (isset($_POST["sim"])) {
  if ($_POST["sim"] != "") {
    $sim = $_POST["sim"];
  }
}





$storage = null;
if(isset($_POST["storage"])){
  if ($_POST["storage"] != "") {
    $storage = $_POST["storage"];
  }
}

$ssd = null;
if(isset($_POST["ssd"])){
  if ($_POST["ssd"] != "") {
    $ssd = $_POST["ssd"];
  }
}

$operating_System = null;
if(isset($_POST["operating_System"])){
  if($_POST["operating_System"] != ""){
      $operating_System  = $_POST["operating_System"];
  }

}

$price  ;
if($_POST['current'] == "1"){
    $price = $_POST['price'];
}else{
  $price = $_POST['price'] / get_exchange($_POST['current']);
}


$seller__ = $_POST["seller__"];


$edit_img = 0;
if (isset($_POST["edit_img"])) {
  if ($_POST["edit_img"] == 1) {
    $edit_img = 1;
  }
}

$avatarAllExtision = array("jpeg","jpg","png","gif");
//PIC 1
if(isset($_FILES['chooseItemPic1'])){
  $picitem1     = $_FILES['chooseItemPic1'];
  $avatraname1   = $picitem1["name"];
  $avatrsize1   = $picitem1["size"];
  $avatrtype1   = $picitem1["type"];
  $avatrtemp1   = $picitem1["tmp_name"];

  $exp1 = explode(".",$avatraname1);
  $avatarextension1 = strtolower( end($exp1));
}


// PIC 2

if (isset($_FILES['itemPic2'])) {
  $_picitem2  = $_FILES['itemPic2'];
  $avatraname2   = $_picitem2["name"];
  $avatrsize2    = $_picitem2["size"];
  $avatrtype2    = $_picitem2["type"];
  $avatrtemp2    = $_picitem2["tmp_name"];

  $_exp2 = explode(".",$avatraname2);
  $avatarextension2 = strtolower( end($_exp2));
}



//PIC3

if (isset($_FILES['itemPic3'])) {
  $_picitem3 = $_FILES['itemPic3'];
  $avatraname3   = $_picitem3["name"];
  $avatrsize3    = $_picitem3["size"];
  $avatrtype3    = $_picitem3["type"];
  $avatrtemp3    = $_picitem3["tmp_name"];


  $exp3 = explode(".",$avatraname3);
  $avatarextension3 = strtolower( end($exp3));
}



 // LIST OF ALLOW FILE EXTENTION UPLOAD


  $OS = null;
  if(isset($_POST["operating_System"])){
    if($_POST["operating_System"] != ""){
      $OS  = $_POST["operating_System"];
    }
  }
  $description  = null;
  $tags = null;
  $name         = $_POST['itemName'];
  $current      = 1;
  $country = "";
  if(!empty($_POST['country'])){
    $country      = $_POST['country'];
  }
  $status       = $_POST['status'];
  $catid = $_POST['categoryid'];
  $brand = $_POST['brand'];
  // Description
  if (!empty($_POST['itemDescription'])) {
  $description = $_POST['itemDescription'];
  }
  //TAGS
  if (!empty($_POST['tags'])) {
    $tags = $_POST['tags'];
  }


  $error = array();
  if($name==""){
  $error[]= lang("cantNameItemEmpty");
  $msg='<div class="p-3 mb-2 bg-danger text-white text-center update-div">'.lang('categoryCant').'</div>';
  $url ="items.php?do=add";
  redirectHome($msg, $url); }  // end if item name is empty
  elseif ($price=="") {
  $error[]= lang("cantPriceItemEmpty");
  } // end elseif price is empty
  elseif ($catid == 1 || $catid == 2 || $catid == 3) {
  $error[]= lang("choice_category");
}
elseif ($brand == 1 || $brand == 2 || $brand == 3) {
$error[]= lang("choice_the_brand");
}

  //PIC1
  elseif ($edit_img == 1 && !empty($avatarextension1)  &&  !in_array( $avatarextension1,$avatarAllExtision)) {
    $error[]= lang("notAllowExtionpic1");
  }elseif ($edit_img == 1 && $avatrsize1 >41943040) {
    $error[]= lang("cantsizepic1");
  }
  elseif ($edit_img == 1 && empty($picitem1)) {
    $error[]= lang("antpic1");
  }
//PIC2
elseif ($edit_img == 1 && !empty($_picitem2)  &&  !in_array($avatarextension2,$avatarAllExtision)) {
  $error[]= lang("notAllowExtionpic2");
}elseif ( $edit_img == 1 && $avatrsize2 > 41943040) {
  $error[]= lang("cantsizepic2");
}
elseif ($edit_img == 1 && empty($_picitem2)) {
  $error[]= lang("antpic2");
}

//PIC3
elseif ($edit_img == 1 && !empty($_picitem3)  &&  !in_array($avatarextension3, $avatarAllExtision)) {
  $error[]= lang("notAllowExtionpic3");
}elseif ($edit_img == 1 && $avatrsize3 > 41943040) {
  $error[]= lang("cantsizepic3");
}
elseif ( $edit_img == 1 && empty($_picitem3)) {
  $error[]= lang("antpic3");
}

elseif(empty($error)){

if ($edit_img == 1) {

$avatarName1 = rand(100,100000000000).$avatraname1;
$avatarName2 = rand(1000,10000000000000).$avatraname2;
$avatarName3 = rand(10000,100000000000000).$avatraname3;

$pathimg1 = $_POST["user__"]."/".$avatarName1;
$pathimg2 = $_POST["user__"]."/".$avatarName2;
$pathimg3 = $_POST["user__"]."/".$avatarName3;

if (!file_exists($img."uploade_img/".$_POST["user__"])) {
  mkdir($img."uploade_img/".$_POST["user__"]."/");
}

$dtb_img1 = get_img_1($_POST["product__"]);
$dtb_img2 = get_img_2($_POST["product__"]);
$dtb_img3 = get_img_3($_POST["product__"]);


unlink($img."uploade_img/".$dtb_img1);
unlink($img."uploade_img/".$dtb_img2);
unlink($img."uploade_img/".$dtb_img3);

move_uploaded_file($avatrtemp1,$img."uploade_img/".$_POST["user__"]."/".$avatarName1);
move_uploaded_file($avatrtemp2,$img."uploade_img/".$_POST["user__"]."/".$avatarName2);
move_uploaded_file($avatrtemp3,$img."uploade_img/".$_POST["user__"]."/".$avatarName3);
}

if ($edit_img == 1) {
$stmt = $conn->prepare("UPDATE items SET
Name = :NAME,Description =:DESCRIPTION , Price = :PRICE, CurrencyID = :CURRENCY , AddDate = NOW(),
CountryMade = :COUNTRY, Status = :STATUS , CategoryID = :CATEGORYID , MemberID = :MEMBERID , BrandID = :BRANDID,

ship_ngazidja = :SHIPNGAZIDJA , ship_ndzouwani = :SHIPNDOUWANI , ship_mwali = :SHIPMWALI , ship_france = :SHIPFRANCE,
Ship_Method_Ngazidja = :Ship_Method_Ngazidja , Ship_Method_Ndzuwani = :Ship_Method_Ndzuwani , Ship_Method_Mwali = :Ship_Method_Mwali , Ship_Method_France = :Ship_Method_France,
ship_ngazidja_price = :SHOPNGAZIDJAPRICE , ship_ndzouwani_price = :shipndwaniprice , ship_mwali_price = :SHIP_MWALIPRICE , ship_france_price = :SHIPFRANCEPRICE,
Estamited_Delivery_Ngzidja = :ESTAMITED_SHIP_NGAZIDJA , Estamited_Delivery_Nduwani = :ESTAMITED_SHIP_NDUWANI , Estamited_Delivery_Mwali = :ESTAMITED_SHIP_MWALI , Estamited_Delivery_France = :ESTAMITED_SHIP_FRACE,
Fixed_shipping_price_Ngazidja = :Fixed_shipping_price_Ngazidja,Fixed_shipping_price_Ndzuwani = :Fixed_shipping_price_Ndzuwani, Fixed_shipping_price_Mwali = :Fixed_shipping_price_Mwali ,Fixed_shipping_price_France = :Fixed_shipping_price_France,
MemoryStorage = :MEMORY_SOREAGE , MemoryRAM = :MEMOERY_RAM , Operating_System_ID = :OPERATING_SYSTEM , CPU = :CPU , GPU_ID = :GPU_ID,
camera_resolution = :camera_resolution , sim_id  = :SIM , SSD_ID = :SSD_ID,

Pic1 = :PIC1 ,Pic2 = :PIC2 ,  Pic3 = :PIC3
 WHERE ItemID =:PRODUCT_ID
");
}
else {

  $stmt = $conn->prepare("UPDATE items SET
 Name = :NAME,Description =:DESCRIPTION , Price = :PRICE, CurrencyID = :CURRENCY , AddDate = NOW(),
 CountryMade = :COUNTRY, Status = :STATUS , CategoryID = :CATEGORYID , MemberID = :MEMBERID , BrandID = :BRANDID,

 ship_ngazidja = :SHIPNGAZIDJA , ship_ndzouwani = :SHIPNDOUWANI , ship_mwali = :SHIPMWALI , ship_france = :SHIPFRANCE,
 Ship_Method_Ngazidja = :Ship_Method_Ngazidja , Ship_Method_Ndzuwani = :Ship_Method_Ndzuwani , Ship_Method_Mwali = :Ship_Method_Mwali , Ship_Method_France = :Ship_Method_France,
 ship_ngazidja_price = :SHOPNGAZIDJAPRICE , ship_ndzouwani_price = :shipndwaniprice , ship_mwali_price = :SHIP_MWALIPRICE , ship_france_price = :SHIPFRANCEPRICE,
 Estamited_Delivery_Ngzidja = :ESTAMITED_SHIP_NGAZIDJA , Estamited_Delivery_Nduwani = :ESTAMITED_SHIP_NDUWANI , Estamited_Delivery_Mwali = :ESTAMITED_SHIP_MWALI , Estamited_Delivery_France = :ESTAMITED_SHIP_FRACE,
 Fixed_shipping_price_Ngazidja = :Fixed_shipping_price_Ngazidja,Fixed_shipping_price_Ndzuwani = :Fixed_shipping_price_Ndzuwani, Fixed_shipping_price_Mwali = :Fixed_shipping_price_Mwali ,Fixed_shipping_price_France = :Fixed_shipping_price_France,

 MemoryStorage = :MEMORY_SOREAGE , MemoryRAM = :MEMOERY_RAM , Operating_System_ID = :OPERATING_SYSTEM , CPU = :CPU , GPU_ID = :GPU_ID,
 camera_resolution = :camera_resolution , sim_id  = :SIM , SSD_ID = :SSD_ID
  WHERE ItemID =:PRODUCT_ID
");

}



$stmt->bindParam(":PRODUCT_ID",$_POST["product__"],PDO::PARAM_STR);
$stmt->bindParam(":NAME",$name,PDO::PARAM_STR);
$stmt->bindParam(":DESCRIPTION",$description,PDO::PARAM_STR);
$stmt->bindParam(":PRICE",$price,PDO::PARAM_STR);
$stmt->bindParam(":CURRENCY",$current,PDO::PARAM_STR);
$stmt->bindParam(":COUNTRY",$country,PDO::PARAM_STR);
$stmt->bindParam(":STATUS",$status,PDO::PARAM_STR);
$stmt->bindParam(":CATEGORYID",$catid,PDO::PARAM_STR);
$stmt->bindParam(":MEMBERID",$seller__,PDO::PARAM_INT);
$stmt->bindParam(":BRANDID",$brand,PDO::PARAM_INT);
if ($edit_img == 1) {
  $stmt->bindParam(":PIC1",$pathimg1,PDO::PARAM_STR);
  $stmt->bindParam(":PIC2",$pathimg2,PDO::PARAM_STR);
  $stmt->bindParam(":PIC3",$pathimg3,PDO::PARAM_STR);

}



$stmt->bindParam(":SHIPNGAZIDJA",$ship_ngazidja,PDO::PARAM_STR);
$stmt->bindParam(":SHIPNDOUWANI",$ship_ndzuwani,PDO::PARAM_STR);
$stmt->bindParam(":SHIPMWALI",$ship_mwali,PDO::PARAM_STR);
$stmt->bindParam(":SHIPFRANCE",$ship_france,PDO::PARAM_STR);

$stmt->bindParam(":Ship_Method_Ngazidja",$ship_metho_ngazidja,PDO::PARAM_INT);
$stmt->bindParam(":Ship_Method_Ndzuwani",$ship_metho_ndzuwa_selc,PDO::PARAM_INT);
$stmt->bindParam(":Ship_Method_Mwali",$ship_metho_mwali,PDO::PARAM_INT);
$stmt->bindParam(":Ship_Method_France",$ship_metho_france,PDO::PARAM_INT);




$stmt->bindParam(":SHOPNGAZIDJAPRICE",$ship__price_ngazidja,PDO::PARAM_STR);
$stmt->bindParam(":shipndwaniprice",$ship_ndzuwani_price,PDO::PARAM_STR);
$stmt->bindParam(":SHIP_MWALIPRICE",$ship_mwali_price,PDO::PARAM_STR);
$stmt->bindParam(":SHIPFRANCEPRICE",$ship_france_price,PDO::PARAM_STR);


$stmt->bindParam(":ESTAMITED_SHIP_NGAZIDJA",$estamit_day_ngazidja_value,PDO::PARAM_STR);
$stmt->bindParam(":ESTAMITED_SHIP_NDUWANI",$estamit_day_ndzuwani_value,PDO::PARAM_STR);
$stmt->bindParam(":ESTAMITED_SHIP_MWALI",$estamit_day_mwali_value,PDO::PARAM_STR);
$stmt->bindParam(":ESTAMITED_SHIP_FRACE",$estamit_day_france_value,PDO::PARAM_STR);

$stmt->bindParam(":Fixed_shipping_price_Ngazidja",$fixed_shpping_price_ngazidja,PDO::PARAM_STR);
$stmt->bindParam(":Fixed_shipping_price_Ndzuwani",$fixed_shipping_price_ndzuwani,PDO::PARAM_STR);
$stmt->bindParam(":Fixed_shipping_price_Mwali",$fixed_shipping_price_mwali,PDO::PARAM_STR);
$stmt->bindParam(":Fixed_shipping_price_France",$fixed_shipping_price_france,PDO::PARAM_STR);

$stmt->bindParam(":MEMORY_SOREAGE",$storage,PDO::PARAM_INT);
$stmt->bindParam(":MEMOERY_RAM",$ram,PDO::PARAM_INT);
$stmt->bindParam(":OPERATING_SYSTEM",$operating_System,PDO::PARAM_INT);
$stmt->bindParam(":CPU",$cpu,PDO::PARAM_INT);
$stmt->bindParam(":GPU_ID",$gpu,PDO::PARAM_INT);
$stmt->bindParam(":camera_resolution",$camera_resolution,PDO::PARAM_INT);
$stmt->bindParam(":SIM",$sim,PDO::PARAM_INT);
$stmt->bindParam(":SSD_ID",$ssd,PDO::PARAM_INT);





//$stmt->bindParam(":VERSION_OS",$Verssion_operating_sys_id_for_post,PDO::PARAM_INT);


$stmt ->execute();
$last_id = $conn->lastInsertId();


if(isset($_POST["network"])){
  if(sizeof(json_decode($_POST["network"])) > 0){
    $networks = json_decode($_POST["network"]);

    $stmt_delte_netwk = $conn->prepare("DELETE FROM network_for_product WHERE Product_ID =:PRODUCTID ");
    $stmt_delte_netwk->bindParam(":PRODUCTID",$_POST["product__"],PDO::PARAM_INT);
    $stmt_delte_netwk->execute();
    foreach ($networks as  $value) {
      $stmt_network = $conn->prepare("INSERT INTO network_for_product (Product_ID,Network_ID) VALUES(:PRODUCT_ID,:NETWORK_ID)");
      $stmt_network->bindParam(":PRODUCT_ID",$_POST["product__"],PDO::PARAM_INT);
      $stmt_network->bindParam(":NETWORK_ID",$value,PDO::PARAM_INT);
      $stmt_network->execute();
    }




}

}


if(isset($_POST["payments_ngazidja"])){
  if(sizeof(json_decode($_POST["payments_ngazidja"])) > 0){
     $metds_pay_ngazidja = json_decode($_POST["payments_ngazidja"]);
     $PLACE_SH =1;

     $stmt_dlete_paym_ngazidja = $conn->prepare("DELETE FROM  payemts_allow_detais WHERE  ProductID = :ProductID AND Place_Ship = :PLACE_SHIP ");
     $stmt_dlete_paym_ngazidja->bindParam(":ProductID",$_POST["product__"],PDO::PARAM_INT);
     $stmt_dlete_paym_ngazidja->bindParam(":PLACE_SHIP",$PLACE_SH,PDO::PARAM_INT);
     $stmt_dlete_paym_ngazidja->execute();

     foreach ($metds_pay_ngazidja as  $value) {
       $mystm = $conn->prepare("INSERT INTO payemts_allow_detais (ProductID,Place_Ship,Payment_id) VALUES(:PRODUCTID,:PLACE_SHIPING,:PAYMENTID) ");
       $mystm->bindParam(":PRODUCTID",$_POST["product__"],PDO::PARAM_INT);
       $mystm->bindParam(":PLACE_SHIPING",$PLACE_SH,PDO::PARAM_INT);
       $mystm->bindParam(":PAYMENTID",$value,PDO::PARAM_STR);
       $mystm->execute();
     }
   }
}

if (isset($_POST["payme_id_ndzuwani"])) {
  if(sizeof(json_decode($_POST["payme_id_ndzuwani"])) > 0){
       $PLACE_SH =2;
     $metds_pay_ndzuwani = json_decode($_POST["payme_id_ndzuwani"]);

     $stmt_dlete_paym_ndzuwani = $conn->prepare("DELETE FROM  payemts_allow_detais WHERE  ProductID = :ProductID AND Place_Ship = :PLACE_SHIP ");
     $stmt_dlete_paym_ndzuwani->bindParam(":ProductID",$_POST["product__"],PDO::PARAM_INT);
     $stmt_dlete_paym_ndzuwani->bindParam(":PLACE_SHIP",$PLACE_SH,PDO::PARAM_INT);
     $stmt_dlete_paym_ndzuwani->execute();

     foreach ($metds_pay_ndzuwani as  $value) {
       $mystm = $conn->prepare("INSERT INTO payemts_allow_detais (ProductID,Place_Ship,Payment_id) VALUES(:PRODUCTID,:PLACE_SHIPING,:PAYMENTID) ");
       $mystm->bindParam(":PRODUCTID",$_POST["product__"],PDO::PARAM_INT);
       $mystm->bindParam(":PLACE_SHIPING",$PLACE_SH,PDO::PARAM_INT);
       $mystm->bindParam(":PAYMENTID",$value,PDO::PARAM_STR);
       $mystm->execute();
     }
   }
}

if (isset($_POST["paym_id_mwali"])) {
  if(sizeof(json_decode($_POST["paym_id_mwali"])) > 0){
     $PLACE_SH =3;
     $metds_pay_mwali = json_decode($_POST["paym_id_mwali"]);

     $stmt_dlete_paym_mwali = $conn->prepare("DELETE FROM  payemts_allow_detais WHERE  ProductID = :ProductID AND Place_Ship = :PLACE_SHIP ");
     $stmt_dlete_paym_mwali->bindParam(":ProductID",$_POST["product__"],PDO::PARAM_INT);
     $stmt_dlete_paym_mwali->bindParam(":PLACE_SHIP",$PLACE_SH,PDO::PARAM_INT);
     $stmt_dlete_paym_mwali->execute();


     foreach ($metds_pay_mwali as  $value) {
       $mystm = $conn->prepare("INSERT INTO payemts_allow_detais (ProductID,Place_Ship,Payment_id) VALUES(:PRODUCTID,:PLACE_SHIPING,:PAYMENTID) ");
       $mystm->bindParam(":PRODUCTID",$_POST["product__"],PDO::PARAM_INT);
       $mystm->bindParam(":PLACE_SHIPING",$PLACE_SH,PDO::PARAM_INT);
       $mystm->bindParam(":PAYMENTID",$value,PDO::PARAM_STR);
       $mystm->execute();
     }
   }
}


if (isset($_POST["paym_id_france"])) {
  if(sizeof(json_decode($_POST["paym_id_france"])) > 0){
    $PLACE_SH =4;
     $metds_pay_france = json_decode($_POST["paym_id_france"]);

      $stmt_dlete_paym_france = $conn->prepare("DELETE FROM  payemts_allow_detais WHERE  ProductID = :ProductID AND Place_Ship = :PLACE_SHIP ");
      $stmt_dlete_paym_france->bindParam(":ProductID",$_POST["product__"],PDO::PARAM_INT);
      $stmt_dlete_paym_france->bindParam(":PLACE_SHIP",$PLACE_SH,PDO::PARAM_INT);
      $stmt_dlete_paym_france->execute();

     foreach ($metds_pay_france as  $value) {
       $mystm = $conn->prepare("INSERT INTO payemts_allow_detais (ProductID,Place_Ship,Payment_id) VALUES(:PRODUCTID,:PLACE_SHIPING,:PAYMENTID) ");
       $mystm->bindParam(":PRODUCTID",$_POST["product__"],PDO::PARAM_INT);
       $mystm->bindParam(":PLACE_SHIPING",$PLACE_SH,PDO::PARAM_INT);
       $mystm->bindParam(":PAYMENTID",$value,PDO::PARAM_STR);
       $mystm->execute();
     }
   }
}

echo "1";

}
 else {
echo "0";
  }

}else{
  echo "0";
}

 ?>
