<?php


session_start();
include("admin/connect.php");
include("admin/includes/languages/english.php");
$functions = "admin/includes/functions/";
include($functions."functions.php");



if(isset($_SESSION['user'])){
if(isset($_POST["curencyid"]) && isset($_POST["sellerid"]) ){

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
public $currency_name;


}


$sql = "SELECT items.* ,brand.BrandID as brandid,
brand.BrandName as brandname,
categories.CategoryID as catid,
categories.Name as catName,
sellers.SellerID as userId,
sellers.Verificated,
sellers.BestSeller,
items.CurrencyID as curcyid
FROM items
INNER JOIN brand ON items.BrandID = brand.BrandID
INNER JOIN  sellers ON sellers.SellerID = items.MemberID
INNER JOIN categories ON categories.CategoryID = items.CategoryID
INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
WHERE  items.MemberID = :SELLERID AND Status_Visible = 1
GROUP BY items.ItemID
";
$tru = 1;
$fal = 8;
$stm = $conn->prepare($sql);
$stm->bindParam(":SELLERID",$_POST["sellerid"],PDO::PARAM_INT);
$stm->execute();
$fetch = $stm->fetchAll();
$ARR = array();
foreach ($fetch as $value) {
 $myobj = new product();
 $myobj ->id = $value['ItemID'];
 $myobj ->name = $value['Name'];
 $myobj->description = $value['Description'];
 if($_POST["curencyid"] ==  $value["curcyid"]){
     $myobj->price = $value['Price'];
 }else{
   $myobj->price =   $value['Price']*get_exchange($_POST["curencyid"]);
 }


 $myobj->registreddate=$value['AddDate'];
 $myobj->rating=$value['Rating'];
 $myobj->status=$value['Status'];
 $myobj->country=$value['CountryMade'];
 $myobj->category=$value['catid'];
 $myobj->brand=$value['BrandID'];
 $myobj->pic1=$value['Pic1'];
 $myobj->pic2=$value['Pic2'];
 $myobj->pic3=$value['Pic3'];
 $myobj->offer=$value['Offer'];
 $myobj->tags=$value['Tags'];
 $myobj->saller=$value['MemberID'];
 $myobj->verificated = $value['Verificated'];
 $myobj->BestSeller = $value['BestSeller'];
 $myobj->count_bought = count_bought_item($value['ItemID']);
$myobj->currency_name =  get_curency_name($_POST["curencyid"]);
 $ARR[] = $myobj;

}


echo json_encode(array("item"=>$ARR));

}

if(isset($_POST["curencyid"]) && isset($_POST["get_product_info"]) && isset($_POST["product__"]) ){

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
public $color;
public $currency_name;
public $GPU_ID;
public $CPU;
public $MemoryRAM;
public $Operating_System_ID;
public $MemoryStorage;
public $camera_resolution;
public $sim_id;
public $network;
public $ssd;

public $ship_ngazidja;
public $ship_ndzouwani;
public $ship_mwali;
public $ship_france;

public $ship_ngazidja_price;
public $ship_ndzouwani_price;
public $ship_mwali_price;
public $ship_france_price;


public $Estamited_Delivery_Ngzidja;
public $Estamited_Delivery_Nduwani;
public $Estamited_Delivery_Mwali;
public $Estamited_Delivery_France;


public $Ship_Method_Ngazidja;
public $Ship_Method_Ndzuwani;
public $Ship_Method_Mwali;
public $Ship_Method_France;

public $payment_Method_ngazidja;
public $payment_Method_ndzuwani;
public $payment_Method_mwali;
public $payment_Method_france;



}


