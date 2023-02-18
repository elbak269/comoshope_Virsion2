<?php
ob_start();
session_start();

$language ="../admin/includes/languages/"; // language directory
$database = include("../admin/connect.php"); // connect database directory
$functions = "../admin/includes/functions/";
//$nodejs = "http://192.168.1.5:7070";
         // Include the important file
include($functions."functions.php");
include($language."english.php");


  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<title>pay</title>
  	<link rel="stylesheet" type="text/css" href="../theme/css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="../theme/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../theme/css/admin.css">
  	<link rel="stylesheet" type="text/css" href="../theme/css/jquery-ui.css">
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">

  	 <link href="../theme/image/logo.png" rel="icon" type="image/png" />
     <link rel="stylesheet" href="../theme/css/stp.css">


  	<?php
//  include("../includes/templates/" ."navbar.php"); //include header


  	?>


  </head>
  <body>


<div class="container">
  <form action="charge.php" method="post" class="" id="payment-form">
    <h5 class="text-center"><span><?PHP echo lang("total"); ?></span> 10000 EUR</h5>
    <div class="">
      <div class="form-group">
    <label for="card_ho_nam"><?php echo lang("card_holders_name"); ?></label>
    <input type="text" class="form-control" name="card_ho_nam" id="card_ho_nam" >
  </div>

      <label for="card-element"> <?PHP echo lang("card_or_debt"); ?> </label>
      <div id="card-element" class="form-control">
      </div>
      <div id="card-errors" role="alert"></div>
    </div>
    <button class="btn btn-primary "><?PHP echo lang("Submit_Payment"); ?></button>
  </form>
</div>



  	                           <!--END Uper-Bar-->

  <div class="div_loader">
  	 <div class="loader"></div>
  </div>

  <script src="../theme/js/vue.js"></script>
  <script  src="../theme/js/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script  src="../theme/js/bootstrap.min.js"></script>
  <script  src="../theme/js/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
   </head>
   <script src="../theme/./slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script  src="../theme/js/main.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script type="text/javascript" src="../theme/js/stp.js">
  </script>



  <div class="footer">
    <div class="text-center">
      <p id="copy" class="text-center"> <?php echo lang("copyright")." ".date("Y")." "; ?> <span class="logo"> <?php echo lang("brand"); ?> </span></p>
    </div>
  </div>


</body>
</html>
<?php


ob_end_flush();


 ?>
