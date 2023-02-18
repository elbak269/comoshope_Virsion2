<?php





$cura = "1";

$orginla_place = "ngazidja";
  $_SESSION["CURENCY_SESION"] = "1";
  $_SESSION["SHIP_PALCE_SESS"] = "ngazidja";
  $currency = "ngazidja";
  if(isset($_POST["place__sho"]) && isset($_POST["curency__"])){
    setcookie("curency",$_POST["curency__"],time()+2592000);
    setcookie("ship_pale",$_POST["place__sho"],time()+2592000);
    $_SESSION["CURENCY_SESION"]  = $_POST["curency__"];
    $_SESSION["SHIP_PALCE_SESS"] = $_POST["place__sho"];
    header("location:".$_SERVER["PHP_SELF"]);

  }else{
    if(!isset($_SESSION["CURENCY_SESION"]) || empty( $_SESSION["CURENCY_SESION"])){
      $_SESSION["CURENCY_SESION"] = "1";
      $_SESSION["SHIP_PALCE_SESS"] = "ngazidja";

    }
  }

  if(isset($_COOKIE["curency"])){
    $cura =$_COOKIE["curency"];
  }else if(isset($_SESSION["CURENCY_SESION"])){
    $cura = $_SESSION["CURENCY_SESION"];
  }

  if (isset($_COOKIE["ship_pale"])) {
    $orginla_place = $_COOKIE["ship_pale"];
  }else if(isset($_SESSION["SHIP_PALCE_SESS"])){
      $orginla_place = $_SESSION["SHIP_PALCE_SESS"];
  }

  if(isset($_COOKIE["ship_pale"])){?>
  <input id="place_orgina" type="hidden" name="" value="<?php  echo $_COOKIE["ship_pale"];  ?>">
  <?php
}else if(isset($_SESSION["SHIP_PALCE_SESS"])){
  ?>
    <input id="place_orgina" type="hidden" name="" value="<?php  echo $_SESSION["SHIP_PALCE_SESS"];  ?>">
  <?php
}

  ?>
  <input id="cure_int_hidd"  type="hidden" name="" value="<?php echo $_SESSION["CURENCY_SESION"]; ?>">
  <input id="place_int_hidd"  type="hidden" name="" value="<?php echo $_SESSION["SHIP_PALCE_SESS"]; ?>">
  <?php

 if (isset($_SESSION['user'])) {
  ?>
  <div class="uper-bar d-sm-block">
    <a href="profile.php"  href="#"   aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user'];?> </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item " href="#"><?php echo lang('myAcount') ?></a>
      <a class="dropdown-item" href="#"><?php echo lang('') ?></a>
    </div>

    <a class="float-right"href="logout.php"><?php echo lang("logout"); ?></a>
    <a href="comoshopseller.php" class="float-right"> <span class=""><?php echo lang("sellWithUs") ?></span> |</a>



    |

     <div class="dropdown  drow_div_navb">
            <div class="dra__img_nav">
      <?php if(isset($_COOKIE["ship_pale"]) ){
        if($_COOKIE["ship_pale"] == "ngazidja" ){
          ?>
          <img class="img_up_bar"  src="theme/image/flag_of_grande_comore.png" alt="">
          <span><?php echo lang("ngazidja"); ?></span>
          <?php
        } else if($_COOKIE["ship_pale"] == "ndzuwani"  ){
          ?>
          <img class="img_up_bar"  src="theme/image/flag_of_anjouan.png" alt="">
          <span><?php echo lang("ndzuwani"); ?></span>
          <?php
        }else if($_COOKIE["ship_pale"] == "mwali"  ){
          ?>
          <img class="img_up_bar"  src="theme/image/flag_of_moheli.png" alt="">
          <span><?php echo lang("mwali"); ?></span>
          <?php
        }else if($_COOKIE["ship_pale"] == "france"){
          ?>
          <img class="img_up_bar"  src="theme/image/flag_of_france.png" alt="">
          <span><?php echo lang("france"); ?></span>
          <?php
        }

        ?>

        <?php

      }else if(isset($_SESSION["SHIP_PALCE_SESS"])){

        if( $_SESSION["SHIP_PALCE_SESS"] == "ngazidja" ){
          ?>
          <img class="img_up_bar"  src="theme/image/flag_of_grande_comore.png" alt="">
          <span><?php echo lang("ngazidja"); ?></span>
          <?php
        } else if($_SESSION["SHIP_PALCE_SESS"] ==  "ndzuwani"){
          ?>
          <img class="img_up_bar"  src="theme/image/flag_of_anjouan.png" alt="">
          <span><?php echo lang("ndzuwani"); ?></span>
          <?php
        }else if($_SESSION["SHIP_PALCE_SESS"] ==  "mwali"){
          ?>
          <img class="img_up_bar"  src="theme/image/flag_of_moheli.png" alt="">
          <span><?php echo lang("mwali"); ?></span>
          <?php
        }else if($_SESSION["SHIP_PALCE_SESS"] ==  "france"){
          ?>
          <img class="img_up_bar"  src="theme/image/flag_of_france.png" alt="">
          <span><?php echo lang("france"); ?></span>
          <?php

        }
        ?>

        <?php

      } ?>
    </div>
  <div class="dropdown-content dor_down_con___">
    <form class="" action="<?php  echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang("ship_to")?></label>
    <select id="place_select" class="form-control" name="place__sho">
    <option  value='ngazidja' <?php if($orginla_place =="ngazidja"){echo "selected";} ?>><?php echo lang("ngazidja") ; ?></option>;
    <option  value='ndzuwani  <?php if($orginla_place =="ndzuwani"){echo "selected";} ?> '><?php echo lang("ndzuwani"); ?></option>;
    <option  value='mwali' <?php if($orginla_place =="mwali"){echo "selected";} ?> ><?php echo lang("mwali"); ?></option>;
    <option  value='france'  <?php if($orginla_place =="france"){echo "selected";} ?> ><?php echo lang("france"); ?></option>;
    </select>
    </div>

    <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang("choice_currency")?></label>
    <select id="currency_selec" class="form-control" name="curency__">
      <option  value='1' selected <?php if($cura == 1){echo "selected";} ?> ><?php echo lang("euro");  ?></option>;
    <option  value='2'  <?php if($cura == 2){echo "selected";} ?> ><?php echo lang("kmf"); ?></option>;
    </select>
    </div>
    <div class="btn_div_su text-center">
      <button id="btn_sub_mt" type="submit" class="btn btn-primary text-center" name="button"><?php echo lang("apply"); ?></button>
    </div>

  </form>
  </div>
</div>

<div class="div_car_dot">
	<i class="fas fa-cart-plus" id="fa_in_cart"></i>
	<div class="conatiner_dot">
		<div class="dot">
			<span id="counter_id" class="num_in_cart_">0</span>

		</div>
	</div>
</div>

  </div>

<?php
} else {

?>
<div class="uper-bar float-right d-sm-block">
  <a href="login.php" class=""> <span class=""><?php echo lang("loginSingup") ?></span> |</a>


  <a href="comoshopseller.php" class="float-right"> <span class=""><?php echo lang("sellWithUs") ?></span> </a>
  <div class="div_car_dot">
  	<i class="fas fa-cart-plus" id="fa_in_cart"></i>
  	<div class="conatiner_dot">
  		<div class="dot">
  			<span id="counter_id" class="num_in_cart_">0</span>

  		</div>
  	</div>
  </div>
   <div class="dropdown drow_div_navb">
       <div class="dra__img_nav">
    <?php if(isset($_COOKIE["ship_pale"])){
      if($_COOKIE["ship_pale"] == "ngazidja"){
        ?>

          <img class="img_up_bar"  src="theme/image/flag_of_grande_comore.png" alt="">
          <span><?php echo lang("ngazidja"); ?></span>


        <?php
      } else if($_COOKIE["ship_pale"] == "ndzuwani"){
        ?>
        <img class="img_up_bar"  src="theme/image/flag_of_anjouan.png" alt="">
        <span><?php echo lang("ndzuwani"); ?></span>
        <?php
      }else if($_COOKIE["ship_pale"] == "mwali"){
        ?>
        <img class="img_up_bar"  src="theme/image/flag_of_moheli.png" alt="">
        <span><?php echo lang("mwali"); ?></span>
        <?php
      }else if($_COOKIE["ship_pale"] == "france"){
        ?>
        <img class="img_up_bar"  src="theme/image/flag_of_france.png" alt="">
        <span><?php echo lang("france"); ?></span>
        <?php

      }

    }
    else if(isset($_SESSION["SHIP_PALCE_SESS"])){

      if($_SESSION["SHIP_PALCE_SESS"] == "ngazidja"){
        ?>

          <img class="img_up_bar"  src="theme/image/flag_of_grande_comore.png" alt="">
          <span><?php echo lang("ngazidja"); ?></span>


        <?php
      } else if($_SESSION["SHIP_PALCE_SESS"] == "ndzuwani"){
        ?>
        <img class="img_up_bar"  src="theme/image/flag_of_anjouan.png" alt="">
        <span><?php echo lang("ndzuwani"); ?></span>
        <?php
      }else if($_SESSION["SHIP_PALCE_SESS"]== "mwali"){
        ?>
        <img class="img_up_bar"  src="theme/image/flag_of_moheli.png" alt="">
        <span><?php echo lang("mwali"); ?></span>
        <?php
      }else if($_SESSION["SHIP_PALCE_SESS"] == "france"){
        ?>
        <img class="img_up_bar"  src="theme/image/flag_of_france.png" alt="">
        <span><?php echo lang("france"); ?></span>
        <?php

      }

    }
     ?>
   </div>
<div class="dropdown-content  dor_down_con___">
  <form class="" action="<?php  echo $_SERVER["PHP_SELF"]; ?>" method="post">
  <div class="form-group">
  <label for="exampleInputEmail1"><?php echo lang("ship_to")?></label>
  <select id="place_select" class="form-control" name="place__sho">
  <option  value='ngazidja' <?php if($orginla_place =="ngazidja"){echo "selected";} ?> ><?php echo lang("ngazidja"); ?></option>
  <option  value='ndzuwani'  <?php if($orginla_place =="ndzuwani"){echo "selected";} ?> ><?php echo lang("ndzuwani"); ?></option>
  <option  value='mwali' <?php if($orginla_place =="mwali"){echo "selected";} ?> ><?php echo lang("mwali"); ?></option>
  <option  value='france' <?php if($orginla_place =="france"){echo "selected";} ?> ><?php echo lang("france"); ?></option>
  </select>
  </div>

  <div class="form-group">
  <label for="exampleInputEmail1"><?php echo lang("choice_currency")?></label>
  <select id="currency_selec" class="form-control" name="curency__">
  <option  value='1' selected  <?php if($cura == 1){echo "selected";} ?> ><?php echo lang("euro"); ?></option>;
  <option  value='2'  <?php if($cura == 1){echo "selected";} ?> ><?php echo lang("kmf");  ?></option>;


  </select>
  </div>
  <div class="btn_div_su text-center">
    <button id="btn_sub_mt" type="submit" class="btn btn-primary text-center" name="button"><?php echo lang("apply"); ?></button>
  </div>

</form>
</div>
</div>



</div>

<div class="clear">

</div>
<?php }?>
<div class="mynavabar">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand " href="index.php"><?php echo lang("brand"); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo lang("categories");?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <?php
          $cat =  getCategory();
          foreach ($cat as $value) {
            if($value['CategoryID'] != 1 && $value['CategoryID'] != 2){
                echo "<a class='dropdown-item' href= 'category.php?pageid=".$value['CategoryID']."&pagename=".str_replace(" ", "-",$value['Name']) ." '>".$value['Name']. "</a>";
            }

          }

          ?>
        </div>

      </li>
      <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo lang("brands");?>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
        $brand = getBrands();
        foreach ($brand as $value) {
          if($value['BrandID'] != 1 && $value['BrandID'] != 2 ){
          echo "<a class='dropdown-item' href='brands.php?brand=".$value['BrandID']."&name=".str_replace(" ","-",strtolower($value['BrandName']))."'>".$value['BrandName']."</a>";
        }
        }

        ?>

      </div>

    </li>
