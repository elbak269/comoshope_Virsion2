<?php
$login_css = " ";
$loginjs=" ";
session_start();
$errors=' ';

$notheader="";
include("init.php");
if ($_SERVER['REQUEST_METHOD']=="POST") {
  if (isset($_GET['do']) && $_GET['do']=="login"){
    if (isset($_POST['username']) && isset($_POST['password']) ) {
      $user                = $_POST['username'];
      $password            = $_POST['password'];
      $stmt = $conn->prepare("SELECT Username,Password From  clients WHERE Username = :USERNAME AND Password = :PASSWORD");
      $stmt->bindParam(":USERNAME",$user,PDO::PARAM_STR);
      $stmt->bindParam(":PASSWORD",$password,PDO::PARAM_STR);
      $stmt->execute();
      $fecth =  $stmt->fetch();
      $row = $stmt->rowCount();
      if ($row >0) {
        $_SESSION["user"]=$user;

        if(isset($_GET["dash_bord__"])){
          $CLIENT_ID = getclientID($_SESSION['user']);
          ifseller_is_exists($CLIENT_ID);
          if(ifseller_is_exists($CLIENT_ID) > 0){
            header("location:dashboard.php?dashboard-dash");
            exit();
          }else {
            header("location:comoshopseller.php");
            exit();
          }

        }
        else if(isset($_GET["apyment"]) && isset($_GET["itemid"])){
          header("location:payment.php?itemid=".$_GET["itemid"]." ");
          exit();
        }
        else{
          header("location:index.php");
          exit();


        }


      }
      else {
        echo '<div class="alert_eror text-center">
              '.lang('wrongBothEP').'
        </div>';
      }
    }

  }

  if (isset($_GET['do']) && $_GET['do']=="up") {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['password']) && isset($_POST['repassword'])){
      $errors=array();
      $username          = $_POST['username'];
      $email             = $_POST['email'];
      $firstname          =  $_POST['firstname'];
      $lastname          =  $_POST['lastname'];
      $password          = $_POST['password'];
      $repassword        = $_POST['repassword'];
      $checkemail = cheick_exist("Email", "clients" ,$email);
      $cheickuser = cheick_exist("Username", "clients" ,$username);

      if (Empty($username)) {
        $errors[] = lang('userCantEmpty');
      }
      elseif (empty($email)) {
        $errors[] = lang('emailCant');
      }
      elseif (empty($lastname)) {
        $errors[] = lang('lastname');
      }
      elseif (empty($firstname)) {
        $errors[] = lang('firstname');
      }
      elseif (empty($password)) {
        $errors[] = lang('passwordCant');
      }
      elseif (empty($repassword)) {
        $errors[] = lang('repasswordCant');
      }
      elseif ($password !==$repassword) {
        $errors[] = lang('passNotMatch');
      }
      elseif ($checkemail > 0) {
        $errors[] = lang('emailexist');
      }
      elseif ($cheickuser > 0) {
        $errors[] = lang('userExists');
      }




     foreach ($errors as $value) {
       echo '<div class="alert_eror text-center">
             '.$value.'
       </div>';
     }
     if (empty($errors)) {
       $full_name = $firstname." ".$lastname;
       $stmtup = $conn->prepare("INSERT INTO clients (Username,Password,Email,FullName,Date) VALUES(:USER,:PASS,:EMAIL,:FullName,NOW())");
       $stmtup->bindParam(":USER",$username,PDO::PARAM_STR);
       $stmtup->bindParam(":PASS",$password,PDO::PARAM_STR);
       $stmtup->bindParam(":EMAIL",$email,PDO::PARAM_STR);
       $stmtup->bindParam(":FullName",$full_name,PDO::PARAM_STR);
       $stmtup->execute();
       $row = $stmtup->rowCount();
       if ($row > 0) {
       $clientid = getclientID($username);
      $rand = rand(10000000,99999999);
      $result_clitn_page_id = $clientid+$rand;
      $descr = "Description";
      $stmt = $conn->prepare("INSERT INTO client_page (client_page_id,ClientID,Description,PageName)VALUES(:CLIENTPAGE_ID,:CLIENTID,:DESCRIPTION,:PAGENAME)");
      $stmt -> bindParam(":CLIENTPAGE_ID",$result_clitn_page_id,PDO::PARAM_INT);
      $stmt -> bindParam(":CLIENTID",$clientid,PDO::PARAM_INT);
      $stmt -> bindParam(":DESCRIPTION",$descr,PDO::PARAM_STR);
      $stmt -> bindParam(":PAGENAME",$username,PDO::PARAM_STR);
      $stmt -> execute();

      if ($stmt->rowCount() > 0) {
        $_SESSION["user"]=$username;
        header("location:profile.php");
        exit;

      }
      else {
        echo '<div class="alert_eror text-center">
              '.lang('problemTryAgain').'
        </div>';


      }

       }

     }  //  END IF THERE IS NO ANY RecursiveRegexIterator

    }


  }





}



 ?>
 <div class="container login">

    <h1 class="text-center" > <span class="active " data-class='form-login'><?php echo lang("login") ?></span>  |  <span class="" data-class='form-signup'><?php echo lang("signup") ?></span> </h1>
    <form class="form-login" action="<?php
    $_location = "?do=login";

    if(isset($_GET["apyment"]) && isset($_GET["itemid"])){
      $_location .= "&apyment=".$_GET["apyment"]."&itemid=".$_GET["itemid"];
    }
    echo $_SERVER["PHP_SELF"].$_location;  ?>" method="POST">
  <div class="form-group ">
    <label for="username"><?php echo lang("userName");?></label>
    <input name="username" type="text" autocomplete="off" class="form-control" id="username_login" aria-describedby="emailHelp" placeholder="<?php echo lang("enter")." ". lang("userName");?>">
  </div>
  <div class="form-group">
    <label for="password_login"><?php echo lang("password") ?></label>
    <input  name="password" type="password"  autocomplete="off" class="form-control" id="password_login" placeholder="<?php echo lang("enter")." ". lang("password") ?>">
  </div>

  <button type="submit"id="btn_login"  class="btn btn-primary btn-block"><?php echo lang("login") ?></button>
