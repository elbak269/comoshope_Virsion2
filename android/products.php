<?php
 include("../admin/connect.php");
 $functions = "../admin/includes/functions/";
 include($functions."functions.php");

if(isset($_POST['No_approved_yet']) && isset($_POST['client']) && isset($_POST['currencyid'])) {
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
    public  $sellerid;




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
    orders.Adress as ship_adres,
    orders.RECEPIENT as recepient,
    orderdetails.amount as tota_amount,
    sellers.StoreName as sallername,
    orderdetails.SallerID as sellerid


      FROM orderdetails
     INNER JOIN Orders ON  orders.OrderID = orderdetails.OrderID
     INNER JOIN items ON items.ItemID = orderdetails.ProductID
     INNER JOIN currency ON currency.CurrencyID = items.CurrencyID
     INNER JOIN sellers ON sellers.SellerID =  items.MemberID
     WHERE orderdetails.StatusOrder = :SATAUS AND Orders.ClientID = :CLIENID

     ");
  $stmt->bindparam(":CLIENID",$_POST['client'],PDO::PARAM_INT);
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
     $myobject->qty = $value['QTY'];
     $myobject->productid = $value['product_id'];
     $myobject->adress_ship = $value['ship_adres'];
     $myobject->recepient = $value['recepient'];
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


  $myobject->sellerid = $value['sellerid'];

   $myaray[] = $myobject;
 }


 $sql = $conn->prepare("SELECT count(orders_details_id) FROM orderdetails
 INNER JOIN Orders on Orders.OrderID = orderdetails.OrderID
  WHERE orderdetails.StatusOrder = 1 AND orders.ClientID = :CLIENTID ");
 $sql->bindparam(":CLIENTID",$_POST['client'],PDO::PARAM_INT);
 $sql -> execute();
 $order_count =   $sql->fetchColumn();
echo json_encode(array("NOT_SHIPED_PRODUCTS" => $myaray,
                      "produnts_count1"         => $order_count
));

}
else if(isset($_POST['WATING_PRODUCTS']) && isset($_POST['client']) && isset($_POST['currencyid'])) {
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
   public  $sellerid;

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
     orderdetails.Expected_delvery_date,
     Orders.TotalOrder as total_order,
     orderdetails.Discount,
     orderdetails.SallerID as sellerid
      FROM orderdetails
     INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
     INNER JOIN items ON items.ItemID = orderdetails.ProductID
     INNER JOIN currency ON currency.CurrencyID = items.CurrencyID

     WHERE Orders.ClientID = :CLIENID AND orderdetails.StatusOrder = 2
     GROUP BY orderdetails.orders_details_id
     ");
  $stmt->bindparam(":CLIENID",$_POST['client'],PDO::PARAM_INT);
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
     $myobject->sellerid = $value['sellerid'];

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
  WHERE orderdetails.StatusOrder = 2 AND orders.ClientID = :CLIENTID ");
 $sql->bindparam(":CLIENTID",$_POST['client'],PDO::PARAM_INT);
 $sql -> execute();
 $order_count =   $sql->fetchColumn();
echo json_encode(array("WATING_PRODUCTS" => $myaray,
                      "produnts_count"         => $order_count
));

}
else if(isset($_POST['confirmed_PRODUCTS']) && isset($_POST['client']) && isset($_POST["currencyid"])) {
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
     public  $sellerid;
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
     orderdetails.DelevredDate,
     Orders.TotalOrder as total_order,
     orderdetails.Discount,
     orderdetails.SallerID as sellerid
      FROM orderdetails
     INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
     INNER JOIN items ON items.ItemID = orderdetails.ProductID
     INNER JOIN currency ON currency.CurrencyID = items.CurrencyID

     WHERE Orders.ClientID = :CLIENID AND orderdetails.StatusOrder = 3
     GROUP BY(orderdetails.orders_details_id)
     ");
  $stmt->bindparam(":CLIENID",$_POST['client'],PDO::PARAM_INT);
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
     $myobject->sellerid = $value['sellerid'];

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
  WHERE orderdetails.StatusOrder = 3 AND orders.ClientID = :CLIENTID ");
 $sql->bindparam(":CLIENTID",$_POST['client'],PDO::PARAM_INT);
 $sql -> execute();
 $order_count =   $sql->fetchColumn();
echo json_encode(array("confirmed_PRODUCTS" => $myaray,
                      "produnts_count"         => $order_count
));

}

