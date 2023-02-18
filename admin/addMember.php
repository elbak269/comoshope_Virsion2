<?php
ob_start();
session_start();
include('init.php');
global $value;
if (isset($_SESSION['username'])) {
  if (isset($_POST['userName'])) {
    // code...

$var = checkIteams("Username","users","elbak");
$userName = $_POST['userName'];
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2= $_POST['password2'];
$error = array();

if($var==0) {
$error[0]="SORRY THIS USERNAME ALREADY EXISTS";
}
elseif ($password!==$password2) {
  $error[1]="PASSWORDS DOSE NOT MATCH";
}
else {
  $stmt = $conn->prepare("INSERT INTO users (Username,FullName,Email,Password,WhoAdded,Date,RegStatus,WhoActivated) VALUES(:USERNAME, :FULLNAME, :EMAIL, :PASSWORD, :WHOADDED,NOW(),1,:WHOACTIVATED)");
  $stmt ->execute(array(
    'USERNAME'         => $userName,
    "FULLNAME"         => $fullName,
    "EMAIL"            => $email,
    "PASSWORD"         => $password,
    "WHOADDED"         => $_SESSION['username'],
    "WHOACTIVATED"     => $_SESSION['username']
  ));
}

foreach ($error as $value) {

  return $value ;
}

}

}
else {
header("location:index.php");
exit;
}
 ?>
 <form class='container' action='<?php echo $_SERVER["PHP_SELF"]; ?>' method = "POST">

 	<h3 class="text-center"><?php lang('addNewMemeber'); ?></h3>
   <div class="form-group">
     <label for="exampleInputEmail1"><?php echo lang('userName'); ?></label>
     <input type="text" class="form-control" id="memberUsername" name="userName" aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("userName")?>" autocomplete="off">
      <span id="availability" class="text-danger"></span>
   </div>
   <div class="form-group">
     <label for="exampleInputEmail1"><?php echo lang('fullName'); ?></label>
     <input type="text" class="form-control" id="memberFullname" name="fullName" aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("fullName")?>" autocomplete="off">

   </div>
   <div class="form-group">
     <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
     <input type="text" class="form-control" id="memberEmail" name="email" aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("email")?>" autocomplete="off">

   </div>
   <div class="form-group">
     <label for="exampleInputPassword1"><?php echo lang('password'); ?></label>
     <input type="password" class="form-control" id="memberPassword1" name="password" placeholder="<?php echo lang("enter") ." ".lang("password")?>" autocomplete="off ">
   </div>
   <div class="form-group">
     <label for="exampleInputPassword1"><?php echo lang('repeatPassword'); ?></label>
     <input type="password" class="form-control" id="memberpassword2" name="password2" placeholder="<?php echo lang("repeatPassword")?>" autocomplete="off ">
       <span id="pass2Status" class="text-danger"></span>
   </div>

   <button type="button" id="memberBtn" class="btn btn-primary "><?php echo lang('addMemeber');?></button>
   <div class="member_status_div">
  <strong>  <span  class=" text-center member_status"></span> </strong>
 </form>

</div>


 <?php
include($template ."footer.php");
ob_end_flush();





  ?>
