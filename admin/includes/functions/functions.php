<?php

$reward_client = 3; // REWARD OF EVERY SALES FOR CLIENTS
$max_amountodr_withdrawn = 100;
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

function alert_info($alert){
  echo "<div class= 'alert_info'>";
echo "<span> <strong>". $alert ."</strong> </span>";
  echo "</div>";
}

function getCategory(){
  global $conn;
  $stmt = $conn-> prepare("SELECT * FROM categories");
  $stmt->execute();
  $result =$stmt->fetchAll();
  return $result;

}
function  getItems(){
   global $conn;
  $stmt = $conn->prepare("SELECT * FROM Items");
  $stmt->execute();
  $fetch = $stmt->fetchAll();
  return $fetch;

}

function geall(){
   global $conn;
$stm = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  categories.CategoryID as catid,
  categories.Name as catName,
  users.Username as userName,
  users.Email AS uerEmail,
  users.UserID as userId,
  currency.CurrencyName as currencyname
  FROM items
  INNER JOIN brand ON items.BrandID = brand.BrandID
  INNER JOIN  users ON users.UserID = items.UserID
  INNER JOIN categories ON categories.CategoryID = items.CategoryID
  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID ");

  $stm->execute();
  $fetch = $stm->fetchAll();
  return $fetch;
}

function getBrands(){
  global $conn;
  $stmt = $conn-> prepare("SELECT * FROM brand");
  $stmt->execute();
  $result =$stmt->fetchAll();
  return $result;

}
function cheick_exist($select, $table ,$value){
   global $conn;
   $chec = $conn-> prepare("SELECT $select FROM $table WHERE $select = ?");
   $chec -> execute(array($value));
   $row = $chec-> rowCount();
   if ($row > 0) {
     return 1;
   }
   else {
     return 0;
   }

}
 // simple  qurey
function simpleselect($select,$table){
  global $conn;
  $stmt = $conn -> prepare("SELECT $select FROM $table");
  $stmt->execute();
  $fetc =  $stmt->fetchAll();
  return $fetc;
}
// qurey with condition
function selectwithwhere($select,$table, $where, $eqal){
  global $conn;
  $stmt = $conn -> prepare("SELECT $select FROM $table WHERE $where = ? ");
  $stmt->execute(array($eqal));
  $fetc =  $stmt->fetchAll();
  return $fetc;
}

