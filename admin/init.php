<?php
//$template = realpath ("includes","templates");
$template = "includes/templates/"; // template directory
//$js = realpath("theme","js");
$js = "theme/js/"; // js directory
//$css = "theme/css/";// css directory
//$css = realpath("theme","css");
$language ="includes/languages/"; // language directory
//$language = realpath("includes","languages");
$database = include("connect.php"); // connect database directory
$functions = 'includes/functions/';
//$functions = realpath("includes","functions");

         // Include the important file
include($functions."functions.php");
include($template ."header.php"); //include header
include($language."english.php");

if(!isset($nonavbar)){
  include($template."navbar.php");
}


?>
