<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php getTitle();   ?></title>
	<link rel="stylesheet" type="text/css" href="theme/./slick/slick.css">
	<link rel="stylesheet" type="text/css" href="theme/./slick/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="theme/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="theme/css/admin.css">
	<link rel="stylesheet" type="text/css" href="theme/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="theme/css/jquery-ui.css">
	<!--
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
	-->
	<link rel="stylesheet" type="text/css" href="theme/css/jquery.selectBoxIt.css">
	<!--
	<link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" ></script>
	  -->
	 <link href="theme/image/logo.png" rel="icon" type="image/png" />


	<?php
	if (isset($normalize_css)) {
			echo '	<link rel="stylesheet" type="text/css" href="theme/css/normalize.css">';
	}

	 if (isset($login_css)){
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/login.css">';
	}
if (isset($profile_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/profile.css">';
}
if (isset($comoshopsell)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/comoshopsell.css">';
}
if (isset($dashboard_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/dashboard.css">';
}
if (isset($index_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/index.css">';
}
if (isset($category_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/category.css">';
}
if (isset($brand_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/brands.css">';
}
if (isset($item_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/item.css">';
}

if (isset($payment_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/payment.css">';
}

if (isset($itemsforshopping_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/itemforshipping.css">';
}
if (isset($incart_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/incart.css">';
}
if (isset($chat_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/chat.css">';
}
if (isset($chat_client_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/chat_client.css">';
}
if (isset($setting_mypage_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/setting_mypage.css">';
}
if (isset($searchproducts_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/searchproducts.css">';
}
if (isset($return_product_css)) {
		echo '	<link rel="stylesheet" type="text/css" href="theme/css/edit_product.css">';
}
if (isset($return_product_css)) {
			echo '<link rel="stylesheet" type="text/css" href="theme/css/return_product.css">';

}



	?>


</head>
<body>



	                                     <!--END Uper-Bar-->

<div class="div_loader">
	 <div class="loader"></div>
</div>
