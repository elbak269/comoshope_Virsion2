<?php

session_start();

if(isset($_SESSION['user'])){

  include("admin/connect.php");
  include("admin/includes/languages/english.php");
  $functions = "admin/includes/functions/";
  include($functions."functions.php");

if (isset($_POST["remove"])  &&  isset($_POST["product_id"])  && isset($_POST["seller__"])   ) {

  if (getsellerid($_SESSION['user']) == $_POST["seller__"]) {

        $stmt = $conn->prepare("UPDATE  items SET Status_Visible = 2 WHERE ItemID = :PRODUCT_ID");
        $stmt->bindParam(":PRODUCT_ID",$_POST["product_id"],PDO::PARAM_INT);
        $stmt->execute();


        if ($stmt->rowCount() > 0) {
          echo "1";
          /*
          $stmt_netw = $conn->prepare("DELETE FROM network_for_product WHERE Product_ID = :PRODUCT_ID");
          $stmt_netw->bindParam(":PRODUCT_ID",$_POST["PRODUCT_ID"],PDO::PARAM_INT);
          $stmt_netw->execute();

          $stmt_payment = $conn->prepare("DELETE FROM payemts_allow_detais WHERE ProductID = :PRODUCT_ID");
          $stmt_payment->bindParam(":PRODUCT_ID",$_POST["PRODUCT_ID"],PDO::PARAM_INT);
          $stmt_payment->execute(); */


        }else{
          echo "0";
        }

      }

  }
  else if(isset($_POST["product_name"]) && isset($_POST["product_id"])){
    class status{
      public $status;
      public $result;

    }

    $obj = new status();
    $obj->status = "1";
    $obj->result =get_product_name_by_id($_POST["product_id"]);

    echo json_encode($obj);

  }




}


 ?>
