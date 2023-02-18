<?php
ob_start();
session_start();
if (isset($_SESSION['user'])) {
$set_footer ="";
$notheader="";
$pageTitle = "ComoShopSell";
$comoshopsell= "";
$comoshopseller_js =" ";
$comoshopseller_js ="";
include("admin/connect.php");
include("init.php");
$sellerid5 =  getsellerid($_SESSION['user']);
$usersesion = $_SESSION['user'];
$mobileexi  = array();
$mobileexi [] = " ";
$CLIENTID = getclientID($usersesion);





                     //INSERT SELLER AGREEMENT
if (isset($_GET['do']) && $_GET['do']=="sellerAgreement") {

if (isset($_POST['BusinessLocation_ID']) && isset($_POST["agree_constion"])) {

if($_POST['BusinessLocation_ID']==0){

}
else{

$businessloction = $_POST['BusinessLocation_ID'];
  $APROVABL = 2;
  $stm = $conn->prepare("INSERT INTO  sellers (BusinessLocation,Aprovable,ClientID) VALUES(:BUSSINESSLOCATION,:APROVABLE,:CLIENTID)");
  $stm->bindParam(":BUSSINESSLOCATION",$businessloction,PDO::PARAM_INT);
  $stm->bindParam(":APROVABLE",$APROVABL,PDO::PARAM_INT);
  $stm->bindParam(":CLIENTID",$CLIENTID,PDO::PARAM_INT);
  $stm->execute();
}
}else {
  {

  }
} } // END INSERT SELLER AGREMENT

// START UPDATE SELLER INFORMATION
if (isset($_GET['do']) && $_GET['do']=="sellerinformation") {
if (isset($_POST['island_store']) && isset($_POST['storename']) && isset($_POST['verifymobile']) && isset($_POST['storeadress']) ) {

$islandstor = $_POST['island_store'];
$storename = $_POST['storename'];
$storemobile = $_POST['verifymobile'];
$storeadress = $_POST['storeadress'];
$mobileexist = cheick_exist("Mobile","sellers",$storemobile);

if ($mobileexist > 0) {
  $mobileexi [] = "<div class='alert alert-danger' role ='alert'>".lang('mobileExist')."</div>";
}
elseif (empty($storemobile)) {
$mobileexi [] = "<div class='alert alert-danger' role ='alert'>".lang('mobileCantEmpty')."</div>";
}
elseif (empty($islandstor)) {
  $mobileexi [] = "<div class='alert alert-danger' role ='alert'>".lang('islandCantempty')."</div>";
}
elseif (empty($storeadress)) {
  $mobileexi [] = "<div class='alert alert-danger' role ='alert'>".lang('adressCantEmpty')."</div>";
}
elseif (empty($storename)) {
  $mobileexi [] = "<div class='alert alert-danger' role ='alert'>".lang('storNameCantEmpty')."</div>";
}

else {
  $stm5 = $conn->prepare("UPDATE sellers SET StoreAdress = ?, Aprovable = ?, IslandStore =? , StoreName = ? , Mobile = ?  WHERE SellerID = ?");
  $stm5 -> execute(array($storeadress,4,$islandstor,$storename,$storemobile,$sellerid5));
}

} }  // END UPDATE SELLER INFORMATION
                                                      // START UPDATE SETUP CARD
                                                      //CARD
if (isset($_POST['cardname']) && isset($_POST['cardnumber']) && isset($_POST['mm']) && isset($_POST['yy']) && isset($_POST['cvc']) ) {
if (!empty($_POST['cardname']) && !empty($_POST['cardnumber']) && !empty($_POST['mm']) && !empty($_POST['yy']) && !empty($_POST['cvc']) ) {
  $cardname = $_POST['cardname'];
  $cardum = $_POST['cardnumber'];
  $mm = $_POST['mm'];
  $yy = $_POST['yy'];
  $cv = $_POST['cvc'];

  $stm = $conn -> prepare("INSERT INTO  cards (CardNumber,CardName,MM,YY,CVC,ClientID) VALUES(?,?,?,?,?,?)");
  $stm ->execute(array($cardum,$cardname,$mm,$yy,$cv,$CLIENTID));
  $ROW = $stm ->rowCount();
  if ($ROW > 0) {
    $stmt = $conn->prepare("UPDATE sellers SET Aprovable = ? WHERE  SellerID = ?");
    $stmt ->execute(array(6 , $sellerid5));
  }
  }
  else {
    echo "soryy";
  }
}
            //PAYPAL
if (isset($_POST['paypal']) && !empty($_POST['paypal'])) {
  $paypal  = $_POST['paypal'];
  $stmt = $conn ->prepare("INSERT INTO paypals (PaypalEmail,ClientPayapl) VALUES(?,?)");
  $stmt -> execute(array($paypal,$CLIENTID));
  $row = $stmt -> rowCount();
  if ($row>0) {
    $stmt = $conn->prepare("UPDATE sellers SET Aprovable = ? WHERE  SellerID = ?");
    $stmt ->execute(array(6 , $sellerid5));
  }
}

if (isset($_POST['self']) && !empty($_POST['self'])) {
  $stmt = $conn->prepare("UPDATE sellers SET Aprovable = ? WHERE  SellerID = ?");
  $stmt ->execute(array(6 , $sellerid5));
}


function  cheickselleracount(){
global $conn;
$stmt = $conn->prepare("SELECT  sellers.Aprovable, clients.UserName  FROM sellers
  INNER JOIN clients ON clients.ClientID = sellers.ClientID
  WHERE clients.UserName = ?
   ");
$stmt->execute(array($_SESSION["user"]));
$fetc = $stmt->fetchAll();
foreach ($fetc as $value) {
return $value['Aprovable'];
}

}
$cheickselle = cheickselleracount();




  ?>
  <div class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
      ComoShop
    </a>
  </div>

  <div class="nav_acount_complete">

    <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <?php if($cheickselle <2 ){ echo '<i class="far fa-circle"></i>'.' '.'<span class="">'.lang("sellerAgreement").'</span>';  }else{echo '<i class="far fa-check-circle completed-i"></i>'.'<span class="completed-i">'.' '. lang("sellerAgreement").'</span>';}?>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
      <?php if($cheickselle <3 ){ echo '<i class="far fa-circle"></i>';  }else{echo '<i class="far fa-check-circle completed-i"></i>';}?></i> <span><?php echo  lang("sellerInformation") ?></span>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
        <?php if($cheickselle <5 ){ echo '<i class="far fa-circle"></i>';  }else{echo '<i class="far fa-check-circle completed-i"></i>';}?></i> <span><?php echo  lang("SetupYourCard") ?></span>

      </div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
      <i class="far fa-circle"></i> <span><?php echo  lang("AcountVerification") ?></span>
      </div>

    </div>

  </div>
  <?php
  $countrinp = simpleselect("*","countries");
echo "<div class='container'>";

                     // check Aprovable seller
  if ($cheickselle<2) {
    echo "<h1 class='text-center'>".lang("sellerAgreement")."</h1>";

  ?>

  <form class="" action="<?php echo $_SERVER["PHP_SELF"]."?do=sellerAgreement" ?>" method="POST">
    <?php
echo '<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="seletc_busnes_location">'.lang('businessLocation').'</label>
  </div>
  <select  name = "BusinessLocation_ID"  class="custom-select" id="seletc_busnes_location">
    <option value="0" selected>Choose...</option>';
    foreach ($countrinp as  $value) {
      echo '<option value ="'.$value['CountryID'].'">'.$value['CountryName'].'</option>';
    };
echo '
  </select>
</div>';

?>

<div class="form-group">
    <div class="form-check">
      <input class="form-check-input is-invalid" name="agree_constion" type="checkbox" value="" id="chck_bx_agree" checked required>
      <label  id="lbl_chkbx___" class="form-check-label" for="invalidCheck3">
        Accepter Les Termes Et Conditions
      </label>
      <div class="row">
        <div class="col ">
          <label class="form-check-label" for="invalidCheck3">
          Vous devez accepter avant de la soumettre.gree before submitting.
        </label>
        </div>
        <div class="col">
          <button type="submit" id="btn-nxt_seller_agrement" class="btn btn-primary"><?php echo lang('next'); ?></button>
        </div>

      </div>


    </div>

  </div>
</form>
<?php
} //END CHEICK SELLER


elseif ($cheickselle==2) {
?>
<form class="" action="<?php echo $_SERVER['PHP_SELF']."?do=sellerinformation" ?>" method="POST">  <!-- SELLER INFORMATION FORM -->
  <div class="row">

    <div class="input-group mb-3  "> <!--Start ISLAND SELECT BOX -->
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01"><?php echo lang('islandLocation'); ?></label>
      </div>
      <select  name = "island_store"  class="custom-select" id="inputGroupSelect01">
        <?php
        $stmI = $conn -> prepare("SELECT * FROM islands");
        $stmI -> execute();
        foreach ($stmI as $value) {
          echo "<option  value='".$value['IslandID']."'>".$value["IslandName"]."</option>";
        }
         ?>

      </select>
    </div> <!--END ISLAND SELECT BOX -->

    <div class="input-group mb-3"> <!--START STORE NAME-->
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect02"><?php echo lang('storeName'); ?></label>
      </div>
      <input  name = "storename"  class="form-control" id="inputGroupSelect02"></input>
    </div> <!--END STORE NAME-->

    <div class="input-group mb-3"> <!-- START STORE ADRESS-->
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect03"><?php echo lang('storeAdress'); ?></label>
      </div>
      <input  name = "storeadress"  class="form-control" id="inputGroupSelect03"></input>
    </div>   <!-- END STORE ADRESS-->

    <div class="input-group mb-3"> <!-- START STORE MOBILE-->
      <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect04"><?php echo lang('mobile'); ?></label>
      </div>
      <input  name = "verifymobile"  class="form-control" id="inputGroupSelect04"></input>
      <button type="button" class="btn btn-sm btn-primary"><?php echo lang('verifyMobile'); ?></button>
    </div>   <!-- END STORE MOBILE-->

  </div> <!--END ROW -->
  <p id='mobileavilable' class="text-center"></p>
    <button type="submit" class="btn btn-primary "><?php echo lang('next'); ?></button>
    <div class="div_mobi_exi">
      <?php foreach ($mobileexi as  $value) {
        echo $value;
      }   ?>
    </div>


</form>






<?php
} // END IF CHECK SELLER == 2

elseif ($cheickselle==4) {
?>
<div class="container receiveway_div">
  <h5 class="text-center h5_meth_re_ber"> <strong class="text-center">Méthodes de réception des bénéfices</strong> </h5>
  <div class="row receive_check_bo">
    <?php /* ?>
    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
  <input type="checkbox" name="cartVisa"  value = '1' id="card_visa"> <strong><label> <?php echo lang('cartVisa'); ?></label></strong> <i id="fa_card_visa" class="far fa-question-circle"></i>
  <!--<div id='prime_info' class="alert alert-info dispalay-none" > <span > <?php// echo  lang("moreinfo"); ?></span> </div>-->
</div>
<?php */ ?>
<div class="col-12  col-sm-12 col-md-6 col-lg-6 col-xl-6">
  <input type="checkbox" value = '2'  id="self"name="optradio" checked> <strong><label ><?php echo lang('cash'); ?></label> </strong> <i id="fa_self" class="far fa-question-circle"></i>
</div>
<div class="col-12  col-sm-12 col-md-6 col-lg-6 col-xl-6">
  <input type="checkbox" id = 'paypal' value = '3' name="paypal"  > <strong> <label for='paypal'><?php echo lang('paypal'); ?></label></strong>  <i  id="fa_both" class="far fa-question-circle"></i>
</div>

  </div>
<div class="receive_input ">
  <?php /* ?>
  <div class="card_visa_div dispalay-none ">
    <div class="row">
     <div class="col-12 col-sm-12  col-md-6 col-lg-6 col-xl-6">
      <div class="input-group mb-3"> <!-- START STORE MOBILE-->
        <div class="input-group-prepend">
          <label class="input-group-text" for="cardname"><?php echo lang('cardname'); ?></label>
        </div>
         <input  name = "cardname"  class="form-control" id="cardname"></input>
     </div>
    </div>


    <div class="col-12 col-sm-12  col-md-6 col-lg-6 col-xl-6">
     <div class="input-group mb-3">
       <div class="input-group-prepend">
         <label class="input-group-text" for="cardnumber"><?php echo lang('cardNumber'); ?></label>
       </div>
        <input type="number"  name = "cardnumber"  class="form-control" id="cardnumber"></input>
    </div>
   </div>

  </div>

  <div class="row cvs">
    <div class="col-12  col-sm-12 col-md-4 col-lg-4 col-xl-4">
     <div class="input-group mb-3">
       <div class="input-group-prepend">
         <label class="input-group-text" for="mm"><?php echo lang('mm'); ?></label>
       </div>
        <input type="number"  name = "mm"  class="form-control" id="mm"></input>
    </div>
    </div>

    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
     <div class="input-group mb-3">
       <div class="input-group-prepend">
         <label  class="input-group-text" for="yy"><?php echo lang('yy'); ?></label>
       </div>
        <input type="number"  name = "yy"  class="form-control" id="yy"></input>
    </div>
    </div>

    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
     <div class="input-group mb-3">
       <div class="input-group-prepend">
         <label class="input-group-text" for="cvc"><?php echo lang('cvc'); ?></label>
       </div>
        <input  type="number" name = "cvc"  class="form-control" id="cvc"></input>
    </div>
    </div>

  </div>

  </div>
  <?php */?>
  <div class="paypal_email_div dispalay-none">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="paypal_email"><?php echo lang('paypalEmail'); ?></label>
      </div>
       <input  name = "paypal_email"  class="form-control" id="paypal_email"></input>
   </div>
  </div>



</div>

<div class="btn_next text-center">
  <button type="button" id="btn_next_setupcard" class="btn btn-primary"><?php echo lang("next"); ?></button>
</div>
<div class="test">

</div>

</div>
<?php  ?>
<?php
}
elseif ($cheickselle==6) {
  ?>
  <div class="peddig_div">


  <div class="alert alert-info text-center" role="alert">
   <strong> <?php echo lang("peddingApproval"); ?> </strong>
 </div>
</div>
  <?php
}


elseif ($cheickselle==8) {

header("location:dashboard.php");
exit();
}
?>
<?php
echo "</div>";



include($template ."footer.php");

}
else {
header("location:login.php?dashboard-dash=1");
exit();
}
ob_end_flush();
 ?>
