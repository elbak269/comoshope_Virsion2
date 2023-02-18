<?php

include("admin/connect.php");
if (isset($_POST['island_name'])) {
  $stmt=$conn->prepare("SELECT gouvernorate.*,
    islands.*
     FROM islands
     INNER JOIN gouvernorate ON 	islands.IslandID = 	gouvernorate.IslandID
      WHERE islands.IslandName = ?");
     $stmt->execute(array($_POST['island_name']));
     $fetch =  $stmt->fetchAll();
      echo "<select id ='select_gouvar'  class='custom-select'>";
     foreach ($fetch as $value) {

      echo "<option  data-id_gou = '".$value['GovernorateID']."' value ='".$value["GouvernoratName"]."' >".$value["GouvernoratName"]."</option>";

     }
   echo "</select>";
} // END IF ISSET ISLAND NAME

             // CITY
if (isset($_POST['city_name'])) {
  $stmt=$conn->prepare("SELECT gouvernorate.*,
    cities.*
     FROM gouvernorate
     INNER JOIN cities ON 	cities.GovernorateID = 	gouvernorate.GovernorateID
      WHERE gouvernorate.GouvernoratName = ?");
     $stmt->execute(array($_POST['city_name']));
     $fetch =  $stmt->fetchAll();
      echo "<select class='custom-select'>";
     foreach ($fetch as $value) {
      echo "<option data-id_cit='".$value['CityID']."'   value ='".$value["CityName"]."' >".$value["CityName"]."</option>";

     }
   echo "</select>";
}



 ?>
