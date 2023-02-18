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


require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('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');
$posts = filter_var_array($_POST,FILTER_SANITIZE_STRING);
$card_ho_nam = $posts['card_ho_nam'];
$Token       = $posts['stripeToken'];


$customer = \Stripe\Customer::create([
  "email"        => "elbak269@gmail.com",
  "source"      => $Token
]);


$charge = \Stripe\Charge::create([
"amount"        => "100",
"currency"      => "usd",
"description"   => "test",
"customer"      => $customer->id
]);




?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>charge</title>
    <link rel="stylesheet" type="text/css" href="../theme/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../theme/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../theme/css/admin.css">
    <link rel="stylesheet" type="text/css" href="../theme/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">

     <link href="../theme/image/logo.png" rel="icon" type="image/png" />
     <link rel="stylesheet" href="../theme/css/stp.css">
  </head>
  <body>


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
