<?php
include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");

//INSERT SELLER AGREEMENT
if (isset($_POST['sellerAgreement'])  && isset($_POST['BusinessLocation'])  && isset($_POST['clientid'])  && isset($_POST['storename']) ) {

$businessloction = $_POST['BusinessLocation'];
$APROVABL = 2;
$stm = $conn->prepare("INSERT INTO  sellers (BusinessLocation,Aprovable,ClientID,StoreName) VALUES(:BUSSINESSLOCATION,:APROVABLE,:CLIENTID,:STORENAME)");
$stm->bindParam(":BUSSINESSLOCATION",$businessloction,PDO::PARAM_INT);
$stm->bindParam(":APROVABLE",$APROVABL,PDO::PARAM_INT);
$stm->bindParam(":CLIENTID",$_POST['clientid'],PDO::PARAM_INT);
$stm->bindParam(":STORENAME",$_POST['storename'],PDO::PARAM_STR);
$stm->execute();

 }

 else if (isset($_POST['get__all_locations_bus']) ) {

class country{
  public $CountryID;
  public $CountryName;
}

$locations_bus = simpleselect("*","countries");
$array_countries;
 foreach ($locations_bus as $value) {
$objcountry =  new country();

$objcountry->CountryID = $value["CountryID"];
$objcountry->CountryName = $value["CountryName"];

$array_countries[]= $objcountry;
 }
 echo json_encode(array("countries" => $array_countries));

}
else if(isset($_POST["CHECH_SELER_APROVABLE"]) && isset($_POST["clientid"])){
$APRVAL  =get_aprovable_seller($_POST["clientid"]);
  echo $APRVAL;
  }
  else if(isset($_POST["get_sa_laer__bussiness_location"]) && isset($_POST["clientid"]) ) {
    class businessLocation{
      public $businessloction;
    }

  $businloca = get_business_location($_POST["clientid"]);
  $myay ;
  $BUSIN ;
    foreach ($businloca as $value) {
      $myob = new  businessLocation();
        $myob->businessloction= $value['BusinessLocation'];
        $BUSIN  = $value['BusinessLocation'];
      $myay [] =$myob;

    }

//  echo $BUSIN;

  echo json_encode(array("BusinessLocation" =>$myay ));
  }
  else if(isset($_POST["ADD_SEL__LER_ADREES"]) && isset($_POST["Clientid"]) && isset($_POST["ISLANDID"])  && isset($_POST["GOURVERNORATE"]) && isset($_POST["CITY"]) && isset($_POST["PLACEDESCR"]) ){


    $stm = $conn->prepare("UPDATE sellers
      INNER JOIN clients ON clients.ClientID = sellers.ClientID
       SET sellers.ISLAND = :ISLANDS , sellers.PlaceDescription = :PLACEDSCRIPTION , sellers.Gouvernorate = :GOUVERNORATE , sellers.City = :CITY , Aprovable = 4
        WHERE clients.ClientID = :CLIENTID");
    $stm->bindParam(":ISLANDS",$_POST["ISLANDID"],PDO::PARAM_INT);
    $stm->bindParam(":GOUVERNORATE",$_POST["GOURVERNORATE"],PDO::PARAM_INT);
    $stm->bindParam(":CITY",$_POST["CITY"],PDO::PARAM_INT);
    $stm->bindParam(":PLACEDSCRIPTION",$_POST["PLACEDESCR"],PDO::PARAM_STR,255);
    $stm->bindParam(":CLIENTID",$_POST["Clientid"],PDO::PARAM_INT);
    $stm->execute();

    if ($stm->rowCount()>0) {
      echo "1";
    }else{
      echo "0";
    }

  }

  else if(isset($_POST["check_starte_name_exits____"]) && isset($_POST["storename"])  ){


    $stm = $conn->prepare("SELECT SellerID  FROM sellers WHERE StoreName = :STORENAME");
    $stm->bindParam(":STORENAME",$_POST["storename"],PDO::PARAM_STR);
    $stm->execute();
    if ($stm->rowCount()>0) {
      echo "1";
    }else{
      echo "0";
    }

  }
  else if(isset($_POST["inser_saller_payment__"]) && isset($_POST["seller_id"]) && isset($_POST["payment_id"])){

    $stm = $conn->prepare("INSERT INTO  seller_payment_method (PaymentID,SellerID) VALUES(:PAYMENTID,:SELLERID)");
    $stm->bindParam(":PAYMENTID",$_POST["payment_id"],PDO::PARAM_INT);
    $stm->bindParam(":SELLERID",$_POST["seller_id"],PDO::PARAM_INT);
    $stm->execute();
    if($stm->rowCount()>0){
  $stmt = $conn->prepare("UPDATE sellers SET Aprovable = 6 WHERE  SellerID =:SELERID");
  $stmt->bindParam(":SELERID",$_POST["seller_id"],PDO::PARAM_INT);
  $stmt->execute();
  if($stmt->rowCount()>0){
    echo "1";
  }else{
    echo "0";
  }

    }else{
      echo "0";
    }

  }
  else if(isset($_POST["get_seller_id___"]) && isset($_POST["_clientid"]) ){

    class selerid{
      public $sellerid;
    }
    $stm = $conn->prepare("SELECT SellerID from sellers WHERE ClientID = :CLIENTID");
    $stm->bindParam(":CLIENTID",$_POST["_clientid"],PDO::PARAM_INT);
    $stm->execute();
    $FETCH = $stm->fetchAll();
    $array =  array();
    foreach($FETCH as $value){
      $objt = new selerid();
      $objt->sellerid = $value["SellerID"];
      $array[]=$objt;
    }
    echo json_encode(array("sellerid" => $array));


  }elseif (isset($_POST["INSERT__ADRESS_FOR_ANOTHER_ADRES_____"]) && isset($_POST["cityID"]) && isset($_POST["place_desc"])  && isset($_POST["clientid"])  ) {
    $stm = $conn->prepare("UPDATE sellers
      INNER JOIN clients ON clients.ClientID = sellers.ClientID
      SET  sellers.City = :CITYID ,sellers.PlaceDescription = :PLACEDESCRIPTION
      WHERE clients.ClientID = :CLIENTID
       ");
    $stm->bindParam(":CITYID",$_POST["cityID"],PDO::PARAM_INT);
    $stm->bindParam(":PLACEDESCRIPTION",$_POST["place_desc"],PDO::PARAM_STR,255);
    $stm->bindParam(":CLIENTID",$_POST["clientid"],PDO::PARAM_STR,255);
    $stm->execute();
    if($stm->rowCount()>0){
      $stmt = $conn->prepare("UPDATE sellers
        INNER JOIN clients ON clients.ClientID = sellers.ClientID
         SET  sellers.Aprovable = 4
          WHERE clients.ClientID = :CLIENTID");
      $stmt->bindParam(":CLIENTID",$_POST["clientid"],PDO::PARAM_INT);
      $stmt->execute();
      if($stmt->rowCount()>0){
        echo "1";
      }else{
        echo "0";
      }
    }else{
      echo "0";
    }
  }








 ?>
