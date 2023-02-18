<?php
              // title function that echo the title page in case page
function getTitle(){
  global $pageTitle;
  if (isset($pageTitle)) {
    echo $pageTitle;
  }
  else {
    echo "deafult";
  }
}
                              // SELECT function
/* function select($table,$select='*', $where="", $eqal=""){
global $conn;
$selectstmt = $conn->prepare("SELECT $select FROM $table WHERE $where= ?");
$selectstmt->execute(array($eqal));
$row = $selectstmt->rowCount();
$resul=array();
if ($row>0) {
  $resul=$selectstmt->fetchAll();
}
else {
  $resul[1]="SORRY";
}
foreach ($resul as $value) {


  return $value;
}

}
      */                  // AND SELECT function

//      cheick iteams
function checkIteams($select,$from,$vallue){
  global $conn ;
$checkstmt = $conn->prepare("SELECT $select FROM $from WHERE $select= ? ");
$checkstmt->execute(array($vallue));
$row = $checkstmt->rowCount();
return $row;

}                        // END SELECT FUNCTION


    //   COUNT ITEMS

function countItem($item,$table){
  global $conn;
$tmt_count =$conn->prepare("SELECT COUNT($item) FROM $table WHERE GroupID !=1");
$tmt_count->execute();
return $tmt_count->fetchColumn();

}

function countAllItem($item,$table){
  global $conn;
$tmt_count =$conn->prepare("SELECT COUNT($item) FROM $table");
$tmt_count->execute();
return $tmt_count->fetchColumn();

}
                          // Redirect Function
function redirectHome($msg, $url =null ,$seconds=5){
if ($url==null) {
  $url = "dashboard.php";
}
else {
if (isset($_SERVER['HTTP_REFFER']) && $_SERVER["HTTP_REFFER"] !=="") {
  $url = $_SERVER['HTTP_REFFER'];
} // end if isset http_reffer
else {
  $url=$url;
} // end else isset http_reffer

} // end else url = null

echo $msg;
echo "<div class='alert alert-info text-center'>".lang("Redirect").$seconds.lang("seconds")."</div>";
header("refresh:$seconds;url=$url");
exit();
}

                      // Latest Item Function
function getLatest($select ,$table, $order,   $limit=5){
global $conn;
$lateststmt = $conn->prepare("SELECT $select FROM  $table  WHERE GroupID != 1 ORDER BY $order DESC LIMIT $limit ");
$lateststmt->execute();
$row = $lateststmt->fetchAll();
return $row;

}


function count_not_aproved_orders_for_saler($saler_id){
global $conn;

  $stmt = $conn->prepare("SELECT orderdetails.orders_details_id FROM orderdetails
  INNER JOIN Orders ON orders.OrderID = orderdetails.OrderID
  WHERE SellerID =? AND StatusOrder =1");
$stmt ->execute(array($saler_id));
$count = $stmt ->rowCount();
return $count;
}

function count_on_way_orders_for_saler($saler_id){
  global $conn;
  
    $stmt = $conn->prepare("SELECT orderdetails.orders_details_id FROM orderdetails
    INNER JOIN Orders ON orders.OrderID = orderdetails.OrderID
    WHERE SellerID =? AND StatusOrder =2");
  $stmt ->execute(array($saler_id));
  $count = $stmt ->rowCount();
  return $count;
  }


  function count_completed_orders_for_saler($saler_id){
    global $conn;
    
      $stmt = $conn->prepare("SELECT orderdetails.orders_details_id FROM orderdetails
      INNER JOIN Orders ON orders.OrderID = orderdetails.OrderID
      WHERE SellerID =? AND StatusOrder =3");
    $stmt ->execute(array($saler_id));
    $count = $stmt ->rowCount();
    return $count;
    }


    function count_returned_orders_for_saler($saler_id){
      global $conn;
      
        $stmt = $conn->prepare("SELECT orderdetails.orders_details_id FROM orderdetails
        INNER JOIN Orders ON orders.OrderID = orderdetails.OrderID
        WHERE SellerID =? AND StatusOrder =4");
      $stmt ->execute(array($saler_id));
      $count = $stmt ->rowCount();
      return $count;
      }





?>