function getsellerid($username){
  global $conn;
  $sql1 = $conn -> prepare("SELECT sellers.SellerID AS selerid FROM sellers
  INNER JOIN clients ON  sellers.ClientID = clients.ClientID
  WHERE clients.Username = ? LIMIT 1");
  $sql1->execute(array($username));
  $fetch1 = $sql1->fetchAll();
  foreach ($fetch1 as  $value) {
    return $value['selerid'];
  }
}

function getclientID($username){
  global $conn;
  $STMT = $conn -> prepare("SELECT ClientID FROM clients WHERE Username = ?");
  $STMT->execute(array($username));
  $fect = $STMT-> fetchAll();
  foreach ($fect as  $value) {
    return $value['ClientID'];
  }
}

//  Count Sellers
function count_all($id,$table){
  global $conn;
$tmt_count =$conn->prepare("SELECT COUNT($id) FROM $table");
$tmt_count->execute();
return $tmt_count->fetchColumn();

}

//  Count Pedding Sellers
function count_pedding_sellers($id,$table){
  global $conn;
$tmt_count =$conn->prepare("SELECT COUNT($id) FROM $table WHERE Aprovable=6");
$tmt_count->execute();
return $tmt_count->fetchColumn();

}


// Latest sellers Function
function getLatestSellers($select ,$table, $order,   $limit=5){
global $conn;
$lateststmt = $conn->prepare("SELECT sellers.$select   , sellers.SellerID, clients.Username    FROM  $table
INNER JOIN sellers ON clients.ClientID = sellers.ClientID
ORDER BY $order DESC LIMIT $limit ");
$lateststmt->execute();
$row = $lateststmt->fetchAll();
return $row;

}

// cheick if seller exists
function ifsellerexists($clientid){
global $conn;
$stm = $conn->prepare("SELECT SellerID FROM sellers WHERE SellerID = ?");
$stm ->execute(array($clientid));
$row = $stm->rowCount();
return $row;
}

function ifseller_is_exists($clientid){
global $conn;
$stm = $conn->prepare("SELECT SellerID FROM sellers WHERE ClientID = :CLIENTID");
$stm->bindParam(":CLIENTID",$clientid,PDO::PARAM_INT);
$stm ->execute();
$row = $stm->rowCount();
return $row;
}

function prudctsinyourcart($ID){
  global $conn;
  $stmt = $conn->prepare("SELECT COUNT('ProductID') FROM incart WHERE  ClientID = :CLIENTID ");
  $stmt->bindParam(":CLIENTID",$ID,PDO::PARAM_INT);
  $stmt -> execute();
 return $stmt ->fetchColumn();
}

function prudctsinyourcartbyisland($ID,$island){
  global $conn;
  $stmt = $conn->prepare("SELECT COUNT('ProductID')
  FROM incart
  LEFT JOIN items ON incart.ProductID = items.ItemID
  WHERE  ClientID = :CLIENTID");
  $stmt->bindParam(":CLIENTID",$ID,PDO::PARAM_INT);
//  $stmt->bindParam(":ISLAND",$island,PDO::PARAM_INT);
  $stmt -> execute();
 return $stmt ->fetchColumn();
}

function PRODUCT_INCART($ID){
  global $conn;
  $stmt = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
    brand.BrandName as brandname,
    categories.CategoryID as catid,
    categories.Name as catName,
    sellers.StoreName ,
    sellers.SellerID as userId,
    currency.CurrencyName as currencyname,
    promo.Discount  AS DiscountPrice,
    incart.QTY  as qty

    FROM items
    LEFT JOIN brand ON items.BrandID = brand.BrandID
    LEFT JOIN  sellers ON sellers.SellerID = items.MemberID
    LEFT JOIN categories ON categories.CategoryID = items.CategoryID
    LEFT JOIN currency ON items.CurrencyID = currency.CurrencyID
    LEFT JOIN promo ON items.Discount = promo.PromoID
    INNER JOIN incart ON incart.ProductID=items.ItemID
    INNER JOIN clients ON incart.ClientID=clients.ClientID
    WHERE clients.ClientID = :CLIENTID AND  incart.QTY != 0");
  $stmt->bindParam(":CLIENTID",$ID,PDO::PARAM_INT);
  $stmt -> execute();
 return $stmt ->fetchAll();
}

function PRODUCT_INCART_FOR_NGAZIDJA($ID){
  global $conn;
  $stmt = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
    brand.BrandName as brandname,
    categories.CategoryID as catid,
    categories.Name as catName,
    sellers.StoreName ,
    sellers.SellerID as userId,
    currency.CurrencyName as currencyname,
    promo.Discount  AS DiscountPrice,
    incart.QTY  as qty

    FROM items
    LEFT JOIN brand ON items.BrandID = brand.BrandID
    LEFT JOIN  sellers ON sellers.SellerID = items.MemberID
    LEFT JOIN categories ON categories.CategoryID = items.CategoryID
    LEFT JOIN currency ON items.CurrencyID = currency.CurrencyID
    LEFT JOIN promo ON items.Discount = promo.PromoID
    INNER JOIN incart ON incart.ProductID=items.ItemID
    INNER JOIN clients ON incart.ClientID=clients.ClientID
    WHERE clients.ClientID = :CLIENTID AND  incart.QTY != 0 AND ship_ngazidja = 1");
  $stmt->bindParam(":CLIENTID",$ID,PDO::PARAM_INT);
  $stmt -> execute();
 return $stmt ->fetchAll();
}

function PRODUCT_INCART_FOR_NDZUWANI($ID){
  global $conn;
  $stmt = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
    brand.BrandName as brandname,
    categories.CategoryID as catid,
    categories.Name as catName,
    sellers.StoreName ,
    sellers.SellerID as userId,
    currency.CurrencyName as currencyname,
    promo.Discount  AS DiscountPrice,
    incart.QTY  as qty

    FROM items
    LEFT JOIN brand ON items.BrandID = brand.BrandID
    LEFT JOIN  sellers ON sellers.SellerID = items.MemberID
    LEFT JOIN categories ON categories.CategoryID = items.CategoryID
    LEFT JOIN currency ON items.CurrencyID = currency.CurrencyID
    LEFT JOIN promo ON items.Discount = promo.PromoID
    INNER JOIN incart ON incart.ProductID=items.ItemID
    INNER JOIN clients ON incart.ClientID=clients.ClientID
    WHERE clients.ClientID = :CLIENTID AND  incart.QTY != 0 AND ship_ndzouwani = 1");
  $stmt->bindParam(":CLIENTID",$ID,PDO::PARAM_INT);
  $stmt -> execute();
 return $stmt ->fetchAll();
}


function PRODUCT_INCART_FOR_MWALI($ID){
  global $conn;
  $stmt = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
    brand.BrandName as brandname,
    categories.CategoryID as catid,
    categories.Name as catName,
    sellers.StoreName ,
    sellers.SellerID as userId,
    currency.CurrencyName as currencyname,
    promo.Discount  AS DiscountPrice,
    incart.QTY  as qty

    FROM items
    LEFT JOIN brand ON items.BrandID = brand.BrandID
    LEFT JOIN  sellers ON sellers.SellerID = items.MemberID
    LEFT JOIN categories ON categories.CategoryID = items.CategoryID
    LEFT JOIN currency ON items.CurrencyID = currency.CurrencyID
    LEFT JOIN promo ON items.Discount = promo.PromoID
    INNER JOIN incart ON incart.ProductID=items.ItemID
    INNER JOIN clients ON incart.ClientID=clients.ClientID
    WHERE clients.ClientID = :CLIENTID AND  incart.QTY != 0 AND ship_mwali = 1");
  $stmt->bindParam(":CLIENTID",$ID,PDO::PARAM_INT);
  $stmt -> execute();
 return $stmt ->fetchAll();
}


function PRODUCT_INCART_FOR_FRANCE($ID){
  global $conn;
  $stmt = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
    brand.BrandName as brandname,
    categories.CategoryID as catid,
    categories.Name as catName,
    sellers.StoreName ,
    sellers.SellerID as userId,
    currency.CurrencyName as currencyname,
    promo.Discount  AS DiscountPrice,
    incart.QTY  as qty

    FROM items
    LEFT JOIN brand ON items.BrandID = brand.BrandID
    LEFT JOIN  sellers ON sellers.SellerID = items.MemberID
    LEFT JOIN categories ON categories.CategoryID = items.CategoryID
    LEFT JOIN currency ON items.CurrencyID = currency.CurrencyID
    LEFT JOIN promo ON items.Discount = promo.PromoID
    INNER JOIN incart ON incart.ProductID=items.ItemID
    INNER JOIN clients ON incart.ClientID=clients.ClientID
    WHERE clients.ClientID = :CLIENTID AND  incart.QTY != 0 AND 	ship_france = 1");
  $stmt->bindParam(":CLIENTID",$ID,PDO::PARAM_INT);
  $stmt -> execute();
 return $stmt ->fetchAll();
}


function getnaems($clientid)
{
  global $conn;
$stmt = $conn->prepare("SELECT * FROM names WHERE ClientID = :CLIENTID  ORDER BY NameID DESC LIMIT 2 ");
$stmt->bindParam(":CLIENTID",$clientid,PDO::PARAM_INT);
$stmt->execute();
return $stmt->fetchAll();
}

function PROCUT_INFO_ORDER($productid)
{
global $conn;
$stmt = $conn->prepare("SELECT Price,MemberID,CurrencyID FROM Items WHERE ItemID = :PRODUCTID");
$stmt->bindParam(":PRODUCTID",$productid,PDO::PARAM_INT);
$stmt->execute();
return $stmt->fetchAll();
}


function promo_value($PromoCode)
{
global $conn;
$stmt = $conn->prepare("SELECT 	Discount,CurrencyID FROM  promo WHERE 	PromoCode = :promocode");
$stmt->bindParam(":promocode",$PromoCode,PDO::PARAM_STR,50);
$stmt->execute();
return $stmt->fetchAll();
}

function count_not_aproved_orders_for_saler($saler_id){
  global $conn;

    $stmt = $conn->prepare("SELECT orderdetails.orders_details_id FROM orderdetails
    INNER JOIN Orders ON orders.OrderID = orderdetails.OrderID
    WHERE SallerID =? AND StatusOrder =1");
  $stmt ->execute(array($saler_id));
  $count = $stmt ->rowCount();
  return $count;
  }

  function count_on_way_orders_for_saler($saler_id){
    global $conn;

      $stmt = $conn->prepare("SELECT orderdetails.orders_details_id FROM orderdetails
      INNER JOIN Orders ON orders.OrderID = orderdetails.OrderID
      WHERE SallerID =? AND StatusOrder =2");
    $stmt ->execute(array($saler_id));
    $count = $stmt ->rowCount();
    return $count;
    }


    function count_completed_orders_for_saler($saler_id){
      global $conn;

        $stmt = $conn->prepare("SELECT orderdetails.orders_details_id FROM orderdetails
        INNER JOIN Orders ON orders.OrderID = orderdetails.OrderID
        WHERE SallerID =? AND StatusOrder =3");
      $stmt ->execute(array($saler_id));
      $count = $stmt ->rowCount();
      return $count;
      }


      function count_returned_orders_for_saler($saler_id){
        global $conn;

          $stmt = $conn->prepare("SELECT orderdetails.orders_details_id FROM orderdetails
          INNER JOIN Orders ON orders.OrderID = orderdetails.OrderID
          WHERE SallerID =? AND StatusOrder = 4");
        $stmt ->execute(array($saler_id));
        $count = $stmt ->rowCount();
        return $count;
        }

        function count__already_returned_orders_for_saler($saler_id){
          global $conn;

            $stmt = $conn->prepare("SELECT orderdetails.orders_details_id FROM orderdetails
            INNER JOIN Orders ON orders.OrderID = orderdetails.OrderID
            WHERE SallerID =? AND StatusOrder = 5");
          $stmt ->execute(array($saler_id));
          $count = $stmt ->rowCount();
          return $count;
          }

  function orders_for_salers($sellerid,$status){
    global $conn;
    $stmt = $conn ->prepare("SELECT
    items.ItemID as product_id,
    orders.RequestDate as requestorderdate,
      items.Name,
      orders.OrderID AS orderID,
      Items.Pic1,
      orderdetails.QTY,
      items.Price,
      currency.CurrencyName,
      orderdetails.amount,
      orders.Adress as ship_adres,
      orderdetails.date_asked_for_return,
      orderdetails.Expected_delvery_date
       FROM orderdetails
      INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
      INNER JOIN items ON items.ItemID = orderdetails.ProductID
      INNER JOIN sellers ON sellers.SellerID = orderdetails.SallerID
      INNER JOIN currency ON currency.CurrencyID = items.CurrencyID
      WHERE sellers.SellerID = :SELLERID AND orderdetails.StatusOrder = :STATUSS
      GROUP BY orderdetails.orders_details_id
      ");
      $stmt -> bindParam(":STATUSS",$status,PDO::PARAM_INT);
      $stmt -> bindParam(":SELLERID",$sellerid,PDO::PARAM_INT);
    $stmt -> execute();
    $feth  =  $stmt -> fetchAll();
    return $feth;

  }


  function orders_for_client($clientid,$status){
    global $conn;
    $stmt = $conn ->prepare("SELECT
    items.ItemID as product_id,
    orders.RequestDate as requestorderdate,
      items.Name,
      orders.OrderID AS orderID,
      Items.Pic1,
      orderdetails.QTY,
      items.Price,
      currency.CurrencyName,
      orderdetails.amount,
      Orders.Adress,
      orderdetails.date_asked_for_return
       FROM orderdetails
      INNER JOIN Orders on orderdetails.OrderID = orders.OrderID
      INNER JOIN items ON items.ItemID = orderdetails.ProductID
      INNER JOIN sellers ON sellers.SellerID = items.MemberID
      INNER JOIN currency ON currency.CurrencyID = items.CurrencyID
      INNER JOIN clients ON clients.ClientID = clients.ClientID
      WHERE orders.ClientID = :CLIENTID AND orderdetails.StatusOrder = :STATUSS
      GROUP BY orderdetails.orders_details_id
      ");
      $stmt -> bindParam(":STATUSS",$status,PDO::PARAM_INT);
      $stmt -> bindParam(":CLIENTID",$clientid,PDO::PARAM_INT);
    $stmt -> execute();
    $feth  =  $stmt -> fetchAll();
    return $feth;

  }



  function count_orders_for_client($clientid,$status){
    global $conn;

      $stmt = $conn->prepare("SELECT orderdetails.orders_details_id FROM orderdetails
      INNER JOIN Orders ON orders.OrderID = orderdetails.OrderID
      WHERE Orders.ClientID =? AND StatusOrder =?");
    $stmt ->execute(array($clientid,$status));
    $count = $stmt ->rowCount();
    return $count;
    }


    function get_adress_by_order($adressid){
      global  $conn;
      $stmt = $conn->prepare("SELECT adress.*,adress.PlaceDescription AS placdesc,
      gouvernorate.GouvernoratName AS gouvername,
      cities.CityName AS cityname
       FROM adress
      INNER JOIN gouvernorate ON gouvernorate.GovernorateID = adress.Gouvernorate
      INNER JOIN cities ON cities.CityID  = adress.City
      WHERE adress.AdressID = ?
       ");
       $stmt ->execute(array($adressid));
       $fetc  = $stmt->fetchAll();
       return$fetc;
    }

    function get_recepient_by_order($nameid){
      global $conn;
      $stmt = $conn->prepare("SELECT * from names WHERE NameID = ?
      ");
      $stmt->execute(array($nameid));
      $fetch =  $stmt->fetchAll();
      return  $fetch;

    }



  function checkif_client_is_who_bought_order($order){
    global $conn;
    $sql = $conn->prepare("SELECT Orders.ClientID FROM orders WHERE OrderID = :ORDERID" );
    $sql->bindParam(":ORDERID",$order,PDO::PARAM_INT);
    $sql ->execute();
    $FETC = $sql->fetchAll();
    foreach($FETC as $value){
    return $value["ClientID"];
    }

  }


  function get_client_user_by_orderid($orderid){
   global $conn;
   $sql = $conn->prepare("SELECT Username FROM clients
   INNER JOIN orders ON orders.ClientID = clients.ClientID
   WHERE orders.OrderID =?"
);
$sql->execute(array($orderid));
$fetch = $sql->fetchAll();
foreach($fetch AS $VALUE){
  return $VALUE["Username"];

}

 }



 function client_full_name_by_order($orderid){
  global $conn;
  $sql = $conn->prepare("SELECT CONCAT(FirstName,' ',LastName) AS fullname FROM names
  INNER JOIN orders ON orders.RECEPIENT = names.NameID
  WHERE orders.OrderID =?"
);
$sql->execute(array($orderid));
$fetch = $sql->fetchAll();
foreach($fetch AS $VALUE){
 return $VALUE["fullname"];

}

}


function checkif_prudct_is_own_seller_order($productid){
  global $conn;
  $sql = $conn->prepare("SELECT SallerID FROM orderdetails WHERE ProductID = :productid" );
  $sql->bindParam(":productid",$productid,PDO::PARAM_INT);
  $sql ->execute();
  $FETC = $sql->fetchAll();
  foreach($FETC as $value){
  return $value["SallerID"];
  }

}

function get_chat_code($username){
  global $conn;
  $stmt = $conn->prepare("SELECT CodeChat from  clients WHERE Username = '".$username."' ");
  $stmt->execute();
  $fetc = $stmt->fetchAll();
  $code = "";
  foreach (  $fetc  as  $value) {
  $code = $value["CodeChat"];
  }
  return $code;
}

function get_serler_his_clientid($sellerid){

  global $conn;
  $STMT  = $conn->prepare("SELECT clients.ClientID FROM clients
  INNER JOIN sellers on sellers.ClientID  = Clients.ClientID WHERE sellers.SellerID = ?");
   $STMT->execute(array($sellerid));
   $fetc = $STMT->fetchAll();
   $id ='';
   foreach ($fetc as $value) {
  $id= $value["ClientID"];
   }
   return $id;
}


function  get_aprovable_seller($clientid){
global $conn;
$stmt = $conn->prepare("SELECT  sellers.Aprovable, clients.UserName  FROM sellers
  INNER JOIN clients ON clients.ClientID = sellers.ClientID
  WHERE clients.ClientID = :ClientID
   ");
$stmt->bindParam(":ClientID",$clientid,PDO::PARAM_INT);
$stmt->execute();
$fetc = $stmt->fetchAll();
foreach ($fetc as $value) {
return $value['Aprovable'];
}
}


function  get_business_location($clientid){
global $conn;
$stmt = $conn->prepare("SELECT BusinessLocation FROM sellers
  INNER JOIN clients ON clients.ClientID = sellers.ClientID
  WHERE clients.ClientID = :ClientID
   ");
$stmt->bindParam(":ClientID",$clientid,PDO::PARAM_INT);
$stmt->execute();
$fetc = $stmt->fetchAll();
return $fetc;
}



function checkimg_exixts($clientid){
  global $conn;
  $stmt = $conn->prepare("SELECT  Avatar FROM clients
    WHERE clients.ClientID = :ClientID");
  $stmt->bindParam(":ClientID",$clientid,PDO::PARAM_INT);
  $stmt->execute();
  $fetc = $stmt->fetchAll();
  $IMG ="";
  foreach ($fetc as $value) {
      $IMG = $value["Avatar"];
  }

  return $IMG;
}

function get_page_name($clientid){
  global $conn;
  $stmt = $conn->prepare("SELECT  PageName FROM client_page
    INNER JOIN clients ON clients.ClientID = client_page.ClientID
    WHERE client_page.ClientID = :ClientID");
  $stmt->bindParam(":ClientID",$clientid,PDO::PARAM_INT);
  $stmt->execute();
  $fetc = $stmt->fetchAll();
  $pagename ="";
  foreach ($fetc as $value) {
      $pagename = $value["PageName"];
  }

  return $pagename;
}

function page_description($clientid){
  global $conn;
  $stmt = $conn->prepare("SELECT  Description FROM client_page
    INNER JOIN clients ON clients.ClientID = client_page.ClientID
    WHERE client_page.ClientID = :ClientID");
  $stmt->bindParam(":ClientID",$clientid,PDO::PARAM_INT);
  $stmt->execute();
  $fetc = $stmt->fetchAll();
  $descri ="";
  foreach ($fetc as $value) {
      $descri = $value["Description"];
  }

  return $descri;
}

function get_all_tags(){
  global $conn;
  $stmt = $conn->prepare("SELECT TagName FROM tags");
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $result = array();
  foreach ($myfetch as  $value) {
    array_push($result,$value["TagName"]);
  }
  return $result;
}

function get_words_for_search(){
  global $conn;
  $stmt = $conn->prepare("SELECT Name FROM items");
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $result = get_all_tags();
  foreach ($myfetch as  $value) {
    array_push($result,$value["Name"]);

  }
//  array_push($result,get_words_for_search());
  return $result;
}


function get_all_category(){
  global $conn;
  $stmt = $conn->prepare("SELECT Name,CategoryID FROM categories");
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  return   $myfetch;
}

function get_all_brand(){
  global $conn;
  $stmt = $conn->prepare("SELECT BrandName,BrandID FROM brand");
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  return   $myfetch;
}

function count_bought_item($PRODUCTID){
  global $conn;
  $stmt = $conn->prepare("SELECT COUNT(orders_details_id)  FROM orderdetails WHERE ProductID = :PRODCUTID");
  $stmt->bindParam(":PRODCUTID",$PRODUCTID,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchColumn();
  return   $myfetch;
}


function get_exchange($currencyid){
  global $conn;
  $stmt = $conn->prepare("SELECT Cu_Value FROM exchange WHERE CurrencyID = :CURRECYID ");
  $stmt->bindParam(":CURRECYID",$currencyid,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $resul  = "";
  foreach ($myfetch as  $value) {
    $resul = $value["Cu_Value"];
  }
  return   $resul;
}


function check_if_saler_is_verificated($slaerid){
  global $conn;
  $stmt = $conn->prepare("SELECT Verificated FROM sellers WHERE SellerID = :SELLERID ");
  $stmt->bindParam(":SELLERID",$slaerid,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $resul  = "";
  foreach ($myfetch as  $value) {
    $resul = $value["Verificated"];
  }
  return   $resul;
}



function  get_best_products ($ngazidja = "5",$nduwani = "5",$mwali = "5",$frence = "5"){
  global $conn;
  $sql = "SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  categories.CategoryID as catid,
  categories.Name as catName,
  sellers.SellerID as sellerid,
  currency.CurrencyName as currencyname,
  sellers.Verificated,
  sellers.BestSeller,
  brand.BrandID as brandid,
  currency.CurrencyName as currencyname,
  items.CurrencyID AS curcyid
  FROM items
  LEFT JOIN brand ON items.BrandID = brand.BrandID
  INNER JOIN  sellers ON sellers.SellerID = items.MemberID
  LEFT JOIN categories ON categories.CategoryID = items.CategoryID
  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
  WHERE (sellers.Verificated = 'true' AND sellers.BestSeller = 'true') AND(items.ship_ngazidja = :SHIPNGAZDIJA OR items.ship_ndzouwani = :SHINDUWANI OR items.ship_mwali =:SHIPMALI OR items.ship_france = :SHIPFRANCE)
  and Status_Visible  != 2
  ORDER BY RAND()";

  $stm = $conn->prepare($sql);
  $stm->bindParam(":SHIPNGAZDIJA",$ngazidja,PDO::PARAM_INT);
  $stm->bindParam(":SHINDUWANI",$nduwani,PDO::PARAM_INT);
  $stm->bindParam(":SHIPMALI",$mwali,PDO::PARAM_INT);
  $stm->bindParam(":SHIPFRANCE",$frence,PDO::PARAM_INT);
  $stm->execute();
  $FETC = $stm->fetchAll();
  $resl ;
    if($stm->rowCount()>0){
      $resl = $FETC;
    }else {
      $resl  = 0;
    }
    return  $resl;

}


function  get_all_by_island_products ($ngazidja = "5",$nduwani = "5",$mwali = "5",$frence = "5"){
  global $conn;
  $sql = "SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  categories.CategoryID as catid,
  categories.Name as catName,
  sellers.SellerID as sellerid,
  currency.CurrencyName as currencyname,
  sellers.Verificated,
  sellers.BestSeller,
  brand.BrandID as brandid,
  currency.CurrencyName as currencyname,
  items.CurrencyID AS curcyid
  FROM items
  LEFT JOIN brand ON items.BrandID = brand.BrandID
  INNER JOIN  sellers ON sellers.SellerID = items.MemberID
  LEFT JOIN categories ON categories.CategoryID = items.CategoryID
  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
    WHERE  (items.ship_ngazidja = :SHIPNGAZDIJA OR items.ship_ndzouwani = :SHINDUWANI OR items.ship_mwali =:SHIPMALI OR items.ship_france = :SHIPFRANCE) and Status_Visible  != 2
  ORDER BY RAND() LIMIT 8 ";
  $stm = $conn->prepare($sql);
  $stm->bindParam(":SHIPNGAZDIJA",$ngazidja,PDO::PARAM_INT);
  $stm->bindParam(":SHINDUWANI",$nduwani,PDO::PARAM_INT);
  $stm->bindParam(":SHIPMALI",$mwali,PDO::PARAM_INT);
  $stm->bindParam(":SHIPFRANCE",$frence,PDO::PARAM_INT);
  $stm->execute();
  $FETC = $stm->fetchAll();
$resl ;
  if($stm->rowCount()>0){
    $resl = $FETC;
  }else {
    $resl  = 0;
  }
  return  $resl;
}


function get_curency_name($curencyid){
  global $conn;
  $stmt =  $conn->prepare("SELECT CurrencyName FROM currency WHERE CurrencyID = :CURRECYID");
  $stmt -> bindParam(":CURRECYID",$curencyid,PDO::PARAM_INT);
  $stmt->execute();
  $fetc = $stmt->fetchAll();
  $res;
  foreach ($fetc as  $value) {
   $res = $value["CurrencyName"];
  }
  return $res;
}


function  get_color_name($colroid){
  global $conn;
  $stmt = $conn->prepare("SELECT ColorName FROM colors WHERE ColorID = ".$colroid." ");
  $stmt ->execute();
  $fet = $stmt->fetchAll();
  $resu;
  foreach ($fet as $value) {
    $resu = $value["ColorName"];
  }
  return $resu;
}


function check_word_eixts($word){
  global $conn;
  $stmt = $conn->prepare("SELECT  Word  FROM serched_word WHERE Word = :WORD");
  $stmt->bindParam(":WORD",$word,PDO::PARAM_STR);
  $stmt ->execute();
  return   $stmt->rowCount();
}

function GET_WORD_ID_FOR_SEARCH($word){
  global $conn;
  $stmt = $conn->prepare("SELECT  ID  FROM serched_word WHERE Word = :WORD");
  $stmt->bindParam(":WORD",$word,PDO::PARAM_STR);
  $stmt ->execute();
  $fetch = $stmt->fetChAll();
  $RESULT ;
  foreach ($fetch as $value) {
    $RESULT = $value["ID"];
  }
  return $RESULT;

}


function get_curencies(){
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM currency");
  $stmt->execute();
$result = $stmt->fetChAll();
  return $result;
}

function get_PAYMENT_METHOD(){
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM payment_method");
  $stmt->execute();
$result = $stmt->fetChAll();
  return $result;
}


function get_ship_METHOD(){
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM shipping");
  $stmt->execute();
$result = $stmt->fetChAll();
  return $result;
}

function get_category_word_brabd_name_productsname($categor_name,$BRAND_NAME,$PRODUCTNAME){
$cat_serac_name         = "%".$categor_name."%";
$brand_serac_name       = "%".$BRAND_NAME."%";
$produncame_serac_name  = "%".$PRODUCTNAME."%";

  global $conn;
  $stmt = $conn->prepare("SELECT categories.Name,categories.CategoryID  FROM categories
    LEFT JOIN items On items.CategoryID  = categories.CategoryID
    LEFT JOIN brand on brand.CategoryID =  categories.CategoryID
    WHERE categories.Name like :categoryname or brand.BrandName like :brandname
    or items.Name like :productname
    GROUP BY categories.CategoryID");
    $stmt->bindParam(":categoryname",$cat_serac_name,PDO::PARAM_STR);
    $stmt->bindParam(":brandname",$brand_serac_name,PDO::PARAM_STR);
    $stmt->bindParam(":productname",$produncame_serac_name,PDO::PARAM_STR);

  $stmt->execute();
$result = $stmt->fetChAll();
  return $result;
}

function get_brand_by_word_categid($categorid,$Word){
$cat_id_          =   $categorid;
$brand_word       = "%".$Word."%";


  global $conn;
  $stmt = $conn->prepare("SELECT brand.BrandID,brand.BrandName  FROM brand
    LEFT JOIN categories On  categories.CategoryID =  categories.CategoryID
    WHERE (brand.BrandName like :brandname) or ( brand.CategoryID  IN(:categoryid))
    GROUP BY brand.BrandID
");
    $stmt->bindParam(":categoryid",$cat_id_,PDO::PARAM_STR);
    $stmt->bindParam(":brandname",$brand_word,PDO::PARAM_STR);


  $stmt->execute();
$result = $stmt->fetChAll();
  return $result;
}



function  get_all_prod_for_search($ngazidja = "5",$nduwani = "5",$mwali = "5",$frence = "5",$word,$brandid,$Categorid,$min__p_ran,$max_p_ran){
  global $conn;
  $word_serch = $word;
  $sql = "SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  categories.CategoryID as catid,
  categories.Name as catName,
  sellers.SellerID as sellerid,
  currency.CurrencyName as currencyname,
  sellers.Verificated,
  sellers.BestSeller,
  brand.BrandID as brandid,
  currency.CurrencyName as currencyname,
  items.Color AS color,
  items.CurrencyID AS curcyid
  FROM items
  LEFT JOIN brand ON items.BrandID = brand.BrandID
  INNER JOIN  sellers ON sellers.SellerID = items.MemberID
  LEFT JOIN categories ON categories.CategoryID = items.CategoryID
  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
  WHERE ( items.Name LIKE CONCAT('%',:PRODUCTNAME,'%') OR brand.BrandName  LIKE CONCAT('%',:PRODUCTNAME,'%') OR categories.Name LIKE CONCAT('%',:PRODUCTNAME,'%'))
   AND
  (items.ship_ngazidja = :SHIPNGAZDIJA OR items.ship_ndzouwani  = :SHINDUWANI OR items.ship_mwali = :SHIPMALI OR items.ship_france = :SHIPFRANCE)";
  if($brandid != "0"){
    $sql .= "AND items.BrandID IN(:BRANDIDS)";
  }
  if($Categorid != "0"){
    $sql .= "AND items.CategoryID IN(:CATEGORYIDS)";
  }
  $sql .= " AND items.Price BETWEEN :MIN_PRICE_RANGE AND :MAX_PRICE_RANGE
  ORDER BY RAND()";
  $stm = $conn->prepare($sql);
  $stm->bindParam(":SHIPNGAZDIJA",$ngazidja,PDO::PARAM_INT);
  $stm->bindParam(":SHINDUWANI",$nduwani,PDO::PARAM_INT);
  $stm->bindParam(":SHIPMALI",$mwali,PDO::PARAM_INT);
  $stm->bindParam(":SHIPFRANCE",$frence,PDO::PARAM_INT);
  $stm->bindParam(":PRODUCTNAME",$word_serch,PDO::PARAM_STR);
  if($brandid != "0"){
    $BRAND_FILTER = implode(",",$brandid);
   $stm->bindParam(":BRANDIDS",$BRAND_FILTER,PDO::PARAM_STR);
  }
  if($Categorid != "0"){
    $category_FILTER = implode(",",$Categorid);
   $stm->bindParam(":CATEGORYIDS",$category_FILTER,PDO::PARAM_STR);
  }
  $stm->bindParam(":MIN_PRICE_RANGE",$min__p_ran,PDO::PARAM_INT);
  $stm->bindParam(":MAX_PRICE_RANGE",$max_p_ran,PDO::PARAM_INT);
  $stm->execute();
  $FETC = $stm->fetchAll();

  return  $FETC;
}


function get_product_info_by_id($productid)
{
global $conn;
$stmt = $conn->prepare("SELECT Items.Name,Price,Items.Description,CountryMade,Status,Items.BrandID,Items.CategoryID,Pic1,Pic2,Pic3,
ship_ngazidja,ship_ndzouwani,ship_mwali,ship_france,
ship_ngazidja_price,ship_ndzouwani_price,ship_mwali_price,ship_france_price,
Estamited_Delivery_Ngzidja,Estamited_Delivery_Nduwani,Estamited_Delivery_Mwali,Estamited_Delivery_France,
Ship_Method_Ngazidja,Ship_Method_Ndzuwani,Ship_Method_Mwali,Ship_Method_France,


categories.Name as categoryna,
brand.BrandName as brandname,
currency.CurrencyName,
Items.CurrencyID,
ram.RamID,
ram.Rame_Value,
storage.Storage_Value,
storage.Storage_ID,
operating_system.OS_NAME,
operating_system.OS_ID,
camera_resolution.Resolution_Value,
camera_resolution.Resolution_ID,
sim_card_slot.SIM_Card_Slot_VALUE,
sim_card_slot.SIM_Card_Slot_ID,
cpu.CPUNAME,
Items.CPU,
gpu.GPU_NAME,
Items.GPU_ID,
ssd.SSD_VALUE,
Items.SSD_ID,
Items.Fixed_shipping_price_Ngazidja,
Items.Fixed_shipping_price_Ndzuwani,
Items.Fixed_shipping_price_Mwali,
Items.Fixed_shipping_price_France
FROM Items
LEFT JOIN categories ON categories.CategoryID = Items.CategoryID
LEFT JOIN brand ON brand.BrandID = Items.BrandID
LEFT JOIN currency on currency.CurrencyID =  Items.CurrencyID
LEFT JOIN ram ON ram.RamID = Items.MemoryRAM
LEFT JOIN storage ON  storage.Storage_ID  =  Items.MemoryStorage
LEFT JOIN operating_system ON  operating_system.OS_ID =  Items.Operating_System_ID
LEFT JOIN camera_resolution ON camera_resolution.Resolution_ID = Items.camera_resolution
LEFT JOIN sim_card_slot ON sim_card_slot.SIM_Card_Slot_ID   = Items.sim_id
LEFT JOIN cpu ON cpu.CpuID =  Items.CPU
LEFT JOIN gpu ON gpu.GPU_ID = Items.GPU_ID
LEFT JOIN ssd ON ssd.SSD_ID = Items.SSD_ID
WHERE ItemID = :PRODUCTID");
$stmt->bindParam(":PRODUCTID",$productid,PDO::PARAM_INT);
$stmt->execute();
return $stmt->fetchAll();
}

function getpayment_name($paymentid)
{
global $conn;
$stmt = $conn->prepare("SELECT payment_name FROM payment_method WHERE payment_id = :PAYMENID");
$stmt->bindParam(":PAYMENID",$paymentid,PDO::PARAM_INT);
$stmt->execute();
$myfetch = $stmt->fetchAll();
$resul ;
foreach ($myfetch as $value) {
  $resul = $value["payment_name"];
}
return $resul;
}


function getpayment_ship_name($ship_id)
{
global $conn;
$stmt = $conn->prepare("SELECT ShippingName FROM shipping WHERE ShippingID = :SHIPID");
$stmt->bindParam(":SHIPID",$ship_id,PDO::PARAM_INT);
$stmt->execute();
$myfetch = $stmt->fetchAll();
$resul ;
foreach ($myfetch as $value) {
  $resul = $value["ShippingName"];
}
return $resul;
}

function get_shipment_method_name($ship_id)
{
global $conn;
$stmt = $conn->prepare("SELECT ShippingName FROM shipping WHERE ShippingID = :SHIPID");
$stmt->bindParam(":SHIPID",$ship_id,PDO::PARAM_INT);
$stmt->execute();
$myfetch = $stmt->fetchAll();
$resul ;
foreach ($myfetch as $value) {
  $resul = $value["ShippingName"];
}
return $resul;
}


function get_products_payments($pructid,$place_ship)
{
global $conn;
$stmt = $conn->prepare("SELECT payemts_allow_detais.Payment_id,payment_method.payment_name FROM payemts_allow_detais
 INNER JOIN payment_method ON payment_method.payment_id = payemts_allow_detais.Payment_id
  WHERE payemts_allow_detais.ProductID = :PRODUCTID and  payemts_allow_detais.Place_Ship = :PLACESHIP");
$stmt->bindParam(":PRODUCTID",$pructid,PDO::PARAM_INT);
$stmt->bindParam(":PLACESHIP",$place_ship,PDO::PARAM_INT);
$stmt->execute();
$myfetch = $stmt->fetchAll();
return $myfetch;
}

function get_aal_products_payments_($pructid)
{
global $conn;
$stmt = $conn->prepare("SELECT payemts_allow_detais.Payment_id,payment_method.payment_name FROM payemts_allow_detais
 INNER JOIN payment_method ON payment_method.payment_id = payemts_allow_detais.Payment_id
  WHERE payemts_allow_detais.ProductID = :PRODUCTID ");
$stmt->bindParam(":PRODUCTID",$pructid,PDO::PARAM_INT);
$stmt->execute();
$myfetch = $stmt->fetchAll();
return $myfetch;
}




function get_all_shipp_for_pr($pructid)
{
global $conn;
$stmt = $conn->prepare("SELECT ship_ngazidja,ship_ndzouwani ,ship_mwali ,ship_france  FROM items
WHERE ItemID = :PRODUCTID ");
$stmt->bindParam(":PRODUCTID",$pructid,PDO::PARAM_INT);
$stmt->execute();
$myfetch = $stmt->fetchAll();
return $myfetch;
}


function check_order_code($ordee_id)
{
global $conn;
$stmt = $conn->prepare("SELECT 	Code_For_Self_Ship FROM orderdetails WHERE OrderID = :orderID");
$stmt->bindParam(":orderID",$ordee_id,PDO::PARAM_INT);
$stmt->execute();
$myfetch = $stmt->fetchAll();
return $myfetch;
}


function get_cance_prd_reason($order_d,$product_id)
{
global $conn;
$stmt = $conn->prepare("SELECT 	reason_for_returned_orders,Product_Img_For_Return FROM orderdetails
WHERE OrderID = :ORDER_ID  AND ProductID =:PRODUCTID" );
$stmt->bindParam(":ORDER_ID",$order_d,PDO::PARAM_INT);
$stmt->bindParam(":PRODUCTID",$product_id,PDO::PARAM_INT);
$stmt->execute();
$myfetch = $stmt->fetchAll();
return $myfetch;
}


function get_img_returned_product($order_d,$product_id)
{
global $conn;
$stmt = $conn->prepare("SELECT 	Product_Img_For_Return FROM orderdetails
WHERE OrderID = :ORDER_ID  AND ProductID =:PRODUCTID" );
$stmt->bindParam(":ORDER_ID",$order_d,PDO::PARAM_INT);
$stmt->bindParam(":PRODUCTID",$product_id,PDO::PARAM_INT);
$stmt->execute();
$RESULT ;
$myfetch = $stmt->fetchAll();
foreach ($myfetch as  $value) {
  $RESULT = $value["Product_Img_For_Return"];
}
return $RESULT;
}



function get_returned_order_code($order_d)
{
global $conn;
$stmt = $conn->prepare("SELECT 	Order_Returned_Code FROM orderdetails
WHERE OrderID = :ORDER_ID " );
$stmt->bindParam(":ORDER_ID",$order_d,PDO::PARAM_INT);
$stmt->execute();
$RESULT ;
$myfetch = $stmt->fetchAll();
foreach ($myfetch as  $value) {
  $RESULT = $value["Order_Returned_Code"];
}
return $RESULT;
}

function get_brand_by_cate($CATEGORYID){
  global $conn;
  $stmt = $conn->prepare("SELECT BrandName,BrandID FROM brand WHERE CategoryID = :CATEGORYID OR BrandID = 2 ORDER BY(BrandName)  ");
  $stmt->bindParam(":CATEGORYID",$CATEGORYID,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  return   $myfetch;
}


function check_if_brand_exits($brand_name,$category){
  global $conn;
  $stmt = $conn->prepare("SELECT BrandName FROM brand WHERE BrandName = :BRAND_NAME AND CategoryID = :CATEGORY ");
  $stmt->bindParam(":BRAND_NAME",$brand_name,PDO::PARAM_STR);
  $stmt->bindParam(":CATEGORY",$category,PDO::PARAM_STR);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $result = "";
  foreach ($myfetch as $value) {
  $result = $value["BrandName"];
  }
  return $result;
}

function check_if_category_exits($categryname){
  global $conn;
  $stmt = $conn->prepare("SELECT Name FROM categories WHERE Name = :CATEGORYNAME ");
  $stmt->bindParam(":CATEGORYNAME",$categryname,PDO::PARAM_STR);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $result ="" ;
  foreach ($myfetch as $value) {
  $result = $value["Name"];
  }
  return $result;
}
function GET_ALL__MEMORY_RAME(){
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM ram ");
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  return $myfetch;
}

function GET_MEMORY_RAME_FOR_MOBILE(){
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM ram WHERE Rame_Value <= 12  ");
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  return $myfetch;
}

function GET_MEMORY_SPACE_FOR_MOBILE(){
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM storage WHERE Storage_Value <= 500  ");
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  return $myfetch;
}


function GET_ALL_MEMORY_SPACE(){
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM storage  ");
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  return $myfetch;
}


function GET_OMOBILE_OPERATING_SYSTEM(){
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM Operating_System WHERE Device_ID =1");
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  return $myfetch;
}

function GE_COMPUTER__OPERATING_SYSTEM(){
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM Operating_System WHERE Device_ID =2");
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  return $myfetch;
}

function GET_OS_VERSION($OS_ID){
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM versions_os WHERE Operating_System_ID = :OS_ID ");
  $stmt->bindParam(":OS_ID",$OS_ID,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  return $myfetch;
}

function GET_ALL_SSD(){
  global $conn;
  $stmt = $conn->prepare("SELECT * FROM ssd ");
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  return $myfetch;
}

function get_img_1($produ_id){
  global $conn;
  $stmt = $conn->prepare("SELECT Pic1  FROM items WHERE ItemID = :ITEMID ");
  $stmt->bindParam(":ITEMID",$produ_id,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $RESULT ="";
  foreach ($myfetch as  $value) {
    $RESULT = $value["Pic1"];
  }
  return $RESULT;
}

function get_img_2($produ_id){
  global $conn;
  $stmt = $conn->prepare("SELECT Pic2  FROM items WHERE ItemID = :ITEMID ");
  $stmt->bindParam(":ITEMID",$produ_id,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $RESULT ="";
  foreach ($myfetch as  $value) {
    $RESULT = $value["Pic2"];
  }
  return $RESULT;
}

function get_img_3($produ_id){
  global $conn;
  $stmt = $conn->prepare("SELECT Pic3  FROM items WHERE ItemID = :ITEMID ");
  $stmt->bindParam(":ITEMID",$produ_id,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $RESULT ="";
  foreach ($myfetch as  $value) {
    $RESULT = $value["Pic3"];
  }
  return $RESULT;
}


function get_network($produ_id){
  global $conn;
  $stmt = $conn->prepare("SELECT Network_ID  FROM network_for_product WHERE Product_ID = :ITEMID ");
  $stmt->bindParam(":ITEMID",$produ_id,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $result = array();
  foreach ($myfetch as $value) {
    array_push($result,$value["Network_ID"]);

  }
   return $result ;
}


function get_payment_by_produc_and_place($produ_id,$Place_Ship){
  global $conn;
  $stmt = $conn->prepare("SELECT Payment_id  FROM payemts_allow_detais WHERE ProductID = :ITEMID AND Place_Ship = :PLACE_SHIP  AND Payment_id != 3");
  $stmt->bindParam(":ITEMID",$produ_id,PDO::PARAM_INT);
  $stmt->bindParam(":PLACE_SHIP",$Place_Ship,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $result = array();
  foreach ($myfetch as $value) {
    array_push($result,$value["Payment_id"]);

  }
   return $result ;
}

function get_product_name_by_id($produ_id){
  global $conn;
  $stmt = $conn->prepare("SELECT Name  FROM items WHERE ItemID = :ITEMID  ");
  $stmt->bindParam(":ITEMID",$produ_id,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $result ;
  foreach ($myfetch as $value) {
    $result = $value["Name"];

  }
   return $result ;
}


function get_name_by_id($clientid,$fullname){
  global $conn;
  $stmt = $conn->prepare("SELECT NameID    FROM names WHERE ClientID = :CLIENTID AND fullname = :fullName ");
  $stmt->bindParam(":CLIENTID",$clientid,PDO::PARAM_INT);
  $stmt->bindParam(":fullName",$fullname,PDO::PARAM_STR);
  $stmt -> execute();
  $result = $stmt->rowCount();
   return $result ;
}

function get_adress_name_by_id($clientid , $adress){
  global $conn;
  $stmt = $conn->prepare("SELECT AdressID     FROM adress WHERE ClientID = :CLIENTID AND PlaceDescription = :ADRESSS ");
  $stmt->bindParam(":CLIENTID",$clientid,PDO::PARAM_INT);
  $stmt->bindParam(":ADRESSS",$adress,PDO::PARAM_INT);
  $stmt -> execute();
  $result = $stmt->rowCount();
   return $result ;
}


function get_cpu($cpu_id){
  global $conn;
  $stmt = $conn->prepare("SELECT  CPUNAME   FROM cpu WHERE 	CpuID = :CPU_ID ");
  $stmt->bindParam(":CPU_ID",$cpu_id,PDO::PARAM_INT);
  $stmt -> execute();
  $result;
  foreach ($stmt->fetChAll() as  $value) {
  $result = $value["CPUNAME"];
  }
   return $result ;
}

function get_ram($RAM_ID){
  global $conn;
  $stmt = $conn->prepare("SELECT  Rame_Value   FROM ram WHERE 	RamID = :RAMID ");
  $stmt->bindParam(":RAMID",$RAM_ID,PDO::PARAM_INT);
  $stmt -> execute();
  $result;
  foreach ($stmt->fetChAll() as  $value) {
  $result = $value["Rame_Value"];
  }
   return $result ;
}

function get_resolution_img($Resolution_ID){
  global $conn;
  $stmt = $conn->prepare("SELECT  Resolution_Value   FROM camera_resolution WHERE 	Resolution_ID = :Resolution_ID ");
  $stmt->bindParam(":Resolution_ID",$Resolution_ID,PDO::PARAM_INT);
  $stmt -> execute();
  $result;
  foreach ($stmt->fetChAll() as  $value) {
  $result = $value["Resolution_Value"];
  }
   return $result ;
}


function get_network_names($connective_id){
  global $conn;
  $stmt = $conn->prepare("SELECT Conective_value  FROM network WHERE connective_id = :connective_id ");
  $stmt->bindParam(":connective_id",$connective_id,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $result = "";
  foreach ($myfetch as $value) {
    $result =  $value["Conective_value"];

  }
   return $result ;
}


function get_gpu_names($GPU_ID){
  global $conn;
  $stmt = $conn->prepare("SELECT 	GPU_NAME  FROM gpu WHERE GPU_ID = :GPU_ID ");
  $stmt->bindParam(":GPU_ID",$GPU_ID,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $result = "";
  foreach ($myfetch as $value) {
    $result =  $value["GPU_NAME"];

  }
   return $result ;
}

function get_storage($Storage_ID){
  global $conn;
  $stmt = $conn->prepare("SELECT 	Storage_Value  FROM storage WHERE Storage_ID = :Storage_ID ");
  $stmt->bindParam(":Storage_ID",$Storage_ID,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $result = "";
  foreach ($myfetch as $value) {
    $result =  $value["Storage_Value"];

  }
   return $result ;
}


function get_ssd($SSD_ID){
  global $conn;
  $stmt = $conn->prepare("SELECT 	SSD_VALUE  FROM ssd WHERE SSD_ID = :SSD_ID ");
  $stmt->bindParam(":SSD_ID",$SSD_ID,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $result = "";
  foreach ($myfetch as $value) {
    $result =  $value["SSD_VALUE"];

  }
   return $result ;
}

function get_sim__($SIM_Card_Slot_ID){
  global $conn;
  $stmt = $conn->prepare("SELECT 	SIM_Card_Slot_VALUE FROM sim_card_slot WHERE SIM_Card_Slot_ID = :SIM_Card_Slot_ID ");
  $stmt->bindParam(":SIM_Card_Slot_ID",$SIM_Card_Slot_ID,PDO::PARAM_INT);
  $stmt -> execute();
  $myfetch  = $stmt->fetchAll();
  $result = "";
  foreach ($myfetch as $value) {
    $result =  $value["SIM_Card_Slot_VALUE"];

  }
   return $result ;
}

function get_adress_for_client($client){
  global  $conn;
  $stmt = $conn->prepare("SELECT PlaceDescription
   FROM adress
   INNER JOIN clients ON clients.ClientID = adress.ClientID
   WHERE 	clients.Username = :CLIENT
   ");
   $stmt->bindParam(":CLIENT",$client,PDO::PARAM_STR);
   $stmt->execute();
   $fetc = $stmt->fetchAll();
   $res ="";
   foreach ($fetc as $value) {
     $res = $value["PlaceDescription"];
   }
   return $res;
}


function get_brand_id($brand_name){
  global  $conn;
  $stmt = $conn->prepare("SELECT BrandID FROM brand WHERE BrandName = :BRANDID
   ");
   $stmt->bindParam(":BRANDID",$brand_name,PDO::PARAM_STR);
   $stmt->execute();
   $fetc = $stmt->fetchAll();
   $res ="";
   foreach ($fetc as $value) {
     $res = $value["BrandID"];
   }
   return $res;
}

function get_resolutions(){
  global  $conn;
  $stmt =$conn->prepare("SELECT * FROM camera_resolution ORDER BY Resolution_Value ASC ");
  $stmt->execute();
  $fetch = $stmt->fetchAll();

   return $fetch;
}

function get_all_cart_sims(){
  global  $conn;
  $stmt_sim = $conn->prepare("SELECT * FROM SIM_Card_Slot ");
  $stmt_sim->execute();
  $fetch = $stmt_sim->fetchAll();
   return $fetch;
}

function get_all_network_for_mobile(){
  global  $conn;
  $stmt_sim = $conn->prepare("SELECT * FROM network WHERE Device_ID = 1 ");
  $stmt_sim->execute();
  $fetch = $stmt_sim->fetchAll();
   return $fetch;
}

function get_all_network_for_computer(){
  global  $conn;
  $stmt_sim = $conn->prepare("SELECT * FROM network WHERE Device_ID = 2 ");
  $stmt_sim->execute();
  $fetch = $stmt_sim->fetchAll();
   return $fetch;
}


function get_all_cpu(){
  global  $conn;
  $stmt_sim =$conn->prepare("SELECT cpu.* ,cpugenerations.generation as cpu_gene ,cpugenerations.description FROM cpu
    INNER JOIN cpugenerations ON  cpugenerations.id = cpu.generation
     WHERE Device_Type = 2 OR CpuID = 9999999 ");
  $stmt_sim->execute();
  $fetch = $stmt_sim->fetchAll();
   return $fetch;
}

function get_all_gpu(){
  global  $conn;
  $stmt_sim =$conn->prepare("SELECT * FROM gpu
    ORDER BY GPU_ID ASC");
  $stmt_sim->execute();
  $fetch = $stmt_sim->fetchAll();
   return $fetch;
}

function get_all_used_status_product(){
  global  $conn;
  $stmt_sim =$conn->prepare("SELECT Value_ST FROM used_status_product");
  $stmt_sim->execute();
  $fetch = $stmt_sim->fetchAll();
   return $fetch;
}

function get_ship_price_ngazidja($product_id){
  global  $conn;
  $stmt_sim =$conn->prepare("SELECT ship_ngazidja_price FROM items WHERE ItemID =:product_id");
  $stmt_sim->bindParam(":product_id",$product_id,PDO::PARAM_INT);
  $stmt_sim->execute();
  $fetch = $stmt_sim->fetchAll();
  $RESUL = "";
  foreach ($fetch as  $value) {
    $RESUL = $value["ship_ngazidja_price"];
  }
   return $RESUL;

}



function get_ship_price_NDZUWANI($product_id){
  global  $conn;
  $stmt_sim =$conn->prepare("SELECT ship_ndzouwani_price FROM items WHERE ItemID =:product_id");
  $stmt_sim->bindParam(":product_id",$product_id,PDO::PARAM_INT);
  $stmt_sim->execute();
  $fetch = $stmt_sim->fetchAll();
  $RESUL = "";
  foreach ($fetch as  $value) {
    $RESUL = $value["ship_ndzouwani_price"];
  }
   return $RESUL;

}

function get_ship_price_mwali($product_id){
  global  $conn;
  $stmt_sim =$conn->prepare("SELECT ship_mwali_price FROM items WHERE ItemID =:product_id");
  $stmt_sim->bindParam(":product_id",$product_id,PDO::PARAM_INT);
  $stmt_sim->execute();
  $fetch = $stmt_sim->fetchAll();
  $RESUL = "";
  foreach ($fetch as  $value) {
    $RESUL = $value["ship_mwali_price"];
  }
   return $RESUL;

}


function get_ship_price_france($product_id){
  global  $conn;
  $stmt_sim =$conn->prepare("SELECT ship_france_price FROM items WHERE ItemID =:product_id");
  $stmt_sim->bindParam(":product_id",$product_id,PDO::PARAM_INT);
  $stmt_sim->execute();
  $fetch = $stmt_sim->fetchAll();
  $RESUL = "";
  foreach ($fetch as  $value) {
    $RESUL = $value["ship_france_price"];
  }
   return $RESUL;
}

function get_ship_price_all_place($product_id){
  global  $conn;
  $stmt_sim =$conn->prepare("SELECT ship_ngazidja_price,ship_ndzouwani_price,ship_mwali_price,ship_france_price
    ,	Fixed_shipping_price_Ngazidja , Fixed_shipping_price_Ndzuwani,Fixed_shipping_price_Mwali,Fixed_shipping_price_France
      FROM items WHERE ItemID =:product_id");
  $stmt_sim->bindParam(":product_id",$product_id,PDO::PARAM_INT);
  $stmt_sim->execute();
  $fetch = $stmt_sim->fetchAll();


   return $fetch;
}

function check_if_client_has_item_in_cart($client_id,$product_id){
  global $conn;
  $stmt = $conn->prepare("SELECT  ClientID  from incart WHERE ClientID = :ClientID AND ProductID = :ProductID ");
  $stmt->bindParam(":ClientID",$client_id,PDO::PARAM_STR);
  $stmt->bindParam(":ProductID",$product_id,PDO::PARAM_STR);
  $stmt->execute();
  $rowcount = $stmt->rowCount();
  return $rowcount;
}



function get_order_details($ORDER_ID){
  global $conn;
    $stmt = $conn->prepare("SELECT items.Name,items.Price,orderdetails.QTY,orders.OrderID ,orderdetails.Shipr_Price,orderdetails.total_amount  FROM orderdetails
      left join orders on orders.OrderID =  orderdetails.OrderID
      left join items on items.ItemID = orderdetails.ProductID
      WHERE orderdetails.OrderID = :ORDER_ID");
   $stmt->bindParam(":ORDER_ID",$ORDER_ID,PDO::PARAM_INT);
   $stmt->execute();
   $fercf=  $stmt->fetchAll();
   return $fercf;
}


function deletet_item_in_cart($PRODUCT_ID){
  global $conn;
  $stmt = $conn->prepare("DELETE FROM   incart WHERE  ProductID = :ProductID");
  $stmt->bindParam(":ProductID",$PRODUCT_ID,PDO::PARAM_INT);
  $stmt->execute();
}

?>
