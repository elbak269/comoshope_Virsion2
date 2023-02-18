<?php
include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");

if(isset($_POST["get_brands_for_searc"]) && isset($_POST["word"]) && isset($_POST["categories"]) ){

$catgoid = implode(",",json_decode($_POST["categories"]));
$brands = get_brand_by_word_categid($catgoid,$_POST["word"]);

class brand{
  public $brandname;
  public $brandid;
}

$res_cat = array();
foreach ($brands as  $value) {
$myob = new  brand();
$myob->brandname = $value["BrandName"];
$myob->BrandID = $value["BrandID"];
$res_cat [] = $myob;
}
//echo var_dump($_POST["categories"]);
echo  json_encode($res_cat);
}
 ?>
