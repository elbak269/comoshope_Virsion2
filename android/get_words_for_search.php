<?php
//get_words_for_search.php

include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");


if(isset($_POST["get_all_products_names_and_tags"])){
echo json_encode(get_words_for_search());
}else if(isset($_POST["get_all_categotry_and_brand"])  ){

  class brand {
    public $brand_id;
    public $brand_name;
  }
  $mybrand = array();
  foreach (get_all_brand() as  $value) {
    $myobj = new  brand();
    $myobj->brand_id = $value["BrandID"];
    $myobj->brand_name = $value["BrandName"];
    $mybrand[] = $myobj;
  }



  class category {
    public $cate_id;
    public $cate_name;
  }
  $mycateg = array();
  foreach (get_all_category() as  $value) {
    $myobj = new  category();
    $myobj->cate_id = $value["CategoryID"];
    $myobj->cate_name = $value["Name"];
    $mycateg[] = $myobj;
  }


  echo json_encode(array(
    "category" => $mycateg,
    "brand"    => $mybrand
  ));



}else if(isset($_POST["INSERT_SEARCHED_WORD"]) && isset($_POST["word"]) && isset($_POST["ip"])){


  function get_client_ip() {
      $ipaddress = '';
      if (isset($_SERVER['HTTP_CLIENT_IP']))
          $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
      else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
          $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
      else if(isset($_SERVER['HTTP_X_FORWARDED']))
          $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
      else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
          $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
      else if(isset($_SERVER['HTTP_FORWARDED']))
          $ipaddress = $_SERVER['HTTP_FORWARDED'];
      else if(isset($_SERVER['REMOTE_ADDR']))
          $ipaddress = $_SERVER['REMOTE_ADDR'];
      else
          $ipaddress = 'UNKNOWN';
      return $ipaddress;
  }

$ip =  get_client_ip();

if(check_word_eixts($_POST["word"]) > 0){

  $stmt = $conn->prepare("UPDATE serched_word SET Count_Times = Count_Times+1 WHERE Word = :WORD");
  $stmt->bindParam(":WORD",$_POST["word"],PDO::PARAM_STR);
  $stmt->execute();
  $SEARCHED_ID =  GET_WORD_ID_FOR_SEARCH($_POST["word"]);
  if($stmt->rowCount()>0){
    $stmt2 = $conn->prepare("INSERT INTO time_searched_word (Searched_word_Id,IP,Date_SEARCHED) VALUES(:SEARCHED_ID,:ip,NOW())");
    $stmt2->bindParam(":SEARCHED_ID",$SEARCHED_ID,PDO::PARAM_INT);
    $stmt2->bindParam(":ip",$ip,PDO::PARAM_STR);
    $stmt2->execute();

  }

}else{
  $coutims = 1;
$stmt = $conn->prepare("INSERT INTO serched_word (Word,Count_Times) VALUES(:WORD,:COUNTIMES)");
$stmt->bindParam(":WORD",$_POST["word"],PDO::PARAM_STR);
$stmt->bindParam(":COUNTIMES",$coutims,PDO::PARAM_STR);
$stmt->execute();
$SEARCHED_ID =  $conn->lastInsertId();
if($stmt->rowCount()>0){
  $stmt2 = $conn->prepare("INSERT INTO time_searched_word (Searched_word_Id,IP,Date_SEARCHED) VALUES(:SEARCHED_ID,:ip,NOW())");
  $stmt2->bindParam(":SEARCHED_ID",$SEARCHED_ID,PDO::PARAM_INT);
  $stmt2->bindParam(":ip",$ip,PDO::PARAM_STR);
  $stmt2->execute();

}
}
}

 ?>
