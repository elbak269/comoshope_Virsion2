<?php
include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");

if(isset($_POST["get_ship__method"])){
  class ship__method{
    public $ShippingName;
    public $ShippingID;
  }
  $result = array();
$getpaym_od =   get_ship_METHOD();
foreach ($getpaym_od as $value) {
  $obje = new ship__method();
  $obje->ShippingName = $value["ShippingName"];
  $obje->ShippingID = $value["ShippingID"];
  $result[] = $obje;
}

echo json_encode(array("result" => $result));
}
?>
