<?php 
 include("../admin/connect.php");

if(isset($_POST["report_problem"]) && isset($_POST["COMMENT"])  && isset($_POST["clienid"]) && isset($_POST["IMG"]) && isset($_POST["USERNAME"])){
    date_default_timezone_set("Africa/Cairo");
    $date1 = str_replace("/","",date("y/m/d:h:i:sa"));
    $date = str_replace(":","",$date1);
    $rand = rand(1,900);
    $resultname = $rand.$date;
  
  $all_path ;
    $pth  = "../theme/image/report_problem/".$_POST["USERNAME"]; //"../theme/image/test/".$_POST['USERNAME'];
    if($_POST["IMG"] != "NO_PIC"){
     // $DECODING = base64_decode($_POST["IMG"].".JPG");
      $decodingimg = base64_decode($_POST["IMG"]."JPG");
      if( !file_exists($pth) ){
       // mkdir($pth);
       mkdir($pth,0777,true);
      }
      $all_path =$pth."/".$resultname.".JPG";
      file_put_contents($all_path,$decodingimg);
      
    }else{
      $all_path = null;
    }
  
    $stmt = $conn->prepare("INSERT INTO report_problem (Client_id,date_comment,Comment,Image_comment) VALUES(:CLIENTID, NOW(),:COMMENT,:IMAGE_COMMENT)");
    $stmt-> bindParam(":CLIENTID",$_POST["clienid"],PDO::PARAM_INT);
    $stmt-> bindParam(":COMMENT",$_POST["COMMENT"],PDO::PARAM_STR,255);
    $stmt-> bindParam(":IMAGE_COMMENT",$all_path,PDO::PARAM_STR,255);
    $stmt->execute();
    $myrow = $stmt->rowCount();
    if($myrow>0){
     echo  "1";
    }else{
        echo "0";
    }

  
  
  }










?>