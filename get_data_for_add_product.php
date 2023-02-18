<?php

session_start();
include("admin/connect.php");
include("admin/includes/languages/english.php");
$functions = "admin/includes/functions/";
include($functions."functions.php");

if(isset($_POST["get_self_ship"])){
  $stm = $conn->prepare("SELECT * FROM shipping WHERE  ShippingID = 3 ");
  $stm ->execute();
  $fetc = $stm->fetChAll();

  $res =  '<div class="form-group">';
  $res .= '<label for="ship_metho_ngazidja"><?php echo lang("shippingMethod")." ".lang("to")." ".lang("ngazidja")?></label> <span class="reqired">*</span>';
  $res .= '<select id="ship_metho_ngazidja" class="form-control" name="ship_metho_ngazidja">';
  foreach ($fetc as  $value) {
  $res .= "<option  value='".$value['ShippingID']."' >".$value["ShippingName"]."</option>";
  }
  $res .= '</select>';
  $res .= '</div>';
echo $res;
}

 ?>
