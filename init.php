<?php
$template = "includes/templates/"; // template directory
$js = "theme/js/"; // js directory
$css = "theme/css/";// css directory
$img = "theme/image/";
$language ="admin/includes/languages/"; // language directory
$database = include("admin/connect.php"); // connect database directory
$functions = "admin/includes/functions/";
$nodejs = "http://192.168.1.5:7070";

$nonavbar="";


         // Include the important file
include($functions."functions.php");
include($language."english.php");
include($template ."header.php");
if (!isset($notheader)) {
  include($template ."navbar.php"); //include header
}


?>
