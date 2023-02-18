<?php
ob_start();
$nonavbar="";
$pageTitle = "Login";

include("init.php"); // include init.php


 session_start();
 if (isset($_SESSION['username'])) {

 }

 if ($_SERVER["REQUEST_METHOD"]=="POST") {
if (isset( $_POST['username']) && !empty( $_POST['username']) && isset( $_POST['password']) && !empty( $_POST['password'])) {

	$username = $_POST['username'];
 	$password = $_POST['password'];
 	$hashPass = sha1($password);
 	$stmt = $conn->prepare("SELECT
     Username,Password,UserId
      FROM users
       WHERE Username =?
       AND Password=?
       AND GroupID=1  LIMIT 1");
 	$stmt ->execute(array($username,$password));
  $row =$stmt-> fetch();
 	$count = $stmt->rowCount();
 	if ($count > 0) {
 	$_SESSION['username']= $username;
  $_SESSION["UserID"]=$row['UserId'];
    header("location:dashboard.php");
    exit;
 	}
 	else{
 		echo "you are not admin";
 	}


}


 }

 ?>

<form class='login container' action='<?php echo $_SERVER["PHP_SELF"]; ?>' method = "POST">
  	<h3 class="text-center"><?php echo lang("user_cnect") ?></h3>
<div class="row">

  <div class="form-group col-lg-12">
    <label for="exampleInputEmail1"><?php echo lang("email"); ?> </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="<?php echo lang("email"); ?>" autocomplete="off">

  </div>
  <div class="form-group col-lg-12">
    <label for="exampleInputPassword1"><?php echo lang("password") ?></label>
    <input type="password" class="form-control" id="exampleInputPassword1m" name="password" placeholder="<?php echo lang("password") ?>" autocomplete="off ">
  </div>
<div class="form-group col-lg-12">
  <button type="submit" class="btn btn-primary "><?php ECHO  lang("login") ?></button>
</div>
</div>
</form>



<?php

include($template ."footer.php"); // footer
ob_start();?>
