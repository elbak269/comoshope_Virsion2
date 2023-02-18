<?php
ob_start();
session_start();
if(isset($_SESSION['username'])){
$pageTitle = "";
include("init.php");
$do = isset($_GET['do']) ? $_GET['do'] : 'manage';

if ($do=="manage") {
echo "manage";
}
elseif ($do=="edit") {
  echo "edit";
}
elseif ($do=='delete') {
  echo "delete";
}
elseif ($do=="add") {
    echo "add";
}
elseif ($do=="insert") {
    echo "insert";
}

}
else {
  header("location: index.php");
  exit();
}









ob_end_flush();
?>
