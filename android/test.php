<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <input type="date" name="" value="">
  </body>
</html>


<?php

 include("../admin/connect.php");

 function order_count(){
   $id = 1;
  global  $conn;
   $sql = $conn->prepare("SELECT count(OrderID) FROM Orders WHERE  Orders.StatusOrder = 1 AND Orders.ClientID = :CLIENTID ");
   $sql->bindparam(":CLIENTID",$id,PDO::PARAM_INT);
   $sql -> execute();
   $fetch =   $sql->fetchColumn();
echo $fetch;
 }
 order_count();

 ?>
