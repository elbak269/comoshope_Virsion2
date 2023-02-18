<?php
include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");

if(isset($_POST["get_count_orders_for_sid_bar_left"]) & isset($_POST["sellerid"])){

  class orders{
    public $username;
    public $avatar;
  }

  $SQL = $conn->prepare("SELECT Avatar,Username  FROM clients
    INNER JOIN  sellers ON sellers.ClientID = clients.ClientID
    WHERE  sellers.SellerID = :SellerID
   ");
  $SQL->bindParam(":SellerID",$_POST["sellerid"],PDO::PARAM_INT);
  $SQL->execute();
  $myfetch =  $SQL->fetchAll();
  $vatar =  " " ;
  $username ="";
foreach ($myfetch as $value) {
  $vatar = $value["Avatar"];
  $username = $value["Username"];
}

$myboj = new orders();
$myboj->username   = $username;
$myboj->avatar      =$vatar;

echo json_encode($myboj);

}

else if(isset($_POST["get_count_orders_for_sid_bar_left"]) & isset($_POST["clientid"])){

  class orders{
    public $username;
    public $avatar;
  }

  $SQL = $conn->prepare("SELECT Avatar,Username  FROM clients WHERE  ClientID = :CLIENTID
   ");
  $SQL->bindParam(":CLIENTID",$_POST["clientid"],PDO::PARAM_INT);
  $SQL->execute();
  $myfetch =  $SQL->fetchAll();
  $vatar =  " " ;
  $username ="";
foreach ($myfetch as $value) {
  $vatar = $value["Avatar"];
  $username = $value["Username"];
}

$myboj = new orders();
$myboj->username   = $username;
$myboj->avatar      =$vatar;

echo json_encode($myboj);

}

 ?>
