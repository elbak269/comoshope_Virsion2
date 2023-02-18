<?php
ob_start();
session_start();
include("admin/connect.php");
include("admin/includes/languages/english.php");
include("admin/includes/functions/functions.php");

if (isset($_POST["name"]) && isset($_POST["id"]) && isset($_POST["user"])) {
  $name  = $_POST["name"];
  $id    = $_POST["id"];
  $user = $_POST["user"];
  $stm = $conn->prepare("UPDATE clients SET FullName = ? WHERE ClientID=? AND Username =?");
  $stm -> execute(array($name,$id,$user));
  $count = $stm->rowCount();
  if ($count>0) {
    ?>
    <div class="alert alert-success" role="alert">
<?php echo lang("successfulPreogress");  ?>
</div>
    <?php
  }
  else {
    ?>
    <div class="alert alert-danger" role="alert">
<?php echo lang("failedProgress");  ?>
</div>
    <?php
  }

}

else if (isset($_POST["id_address"]) && isset($_POST['user_address'])) {
   $id_address = $_POST["id_address"];
   $usern = $_POST['user_address'];

                  // ONLY COUNTRY
if (isset($_POST['country']) && !empty($_POST['country'])) {
$country = $_POST['country'];
$stmt = $conn->prepare("UPDATE clients SET Country = ?   WHERE ClientID=? AND Username =? ");
$stmt -> execute(array($country,$id_address,$usern));
$row  =  $stmt-> rowCount();
if ($row > 0) {
  ?>
  <div class="alert alert-success" role="alert">
<?php echo lang("successfulPreogress");  ?>
</div>
  <?php

}
else {
  ?>
  <div class="alert alert-danger" role="alert">
<?php echo lang("failedProgress");   ?>
</div>
  <?php
}

}
                   // ISLAND AND GOUVERNORATE AND CITY

   if (isset($_POST["island"]) && isset($_POST['gouvernorate']) && isset($_POST['island_id']) && isset($_POST['id_city'])) {
     $island = $_POST['island_id'];
    $gourna = $_POST['gouvernorate'];
    $id_city = $_POST['id_city'];
     $country = $_POST['country'];

     $stmt = $conn->prepare("UPDATE clients SET  Island = ?, Gouvernorate = ?, City = ? WHERE  ClientID  = ? AND  Username = ? ");
      $stmt -> execute(array($island,$gourna ,$id_city,$id_address,$usern));
      $row  =  $stmt-> rowCount();
      if ($row > 0) {
        ?>
        <div class="alert alert-success" role="alert">
      <?php echo lang("successfulPreogress");  ?>
      </div>
        <?php

      }
      else {
        ?>
        <div class="alert alert-danger" role="alert">
    <?php echo lang("failedProgress");   ?>
    </div>
        <?php
      }

   }

 }

 else if (isset($_POST["email_id"]) && isset($_POST["email_user"]) && isset($_POST['email_input'])) {
$EMAILID = $_POST["email_id"];
$EMAILUSER = $_POST["email_user"];
$EMAILINPUT = $_POST['email_input'];

   $checkemail = cheick_exist("Email", "clients" ,$EMAILINPUT);
   $result = array();
   if ($checkemail > 0) {
     $result [] = "<div class= 'alert alert-danger' role='alert'>".lang('emailexist')."</div>";
   }
   else {
     $stm = $conn->prepare("UPDATE clients SET Email = ? WHERE ClientID  = ? AND  Username = ? ");
     $stm -> execute(array($EMAILINPUT,$EMAILID,$EMAILUSER));
     $row = $stm->rowCount();

     if($row < 1){
       $result [] = "<div class='alert alert-success'>".lang('failedProgress')."</div>";
     }
     else {
       $result [] = "<div class='alert alert-success'>".lang('successfulPreogress')."</div>";
     }
   }
   foreach ($result as $value) {
     echo $value;
   }


 }

 else if (isset($_POST['mobile_id']) && isset($_POST['mobile_user']) && isset($_POST['mobile_input']) ) {
   $mobile_id = $_POST['mobile_id'];
   $mobile_user = $_POST['mobile_user'];
   $mobile_input = $_POST['mobile_input'];
   $result = array();
   $chek = cheick_exist("Mobile", "clients" ,$mobile_input);


if ($chek > 0) {
    $result [] = "<div class= 'alert alert-danger' role='alert'>".lang('emailexist')."</div>";
  }
  else {
    $stm = $conn-> prepare("UPDATE clients SET Mobile = ? WHERE ClientID  = ? AND  Username = ? ");
    $stm->execute(array($mobile_input,$mobile_id,$mobile_user));
    $row = $stm->rowCount();
    if ($row > 0) {
      $result[] = "<div class='alert alert-success'>".lang('successfulPreogress')."</div>";
    }
    else {
      $result[] = "<div class='alert alert-danger'>".lang('failedProgress')."</div>";
    }
  }
  foreach ($result as  $value) {
    echo $value;
  }

 }


else if (isset($_POST["update_adress"]) && isset($_POST["adress"]) && isset($_SESSION["user"])) {

  $stm = $conn->prepare("UPDATE clients SET Adress = :adress WHERE Username = :USER");
  $stm->bindParam(":USER",$_SESSION["user"],PDO::PARAM_STR);
  $stm->bindParam(":adress",$_POST["adress"],PDO::PARAM_STR);
  $stm->execute();
  if ($stm->rowCount() > 0) {
    ?>
    <div class="alert alert-success" role="alert">
     <?php echo lang("successfulPreogress");  ?>
   </div>
    <?php
  }else{
    echo "0";
  }
}





ob_end_flush();

 ?>