$sql = "SELECT items.* ,brand.BrandID as brandid,
brand.BrandName as brandname,
categories.CategoryID as catid,
categories.Name as catName,
sellers.SellerID as userId,
sellers.Verificated,
sellers.BestSeller,
items.CurrencyID as curcyid,
Fixed_shipping_price_France,
Fixed_shipping_price_Ndzuwani,
Fixed_shipping_price_Mwali,
Fixed_shipping_price_France
FROM items
INNER JOIN brand ON items.BrandID = brand.BrandID
INNER JOIN  sellers ON sellers.SellerID = items.MemberID
INNER JOIN categories ON categories.CategoryID = items.CategoryID
INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
WHERE  items.ItemID = :PRODUCTID
GROUP BY items.ItemID
";
$tru = 1;
$fal = 8;
$stm = $conn->prepare($sql);
$stm->bindParam(":PRODUCTID",$_POST["product__"],PDO::PARAM_INT);
$stm->execute();
$fetch = $stm->fetchAll();
$ARR = array();
foreach ($fetch as $value) {
 $myobj = new product();
 $myobj ->id = $value['ItemID'];
 $myobj ->name = $value['Name'];
 $myobj->description = $value['Description'];
 if($_POST["curencyid"] ==  $value["curcyid"]){
     $myobj->price = $value['Price'];
 }else{
   $myobj->price =   $value['Price']*get_exchange($_POST["curencyid"]);
 }


 $myobj->registreddate=$value['AddDate'];
 $myobj->rating=$value['Rating'];
 $myobj->status=$value['Status'];
 $myobj->country=$value['CountryMade'];
 $myobj->category=$value['catid'];
 $myobj->brand=$value['BrandID'];
 $myobj->pic1=$value['Pic1'];
 $myobj->pic2=$value['Pic2'];
 $myobj->pic3=$value['Pic3'];
 $myobj->offer=$value['Offer'];
 $myobj->tags=$value['Tags'];
 $myobj->saller=$value['MemberID'];
 $myobj->GPU_ID=$value['GPU_ID'];
 $myobj->CPU=$value['CPU'];
 $myobj->MemoryRAM=$value['MemoryRAM'];
 $myobj->Operating_System_ID=$value['Operating_System_ID'];
 $myobj->MemoryStorage=$value['MemoryStorage'];
 $myobj->camera_resolution=$value['camera_resolution'];
 $myobj->sim_id = $value['sim_id'];
 $myobj->ssd    = $value['SSD_ID'];

 $myobj->network = get_network($_POST["product__"]);

  $myobj->ship_ngazidja    = $value['ship_ngazidja'];
  $myobj->ship_ndzouwani    = $value['ship_ndzouwani'];
  $myobj->ship_mwali    = $value['ship_mwali'];
  $myobj->ship_france    = $value['ship_france'];


  $myobj->ship_ngazidja_price     = $value['ship_ngazidja_price'];
  $myobj->ship_ndzouwani_price    = $value['ship_ndzouwani_price'];
  $myobj->ship_mwali_price        = $value['ship_mwali_price'];
  $myobj->ship_france_price       = $value['ship_france_price'];


 $myobj->Estamited_Delivery_Ngzidja       = $value['Estamited_Delivery_Ngzidja'];
 $myobj->Estamited_Delivery_Nduwani       = $value['Estamited_Delivery_Nduwani'];
 $myobj->Estamited_Delivery_Mwali         = $value['Estamited_Delivery_Mwali'];
 $myobj->Estamited_Delivery_France        = $value['Estamited_Delivery_France'];



 $myobj->Ship_Method_Ngazidja        = $value['Ship_Method_Ngazidja'];
 $myobj->Ship_Method_Ndzuwani        = $value['Ship_Method_Ndzuwani'];
 $myobj->Ship_Method_Mwali           = $value['Ship_Method_Mwali'];
 $myobj->Ship_Method_France          = $value['Ship_Method_France'];

 $myobj->Fixed_shipping_price_Ngazidja      = $value["Fixed_shipping_price_Ngazidja"];
 $myobj->Fixed_shipping_price_Ndzuwani      = $value["Fixed_shipping_price_Ndzuwani"];
 $myobj->Fixed_shipping_price_Mwali         = $value["Fixed_shipping_price_Mwali"];
 $myobj->Fixed_shipping_price_France        = $value["Fixed_shipping_price_France"];



 $myobj->payment_Method_ngazidja =  get_payment_by_produc_and_place($_POST["product__"],1);
 $myobj->payment_Method_ndzuwani =  get_payment_by_produc_and_place($_POST["product__"],2);
 $myobj->payment_Method_mwali    =  get_payment_by_produc_and_place($_POST["product__"],3);
 $myobj->payment_Method_france   =  get_payment_by_produc_and_place($_POST["product__"],4);

















$myobj->currency_name =  get_curency_name($_POST["curencyid"]);
 $ARR[] = $myobj;



}


echo json_encode(array("item"=>$ARR));

}
}
 ?>