<?php /*
    <li class="nav-item">
        <a class="nav-link" href="#"><?php echo lang('aboutUs'); ?></a>
    </li>  <?php */?>    <!--
    <li class="nav-item">
        <a class="nav-link" href="#"><?php echo lang('sports'); ?></a>
    </li>  -->

    </ul>

    <form autocomplete="off" class="form-inline my-2 my-lg-0 ml-auto for_mm_" action="searchproducts.php" method="post">

      <div class="autocomplete"  style="width:300px;">
  <input id="search_input" class="form-control mr-sm-2" type="text" name="searc_word" placeholder="<?php echo lang("search"); ?>">

</div>
  <button id="btn_searc" type="submit" class="btn btn-primary " name="button"> <i class="fa fa-search"></i><?php echo lang("search"); ?></button>
<!--<input type="submit"> -->
    <!--  <input id="search_input" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <div class="contne_words_for_search">
    <p>wlbK</p>
      <p>wlbK</p>
      </div>
    -->
    </form>



</div>
</nav>
</div>

<div class="verfi_eid__dailog">
  <div class="isd_verfi_eid__dailog">
    <p class="text-center"> <strong><?php echo lang("verried_suplier"); ?></strong> </p>
    <div class="ver_img_diaog text-center">
        <img class="img_veri" src="theme/image/verified.png" alt="">
    </div>
    <p class="text-center"><?php echo lang("verrified_suplier_infor"); ?></p>
  </div>
</div>

  <div class="starts_eid__dailog">
    <div class="isd_satars_eid__dailog">
      <p class="text-center"> <strong><?php echo lang("bes_sellers"); ?></strong> </p>
      <div class="ver_img_diaog text-center">
        <span class="fa fa-star checked _best_saler_starts"></span>
          <span class="fa fa-star checked _best_saler_starts"></span>
            <span class="fa fa-star checked _best_saler_starts"></span>
              <span class="fa fa-star checked _best_saler_starts"></span>
                <span class="fa fa-star checked _best_saler_starts"></span>
      </div>
      <p class="text-center"><?php echo lang("our_best_sallers"); ?></p>
    </div>
</div>
