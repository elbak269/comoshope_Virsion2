<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
  if (isset($_POST['usersName'])) {


$nonavbar="";
  include("admin/connect.php");
  include("admin/includes/languages/english.php");
  $username = $_POST['usersName'];
  $stm = $conn-> prepare("SELECT * FROM clients WHERE userName = ? ");
  $stm ->execute(array($username));
  $count = $stm->rowCount();
  if ($count > 0) {
  echo '<p class="text-danger">'; echo lang("userExists"); echo '</p>';
  exit();
}
else{
  echo '<p class="text-success">'; echo lang("userNotExist"); echo '</p>';
  exit();
}
}


                                        // CHECK IF EMAIL IS EXISTS
if (isset($_POST['email'])) {


$nonavbar="";
include("admin/connect.php");
include("admin/includes/languages/english.php");
$email = $_POST['email'];
$stm = $conn-> prepare("SELECT * FROM clients WHERE Email = ? ");
$stm ->execute(array($email));
$count = $stm->rowCount();
if ($count > 0) {
echo '<p class="text-danger">'; echo lang("emailexist"); echo '</p>';
exit();
}
else{
echo '<p class="text-success">'; echo lang("emailAvailable"); echo '</p>';
exit();
}
}

            // chieck if mobile store exists
if (isset($_POST['store_mobile'])) {
$nonavbar="";
include("admin/connect.php");
include("admin/includes/languages/english.php");
$store_mobile = $_POST['store_mobile'];
$stm = $conn-> prepare("SELECT * FROM sellers WHERE Mobile = ? ");
$stm ->execute(array($store_mobile));
$count = $stm->rowCount();
if ($count > 0) {
echo '<p class="text-danger">'; echo lang("mobileExist"); echo '</p>';
exit();
}

}


// PROMO
if (isset($_POST['promo']) && isset($_POST['itempormo'])) {
  include("admin/connect.php");
  include("admin/includes/languages/english.php");

  class PromoClass{
    public $promovalue;
    public $promoid;
  }

  $sql1 = $conn->prepare("SELECT * FROM promo WHERE PromoItem = ? AND  PromoCode = ?");
  $sql1->execute(array($_POST['itempormo'],$_POST['promo']));
  $fetc = $sql1->fetchAll();
  $promoarray = array();
  foreach ($fetc as $value) {
    $promoObj = new  PromoClass();
    $promoObj->promovalue = $value['Discount'];
    $promoObj->promoid = $value['PromoID'];
    $promoarray[] = $promoObj;
  }
echo json_encode(array("promo"=>$promoarray));

}



}







 ?>
