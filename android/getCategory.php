<?php
include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");
include("../admin/includes/languages/english.php");

if ($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['category'])) {

  class category{
    public $catID;
    public $catName;
    public $catDescription;
    public $catPicture;
  }
  $stmtcategories = $conn->prepare("SELECT * FROM categories");
  $stmtcategories->execute();
  $fetch = $stmtcategories->fetchAll();
  $array = array();
  foreach ($fetch as  $value) {
    $cate = new  category();
    $cate->catID                 = $value['CategoryID'];
    $cate->catName               = $value['Name'];
    $cate->catDescription        = $value['Description'];
    $cate->catPicture            =$value['Image'];
  $array [] = $cate;
  }
  echo json_encode(array('category' => $array ));
}   // END CATEGORIES

else if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['brand'])) { // GET BRANDS
  class brand{
    public $brandID;
    public $brandName;

  }

  $stmtcategories = $conn->prepare("SELECT * FROM brand");
  $stmtcategories->execute();
  $fetch = $stmtcategories->fetchAll();
  $array = array();
  foreach ($fetch as  $value) {
    $brand = new  brand();
    $brand->brandID                 = $value['BrandID'];
    $brand->brandName              = $value['BrandName'];

  $array [] = $brand;
  }
  echo json_encode(array('brand' => $array ));

}  // END GET BRANDS

else if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['brandid']) &&  isset($_GET["currency"]) )  { // GET BRANDS PRODUCTS
  class product{
  public $id;
  public $name;
  public $description;
  public $price;
  public $currency;
  public $category;
  public $registreddate;
  public $rating;
  public $countrymade;
  public $status;
  public $saller;
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
  public $offer;
  public $tags;
  public $verificated;
  public $count_bought;
  public $BestSeller;

  }

  $sql = "SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  brand.BrandID as brandid,
  categories.CategoryID as catid,
  categories.Name as catName,
  sellers.SellerID as userId,
  currency.CurrencyName as currencyname,

  sellers.Verificated,
  sellers.BestSeller,
  items.CurrencyID as curcyid
  FROM items
  INNER JOIN brand ON items.BrandID = brand.BrandID
  INNER JOIN  sellers ON sellers.SellerID = items.MemberID
  INNER JOIN categories ON categories.CategoryID = items.CategoryID
  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID

   WHERE brand.BrandID = ? ORDER BY RAND()";
  $stm = $conn->prepare($sql);
  $stm->execute(array($_GET['brandid']));
  $fetch = $stm->fetchAll();
  $ARR = array();
  foreach ($fetch as $value) {
    $myobj = new product();
    $myobj ->id = $value['ItemID'];
    $myobj ->name = $value['Name'];
    $myobj->description = $value['Description'];
    $myobj->price = $value['Price'];
    $myobj->currency=$value['currencyname'];
    $myobj->registreddate=$value['AddDate'];
    $myobj->rating=$value['Rating'];
    $myobj->status=$value['Status'];
    $myobj->country=$value['CountryMade'];
    $myobj->category=$value['CategoryID'];
    $myobj->brandid=$value['brandid'];
    $myobj->brandname=$value['brandname'];
    $myobj->pic1=$value['Pic1'];
    $myobj->pic2=$value['Pic2'];
    $myobj->pic3=$value['Pic3'];
    $myobj->offer=$value['Offer'];
    $myobj->tags=$value['Tags'];
    $myobj->saller=$value['MemberID'];
    $myobj->verificated = $value['Verificated'];
    $myobj->BestSeller = $value['BestSeller'];
    $myobj->count_bought = count_bought_item($value['ItemID']);

    if($_GET["currency"] ==  $value["curcyid"]){
        $myobj->price = $value['Price'];
    }else{
      $myobj->price =   $value['Price']*get_exchange($_GET["currency"]);
    }

    $ARR[] = $myobj;

  }

  echo json_encode(array("item"=>$ARR));

}  // GET PRODUCTS BY BRAND

