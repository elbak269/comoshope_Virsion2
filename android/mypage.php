<?php

include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");

if(isset($_POST["mypage_id"]) &&  isset($_POST["CLIENTID"]) ){

  $stmt = $conn->prepare("SELECT  client_page_id FROM client_page
    INNER JOIN clients ON clients.ClientID = client_page.ClientID
    WHERE client_page.ClientID = :ClientID");
  $stmt->bindParam(":ClientID",$_POST["CLIENTID"],PDO::PARAM_INT);
  $stmt->execute();
  $fetc = $stmt->fetchAll();
  $page_id  ="";
  foreach ($fetc as $value) {
      $page_id = $value["client_page_id"];
    }

 $my_page_url  = "mypage.php?user=".$page_id;
 class url {
   public $url;
 }
 $myob = new url();
 $myob ->url = $my_page_url;
echo json_encode($myob);

} else if(isset($_POST["update_pagenam"]) && isset($_POST["page_name_input"]) && isset($_POST["clientid"])){
    $page_name_input = trim($_POST["page_name_input"]);
    $stmt = $conn->prepare("UPDATE client_page
      INNER JOIN clients on clients.ClientID  = client_page.ClientID
      SET PageName = :PAGENAME WHERE client_page.ClientID = :CLIENTID ");
      $stmt->bindParam(":PAGENAME",$page_name_input,PDO::PARAM_STR);
      $stmt->bindParam(":CLIENTID",$_POST["clientid"],PDO::PARAM_STR);
      $stmt->execute();
      if($stmt->rowCount() > 0){

      class result {
        public $result;
      }

      $obj = new result();
      $obj->result = "1";
      echo json_encode($obj);
      }else{
        $obj = new result();
        $obj->result = "0";
        echo json_encode($obj);
      }
  }
  else if( isset($_POST["get_pagenam"]) && isset($_POST["clientid"])){
        class result {
          public $result;
        }

        $obj = new result();
        $obj->result = get_page_name($_POST["clientid"]);
        echo json_encode($obj);

    }

else if( isset($_POST["get_pagedescription"]) && isset($_POST["clientid"])){
          class result {
            public $result;
          }

          $obj = new result();
          $obj->result = page_description($_POST["clientid"]);
          echo json_encode($obj);

  }
  else if(isset($_POST["update_page_descr"]) && isset($_POST["pagedsecttetare"])&&  isset($_POST["clientid"])){
    $pagedsecttetare = trim($_POST["pagedsecttetare"]);
      $stmt = $conn->prepare("UPDATE client_page
        INNER JOIN clients on clients.ClientID  = client_page.ClientID
        SET Description = :PAGE_DESCRI WHERE client_page.ClientID = :CLIENTID ");
        $stmt->bindParam(":PAGE_DESCRI",$pagedsecttetare,PDO::PARAM_STR);
        $stmt->bindParam(":CLIENTID",$_POST["clientid"],PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount() > 0){
          class result {
            public $result;
          }

          $obj = new result();
          $obj->result = "1";
          echo json_encode($obj);

        }else{
          class result {
            public $result;
          }

          $obj = new result();
          $obj->result = "0";
          echo json_encode($obj);
        }
    }

    else if(isset($_POST["get_show_img_staet"]) &&  isset($_POST["clientid"])){

    global $conn;
    $stmt = $conn->prepare("SELECT  show_img FROM client_page
      INNER JOIN clients ON clients.ClientID = client_page.ClientID
      WHERE client_page.ClientID = :ClientID");
    $stmt->bindParam(":ClientID",$_POST["clientid"],PDO::PARAM_INT);
    $stmt->execute();
    $fetc = $stmt->fetchAll();
    $show_img1 ="";
    foreach ($fetc as $value) {
        $show_img1 = $value["show_img"];
    }



    class result {
      public $result;
    }
    $obj = new result();
    $obj->result = $show_img1;
    echo json_encode($obj);

  }

  else if (isset($_POST["show_img_stat"]) && isset($_POST["change_show_img_state"]) &&  isset($_POST["clientid"])){
    $stmt = $conn->prepare("UPDATE client_page
      INNER JOIN clients on clients.ClientID  = client_page.ClientID
      SET show_img = :SHOWIMG WHERE client_page.ClientID = :CLIENTID ");
      $stmt->bindParam(":SHOWIMG",$_POST["show_img_stat"],PDO::PARAM_STR);
      $stmt->bindParam(":CLIENTID",$_POST["clientid"],PDO::PARAM_STR);
      $stmt->execute();
      if($stmt->rowCount() > 0){

      echo json_encode("1");
      }else{
        echo json_encode("0");
      }

  }

  else if ( isset($_POST['get_user_img_email']) &&  isset($_POST['username']) && isset($_POST['client']) ) {
    class Client{
     public $username;
      public $image;
      public $email;
    }

  $sql = $conn->prepare("SELECT * FROM clients WHERE Username = :USERNAME");
   $sql ->bindParam(":USERNAME",$_POST['username'],PDO::PARAM_STR,255);
  $sql->execute();
  $FETCH = $sql->fetchAll();
  $MYPATHPIC = array();
  foreach ($FETCH AS $VALUE) {
    $myobj = new  Client();
    $myobj->username = $VALUE['Username'];
    $myobj->email = $VALUE['Email'];
    $myobj->image = $VALUE['Avatar'];
   $MYPATHPIC [] =  $myobj;
  }
  echo json_encode(array("client"=>$MYPATHPIC));
  }
  else if ( isset($_POST['get_page_info_for_cards'])  && isset($_POST['client']) ) {
    class mypage_data {
      public $all_rewards_amount;
      public $all_rewards_amount_times;
      public $all_rewards_withdrawn;
      public $amount_available_for_withd;
      public $pedding_rewards;
      public $max_rewards_for_withdrawn;
    }

    function count_pedding_rewareds($clientid){
      global $conn;
      $sql = $conn->prepare("SELECT COUNT(orders_details_id)  FROM orderdetails WHERE reward_for_client_id = :CLIENTID AND StatusOrder =3 " );
      $sql->bindParam(":CLIENTID",$clientid,PDO::PARAM_INT);
      $sql ->execute();
      $fetch2 = $sql->fetchColumn();
      return $fetch2;
    }
      function count_all_rewards(){
        global $conn;
        $sql = $conn->prepare("SELECT COUNT(orders_details_id) FROM orderdetails WHERE reward_for_client_id = :REWARDS_CLIENT" );
        $sql->bindParam(":REWARDS_CLIENT",$_POST['client'],PDO::PARAM_INT);
        $sql ->execute();
        $fetc  = $sql->fetchColumn();
        return $fetc;

      }



     function reward_withdrawn($clientid){
       global $conn;
       $sql = $conn->prepare("SELECT SUM(Amount) AS value_sum FROM reward_withdrawn WHERE ClientID = :CLIENTID" );
       $sql->bindParam(":CLIENTID",$clientid,PDO::PARAM_INT);
       $sql ->execute();
       $fetch = $sql->fetchAll();
       $mysum = "";
       foreach ($fetch as  $value) {
         $mysum =$value["value_sum"];
       }
       return $mysum;
     }
     $pedding_reward = count_pedding_rewareds($_POST['client']) * $reward_client;
     $amout_AVALIABLEsponible = (count_all_rewards() * $reward_client)-reward_withdrawn($_POST['client']);

      $obje = new mypage_data();
      $REWRDS_FOR_ALLTIME = count_all_rewards() * $reward_client;
      $obje->all_rewards_amount             = $REWRDS_FOR_ALLTIME;
      $obje->all_rewards_amount_times       = count_all_rewards();
      $obje->all_rewards_withdrawn          = reward_withdrawn($_POST['client']);
      $obje->amount_available_for_withd     =  $amout_AVALIABLEsponible;
      $obje->pedding_rewards                =  $pedding_reward;
      $obje->max_rewards_for_withdrawn      =  $max_amountodr_withdrawn;

      echo json_encode($obje);





  }







?>
