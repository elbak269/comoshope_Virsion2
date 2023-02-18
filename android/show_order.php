<?php
 include("../admin/connect.php");
class confirmed_orders_details{
  public  $product_name;
  public $barcode;
  public $qtt;
  public $amount;
  public $total_amount;
  public $date;
}

if(isset($_POST['confirmed_order']) && isset($_POST['client'])) {

  $stmt = $conn ->prepare("SELECT Orders.* , Items.Name AS product_name , Items.ItemID AS product_id,
  concat(names.FirstName,' ',names.LastName) as recep_full_name,
    CONCAT(cities.CityName,' , ',gouvernorate.GouvernoratName) as ord_adress,
    orderdetails.QTY AS  qtt,
    orderdetails.Amount as amount,
    orderdetails.total_amount as total_amout

    from orders
    INNER JOIN orderdetails on orderdetails.OrderID =  Orders.OrderID
    INNER JOIN Items ON Items.ItemID =  orderdetails.ProductID
    INNER JOIN names On names.NameID = orders.RECEPIENT
    INNER JOIN adress ON adress.AdressID = orders.Adress
    INNER JOIN gouvernorate ON  gouvernorate.IslandID = adress.Gouvernorate
    INNER JOIN cities on cities.GovernorateID = adress.City
    where Orders.StatusOrder = 1 AND Orders.ClientID = :CLIENTID
    GROUP BY Orders.orderID

  ");
  $stmt ->bindparam(":CLIENTID",$_POST['client'],PDO::PARAM_INT);
  $stmt -> execute();

  $fetc = $stmt->fetchAll();
  $CONFIRMED_ORDER_ARRAY = array();

  foreach ($fetc as $value) {
  $myconfi_order_object = new  confirmed_orders_details();
    $myconfi_order_object->product_name = $value["product_name"];
    $myconfi_order_object->barcode = $value["product_id"];
    $myconfi_order_object->qtt = $value["qtt"];
    $myconfi_order_object->amount = $value["amount"];
    $myconfi_order_object->total_amount = $value["total_amout"];

    $CONFIRMED_ORDER_ARRAY [] = $myconfi_order_object;

  }

  echo json_encode(array("confirmed_order" => $CONFIRMED_ORDER_ARRAY ));

}

                              // WATING ORDERS
if(isset($_POST['only_wating_orders']) && isset($_POST['client'])  ) {


  class order {
    public  $orderid ;
    public  $requestDate;
    public  $total_order;
    public  $paymentMethod;
    public  $adress;
    public   $status;
    public  $recipienName;
  }

  $stmt = $conn ->prepare("SELECT Orders.* ,
  concat(names.FirstName,' ',names.LastName) as recep_full_name,
  CONCAT(cities.CityName,' , ',gouvernorate.GouvernoratName) as ord_adress

    from orders
    INNER JOIN names On names.NameID = orders.RECEPIENT
    INNER JOIN adress ON adress.AdressID = orders.Adress
    INNER JOIN gouvernorate ON  gouvernorate.IslandID = adress.Gouvernorate
    INNER JOIN cities on cities.GovernorateID = adress.City
    where  Orders.ClientID = :CLIENTID
    GROUP by orders.OrderID

  ");
  $stmt ->bindparam(":CLIENTID",$_POST['client'],PDO::PARAM_INT);
  $stmt -> execute();

  $fetc = $stmt->fetchAll();
  $CONFIRMED_ORDER_ARRAY = array();

  foreach ($fetc as $value) {
  $myconfi_order_object = new  order();
    $myconfi_order_object->orderid= $value["OrderID"];
    $myconfi_order_object->requestDate = $value["RequestDate"];
    $myconfi_order_object->total_order = $value["TotalOrder"];
    $myconfi_order_object->paymentMethod = $value["payment_method"];
    $myconfi_order_object->adress = $value["ord_adress"];
    $myconfi_order_object->recipienName = $value["recep_full_name"];

    $CONFIRMED_ORDER_ARRAY [] = $myconfi_order_object;

  }


    $sql = $conn->prepare("SELECT count(OrderID) FROM Orders ");
    $sql->bindparam(":CLIENTID",$_POST['client'],PDO::PARAM_INT);
    $sql -> execute();
    $order_count =   $sql->fetchColumn();




  echo json_encode(array("only_wating_orders" => $CONFIRMED_ORDER_ARRAY,
                        "order_count"         => $order_count
 ));



}     //END  WATING ORDERS


 ?>
