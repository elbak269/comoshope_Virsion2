<?php

session_start();

include("admin/connect.php");
include("admin/includes/languages/english.php");
$functions = "admin/includes/functions/";
include($functions."functions.php");

if(  isset($_POST['requestorder']) && isset($_POST['clientid']) && isset($_POST['Nombre_ofitem']) && isset($_POST['itemid']) &&
isset($_POST['order_address'])  && isset($_POST['promocode'])  && isset($_POST['recep_name'])   && isset($_POST['payment_method'])  && isset($_POST["currecny"])
  && isset($_POST["place_shi_id"])   && isset($_POST["selerid"])  && isset($_POST["phone"])  ) {
$ship_price = 0;
if($_POST["place_shi_id"] == "1"){
  $ship_price = get_ship_price_ngazidja($_POST['itemid']);
}else if($_POST["place_shi_id"] == "2"){
 $ship_price = get_ship_price_NDZUWANI($_POST['itemid']);
}else if ($_POST["place_shi_id"] == "3"){
  $ship_price = get_ship_price_mwali($_POST['itemid']);
} else if($_POST["place_shi_id"] == "4"){
$ship_price  = get_ship_price_france($_POST['itemid']);
}

$payment_method = $_POST['payment_method'] ;
$productinfo =  PROCUT_INFO_ORDER($_POST['itemid']);
foreach ($productinfo as  $value) {
 $price = $value["Price"];
}


$DISCOUNT;
if($_POST['promocode'] !="" || $_POST['promocode'] != null){
 $PROMOVALUE  = promo_value($_POST['promocode']);
 foreach ($PROMOVALUE as $value) {
   $DISCOUNT = $value["Discount"];
 }
}else{
 $DISCOUNT = 0;
}

$amount = $price * $_POST['Nombre_ofitem'];
$totatl_amount = ($price - $DISCOUNT)*$_POST['Nombre_ofitem'];
$totatl_order = (($price - $DISCOUNT)*$_POST['Nombre_ofitem'])+$ship_price;

$promocode;
if (!empty($_POST['promocode'])) {
$promocode = intval($_POST['promocode']);
}else {
$promocode  = NULL;
}

$dat = str_replace(array(":","/","\\",","," "),"",date("d,m,y h:i:s"));
$rad = RAND(1,999);
$clientid =str_replace(" ","",$_POST['clientid']);
$orderidto= $dat+$rad+$dat;
$ORDERID= $orderidto;


$stm = $conn ->prepare("INSERT INTO orders (OrderID,ClientID,RequestDate,Adress,RECEPIENT,TotalOrder,CurrencyID,payment_method,	Place_shipping,Phone)
VALUES(:ORDERID,:CLIENTID,NOW(),:ADRESS,:RECEPIENT_NAM,:TOTALORDER,:CURRENCY,:PAYMENTID,:PLACE_SHIP_ORDER,:phone)");
$stm->bindParam(":ORDERID",$ORDERID,PDO::PARAM_INT);
$stm->bindParam(":CLIENTID",$_POST['clientid'],PDO::PARAM_INT);
$stm->bindParam(":ADRESS",$_POST['order_address'],PDO::PARAM_STR);
$stm->bindParam(":RECEPIENT_NAM",$_POST['recep_name'],PDO::PARAM_STR);
$stm->bindParam(":TOTALORDER",$totatl_order,PDO::PARAM_STR);
$stm->bindParam(":CURRENCY",$_POST["currecny"],PDO::PARAM_INT);
$stm->bindParam(":PAYMENTID",$payment_method,PDO::PARAM_INT);
$stm->bindParam(":phone",$_POST["phone"],PDO::PARAM_INT);
$stm->bindParam(":PLACE_SHIP_ORDER",$_POST["place_shi_id"],PDO::PARAM_INT);
$stm->execute();
$row = $stm->rowCount();
if ($row > 0) {
 $code_For_Self_Ship_rand = rand(10000000000000,99999999999999);
 $SQLORDERDETAIL = $conn->prepare("INSERT INTO orderdetails (OrderID,ProductID,QTY,amount,total_amount,CurrencyID,PromoCode,Discount,Shipr_Price,StatusOrder,Code_For_Self_Ship,SallerID)
  VALUES (:ORDERID,:PRODUCTID,:qty,:AMOUNT,:TOTAL_AMOUNT,:CURRENCYID,:PROMOCODE,:DISCOUNT,:SHIPE_PRICE,1,:Code_For_Self_Ship,:SallerID)");
 $SQLORDERDETAIL ->bindParam(":ORDERID", $ORDERID,PDO::PARAM_INT);
 $SQLORDERDETAIL ->bindParam(":PRODUCTID",$_POST['itemid'],PDO::PARAM_INT);
 $SQLORDERDETAIL ->bindParam(":qty",$_POST['Nombre_ofitem'],PDO::PARAM_INT);
 $SQLORDERDETAIL ->bindParam(":AMOUNT",$amount,PDO::PARAM_STR);
 $SQLORDERDETAIL ->bindParam(":TOTAL_AMOUNT",$totatl_order,PDO::PARAM_STR);
 $SQLORDERDETAIL ->bindParam(":CURRENCYID",$_POST["currecny"],PDO::PARAM_INT);
 $SQLORDERDETAIL ->bindParam(":PROMOCODE",$promocode,PDO::PARAM_STR);
 $SQLORDERDETAIL ->bindParam(":SHIPE_PRICE",$ship_price,PDO::PARAM_STR);
 $SQLORDERDETAIL ->bindParam(":DISCOUNT",$DISCOUNT,PDO::PARAM_STR);
 $SQLORDERDETAIL ->bindParam(":Code_For_Self_Ship",$code_For_Self_Ship_rand,PDO::PARAM_INT);
   $SQLORDERDETAIL ->bindParam(":SallerID",$_POST["selerid"],PDO::PARAM_INT);
 $SQLORDERDETAIL ->execute();

 if($SQLORDERDETAIL->rowCount() >0){




 $COUNT_NAME = get_name_by_id($_POST["clientid"],$_POST["recep_name"]);
   if ($COUNT_NAME < 1) {
     $sql = "INSERT INTO names (ClientID,fullname) values(:clientid,:fullname)";
     $stmt=$conn->prepare($sql);
     $stmt->bindparam(":clientid",$_POST["clientid"],PDO::PARAM_INT);
     $stmt->bindparam(":fullname",$_POST["recep_name"],PDO::PARAM_STR,255);
     $stmt->execute();
   }


$COUNT_ADRESS = get_adress_name_by_id($_POST["clientid"],$_POST['order_address']);
   if ($COUNT_ADRESS < 1) {
     $stmt = $conn->prepare("INSERT INTO adress (ClientID,PlaceDescription) VALUES(:CLIENTID,:PLACEDESCRIPTION) ");
     $stmt->bindParam(":CLIENTID",$_POST['client'],PDO::PARAM_INT);
     $stmt->bindParam(":PLACEDESCRIPTION",$_POST['order_address'],PDO::PARAM_STR,255);
     $stmt ->execute();

   }



   if ($_POST['payment_method']=="3" && isset($_POST["CARD_HOLDER_NAME"]) && isset($_POST["card_number"]) && isset($_POST["mm"]) && isset($_POST["yy"]) && isset($_POST["mycvc"]) ) {


     $stm_card = $conn->prepare("INSERT INTO  cards (CardNumber,CardName,ClientID,MM,YY,CVC,DateSet,Order_ID)
       VALUES(:CardNumber,:CardName,:ClientID,:MM,:YY,:CVC,NOw(),:Order_ID)");
         $stm_card->bindParam(":CardNumber", $_POST["card_number"],PDO::PARAM_INT);
         $stm_card->bindParam(":CardName", $_POST["CARD_HOLDER_NAME"],PDO::PARAM_STR);
         $stm_card->bindParam(":ClientID",$_POST['clientid'],PDO::PARAM_INT);
         $stm_card->bindParam(":MM", $_POST["mm"],PDO::PARAM_INT);
         $stm_card->bindParam(":YY", $_POST["yy"],PDO::PARAM_INT);
         $stm_card->bindParam(":CVC", $_POST["mycvc"],PDO::PARAM_INT);
         $stm_card->bindParam(":Order_ID", $ORDERID,PDO::PARAM_INT);
         $stm_card->execute();

if ($stm_card->rowCount() >0) {


echo 1;


}else {
 echo 0;
}

   }


 }else{

 }

}
else {


}

class result_order{
  public $order_id;
  public $status;
}

$result_order_obj = new result_order();
$result_order_obj->order_id = $ORDERID;
$result_order_obj->tatus = 1;
echo json_encode($result_order_obj);

}else{

}



 ?>
