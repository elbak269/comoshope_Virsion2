<!--START SECTION LOADING-->
<!--<section class="loading_section">
  <div class="spinner">
    <div class="double-bounce1"></div>
    <div class="double-bounce2"></div>
  </div>
</section> -->
<!--START SECTION LOADING-->

<div class="footer">



  <?php

  if (isset($set_footer)) {
  ?>
  <!--
  <div class="row">
    <div class="col-12 col-sm-12 col-md-3 col-xl-3 col-lg-3">
      <h3 class=''>  <?php echo lang("aboutComoshop") ?> </h3>
      <ul>
        <li class=""> <a href="#"><?php echo lang("aboutUs") ?></a> </li>
        <li class=""> <a href="#"><?php echo lang("rewardForCustumer") ?></a> </li>
        <li class=""> <a href="#"><?php echo lang("BrandContacts") ?></a> </li>
      </ul>

    </div>
    <div class="col-12 col-sm-12 col-md-3 col-xl-3 col-lg-3">
    <h3 class=''>  <?php echo lang("ComoshopRESOURCES") ?> </h3>
    <ul>
      <li class=""> <a href="#"><?php echo lang("ComoShopBlog"); ?></a> </li>
      <li class=""> <a href="#"><?php echo lang("comosyst"); ?></a> </li>
      <li class=""> <a href="#"><?php echo lang("sellWithUs"); ?></a> </li>


    </ul>
    </div>
    <div class="col-12 col-sm-12 col-md-3 col-xl-3 col-lg-3">
    <h3 class=''>  <?php echo lang("mobileApp") ?> </h3>
    <img src=" <?php echo $img.'getitonplaysore1.png';?>" alt="" width="180px" height="84px">
    </div>
    <div class="col-12 col-sm-12 col-md-3 col-xl-3 col-lg-3">
    <h3 class=''><?php echo lang("connectWithUs") ?></h3>
    <ul class="">
      <li> <img src="<?php echo $img.'facebook.png';?>" alt="" width="40px" height="40px"> <span><?php echo lang("facebook") ?> </span>   </li>
      <li> <img src="<?php echo $img.'instagrame.png';?>" alt="" width="40px" height="40px"> <span><?php echo lang("instagram") ?> </span>   </li>
      <li> <img src="<?php echo $img.'youtube.png';?>" alt="" width="40px" height="40px"> <span><?php echo lang("youtube") ?> </span>   </li>
    </ul>
    </div>
  </div> -->
  <div class="text-center">
    <p id="copy" class="text-center"> <?php echo lang("copyright")." ".date("Y")." "; ?> <span class="logo"> <?php echo lang("brand"); ?> </span></p>
  </div>

  <?php
  }
  ?>
</div>
<script src="theme/js/vue.js"></script>
<script  src="theme/js/jquery-3.4.1.min.js"></script>
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
-->
<script  src="theme/js/bootstrap.min.js"></script>
<script  src="theme/js/jquery-ui.min.js"></script>
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
-->
 </head>
 <script src="theme/./slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script  src="theme/js/main.js"></script>
<?php if(isset($loginjs)){
  echo '<script src="theme/js/login.js"></script>';
} ?>

<?php if(isset($profile_js)){
  echo '<script src="theme/js/profile.js"></script>';
} ?>

<?php if(isset($comoshopseller_js)){
  echo '<script src="theme/js/comoshopseller.js"></script>';
} ?>

<?php if(isset($dashboard_js)){
  echo '<script src="theme/js/dashboard.js"></script>';
} ?>

<?php if(isset($index_js)){
  echo '<script src="theme/js/index.js"></script>';
} ?>
<?php if(isset($category_js)){
  echo '<script src="theme/js/category.js"></script>';
} ?>
<?php if(isset($brand_js)){
  echo '<script src="theme/js/brand.js"></script>';
} ?>

<?php if(isset($item_js)){
  echo '<script src="theme/js/item.js"></script>';
} ?>

<?php if(isset($payment_js)){
  echo '<script src="theme/js/payment.js"></script>';
} ?>

<?php if(isset($itemsforshopping_js)){
  echo '<script src="theme/js/itemsforshipping.js"></script>';
} ?>
<?php if(isset($itemsshopping_for_client_js)){
  echo '<script src="theme/js/itemshipingforclient.js"></script>';
} ?>
<?php if(isset($incart_js)){
  echo '<script src="theme/js/incart.js"></script>';
} ?>
<?php if(isset($chat_js)){
  echo '<script src="theme/js/chat.js"></script>';
} ?>
<?php if(isset($chat_client_js)){
  echo '<script src="theme/js/chat_client.js"></script>';
} ?>
<?php if(isset($setting_mypage_js)){
  echo '<script src="theme/js/setting_mypage.js"></script>';
} ?>

<?php if(isset($searchproducts_js)){
  echo '<script src="theme/js/searchproducts.js"></script>';
} ?>

<?php if(isset($add_product)){
  echo '<script src="theme/js/add_product.js"></script>';
} ?>

<?php if(isset($edit_product_js)){
  echo '<script src="theme/js/edit_product.js"></script>';
}

if (isset($return_product_js)) {
echo '<script src="theme/js/return_product.js"></script>';
} ?>







</body>
</html>
