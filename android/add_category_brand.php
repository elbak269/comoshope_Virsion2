<?php
include("../admin/connect.php");
$functions = "../admin/includes/functions/";
include($functions."functions.php");

if (isset($_POST["add_new_cate"]) &&  isset($_POST["CATEGORY_NAME"]) ) {
  $stmt = $conn->prepare("INSERT INTO categories (Name)VALUES(:catname) ");
  $stmt->bindparam(":catname",$_POST["CATEGORY_NAME"],PDO::PARAM_STR);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
echo "1";
}else{
  echo "0";
}
}
else if(isset($_POST["add_new_brand"]) &&  isset($_POST["brandname"]) && isset($_POST["category_id"])){

  $stmt = $conn->prepare("INSERT INTO brand (BrandName,CategoryID)VALUES(:BrandName,:CATEGORYID) ");
  $stmt->bindparam(":BrandName",$_POST["brandname"],PDO::PARAM_STR);
  $stmt->bindparam(":CATEGORYID",$_POST["category_id"],PDO::PARAM_INT);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
echo "1";
}else{
  echo "0";
}

}

?>
