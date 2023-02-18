<?php
//get_words_for_search.php

include("admin/connect.php");
$functions = "admin/includes/functions/";
include($functions."functions.php");


if(isset($_POST["get_all_products_names_and_tags"])){
echo json_encode(get_words_for_search());
}else if(isset($_POST["get_all_categotry_and_brand"])  ){

  class brand {
    public $brand_id;
    public $brand_name;
  }
  $mybrand = array();
  foreach (get_all_brand() as  $value) {
    $myobj = new  brand();
    $myobj->brand_id = $value["BrandID"];
    $myobj->brand_name = $value["BrandName"];
    $mybrand[] = $myobj;
  }



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
    "category" => $mycateg,
    "brand"    => $mybrand
  ));



}else if(isset($_POST["get_prod_searc"]) && isset($_POST["ngazidja"]) && isset($_POST["ndzuwani"]) && isset($_POST["mwali"]) && isset($_POST["france"]) && isset($_POST["word"])
&& isset($_POST["min_range_price"])  && isset($_POST["max_range_price"]) && isset($_POST["curency"]) ){

class product{
  public $name;
  public $pic;
  public $price;
  public $curency;
  public $CurrencyID;
  public $productid;
  public $Verificated;
  public $BestSeller;
  public $shippingname;
}


$brands_id = 0;
if(isset($_POST["bards_id"])){
  $brands_id = $_POST["bards_id"];
}
$categories_id = 0;
if(isset($_POST["categories_id"])){
  $categories_id = $_POST["categories_id"];
}
$min_price  ;
$max_price  ;
if($_POST['curency'] == "2"){
    $min_price = $_POST['min_range_price'];
}else{
  $min_price = $_POST['min_range_price'] * get_exchange($_POST['curency']);
}

if($_POST['curency'] == "2"){
    $max_price = $_POST['max_range_price'];
}else{
  $max_price = $_POST['max_range_price'] * get_exchange($_POST['curency']);
}


function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$ip = get_client_ip();

if(check_word_eixts($_POST["word"]) > 0){

  $stmt = $conn->prepare("UPDATE serched_word SET Count_Times = Count_Times+1 WHERE Word = :WORD");
  $stmt->bindParam(":WORD",$_POST["word"],PDO::PARAM_STR);
  $stmt->execute();
  $SEARCHED_ID =  GET_WORD_ID_FOR_SEARCH($_POST["word"]);
  if($stmt->rowCount()>0){
    $stmt2 = $conn->prepare("INSERT INTO time_searched_word (Searched_word_Id,IP,Date_SEARCHED) VALUES(:SEARCHED_ID,:ip,NOW())");
    $stmt2->bindParam(":SEARCHED_ID",$SEARCHED_ID,PDO::PARAM_INT);
    $stmt2->bindParam(":ip",$ip,PDO::PARAM_STR);
    $stmt2->execute();

  }

}else{
  $coutims = 1;
$stmt = $conn->prepare("INSERT INTO serched_word (Word,Count_Times) VALUES(:WORD,:COUNTIMES)");
$stmt->bindParam(":WORD",$_POST["word"],PDO::PARAM_STR);
$stmt->bindParam(":COUNTIMES",$coutims,PDO::PARAM_STR);
$stmt->execute();
$SEARCHED_ID =  $conn->lastInsertId();
if($stmt->rowCount()>0){
  $stmt2 = $conn->prepare("INSERT INTO time_searched_word (Searched_word_Id,IP,Date_SEARCHED) VALUES(:SEARCHED_ID,:ip,NOW())");
  $stmt2->bindParam(":SEARCHED_ID",$SEARCHED_ID,PDO::PARAM_INT);
  $stmt2->bindParam(":ip",$ip,PDO::PARAM_STR);
  $stmt2->execute();

}
}

 $get_prod_fuctin  =  get_all_prod_for_search($_POST["ngazidja"],$_POST["ndzuwani"],$_POST["mwali"],$_POST["france"],$_POST["word"],$brands_id,$categories_id,$min_price,$max_price);

$myarry = array();
  foreach ($get_prod_fuctin as $value) {
    $myobject = new product();
    $myobject->name = $value["Name"];
    $myobject->pic = $value["Pic1"];

    if($_POST['curency'] == $value["curcyid"]){
        $myobject->price = $value["Price"];
    }else {
    $myobject->price = $value["Price"] * get_exchange($_POST['curency']);
    }
    $myobject->curency = $value["currencyname"];
    $myobject->productid = $value["ItemID"];
    $myobject->CurrencyID = $_POST['curency'];
    $myobject->Verificated = $value["Verificated"];
    $myobject->BestSeller  = $value["BestSeller"];


    $myarry [] = $myobject;

  }
  echo json_encode($myarry);

}
else if(isset($_POST["get_exchange"]) && isset($_POST["currency_id"])){
  echo json_encode(get_exchange($_POST["currency_id"]));

}
else if(isset($_POST["get_curency_name_"]) && isset($_POST["currency_id"])){
  echo json_encode(get_curency_name($_POST["currency_id"]));

}
else if(isset($_POST["get_cate_go"]) && isset($_POST["word"])){
$CATEGO = get_category_word_brabd_name_productsname($_POST["word"],$_POST["word"],$_POST["word"]);
 class category{
   public $catname ;
   public $catid ;
 }
$RESULT = array();
foreach ($CATEGO as $value) {
$myobj = new category();
$myobj->catname  = $value["Name"];
$myobj->catid   = $value["CategoryID"];
$RESULT [] = $myobj;
}
echo json_encode($RESULT);

}else if(isset($_POST["get_brand_go"]) && isset($_POST["word"])  && isset($_POST["cateid"])){

  $categ_ids = implode(",",$_POST["cateid"]);

  $BRANDS = get_brand_by_word_categid($categ_ids,$_POST["word"]);
   class brand{
     public $brandname ;
     public $brandid ;
   }
  $RESULT = array();
  foreach ($BRANDS as $value) {
  $myobj = new brand();
  $myobj->brandname  = $value["BrandName"];
  $myobj->brandid    = $value["BrandID"];
  $RESULT [] = $myobj;

  }

  echo json_encode($RESULT);


}









 ?>
