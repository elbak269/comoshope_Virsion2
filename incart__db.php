<?php

session_start();
$database = include("admin/connect.php"); // connect database directory
 include("admin/includes/functions/functions.php");
 include("admin/includes/languages/english.php");

if (isset($_POST["isset_insert_incart"]) && isset($_POST["product_id"])  && isset($_POST["qtt"]) && isset($_SESSION["user"]) ) {
$client_id =  getclientID($_SESSION["user"]);
$ch_cl_has_prd_in_cart = check_if_client_has_item_in_cart($client_id,$_POST["product_id"]);

if ($ch_cl_has_prd_in_cart <= 0) {
$stmt = $conn->prepare("INSERT INTO incart (ProductID,QTY,ClientID) VALUES(:ProductID,:QTY,:ClientID)");
$stmt->bindParam(":ProductID",$_POST["product_id"],PDO::PARAM_STR);
$stmt->bindParam(":ClientID",$client_id,PDO::PARAM_STR);
$stmt->bindParam(":QTY",$_POST["qtt"],PDO::PARAM_STR);
$ex = $stmt->execute();
if ($ex == true || $ex == "true") {
echo "1";
}
else{
  echo "2";
}
}else{

  $stmt = $conn->prepare("UPDATE   incart SET QTY = QTY+1 WHERE ClientID = :ClientID");
  $stmt->bindParam(":ClientID",$client_id,PDO::PARAM_STR);
  $stmt->execute();
  $row_count = $stmt->rowCount();
  if ($row_count > 0) {
  echo "3";
  }
  else{
    echo "4";
  }

}

}else if(isset($_POST["COUNT_PRODUCT_IN_CART"]) && isset($_SESSION["user"])){
  $client_id =  getclientID($_SESSION["user"]);
  $stmt = $conn->prepare("SELECT SUM(QTY) FROM incart WHERE ClientID =:CLIENTID");
  $stmt->bindParam(":CLIENTID",$client_id,PDO::PARAM_STR);
  $stmt->execute();
  $fetchal = $stmt->fetchColumn();
  echo $fetchal  ;
}

else if(isset($_POST["get_prdct_in_cart_fb"]) && isset($_SESSION["user"])){
  $client_id =  getclientID($_SESSION["user"]);
  $stmt = $conn->prepare("SELECT *  FROM incart WHERE ClientID =:CLIENTID");
  $stmt->bindParam(":CLIENTID",$client_id,PDO::PARAM_STR);
  $stmt->execute();
  $fetchal = $stmt->fetChAll();
  echo json_encode($fetchal);
}

