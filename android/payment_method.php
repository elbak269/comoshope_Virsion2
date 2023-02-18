<?php
include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");

if(isset($_POST["get_paymen_method"])){
  class payment_method{
    public $payment_name;
    public $payment_id;
  }
  $result = array();
$getpaym_od =   get_PAYMENT_METHOD();
foreach ($getpaym_od as $value) {
  $obje = new payment_method();
  $obje->payment_name = $value["payment_name"];
  $obje->payment_id = $value["payment_id"];
  $result[] = $obje;
}

echo json_encode(array("result" => $result));
}
?>
