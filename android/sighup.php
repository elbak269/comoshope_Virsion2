<?php
include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");

if(isset($_POST["sign_up"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])){
$date1 = str_replace("/","",date("y/m/d:h:i:sa"));
$date = str_replace(":","",$date1);
$rand = rand(1,900);
$CODE_CHAT = $rand.$date;
$username =  $_POST["username"];
$password = $_POST["password"];

$stmt = $conn->prepare("INSERT INTO clients (Username,Password,Email,CodeChat) VALUES(:USERNAME,:PASSWORD,:EMAIL,:CODECHAT)");
$stmt->bindParam(":USERNAME",$_POST["username"],PDO::PARAM_STR,255);
$stmt->bindParam(":PASSWORD",$_POST["password"],PDO::PARAM_STR,255);
$stmt->bindParam(":EMAIL",$_POST["email"],PDO::PARAM_STR,255);
$stmt->bindParam(":CODECHAT",$CODE_CHAT,PDO::PARAM_STR,255);
$stmt->execute();
$rowc = $stmt->rowCount();
if ($rowc>0) {


$clientid = getclientID($username);
$rand = rand(10000000,99999999);
$result_clitn_page_id = $clientid+$rand;
$descr = "Description";
$stmt = $conn->prepare("INSERT INTO client_page (client_page_id,ClientID,Description,PageName)VALUES(:CLIENTPAGE_ID,:CLIENTID,:DESCRIPTION,:PAGENAME)");
$stmt -> bindParam(":CLIENTPAGE_ID",$result_clitn_page_id,PDO::PARAM_INT);
$stmt -> bindParam(":CLIENTID",$clientid,PDO::PARAM_INT);
$stmt -> bindParam(":DESCRIPTION",$descr,PDO::PARAM_STR);
$stmt -> bindParam(":PAGENAME",$_POST["username"],PDO::PARAM_STR);
$stmt -> execute();


if($stmt->rowCount()>0){

  class  check{
  public  $username;
  public  $email;
  public  $clientid;
  }
  $stmt1 = $conn->prepare("SELECT Username,Email,ClientID FROM Clients WHERE Username = :USERNAME AND Password= :PASSWORD");
  $stmt1->bindParam(":USERNAME",$username,PDO::PARAM_STR,255);
  $stmt1->bindParam(":PASSWORD",$password,PDO::PARAM_STR,255);
  $stmt1->execute();
  $arr = array();
 $result = $stmt1->fetchAll();
  foreach ($result AS $value) {
    $chek = new check();
    $chek->username = $value["Username"];
    $chek->email = $value["Email"];
    $chek->clientid = $value["ClientID"];
    $arr[]= $chek;
  }
  echo json_encode(array("result" => $arr));
}else{
  echo "0";
}

}






}elseif (isset($_POST["check_user"]) && isset($_POST["USERNAME"]) ) {
  $stmt = $conn->prepare("SELECT ClientID FROM clients where Username = :USERNAME  ");
  $stmt->bindParam(":USERNAME",$_POST["USERNAME"],PDO::PARAM_STR);
  $stmt->execute();
  $rowc = $stmt->rowCount();
  if ($rowc>0) {
  echo "1";
  }else{
    echo "0";
  }

}
elseif (isset($_POST["check_email"]) && isset($_POST["EMAIL"]) ) {
  $stmt = $conn->prepare("SELECT ClientID FROM clients where Email = :EMAIL  ");
  $stmt->bindParam(":EMAIL",$_POST["EMAIL"],PDO::PARAM_STR);
  $stmt->execute();
  $rowc = $stmt->rowCount();
  if ($rowc>0) {
  echo "1";
  }else{
    echo "0";
  }

}












 ?>