else if (isset($_POST['clientid']) &&  isset($_POST['get_adres']) && isset($_POST['showaddress'])  ) { // GET ADRESSS
 $stmtadres = $conn->prepare("SELECT PlaceDescription ,AdressID FROM  adress
   INNER JOIN clients ON clients.ClientID = adress.ClientID
   WHERE clients.ClientID = :CLINDID  ORDER BY AdressID DESC LIMIT 2
    ");
    $stmtadres ->bindParam(":CLINDID",$_POST['clientid'],PDO::PARAM_INT);
    $stmtadres -> execute();
    $fetc_stm6  = $stmtadres->fetchAll();


    ?>

    <div id="div_pace_ship" class="form-group">
   <label for="place_shi___"><?php echo lang("choice_adress"); ?></label>
   <select class="form-control" id="place_shi___">
      <option value="1"><?php echo lang("ngazidja"); ?></option>
    <?php /* ?>  <option value="2"><?php echo lang("ndzuwani"); ?></option> <?php */ ?>
    <?php /* ?>  <option value="3"><?php echo lang("mwali"); ?></option> <?php */ ?>
      <option value="4"><?php echo lang("france"); ?></option>

   </select>
 </div>



 <?php ?>


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
} else if (isset($_POST["confirm_order"]) && isset($_POST["product_ids"]) && isset($_POST["client_id"]) && isset($_POST["order_address"]) && isset($_POST["promocode"])  &&isset($_POST["recep_name"]) &&
isset($_POST["payment_method"]) && isset($_POST["currecny"]) && isset($_POST["place_shi_id"]) && isset($_POST["phone"])  ) {

  $dat = str_replace(array(":","/","\\",","," "),"",date("d,m,y h:i:s"));
  $rad = RAND(1,999);
  $clientid =str_replace(" ","",$_POST['client_id']);
  $orderidto= $dat+$rad+$dat;
  $ORDERID= $orderidto;

  $noreapet = 0;

  $prodcts = json_decode($_POST["product_ids"]);
foreach ($prodcts as  $value1) {
 $product_id = $value1->id;
 $seller_id  = $value1->sellerid;
 $qty        = $value1->qty;



 $ship_price = 0;
 if($_POST["place_shi_id"] == "1"){
   $ship_price = get_ship_price_ngazidja($product_id);
 }else if($_POST["place_shi_id"] == "2"){
  $ship_price = get_ship_price_NDZUWANI($product_id);
 }else if ($_POST["place_shi_id"] == "3"){
   $ship_price = get_ship_price_mwali($product_id);
 } else if($_POST["place_shi_id"] == "4"){
 $ship_price  = get_ship_price_france($product_id);
 }


 $productinfo =  PROCUT_INFO_ORDER($product_id);
 foreach ($productinfo as  $value) {
  $price = $value["Price"];
 }


 $DISCOUNT =0;
 if($_POST['promocode'] !="" || $_POST['promocode'] != null){
  $PROMOVALUE  = promo_value($_POST['promocode']);
  foreach ($PROMOVALUE as $value) {
    $DISCOUNT = $value["Discount"];
  }
 }else{
  $DISCOUNT = 0;
 }

 $amount = $price *  $qty;
 $totatl_amount = ($price - $DISCOUNT)*$qty;
 $totatl_order = (($price - $DISCOUNT)*$qty)+$ship_price;

 $promocode;
 if (!empty($_POST['promocode'])) {
 $promocode = intval($_POST['promocode']);
 }else {
 $promocode  = NULL;
 }
$noreapet++;
if ($noreapet == 1) {

 $stm = $conn ->prepare("INSERT INTO orders (OrderID,ClientID,RequestDate,Adress,RECEPIENT,TotalOrder,CurrencyID,payment_method,	Place_shipping,Phone)
 VALUES(:ORDERID,:CLIENTID,NOW(),:ADRESS,:RECEPIENT_NAM,:TOTALORDER,:CURRENCY,:PAYMENTID,:PLACE_SHIP_ORDER,:Phone)");
 $stm->bindParam(":ORDERID",$ORDERID,PDO::PARAM_INT);
 $stm->bindParam(":CLIENTID",$_POST['client_id'],PDO::PARAM_INT);
 $stm->bindParam(":ADRESS",$_POST['order_address'],PDO::PARAM_STR);
 $stm->bindParam(":RECEPIENT_NAM",$_POST['recep_name'],PDO::PARAM_STR);
 $stm->bindParam(":TOTALORDER",$totatl_order,PDO::PARAM_STR);
 $stm->bindParam(":CURRENCY",$_POST["currecny"],PDO::PARAM_INT);
 $stm->bindParam(":PAYMENTID",$_POST['payment_method'],PDO::PARAM_INT);
 $stm->bindParam(":PLACE_SHIP_ORDER",$_POST["place_shi_id"],PDO::PARAM_INT);
  $stm->bindParam(":Phone",$_POST["phone"],PDO::PARAM_INT);
 $stm->execute();
 $row = $stm->rowCount();
}
 if ($row > 0) {
  $code_For_Self_Ship_rand = rand(10000000000000,99999999999999);
  $SQLORDERDETAIL = $conn->prepare("INSERT INTO orderdetails (OrderID,ProductID,QTY,amount,total_amount,CurrencyID,PromoCode,Discount,Shipr_Price,StatusOrder,Code_For_Self_Ship,SallerID)
   VALUES (:ORDERID,:PRODUCTID,:qty,:AMOUNT,:TOTAL_AMOUNT,:CURRENCYID,:PROMOCODE,:DISCOUNT,:SHIPE_PRICE,1,:Code_For_Self_Ship,:SallerID)");
  $SQLORDERDETAIL ->bindParam(":ORDERID", $ORDERID,PDO::PARAM_INT);
  $SQLORDERDETAIL ->bindParam(":PRODUCTID",$product_id,PDO::PARAM_INT);
  $SQLORDERDETAIL ->bindParam(":qty",$qty,PDO::PARAM_INT);
  $SQLORDERDETAIL ->bindParam(":AMOUNT",$amount,PDO::PARAM_STR);
  $SQLORDERDETAIL ->bindParam(":TOTAL_AMOUNT",$totatl_order,PDO::PARAM_STR);
  $SQLORDERDETAIL ->bindParam(":CURRENCYID",$_POST["currecny"],PDO::PARAM_INT);
  $SQLORDERDETAIL ->bindParam(":PROMOCODE",$promocode,PDO::PARAM_STR);
  $SQLORDERDETAIL ->bindParam(":SHIPE_PRICE",$ship_price,PDO::PARAM_STR);
  $SQLORDERDETAIL ->bindParam(":DISCOUNT",$DISCOUNT,PDO::PARAM_STR);
  $SQLORDERDETAIL ->bindParam(":Code_For_Self_Ship",$code_For_Self_Ship_rand,PDO::PARAM_INT);
    $SQLORDERDETAIL ->bindParam(":SallerID",$seller_id,PDO::PARAM_INT);
  $SQLORDERDETAIL ->execute();

  if($SQLORDERDETAIL->rowCount() >0){




  $COUNT_NAME = get_name_by_id($_POST["client_id"],$_POST["recep_name"]);
    if ($COUNT_NAME < 1) {
      $sql = "INSERT INTO names (ClientID,fullname) values(:clientid,:fullname)";
      $stmt=$conn->prepare($sql);
      $stmt->bindparam(":clientid",$_POST["client_id"],PDO::PARAM_INT);
      $stmt->bindparam(":fullname",$_POST["recep_name"],PDO::PARAM_STR,255);
      $stmt->execute();
    }


 $COUNT_ADRESS = get_adress_name_by_id($_POST["client_id"],$_POST['order_address']);
    if ($COUNT_ADRESS < 1) {
      $stmt = $conn->prepare("INSERT INTO adress (ClientID,PlaceDescription) VALUES(:CLIENTID,:PLACEDESCRIPTION) ");
      $stmt->bindParam(":CLIENTID",$_POST['client_id'],PDO::PARAM_INT);
      $stmt->bindParam(":PLACEDESCRIPTION",$_POST['order_address'],PDO::PARAM_STR,255);
      $stmt ->execute();

    }



    if ($_POST['payment_method']=="3" && isset($_POST["CARD_HOLDER_NAME"]) && isset($_POST["card_number"]) && isset($_POST["mm"]) && isset($_POST["yy"]) && isset($_POST["mycvc"]) ) {


      $stm_card = $conn->prepare("INSERT INTO  cards (CardNumber,CardName,ClientID,MM,YY,CVC,DateSet,Order_ID)
        VALUES(:CardNumber,:CardName,:ClientID,:MM,:YY,:CVC,NOw(),:Order_ID)");
          $stm_card->bindParam(":CardNumber", $_POST["card_number"],PDO::PARAM_INT);
          $stm_card->bindParam(":CardName", $_POST["CARD_HOLDER_NAME"],PDO::PARAM_STR);
          $stm_card->bindParam(":ClientID",$_POST['client_id'],PDO::PARAM_INT);
          $stm_card->bindParam(":MM", $_POST["mm"],PDO::PARAM_INT);
          $stm_card->bindParam(":YY", $_POST["yy"],PDO::PARAM_INT);
          $stm_card->bindParam(":CVC", $_POST["mycvc"],PDO::PARAM_INT);
          $stm_card->bindParam(":Order_ID", $ORDERID,PDO::PARAM_INT);
          $stm_card->execute();

 if ($stm_card->rowCount() >0) {





 }else {

 }

    }


  }else{

  }




 }
 else {


 }


 deletet_item_in_cart($product_id);

}

class result_order{
  public $order_id;
  public $status;
}

$result_order_obj = new result_order();
$result_order_obj->order_id = $ORDERID;
$result_order_obj->tatus = 1;
echo json_encode($result_order_obj);

} //END GET ADRESSS
else if(isset($_POST["GET_SHPI_PRICE"]) && isset($_POST["product_id"])){
$data  = get_ship_price_all_place($_POST["product_id"]);
echo json_encode($data);
}else if(isset($_POST["get_all_products_in_cart"]) && isset($_POST["ship_place_id"]) && isset($_POST["CLIENT_ID"])){
  $img = "theme/image/";

  $products_in_cart ;
  if($_POST["ship_place_id"] == 1){
    $products_in_cart = PRODUCT_INCART_FOR_NGAZIDJA($_POST["CLIENT_ID"]);
  }else if($_POST["ship_place_id"] == 2){
      $products_in_cart = PRODUCT_INCART_FOR_NDZUWANI($_POST["CLIENT_ID"]);
  }else if($_POST["ship_place_id"] == 3){
    $products_in_cart = PRODUCT_INCART_FOR_MWALI($_POST["CLIENT_ID"]);

  }else if($_POST["ship_place_id"] == 4){
   $products_in_cart = PRODUCT_INCART_FOR_FRANCE($_POST["CLIENT_ID"]);
  }

  if (count($products_in_cart) > 0) {
//$products_in_cart = PRODUCT_INCART($client_id);
  foreach ($products_in_cart as  $value){
  ?>
    <div data-ship_ngazidja = "<?php echo $value["ship_ngazidja"]; ?>"  data-ship_ndzuwani="<?php echo $value["ship_ndzouwani"]; ?>" data-ship_mwali="<?php echo $value["ship_mwali"]; ?>" data-ship_france = "<?php echo $value["ship_france"]; ?>"  class="col-sm-12 col-md-6 col-lg-4 col-xl-2 div_col______ ">
      <div  class="itm_in_cart_co">
        <i data-product_id="<?php echo $value["ItemID"];?>" class="fas fa-times-circle fa_remove_item"></i>
        <input type="hidden" name="" class="weight_product" id="" value="<?php echo $value["Weight"]; ?>">

         <div class="div_img">
           <img class="img_in_car" src="<?php ECHO $img."uploade_img/".$value["Pic1"] ?>" alt="">
         </div>
         <p class="text-center"><?php echo $value["Name"] ?></p>
         <p data-price="<?php echo  $value["Price"];  ?>" class="price_item text-center"><?php echo $value["Price"]." ".lang("euro"); ?></p>

        <div class="con_sele">
          <div class="row">
            <div class="col">
              <label for="selc_qty_"><?php echo lang("qty")." : "; ?></label>

            </div>
            <div class="col">
              <select  id="<?php echo "selc_qty_".$value["ItemID"]; ?>" data-seller="<?php echo $value["userId"]; ?>" data-product__id="<?php echo $value["ItemID"]; ?>" data-sel_="<?php echo $value["ItemID"];?>" class="form-control form-control-sm selqty_in_cart select_prod_qty">
               <?php
               for ($i=0; $i <=100 ; $i++) {
                 if ($i == $value["qty"]) {
                 ?>
                 <option <?php echo "selected";?>><?PHP ECHO $i; ?></option>
                 <?PHP
               }else{
                 ?>
                 <option ><?PHP ECHO $i; ?></option>
                 <?php
               }
               }
               ?>
             </select>

            </div>

          </div>

        </div>
        <div class="">
        <p><span><?php echo lang("total")." : "; ?></span>  <span data-product_id="<?php echo $value["ItemID"]; ?>" id="<?php echo "id_prd_".$value["ItemID"]; ?>"  data-price="<?php echo $value["Price"];?>" class="total_pr"></span> </p>
        </div>

      </div>

    </div>
  <?php
  }
}
}
else if(isset($_POST["remove_item_from_incart"]) && isset($_POST["product_id"]) && isset($_POST["CLIENT_ID"])){
  $stmt = $conn->prepare("DELETE FROM incart WHERE ProductID  = :product_id AND 	ClientID = :ClientID");
  $stmt->bindParam(":product_id",$_POST["product_id"],PDO::PARAM_INT);
  $stmt->bindParam(":ClientID",$_POST["CLIENT_ID"],PDO::PARAM_INT);
  $stmt->execute();
  echo 1;


}
else{
  echo "no";
}

?>