</form>

<form class="form-signup" action="<?php echo $_SERVER["PHP_SELF"]."?do=up" ?>" method="POST">
  <div class="form-group ">
  <label for="usernameup"><?php echo lang("userName");?></label>
  <input  class="form-control" id="usernameup"  autocomplete="off" name="username"aria-describedby="emailHelp" placeholder="<?php echo lang("enter")." ". lang("userName");?>">
  <span class="availability" id="availability" ></span>
  </div>

<div class="form-group ">
<label for="email"><?php echo lang("email"); ?></label>
<input type="email" name="email" class="form-control" id="email" autocomplete="off" placeholder="<?php echo lang("enter")." ".lang("email");?>">
<span class="availability" id="availabilityemail" ></span>
</div>

<div class="form-group row">
  <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 margin_none padding_noane firstName_div">
    <label for="firstName"><?php echo lang("firstName"); ?></label>
    <input type="text" autocomplete="off" name="firstname" class="form-control" id="firstName"  placeholder="<?php echo lang("enter")." ".lang("firstName");?>">
  </div>
  <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6  lastName_div">
    <label for="lastName"><?php echo lang("lastName"); ?></label>
    <input type="text" autocomplete="off" name="lastname" class="form-control" id="lastName"  placeholder="<?php echo lang("enter")." ".lang("lastName");?>">

  </div>

</div>

<div class="form-group">
<label for="exampleInputPassword1"><?php echo lang("password") ?></label>
<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="<?php echo lang("enter")." ". lang("password") ?>">
</div>
<div class="form-group">
<label for="exampleInputPassword1"><?php echo lang("password") ?></label>
<input type="password" name="repassword" class="form-control" id="exampleInputPassword1" placeholder="<?php echo lang("repeatPassword") ?>">
</div>

<button type="submit" class="btn btn-success btn-block"><?php echo lang("signup") ?></button>
</form>


 </div>


 <?php
?>

<?php
include($template ."footer.php");

  ?>
