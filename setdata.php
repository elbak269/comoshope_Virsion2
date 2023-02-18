<?php
session_start();
include("admin/connect.php");
include("admin/includes/languages/english.php");
$functions = "admin/includes/functions/";
include($functions."functions.php");
//adress
$placedesc = null;
if (isset($_SESSION['user'])) {
if (!empty($_POST['placeDescripyion'])) {
  $placedesc = $_POST['placeDescripyion'];
}
           // ADD ADDRESS
if (isset($_POST['Gouvernorate']) && isset($_POST['City']) && isset($_POST['client']) && isset($_POST['placeDescripyion'])) {  // ADD ADDRESS
  if (!empty($_POST['Gouvernorate'])  && !empty($_POST['City']) && !empty($_POST['client']) && !empty($_POST['placeDescripyion']) ) {
    if (is_numeric($_POST['Gouvernorate']) && is_numeric($_POST['City']) && is_numeric($_POST['client']) && is_string($_POST['placeDescripyion'])) {

      $stmt = $conn->prepare("INSERT INTO adress (Gouvernorate,City,ClientID,PlaceDescription) VALUES(:GOUVERNORATE,:CITY,:CLIENTID,:PLACEDESCRIPTION) ");
      $stmt->bindParam(":GOUVERNORATE",$_POST['Gouvernorate'],PDO::PARAM_INT);
      $stmt->bindParam(":CITY",$_POST['City'],PDO::PARAM_INT);
      $stmt->bindParam(":CLIENTID",$_POST['client'],PDO::PARAM_INT);
      $stmt->bindParam(":PLACEDESCRIPTION",$_POST['placeDescripyion'],PDO::PARAM_STR,255);
      $stmt ->execute();

    }
}
}  // END ADD ADDRESS


// REQUEST ORDER

else if (isset($_SESSION["user"])  && isset($_GET['requestorder']) && isset($_GET['clientid']) && isset($_GET['Nombre_ofitem']) && isset($_GET['itemid']) &&
isset($_GET['order_address'])  && isset($_GET['promocode'])  && isset($_GET['recep_name'])) {

$DISCOUNT;
if($_GET['promocode'] !="" || $_GET['promocode'] != null){
  $PROMOVALUE  = promo_value($_GET['promocode']);
  foreach ($PROMOVALUE as $value) {
    $DISCOUNT = $value["Discount"];
  }
}else{
  $DISCOUNT = null;
}





$price ;
$seleerid;
$currencyid;
$productinfo =  PROCUT_INFO_ORDER($_GET['itemid']);
foreach ($productinfo as  $value) {
  $price = $value["Price"];
  $seleerid = $value["MemberID"];
  $currencyid = $value["CurrencyID"];
}

$amount = $price * $_GET['Nombre_ofitem'];
$totatl_order = ($price - $DISCOUNT)*$_GET['Nombre_ofitem'];

$promocode;
if (!empty($_GET['promocode'])) {
$promocode = intval($_GET['promocode']);
}else {
$promocode  = NULL;
}

$dat = str_replace(array(":","/","\\",","," "),"",date("d,m,y h:i:s"));
$rad = RAND(1,999);
$clientid =str_replace(" ","",$_GET['clientid']);
$orderidto= $dat+$rad+$dat;
$ORDERID= $orderidto;


$stm = $conn ->prepare("INSERT INTO orders (OrderID,TotalOrder,SellerID,RequestDate,ClientID,NumberOfItem,Currency,Adress,RECEPIENT)
 VALUES(:ORDERID,:TOTALORDER,:SELLERID,NOW(),:CLIENTID,:NUMBEROFITEM,:CURRENCY,:ADRESS,:RECEPIENT_NAM)");
$stm->execute(array(
":ORDERID"                =>  $ORDERID,
":TOTALORDER"              => $totatl_order,
":SELLERID"                => $seleerid,
":CLIENTID"                => $_GET['clientid'],
":NUMBEROFITEM"            => $_GET['Nombre_ofitem'],
":CURRENCY"                => $currencyid,
":ADRESS"                  => $_GET['order_address'],
":RECEPIENT_NAM"          => $_GET['recep_name']
));
$row = $stm->rowCount();
if ($row > 0) {

  //$totalorder = intval($_GET['totalorder']);
  $SQLORDERDETAIL = $conn->prepare("INSERT INTO orderdetails (QTY,OrderID,ProductID,amount,total_amount,PromoCode,Discount,StatusOrder) VALUES (:qty,:ORDERID,:PRODUCTID,:AMOUNT,:TOTAL_AMOUNT,:PROMOCODE,:DISCOUNT,1)");
  $SQLORDERDETAIL ->bindParam(":qty",$_GET['Nombre_ofitem'],PDO::PARAM_INT);
  $SQLORDERDETAIL ->bindParam(":ORDERID", $ORDERID,PDO::PARAM_INT);
  $SQLORDERDETAIL ->bindParam(":PRODUCTID",$_GET['itemid'],PDO::PARAM_INT);
  $SQLORDERDETAIL ->bindParam(":AMOUNT",$amount,PDO::PARAM_STR);
  $SQLORDERDETAIL ->bindParam(":TOTAL_AMOUNT",$totatl_order,PDO::PARAM_STR);
  $SQLORDERDETAIL ->bindParam(":PROMOCODE",$promocode,PDO::PARAM_STR);
  $SQLORDERDETAIL ->bindParam(":DISCOUNT",$DISCOUNT,PDO::PARAM_STR);
  $SQLORDERDETAIL ->execute();
  if($SQLORDERDETAIL->rowCount() >0){
      echo json_encode(1);

  }else{
      echo json_encode(0);
  }

//  echo json_encode(1);
/*echo '<div class="alert alert-success text-center" role="alert">
  '.lang("successfulPreogress").'
</div>';*/
}
else {
  echo json_encode(0);
  /*echo '<div class="alert alert-danger text-center" role="alert">
  '.lang("failedProgress").'
</div>';*/
}
exit();
} // REQUEST ORDER
else if  (isset($_POST['update']) && isset($_POST['order']) && isset($_POST["expected_deli_date"]) && isset($_POST["productid"]) && isset($_POST["ship_meht_"])) {
  if ($_POST["ship_meht_"] =! 3) {
    if (isset($_POST["truck_num"])) {
      $stm_orders = $conn->prepare("UPDATE orders SET Track_Number = :TRUCKINGNUMBER WHERE OrderID = :ORDERID");
      $stm_orders->bindParam(":TRUCKINGNUMBER",$_POST["truck_num"],PDO::PARAM_STR);
      $stm_orders->bindParam(":ORDERID",$_POST['order'],PDO::PARAM_INT);
      $stm_orders->execute();

      $stmt = $conn->prepare("UPDATE orderdetails SET StatusOrder = 2 , Expected_delvery_date = :EXPECTEDDATE ,   WHERE OrderID= :ORDERID AND ProductID = :PRODUCTID");
    }
  }else{


      $stmt = $conn->prepare("UPDATE orderdetails SET StatusOrder = 2 , Expected_delvery_date = :EXPECTEDDATE  WHERE OrderID= :ORDERID AND ProductID = :PRODUCTID");
  }
$stmt = $conn->prepare("UPDATE orderdetails SET StatusOrder = 2 , Expected_delvery_date = :EXPECTEDDATE  WHERE OrderID= :ORDERID AND ProductID = :PRODUCTID");
$stmt ->bindParam(":EXPECTEDDATE",$_POST["expected_deli_date"],PDO::PARAM_STR);
$stmt ->bindParam(":PRODUCTID",$_POST["productid"],PDO::PARAM_INT);
$stmt ->bindParam(":ORDERID",$_POST['order'],PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->rowCount();
if ($row>0) {
  echo json_encode("yes");
}
else {
  echo json_encode("no");
}
}

else if (isset($_POST['incart']) && isset($_POST['product']) && isset($_POST['island']) && isset($_POST['client'])) { // GET PRODUCTS FOR INCART
  class products{
    public $qty;
    public $product;
    public $seller;
    public $client;
    public $myimg;
  }
  $clientid_session = getclientID($_SESSION["user"]);
    $stm = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
      brand.BrandName as brandname,
      categories.CategoryID as catid,
      categories.Name as catName,
      sellers.StoreName ,
      sellers.SellerID as userId,
      currency.CurrencyName as currencyname,
      shipping.ShippingName,
      promo.Discount  AS DiscountPrice,
      incart.QTY  as qty
      FROM items
      LEFT JOIN brand ON items.BrandID = brand.BrandID
      LEFT JOIN  sellers ON sellers.SellerID = items.MemberID
      LEFT JOIN categories ON categories.CategoryID = items.CategoryID
      LEFT JOIN currency ON items.CurrencyID = currency.CurrencyID
      LEFT JOIN shipping ON shipping.ShippingID = items.ShippingID
      LEFT JOIN promo ON items.Discount = promo.PromoID
      INNER JOIN incart ON incart.ProductID=items.ItemID
      INNER JOIN clients ON incart.ClientID=clients.ClientID
      WHERE clients.ClientID = :CLIENTID AND IslandID = :ISLNAD");
      $stm->bindParam(":CLIENTID",$_POST['client'],PDO::PARAM_INT);
      $stm->bindParam(":ISLNAD",$_POST['island'],PDO::PARAM_INT);

      $stm->execute();
      $fetch = $stm->fetchAll();
      $myarra = array();
      foreach ($fetch as $value) {
        $myobj = new products();
        $myobj->qty= $value['qty'];
        $myobj->product = $value['Name'];
        $myobj->seller = $value['StoreName'];
        $myobj->myimg = $value['Pic1'];
        $myarra [] =$myobj;


      }
      echo json_encode(array('incart' => $myarra));
}  // END GET PRODUCTS FOR INCART

else if (isset($_POST['getcountincart']) && isset($_POST['clid'])) { // GET INCART COUNT
  echo json_encode(prudctsinyourcart($_POST['clid']));
} // END GET INCART COUNT


// GET ADRESSS

 else if (isset($_POST['clientid']) &&  isset($_POST['get_adres']) && isset($_POST['showaddress']) && isset($_POST["product"]) ) { // GET ADRESSS
  $stmtadres = $conn->prepare("SELECT PlaceDescription ,AdressID FROM  adress
    INNER JOIN clients ON clients.ClientID = adress.ClientID
    WHERE clients.ClientID = :CLINDID  ORDER BY AdressID DESC LIMIT 2
     ");
     $stmtadres ->bindParam(":CLINDID",$_POST['clientid'],PDO::PARAM_INT);
     $stmtadres -> execute();
     $fetc_stm6  = $stmtadres->fetchAll();


     $STM_PLAC = $conn->prepare("SELECT ship_ngazidja,ship_ndzouwani,ship_mwali,ship_france FROM items WHERE ItemID = :ITMID");
     $STM_PLAC ->bindParam(":ITMID",$_POST['product'],PDO::PARAM_INT);
     $STM_PLAC->execute();
     $plc_fetch = $STM_PLAC->fetChAll();
     foreach ($plc_fetch as  $value_pl) {

     ?>

     <div id="div_pace_ship" class="form-group">
    <label for="place_shi___"><?php echo lang("choice_adress"); ?></label>
    <select class="form-control" id="place_shi___">
      <?php if ($value_pl["ship_ngazidja"] == "1") {
        ?>
          <option value="1"><?php echo lang("ngazidja"); ?></option>
        <?php
      }
      if ($value_pl["ship_ndzouwani"] == "1") {
        ?>
      <?php /* ?>  <option value="2"><?php echo lang("ndzuwani"); ?></option> <?php */ ?>
        <?php
      }

       ?>

       <?php

     if ($value_pl["ship_mwali"] == "1") {
       ?>
    <?php /* ?>   <option value="3"><?php echo lang("mwali"); ?></option> <?php */ ?>
       <?php
     }

      ?>

      <?php

    if ($value_pl["ship_france"] == "1") {
      ?>
        <option value="4"><?php echo lang("france"); ?></option>
      <?php

  }

     ?>






    </select>
  </div>

  <div class="div_for_cart_pa d-none">
    <form>
  <div class="form-group">
    <label for="card_hol_nam"><?php echo lang("card_holders_name"); ?></label>
    <input type="text" class="form-control" id="card_hol_nam" aria-describedby="emailHelp" placeholder="<?php echo lang("card_holders_name"); ?>">
  </div>
  <div class="form-group">
    <label for="card_number"><?php echo lang("card_number"); ?></label>
    <input type="number" class="form-control" id="card_number" aria-describedby="emailHelp" placeholder="<?php echo lang("card_number"); ?>">
  </div>

  <div class="row">
    <div class="col-3">
      <div class="form-group">
        <label for="card_ex_month"><?php echo lang("month"); ?></label>
        <input type="number" class="form-control" id="card_ex_month" aria-describedby="emailHelp" placeholder="<?php echo lang("month"); ?>">
      </div>

    </div>
    <div class="col-3">
      <div class="form-group">
        <label for="card_ex_year"><?php echo lang("year"); ?></label>
        <input type="number"maxlength="2" class="form-control" id="card_ex_year" aria-describedby="emailHelp" placeholder="<?php echo lang("year"); ?>">
      </div>

    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="card_cvs_year"><?php echo lang("veficate_code"); ?></label>
        <input type="number" maxlength="3" class="form-control" id="card_cvs_year" aria-describedby="emailHelp" placeholder="<?php echo lang("veficate_code"); ?>">
      </div>
    </div>

  </div>

  </div>

  <?php }?>


  <div class="div_payment_method">

  </div>

     <?php
     foreach ($fetc_stm6 as  $valueAdr) {

   ?>

  <?PHP ECHO ' <div class="row"> '; ?>


  <?PHP ECHO  ' <div  class="col-sm-12"'; ?>
    <?php echo '<input id="clid_inp" type="hidden" name="" value="'.$_POST['clientid'].'">'; ?>
    <?php echo '<div id="div'.$valueAdr["AdressID"].'" class="form-check  div'.$valueAdr["AdressID"].' div_adres_pare">
    <input class="form-check-input" type="radio" data-adres_desc="'.$valueAdr["PlaceDescription"].'" name="gridRadios" id="client_ad'.$valueAdr["AdressID"].'" value="'.$valueAdr['AdressID'].'" >'; ?>
<?php echo '<label class="form-check-label" for="client_ad'.$valueAdr['AdressID'].'">'; ?>
  <?php echo '<p> <strong>'.lang("adress").": ".'</strong>'; ?>
        <?php echo '<span >'.$valueAdr['PlaceDescription'].'</span> </p>'; ?>

<?php echo '</label>'; ?>
<?php echo '</div>'; ?>
<?php echo ' </div>';?>
<?php echo ' </div>';?>



 <?php }
} //END GET ADRESSS

// INSERT RECEIPIENT NAME
else if  (isset($_POST["addrecepientname"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["clientid"])) { // INSERT RECEIPIENT NAME



if ($_POST["addrecepientname"]=="rec" && !empty($_POST["firstname"]) && !empty($_POST["lastname"] && is_numeric($_POST["clientid"]))) {
$stmt = $conn->prepare("INSERT INTO names (ClientID,FirstName,LastName) VALUES(:CLIENTID,:FIRSTNAME,:LASTNAME)");
$stmt->bindParam(":CLIENTID",$_POST["clientid"],PDO::PARAM_INT);
$stmt->bindParam(":FIRSTNAME",$_POST['firstname'],PDO::PARAM_STR,255);
$stmt->bindParam(":LASTNAME",$_POST['lastname'],PDO::PARAM_STR,255);
$stmt-> execute();
}

} // END INSERT RECEIPIENT NAME

if (isset($_POST['getnames']) && isset($_POST['getnameclientid'])) {
  $fetchnames = getnaems($_POST['getnameclientid']);
  echo '<div class="names_div_ row"> ';
  ?>
  <?php
  foreach ($fetchnames as $value) {
  echo '<div class="row">';
  echo '<input id="clid_inp1" type="hidden" name="" value="'.$_POST['getnameclientid'].'" >';
  echo '<div id="div'.$value['NameID'].'" class="form-check div'.$value['NameID'].' div_adres_pare" >';
echo '<input class="form-check-input" type="radio" name="dh" id="client_id'.$value['NameID'].'" value="'.$value['NameID'].'"  />';
echo '<label class="form-check-label" for="client_id'.$value['NameID'].'">';
echo '<p> <strong> '.lang("adress").": ".' </strong>';
echo '<span > '.$value['FirstName'].'</span>';
echo '<span > '." , ".$value['LastName'].' </span>';
echo '</p>';
echo "</label>";
echo '</div>';
echo '</div>';

  }
  echo "</div>";
}
else if(isset($_POST["set_name"]) && isset($_POST["client_id"])  && isset($_POST["fullname"])  ){

$sql = "INSERT INTO names (ClientID,fullname) values(:clientid,:fullname)";
$stmt=$conn->prepare($sql);
$stmt->bindparam(":clientid",$_POST["client_id"],PDO::PARAM_INT);
$stmt->bindparam(":fullname",$_POST["fullname"],PDO::PARAM_STR,255);
$stmt->execute();

if($stmt->rowCount()>0){

echo "<div class = 'alert alert-success text-center'>".lang('operation_was_successful')." </div>";

}else {
  echo "<div class='alert alert-danger text-center'>". lang('failed_operation')." </div>";
}


}else if(isset($_POST["cancelorder"]) && isset($_POST["productid"]) && isset($_POST["orderid"]) ){

  $stmt = $conn->prepare("UPDATE orderdetails SET StatusOrder = 7 WHERE ProductID = :PRODUCTID AND OrderID = :ORDERID");
  $stmt->bindParam(":PRODUCTID",$_POST["productid"],PDO::PARAM_INT);
  $stmt->bindParam(":ORDERID",$_POST["orderid"],PDO::PARAM_INT);
  $stmt->execute();

  $row = $stmt->rowCount();
  if ($row>0) {
    echo json_encode("yes");
  }
  else {
    echo json_encode("no");
  }

}
else if(isset($_POST["inset_catego"]) && isset($_POST["categoryname"])){
$catname  =  $_POST["categoryname"];
  $stmt = $conn->prepare("INSERT INTO categories (Name) values(:catname)");
  $stmt->bindParam(":catname",$_POST["categoryname"],PDO::PARAM_STR);
  $stmt->execute();
  $last__cat_id = $conn->lastInsertId();
if ($stmt->rowCount()>0) {

  class rs {
    public $reslt;
    public $status;
  }

  $stmt2 =$conn->prepare("SELECT CategoryID ,Name  FROM categories  WHERE CategoryID = :CategoryID  ORDER BY CategoryID ASC");
  $stmt2->bindParam(":CategoryID",$last__cat_id,PDO::PARAM_STR);
  $stmt2->execute();
  $cat2 = $stmt2->fetchAll();

    echo  '<select class="form-control" id="select_box_cate" name="categoryid">';
  foreach ($cat2 as  $value) {
  echo "<option  value='".$value['CategoryID']."' " ;
  if($value['Name'] ==$catname){echo 'selected';}
  echo '>'.$value["Name"].' </option>';

  }
    echo "</select>";


}else{
echo "0";
}

}
else if(isset($_POST["inset_brand"]) && isset($_POST["barndoryname"]) && isset($_POST["category_id"])){
$brandaned  =  $_POST["barndoryname"];
  $stmt = $conn->prepare("INSERT INTO brand (BrandName,CategoryID) values(:BRANDNAME,:CATEGORYID)");
  $stmt->bindParam(":BRANDNAME",$_POST["barndoryname"],PDO::PARAM_STR);
  $stmt->bindParam(":CATEGORYID",$_POST["category_id"],PDO::PARAM_INT);
  $stmt->execute();
  $last_id = $conn->lastInsertId();
if ($stmt->rowCount()>0) {

  class rs {
    public $reslt;
    public $status;
  }

  $stmt2 =$conn->prepare("SELECT * FROM brand WHERE BrandID = :BRANDID  ORDER BY BrandID ASC");
  $stmt2->bindParam(":BRANDID",$last_id,PDO::PARAM_STR);
  $stmt2->execute();
  $cat2 = $stmt2->fetchAll();

    echo  '<select class="form-control" id="select_box_cate" name="categoryid">';
  foreach ($cat2 as  $value) {
  echo "<option  value='".$last_id."'" ;
  if($value['BrandName'] ==$brandaned){echo 'selected';}
  echo '>'.$value["BrandName"].' </option>';

  }
    echo "</select>";


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

else if(isset($_POST["check_order_code"]) && isset($_POST["orderid"]) && isset($_POST["order_code"])){
$order_cod = check_order_code($_POST["orderid"]);
$result="";
foreach ($order_cod as $value) {
 $result = $value["Code_For_Self_Ship"];
}

if ($result == $_POST["order_code"]) {
echo "1";
}else {
  echo "0";
}


}

else if(isset($_POST["inser_completed_order"]) && isset($_POST["orderid"])){
  $stmt = $conn->prepare("UPDATE orderdetails SET StatusOrder = 3 , DelevredDate = NOW()  WHERE OrderID = :ORDERID");
  $stmt->bindParam(":ORDERID",$_POST["orderid"],PDO::PARAM_INT);
  $stmt->execute();

if($stmt->rowCount() > 0){
  $stmt_order = $conn->prepare("UPDATE orders SET DelevredDate = NOW()  WHERE OrderID = :ORDERID");
  $stmt_order->bindParam(":ORDERID",$_POST["orderid"],PDO::PARAM_INT);
  $stmt_order->execute();

  if ($stmt_order->rowCount() > 0) {
    echo "1";
  }else{
    echo "0";
  }

}  else{
    echo "0";
  }
}
else if (isset($_POST["check_code_returned_order"]) && isset($_POST["orderid"])  && isset($_POST["orde_co"]) ){ // CHECK RETURNED ORDER CODE
  //echo get_returned_order_code($_POST["orderid"]);
  if ($_POST["orde_co"] == get_returned_order_code($_POST["orderid"])) {
    echo "1";
  }else{
    echo "0";
  }
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
else if(isset($_POST["ask_return_order"]) && isset($_FILES["img_prd"]) && isset($_POST["reason_re"]) && isset($_POST["order"]) && isset($_POST["prodtc"])){

  date_default_timezone_set("Africa/Cairo");
   $date1 = str_replace("/","",date("y/m/d:h:i:sa"));
  $date = str_replace(":","",$date1);
   $rand = rand(1,900);
   $resultname = $rand.$date;
   $imgname = $resultname;

   $clientid = getclientID($_SESSION['user']);



  $avatarAllExtision = array("jpeg","jpg","png","gif");
    $picitem      = $_FILES['img_prd'];
    $avatraname    = $picitem["name"];
    $avatrsize     = $picitem["size"];
    $avatrtype     = $picitem["type"];
    $avatrtemp     = $picitem["tmp_name"];


    $_exp = explode(".",$avatraname);
    $avatarextension = strtolower( end($_exp));

    $error = array();

    if ( !empty($avatarextension) && !in_array( $avatarextension,$avatarAllExtision)) {
      $error[]= "not allow extision";
      // code...
    }else if($avatrsize >141943040){
      $error[]= "big size";
    }
    elseif (empty($picitem)) {
      $error[]= "no img";
    }
    elseif ($_POST["reason_re"] == "") {
      $error[]= "no reason";
    }
    else if(empty($error)){
      $ORDERRETURNED_CODE = rand(100000000000000,999999999999999);

      $old_img  = get_img_returned_product($_POST['order'],$_POST['prodtc']);

      if (file_exists($old_img)) {
         unlink($old_img);
      }

      $ALL_PATH = "theme/image/retun_orders/".$_SESSION["user"];
      if (!file_exists($ALL_PATH)) {
       mkdir("theme/image/retun_orders/".$_SESSION["user"]);
     }
       $imf_datb = $ALL_PATH."/".$imgname.".jpg";
        move_uploaded_file($avatrtemp,$imf_datb);


        $sql = $conn->prepare("UPDATE orderdetails
        INNER JOIN orders ON orders.OrderID = orderdetails.OrderID
         SET 	Product_Img_For_Return = :IMG , StatusOrder = 4 , reason_for_returned_orders = :REASON, date_asked_for_return = NOW() , Order_Returned_Code = :RETUNED_CODE

        WHERE orders.ClientID = :CLIENTID AND orderdetails.OrderID = :ORDERID AND orderdetails.ProductID = :PRODUCTID");
        $sql->bindParam(":IMG",$imf_datb,PDO::PARAM_STR,255);
         $sql ->bindParam(":CLIENTID",$clientid,PDO::PARAM_INT);
         $sql ->bindParam(":ORDERID",$_POST['order'],PDO::PARAM_INT);
         $sql ->bindParam(":RETUNED_CODE",$ORDERRETURNED_CODE,PDO::PARAM_INT);
         $sql ->bindParam(":PRODUCTID",$_POST['prodtc'],PDO::PARAM_STR,255);
         $sql ->bindParam(":REASON",$_POST['reason_re'],PDO::PARAM_STR,255);

        $sql->execute();
        if ($sql->rowCount() > 0) {
          echo "1";

        }else {
          echo "0";
        }

    }



}

// ADD ADDRESS
else if ( isset($_POST["set_names"]) && isset($_POST['placeDescripyion'])  && isset($_POST['client']))  {  // ADD ADDRESS
$stmt = $conn->prepare("INSERT INTO adress (ClientID,PlaceDescription) VALUES(:CLIENTID,:PLACEDESCRIPTION) ");
$stmt->bindParam(":CLIENTID",$_POST['client'],PDO::PARAM_INT);
$stmt->bindParam(":PLACEDESCRIPTION",$_POST['placeDescripyion'],PDO::PARAM_STR,255);
$stmt ->execute();


}  // END ADD ADDRESS

else if(isset($_POST["get_all_payment_me"]) && isset($_POST["prdct"]) && isset($_POST["place_shi"]) ){


    $paym = get_payment_by_produc_and_place($_POST["prdct"],$_POST["place_shi"]);
?>

    <div id="div_payment_meth" class="form-group">
   <label for="payme_meth_sel"><?php echo lang("payment_method")."*"; ?></label>
    <select class="form-control" id="payme_meth_sel">
   <?php
   foreach ($paym as  $value) {
 ?>
     <option value="<?php echo $value; ?>"><?php echo   getpayment_name($value) ?></option>
     <?php
   }
   ?>
   </select>
 </div>

    <?php
}
}



 ?>