else if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['category__id']) && isset($_GET['currency']) ) { // GET CATEGORY PRODUCTS
  class product{
  public $id;
  public $name;
  public $description;
  public $price;
  public $currency;
  public $category;
  public $registreddate;
  public $rating;
  public $countrymade;
  public $status;
  public $saller;
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
  public $offer;
  public $tags;
  public $verificated;
  public $count_bought;
  public $BestSeller;
  public $categoryname;

  }

  $sql = "SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  brand.BrandID as brandid,
  categories.CategoryID as catid,
  categories.Name as catName,
  sellers.SellerID as userId,
  currency.CurrencyName as currencyname,
  sellers.Verificated,
  sellers.BestSeller,
  items.CurrencyID as curcyid
  FROM items
  INNER JOIN brand ON items.BrandID = brand.BrandID
  INNER JOIN  sellers ON sellers.SellerID = items.MemberID
  INNER JOIN categories ON categories.CategoryID = items.CategoryID
  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID

   WHERE  categories.CategoryID = ? ORDER BY RAND()";
  $stm = $conn->prepare($sql);
  $stm->execute(array($_GET['category__id']));
  $fetch = $stm->fetchAll();
  $ARR = array();
  foreach ($fetch as $value) {
    $myobj = new product();
    $myobj ->id = $value['ItemID'];
    $myobj ->name = $value['Name'];
    $myobj->description = $value['Description'];
    $myobj->price = $value['Price'];
    $myobj->currency=$value['currencyname'];
    $myobj->registreddate=$value['AddDate'];
    $myobj->rating=$value['Rating'];
    $myobj->status=$value['Status'];
    $myobj->country=$value['CountryMade'];
    $myobj->category=$value['CategoryID'];
    $myobj->brandid=$value['brandid'];
    $myobj->brandname=$value['brandname'];

    $myobj->pic1=$value['Pic1'];
    $myobj->pic2=$value['Pic2'];
    $myobj->pic3=$value['Pic3'];
    $myobj->offer=$value['Offer'];
    $myobj->tags=$value['Tags'];
    $myobj->saller=$value['MemberID'];
    $myobj->verificated = $value['Verificated'];
    $myobj->BestSeller = $value['BestSeller'];
    $myobj->categoryname  =  $value['catName'];
    $myobj->count_bought = count_bought_item($value['ItemID']);

    if($_GET["currency"] ==  $value["curcyid"]){
        $myobj->price = $value['Price'];
    }else{
      $myobj->price =   $value['Price']*get_exchange($_GET["currency"]);
    }

    $ARR[] = $myobj;

  }

  echo json_encode(array("item"=>$ARR));

}  // GET PRODUCTS BY CATEGOTY

