<?php 
session_start();
include("admin/connect.php");
include("admin/includes/languages/english.php");
$functions = "admin/includes/functions/";
include($functions."functions.php");
//adress
if(isset($_SESSION['user'])){

    function check_if_addrss_already_used($adreesid){
        global $conn;
        $stmt = $conn->prepare("SELECT count(OrderID),OrderID from orders WHERE Adress = :ADDRESSID");
        $stmt->bindParam(":ADDRESSID",$adreesid,PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        return $count;
  
    }


if(check_if_addrss_already_used($_GET["adressid"]) > 0 ){
 header("location:profile.php?#address_alreadu_used");


}else{

    $clientid = getclientID($_SESSION['user']);
if (isset($_SESSION['user'])) {

$sql = $conn->prepare("SELECT ClientID FROM adress WHERE AdressID = :ADRESSID");
$sql->bindParam(":ADRESSID",$_GET["adressid"],PDO::PARAM_INT);
$sql->execute();
$fetc =$sql->fetchAll();
$CLIENTID = "" ;
foreach($fetc as $value ){
    $CLIENTID  = $value ["ClientID"];
}

        if(isset($_GET["delete_adress"]) && $CLIENTID == $clientid  && isset($_GET["adressid"])  ){

            $stmt = $conn->prepare("DELETE FROM adress where AdressID = :ADDRESSID");
            $stmt->bindParam(":ADDRESSID",$_GET["adressid"],PDO::PARAM_INT);
            $stmt->execute();
            $rowcut = $stmt->rowCount();
            if($rowcut>0){
                header("location:profile.php?#succed_delete");
                exit();
            }else{
                header("location:profile.php?#something_wrong");
                exit();
            }
           
         
          }

    }
}





}

?>