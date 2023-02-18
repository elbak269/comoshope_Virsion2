<?php
ob_start();
session_start();
if (isset($_SESSION['username'])) {
$pageTitle = "Dashboard";
include("init.php");


$do= isset($_GET['do']) ? $_GET['do'] : 'Manage';
if ($do=='manage') {
echo' manage page';
}
                                    // Start Aprove
 elseif($do=="aprove") {
 if (isset($_GET['UserID']) && is_numeric($_GET['UserID'])) {
   $employee = $_SESSION['username'];
 function return_user_id(){ //return userid function
  global $conn;
 $stm = $conn -> prepare("SELECT UserId FROM users WHERE Username = ? LIMIT 1");
 $stm ->execute(array($_SESSION['username']));
 $fet = $stm->fetchAll();
 foreach ($fet AS $value) {
   return $value['UserId'];
 }
}  // end return userid function
$retuuseriD = return_user_id();
   echo "<h1 class='text-center'>".lang("activateMembers")."</h1>";
 $userid = $_GET['UserID'];
   $stmt = $conn->prepare("UPDATE  sellers SET Aprovable = 8 ,WhoAprovaled = ?  WHERE SellerID = ?");
  	$stmt ->execute(array($retuuseriD,$userid));
   $count = $stmt->rowCount();
   $msg = "<div class='alert alert-success text-center'>".$count." Records</div>";
   redirectHome($msg);

} //end if isset aprove
} // end elseif aprove
                                     //End Aprove

                              //start Delete Users
elseif($do=="delete") {
if (isset($_GET['UserID']) && is_numeric($_GET['UserID'])) {
  $employee =$_SESSION['username'];
  echo "<h1 class='text-center'>".lang("activateMembers")."</h1>";
$userid = $_GET['UserID'];
  $stmt = $conn->prepare("UPDATE  users SET UserDeleted =1 ,WhoDeleted = ?  WHERE UserID = ?");
   $stmt ->execute(array($employee,$userid));
  $count = $stmt->rowCount();
  $msg = "<div class='alert alert-success text-center'>".lang('successfulPreogress')."</div>";
  redirectHome($msg);

} //end if isset aprove
} // end elseif aprove

                            // End Delete User

                    // Edit
elseif($do=="edit") {
if (isset($_GET['UserID']) && is_numeric($_GET['UserID'])) {
$userid = $_GET['UserID'];
  $stmt = $conn->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");
 	$stmt ->execute(array($userid));
  $row = $stmt ->fetch();
  $count = $stmt->rowCount();

 	if ($count > 0) {

   ?>

      <form class='login' action="?do=update" method="post">
       <input type="hidden" name="UserID" value="<?php echo $userid; ?>">
      <h3 class="text-center"><?php echo lang("editMembers")?></h3>
      <div class="form-group">
        <label for="exampleInputEmail1"><?php echo lang("userName")?></label>
        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row['Username']; ?>"name="username"  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("userName")?>" autocomplete="off">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1"><?php echo lang("email")?></label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="<?php echo $row['Email']; ?>" placeholder="<?php echo lang("enter") ." ".lang("email")?>" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1"><?php echo lang("fullName")?></label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="fullName" aria-describedby="emailHelp" value="<?php echo $row['FullName']; ?>" placeholder="<?php echo lang("enter") ." ".lang("fullName")?>" autocomplete="off">
      </div>

      <button type="submit" class="btn btn-primary "><?php echo lang("save")?></button>
      </form>



 <?php
} // end if count();
else {
  echo "you dont have permission ";
}

} // end elseif isset() numeric
else {
  echo 0;
}
} // end elseif do edite

         // UDPDATE
elseif ($do=="update") {

if ($_SERVER['REQUEST_METHOD']=="POST") {

echo "<h1 class='text-center'>"; echo lang('updateMember'); echo "</h1>";
echo "<div class='container update_div'>";
$userid = $_POST['UserID'];
$username = $_POST['username'];
$email = $_POST['email'];
$fullName = $_POST['fullName'];
$errors = array();
if (strLen($username)<3) {
  $errors[]="Username".lang("less")." <strong>3 Words</strong>";
}
elseif (strLen($fullName)<4) {
  $errors[]="FullName".lang("less")." <strong>4 Words</strong>";
}

elseif (empty($errors)) {
$stmts = $conn-> prepare("SELECT * FROM users WHERE Username = ? And UserID !=?");
$stmts-> execute(array($username,$userid));
$row = $stmts-> rowCount();
if ($row ==1) {
  $msg = "<div class='alert alert-success text-center'>".lang('failedProgress')."</div>";
  redirectHome($msg,"?do=edit");
}
else{
  $stmt= $conn->prepare("UPDATE users SET Username = ?, Email = ?, FullName = ? WHERE UserID =?");
  $stmt -> execute(array($username,$email,$fullName,$userid));
  if ($stmt->rowCount() >0) {
  echo '<div class=" update-div-success p-3 mb-2 bg-success text-white text-center">YOUR UPDATE WAS SUCCESSFUL</div>';

}
}

}

foreach ($errors as $value) {
  echo '<div class="p-3 mb-2 bg-danger text-white text-center update-div">';
  echo  $value."<br>" ;
  echo '</div>';
}

echo "</div>";

   } // if update request method
}




include($template ."footer.php"); // footer
}
else {
  header("location:index.php");
  exit;
}
ob_end_flush();


 ?>
