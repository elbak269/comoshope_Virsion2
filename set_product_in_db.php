<?php

session_start();
include("admin/connect.php");
include("admin/includes/languages/english.php");
$functions = "admin/includes/functions/";
include($functions."functions.php");
$img = "theme/image/";


  if (isset($_POST['isert_items']) && isset($_POST['itemName']) && isset($_POST['itemDescription']) && isset($_POST['price']) && isset($_POST['current']) && isset($_POST['status']) &&
  isset($_POST['categoryid']) && isset($_POST['brand']) && isset($_FILES['chooseItemPic1']) && isset($_FILES['itemPic2']) &&
isset($_FILES['itemPic3']) && isset($_POST["seller__"]) && isset($_POST["user__"])){


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
$fixed_shipping_price_ndzuwani = 1;
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
$fixed_shipping_price_mwali        =1;
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

//PIC 1
$picitem1     = $_FILES['chooseItemPic1'];
$avatraname1   = $picitem1["name"];
$avatrsize1   = $picitem1["size"];
$avatrtype1   = $picitem1["type"];
$avatrtemp1   = $picitem1["tmp_name"];

// PIC 2
$_picitem2 = $_FILES['itemPic2'];
$avatraname2   = $_picitem2["name"];
$avatrsize2   = $_picitem2["size"];
$avatrtype2   = $_picitem2["type"];
$avatrtemp2   = $_picitem2["tmp_name"];


//PIC3
$_picitem3 = $_FILES['itemPic3'];
$avatraname3   = $_picitem3["name"];
$avatrsize3    = $_picitem3["size"];
$avatrtype3    = $_picitem3["type"];
$avatrtemp3    = $_picitem3["tmp_name"];


 // LIST OF ALLOW FILE EXTENTION UPLOAD
$avatarAllExtision = array("jpeg","jpg","png","gif","JPG");
$exp1 = explode(".",$avatraname1);
$avatarextension1 = strtolower( end($exp1));

$_exp2 = explode(".",$avatraname2);
$avatarextension2 = strtolower( end($_exp2));

$exp3 = explode(".",$avatraname3);
$avatarextension3 = strtolower( end($exp3));



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
  elseif (!empty($avatarextension1)  &&  !in_array( $avatarextension1,$avatarAllExtision)) {
    $error[]= lang("notAllowExtionpic1");
  }/*elseif ($avatrsize1 >101943040) {
    $error[]= lang("cantsizepic1");
    echo lang("notAllowExtionpic2");
  } */
  elseif (empty($picitem1)) {
    $error[]= lang("antpic1");
  }
//PIC2
elseif (!empty($_picitem2)  &&  !in_array($avatarextension2,$avatarAllExtision)) {
  $error[]= lang("notAllowExtionpic2");
  echo lang("notAllowExtionpic2");
}/*elseif ($avatrsize2 > 101943040) {
//  $error[]= lang("cantsizepic2");
  echo lang("notAllowExtionpic2");
}*/
elseif (empty($_picitem2)) {
  $error[]= lang("antpic2");

}

//PIC3
elseif (!empty($_picitem3)  &&  !in_array($avatarextension3, $avatarAllExtision)) {
  $error[]= lang("notAllowExtionpic3");
}/*elseif ($avatrsize3 > 101943040) {

//  $error[]= lang("cantsizepic3");
  echo lang("notAllowExtionpic2");
}*/
elseif (empty($_picitem3)) {
  $error[]= lang("antpic3");
}

elseif(empty($error)){

$avatarName1 = rand(1000,10000000000000).$avatraname1;
$avatarName2 = rand(1000,10000000000000).$avatraname2;
$avatarName3 = rand(1000,10000000000000).$avatraname3;

$pathimg1 = $_POST["user__"]."/".$avatarName1;
$pathimg2 = $_POST["user__"]."/".$avatarName2;
$pathimg3 = $_POST["user__"]."/".$avatarName3;

if (!file_exists($img."uploade_img/".$_POST["user__"])) {
  mkdir($img."uploade_img/".$_POST["user__"]."/");
}
move_uploaded_file($avatrtemp1,$img."uploade_img/".$_POST["user__"]."/".$avatarName1);
move_uploaded_file($avatrtemp2,$img."uploade_img/".$_POST["user__"]."/".$avatarName2);
move_uploaded_file($avatrtemp3,$img."uploade_img/".$_POST["user__"]."/".$avatarName3);

$stmt = $conn->prepare("INSERT INTO
items (Name,Description,Price,	CurrencyID,AddDate,CountryMade,Status,CategoryID,MemberID,BrandID,
  Ship_Method_Ngazidja,Ship_Method_Ndzuwani,Ship_Method_Mwali,Ship_Method_France,
  Pic1,Pic2,Pic3,
  ship_ngazidja,ship_ndzouwani,ship_mwali,ship_france,
  ship_ngazidja_price,ship_ndzouwani_price,ship_mwali_price,ship_france_price,
  Estamited_Delivery_Ngzidja,Estamited_Delivery_Nduwani,Estamited_Delivery_Mwali,Estamited_Delivery_France,
  Fixed_shipping_price_Ngazidja,Fixed_shipping_price_Ndzuwani,Fixed_shipping_price_Mwali,Fixed_shipping_price_France,
  MemoryStorage,MemoryRAM,Operating_System_ID,CPU,GPU_ID,camera_resolution,sim_id,SSD_ID
)
VALUES(:NAME, :DESCRIPTION, :PRICE, :CURRENCY, NOW(), :COUNTRY,:STATUS,:CATEGORYID, :MEMBERID,  :BRANDID,
:Ship_Method_Ngazidja,:Ship_Method_Ndzuwani,:Ship_Method_Mwali,:Ship_Method_France,

:PIC1, :PIC2, :PIC3,
:SHIPNGAZIDJA,:SHIPNDOUWANI,:SHIPMWALI,:SHIPFRANCE,
:SHOPNGAZIDJAPRICE,:shipndwaniprice,:SHIP_MWALIPRICE,:SHIPFRANCEPRICE,
:ESTAMITED_SHIP_NGAZIDJA,:ESTAMITED_SHIP_NDUWANI,:ESTAMITED_SHIP_MWALI,:ESTAMITED_SHIP_FRACE,
:Fixed_shipping_price_Ngazidja,:Fixed_shipping_price_Ndzuwani,:Fixed_shipping_price_Mwali,:Fixed_shipping_price_France,
:MEMORY_SOREAGE,:MEMOERY_RAM,:OPERATING_SYSTEM,:CPU,:GPU_ID,:camera_resolution,:SIM,:SSD_ID
)");
$stmt->bindParam(":NAME",$name,PDO::PARAM_STR);
$stmt->bindParam(":DESCRIPTION",$description,PDO::PARAM_STR);
$stmt->bindParam(":PRICE",$price,PDO::PARAM_STR);
$stmt->bindParam(":CURRENCY",$current,PDO::PARAM_STR);
$stmt->bindParam(":COUNTRY",$country,PDO::PARAM_STR);
$stmt->bindParam(":STATUS",$status,PDO::PARAM_STR);
$stmt->bindParam(":CATEGORYID",$catid,PDO::PARAM_STR);
$stmt->bindParam(":MEMBERID",$seller__,PDO::PARAM_INT);
$stmt->bindParam(":BRANDID",$brand,PDO::PARAM_INT);
$stmt->bindParam(":PIC1",$pathimg1,PDO::PARAM_STR);
$stmt->bindParam(":PIC2",$pathimg2,PDO::PARAM_STR);
$stmt->bindParam(":PIC3",$pathimg3,PDO::PARAM_STR);


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
if($stmt->rowCount() > 0){

if(isset($_POST["network"])){
  if(sizeof(json_decode($_POST["network"])) > 0){
    $networks = json_decode($_POST["network"]);
    foreach ($networks as  $value) {
      $stmt_network = $conn->prepare("INSERT INTO network_for_product (Product_ID,Network_ID) VALUES(:PRODUCT_ID,:NETWORK_ID)");
      $stmt_network->bindParam(":PRODUCT_ID",$last_id,PDO::PARAM_INT);
      $stmt_network->bindParam(":NETWORK_ID",$value,PDO::PARAM_INT);
      $stmt_network->execute();
    }




}
}


if(isset($_POST["payments_ngazidja"])){

  if(sizeof(json_decode($_POST["payments_ngazidja"])) > 0){
     $metds_pay_ngazidja = json_decode($_POST["payments_ngazidja"]);
     $PLACE_SH =1;
     foreach ($metds_pay_ngazidja as  $value) {
       $mystm = $conn->prepare("INSERT INTO payemts_allow_detais (ProductID,Place_Ship,Payment_id) VALUES(:PRODUCTID,:PLACE_SHIPING,:PAYMENTID) ");
       $mystm->bindParam(":PRODUCTID",$last_id,PDO::PARAM_INT);
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
     foreach ($metds_pay_ndzuwani as  $value) {
       $mystm = $conn->prepare("INSERT INTO payemts_allow_detais (ProductID,Place_Ship,Payment_id) VALUES(:PRODUCTID,:PLACE_SHIPING,:PAYMENTID) ");
       $mystm->bindParam(":PRODUCTID",$last_id,PDO::PARAM_INT);
       $mystm->bindParam(":PLACE_SHIPING",$PLACE_SH,PDO::PARAM_INT);
       $mystm->bindParam(":PAYMENTID",$value,PDO::PARAM_STR);
       $mystm->execute();
     }
   }
}

if (isset($_POST["paym_id_mwali"])) {
  if(sizeof(json_decode($_POST["paym_id_mwali"])) > 0){
     $metds_pay_mwali = json_decode($_POST["paym_id_mwali"]);
       $PLACE_SH =3;
     foreach ($metds_pay_mwali as  $value) {
       $mystm = $conn->prepare("INSERT INTO payemts_allow_detais (ProductID,Place_Ship,Payment_id) VALUES(:PRODUCTID,:PLACE_SHIPING,:PAYMENTID) ");
       $mystm->bindParam(":PRODUCTID",$last_id,PDO::PARAM_INT);
       $mystm->bindParam(":PLACE_SHIPING",$PLACE_SH,PDO::PARAM_INT);
       $mystm->bindParam(":PAYMENTID",$value,PDO::PARAM_STR);
       $mystm->execute();
     }
   }
}


if (isset($_POST["paym_id_france"])) {
  if(sizeof(json_decode($_POST["paym_id_france"])) > 0){
     $metds_pay_france = json_decode($_POST["paym_id_france"]);
              $PLACE_SH =4;
     foreach ($metds_pay_france as  $value) {
       $mystm = $conn->prepare("INSERT INTO payemts_allow_detais (ProductID,Place_Ship,Payment_id) VALUES(:PRODUCTID,:PLACE_SHIPING,:PAYMENTID) ");
       $mystm->bindParam(":PRODUCTID",$last_id,PDO::PARAM_INT);
       $mystm->bindParam(":PLACE_SHIPING",$PLACE_SH,PDO::PARAM_INT);
       $mystm->bindParam(":PAYMENTID",$value,PDO::PARAM_STR);
       $mystm->execute();
     }
   }
}

echo "1";
}



}
 else {
echo "0";
  }

  }
else{
echo "0";
}



 ?>
