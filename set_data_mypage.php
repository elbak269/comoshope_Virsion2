
<?php

ob_start();
session_start();
include("admin/connect.php");
include("admin/includes/languages/english.php");
$functions = "admin/includes/functions/";
include($functions."functions.php");
$clientid = getclientID($_SESSION['user']);

if(isset($_SESSION['user'])){

  if(isset($_POST["update_pagenam"]) && isset($_POST["page_name_input"])){
    $page_name_input = trim($_POST["page_name_input"]);
    $stmt = $conn->prepare("UPDATE client_page
      INNER JOIN clients on clients.ClientID  = client_page.ClientID
      SET PageName = :PAGENAME WHERE client_page.ClientID = :CLIENTID ");
      $stmt->bindParam(":PAGENAME",$page_name_input,PDO::PARAM_STR);
      $stmt->bindParam(":CLIENTID",$clientid,PDO::PARAM_STR);
      $stmt->execute();
      if($stmt->rowCount() > 0){

      echo json_encode("1");
      }else{
        echo json_encode("0");
      }
  }

else if(isset($_POST["update_page_descr"]) && isset($_POST["pagedsecttetare"])){
  $pagedsecttetare = trim($_POST["pagedsecttetare"]);
    $stmt = $conn->prepare("UPDATE client_page
      INNER JOIN clients on clients.ClientID  = client_page.ClientID
      SET Description = :PAGE_DESCRI WHERE client_page.ClientID = :CLIENTID ");
      $stmt->bindParam(":PAGE_DESCRI",$pagedsecttetare,PDO::PARAM_STR);
      $stmt->bindParam(":CLIENTID",$clientid,PDO::PARAM_STR);
      $stmt->execute();
      if($stmt->rowCount() > 0){

      echo json_encode("1");
      }else{
        echo json_encode("0");
      }
  }
  else if (isset($_POST["show_img_stat"]) && isset($_POST["change_show_img_state"])){
    $stmt = $conn->prepare("UPDATE client_page
      INNER JOIN clients on clients.ClientID  = client_page.ClientID
      SET show_img = :SHOWIMG WHERE client_page.ClientID = :CLIENTID ");
      $stmt->bindParam(":SHOWIMG",$_POST["show_img_stat"],PDO::PARAM_STR);
      $stmt->bindParam(":CLIENTID",$clientid,PDO::PARAM_STR);
      $stmt->execute();
      if($stmt->rowCount() > 0){

      echo json_encode("1");
      }else{
        echo json_encode("0");
      }

  }
}

?>
