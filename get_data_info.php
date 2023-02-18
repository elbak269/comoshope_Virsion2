<?php session_start();
include("admin/connect.php");
include("admin/includes/languages/english.php");
$functions = "admin/includes/functions/";
include($functions."functions.php");


if (isset($_SESSION['user'])) {
if (isset($_POST["count_orders"]) & isset($_POST["clientid"])) {
  class orders{
    public $completed_orders;
    public $canceled_order;
    public $username;
    public $avatar;
  }

    //COMPLETED ORDERS
  $stmt = $conn->prepare("SELECT COUNT('orders_details_id')   FROM orderdetails
  INNER JOIN orders ON orderdetails.OrderID =  orders.OrderID
  WHERE  orders.ClientID = :CLIENTID AND StatusOrder = 3
   ");
  $stmt->bindParam(":CLIENTID",$_POST["clientid"],PDO::PARAM_INT);
  $stmt->execute();


          //CANCELED ORDERS
  $stmt2 = $conn->prepare("SELECT COUNT('orders_details_id')   FROM orderdetails
  INNER JOIN orders ON orderdetails.OrderID =  orders.OrderID
  WHERE  orders.ClientID = :CLIENTID AND StatusOrder = 5
   ");

  $stmt2->bindParam(":CLIENTID",$_POST["clientid"],PDO::PARAM_INT);
  $stmt2->execute();





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
  $myboj->completed_orders = $stmt->fetchColumn();
  $myboj->canceled_order   = $stmt2->fetchColumn();
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
else if(isset($_POST["get_count_orders_for_sid_bar_left"]) & isset($_POST["sellerid"])){

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
else if (isset($_POST["count_orders"]) & isset($_POST["sellerid"])) {
  class orders{
    public $completed_orders;
    public $canceled_order;
    public $username;
    public $avatar;
  }

    //COMPLETED ORDERS
  $stmt = $conn->prepare("SELECT COUNT('orders_details_id')   FROM orderdetails
  WHERE  SallerID = :SELLERID AND StatusOrder = 3
   ");
  $stmt->bindParam(":SELLERID",$_POST["sellerid"],PDO::PARAM_INT);
  $stmt->execute();


          //CANCELED ORDERS
  $stmt2 = $conn->prepare("SELECT COUNT('orders_details_id')   FROM orderdetails
  WHERE SallerID = :SELLERID AND StatusOrder = 5
   ");

  $stmt2->bindParam(":SELLERID",$_POST["sellerid"],PDO::PARAM_INT);
  $stmt2->execute();





  $SQL = $conn->prepare("SELECT Avatar,Username  FROM clients
     INNER JOIN sellers on sellers.ClientID = clients.ClientID
     WHERE  sellers.SellerID = :SELLERID
   ");
  $SQL->bindParam(":SELLERID",$_POST["sellerid"],PDO::PARAM_INT);
  $SQL->execute();
  $myfetch =  $SQL->fetchAll();
  $vatar =  " " ;
  $username ="";
foreach ($myfetch as $value) {
  $vatar = $value["Avatar"];
  $username = $value["Username"];
}




  $myboj = new orders();
  $myboj->completed_orders = $stmt->fetchColumn();
  $myboj->canceled_order   = $stmt2->fetchColumn();
  $myboj->username   = $username;
  $myboj->avatar      =$vatar;

  echo json_encode($myboj);

}

else if (isset($_POST["get_order_info"]) && isset($_POST["seller"]) && isset($_POST["product"]) && isset($_POST["order__id"]) && isset($_POST["curency"])){
  class product{
    public $price;
    public $curency;
    public $discount;
    public $Shipr_Price;
    public $ordertotal;
    public $amount;
  }

  $stmt = $conn->prepare("SELECT
  orders.TotalOrder as ordertotal,
  orderdetails.Shipr_Price,
  items.Price,
  orderdetails.CurrencyID as order_curency,
  items.CurrencyID as cur_tem,
  orderdetails.Discount,
  orderdetails.amount
   FROM orderdetails
   INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
   INNER JOIN items ON items.ItemID = orderdetails.ProductID
   INNER JOIN sellers ON sellers.SellerID = orderdetails.SallerID
   INNER JOIN currency ON currency.CurrencyID =items.CurrencyID
   INNER JOIN clients ON clients.ClientID = orders.ClientID

  WHERE sellers.SellerID = :SELLER_ID AND items.ItemID = :PRODUCT_ID AND orderdetails.OrderID = :ORDER_ID");
  $stmt ->bindParam(":SELLER_ID",$_POST["seller"],PDO::PARAM_INT);
  $stmt ->bindParam(":PRODUCT_ID",$_POST["product"],PDO::PARAM_INT);
  $stmt ->bindParam(":ORDER_ID",$_POST["order__id"],PDO::PARAM_INT);
  $stmt ->execute();
  $fetch = $stmt->fetChAll();
  foreach ($fetch as $value) {
    $obj = new  product();
    if ($value["cur_tem"] == $_POST["curency"]) {
      $obj->price = $value["Price"];
      $obj->curency = get_curency_name($_POST["curency"]);
    }
    else{
     $obj->price = $value["Price"] * get_exchange($_POST["curency"]);
     $obj->curency = get_curency_name($_POST["curency"]);
    }



  if($value["order_curency"] == $_POST["curency"]){
    $obj->discount       = $value["Discount"]." ".get_curency_name($_POST["curency"]);
  }else{
    $dis = $value["Discount"] * get_exchange($_POST["curency"]);
    $obj->discount = $dis." ".get_curency_name($_POST["curency"]);
  }

  if($value["order_curency"] == $_POST["curency"]){
    $obj->Shipr_Price = $value["Shipr_Price"]." ".get_curency_name($_POST["curency"]);
  }else{
    $sip_pr = $value["Shipr_Price"] * get_exchange($_POST["curency"]);
    $obj->Shipr_Price = $sip_pr." ".get_curency_name($_POST["curency"]);
  }

if($value["order_curency"] == $_POST["curency"]){
  $obj->ordertotal = $value['ordertotal']." ".get_curency_name($_POST["curency"]);
}else{
  $tolord = $value['ordertotal'] * get_exchange($_POST["curency"]);
  $obj->ordertotal = $tolord." ".get_curency_name($_POST["curency"]);
}

if($value["order_curency"] == $_POST["curency"]){
  $obj->amount = $value["amount"]." ".get_curency_name($_POST["curency"]);
}else {
  $amount = $value["amount"] * get_exchange($_POST["curency"]);
  $obj->amount = $amount." ".get_curency_name($_POST["curency"]);;
}




  }

  echo json_encode($obj);


}

else if (isset($_POST["get_order_info_client"]) && isset($_POST["client"]) && isset($_POST["product"]) && isset($_POST["order__id"]) && isset($_POST["curency"])){
  class product{
    public $price;
    public $curency;
    public $discount;
    public $Shipr_Price;
    public $ordertotal;
    public $amount;
  }

  $stmt = $conn->prepare("SELECT
  orders.TotalOrder as ordertotal,
  orderdetails.Shipr_Price,
  items.Price,
  orderdetails.CurrencyID as order_curency,
  items.CurrencyID as cur_tem,
  orderdetails.Discount,
  orderdetails.amount
   FROM orderdetails
   INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
   INNER JOIN items ON items.ItemID = orderdetails.ProductID
   INNER JOIN sellers ON sellers.SellerID = orderdetails.SallerID
   INNER JOIN currency ON currency.CurrencyID =items.CurrencyID
   INNER JOIN clients ON clients.ClientID = orders.ClientID

  WHERE Orders.ClientID = :Clientid AND items.ItemID = :PRODUCT_ID AND orderdetails.OrderID = :ORDER_ID");
  $stmt ->bindParam(":Clientid",$_POST["client"],PDO::PARAM_INT);
  $stmt ->bindParam(":PRODUCT_ID",$_POST["product"],PDO::PARAM_INT);
  $stmt ->bindParam(":ORDER_ID",$_POST["order__id"],PDO::PARAM_INT);
  $stmt ->execute();
  $fetch = $stmt->fetChAll();
  foreach ($fetch as $value) {
    $obj = new  product();
    if ($value["cur_tem"] == $_POST["curency"]) {
      $obj->price = $value["Price"];
      $obj->curency = get_curency_name($_POST["curency"]);
    }
    else{
     $obj->price = $value["Price"] * get_exchange($_POST["curency"]);
     $obj->curency = get_curency_name($_POST["curency"]);
    }



  if($value["order_curency"] == $_POST["curency"]){
    $obj->discount       = $value["Discount"]." ".get_curency_name($_POST["curency"]);
  }else{
    $dis = $value["Discount"] * get_exchange($_POST["curency"]);
    $obj->discount = $dis." ".get_curency_name($_POST["curency"]);
  }

  if($value["order_curency"] == $_POST["curency"]){
    $obj->Shipr_Price = $value["Shipr_Price"]." ".get_curency_name($_POST["curency"]);
  }else{
    $sip_pr = $value["Shipr_Price"] * get_exchange($_POST["curency"]);
    $obj->Shipr_Price = $sip_pr." ".get_curency_name($_POST["curency"]);
  }

if($value["order_curency"] == $_POST["curency"]){
  $obj->ordertotal = $value['ordertotal']." ".get_curency_name($_POST["curency"]);
}else{
  $tolord = $value['ordertotal'] * get_exchange($_POST["curency"]);
  $obj->ordertotal = $tolord." ".get_curency_name($_POST["curency"]);
}

if($value["order_curency"] == $_POST["curency"]){
  $obj->amount = $value["amount"]." ".get_curency_name($_POST["curency"]);
}else {
  $amount = $value["amount"] * get_exchange($_POST["curency"]);
  $obj->amount = $amount." ".get_curency_name($_POST["curency"]);;
}




  }

  echo json_encode($obj);


}
else if(isset($_POST["get_brand_by_cat"]) && isset($_POST["cat"])){

  $brand = get_brand_by_cate($_POST["cat"]);
  $res =  '<select id="_BRAND_SELECT" class="form-control" name="brand">';
  foreach ($brand as  $value) {
    if($value['BrandID'] != 2){
      $res .= "<option  value='".$value['BrandID']."'> ".$value['BrandName']." </option>";
    }

  }
  $res .= "<option  value='2'> Ajouter Une Nouvelle Marque </option>";
    $res .= '</select>';

echo $res;
}
else if(isset($_POST["get_brand__id_by_na"]) && isset($_POST["brand_"]) ){
  class myres{
    public $branid;
  }
  $obj = new myres();
  $obj->branid = get_brand_id($_POST["brand_"]);
  echo json_encode($obj);
}
else if(isset($_POST["get_recepient"]) && isset($_POST["client_id"])){
  $names = getnaems($_POST["client_id"]);
 ECHO json_encode($names);
}





}

  ?>
