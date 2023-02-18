<?php
ob_start();
session_start();
if (isset($_SESSION['username'])) {
  $pageTitle = "Dashboard";
  include("init.php");
                            //start dashboard
?>
<div class="container home-stats text-center">
  <h1 class="text-center"><?php echo lang("dashboard");?></h1>
   <div class="row">
     <div class="col-md-3">
        <div class="stat stat1">
          <?php echo lang("totalSellers")?>
          <span> <a href="#"> <?php echo count_all("SellerID","sellers");  ?> </a> </span>
        </div>
     </div>
      <div class="col-md-3">
        <div class="stat stat2 ">
          <?php echo lang("peddingSellers")?>
          <span><a href="showMember.php?page=pending"><?php   echo count_pedding_sellers("SellerID","sellers");  ?></a></span>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stat stat3">
          <?php echo lang("TOTAL_PRDO")?>
          <span> <a href="#"><?php echo countAllItem("ItemID","items")  ?> </a> </span>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stat stat4">
          <?php echo lang("total_comaents")?>
          <span> <a href="#"> 200 </a> </span>
        </div>
     </div>

</div>
</div>

<div class="container latest">
  <div class="row">
                            <!-- Latest Registration-->
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-users"><?php  echo lang("lates5_sa") ?></i>

        </div>
        <div class="card-body">
          <ul class="latest-user">
          <?php

          $latest = getLatestSellers("SellerID" ,"clients", "SellerID");
          foreach ($latest as $value) {
            echo "<li>".'<strong>'.lang("userName").' : '.'</strong>'.'<strong><span>'.ucfirst($value['Username']).'</span> </strong>'."<strong><span class='btn btn-success btn-sm float-right'> <i class='fa fa-sms'></i> ".lang('message')."</span> </strong>". "</li>";
          }





             ?>
          </ul>
        </div>

      </div>
    </div>
                        <!-- Latest Iteam-->
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">
          <i class="fa fa-tags"><?php echo lang("laste5_prod") ?></i>

        </div>
        <div class="card-body">
          <?php $stmtsel = $conn -> prepare("SELECT Name FROM items LIMIT 5");
          $stmtsel ->execute();
          $fect = $stmtsel -> fetchAll();
          echo "<ul class='latest-user'>";
          foreach ($fect as $value) {
            echo "<li>".'<strong>'.lang("PRD_NAME").' : '.'</strong>'.'<strong> <span>'.ucfirst($value['Name']).'</span> </strong>'."<strong> <span class='btn btn-danger float-right'> <i class='fa fa-trash'></i>".lang("delete")."</span> </strong>". "</li>";

          }
        echo "</ul>";
           ?>
        </div>

      </div>
    </div>

  </div>

</div>


<?php
                             //end dashboard
include($template ."footer.php"); // footer
}
else {
  header("location:index.php");
  exit;
}
ob_end_flush();


 ?>
