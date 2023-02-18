<?php
 include("../admin/connect.php");
 $functions = "../admin/includes/functions/";
 include($functions."functions.php");

if(isset($_POST['No_approved_yet']) && isset($_POST['selerid']) && isset($_POST['currencyid'])) {
   class Order_Products {
     public  $product_name;
     public  $requestdate;
     public  $image;
     public  $status;
     public  $orderid;
     public  $expected_date;
     public  $color;
     public  $productid;
     public  $total_order;
     public  $qty;
     public  $currency;
     public  $discount;
     public  $payment_method;
     public  $adress_ship;
    public  $recepient;
    public  $total_amount;
    public  $shipment_fee;
    public  $currencyname;
    public  $shipment_method;
    public  $salername;
    public  $price;
   }

$status = 1;
   $stmt = $conn ->prepare("SELECT
   items.ItemID as product_id,
   orders.RequestDate as requestorderdate,
     items.Name as productname,
     orders.OrderID AS orderID,
     Items.Pic1,
     orderdetails.QTY,
     items.Price as price,
     currency.CurrencyName,
     orderdetails.total_amount,
     Items.Pic1,
     orderdetails.StatusOrder,
     orderdetails.Expected_delvery_date,
     Orders.TotalOrder as total_order,
     orderdetails.Discount,
    orderdetails.amount as tota_amount,
    sellers.StoreName as sallername


      FROM orderdetails
     INNER JOIN Orders ON  orders.OrderID = orderdetails.OrderID
     INNER JOIN items ON items.ItemID = orderdetails.ProductID
     INNER JOIN currency ON currency.CurrencyID = items.CurrencyID
     INNER JOIN sellers ON sellers.SellerID =  orderdetails.SallerID
     WHERE orderdetails.StatusOrder = :SATAUS AND orderdetails.SallerID = :SELERID
     GROUP BY (orderdetails.orders_details_id);

     ");
  $stmt->bindparam(":SELERID",$_POST['selerid'],PDO::PARAM_INT);
    $stmt->bindparam(":SATAUS",$status,PDO::PARAM_INT);
   $stmt -> execute();
   $fetch  = $stmt -> fetchAll();
   $myaray  = array();
   foreach ($fetch as  $value) {
     $myobject = new Order_Products();
     $myobject->product_name = $value['productname'];
     $myobject->requestdate = $value['requestorderdate'];
     $myobject->image = $value['Pic1'];
     $myobject->status = $value['StatusOrder'];
     $myobject->orderid = $value['orderID'];
     $myobject->expected_date = $value['Expected_delvery_date'];
     $myobject->productid = $value['product_id'];
    $myobject->qty = $value['QTY'];
    $myobject->currency = $value['CurrencyName'];
    $myobject->salername = $value['sallername'];


    if($_POST["currencyid"] == "1"){
       $myobject->total_order = $value['total_order'];
    }else{
      $myobject->total_order = $value['total_order'] * get_exchange($_POST["currencyid"]);
    }


    if($_POST["currencyid"] == "1"){
      $myobject->discount = $value['Discount'];
    }else{
      $myobject->discount = $value['Discount'] * get_exchange($_POST["currencyid"]) ;
    }

    if($_POST["currencyid"] == "1"){
       $myobject->total_amount = $value['tota_amount'];
    }else{
     $myobject->total_amount = $value['tota_amount'] * get_exchange($_POST["currencyid"]);
    }

    if($_POST["currencyid"] == "1"){
      $myobject->price = $value['price'];
    }else{
      $myobject->price = $value['price'] * get_exchange($_POST["currencyid"]);
    }



     $myaray[] = $myobject;
   }


 $sql = $conn->prepare("SELECT count(orders_details_id) FROM orderdetails
 INNER JOIN Orders on Orders.OrderID = orderdetails.OrderID
  WHERE orderdetails.StatusOrder = 1 AND orderdetails.SallerID = :SELLERID ");
 $sql->bindparam(":SELLERID",$_POST['selerid'],PDO::PARAM_INT);
 $sql -> execute();
 $order_count =   $sql->fetchColumn();
echo json_encode(array("NOT_SHIPED_PRODUCTS" => $myaray,
                      "produnts_count1"         => $order_count
));

}




else if(isset($_POST['WATING_PRODUCTS']) && isset($_POST['selerid']) && isset($_POST["currencyid"])) {
   class Order_Products {
     public  $product_name;
     public  $requestdate;
     public  $image;
     public  $status;
     public  $orderid;
     public  $expected_date;
     public  $color;
    public  $productid;
    public  $total_order;
    public  $qty;
    public  $currency;
   public  $discount;

   }


   $stmt = $conn ->prepare("SELECT
   items.ItemID as product_id,
   orders.RequestDate as requestorderdate,
     items.Name as productname,
     orders.OrderID AS orderID,
     Items.Pic1,
     orderdetails.QTY,
     items.Price,
     currency.CurrencyName,
     orderdetails.amount,
     Items.Pic1,
     orderdetails.StatusOrder,
     orderdetails.Expected_delvery_date,
     Orders.TotalOrder as total_order,
     orderdetails.Discount
      FROM orderdetails
     INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
     INNER JOIN items ON items.ItemID = orderdetails.ProductID
     LEFT JOIN currency ON currency.CurrencyID = items.CurrencyID
     WHERE orderdetails.SallerID = :SELERID AND orderdetails.StatusOrder = 2
     GROUP BY (orderdetails.orders_details_id)
     ");
  $stmt->bindparam(":SELERID",$_POST['selerid'],PDO::PARAM_INT);
   $stmt -> execute();


   $fetch  = $stmt -> fetchAll();
   $myaray  = array();
   foreach ($fetch as  $value) {
     $myobject = new Order_Products();
     $myobject->product_name = $value['productname'];
     $myobject->requestdate = $value['requestorderdate'];
     $myobject->image = $value['Pic1'];
     $myobject->status = $value['StatusOrder'];
     $myobject->orderid = $value['orderID'];
     $myobject->expected_date = $value['Expected_delvery_date'];
     $myobject->productid = $value['product_id'];

     $myobject->qty = $value['QTY'];
     $myobject->currency = $value['CurrencyName'];



   if($_POST["currencyid"] == "1"){
      $myobject->total_order = $value['total_order'];
   }else{
     $myobject->total_order = $value['total_order'] * get_exchange($_POST["currencyid"]);
   }


   if($_POST["currencyid"] == "1"){
     $myobject->discount = $value['Discount'];
   }else{
     $myobject->discount = $value['Discount'] * get_exchange($_POST["currencyid"]) ;
   }



     $myaray[] = $myobject;

   }


 $sql = $conn->prepare("SELECT count(orders_details_id) FROM orderdetails
 INNER JOIN Orders on Orders.OrderID = orderdetails.OrderID
  WHERE orderdetails.StatusOrder = 2 AND orderdetails.SallerID = :SELERID ");
 $sql->bindparam(":SELERID",$_POST['selerid'],PDO::PARAM_INT);
 $sql -> execute();
 $order_count =   $sql->fetchColumn();
echo json_encode(array("WATING_PRODUCTS" => $myaray,
                      "produnts_count"         => $order_count
));

}




else if(isset($_POST['confirmed_PRODUCTS']) && isset($_POST['selerid']) && isset($_POST["currencyid"])) {
   class Order_Products {
  public  $product_name;
  public  $requestdate;
  public  $image;
  public  $status;
  public  $orderid;
  public  $delevred_date;
  public  $color;
  public  $productid;
  public  $total_order;
  public  $qty;
  public  $currency;
  public  $discount;
  public  $seller_id;
  public  $expected_date;

   }


   $stmt = $conn ->prepare("SELECT
   items.ItemID as product_id,
   orders.RequestDate as requestorderdate,
     items.Name as productname,
     orders.OrderID AS orderID,
     Items.Pic1,
     orderdetails.QTY,
     items.Price,
     currency.CurrencyName,
     orderdetails.amount,
     Items.Pic1,
     orderdetails.StatusOrder,
     orders.DelevredDate,
     Orders.TotalOrder as total_order,
     orderdetails.Discount,
     orderdetails.Expected_delvery_date
      FROM orderdetails
     INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
     INNER JOIN items ON items.ItemID = orderdetails.ProductID
     INNER JOIN currency ON currency.CurrencyID = items.CurrencyID
     WHERE orderdetails.SallerID = :SELLERID AND orderdetails.StatusOrder = 3
     GROUP BY (orderdetails.orders_details_id)
     ");
  $stmt->bindparam(":SELLERID",$_POST['selerid'],PDO::PARAM_INT);
   $stmt -> execute();


   $fetch  = $stmt -> fetchAll();
   $myaray  = array();
   foreach ($fetch as  $value) {
     $myobject = new Order_Products();
     $myobject->product_name = $value['productname'];
     $myobject->requestdate = $value['requestorderdate'];
     $myobject->image = $value['Pic1'];
     $myobject->status = $value['StatusOrder'];
     $myobject->orderid = $value['orderID'];
     $myobject->delevred_date = $value['DelevredDate'];
     $myobject->productid = $value['product_id'];
     $myobject->qty = $value['QTY'];
     $myobject->expected_date = $value['Expected_delvery_date'];

     if($_POST["currencyid"] == "1"){
        $myobject->total_order = $value['total_order'];
     }else{
       $myobject->total_order = $value['total_order'] * get_exchange($_POST["currencyid"]);
     }


     if($_POST["currencyid"] == "1"){
       $myobject->discount = $value['Discount'];
     }else{
       $myobject->discount = $value['Discount'] * get_exchange($_POST["currencyid"]) ;
     }

     $myaray[] = $myobject;


   }


 $sql = $conn->prepare("SELECT count(orders_details_id) FROM orderdetails
 INNER JOIN Orders on Orders.OrderID = orderdetails.OrderID
  WHERE orderdetails.StatusOrder = 3 AND orderdetails.SallerID = :SELLERID ");
 $sql->bindparam(":SELLERID",$_POST['selerid'],PDO::PARAM_INT);
 $sql -> execute();
 $order_count =   $sql->fetchColumn();
echo json_encode(array("confirmed_PRODUCTS" => $myaray,
                      "produnts_count"         => $order_count
));

}

else if(isset($_POST['reque_retur_order']) && isset($_POST['sellerid']) && isset($_POST["currencyid"])) {
   class Order_Products {
     public  $product_name;
     public  $requestdate;
     public  $image;
     public  $status;
     public  $orderid;
     public  $date_returned;
     public  $color;
     public  $productid;
     public  $total_order;
     public  $qty;
     public  $currency;
     public  $discount;
     public  $amount;
     public  $payment_method;
     public $date_asked_for_return;
   }


   $stmt = $conn ->prepare("SELECT
   items.ItemID as product_id,
   orders.RequestDate as requestorderdate,
     items.Name as productname,
     orders.OrderID AS orderID,
     Items.Pic1,
     orderdetails.QTY,
     items.Price,
     orderdetails.amount,
     Items.Pic1,
     orderdetails.StatusOrder,
     orderdetails.date_returned,
     Orders.TotalOrder as total_order,
     orderdetails.Discount,
     orderdetails.amount as amont,
     orderdetails.date_asked_for_return
      FROM orderdetails
     INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
     INNER JOIN items ON items.ItemID = orderdetails.ProductID
     INNER JOIN currency ON currency.CurrencyID = items.CurrencyID

     WHERE orderdetails.SallerID = :SELLERID AND orderdetails.StatusOrder = 4
     GROUP BY orderdetails.orders_details_id
     ");
  $stmt->bindparam(":SELLERID",$_POST['sellerid'],PDO::PARAM_INT);
   $stmt -> execute();


   $fetch  = $stmt -> fetchAll();
   $myaray  = array();
   foreach ($fetch as  $value) {
     $myobject = new Order_Products();
     $myobject->product_name = $value['productname'];
     $myobject->requestdate = $value['requestorderdate'];
     $myobject->image = $value['Pic1'];
     $myobject->status = $value['StatusOrder'];
     $myobject->orderid = $value['orderID'];
     $myobject->date_returned = str_replace("-","/",$value['date_returned']) ;
     $myobject->productid = $value['product_id'];
     $myobject->qty = $value['QTY'];
     $myobject->date_asked_for_return = $value['date_asked_for_return'];
    if($_POST["currencyid"] == "1"){
       $myobject->total_order = $value['total_order'];
    }else{
      $myobject->total_order = $value['total_order'] * get_exchange($_POST["currencyid"]);
    }


    if($_POST["currencyid"] == "1"){
      $myobject->discount = $value['Discount'];
    }else{
      $myobject->discount = $value['Discount'] * get_exchange($_POST["currencyid"]) ;
    }



     $myaray[] = $myobject;
   }


   $sql = $conn->prepare("SELECT count(orders_details_id) FROM orderdetails
   INNER JOIN Orders on Orders.OrderID = orderdetails.OrderID
    WHERE orderdetails.StatusOrder = 4 AND orderdetails.SallerID = :SELLERID");
   $sql->bindparam(":SELLERID",$_POST['sellerid'],PDO::PARAM_INT);
   $sql -> execute();
   $order_count =   $sql->fetchColumn();
echo json_encode(array("reque_retur_order" => $myaray,
                      "produnts_count"         => $order_count
));

}


else if(isset($_POST['returned_PRODUCTS']) && isset($_POST['sellerid']) && isset($_POST["currencyid"])) {
   class Order_Products {
     public  $product_name;
     public  $requestdate;
     public  $image;
     public  $status;
     public  $orderid;
     public  $date_returned;
     public  $color;
     public  $productid;
     public  $total_order;
     public  $qty;
     public  $currency;
     public  $discount;
     public  $amount;
     public  $payment_method;
     public $date_asked_for_return;
   }


   $stmt = $conn ->prepare("SELECT
   items.ItemID as product_id,
   orders.RequestDate as requestorderdate,
     items.Name as productname,
     orders.OrderID AS orderID,
     Items.Pic1,
     orderdetails.QTY,
     items.Price,
     orderdetails.amount,
     Items.Pic1,
     orderdetails.StatusOrder,
     orderdetails.date_returned,
     Orders.TotalOrder as total_order,
     orderdetails.Discount,
     orderdetails.amount as amont,
     orderdetails.date_asked_for_return
      FROM orderdetails
     INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
     INNER JOIN items ON items.ItemID = orderdetails.ProductID
     INNER JOIN currency ON currency.CurrencyID = items.CurrencyID

     WHERE orderdetails.SallerID = :SELLERID AND orderdetails.StatusOrder = 5
     GROUP BY orderdetails.orders_details_id
     ");
  $stmt->bindparam(":SELLERID",$_POST['sellerid'],PDO::PARAM_INT);
   $stmt -> execute();


   $fetch  = $stmt -> fetchAll();
   $myaray  = array();
   foreach ($fetch as  $value) {
     $myobject = new Order_Products();
     $myobject->product_name = $value['productname'];
     $myobject->requestdate = $value['requestorderdate'];
     $myobject->image = $value['Pic1'];
     $myobject->status = $value['StatusOrder'];
     $myobject->orderid = $value['orderID'];
     $myobject->date_returned = str_replace("-","/",$value['date_returned']) ;
     $myobject->productid = $value['product_id'];
     $myobject->qty = $value['QTY'];
     $myobject->date_asked_for_return = $value['date_asked_for_return'];
    if($_POST["currencyid"] == "1"){
       $myobject->total_order = $value['total_order'];
    }else{
      $myobject->total_order = $value['total_order'] * get_exchange($_POST["currencyid"]);
    }


    if($_POST["currencyid"] == "1"){
      $myobject->discount = $value['Discount'];
    }else{
      $myobject->discount = $value['Discount'] * get_exchange($_POST["currencyid"]) ;
    }



     $myaray[] = $myobject;
   }


   $sql = $conn->prepare("SELECT count(orders_details_id) FROM orderdetails
   INNER JOIN Orders on Orders.OrderID = orderdetails.OrderID
    WHERE orderdetails.StatusOrder = 5 AND orderdetails.SallerID = :SELLERID");
   $sql->bindparam(":SELLERID",$_POST['sellerid'],PDO::PARAM_INT);
   $sql -> execute();
   $order_count =   $sql->fetchColumn();
echo json_encode(array("returned_PRODUCTS" => $myaray,
                      "produnts_count"         => $order_count
));

}


else if(isset($_POST['Order_detail_info_FOR_SELLER']) && isset($_POST['seller_id']) && isset($_POST['productid']) && isset($_POST['orderid'])  && isset($_POST['status']) && isset($_POST['currency'])) {
  class Order_Products {
  public  $product_name;
  public  $requestdate;
  public  $image;
  public  $status;
  public  $orderid;
  public  $expected_date;
  public  $color;
  public  $productid;
  public  $total_order;
  public  $qty;
  public  $currency;
  public  $discount;
  public  $payment_method;
  public  $adress_ship;
  public  $recepient;
  public  $total_amount;
  public  $ship_price;
  public  $currencyname;
  public  $shipment_method;
  public  $salername;
  public  $price;
  public  $sellerid;

  public  $shipment_method_ngazidja;
  public  $shipment_method_nduzwani;
  public  $shipment_method_mwali;
  public  $shipment_method_france;

  public  $ship_method_nagzidja_name;
  public  $ship_method_ndzuwani_name;
  public  $ship_method_mwali_name;
  public  $ship_method_france_name;

  public  $Place_shipping;

  public  $payment_method_id;
  public  $expext_date;
  public $order_code;
  public $client_username;

    public $delevred_date;


  }
  $stmt = $conn ->prepare("SELECT
  items.ItemID as product_id,
  orders.RequestDate as requestorderdate,
    items.Name as productname,
    orders.OrderID AS orderID,
    Items.Pic1,
    orderdetails.QTY,
    items.Price as price,
    currency.CurrencyName,
    orderdetails.total_amount,
    Items.Pic1,
    orderdetails.StatusOrder,
    orderdetails.Expected_delvery_date,
    Orders.TotalOrder as total_order,
    orderdetails.Discount,
    payment_method.payment_name as paym_mthod,
    orders.RECEPIENT as recepient,
   orderdetails.amount as tota_amount,
   sellers.StoreName as sallername,
   orderdetails.SallerID as sellerid,
   orders.Adress as adress_ship,
   orderdetails.Shipr_Price,
   items.Ship_Method_Ndzuwani,
   items.Ship_Method_Ngazidja,
   items.Ship_Method_Mwali,
   items.Ship_Method_France,
   orders.Place_shipping,
   orders.payment_method,
   orderdetails.Expected_delvery_date as expext_date,
   orderdetails.Code_For_Self_Ship,
   Orders.ClientID as clientid_,
   orderdetails.DelevredDate



    FROM orderdetails
    INNER JOIN Orders ON  orders.OrderID = orderdetails.OrderID
    INNER JOIN items ON items.ItemID = orderdetails.ProductID
    INNER JOIN currency ON currency.CurrencyID = items.CurrencyID
    INNER JOIN payment_method on payment_method.payment_id = orders.payment_method
    INNER JOIN sellers ON sellers.SellerID =  orderdetails.SallerID
    WHERE orderdetails.StatusOrder = :SATAUS AND items.MemberID = :SELLER_ID
    AND  orderdetails.ProductID = :PRODUCTID AND orders.OrderID = :ORDERID
    ");

$stmt->bindparam(":SELLER_ID",$_POST['seller_id'],PDO::PARAM_INT);
$stmt->bindparam(":SATAUS",$_POST['status'],PDO::PARAM_INT);
$stmt->bindparam(":PRODUCTID",$_POST['productid'],PDO::PARAM_INT);
$stmt->bindparam(":ORDERID",$_POST['orderid'],PDO::PARAM_INT);

$stmt -> execute();
$fetch  = $stmt -> fetchAll();
$myaray  = array();
foreach ($fetch as  $value) {
 $myobject = new Order_Products();
 $myobject->product_name = $value['productname'];
 $myobject->requestdate = $value['requestorderdate'];
 $myobject->image = $value['Pic1'];
 $myobject->status = $value['StatusOrder'];
 $myobject->orderid = $value['orderID'];
 $myobject->expected_date = $value['Expected_delvery_date'];
 $myobject->productid = $value['product_id'];

if ($_POST['currency'] == "1") {
  $myobject->total_order = $value['total_order'];
}else{
  $myobject->total_order = $value['total_order'] * get_exchange($_POST['currency']);
}


$myobject->qty = $value['QTY'];

if ($_POST['currency'] == "1") {
  $myobject->discount = $value['Discount'];
}else{
  $myobject->discount = $value['Discount'] * get_exchange($_POST['currency']);
}

$myobject->payment_method = $value['paym_mthod'];
$myobject->recepient = $value['recepient'];

if ($_POST['currency'] == "1") {
  $myobject->total_amount = $value['tota_amount'];
}else{
    $myobject->total_amount = $value['tota_amount'] * get_exchange($_POST['currency']);
}


$myobject->salername = $value['sallername'];

if ($_POST['currency'] == "1") {
  $myobject->price = $value['price'];
}else{
  $myobject->price = $value['price'] * get_exchange($_POST['currency']);
}



$myobject->sellerid = $value['sellerid'];
$myobject->adress_ship = $value['adress_ship'];


if ($_POST['currency'] == "1") {
$myobject->ship_price  = $value['Shipr_Price'];
}else{
$myobject->ship_price  = $value['Shipr_Price'] * get_exchange($_POST['currency']);
}

$myobject->client_username =get_client_user_by_orderid($_POST['orderid']);


$myobject->shipment_method_ngazidja  = $value['Ship_Method_Ngazidja'];
$myobject->shipment_method_nduzwani  = $value['Ship_Method_Ndzuwani'];
$myobject->shipment_method_mwali     = $value['Ship_Method_Mwali'];
$myobject->shipment_method_france    = $value['Ship_Method_France'];

$myobject->Place_shipping  = $value['Place_shipping'];

$myobject->payment_method_id =$value['payment_method'];


if(!empty($value['Ship_Method_Ngazidja'])){
  $myobject->ship_method_nagzidja_name = getpayment_ship_name($value['Ship_Method_Ngazidja']);
}
if(!empty($value['Ship_Method_Ndzuwani'])){
  $myobject->ship_method_ndzuwani_name = getpayment_ship_name($value['Ship_Method_Ndzuwani']);
}

if(!empty($value['Ship_Method_Mwali'])){
  $myobject->ship_method_mwali_name    = getpayment_ship_name($value['Ship_Method_Mwali']);
}

if(!empty($value['Ship_Method_France'])){
$myobject->ship_method_france_name   = getpayment_ship_name($value['Ship_Method_France']);
}

$myobject->expext_date   = $value['expext_date'];
$myobject->order_code    = $value["Code_For_Self_Ship"];
$myobject->delevred_date = $value['DelevredDate'];






 $myaray[] = $myobject;

}

echo json_encode(array("Order_detail_info" => $myaray
));

}

/*
else if(isset($_POST['Order_detail_info']) && isset($_POST['client']) && isset($_POST['productid']) && isset($_POST['orderid'])  && isset($_POST['status'])) {
  class Order_Products {
    public  $product_name;
    public  $requestdate;
    public  $image;
    public  $status;
    public  $orderid;
    public  $expected_date;
    public  $color;
    public  $productid;
    public  $total_order;
    public  $qty;
    public  $currency;
    public  $discount;
    public  $payment_method;
    public  $adress_ship;
   public  $recepient;
   public  $total_amount;
   public  $shipment_fee;
   public  $currencyname;
   public  $shipment_method;
   public  $salername;
   public  $price;
  }
  $stmt = $conn ->prepare("SELECT
  items.ItemID as product_id,
  orders.RequestDate as requestorderdate,
    items.Name as productname,
    concat(cities.CityName,' ',gouvernorate.GouvernoratName,' ' ,adress.PlaceDescription) as ship_adres,
    orders.OrderID AS orderID,
    Items.Pic1,
    orderdetails.QTY,
    items.Price as price,
    currency.CurrencyName,
    orderdetails.total_amount,
    Items.Pic1,
    orderdetails.StatusOrder,
    orderdetails.Expected_delvery_date,
    colors.ColorName,
    Orders.TotalOrder as total_order,
    orderdetails.Discount,
    payment_method.payment_name as paym_mthod,
   CONCAT(names.FirstName,' ',names.LastName) as recepient,
   orderdetails.amount as tota_amount,
   gouvernorate.shipping_price as shipment_fee,
   shipping.ShippingName as  shipment_method,
   sellers.StoreName as sallername


     FROM orderdetails
    INNER JOIN Orders ON  orders.OrderID = orderdetails.OrderID
    INNER JOIN  adress ON Orders.Adress = adress.AdressID
    INNER JOIN cities ON cities.CityID= adress.City
    INNER JOIN gouvernorate ON gouvernorate.GovernorateID = adress.Gouvernorate
    INNER JOIN items ON items.ItemID = orderdetails.ProductID
    INNER JOIN currency ON currency.CurrencyID = items.CurrencyID
    LEFT JOIN colors ON items.Color = colors.ColorID
    INNER JOIN payment_method on payment_method.payment_id = items.payment_method
    INNER JOIN names ON names.NameID = orders.RECEPIENT
    LEFT JOIN shipping on shipping.ShippingID = items.ShippingID
    INNER JOIN sellers ON sellers.SellerID =  orderdetails.SallerID
    WHERE orderdetails.StatusOrder = :SATAUS AND Orders.ClientID = :CLIENID
    AND  orderdetails.ProductID = :PRODUCTID AND orders.OrderID = :ORDERID
    ");

$stmt->bindparam(":CLIENID",$_POST['client'],PDO::PARAM_INT);
$stmt->bindparam(":SATAUS",$_POST['status'],PDO::PARAM_INT);
$stmt->bindparam(":PRODUCTID",$_POST['productid'],PDO::PARAM_INT);
$stmt->bindparam(":ORDERID",$_POST['orderid'],PDO::PARAM_INT);

$stmt -> execute();
$fetch  = $stmt -> fetchAll();
$myaray  = array();
foreach ($fetch as  $value) {
 $myobject = new Order_Products();
 $myobject->product_name = $value['productname'];
 $myobject->requestdate = $value['requestorderdate'];
 $myobject->image = $value['Pic1'];
 $myobject->status = $value['StatusOrder'];
 $myobject->orderid = $value['orderID'];
 $myobject->expected_date = $value['Expected_delvery_date'];
 $myobject->color = $value['ColorName'];
 $myobject->productid = $value['product_id'];
$myobject->total_order = $value['total_order'];
$myobject->qty = $value['QTY'];
$myobject->currency = $value['CurrencyName'];
$myobject->discount = $value['Discount'];
$myobject->payment_method = $value['paym_mthod'];
$myobject->adress_ship = $value['ship_adres'];
$myobject->recepient = $value['recepient'];
$myobject->total_amount = $value['tota_amount'];
$myobject->shipment_fee = $value['shipment_fee'];
$myobject->shipment_method = $value['shipment_method'];
$myobject->currencyname = $value['CurrencyName'];
$myobject->salername = $value['sallername'];
$myobject->price = $value['price'];
 $myaray[] = $myobject;

}

echo json_encode(array("Order_detail_info" => $myaray
));

} */


else if ( isset($_POST['IMAGE']) && isset($_POST['clintid']) && isset($_POST['returne_order']) &&  isset($_POST['ORDERID'])  &&  isset($_POST['PRODUCTID']) && isset($_POST['username'])  && isset($_POST['reason_for_retun'])  ) {
  date_default_timezone_set("Africa/Cairo");
   $date1 = str_replace("/","",date("y/m/d:h:i:sa"));
  $date = str_replace(":","",$date1);
   $rand = rand(1,900);
   $resultname = $rand.$date;
   $decodingimg = base64_decode($_POST['IMAGE']."JPG");
   $imgname = $resultname;

   $ALL_PATH = "../theme/image/retun_orders/".$_POST['username'];
   if (!file_exists($ALL_PATH)) {
    mkdir("../theme/image/retun_orders/".$_POST['username']);
  }

    //file_put_contents("../theme/image/userImage/".$_POST['username']."/".$imgname.".JPG",$decodingimg);
      $MYPATHPIC = $ALL_PATH."/".$imgname.".JPG";
      file_put_contents($MYPATHPIC,$decodingimg);

$imgfordatabse = substr($MYPATHPIC, 3);
$sql = $conn->prepare("UPDATE orderdetails
INNER JOIN orders ON orders.OrderID = orderdetails.OrderID
 SET 	Product_Img_For_Return = :IMG , StatusOrder = 5 , reason_for_returned_orders = :REASON

WHERE orders.ClientID = :CLIENTID AND orderdetails.OrderID = :ORDERID AND orderdetails.ProductID = :PRODUCTID");
$sql->bindParam(":IMG",$imgfordatabse,PDO::PARAM_STR,255);
 $sql ->bindParam(":CLIENTID",$_POST['clintid'],PDO::PARAM_INT);
 $sql ->bindParam(":ORDERID",$_POST['ORDERID'],PDO::PARAM_INT);
 $sql ->bindParam(":PRODUCTID",$_POST['PRODUCTID'],PDO::PARAM_STR,255);
 $sql ->bindParam(":REASON",$_POST['reason_for_retun'],PDO::PARAM_STR,255);

$sql->execute();
$ROW_COUNT = $sql->rowCount();
if($ROW_COUNT>0){
  echo "1";

}else{
  echo"0";
}

}

else if (isset($_POST["cancel_order"]) && isset($_POST["sure"]) && isset($_POST["orderid"]) && isset($_POST["productid"]) ){ // FOR CANCEL ORDER
  $stmt = $conn->prepare("UPDATE orderdetails SET StatusOrder = 7 WHERE OrderID = :ORDERID AND ProductID = :PRODUCTID");
  $stmt->bindParam(":ORDERID",$_POST["orderid"],PDO::PARAM_INT);
  $stmt->bindParam(":PRODUCTID",$_POST["productid"],PDO::PARAM_INT);
  $stmt->execute();
  if($stmt->rowCount() >0){
    echo "1";
  }else{
    echo "0";
  }

}





else if (isset($_POST["check_code_returned_order"]) && isset($_POST["orderid"])  ){ // CHECK RETURNED ORDER CODE
  echo get_returned_order_code($_POST["orderid"]);
}

else if (isset($_POST["confirm_returned_order"]) && isset($_POST["orderid"])   && isset($_POST["productid"])){ // CONFIRM RETURNED ORDER
  $stmt = $conn->prepare("UPDATE orderdetails SET StatusOrder = 5 ,date_returned = NOW() WHERE OrderID = :ORDERID AND ProductID = :PRODUCTID");
  $stmt->bindParam(":ORDERID",$_POST["orderid"],PDO::PARAM_INT);
  $stmt->bindParam(":PRODUCTID",$_POST["productid"],PDO::PARAM_INT);
  $stmt->execute();
  if($stmt->rowCount() >0){
    echo "1";
  }else{
    echo "0";
  }
}

elseif (isset($_POST["edit_truck_num"]) && isset($_POST["order_"]) && isset($_POST["truck_number"])) {
  $stmt = $conn->prepare("UPDATE orders SET Track_Number = :TRACK_NUMBER WHERE OrderID = :ORDERID");
  $stmt->bindParam(":TRACK_NUMBER",$_POST["truck_number"],PDO::PARAM_STR);
  $stmt->bindParam(":ORDERID",$_POST["order_"],PDO::PARAM_INT);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    echo "1";
  }else{
    echo "0";
  }
}







 ?>
