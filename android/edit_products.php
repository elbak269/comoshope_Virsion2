<?php

include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");
/*
if(isset($_GET["curencyid"]) && isset($_GET["island_id"]) ){
class product{
public $id;
public $name;
public $description;
public $price;
public $currency;
public $category;
public $registreddate;
public $rating;
public $countrymade;
public $status;
public $saller;
public $brand;
public $island;
public $country;
public $gouvernorate;
public $city;
public $shippingid;
public $shippingname;
public $pic1;
public $pic2;
public $pic3;
public $offer;
public $tags;
public $verificated;
public $count_bought;
public $BestSeller;
public $color;

}

$sql = "SELECT items.* ,brand.BrandID as brandid,
brand.BrandName as brandname,
categories.CategoryID as catid,
categories.Name as catName,
sellers.SellerID as userId,
currency.CurrencyName as currencyname,
shipping.ShippingName as shippingname,
sellers.Verificated,
sellers.BestSeller,
colors.ColorName,
items.CurrencyID as curcyid
FROM items
INNER JOIN brand ON items.BrandID = brand.BrandID
INNER JOIN  sellers ON sellers.SellerID = items.MemberID
INNER JOIN categories ON categories.CategoryID = items.CategoryID
INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
INNER JOIN shipping ON shipping.ShippingID = items.ShippingID
LEFT JOIN colors ON items.Color = colors.ColorID
WHERE  (ship_ngazidja = :SHIPNGAZIDJA OR ship_ndzouwani = :SHIPNDUWANI OR ship_mwali = :SHIPMWALI OR  ship_france = :SHIPFRANCE) AND(sellers.Verificated = 'true' AND sellers.BestSeller = 'true')
";
$tru = 1;
$fal = 8;
$stm = $conn->prepare($sql);


if($_GET["island_id"] == "1") {
  $stm->bindParam(":SHIPNGAZIDJA",$tru,PDO::PARAM_INT);
  $stm->bindParam(":SHIPNDUWANI",$fal,PDO::PARAM_INT);
  $stm->bindParam(":SHIPMWALI",$fal,PDO::PARAM_INT);
  $stm->bindParam(":SHIPFRANCE",$fal,PDO::PARAM_INT);
}
else if($_GET["island_id"] == "2"){
  $stm->bindParam(":SHIPNGAZIDJA",$fal,PDO::PARAM_INT);
  $stm->bindParam(":SHIPNDUWANI",$tru,PDO::PARAM_INT);
  $stm->bindParam(":SHIPMWALI",$fal,PDO::PARAM_INT);
  $stm->bindParam(":SHIPFRANCE",$fal,PDO::PARAM_INT);
}
else if($_GET["island_id"] == "3"){
  $stm->bindParam(":SHIPNGAZIDJA",$fal,PDO::PARAM_INT);
  $stm->bindParam(":SHIPNDUWANI",$fal,PDO::PARAM_INT);
  $stm->bindParam(":SHIPMWALI",$tru,PDO::PARAM_INT);
  $stm->bindParam(":SHIPFRANCE",$fal,PDO::PARAM_INT);
}
else if($_GET["island_id"] == "farnce"){
  $stm->bindParam(":SHIPNGAZIDJA",$fal,PDO::PARAM_INT);
  $stm->bindParam(":SHIPNDUWANI",$fal,PDO::PARAM_INT);
  $stm->bindParam(":SHIPMWALI",$fal,PDO::PARAM_INT);
  $stm->bindParam(":SHIPFRANCE",$tru,PDO::PARAM_INT);
}

$stm->execute();
$fetch = $stm->fetchAll();
$ARR = array();
foreach ($fetch as $value) {
  $myobj = new product();
  $myobj ->id = $value['ItemID'];
  $myobj ->name = $value['Name'];
  $myobj->description = $value['Description'];
  if($_GET["curencyid"] ==  $value["curcyid"]){
      $myobj->price = $value['Price'];
  }else{
    $myobj->price =   $value['Price']*get_exchange($_GET["curencyid"]);
  }

  $myobj->currency=$value['currencyname'];
  $myobj->registreddate=$value['AddDate'];
  $myobj->rating=$value['Rating'];
  $myobj->status=$value['Status'];
  $myobj->country=$value['CountryMade'];
  $myobj->category=$value['catid'];
  $myobj->brand=$value['BrandID'];
  $myobj->island=$value['IslandID'];
  $myobj->gouvernorate=$value['GouvernoratID'];
  $myobj->city=$value['CityID'];
  $myobj->shippingid=$value['ShippingID'];
  $myobj->shippingname=$value['shippingname'];
  $myobj->pic1=$value['Pic1'];
  $myobj->pic2=$value['Pic2'];
  $myobj->pic3=$value['Pic3'];
  $myobj->offer=$value['Offer'];
  $myobj->tags=$value['Tags'];
  $myobj->saller=$value['MemberID'];
  $myobj->verificated = $value['Verificated'];
  $myobj->BestSeller = $value['BestSeller'];
  $myobj->color = $value['ColorName'];
  $myobj->count_bought = count_bought_item($value['ItemID']);
  $ARR[] = $myobj;

}

echo json_encode(array("item"=>$ARR));
*/
















 if(isset($_POST["get_product_info_by_id"]) && isset($_POST["productid"]) && isset($_POST["currencyid"]) ){

class productifo{
  public $productname;
  public $description;
  public $madein;
  public $price;
  public $status;
  public $brandid;
  public $categoryid;
  public $shipngazidja;
  public $shipndzuwani;
  public $shipmwali;
  public $shipfrance;


  public $CurrencyName;
  public $CurrencyID;

  public $ship_price_ngazidja;
  public $ship_price_ndzuwani;
  public $ship_price_mwali;
  public $ship_price_france;

  public $expected_date_ngazidja;
  public $expected_date_ndzuwani;
  public $expected_date_mwali;
  public $expected_date_france;

  public $ship_method_ngazidja;
  public $ship_method_ndzuwani;
  public $ship_method_mwali;
  public $ship_method_france;

  public $payment_method_ngazidja;
  public $payment_method_ndzuwani;
  public $payment_method_mwali;
  public $payment_method_france;

  public $pic1;
  public $pic2;
  public $pic3;

  public $categoryna;
  public $brandname;

  public $payment_method_name_ngazidja;
  public $payment_method_name_ndzuwani;
  public $payment_method_name_mwali;
  public $payment_method_name_france;
/*
  public $ship_method_name_ngazidja;
  public $ship_method_name_ndzuwani;
  public $ship_method_name_mwali;
  public $ship_method_name_france;*/

  public $payment_methods_ngazidja;
  public $payment_methods_ndzuwani;
  public $payment_methods_mwali;
  public $payment_methods_france;

  public $Rame_Value;
  public $RamID;
  public $Storage_Value;
  public $Storage_ID;
  public $OS_NAME;
  public $OS_ID;
  public $Resolution_Value;
  public $Resolution_ID;

  public $SIM_Card_Slot_VALUE;
  public $SIM_Card_Slot_ID;
  public $network_ss__;

  public $CPUNAME;
  public $CPU;
  public $GPU_NAME;
  public $GPU_ID;
  public $SSD_VALUE;
  public $SSD_ID;







}

$prod =  get_product_info_by_id($_POST["productid"]);
$resut = array();
foreach ($prod as $value) {
$myob = new productifo();
$myob->productname = $value["Name"];
$myob->description = $value["Description"];
$myob->madein      = $value["CountryMade"];
$myob->price = $value["Price"];
$myob->status = $value["Status"];
$myob->brandid = $value["BrandID"];
$myob->categoryid = $value["CategoryID"];

$myob->CurrencyName = $value["CurrencyName"];
$myob->CurrencyID = $value["CurrencyID"];

$myob->shipngazidja = $value["ship_ngazidja"];
$myob->shipndzuwani = $value["ship_ndzouwani"];
$myob->shipmwali = $value["ship_mwali"];
$myob->shipfrance = $value["ship_france"];

$myob->ship_price_ngazidja = $value["ship_ngazidja_price"];
$myob->ship_price_ndzuwani = $value["ship_ndzouwani_price"];
$myob->ship_price_mwali = $value["ship_mwali_price"];
$myob->ship_price_france = $value["ship_france_price"];

$myob->expected_date_ngazidja = $value["Estamited_Delivery_Ngzidja"];
$myob->expected_date_ndzuwani = $value["Estamited_Delivery_Nduwani"];
$myob->expected_date_mwali = $value["Estamited_Delivery_Mwali"];
$myob->expected_date_france = $value["Estamited_Delivery_France"];

$myob->ship_method_ngazidja = $value["Ship_Method_Ngazidja"];
$myob->ship_method_ndzuwani = $value["Ship_Method_Ndzuwani"];
$myob->ship_method_mwali    = $value["Ship_Method_Mwali"];
$myob->ship_method_france   = $value["Ship_Method_France"];


$myob->payment_methods_ngazidja  = get_products_payments($_POST["productid"],1);
$myob->payment_methods_ndzuwani  = get_products_payments($_POST["productid"],2);
$myob->payment_methods_mwali  = get_products_payments($_POST["productid"],3);
$myob->payment_method_france  = get_products_payments($_POST["productid"],4);
$myob->Rame_Value             = $value["Rame_Value"];
$myob->RamID                  = $value["RamID"];
$myob->Storage_Value          = $value["Storage_Value"];
$myob->Storage_ID             = $value["Storage_ID"];
$myob->OS_NAME                = $value["OS_NAME"];
$myob->OS_ID                  = $value["OS_ID"];
$myob->Resolution_Value       = $value["Resolution_Value"];
$myob->Resolution_ID          = $value["Resolution_ID"];
$myob->SIM_Card_Slot_VALUE    = $value["SIM_Card_Slot_VALUE"];
$myob->SIM_Card_Slot_ID       = $value["SIM_Card_Slot_ID"];

$myob->CPUNAME                 = $value["CPUNAME"];
$myob->CPU                    = $value["CPU"];
$myob->GPU_NAME               = $value["GPU_NAME"];
$myob->GPU_ID                 = $value["GPU_ID"];
$myob->SSD_VALUE              = $value["SSD_VALUE"];
$myob->SSD_ID                 = $value["SSD_ID"];




$myob->network_ss__     = get_network($_POST["productid"]);







$myob->pic1   = $value["Pic1"];
$myob->pic2   = $value["Pic2"];
$myob->pic3   = $value["Pic3"];

$myob->categoryna   = $value["categoryna"];
$myob->brandname      = $value["brandname"];

if(!empty($value["payment_method_Ngazida"])){
$myob->payment_method_name_ngazidja      =  getpayment_name($value["payment_method_Ngazida"]);
}
if(!empty($value["payment_method_Ndzuwani"])){
$myob->payment_method_name_ndzuwani      =  getpayment_name($value["payment_method_Ndzuwani"]);
}
if(!empty($value["payment_method_Mwali"])){
$myob->payment_method_name_mwali      =  getpayment_name($value["payment_method_Mwali"]);
}
if(!empty($value["payment_method_France"])){
$myob->payment_method_name_france     =  getpayment_name($value["payment_method_France"]);
}


if(!empty($value["Ship_Method_Ngazidja"])){
  $myob->ship_method_name_ngazidja     =  getpayment_ship_name($value["Ship_Method_Ngazidja"]);
}
if(!empty($value["Ship_Method_Ndzuwani"])){
  $myob->ship_method_name_ndzuwani     =  getpayment_ship_name($value["Ship_Method_Ndzuwani"]);
}
if(!empty($value["Ship_Method_Mwali"])){
  $myob->ship_method_name_mwali     =  getpayment_ship_name($value["Ship_Method_Mwali"]);
}
if(!empty($value["Ship_Method_France"])){
  $myob->ship_method_name_france     =  getpayment_ship_name($value["Ship_Method_France"]);
}







$resut [] = $myob;

}

echo json_encode( array('item' => $resut));

}





