<?php

ob_start();
session_start();
if(isset($_SESSION['username'])){
$pageTitle = "";
include("init.php");



$do = isset($_GET['do']) ? $_GET['do'] : 'manage';

if ($do=="manage") {
  $stmtitem = $conn -> prepare("SELECT items.*,
     clients.Username AS userName,
     categories.Name AS categoryName,
     brand.BrandID AS brandid, brand.BrandName AS brandName,
     currency.CurrencyName as currencyname , currency.CurrencyID
  FROM items
  INNER JOIN clients  ON items.MemberID = clients.ClientID
  INNER JOIN categories ON items.CategoryID = categories.CategoryID
  INNER JOIN brand ON items.BrandID = brand.BrandID
  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID


  ");
  $stmtitem -> execute();
  $fecth = $stmtitem -> fetchAll();
  if (! empty($fecth)) {
  ?>
   <h1 class="text-center"><?php echo lang("manageItems")?></h1>
   <div class="item-add-btn">
   </div>
   <div class="tabele-responcive">
     <table class="member-table text-center table table-bordered">
       <tr>
         <td><?php echo lang("nameOfItem"); ?></td>
         <td><?php echo lang("brandM"); ?></td>
         <td><?php echo lang("description"); ?></td>
         <td><?php echo lang("price"); ?></td>
         <td><?php echo lang('category') ?></td>
         <td><?php echo lang('registerDate') ?></td>
         <td><?php echo lang('userName') ?></td>
         <td><?php echo lang('control') ?></td>
       </tr>
            <?php
            foreach ($fecth as $value) {
              echo "<tr>";
                echo "<td>".$value['Name']."</td>";
                echo"<td>". $value['brandName']."</td>";
                echo"<td>". $value['Description']."</td>";
                echo "<td>".$value['Price']." ".$value['currencyname'] .  "</td>";
                echo "<td>".$value['categoryName']."</td>";
                echo "<td>" .$value['AddDate']."</td>";
                echo "<td>".$value['userName']."<?td>";
                echo "<td> <a class= 'btn btn-success' href='?do=edit&id=".$value['ItemID']." '> <i class='fa fa-edit fa-sm'></i> ".lang("edit")."</a>  <a href='?do=delete&id=".$value['ItemID']."' class= 'confirm btn btn-danger'><i class='fa fa-trash-alt fa-sm'></i> ".lang("delete")."</a>  </td>";


              echo "</tr>";
            }





             ?>
     </table>

   </div>
   <?php
 } // end if there is no items
 else {
   echo "<div class='container'>";
  alert_info(lang("noItem"));
  echo "<div class='nobtnadd'>";
  echo "<a class='btn btn-primary float-left' href = '?do=add'>".lang("addNewItem")."</a>";
  echo "</div>";
  echo "</div>";
 }

} // end if do = manage
                                                            // start EDIT
elseif ($do=="edit") {
  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $iditem = $_GET['id'];
      $stmt = $conn->prepare("SELECT * FROM items WHERE ItemID = ? LIMIT 1");
       $stmt ->execute(array($iditem));
      $row = $stmt ->fetch();
      $count = $stmt->rowCount();


       ?>

    <form class='login' action="?do=update" method="post">
  <input type="hidden" name="id" value="<?php echo $iditem; ?>">
      <h3 class="text-center"><?php echo lang("editItem")?></h3>
      <div class="form-group">
        <label for="exampleInputEmail1"><?php echo lang("nameOfItem")?></label>
        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row['Name'] ?>" name="name"  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("nameOfItem")?>" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1"><?php echo lang("description")?></label>
        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row['Description'] ?>" name="description"  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("descriptionItem")?>" autocomplete="off">
      </div>
      <div class="row">
        <div class="form-group col-sm">
          <label for="exampleInputEmail1"><?php echo lang("price")?></label>
          <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row['Price'] ?>" name="price"  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("price")?>" autocomplete="off">
        </div>
        <div class="form-group col-sm">
          <label for="exampleInputEmail1"><?php echo lang("currency")?></label>
          <select class="" name="currency">
          <option value= '1' <?php if($row['CurrencyID']=="1"){  echo "selected";} ?> > <?PHP ECHO lang("euro"); ?> </option>
            <option value="2" <?PHP if($row['CurrencyID']=="2") { echo "selected";} ?> > <?PHP ECHO lang("kmf"); ?> </option>
          </select>
        </div>

      </div>
      <div class="form-group">
        <label for="exampleInputEmail1"><?php echo lang("country")?></label>
        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $row['CountryMade'] ?>" name="country"  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("country")?>" autocomplete="off">
      </div>
      <div class="form-group ">
        <label for="exampleInputEmail1"><?php echo lang("status")?></label>
        <select class="" name="status">
          <option value="New" <?php if($row['Status']=="New"){  echo "selected";} ?> > <?PHP ECHO lang("new"); ?> </option>
          <option value="Used" <?PHP if($row['Status']=="Used") { echo "selected";} ?> > <?PHP ECHO lang("used"); ?> </option>
          <option value="Very Old" <?PHP if($row['Status']=="Very Old") { echo "selected";} ?> > <?PHP ECHO lang("old"); ?> </option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1"><?php echo lang("brandM")?></label>
       <select class="form-control" name="brand">

        <?php
         $stmt =$conn->prepare("SELECT * FROM brand");
         $stmt->execute();
         $cat = $stmt->fetchAll();
         foreach ($cat as  $value) {

           echo "<option  value='".$value['BrandID']."'> ".$value['BrandName']." </option>";
         }

        ?>
       </select>
      </div>
      <button type="submit" class="btn btn-primary "><?php echo lang("save")?></button>

    </form>
    <?php
  }
  else {
    header("location:items.php?do=manage");
  }

}                                       // END EDIT
                                                           //START UPDATE

elseif ($do=="update") {
  $id= $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $currency = $_POST['currency'];
  $country= $_POST['country'];
  $status = $_POST['status'];
  $brand = $_POST['brand'];

  $stmt = $conn -> prepare("UPDATE items SET Name =?, Description = ?, Price = ? , CurrencyID =? ,CountryMade= ? ,Status= ? ,BrandID =? WHERE ItemID = ?");
  $stmt -> execute(array($name,$description,$price,$currency,$country,$status,$brand,$id));
  $row = $stmt ->rowCount();
  if ($row>0) {
    $msg='<div class="p-3 mb-2 bg-success text-white text-center update-div">'.lang('successfulPreogress').'</div>';
    $url ="items.php?do=manage";
    redirectHome($msg, $url);
  }
  else {
    $msg='<div class="p-3 mb-2 bg-success text-white text-center update-div">'.lang('failedProgress').'</div>';
    $url ="items.php?do=edit";
    redirectHome($msg, $url);
  }


}                                                        // END UPDATE

                                                                //START DELETE
elseif ($do=='delete') {
  $id =$_GET['id'];
  $check = checkIteams("ItemID","items",  $id);
  if ($check > 0) {
    $stmtdelete = $conn ->prepare("DELETE FROM items WHERE ItemID =?");
    $stmtdelete ->execute(array($id));
    $msg='<div class="p-3 mb-2 bg-success text-white text-center update-div">'.lang('successfulPreogress').'</div>';
    $url ="items.php?do=manage";
    redirectHome($msg, $url);
  }
  else {
    $msg='<div class="p-3 mb-2 bg-success text-white text-center update-div">'.lang('failedProgress').'</div>';
    $url ="items.php?do=manage";
    redirectHome($msg, $url);
  }



}           // END DELETE

                                                               // ADD
elseif ($do=="add") {


    ?>
    <form class='login' action="?do=insert" method="post">
    <h3 class="text-center"><?php echo lang("addItem")?></h3>
    <div class="form-group">
      <label for="exampleInputEmail1"><?php echo lang("name")?></label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="itemName" required  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("nameOfItem")?>" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1"><?php echo lang("description")?></label>
      <textarea class="form-control" name="itemDescription" placeholder="<?php echo lang("enter") ." ".lang("descriptionItem")?>" rows="3" cols="80"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1"><?php echo lang("price")?></label>
      <input type="number" class="form-control" id="exampleInputEmail1" name="price" required  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("itemPrice")?>" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1"><?php echo lang("currency")?></label>
      <select class="form-control" name="current">
        <?php
        $stmtmo = $conn->prepare("SELECT * FROM currency ");
        $stmtmo-> execute();
        $fetch = $stmtmo ->fetchAll();
        foreach ($fetch as  $value) {
          echo "<option value='".$value['CurrencyID']."' >".$value["CurrencyName"]."</option>";
        }

         ?>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1"><?php echo lang("country")?></label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="country" required  aria-describedby="emailHelp" placeholder="<?php echo lang("enter") ." ".lang("countryOfMade")?>" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1"><?php echo lang("rating")?></label>
      <select class="form-control" name="rating">
        <option value="">---</option>
        <option value="1"><?php echo lang("1") ?></option>
        <option value="2"><?php echo lang("2") ?></option>
        <option value="3"><?php echo lang("3") ?></option>
        <option value="4"><?php echo lang("4") ?></option>
        <option value="5"><?php echo lang("5") ?></option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1"><?php echo lang("status")?></label>
     <select class="form-control" name="status">
      <option value="New"><?php echo lang("new") ?></option>
      <option value="Used"><?php echo lang("used") ?></option>
      <option value="Verry Old"><?php echo lang("old") ?></option>

     </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang("category")?></label>
   <select class="form-control" name="categoryid">

    <?php
     $stmt =$conn->prepare("SELECT CategoryID ,Name  FROM categories");
     $stmt->execute();
     $cat = $stmt->fetchAll();

     foreach ($cat as  $value) {
       echo "<option  value='".$value['CategoryID']."'> ".$value['Name']." </option>";
     }

    ?>
   </select>
</div>
<div class="form-group">
  <label for="exampleInputEmail1"><?php echo lang("brandM")?></label>
 <select class="form-control" name="brand">

  <?php
   $stmt =$conn->prepare("SELECT * FROM brand");
   $stmt->execute();
   $cat = $stmt->fetchAll();

   foreach ($cat as  $value) {
     echo "<option  value='".$value['BrandID']."'> ".$value['BrandName']." </option>";
   }

  ?>
 </select>
</div>


    <button type="submit" class="btn btn-primary "><?php echo lang("addNewItem")?></button>
    </form>

  <?php

}
                                                                 // INSERT
elseif ($do=="insert") {
  if (isset($_POST['itemName'])) {
    $name = $_POST['itemName'];
    $description = $_POST['itemDescription'];
    $price= $_POST['price'];
    $current = $_POST['current'];
    $country= $_POST['country'];
    $rating =$_POST['rating'];
    $status = $_POST['status'];
    $catid = $_POST['categoryid'];
    $brand = $_POST['brand'];

    $error = array();
  if($name==""){
    $error[]= lang("cantNameItemEmpty");
    $msg='<div class="p-3 mb-2 bg-danger text-white text-center update-div">'.lang('categoryCant').'</div>';
    $url ="items.php?do=add";
    redirectHome($msg, $url); }  // end if item name is empty
  elseif ($price=="") {
      $error[]= lang("cantPriceItemEmpty");
    } // end elseif price is empty
  elseif ($country=="") {
       $error[]= lang("cantCountryItemEmpty");
     } // end elseif country is empty

  elseif(empty($error)){
      $stmt = $conn->prepare("INSERT INTO
         items (Name,Description,Price,	CurrencyID,AddDate,CountryMade,Status,Rating,CategoryID,MembersName,UserID,BrandID)
       VALUES(:NAME, :DESCRIPTION, :PRICE, :CURRENCY, NOW(), :COUNTRY,:STATUS, :RATING, :CATEGORYID, :MEMBERNAME, :USERID, :BRANDID)");
      $stmt ->execute(array(
        'NAME'               => $name,
        "DESCRIPTION"        => $description,
        "PRICE"              => $price,
        "CURRENCY"            => $current,
        "COUNTRY"            => $country,
        "STATUS"             => $status,
        "RATING"             => $rating,
        "CATEGORYID"         => $catid,
        "MEMBERNAME"         => $_SESSION['username'],
        "USERID"             => $_SESSION["UserID"],
        "BRANDID"            => $brand
      ));


      $msg='<div class="p-3 mb-2 bg-success text-white text-center update-div-success">'.lang('successfulPreogress').'</div>';
      $url ="dashboard.php";
      redirectHome($msg, $url);
  }
  else {
    $msg='<div class="p-3 mb-2 bg-success text-white text-center update-div-success">'.lang('failedPreogress').'</div>';
    $url ="dashboard.php";
    redirectHome($msg, $url);
  }
  foreach ($error as $value) {
    $msg='<div class="p-3 mb-2 bg-success text-white text-center update-div-success">'.$value.'</div>';
    $url ="items.php?do=add";
    redirectHome($msg, $url);
  }


  }


  else {

    $msg='<div class="p-3 mb-2 bg-danger text-white text-center update-div">'.lang('categoryCant').'</div>';
    $url ="items.php?do=manage";
    redirectHome($msg, $url);
  }
}

                                                              // UPROVE
elseif ($do=="approve") {
    echo "approve";
}
include($template ."footer.php");
}
else {
  header("location: index.php");
  exit();
}









ob_end_flush();
?>
