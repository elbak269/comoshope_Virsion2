<?php
include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");


if(isset($_POST["get_product_info_by_id"]) && isset($_POST["productid"]) && isset($_POST["currency"])){

$mybroductid  = $_POST["productid"];
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



 public $payment_methods_ngazidja;
 public $payment_methods_ndzuwani;
 public $payment_methods_mwali;
 public $payment_methods_france;


 public $get_all_shipp_for_pr;


}


$prod =  get_product_info_by_id($_POST["productid"]);
$resut = array();
foreach ($prod as $value) {
$myob = new productifo();
$myob->productname = $value["Name"];
$myob->description = $value["Description"];
$myob->madein      = $value["CountryMade"];

if($_POST["currency"] ==  $value["CurrencyID"]){
    $myob->price = $value['Price'];
}else{
  $myob->price =   $value['Price']*get_exchange($_POST["currency"]);
}

$myob->status = $value["Status"];
$myob->brandid = $value["BrandID"];
$myob->categoryid = $value["CategoryID"];

$myob->CurrencyName = $value["CurrencyName"];
$myob->CurrencyID = $value["CurrencyID"];

$myob->shipngazidja = $value["ship_ngazidja"];
$myob->shipndzuwani = $value["ship_ndzouwani"];
$myob->shipmwali = $value["ship_mwali"];
$myob->shipfrance = $value["ship_france"];




if($_POST["currency"] ==  $value["CurrencyID"]){
  $myob->ship_price_ngazidja = $value["ship_ngazidja_price"];
    $myob->ship_price_ngazidja_origin = $value["ship_ngazidja_price"];
}else{
  $myob->ship_price_ngazidja = $value["ship_ngazidja_price"]*get_exchange($_POST["currency"]);
  $myob->ship_price_ngazidja_origin = $value["ship_ngazidja_price"];
}

if($_POST["currency"] ==  $value["CurrencyID"]){
  $myob->ship_price_ndzuwani = $value["ship_ndzouwani_price"];
  $myob->ship_price_ndzuwani_origin = $value["ship_ndzouwani_price"];
}else{
  $myob->ship_price_ndzuwani =$value["ship_ndzouwani_price"]*get_exchange($_POST["currency"]);
  $myob->ship_price_ndzuwani_origin = $value["ship_ndzouwani_price"];

}

if($_POST["currency"] ==  $value["CurrencyID"]){
  $myob->ship_price_mwali = $value["ship_mwali_price"];
  $myob->ship_price_mwali_origin = $value["ship_mwali_price"];
}else{
  $myob->ship_price_mwali = $value["ship_mwali_price"]*get_exchange($_POST["currency"]);
  $myob->ship_price_mwali_origin = $value["ship_mwali_price"];
}

if($_POST["currency"] ==  $value["CurrencyID"]){
  $myob->ship_price_france = $value["ship_france_price"];
  $myob->ship_price_france_origin = $value["ship_france_price"];
}else{
  $myob->ship_price_france = $value["ship_france_price"]*get_exchange($_POST["currency"]);
  $myob->ship_price_france_origin = $value["ship_france_price"];

}



$myob->expected_date_ngazidja = $value["Estamited_Delivery_Ngzidja"];
$myob->expected_date_ndzuwani = $value["Estamited_Delivery_Nduwani"];
$myob->expected_date_mwali = $value["Estamited_Delivery_Mwali"];
$myob->expected_date_france = $value["Estamited_Delivery_France"];

$myob->ship_method_ngazidja = $value["Ship_Method_Ngazidja"];
$myob->ship_method_ndzuwani = $value["Ship_Method_Ndzuwani"];
$myob->ship_method_mwali    = $value["Ship_Method_Mwali"];
$myob->ship_method_france   = $value["Ship_Method_France"];


$myob->payment_methods_ngazidja  = get_products_payments($mybroductid,1);
$myob->payment_methods_ndzuwani  = get_products_payments($mybroductid,2);
$myob->payment_methods_mwali  = get_products_payments($mybroductid,3);
$myob->payment_method_france  = get_products_payments($mybroductid,4);





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


$myob->get_all_shipp_for_pr       = get_all_shipp_for_pr($mybroductid);



$myob->Fixed_shipping_price_Ngazidja = $value["Fixed_shipping_price_Ngazidja"];
$myob->Fixed_shipping_price_Ndzuwani = $value["Fixed_shipping_price_Ndzuwani"];
$myob->Fixed_shipping_price_Mwali    = $value["Fixed_shipping_price_Mwali"];
$myob->Fixed_shipping_price_France   = $value["Fixed_shipping_price_France"];

$myob->price_origin   = $value["Price"];










$resut [] = $myob;

}

echo json_encode( array('item' => $resut));

}






 ?>
