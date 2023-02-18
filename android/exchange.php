<?php

include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");


class currency{
  public $CurrencyID;
  public $CurrencyName;
}

if(isset($_POST["get_currencies"]) && isset($_POST["KMF"])  && isset($_POST["EUR"])){

  function curec_for_euro($euro){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM currency  WHERE CurrencyName = :CYRRECNYNAME");
    $stmt->bindParam(":CYRRECNYNAME",$euro,PDO::PARAM_STR);
    $stmt -> execute();
    $myfetch  = $stmt->fetchAll();
  $resu = array();
  foreach ($myfetch as  $value) {
  $obj = new  currency();
  $obj->CurrencyID = $value["CurrencyID"];
  $obj->CurrencyName = $value["CurrencyName"];
  $resu[] = $obj;
  }
  return   $resu;
}

  function curec_for_franc($franc){
      global $conn;
    $stmt = $conn->prepare("SELECT * FROM currency  WHERE CurrencyName = :CYRRECNYNAME");
    $stmt->bindParam(":CYRRECNYNAME",$franc,PDO::PARAM_STR);
    $stmt -> execute();
    $myfetch  = $stmt->fetchAll();
  $resu = array();
  foreach ($myfetch as  $value) {
  $obj = new  currency();
  $obj->CurrencyID = $value["CurrencyID"];
  $obj->CurrencyName = $value["CurrencyName"];
  $resu[] = $obj;
  }
return   $resu;
}

echo json_encode(array(
  "franc" => curec_for_franc($_POST["KMF"]),
  "euro"  => curec_for_euro($_POST["EUR"])
));
}

 ?>
