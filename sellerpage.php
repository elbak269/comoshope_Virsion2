<?php

if(isset($_GET['seller'])){
$index_css ="";
$index_js = "";
$set_footer ="";
include("init.php"); // include init.php

include($template ."footer.php"); // footer

$sql = $conn->prepare("SELECT sellers.* ,
clients.Username as username
FROM sellers
INNER JOIN clients on clients.ClientID = sellers.ClientID
 WHERE SellerID = :SELLERID");
$sql ->bindParam(":SELLERID",$_GET['seller'],PDO::PARAM_INT);
$sql->execute();
$FETC = $sql->fetchAll();
foreach($FETC as $value){
    ?>
    <h>WELCOME TO <?php echo  ucfirst($value['username']); ?> PAGE</h>
    <?php

}


}else{
    header("location:index.php");
    exit();
}
?>