else if(isset($_POST['request_for_returned__PRODUCTS']) && isset($_POST['client']) && isset($_POST["currencyid"])) {
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
     public  $sellerid;
     public  $date_asked_for_return;
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
     orderdetails.SallerID as sellerid,
     orderdetails.date_asked_for_return
      FROM orderdetails
     INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
     INNER JOIN items ON items.ItemID = orderdetails.ProductID
     INNER JOIN currency ON currency.CurrencyID = items.CurrencyID
     WHERE Orders.ClientID = :CLIENID AND orderdetails.StatusOrder = 4
     GROUP BY orderdetails.orders_details_id
     ");
  $stmt->bindparam(":CLIENID",$_POST['client'],PDO::PARAM_INT);
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
     $myobject->amount = $value['amont'];
     $myobject->sellerid = $value['sellerid'];
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
    WHERE orderdetails.StatusOrder = 4 AND orders.ClientID = :CLIENTID ");
   $sql->bindparam(":CLIENTID",$_POST['client'],PDO::PARAM_INT);
   $sql -> execute();
   $order_count =   $sql->fetchColumn();
echo json_encode(array("request_for_returned__PRODUCTS" => $myaray,
                      "produnts_count"         => $order_count
));

}




else if(isset($_POST['returned_PRODUCTS']) && isset($_POST['client']) && isset($_POST["currencyid"])) {
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
     public  $sellerid;
     public  $date_asked_for_return;
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
     orderdetails.SallerID as sellerid,
     orderdetails.date_asked_for_return
      FROM orderdetails
     INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
     INNER JOIN items ON items.ItemID = orderdetails.ProductID
     INNER JOIN currency ON currency.CurrencyID = items.CurrencyID
     WHERE Orders.ClientID = :CLIENID AND orderdetails.StatusOrder = 5
     GROUP BY orderdetails.orders_details_id
     ");
  $stmt->bindparam(":CLIENID",$_POST['client'],PDO::PARAM_INT);
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
     $myobject->amount = $value['amont'];
     $myobject->sellerid = $value['sellerid'];
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
    WHERE orderdetails.StatusOrder = 5 AND orders.ClientID = :CLIENTID ");
   $sql->bindparam(":CLIENTID",$_POST['client'],PDO::PARAM_INT);
   $sql -> execute();
   $order_count =   $sql->fetchColumn();
echo json_encode(array("returned_PRODUCTS" => $myaray,
                      "produnts_count"         => $order_count
));

}


else if(isset($_POST['Order_detail_info']) && isset($_POST['client']) && isset($_POST['productid']) && isset($_POST['orderid'])  && isset($_POST['status']) && isset($_POST['currency'])) {
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
  public $truking_numer;
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
   orders.Track_Number,
   orderdetails.DelevredDate



    FROM orderdetails
    INNER JOIN Orders ON  orders.OrderID = orderdetails.OrderID
    INNER JOIN items ON items.ItemID = orderdetails.ProductID
    INNER JOIN currency ON currency.CurrencyID = items.CurrencyID
    INNER JOIN payment_method on payment_method.payment_id = orders.payment_method
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

$myobject->expext_date    = $value['expext_date'];
$myobject->order_code     = $value["Code_For_Self_Ship"];
$myobject->truking_nume   = $value["Track_Number"];
$myobject->delevred_date  = $value["DelevredDate"];






 $myaray[] = $myobject;

}

echo json_encode(array("Order_detail_info" => $myaray
));

}


