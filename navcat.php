<?php
include("admin/connect.php");
if (isset($_POST["categ"])) {
  $st = $conn->prepare("SELECT * FROM items");
  $st->execute();
  $fetc = $st->fetchAll();
  echo json_encode($fetc);
}




 ?>
