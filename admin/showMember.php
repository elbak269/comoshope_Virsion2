<?php
session_start();
if (isset($_SESSION["username"])) {
include("init.php");
$qurey="";
if (isset($_GET['page'])&& $_GET['page']=='pending') {
  $qurey = "AND RegStatus = 0";
}
$stmt = $conn->prepare("SELECT clients.*,
  sellers.SellerID AS SELID, sellers.Mobile AS MOBILESELL, sellers.StoreAdress, sellers.StoreName,sellers.RegisterDate AS rgdate,
  sellers.Aprovable
  FROM clients
  INNER JOIN sellers ON clients.ClientID = sellers.ClientID");
$stmt ->execute();
$result = $stmt->fetchAll();
if (! empty($result)) {

 ?>

 <h1 class="text-center"><?php echo lang("sellers")?></h1>
 <div class="container">


 <div class="table-responcive">
   <table class="member-table text-center table table-bordered">
     <tr>
       <td><strong><?php echo lang("userName")?></strong></td>
       <td><strong><?php echo lang("fullName")?></strong></td>
       <td><strong><?php echo lang("email")?></strong></td>
       <td><strong><?php echo lang("registerDate")?></strong></td>
       <td><strong><?php echo lang("control")?></strong></td>
     </tr>
     <?php foreach ($result as $row ){
       echo "<tr>";
       echo "<td>".$row['Username']."</td>";
       echo "<td>".$row['FirstName']." ".$row['LastName']."</td>";
       echo "<td>".$row['Email']."</td>";
       echo "<td>".$row['rgdate']."</td>";
       echo '<td>
       <a href="members.php?do=delete&UserID='.$row['SELID']."&empleyee =".$_SESSION['username'].'" class="btn btn-danger member_btn">'; echo lang("delete"); echo'</a>
       ';
       if ($row['Aprovable']==6) {
      echo '   <a href="members.php?do=aprove&UserID='.$row['SELID']."&empleyee =".$_SESSION['username'].'" class="btn btn-info member_btn">'.lang("aprove").'</a>';

       }
       echo '
       </td>';
       echo "</tr>";
     } ?>


   </table>

 </div>
 </div>

 <?php
}
else {
  echo "<div class='container'>";
 alert_info(lang("noSellers"));
 echo "<div class='nobtnadd'>";
 ?>
 <a class='btn btn-primary float-left' href = 'addMember.php?UserID=<?php echo $_SESSION['UserID']; ?>'> <?php echo lang("addNewMemeber") ?></a>
 <?php
 echo "</div>";
 echo "</div>";

}
include($template ."footer.php");
}
else {
  header("location:index.php");
  exit;
}
  ?>