// GET PRODUCT BY PRODUCTID
else if( isset($_GET['ProductID']) && isset($_GET["currency"]) ) { // GET BRANDS PRODUCTS
  $MYPRUCT_ID = $_GET['ProductID'];
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
  public $verificated;
  public $count_bought;
  public $payments_method_ngazidja;
  public $payments_method_ndzuwani;
  public $payments_method_mwali;
  public $payments_method_france;

  public $ship_method_ngazidja;
  public $ship_method_ndzuwani;
  public $ship_method_mwali;
  public $ship_method_france;


  }
  class ReadMore{
    public $name;
    public $brandname;
    public $island;
    public $ram;

  }



  $sql = "SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  brand.BrandID as brandid,
  categories.CategoryID as catid,
  categories.Name as catName,
  clients.Username as sellername,
  sellers.SellerID as sellerid,
  items.Color AS color,
  ram.Rame_Value AS ramename,
  ram.RamID AS ramid,
  sellers.Verificated,
  sellers.BestSeller,
  Ship_Method_Ngazidja,
  Ship_Method_Ndzuwani,
  Ship_Method_Mwali,
  Ship_Method_France,
  items.CurrencyID AS curcyid,
  storage.Storage_Value,

  cpu.CPUNAME,
  gpu.GPU_NAME,
  operating_system.OS_NAME,
  ssd.SSD_VALUE,
  camera_resolution.Resolution_Value,
  sim_card_slot.SIM_Card_Slot_VALUE

  FROM items
  LEFT JOIN brand ON items.BrandID = brand.BrandID
  LEFT JOIN  sellers ON sellers.SellerID = items.MemberID
  LEFT JOIN  clients ON clients.ClientID = sellers.ClientID
  LEFT JOIN categories ON categories.CategoryID = items.CategoryID
  LEFT JOIN currency ON items.CurrencyID = currency.CurrencyID
  Left JOIN ram ON ram.RamID = items.MemoryRAM
  Left JOIN storage ON storage.Storage_ID = items.MemoryStorage
  Left JOIN cpu ON cpu.CpuID = items.CPU
  Left JOIN gpu ON gpu.GPU_ID = items.GPU_ID
  Left JOIN operating_system ON operating_system.OS_ID = items.Operating_System_ID
  Left JOIN ssd ON ssd.SSD_ID = items.SSD_ID
  Left JOIN camera_resolution ON camera_resolution.Resolution_ID = items.camera_resolution
  Left JOIN sim_card_slot ON sim_card_slot.SIM_Card_Slot_ID = items.sim_id






  WHERE items.ItemID = ?
   ";
  $stm = $conn->prepare($sql);
  $stm->execute(array($_GET['ProductID']));
  $fetch = $stm->fetchAll();
  $ARR = array();
  $readarray = array();
  foreach ($fetch as $value) {
    $myobj = new product();
    $myobj ->id = $value['ItemID'];
    $myobj ->name = $value['Name'];
    $myobj->description = $value['Description'];

    if($_GET["currency"] ==  $value["curcyid"]){
        $myobj->price = $value['Price'];
    }else{
      $myobj->price =   $value['Price']*get_exchange($_GET["currency"]);
    }


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
    $myobj->sallerName=$value['sellername'];
    $myobj->ram  =$value['ramename'];
    $myobj->ramid  =$value['ramid'];
    $myobj->verificated = $value['Verificated'];
    $myobj->BestSeller = $value['BestSeller'];
    $myobj->count_bought = count_bought_item($value['ItemID']);

    $myobj->payments_method_ngazidja = get_products_payments($MYPRUCT_ID,1);
    $myobj->payments_method_ndzuwani = get_products_payments($MYPRUCT_ID,2);
    $myobj->payments_method_mwali    = get_products_payments($MYPRUCT_ID,3);
    $myobj->payments_method_france    = get_products_payments($MYPRUCT_ID,4);

   if(!empty($value["Ship_Method_Ngazidja"])){
    $myobj->ship_method_ngazidja = getpayment_ship_name($value["Ship_Method_Ngazidja"]);
  }

  if(!empty($value["Ship_Method_Ndzuwani"])){
      $myobj->ship_method_ndzuwani = getpayment_ship_name($value["Ship_Method_Ndzuwani"]);
  }
 if(!empty($value["Ship_Method_Mwali"])){
    $myobj->ship_method_mwali    = getpayment_ship_name($value["Ship_Method_Mwali"]);
 }
if(!empty($value["Ship_Method_France"])){
      $myobj->ship_method_france   = getpayment_ship_name($value["Ship_Method_France"]);
}







   //$myobj->payments_methods = get_aal_products_payments_($MYPRUCT_ID);
    $ARR[] = $myobj;
    //  Specification
    $read_mo_obj = new ReadMore();
    $read_mo_obj->name = $value['Name'];
    $read_mo_obj->brandname=$value['brandname'];


    if (!empty($value['OS_NAME'])) {
        $read_mo_obj->OP  = $value['OS_NAME'];
    }


        if (!empty($value['ramename'] )) {
          if ($value['ramename'] > 1) {
            $read_mo_obj->Ram  =$value['ramename'].lang("gb");
          }else{
            $read_mo_obj->Ram  =$value['ramename'].lang("mb");
          }
        }

    if (!empty($value['Storage_Value'])) {

      if ($value['Storage_Value'] > 1) {
        $read_mo_obj->HDD  = $value['Storage_Value'].lang("gb");
      }else{
        $read_mo_obj->HDD  = $value['Storage_Value'].lang("mb");
      }
    }

    if (!empty($value['CPUNAME'])) {
        $read_mo_obj->Processeur  = $value['CPUNAME'];
    }

    if (!empty($value['GPU_NAME'])) {
        $read_mo_obj->GPU  = $value['GPU_NAME'];
    }




    if (!empty($value['SSD_VALUE'])) {

      if ($value['SSD_VALUE'] > 1) {
        $read_mo_obj->SSD  = $value['SSD_VALUE'];
      }else{
        $read_mo_obj->SSD  = $value['SSD_VALUE'];
      }
    }


    if (!empty($value['Resolution_Value'])) {
        $read_mo_obj->Resolution  = $value['Resolution_Value'];
    }

    if (!empty($value['SIM_Card_Slot_VALUE'])) {
        $read_mo_obj->SIM  = $value['SIM_Card_Slot_VALUE'];

    }

     $net_nME = "";
    $netwo = get_network($_GET['ProductID']);
    foreach ($netwo as $value2) {
      $net_nME .= get_network_names($value2)." , ";
    }

    $read_mo_obj->nerwork  = $net_nME;








    //$read_mo_obj->ram  =$value['ramename'];
    $readarray[] =$read_mo_obj;

  }

  class comments{
    public $comment;
    public $commentid;
    public $clientid;
    public $itemtid;
    public $commentdate;
    public $clientusername;
    public $ratting;

  }

  $sql = $conn->prepare("SELECT
    comments.Comment_ID  AS commentsid,
    comments.Comment  AS comment,
    comments.CommentDate  AS commentdate,
    comments.ClientID  AS clientid,
    comments.ItemID  AS itemid,
    comments.Rating  AS rating,
    clients.Username AS username
    FROM comments
    INNER  JOIN clients ON clients.ClientID = comments.ClientID
    INNER JOIN items ON items.ItemID = comments.ItemID
    WHERE comments.ItemID=?
     ");
    $sql->execute(array($_GET['ProductID']));
    $comfetc = $sql->fetchAll();
    $commtarray= array();
foreach ($comfetc as  $value) {
  // END Specification
  $commtobj = new comments();
  $commtobj->commentid = $value['commentsid'];
  $commtobj->comment = $value['comment'];
  $commtobj->clientid = $value['clientid'];
  $commtobj->itemtid = $value['itemid'];
  $commtobj->commentdate = $value['commentdate'];
  $commtobj->clientusername = $value['username'];
  $commtobj->ratting = $value['rating'];
  $commtarray []= $commtobj;

}




  echo json_encode(array(
    "item"        =>$ARR,
    "ReadMore" =>$readarray,
    "comments" => $commtarray
));

}

