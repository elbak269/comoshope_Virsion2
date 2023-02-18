<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
  if (isset($_POST['usersName'])) {


$nonavbar="";
  include("connect.php");
  include("includes/languages/english.php");
  $username = $_POST['usersName'];
  $stm = $conn-> prepare("SELECT * FROM users WHERE userName = ? ");
  $stm ->execute(array($username));
  $count = $stm->rowCount();
  if ($count > 0) {
  echo '<p class="text-danger">'; echo lang("userExists"); echo '</p>';
}
else{
  echo '<p class="text-success">'; echo lang("userNotExist"); echo '</p>';
}
}
}

 ?>
