<?php

 include("../admin/connect.php");
 $functions = "../admin/includes/functions/";
include($functions."functions.php");

 class adress{
    public  $adress;
    public $adress_id;
 }

 if(isset($_POST["adress"]) && isset($_POST["clienid"])){

$stmtsel = $conn -> prepare("SELECT CityName,GouvernoratName,PlaceDescription ,AdressID FROM adress 
LEFT JOIN gouvernorate ON gouvernorate.GovernorateID = adress.Gouvernorate
LEFT JOIN cities ON   cities.CityID =  adress.City
WHERE ClientID = :CLIENTD  ORDER BY AdressID DESC LIMIT 6 
");
$stmtsel->bindParam(":CLIENTD",$_POST["clienid"],PDO::PARAM_INT);
$stmtsel ->execute();
$fect = $stmtsel -> fetchAll();
$myary = array();
foreach($fect as $value){
$adress_object = new adress();
$gouvern = "";
$placedesc= "";
if ($value["GouvernoratName"] == null){
    $gouvern ="";
}else{
    $gouvern = $value["GouvernoratName"];
}

if ($value["PlaceDescription"] == null){
    $placedesc ="";
}else{
    $placedesc = $value["PlaceDescription"];
}
$adress_object->adress = $value["CityName"]."  ".$gouvern."  ".$placedesc;
$adress_object->adress_id = $value["AdressID"];
$myary [] = $adress_object;

    }

    echo json_encode(array("adress" => $myary));
    

}else  if(isset($_POST["get_allgouvernorate"]) && isset($_POST["island_id"])){

    class gouvernorate{
        public $GovernorateID;
        public $GouvernoratName;
        public $IslandID;

    }

    $stmt = $conn->prepare("SELECT * FROM gouvernorate WHERE IslandID = :ISLANDID");
    $stmt->bindParam(":ISLANDID",$_POST["island_id"],PDO::PARAM_INT);
    $stmt->execute();
    $fetc =  $stmt->fetchAll();
    $myarra = array();
    foreach($fetc as  $value){
        $myobject = new gouvernorate();
        $myobject->GouvernoratName = $value["GouvernoratName"];
        $myobject->GovernorateID  = $value["GovernorateID"];
        $myobject->IslandID  = $value["IslandID"];
        $myarra[] =  $myobject;
    }
   echo  json_encode(array("gouvernorate" => $myarra));



}else if(isset($_POST["get_island"])){

    class island{
        public $IslandID;
        public $IslandName;
 

    }

    $stmt = $conn->prepare("SELECT * FROM islands");
    $stmt->execute();
    $fetc =  $stmt->fetchAll();
    $myarra = array();
    foreach($fetc as  $value){
        $myobject = new island();
        $myobject->IslandID = $value["IslandID"];
        $myobject->IslandName  = $value["IslandName"];
        $myarra[] =  $myobject;
    }
   echo  json_encode(array("islands" => $myarra));



}else if(isset($_POST["get_cities"]) && isset($_POST["gouvernorateid"]) && isset($_POST["islandid"])){

   
    class citiy{
        public $CityID;
        public $CityName;
        public $GovernorateID;
        public $IslandID;

    }

    $stmt = $conn->prepare("SELECT * FROM cities WHERE GovernorateID = :GOUVERNORATEID AND IslandID = :ISLANDID");
    $stmt->bindParam(":GOUVERNORATEID",$_POST["gouvernorateid"],PDO::PARAM_INT);
    $stmt->bindParam(":ISLANDID",$_POST["islandid"],PDO::PARAM_INT);
    $stmt->execute();
    $fetc =  $stmt->fetchAll();
    $myarra = array();
    foreach($fetc as  $value){
        $myobject = new citiy();
        $myobject->CityID = $value["CityID"];
        $myobject->CityName  = $value["CityName"];
        $myobject->GovernorateID  = $value["GovernorateID"];
        $myobject->IslandID = $value["IslandID"];
        $myarra[] =  $myobject;
    }
   echo  json_encode(array("cities" => $myarra));

}
else if(isset($_POST["get_countries"])){

    class country{
        public $CountryID;
        public $CountryName;


    }

    $stmt = $conn->prepare("SELECT * FROM countries");
    $stmt->execute();
    $fetc =  $stmt->fetchAll();
    $myarra = array();
    foreach($fetc as  $value){
        $myobject = new country();
        $myobject->CountryID = $value["CountryID"];
        $myobject->CountryName  = $value["CountryName"];
   
        $myarra[] =  $myobject;
    }
   echo  json_encode(array("countries" => $myarra));



}
else if(isset($_POST["add_new_adress"]) && isset($_POST["countryid"]) &&  isset($_POST["cityid"])  &&  isset($_POST["clientid"]) ){

   
    
$gouvernorateid = null;
$islandid = null;
    if($_POST["GOUVERNORATE"] != ""||  $_POST["GOUVERNORATE"] != null ||  $_POST["island"] != "" || $_POST["island"] != null ){
        $gouvernorateid = $_POST["GOUVERNORATE"];
        $islandid = $_POST["island"];
    }

    $placedecsription = null;
    if($_POST["place_description"] != "" || $_POST["place_description"] != null){
     $placedecsription = $_POST["place_description"];
    }




    $stmt = $conn->prepare("INSERT INTO adress (City,Gouvernorate,ClientID,PlaceDescription,IslandID,CountryID) VALUES(:CITYID,:GOUVERNORATE,:CLIENTID,:PLACEDECRIPTION,:ISLANDID,:COUNTYID)");
    $stmt->bindParam(":CITYID",$_POST["cityid"],PDO::PARAM_INT);
    $stmt->bindParam(":GOUVERNORATE",$gouvernorateid,PDO::PARAM_INT);
    $stmt->bindParam(":CLIENTID",$_POST["clientid"],PDO::PARAM_INT);
    $stmt->bindParam(":PLACEDECRIPTION",$placedecsription,PDO::PARAM_STR);
    $stmt->bindParam(":ISLANDID",$islandid,PDO::PARAM_INT);
    $stmt->bindParam(":COUNTYID",$_POST["countryid"],PDO::PARAM_INT);
    $stmt->execute();
    $row =  $stmt->rowCount();
    if($row >0){
        echo "1";
    }else{
        echo "0";
    }


}
else if(isset($_POST["get_cities_BYCOUNTY"]) && isset($_POST["countryid"])){

   
    class citiy{
        public $CityID;
        public $CityName;
        public $GovernorateID;
        public $IslandID;

    }

    $stmt = $conn->prepare("SELECT * FROM cities WHERE CountrID = :COUNTRYID");
    $stmt->bindParam(":COUNTRYID",$_POST["countryid"],PDO::PARAM_INT);
    $stmt->execute();
    $fetc =  $stmt->fetchAll();
    $myarra = array();
    foreach($fetc as  $value){
        $myobject = new citiy();
        $myobject->CityID = $value["CityID"];
        $myobject->CityName  = $value["CityName"];
        $myobject->GovernorateID  = $value["GovernorateID"];
        $myobject->IslandID = $value["IslandID"];
        $myarra[] =  $myobject;
    }
   echo  json_encode(array("cities" => $myarra));

}
else if(isset($_POST["delete_address_by_id"]) && isset($_POST["adress_id"])){

    function check_if_addrss_already_used($adreesid){
        global $conn;
        $stmt = $conn->prepare("SELECT count(OrderID),OrderID from orders WHERE Adress = :ADDRESSID");
        $stmt->bindParam(":ADDRESSID",$_POST["adress_id"],PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        return $count;
  
    }

if(check_if_addrss_already_used($_POST["adress_id"]) > 0){

echo "3";

}else{

    $stmt = $conn->prepare("DELETE FROM adress WHERE AdressID = :ADRESSID");
    $stmt->bindParam(":ADRESSID",$_POST["adress_id"],PDO::PARAM_INT);
    $stmt->execute();
    if( $stmt->rowCount()>0){
        echo "1";
    }else{
        echo "0";
    }

}


 
   


}






?>