else if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['ColorID'])) { // GET BRANDS PRODUCTS
  class color{
    public $colorCode;
    public $colorName;
    public $coloid;
  }

  $stmt = $conn->prepare("SELECT * FROM colors WHERE 	ColorID = ?");
  $stmt ->execute(array($_GET['ColorID']));

  $fetch =   $stmt->fetchAll();
  $array = array();
  foreach ($fetch as  $value) {
    $mycolor = new color();
    $mycolor->colorCode = $value['ColorCode'];
    $mycolor->colorName = $value['ColorName'];
    $mycolor->coloid    = $value['ColorID'];
     $array [] = $mycolor;
  }
  echo json_encode(array("color"=>$array));
}  // END FETCH COLORS

//  CHECIK USER
else if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['check_client']) && isset($_POST['password']) && isset($_POST['username'])) { // GET BRANDS PRODUCTS
  class  check{
  public  $username;
  public  $email;
  public  $clientid;
  }
  $stmt = $conn->prepare("SELECT Username,Email,ClientID FROM Clients WHERE Username = ? AND Password= ?");
  $stmt ->execute(array($_POST['username'],$_POST['password']));
  $rowcount = $stmt->rowCount();
   $arr = array();
 $result = $stmt->fetchAll();
  if ($rowcount > 0) {
  foreach ($result AS $value) {
    $chek = new check();
    $chek->username = $value["Username"];
    $chek->email = $value["Email"];
    $chek->clientid = $value["ClientID"];

    $arr[]= $chek;
  }
}
  echo json_encode(array("result" => $arr));
}

if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['IMAGE']) && isset($_POST['username']) && isset($_POST['insert'])) {
  date_default_timezone_set("Africa/Cairo");
   $date1 = str_replace("/","",date("y/m/d:h:i:sa"));
  $date = str_replace(":","",$date1);
   $rand = rand(500,50000);
   $resultname = $rand.$date;
   $decodingimg = base64_decode($_POST['IMAGE']."JPG");
   $imgname = $resultname;

if (!file_exists("../theme/image/userImg/".$_POST['username'])) {
mkdir("../theme/image/userImg/".$_POST['username']);}

//file_put_contents("../theme/image/userImage/".$_POST['username']."/".$imgname.".JPG",$decodingimg);
  $MYPATHPIC = "../theme/image/userImg/".$_POST['username']."/".$imgname.".JPG";
  file_put_contents($MYPATHPIC,$decodingimg);

$imgfordatabse = substr($MYPATHPIC, 3);
$sql = $conn->prepare("UPDATE clients SET Avatar = :AVATAR WHERE Username = :USERNAME");
$sql->bindParam(":AVATAR",$imgfordatabse,PDO::PARAM_STR,255);
 $sql ->bindParam(":USERNAME",$_POST['username'],PDO::PARAM_STR,255);
$sql->execute();

}

if ($_SERVER["REQUEST_METHOD"]=="POST" &&  isset($_POST['username']) && isset($_POST['client']) ) {
  class Client{
   public $username;
    public $image;
    public $email;
  }

$sql = $conn->prepare("SELECT * FROM clients WHERE Username = :USERNAME");
 $sql ->bindParam(":USERNAME",$_POST['username'],PDO::PARAM_STR,255);
$sql->execute();
$FETCH = $sql->fetchAll();
$MYPATHPIC = array();
foreach ($FETCH AS $VALUE) {
  $myobj = new  Client();
  $myobj->username = $VALUE['Username'];
  $myobj->email = $VALUE['Email'];
  $myobj->image = $VALUE['Avatar'];
 $MYPATHPIC [] =  $myobj;
}
echo json_encode(array("client"=>$MYPATHPIC));
}

 ?>
