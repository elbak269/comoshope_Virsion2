<?php
include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");
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
WHERE  sellers.SellerID = :SELLERID
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
  $ARR[] = $myobj;

}

echo json_encode(array("item"=>$ARR));
}


?>