else if(isset($_POST["edit_product"]) && isset($_POST["productname"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["currency"]) && isset($_POST["country_made"]) && isset($_POST["status"])
&& isset($_POST["category_id"])
&& isset($_POST["brand_id"])
  && isset($_POST["ship_ngazidaj"]) && isset($_POST["price_ship_ngazidja"]) && isset($_POST["expected_date_ngazidja"]) && isset($_POST["method_ship_ngazidja"]) && isset($_POST["method_payment_ngazidja"])
 && isset($_POST["ship_ndzuwani"]) && isset($_POST["price_ship_ndzuwani"]) && isset($_POST["expected_date_ndzuwani"]) && isset($_POST["method_ship_ndzuwani"]) && isset($_POST["method_payment_ndzuwani"])
 && isset($_POST["ship_mwali"]) && isset($_POST["price_ship_mwali"])  && isset($_POST["expected_date_mwali"])  && isset($_POST["method_ship_mwali"])  && isset($_POST["method_payment_mwali"])
 && isset($_POST["ship_france"])  && isset($_POST["price_ship_france"]) && isset($_POST["expected_date_france"]) && isset($_POST["method_ship_france"]) && isset($_POST["method_payment_france"])
 && isset($_POST["Pic1"]) && isset($_POST["Pic2"]) && isset($_POST["Pic3"])  && isset($_POST["username"]) && isset($_POST["productid___"])
 ){

  $MY_PRODU_ID = $_POST["productid___"];
  $productname                = $_POST["productname"];
  $description                = $_POST["description"];



  $stroage_id_for_post = null;
  if (isset($_POST["stroage_id_for_post"])) {
    if ($_POST["stroage_id_for_post"] != "") {
      $stroage_id_for_post = $_POST["stroage_id_for_post"];
    }
  }

  $ram_id_for_post = null;

  if (isset($_POST["ram_id_for_post"])) {
    if ($_POST["ram_id_for_post"] != "") {
      $ram_id_for_post = $_POST["ram_id_for_post"];
    }
  }



  $operating_sys_id_for_post = null;
  if (isset($_POST["operating_sys_id_for_post"])) {
    if ($_POST["operating_sys_id_for_post"] != "") {
      $operating_sys_id_for_post = $_POST["operating_sys_id_for_post"];
    }
  }



  $Verssion_operating_sys_id_for_post = null;
  if (isset($_POST["Verssion_operating_sys_id_for_post"])) {
    if ($_POST["Verssion_operating_sys_id_for_post"] != "") {
      $Verssion_operating_sys_id_for_post = $_POST["Verssion_operating_sys_id_for_post"];
    }
  }

  $price  ;
  if($_POST['currency'] == "1"){
      $price = $_POST['price'];
  }else{
    $price = $_POST['price'] / get_exchange($_POST['currency']);
  }
  $county_pr                  = $_POST["country_made"];
  $status                     = $_POST["status"];
  $category_id                = $_POST["category_id"];
  $brand_id                   = $_POST["brand_id"];




$cpu = null;
if (isset($_POST["cpu"])) {
  $cpu = $_POST["cpu"];
}

$gpu = null ;
if (isset($_POST["gpu"])) {
  $gpu = $_POST["gpu"];
}



$ssd = null;
if (isset($_POST["ssd"])) {
  $ssd = $_POST["ssd"];
}

$cart_sim_for_post = null;
if (isset($_POST["cart_sim_for_post"])) {
  $cart_sim_for_post = $_POST["cart_sim_for_post"];
}

$resolution_for_post = null;
if (isset($_POST["resolution_for_post"])) {
  $resolution_for_post = $_POST["resolution_for_post"];

}




          $ship_ngazidaj              = $_POST["ship_ngazidaj"];
          if($_POST['currency'] == "1"){
          $price_ship_ngazidja        = $_POST["price_ship_ngazidja"];
          }else{
          $price_ship_ngazidja        = $_POST["price_ship_ngazidja"] * get_exchange($_POST['currency']);
          }
          $price_ship_ngazidja        = $_POST["price_ship_ngazidja"];
          $expected_date_ngazidja     = $_POST["expected_date_ngazidja"];
          $method_ship_ngazidja       = $_POST["method_ship_ngazidja"];
          $method_payment_ngazidja    = $_POST["method_payment_ngazidja"];



          $ship_ndzuwani              = $_POST["ship_ndzuwani"];
          if($_POST['currency'] == "1"){
          $price = $_POST['price'];
          $price_ship_ndzuwani        = $_POST["price_ship_ndzuwani"];
          }else{
          $price_ship_ndzuwani        = $_POST["price_ship_ndzuwani"] * get_exchange($_POST['currency']);
          }

          $expected_date_ndzuwani     = $_POST["expected_date_ndzuwani"];

          if ($_POST["method_ship_ndzuwani"] =="") {
          $method_ship_ndzuwani       = null;
          }else {
          $method_ship_ndzuwani       = $_POST["method_ship_ndzuwani"];
          }

          if (  $_POST["method_payment_ndzuwani"] == "") {
          $method_payment_ndzuwani    = null;
          }else{
          $method_payment_ndzuwani    = $_POST["method_payment_ndzuwani"];
          }



          $ship_mwali                 = $_POST["ship_mwali"];
          if($_POST['currency'] == "1"){
          $price_ship_mwali           = $_POST["price_ship_mwali"];
          }else{
          $price_ship_mwali           = $_POST["price_ship_mwali"] * get_exchange($_POST['currency']);
          }

          $expected_date_mwali        = $_POST["expected_date_mwali"];

          if ($_POST["method_ship_mwali"] == "") {
          $method_ship_mwali  = null;
          }else{
          $method_ship_mwali          = $_POST["method_ship_mwali"];
          }


          if ( $_POST["method_payment_mwali"] == "") {
          $method_payment_mwali   = null;
          }else{
          $method_payment_mwali       = $_POST["method_payment_mwali"];
          }



          $ship_france                = $_POST["ship_france"];
          if($_POST['currency'] == "1"){
          $price_ship_france          = $_POST["price_ship_france"];
          }else{
          $price_ship_france          = $_POST["price_ship_france"] *get_exchange($_POST['currency']);
          }

          $expected_date_france       = $_POST["expected_date_france"];

          if ($_POST["method_ship_france"] == "") {
          $method_ship_france         = null;
          }else{
          $method_ship_france         = $_POST["method_ship_france"];
          }

          if ($_POST["method_payment_france"] == "") {
          $method_payment_france      = null;
          }else{
          $method_payment_france      = $_POST["method_payment_france"];
          }


  $pic1                       = $_POST["Pic1"];
  $pic2                       = $_POST["Pic2"];
  $pic3                       = $_POST["Pic3"];
  $username                   = $_POST["username"];



  $myrand      =  rand(1000,10000000000000);
  $decodinimg1  =  base64_decode($_POST["Pic1"]."JPG");
  $decodinimg2  =  base64_decode($_POST["Pic2"]."JPG");
  $decodinimg3  =  base64_decode($_POST["Pic3"]."JPG");

  $ALLPATHIMG1  = $username."/".$myrand."1".".JPG";
  $ALLPATHIMG2  = $username."/".$myrand."2".".JPG";
  $ALLPATHIMG3  = $username."/".$myrand."3".".JPG";


$dtb_img1 = get_img_1($MY_PRODU_ID);
$dtb_img2 = get_img_2($MY_PRODU_ID);
$dtb_img3 = get_img_3($MY_PRODU_ID);


if(file_exists("../theme/image/"."uploade_img/".$dtb_img1)){
  unlink("../theme/image/"."uploade_img/".$dtb_img1);
}

if(file_exists("../theme/image/"."uploade_img/".$dtb_img2)){
  unlink("../theme/image/"."uploade_img/".$dtb_img2);
}

if (file_exists("../theme/image/"."uploade_img/".$dtb_img3)) {
 unlink("../theme/image/"."uploade_img/".$dtb_img3);
}





$current = 1;




  $stmt = $conn->prepare("UPDATE items SET
    Name =:NAME , Description = :DESCRIPTION , Price = :PRICE, CurrencyID = :CURRENCY , AddDate =  NOW() , CountryMade = :COUNTRY ,

    Status = :STATUS , CategoryID = :CATEGORYID  , BrandID = :BRANDID,

    Ship_Method_Ngazidja = :Ship_Method_Ngazidja , Ship_Method_Ndzuwani = :Ship_Method_Ndzuwani , Ship_Method_Mwali = :Ship_Method_Mwali , Ship_Method_France = :Ship_Method_France ,

    Pic1 = :PIC1 , Pic2 = :PIC2 , Pic3 = :PIC3,

    ship_ngazidja =:SHIPNGAZIDJA ,ship_ndzouwani = :SHIPNDOUWANI , ship_mwali = :SHIPMWALI , ship_france = :SHIPFRANCE,

    ship_ngazidja_price = :SHOPNGAZIDJAPRICE , ship_ndzouwani_price = :shipndwaniprice , ship_mwali_price = :SHIP_MWALIPRICE , ship_france_price = :SHIPFRANCEPRICE,

    Estamited_Delivery_Ngzidja = :ESTAMITED_SHIP_NGAZIDJA , Estamited_Delivery_Nduwani = :ESTAMITED_SHIP_NDUWANI , Estamited_Delivery_Mwali = :ESTAMITED_SHIP_MWALI , Estamited_Delivery_France = :ESTAMITED_SHIP_FRACE,

    MemoryStorage =:MEMORY_SOREAGE, MemoryRAM = :MEMOERY_RAM,Operating_System_ID = :OPERATING_SYSTEM ,Version_Operating_System_ID = :VERSION_OS,
    CPU = :CPU , GPU_ID = :GPU_ID ,SSD_ID = :SSD_ID ,camera_resolution = :camera_resolution , sim_id = :sim_id

    WHERE items.ItemID = :ITEMID

");

$stmt->bindParam(":ITEMID",$MY_PRODU_ID,PDO::PARAM_INT);

$stmt->bindParam(":NAME",$productname,PDO::PARAM_STR);
$stmt->bindParam(":DESCRIPTION",$description,PDO::PARAM_STR);
$stmt->bindParam(":PRICE",$price,PDO::PARAM_STR);
$stmt->bindParam(":CURRENCY",$current,PDO::PARAM_STR);
$stmt->bindParam(":COUNTRY",$county_pr,PDO::PARAM_STR);
$stmt->bindParam(":STATUS",$status,PDO::PARAM_STR);
$stmt->bindParam(":CATEGORYID",$category_id,PDO::PARAM_STR);
$stmt->bindParam(":BRANDID",$brand_id,PDO::PARAM_INT);
$stmt->bindParam(":PIC1",$ALLPATHIMG1,PDO::PARAM_STR);
$stmt->bindParam(":PIC2",$ALLPATHIMG2,PDO::PARAM_STR);
$stmt->bindParam(":PIC3",$ALLPATHIMG3,PDO::PARAM_STR);

$stmt->bindParam(":camera_resolution",$resolution_for_post,PDO::PARAM_INT);
$stmt->bindParam(":sim_id",$cart_sim_for_post,PDO::PARAM_INT);



$stmt->bindParam(":CPU",$cpu,PDO::PARAM_INT);
$stmt->bindParam(":GPU_ID",$gpu,PDO::PARAM_INT);
$stmt->bindParam(":SSD_ID",$ssd,PDO::PARAM_INT);



$stmt->bindParam(":Ship_Method_Ngazidja",$method_ship_ngazidja,PDO::PARAM_INT);
$stmt->bindParam(":Ship_Method_Ndzuwani",$method_ship_ndzuwani,PDO::PARAM_INT);
$stmt->bindParam(":Ship_Method_Mwali",$method_ship_mwali,PDO::PARAM_INT);
$stmt->bindParam(":Ship_Method_France",$method_ship_france,PDO::PARAM_INT);



$stmt->bindParam(":SHIPNGAZIDJA",$ship_ngazidaj,PDO::PARAM_STR);
$stmt->bindParam(":SHIPNDOUWANI",$ship_ndzuwani,PDO::PARAM_STR);
$stmt->bindParam(":SHIPMWALI",$ship_mwali,PDO::PARAM_STR);
$stmt->bindParam(":SHIPFRANCE",$ship_france,PDO::PARAM_STR);



$stmt->bindParam(":SHOPNGAZIDJAPRICE",$price_ship_ngazidja,PDO::PARAM_STR);
$stmt->bindParam(":shipndwaniprice",$price_ship_ndzuwani,PDO::PARAM_STR);
$stmt->bindParam(":SHIP_MWALIPRICE",$price_ship_mwali,PDO::PARAM_STR);
$stmt->bindParam(":SHIPFRANCEPRICE",$price_ship_france,PDO::PARAM_STR);


$stmt->bindParam(":ESTAMITED_SHIP_NGAZIDJA",$expected_date_ngazidja,PDO::PARAM_STR);
$stmt->bindParam(":ESTAMITED_SHIP_NDUWANI",$expected_date_ndzuwani,PDO::PARAM_STR);
$stmt->bindParam(":ESTAMITED_SHIP_MWALI",$expected_date_mwali,PDO::PARAM_STR);
$stmt->bindParam(":ESTAMITED_SHIP_FRACE",$expected_date_france,PDO::PARAM_STR);

$stmt->bindParam(":MEMORY_SOREAGE",$stroage_id_for_post,PDO::PARAM_INT);
$stmt->bindParam(":MEMOERY_RAM",$ram_id_for_post,PDO::PARAM_INT);
$stmt->bindParam(":OPERATING_SYSTEM",$operating_sys_id_for_post,PDO::PARAM_INT);
$stmt->bindParam(":VERSION_OS",$Verssion_operating_sys_id_for_post,PDO::PARAM_INT);

$stmt ->execute();


if($stmt->rowCount() > 0){


  if (!file_exists("../theme/image/"."uploade_img/".$username)) {
    mkdir("../theme/image/"."uploade_img/".$username."/");
  }

  file_put_contents("../theme/image/"."uploade_img/".$ALLPATHIMG1,$decodinimg1);
  file_put_contents("../theme/image/"."uploade_img/".$ALLPATHIMG2,$decodinimg2);
  file_put_contents("../theme/image/"."uploade_img/".$ALLPATHIMG3,$decodinimg3);



  if(isset($_POST["network"])){
    if(sizeof(json_decode($_POST["network"])) > 0){
      $networks = json_decode($_POST["network"]);

      $stmt_delte_netwk = $conn->prepare("DELETE FROM network_for_product WHERE Product_ID =:PRODUCTID ");
      $stmt_delte_netwk->bindParam(":PRODUCTID",$_POST["productid___"],PDO::PARAM_INT);
      $stmt_delte_netwk->execute();
      foreach ($networks as  $value) {
        $stmt_network = $conn->prepare("INSERT INTO network_for_product (Product_ID,Network_ID) VALUES(:PRODUCT_ID,:NETWORK_ID)");
        $stmt_network->bindParam(":PRODUCT_ID",$_POST["productid___"],PDO::PARAM_INT);
        $stmt_network->bindParam(":NETWORK_ID",$value,PDO::PARAM_INT);
        $stmt_network->execute();
      }




  }

  }


  $STST_DELET = $conn->prepare("DELETE FROM payemts_allow_detais WHERE  ProductID = :PRODUCTID");
  $STST_DELET->bindParam(":PRODUCTID",$MY_PRODU_ID,PDO::PARAM_INT);
  $STST_DELET->execute();

 if(sizeof(json_decode($_POST["method_payment_ngazidja"])) > 0){
    $metds_pay_ngazidja = json_decode($_POST["method_payment_ngazidja"]);
    $PLACE_SH =1;
    foreach ($metds_pay_ngazidja as  $value) {
      $mystm = $conn->prepare("INSERT INTO payemts_allow_detais (ProductID,Place_Ship,Payment_id) VALUES(:PRODUCTID,:PLACE_SHIPING,:PAYMENTID) ");
      $mystm->bindParam(":PRODUCTID",$MY_PRODU_ID,PDO::PARAM_INT);
      $mystm->bindParam(":PLACE_SHIPING",$PLACE_SH,PDO::PARAM_INT);
      $mystm->bindParam(":PAYMENTID",$value,PDO::PARAM_STR);
      $mystm->execute();
    }
  }

  if(sizeof(json_decode($_POST["method_payment_ndzuwani"])) > 0){
       $PLACE_SH =2;
     $metds_pay_ndzuwani = json_decode($_POST["method_payment_ndzuwani"]);
     foreach ($metds_pay_ndzuwani as  $value) {
       $mystm = $conn->prepare("INSERT INTO payemts_allow_detais (ProductID,Place_Ship,Payment_id) VALUES(:PRODUCTID,:PLACE_SHIPING,:PAYMENTID) ");
       $mystm->bindParam(":PRODUCTID",$MY_PRODU_ID,PDO::PARAM_INT);
       $mystm->bindParam(":PLACE_SHIPING",$PLACE_SH,PDO::PARAM_INT);
       $mystm->bindParam(":PAYMENTID",$value,PDO::PARAM_STR);
       $mystm->execute();
     }
   }

   if(sizeof(json_decode($_POST["method_payment_mwali"])) > 0){
      $metds_pay_mwali = json_decode($_POST["method_payment_mwali"]);
        $PLACE_SH =3;
      foreach ($metds_pay_mwali as  $value) {
        $mystm = $conn->prepare("INSERT INTO payemts_allow_detais (ProductID,Place_Ship,Payment_id) VALUES(:PRODUCTID,:PLACE_SHIPING,:PAYMENTID) ");
        $mystm->bindParam(":PRODUCTID",$MY_PRODU_ID,PDO::PARAM_INT);
        $mystm->bindParam(":PLACE_SHIPING",$PLACE_SH,PDO::PARAM_INT);
        $mystm->bindParam(":PAYMENTID",$value,PDO::PARAM_STR);
        $mystm->execute();
      }
    }

    if(sizeof(json_decode($_POST["method_payment_france"])) > 0){
       $metds_pay_france = json_decode($_POST["method_payment_france"]);
                $PLACE_SH =4;
       foreach ($metds_pay_france as  $value) {
         $mystm = $conn->prepare("INSERT INTO payemts_allow_detais (ProductID,Place_Ship,Payment_id) VALUES(:PRODUCTID,:PLACE_SHIPING,:PAYMENTID) ");
         $mystm->bindParam(":PRODUCTID",$MY_PRODU_ID,PDO::PARAM_INT);
         $mystm->bindParam(":PLACE_SHIPING",$PLACE_SH,PDO::PARAM_INT);
         $mystm->bindParam(":PAYMENTID",$value,PDO::PARAM_STR);
         $mystm->execute();
       }
     }


 echo "1";
}else{
  echo "0";
}







}



?>
