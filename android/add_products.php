<?php
include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");

if(isset($_POST["add_new_product"]) && isset($_POST["productname"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["currency"]) && isset($_POST["country_made"]) && isset($_POST["status"]) && isset($_POST["category_id"])
&& isset($_POST["brand_id"])
  && isset($_POST["ship_ngazidaj"]) && isset($_POST["price_ship_ngazidja"]) && isset($_POST["expected_date_ngazidja"]) && isset($_POST["method_ship_ngazidja"]) && isset($_POST["method_payment_ngazidja"])
 && isset($_POST["ship_ndzuwani"]) && isset($_POST["price_ship_ndzuwani"]) && isset($_POST["expected_date_ndzuwani"]) && isset($_POST["method_ship_ndzuwani"]) && isset($_POST["method_payment_ndzuwani"])
 && isset($_POST["ship_mwali"]) && isset($_POST["price_ship_mwali"])  && isset($_POST["expected_date_mwali"])  && isset($_POST["method_ship_mwali"])  && isset($_POST["method_payment_mwali"])
 && isset($_POST["ship_france"])  && isset($_POST["price_ship_france"]) && isset($_POST["expected_date_france"]) && isset($_POST["method_ship_france"]) && isset($_POST["method_payment_france"])
 && isset($_POST["Pic1"]) && isset($_POST["Pic2"]) && isset($_POST["Pic3"])  && isset($_POST["username"]) && isset($_POST["sellerid"])
  && isset($_POST["fixed_ship_pr_ngazidja"])  && isset($_POST["fixed_ship_pr_ndzuwani"])  && isset($_POST["fixed_ship_pr_mwali"])  && isset($_POST["fixed_ship_pr_france"])
 ){
  $productname                = $_POST["productname"];
  $description                = $_POST["description"];
  $sellerid                   = $_POST["sellerid"];
  $price  ;
  if($_POST['currency'] == "1"){
      $price = $_POST['price'];
  }else{
    $price = $_POST['price'] / get_exchange($_POST['currency']);
  }


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


  $county_pr                  = $_POST["country_made"];
  $status                     = $_POST["status"];
  $category_id                = $_POST["category_id"];
  $brand_id                   = $_POST["brand_id"];

  $ship_ngazidaj              = $_POST["ship_ngazidaj"];
  $price_ship_ngazidja        = $_POST["price_ship_ngazidja"];
  $expected_date_ngazidja     = $_POST["expected_date_ngazidja"];

  $method_ship_ngazidja       = $_POST["method_ship_ngazidja"];


  $method_payment_ngazidja    = $_POST["method_payment_ngazidja"];



  $ship_ndzuwani              = $_POST["ship_ndzuwani"];
  $price_ship_ndzuwani        = $_POST["price_ship_ndzuwani"];
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
  $price_ship_mwali           = $_POST["price_ship_mwali"];
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
  $price_ship_france          = $_POST["price_ship_france"];
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
  if (!file_exists("../theme/image/"."uploade_img/".$username)) {
    mkdir("../theme/image/"."uploade_img/".$username."/");
  }

  file_put_contents("../theme/image/"."uploade_img/".$ALLPATHIMG1,$decodinimg1);
  file_put_contents("../theme/image/"."uploade_img/".$ALLPATHIMG2,$decodinimg2);
  file_put_contents("../theme/image/"."uploade_img/".$ALLPATHIMG3,$decodinimg3);

$current = 1;



  $stmt = $conn->prepare("INSERT INTO
  items (Name,Description,Price,	CurrencyID,AddDate,CountryMade,Status,CategoryID,MemberID,BrandID,
    Ship_Method_Ngazidja,Ship_Method_Ndzuwani,Ship_Method_Mwali,Ship_Method_France,
    Pic1,Pic2,Pic3,
    ship_ngazidja,ship_ndzouwani,ship_mwali,ship_france,
    ship_ngazidja_price,ship_ndzouwani_price,ship_mwali_price,ship_france_price,
    Estamited_Delivery_Ngzidja,Estamited_Delivery_Nduwani,Estamited_Delivery_Mwali,Estamited_Delivery_France,
    MemoryStorage,MemoryRAM,Operating_System_ID,Version_Operating_System_ID,
    CPU,GPU_ID,SSD_ID,camera_resolution,sim_id,
    Fixed_shipping_price_Ngazidja,Fixed_shipping_price_Ndzuwani,Fixed_shipping_price_Mwali,Fixed_shipping_price_France
  )
  VALUES(:NAME, :DESCRIPTION, :PRICE, :CURRENCY, NOW(), :COUNTRY,:STATUS,:CATEGORYID, :MEMBERID,  :BRANDID,
  :Ship_Method_Ngazidja,:Ship_Method_Ndzuwani,:Ship_Method_Mwali,:Ship_Method_France,

  :PIC1, :PIC2, :PIC3,
  :SHIPNGAZIDJA,:SHIPNDOUWANI,:SHIPMWALI,:SHIPFRANCE,
  :SHOPNGAZIDJAPRICE,:shipndwaniprice,:SHIP_MWALIPRICE,:SHIPFRANCEPRICE,
  :ESTAMITED_SHIP_NGAZIDJA,:ESTAMITED_SHIP_NDUWANI,:ESTAMITED_SHIP_MWALI,:ESTAMITED_SHIP_FRACE,
  :MEMORY_SOREAGE,:MEMOERY_RAM,:OPERATING_SYSTEM,:VERSION_OS,
  :CPU,:GPU_ID,:SSD_ID,:camera_resolution,:sim_id,
  :Fixed_shipping_price_Ngazidja,:Fixed_shipping_price_Ndzuwani,:Fixed_shipping_price_Mwali,:Fixed_shipping_price_France
)");
$stmt->bindParam(":NAME",$productname,PDO::PARAM_STR);
$stmt->bindParam(":DESCRIPTION",$description,PDO::PARAM_STR);
$stmt->bindParam(":PRICE",$price,PDO::PARAM_STR);
$stmt->bindParam(":CURRENCY",$current,PDO::PARAM_STR);
$stmt->bindParam(":COUNTRY",$county_pr,PDO::PARAM_STR);
$stmt->bindParam(":STATUS",$status,PDO::PARAM_STR);
$stmt->bindParam(":CATEGORYID",$category_id,PDO::PARAM_STR);
$stmt->bindParam(":MEMBERID",$sellerid,PDO::PARAM_INT);
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



$stmt->bindParam(":Fixed_shipping_price_Ngazidja",$_POST["fixed_ship_pr_ngazidja"],PDO::PARAM_INT);
$stmt->bindParam(":Fixed_shipping_price_Ndzuwani",$_POST["fixed_ship_pr_ndzuwani"],PDO::PARAM_INT);
$stmt->bindParam(":Fixed_shipping_price_Mwali",$_POST["fixed_ship_pr_mwali"],PDO::PARAM_INT);
$stmt->bindParam(":Fixed_shipping_price_France",$_POST["fixed_ship_pr_france"],PDO::PARAM_INT);


$stmt ->execute();
$last_id = $conn->lastInsertId();
if($stmt->rowCount() > 0){




 if(sizeof(json_decode($_POST["method_payment_ngazidja"])) > 0){
    $metds_pay_ngazidja = json_decode($_POST["method_payment_ngazidja"]);
    $PLACE_SH =1;
    foreach ($metds_pay_ngazidja as  $value) {
      $mystm = $conn->prepare("INSERT INTO payemts_allow_detais (ProductID,Place_Ship,Payment_id) VALUES(:PRODUCTID,:PLACE_SHIPING,:PAYMENTID) ");
      $mystm->bindParam(":PRODUCTID",$last_id,PDO::PARAM_INT);
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
       $mystm->bindParam(":PRODUCTID",$last_id,PDO::PARAM_INT);
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
        $mystm->bindParam(":PRODUCTID",$last_id,PDO::PARAM_INT);
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
         $mystm->bindParam(":PRODUCTID",$last_id,PDO::PARAM_INT);
         $mystm->bindParam(":PLACE_SHIPING",$PLACE_SH,PDO::PARAM_INT);
         $mystm->bindParam(":PAYMENTID",$value,PDO::PARAM_STR);
         $mystm->execute();
       }
     }


     if(isset($_POST["network"])){
       if(sizeof(json_decode($_POST["network"])) > 0){
         $networks = json_decode($_POST["network"]);

         $stmt_delte_netwk = $conn->prepare("DELETE FROM network_for_product WHERE Product_ID =:PRODUCTID ");
         $stmt_delte_netwk->bindParam(":PRODUCTID",$_POST["productid___"],PDO::PARAM_INT);
         $stmt_delte_netwk->execute();
         foreach ($networks as  $value) {

           $stmt_network = $conn->prepare("INSERT INTO network_for_product (Product_ID,Network_ID) VALUES(:PRODUCT_ID,:NETWORK_ID)");
           $stmt_network->bindParam(":PRODUCT_ID",$last_id,PDO::PARAM_INT);
           $stmt_network->bindParam(":NETWORK_ID",$value,PDO::PARAM_INT);
           $stmt_network->execute();
         }




     }

     }


 echo "1";
}else{
  echo "0";
}
}
else if(isset($_POST["get_all_cate__"]) ){

  class category {
    public $cate_id;
    public $cate_name;
  }
  $mycateg = array();
  foreach (get_all_category() as  $value) {
    $myobj = new  category();
    $myobj->cate_id = $value["CategoryID"];
    $myobj->cate_name = $value["Name"];
    $mycateg[] = $myobj;
  }


  echo json_encode(array(
    "category" => $mycateg
  ));



}


else if(isset($_POST["get_brand"]) && isset($_POST["category_id"])  ){

  class brand {
    public $brand_id;
    public $brand_name;
  }
  $mybrand = array();
  foreach (get_brand_by_cate($_POST["category_id"]) as  $value) {
    $myobj = new  brand();
    $myobj->brand_id = $value["BrandID"];
    $myobj->brand_name = $value["BrandName"];
    $mybrand[] = $myobj;
  }

  echo json_encode(array(
    "brand"    => $mybrand
  ));

}




else if(isset($_POST["CHECK_BRAND_EXITS"]) && isset($_POST["brand_name"]) && isset($_POST["category"])  ){

echo check_if_brand_exits($_POST["brand_name"],$_POST["category"]);

}
else if(isset($_POST["CHECK_category_EXITS"]) && isset($_POST["categ__name"])  ){

echo  check_if_category_exits($_POST["categ__name"]);
}



else if(isset($_POST["GET_MEMORY_RAME_FOR_MOBILE"])){
class ram{
  public $ramid;
  public $ram_value;

}

$RAMS = GET_MEMORY_RAME_FOR_MOBILE();
$resul = array();
foreach ($RAMS as  $value) {
  $ob = new ram();
  $ob->ramid =$value["RamID"];
  $ob->ram_value =$value["Rame_Value"];
  $resul [] = $ob;
}

echo json_encode(array("GET_MEMORY_RAME_FOR_MOBILE" => $resul));

}




else if(isset($_POST["GET_ALL__MEMORY_RAME"])){
class ram{
  public $ramid;
  public $ram_value;

}

$RAMS = GET_ALL__MEMORY_RAME();
$resul = array();
foreach ($RAMS as  $value) {
  $ob = new ram();
  $ob->ramid =$value["RamID"];
  $ob->ram_value =$value["Rame_Value"];
  $resul [] = $ob;
}

echo json_encode(array("GET_ALL__MEMORY_RAME" => $resul));

}


else if(isset($_POST["GET_MEMORY_SPACE_FOR_MOBILE"])){
class storage{
  public $Storage_ID;
  public $Storage_Value;

}
$Memosp = GET_MEMORY_SPACE_FOR_MOBILE();
$resul = array();
foreach ($Memosp as  $value) {
  $ob = new storage();
  $ob->Storage_ID =$value["Storage_ID"];
  $ob->Storage_Value =$value["Storage_Value"];
  $resul [] = $ob;
}
echo json_encode(array("GET_MEMORY_SPACE_FOR_MOBILE" => $resul));
}


else if(isset($_POST["GET_ALL_MEMORY_SPACE"])){
class storage{
  public $Storage_ID;
  public $Storage_Value;

}
$Memosp = GET_ALL_MEMORY_SPACE();
$resul = array();
foreach ($Memosp as  $value) {
  $ob = new storage();
  $ob->Storage_ID =$value["Storage_ID"];
  $ob->Storage_Value =$value["Storage_Value"];
  $resul [] = $ob;
}
echo json_encode(array("GET_ALL_MEMORY_SPACE" => $resul));
}


else if(isset($_POST["GET_OMOBILE_OPERATING_SYSTEM"])){
class O_P{
  public $OS_ID;
  public $OS_NAME;
}
$OPRA = GET_OMOBILE_OPERATING_SYSTEM();
$resul = array();
foreach ($OPRA as  $value) {
  $ob = new O_P();
  $ob->OS_ID =$value["OS_ID"];
  $ob->OS_NAME =$value["OS_NAME"];
  $resul [] = $ob;
}
echo json_encode(array("GET_OMOBILE_OPERATING_SYSTEM" => $resul));
}

else if(isset($_POST["GE_COMPUTER__OPERATING_SYSTEM"])){
class O_P{
  public $OS_ID;
  public $OS_NAME;
}
$OPRA = GE_COMPUTER__OPERATING_SYSTEM();
$resul = array();
foreach ($OPRA as  $value) {
  $ob = new O_P();
  $ob->OS_ID =$value["OS_ID"];
  $ob->OS_NAME =$value["OS_NAME"];
  $resul [] = $ob;
}
echo json_encode(array("GE_COMPUTER__OPERATING_SYSTEM" => $resul));
}


else if(isset( $_POST["GET_OS_VERSION"]) && isset($_POST["OS_ID"])){
class O_P{
  public $version_id;
  public $Version_Value;
}
$OPRAVE = GET_OS_VERSION($_POST["OS_ID"]);
$resul = array();
foreach ($OPRAVE as  $value) {
  $ob = new O_P();
  $ob->version_id =$value["version_id"];
  $ob->Version_Value =$value["Version_Value"];
  $resul [] = $ob;
}
echo json_encode(array("GET_OS_VERSION" => $resul));
}

else if(isset($_POST["get_resolution__"])){
class resultion{
  public $Resolution_ID;
  public $resolution_value;
}
$res = get_resolutions();
$ara_res = array();
foreach ($res as  $value) {
  $myob = new resultion();
  $myob->Resolution_ID = $value["Resolution_ID"];
  $myob->resolution_value = $value["Resolution_Value"];

  $ara_res [] = $myob;
}
echo json_encode(array("get_resolution__" => $ara_res));
}

else if(isset($_POST["get_all_cart_sims"])){
class cart_sim{
  public $SIM_Card_Slot_ID;
  public $SIM_Card_Slot_VALUE;
}
$res = get_all_cart_sims();
$ara_res = array();
foreach ($res as  $value) {
  $myob = new cart_sim();
  $myob->SIM_Card_Slot_ID = $value["SIM_Card_Slot_ID"];
  $myob->SIM_Card_Slot_VALUE = $value["SIM_Card_Slot_VALUE"];

  $ara_res [] = $myob;
}
echo json_encode(array("get_all_cart_sims" => $ara_res));
}



else if(isset($_POST["get_all_network_for_mobile"])){
class network{
  public $connective_id;
  public $Conective_value;
}
$res = get_all_network_for_mobile();
$ara_res = array();
foreach ($res as  $value) {
  $myob = new network();
  $myob->connective_id = $value["connective_id"];
  $myob->Conective_value = $value["Conective_value"];

  $ara_res [] = $myob;
}
echo json_encode(array("get_all_network_for_mobile" => $ara_res));
}



else if(isset($_POST["get_all_network_for_computer"])){
class network{
  public $connective_id;
  public $Conective_value;
}
$res = get_all_network_for_computer();
$ara_res = array();
foreach ($res as  $value) {
  $myob = new network();
  $myob->connective_id = $value["connective_id"];
  $myob->Conective_value = $value["Conective_value"];

  $ara_res [] = $myob;
}
echo json_encode(array("get_all_network_for_computer" => $ara_res));
}


else if(isset($_POST["get_all_cpu"])){
class cpu{
  public $CpuID;
  public $CPUNAME;
}
$res = get_all_cpu();
$ara_res = array();
foreach ($res as  $value) {
  $myob = new cpu();
  $myob->CpuID = $value["CpuID"];
  $myob->CPUNAME = $value["CPUNAME"];

  $ara_res [] = $myob;
}
echo json_encode(array("get_all_cpu" => $ara_res));
}

else if(isset($_POST["get_all_gpu"])){
class gpu{
  public $GPU_ID;
  public $GPU_NAME;
}
$res = get_all_gpu();
$ara_res = array();
foreach ($res as  $value) {
  $myob = new gpu();
  $myob->GPU_ID = $value["GPU_ID"];
  $myob->GPU_NAME = $value["GPU_NAME"];

  $ara_res [] = $myob;
}
echo json_encode(array("get_all_gpu" => $ara_res));
}


else if(isset($_POST["get_all_ssd"])){
class ssd{
  public $SSD_ID;
  public $SSD_VALUE;
}
$res = GET_ALL_SSD();
$ara_res = array();
foreach ($res as  $value) {
  $myob = new ssd();
  $myob->SSD_ID = $value["SSD_ID"];
  $myob->SSD_VALUE = $value["SSD_VALUE"];

  $ara_res [] = $myob;
}
echo json_encode(array("get_all_ssd" => $ara_res));
}

else if(isset($_POST["get_all_used_status_product"])){
class used_status{

  public $Value_ST;
}
$res = get_all_used_status_product();
$ara_res = array();
foreach ($res as  $value) {
  $myob = new used_status();
  $myob->Value_ST = $value["Value_ST"];


  $ara_res [] = $myob;
}
echo json_encode(array("get_all_used_status_product" => $ara_res));
}














?>
