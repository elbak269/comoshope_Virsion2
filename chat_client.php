<?php
ob_start();
session_start();
$pageTitle = "Dashboard";
$chat_client_css="";
$chat_client_js ="";
$set_footer = "";
include("init.php");

if (isset($_SESSION['user'])) {
  $sellerid = getsellerid($_SESSION['user']);
  $clientid = getclientID($_SESSION['user']);
  ?>

  <div class="cont">
    <h1 class="text-center"><?php echo lang("chat"); ?></h1>
<div class="mycont">
  <div class="row">

    <div class="col-sm-12 col-md-3 ">

      <div id="div____" class="div____"></div>
    </div>
    <div class="col-sm-12 col-md-5 ">
      <div id="chat_div" class="">

                <div class="row">


                        <div id="chat">
                          <input type="hidden" id="client_id" value=" <?php echo trim($clientid); ?> " >
                          <input type="hidden" id="lick_conn"  name="" value="<?php echo $nodejs ?>">
                          <!--  <input type="text" name="" id="username" class="form-control" placeholder="enter your username">
                            <br> -->
                            <div class="card">
                                <div id="message" class="card-block">

                                </div>
                            </div>

                            <input id="textarea" class="form-control" name="" placeholder="enter message" autocomplete="off"></input>
                        </div>

                </div>
      </div>

    </div>
    <div class="col-sm-12 col-md-4 ">
      <div class="div_img_big_avat">
         <img id="img_big_avat" class="avatar" src="theme/image/avatar.png" alt="">
      </div>
      <div class="div_info_clien">
        <h5  class="text-center"><i class="fas fa-user"></i> <strong id="user_nam"></strong> </h5>
        <p class="complrode"><strong  ><i class="fas fa-shopping-basket"></i> <?php echo lang("ordersCompleted"); ?> </strong>  <strong><span id="complete_order_id"></span></strong>   </p>
        <p class="cancelprds"> <strong ><i class="fas fa-shopping-basket"></i> <?php echo lang("cancelOrder"); ?></strong>  <strong><span id="cancel_order_id"></span></strong>  </p>

      </div>

    </div>

  </div>

</div>


  </div>

  <?php

  include($template ."footer.php");
}
else{
  header("location:index.php");
  exit();
}
ob_end_flush ();
?>
