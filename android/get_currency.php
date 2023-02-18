<?php
include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");

if(isset($_POST["get_currencies"])){
class currency{
  public $currencyname;
  public $curencyid;
}

$get_curencies = get_curencies();
$result = array();
foreach ($get_curencies as $value) {
$myobj = new currency();
$myobj->currencyname = $value["CurrencyName"];
$myobj->curencyid = $value["CurrencyID"];
$result[] = $myobj;

}


echo json_encode(array("result" => $result));
}

 ?>
