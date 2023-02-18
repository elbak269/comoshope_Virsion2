<?php

ob_start();
session_start();


if (isset($_SESSION["user"]) && isset($_GET["return"]) && isset($_GET["prod"]) && isset($_GET["order"]) ) {
  $notheader="";
  $pageTitle = "";

  $set_footer = "";
  $return_product_js ="";
  $return_product_css ="";
  include("init.php");

?>
<input type="hidden" id="inp_prdo" name="" value="<?php echo $_GET["prod"]; ?>">
<input type="hidden" id="inp_orde" name="" value="<?php echo $_GET["order"]; ?>">
<div class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <?php echo lang("brand"); ?>
  </a>

  <div class="float-right">
     <i class="fas fa-user seller_user"></i>
  </div>
</div>



<div class="container">
<h1 class="text-center"><?php echo lang("retunr_prod"); ?></h1>

<div class="div_cont">

  <?php
   $stmt = $conn->prepare("SELECT Product_Img_For_Return ,SallerID FROM orderdetails
     INNER JOIN items ON items.ItemID = orderdetails.ProductID
    WHERE OrderID =:ORDERID AND ProductID = :Productid");

    $stmt->bindParam(":ORDERID",$_GET["order"],PDO::PARAM_INT);
    $stmt->bindParam(":Productid",$_GET["prod"],PDO::PARAM_INT);
    $stmt->execute();
    $FETC = $stmt->fetchAll();
    foreach ($FETC as $value) {

      if ($value["SallerID"] ==  getsellerid($_SESSION['user']) ) {



   ?>

  <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="div_img__">
        <p class="p_prd_img text-center" >  <?php echo  lang("prd_img")?> </p>
        <img src="" id="img_ret" alt="">


      </div>
        <input type="file" id="file_retu_prd" name="" accept="image/*"  value="">

    </div>
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="form-group inpu_reason_retu">
        <label for="order_code"><?php echo lang("reason_for_retunr_prod")." *"?></label> <span class="reqired"></span>
        <textarea name="name" id="text_ar_reason_" class="form-control" rows="8" cols="80"></textarea>
      </div>
      <div class="text-center">
        <button type="button" id="btn_congirm_ask_return_or" class="btn btn-primary" name="button"><?php echo lang("return_the_prd"); ?></button>

      </div>

    </div>

  </div>

<?php }
  else{
    header("location:index.php");
  }
} ?>





</div>

<div id="alrt_stat" class="alert__  text-center alert alert-danger "></div>




</div>
<?php

  include($template ."footer.php");
}else {
  header("location:index.php");
  exit();
}


 ?>