else if ( isset($_POST['IMAGE']) && isset($_POST['clintid']) && isset($_POST['returne_order']) &&  isset($_POST['ORDERID'])  &&  isset($_POST['PRODUCTID']) && isset($_POST['username'])  && isset($_POST['reason_for_retun'])  ) {
  date_default_timezone_set("Africa/Cairo");
   $date1 = str_replace("/","",date("y/m/d:h:i:sa"));
  $date = str_replace(":","",$date1);
   $rand = rand(1,900);
   $resultname = $rand.$date;
   $decodingimg = base64_decode($_POST['IMAGE']."JPG");
   $imgname = $resultname;



   $old_img  = get_img_returned_product($_POST['ORDERID'],$_POST['PRODUCTID']);

   if (file_exists("../".$old_img)) {
      unlink("../".$old_img);
   }
   $ALL_PATH = "../theme/image/retun_orders/".$_POST['username'];
   if (!file_exists($ALL_PATH)) {
    mkdir("../theme/image/retun_orders/".$_POST['username']);
  }


$ORDERRETURNED_CODE = rand(100000000000000,999999999999999);


//file_put_contents("../theme/image/userImage/".$_POST['username']."/".$imgname.".JPG",$decodingimg);
$MYPATHPIC = $ALL_PATH."/".$imgname.".JPG";
file_put_contents($MYPATHPIC,$decodingimg);

$imgfordatabse = substr($MYPATHPIC, 3);
$sql = $conn->prepare("UPDATE orderdetails
INNER JOIN orders ON orders.OrderID = orderdetails.OrderID
 SET 	Product_Img_For_Return = :IMG , StatusOrder = 4 , reason_for_returned_orders = :REASON, date_asked_for_return = NOW() , Order_Returned_Code = :RETUNED_CODE

WHERE orders.ClientID = :CLIENTID AND orderdetails.OrderID = :ORDERID AND orderdetails.ProductID = :PRODUCTID");
$sql->bindParam(":IMG",$imgfordatabse,PDO::PARAM_STR,255);
 $sql ->bindParam(":CLIENTID",$_POST['clintid'],PDO::PARAM_INT);
 $sql ->bindParam(":ORDERID",$_POST['ORDERID'],PDO::PARAM_INT);
$sql ->bindParam(":RETUNED_CODE",$ORDERRETURNED_CODE,PDO::PARAM_INT);
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
  else if (isset($_POST["get_cance_prd_reason"])  && isset($_POST["orderid"]) && isset($_POST["productid"]) ) {
    class info_cancel{
      public $IMG_FOR_RET;
      public $RESON_RET;
    }
$get_result = get_cance_prd_reason($_POST["orderid"],$_POST["productid"]);
$resu;
foreach ($get_result AS $value) {
  $obj = new info_cancel();
  $obj ->IMG_FOR_RET = $value["Product_Img_For_Return"];
  $obj ->RESON_RET = $value["reason_for_returned_orders"];
  $resu [] =$obj;
}


echo json_encode($obj);

}else if (isset($_POST["get_products_for_search"]) && isset($_POST["min_price"]) && isset($_POST["max_price"]) && isset($_POST["brand"]) && isset($_POST["category"]) && isset($_POST["WORD"])  && isset($_POST["CURENCYID"])
&& isset($_POST["ngazidja"])  && isset($_POST["ndzuwani"]) && isset($_POST["mwali"])  && isset($_POST["france"])){
  class product{
    public $id;
    public $name;
    public $description;
    public $price;
    public $currency;
    public $categoryID;
    public $categoryName;
    public $registreddate;
    public $rating;
    public $countrymade;
    public $status;
    public $sallerid;
    public $sallerName;
    public $brandid;
    public $brandname;
    public $island;
    public $country;
    public $gouvernorate;
    public $city;
    public $shippingid;
    public $shippingname;
    public $pic1;
    public $pic2;
    public $pic3;
    public $color;
    public $colorid;
    public $offer;
    public $tags;
    public $ram;
    public $ramid;
    public $BestSeller;
  }



    $sql = "SELECT items.* ,brand.BrandID as brandid,
    brand.BrandName as brandname,
    categories.CategoryID as catid,
    categories.Name as catName,
    sellers.SellerID as sellerid,
    currency.CurrencyName as currencyname,
    shipping.ShippingName as shippingname,
    sellers.Verificated,
    colors.ColorName,
    sellers.BestSeller,
    brand.BrandID as brandid,
    currency.CurrencyName as currencyname,
    shipping.ShippingName as shippingname,
    items.Color AS color,
    colors.ColorName as colorname,
    colors.ColorID as coloid,
      items.CurrencyID AS curcyid

    FROM items
    LEFT JOIN brand ON items.BrandID = brand.BrandID
    INNER JOIN  sellers ON sellers.SellerID = items.MemberID
    LEFT JOIN categories ON categories.CategoryID = items.CategoryID
    INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
    LEFT JOIN shipping ON shipping.ShippingID = items.ShippingID
    LEFT JOIN colors ON items.Color = colors.ColorID
    WHERE items.Status_Visible = 1 AND  (items.Name LIKE :WORD OR items.Tags LIKE :WORD OR brand.BrandName LIKE :WORD OR categories.CategoryID LIKE :WORD )
    AND  items.BrandID  IN(:BRANDID) AND items.CategoryID IN(:CATEGORYID)  AND   ( items.Price  between :MINIPRICE AND :MAXPRICE)
     AND (Items.ship_ngazidja = :SHIP_NGAZIDJA OR Items.ship_ndzouwani =:SHIP_NDUZWANI OR Items.ship_mwali = :SHIP_MWALI  OR Items.ship_france = :SHIP_FRANCE)";


  // FOR BRAND AND CATEGORY SPECIFICATED
  /*
  if($_POST["brand"] == "3"  && $_POST["category"] == "3" ){
    $sql = "SELECT items.* ,brand.BrandID as brandid,
    brand.BrandName as brandname,
    categories.CategoryID as catid,
    categories.Name as catName,
    sellers.SellerID as sellerid,
    currency.CurrencyName as currencyname,
    shipping.ShippingName as shippingname,
    sellers.Verificated,
    colors.ColorName,
    sellers.BestSeller,
    brand.BrandID as brandid,
    currency.CurrencyName as currencyname,
    shipping.ShippingName as shippingname,
    items.Color AS color,
    colors.ColorName as colorname,
    colors.ColorID as coloid,
      items.CurrencyID AS curcyid

    FROM items
    LEFT JOIN brand ON items.BrandID = brand.BrandID
    INNER JOIN  sellers ON sellers.SellerID = items.MemberID
    LEFT JOIN categories ON categories.CategoryID = items.CategoryID
    INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
    LEFT JOIN shipping ON shipping.ShippingID = items.ShippingID
    LEFT JOIN colors ON items.Color = colors.ColorID
    WHERE (items.Name LIKE :WORD OR items.Tags LIKE :WORD ) AND  ( items.Price  between :MINIPRICE AND :MAXPRICE)
     AND (Items.ship_ngazidja = :SHIP_NGAZIDJA OR Items.ship_ndzouwani =:SHIP_NDUZWANI OR Items.ship_mwali = :SHIP_MWALI  OR Items.ship_france = :SHIP_FRANCE)";
  }

// SPECIFACATION CATEGORY
else if($_POST["category"] != "3" ){
  $sql = "SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  categories.CategoryID as catid,
  categories.Name as catName,
  sellers.SellerID as sellerid,
  currency.CurrencyName as currencyname,
  shipping.ShippingName as shippingname,
  sellers.Verificated,
  colors.ColorName,
  sellers.BestSeller,
  brand.BrandID as brandid,
  currency.CurrencyName as currencyname,
  shipping.ShippingName as shippingname,
  items.Color AS color,
  colors.ColorName as colorname,
  colors.ColorID as coloid,
    items.CurrencyID AS curcyid

  FROM items
  LEFT JOIN brand ON items.BrandID = brand.BrandID
  INNER JOIN  sellers ON sellers.SellerID = items.MemberID
  LEFT JOIN categories ON categories.CategoryID = items.CategoryID
  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
  LEFT JOIN shipping ON shipping.ShippingID = items.ShippingID
  LEFT JOIN colors ON items.Color = colors.ColorID
  WHERE (items.Name LIKE :WORD OR items.Tags LIKE :WORD ) AND  items.BrandID  IN(:BRANDID) AND items.CategoryID IN(:CATEGORYID)  AND   ( items.Price  between :MINIPRICE AND :MAXPRICE)
   AND (Items.ship_ngazidja = :SHIP_NGAZIDJA OR Items.ship_ndzouwani =:SHIP_NDUZWANI OR Items.ship_mwali = :SHIP_MWALI  OR Items.ship_france = :SHIP_FRANCE)";
} // FOR ALL CATEGORY
 else if ($_POST["category"] == "3"){

   $sql = "SELECT items.* ,brand.BrandID as brandid,
   brand.BrandName as brandname,
   categories.CategoryID as catid,
   categories.Name as catName,
   sellers.SellerID as sellerid,
   currency.CurrencyName as currencyname,
   shipping.ShippingName as shippingname,
   sellers.Verificated,
   colors.ColorName,
   sellers.BestSeller,
   brand.BrandID as brandid,
   currency.CurrencyName as currencyname,
   shipping.ShippingName as shippingname,
   items.Color AS color,
   colors.ColorName as colorname,
   colors.ColorID as coloid,
     items.CurrencyID AS curcyid

   FROM items
   LEFT JOIN brand ON items.BrandID = brand.BrandID
   INNER JOIN  sellers ON sellers.SellerID = items.MemberID
   LEFT JOIN categories ON categories.CategoryID = items.CategoryID
   INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
   LEFT JOIN shipping ON shipping.ShippingID = items.ShippingID
   LEFT JOIN colors ON items.Color = colors.ColorID
   WHERE (items.Name LIKE :WORD OR items.Tags LIKE :WORD ) AND  items.BrandID IN(:BRANDID)  AND   ( items.Price  between :MINIPRICE AND :MAXPRICE)
    AND (Items.ship_ngazidja = :SHIP_NGAZIDJA OR Items.ship_ndzouwani =:SHIP_NDUZWANI OR Items.ship_mwali = :SHIP_MWALI  OR Items.ship_france = :SHIP_FRANCE)";

}

// FOR BRAND SPECIFICATED
else if($_POST["brand"] != "3" ){
  $sql = "SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  categories.CategoryID as catid,
  categories.Name as catName,
  sellers.SellerID as sellerid,
  currency.CurrencyName as currencyname,
  shipping.ShippingName as shippingname,
  sellers.Verificated,
  colors.ColorName,
  sellers.BestSeller,
  brand.BrandID as brandid,
  currency.CurrencyName as currencyname,
  shipping.ShippingName as shippingname,
  items.Color AS color,
  colors.ColorName as colorname,
  colors.ColorID as coloid,
    items.CurrencyID AS curcyid

  FROM items
  LEFT JOIN brand ON items.BrandID = brand.BrandID
  INNER JOIN  sellers ON sellers.SellerID = items.MemberID
  LEFT JOIN categories ON categories.CategoryID = items.CategoryID
  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
  LEFT JOIN shipping ON shipping.ShippingID = items.ShippingID
  LEFT JOIN colors ON items.Color = colors.ColorID
  WHERE (items.Name LIKE :WORD OR items.Tags LIKE :WORD ) AND  items.BrandID IN(:BRANDID) AND items.CategoryID IN(:CATEGORYID)  AND   ( items.Price  between :MINIPRICE AND :MAXPRICE)
   AND (Items.ship_ngazidja = :SHIP_NGAZIDJA OR Items.ship_ndzouwani =:SHIP_NDUZWANI OR Items.ship_mwali = :SHIP_MWALI  OR Items.ship_france = :SHIP_FRANCE)";
} // FOR ALL BRAND
 else if ($_POST["brand"] == "3"){
   $sql = "SELECT items.* ,brand.BrandID as brandid,
   brand.BrandName as brandname,
   categories.CategoryID as catid,
   categories.Name as catName,
   sellers.SellerID as sellerid,
   currency.CurrencyName as currencyname,
   shipping.ShippingName as shippingname,
   sellers.Verificated,
   colors.ColorName,
   sellers.BestSeller,
   brand.BrandID as brandid,
   currency.CurrencyName as currencyname,
   shipping.ShippingName as shippingname,
   items.Color AS color,
   colors.ColorName as colorname,
   colors.ColorID as coloid,
     items.CurrencyID AS curcyid

   FROM items
   LEFT JOIN brand ON items.BrandID = brand.BrandID
   INNER JOIN  sellers ON sellers.SellerID = items.MemberID
   LEFT JOIN categories ON categories.CategoryID = items.CategoryID
   INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
   LEFT JOIN shipping ON shipping.ShippingID = items.ShippingID
   LEFT JOIN colors ON items.Color = colors.ColorID
   WHERE (items.Name LIKE :WORD OR items.Tags LIKE :WORD ) AND items.CategoryID IN(:CATEGORYID)  AND   ( items.Price  between :MINIPRICE AND :MAXPRICE)
    AND (Items.ship_ngazidja = :SHIP_NGAZIDJA OR Items.ship_ndzouwani =:SHIP_NDUZWANI OR Items.ship_mwali = :SHIP_MWALI  OR Items.ship_france = :SHIP_FRANCE)";

} */



  $word = "%".$_POST["WORD"]."%";
  $stm = $conn->prepare($sql);
  $stm->bindParam(":WORD",$word,PDO::PARAM_STR);
 $stm->bindParam(":TAGS",$word,PDO::PARAM_STR);
 if ($_POST["brand"] != "3") {
   $br_ = implode(",", json_decode($_POST["brand"]));
     $stm->bindParam(":BRANDID",$br_,PDO::PARAM_INT);
 }

  if($_POST["category"] != "3"){
  $cat_ = implode(",",json_decode($_POST["category"]));
  $stm->bindParam(":CATEGORYID",$cat_,PDO::PARAM_INT);
}
  $stm->bindParam(":MINIPRICE",$_POST["min_price"],PDO::PARAM_INT);
  $stm->bindParam(":MAXPRICE",$_POST["max_price"],PDO::PARAM_INT);

  $stm->bindParam(":SHIP_NGAZIDJA",$_POST["ngazidja"],PDO::PARAM_INT);
  $stm->bindParam(":SHIP_NDUZWANI",$_POST["ndzuwani"],PDO::PARAM_INT);
  $stm->bindParam(":SHIP_MWALI",$_POST["mwali"],PDO::PARAM_INT);
  $stm->bindParam(":SHIP_FRANCE",$_POST["france"],PDO::PARAM_INT);

  $stm->execute();
  $fetch = $stm->fetchAll();
  $ARR = array();
  foreach ($fetch as $value) {
    $myobj = new product();
    $myobj ->id = $value['ItemID'];
    $myobj ->name = $value['Name'];
    $myobj->description = $value['Description'];
    if($_POST["CURENCYID"] ==  $value["curcyid"]){
        $myobj->price = $value['Price'];
    }else{
      $myobj->price =   $value['Price']*get_exchange($_POST["CURENCYID"]);
    }
    $myobj->currency=$value['currencyname'];
    $myobj->registreddate=$value['AddDate'];
    $myobj->rating=$value['Rating'];
    $myobj->status=$value['Status'];
    $myobj->country=$value['CountryMade'];
    $myobj->categoryID=$value['CategoryID'];
    $myobj->categoryName=$value['catName'];
    $myobj->brandid=$value['brandid'];
    $myobj->brandname=$value['brandname'];
    $myobj->island=$value['IslandID'];
    $myobj->gouvernorate=$value['GouvernoratID'];
    $myobj->city=$value['CityID'];
    $myobj->shippingid=$value['ShippingID'];
    $myobj->shippingname=$value['shippingname'];
    $myobj->pic1=$value['Pic1'];
    $myobj->pic2=$value['Pic2'];
    $myobj->pic3=$value['Pic3'];
    $myobj->offer=$value['Offer'];
    $myobj->tags=$value['Tags'];
    $myobj->sallerid=$value['sellerid'];
    $myobj->color = $value['colorname'];
    $myobj->colorid = $value['coloid'];
    $myobj->verificated = $value['Verificated'];
    $myobj->BestSeller = $value['BestSeller'];
    $myobj->count_bought = count_bought_item($value['ItemID']);
    $ARR[] = $myobj;

  }


  echo json_encode(array("item"=>$ARR));
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

}else if (isset($_POST["search_products_by_word"]) && isset($_POST["WORD"]) && isset($_POST["CURENCYID"])
&& isset($_POST["ngazidja"])  && isset($_POST["ndzuwani"]) && isset($_POST["mwali"])  && isset($_POST["france"])){
  class product{
    public $id;
    public $name;
    public $description;
    public $price;
    public $currency;
    public $categoryID;
    public $categoryName;
    public $registreddate;
    public $rating;
    public $countrymade;
    public $status;
    public $sallerid;
    public $sallerName;
    public $brandid;
    public $brandname;
    public $island;
    public $country;
    public $gouvernorate;
    public $city;
    public $shippingid;
    public $shippingname;
    public $pic1;
    public $pic2;
    public $pic3;
    public $color;
    public $colorid;
    public $offer;
    public $tags;
    public $ram;
    public $ramid;
    public $BestSeller;
  }

  $sql = "SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  categories.CategoryID as catid,
  categories.Name as catName,
  sellers.SellerID as sellerid,
  currency.CurrencyName as currencyname,
  sellers.Verificated,
  sellers.BestSeller,
  brand.BrandID as brandid,
  items.CurrencyID AS curcyid
  FROM items
  LEFT JOIN brand ON items.BrandID = brand.BrandID
  INNER JOIN  sellers ON sellers.SellerID = items.MemberID
  LEFT JOIN categories ON categories.CategoryID = items.CategoryID
  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
  WHERE(items.Name LIKE :WORD OR items.Tags LIKE :WORD)  AND (Items.ship_ngazidja = :SHIP_NGAZIDJA OR Items.ship_ndzouwani =:SHIP_NDUZWANI OR Items.ship_mwali = :SHIP_MWALI  OR Items.ship_france = :SHIP_FRANCE)
  ORDER BY RAND()";
  $word = "%".$_POST["WORD"]."%";
  $stm = $conn->prepare($sql);
  $stm->bindParam(":WORD",$word,PDO::PARAM_STR);
 $stm->bindParam(":TAGS",$word,PDO::PARAM_STR);

 $stm->bindParam(":SHIP_NGAZIDJA",$_POST["ngazidja"],PDO::PARAM_INT);
 $stm->bindParam(":SHIP_NDUZWANI",$_POST["ndzuwani"],PDO::PARAM_INT);
 $stm->bindParam(":SHIP_MWALI",$_POST["mwali"],PDO::PARAM_INT);
 $stm->bindParam(":SHIP_FRANCE",$_POST["france"],PDO::PARAM_INT);

  $stm->execute();
  $fetch = $stm->fetchAll();
  $ARR = array();
  foreach ($fetch as $value) {
    $myobj = new product();
    $myobj ->id = $value['ItemID'];
    $myobj ->name = $value['Name'];
    $myobj->description = $value['Description'];
    if($_POST["CURENCYID"] ==  $value["curcyid"]){
        $myobj->price = $value['Price'];
    }else{
      $myobj->price =   $value['Price']*get_exchange($_POST["CURENCYID"]);
    }
    $myobj->currency=$value['currencyname'];
    $myobj->registreddate=$value['AddDate'];
    $myobj->rating=$value['Rating'];
    $myobj->status=$value['Status'];
    $myobj->country=$value['CountryMade'];
    $myobj->categoryID=$value['CategoryID'];
    $myobj->categoryName=$value['catName'];
    $myobj->brandid=$value['brandid'];
    $myobj->brandname=$value['brandname'];
    $myobj->pic1=$value['Pic1'];
    $myobj->pic2=$value['Pic2'];
    $myobj->pic3=$value['Pic3'];
    $myobj->offer=$value['Offer'];
    $myobj->tags=$value['Tags'];
    $myobj->sallerid=$value['sellerid'];
    $myobj->verificated = $value['Verificated'];
    $myobj->BestSeller = $value['BestSeller'];
    $myobj->count_bought = count_bought_item($value['ItemID']);
    $ARR[] = $myobj;

  }


  echo json_encode(array("item"=>$ARR));
}

else if (isset($_POST["search_products_by_word_COUNTRY"]) && isset($_POST["WORD"]) && isset($_POST["countryid"]) && isset($_POST["CURENCYID"])){
  class product{
    public $id;
    public $name;
    public $description;
    public $price;
    public $currency;
    public $categoryID;
    public $categoryName;
    public $registreddate;
    public $rating;
    public $countrymade;
    public $status;
    public $sallerid;
    public $sallerName;
    public $brandid;
    public $brandname;
    public $island;
    public $country;
    public $gouvernorate;
    public $city;
    public $shippingid;
    public $shippingname;
    public $pic1;
    public $pic2;
    public $pic3;
    public $color;
    public $colorid;
    public $offer;
    public $tags;
    public $ram;
    public $ramid;
    public $BestSeller;

  }

  $sql = "SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  categories.CategoryID as catid,
  categories.Name as catName,
  sellers.SellerID as sellerid,
  currency.CurrencyName as currencyname,
  shipping.ShippingName as shippingname,
  sellers.Verificated,
  colors.ColorName,
  sellers.BestSeller,
  brand.BrandID as brandid,
  currency.CurrencyName as currencyname,
  shipping.ShippingName as shippingname,
  items.Color AS color,
  colors.ColorName as colorname,
  colors.ColorID as coloid,
  items.CurrencyID AS curcyid
  FROM items
  LEFT JOIN brand ON items.BrandID = brand.BrandID
  INNER JOIN  sellers ON sellers.SellerID = items.MemberID
  LEFT JOIN categories ON categories.CategoryID = items.CategoryID
  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
  LEFT JOIN shipping ON shipping.ShippingID = items.ShippingID
  LEFT JOIN colors ON items.Color = colors.ColorID
  WHERE(items.Name LIKE :WORD OR items.Tags LIKE :WORD)  AND  items.IslandID =:ISLANDID
  ORDER BY RAND()";
  $word = "%".$_POST["WORD"]."%";
  $stm = $conn->prepare($sql);
  $stm->bindParam(":WORD",$word,PDO::PARAM_STR);
 $stm->bindParam(":TAGS",$word,PDO::PARAM_STR);
  $stm->bindParam(":ISLANDID", $_POST["countryid"],PDO::PARAM_INT);

  $stm->execute();
  $fetch = $stm->fetchAll();
  $ARR = array();
  foreach ($fetch as $value) {
    $myobj = new product();
    $myobj ->id = $value['ItemID'];
    $myobj ->name = $value['Name'];
    $myobj->description = $value['Description'];
    if($_POST["CURENCYID"] ==  $value["curcyid"]){
        $myobj->price = $value['Price'];
    }else{
      $myobj->price =   $value['Price']*get_exchange($_POST["CURENCYID"]);
    }


    $myobj->currency=$value['currencyname'];
    $myobj->registreddate=$value['AddDate'];
    $myobj->rating=$value['Rating'];
    $myobj->status=$value['Status'];
    $myobj->country=$value['CountryMade'];
    $myobj->categoryID=$value['CategoryID'];
    $myobj->categoryName=$value['catName'];
    $myobj->brandid=$value['brandid'];
    $myobj->brandname=$value['brandname'];
    $myobj->island=$value['IslandID'];
    $myobj->gouvernorate=$value['GouvernoratID'];
    $myobj->city=$value['CityID'];
    $myobj->shippingid=$value['ShippingID'];
    $myobj->shippingname=$value['shippingname'];
    $myobj->pic1=$value['Pic1'];
    $myobj->pic2=$value['Pic2'];
    $myobj->pic3=$value['Pic3'];
    $myobj->offer=$value['Offer'];
    $myobj->tags=$value['Tags'];
    $myobj->sallerid=$value['sellerid'];
    $myobj->color = $value['colorname'];
    $myobj->colorid = $value['coloid'];
    $myobj->verificated = $value['Verificated'];
    $myobj->BestSeller = $value['BestSeller'];
    $myobj->count_bought = count_bought_item($value['ItemID']);
    $ARR[] = $myobj;

  }


  echo json_encode(array("item"=>$ARR));
}










 ?>
