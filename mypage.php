<?php
ob_start();
session_start();
$profile_js=" ";
$profile_css =" ";
$pageTitle = "profile";
$set_footer = "";

include("init.php");
$clientid = getclientID($_SESSION['user']);

if(isset($_SESSION['user'])){
?>

<div class="cont">
  <h1></h1>

</div>


<?php

include($template ."footer.php");
}else{
  header("location:index.php");
  exit();
}
ob_end_flush();
 ?>
