<?php
include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");

if(isset($_POST["get_catgories_for_searc"]) && isset($_POST["word"])){
$CATEGO = get_category_word_brabd_name_productsname($_POST["word"],$_POST["word"],$_POST["word"]);

class category{
  public $cate_name;
  public $cate_id;
}

$res_cat = array();
foreach ($CATEGO as  $value) {
$myob = new  category();
$myob->cate_name = $value["Name"];
$myob->cate_id = $value["CategoryID"];
$res_cat [] = $myob;
}
echo  json_encode($res_cat);
}
 ?>
