<?php
include("init.php"); // include init.php
$na = "%"."son"."%";
$ship = 1;
$stm = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
brand.BrandName as brandname,
categories.CategoryID as catid,
categories.Name as catName,
sellers.SellerID as sellerid,
currency.CurrencyName as currencyname,
shipping.ShippingName as shippingname,
sellers.Verificated,
sellers.BestSeller,
brand.BrandID as brandid,
currency.CurrencyName as currencyname,
shipping.ShippingName as shippingname,
items.Color AS color,
colors.ColorName as colorname,
colors.ColorID as coloid,
items.CurrencyID AS curcyid
FROM Items
  LEFT JOIN brand ON items.BrandID = brand.BrandID
  LEFT JOIN categories ON categories.CategoryID = items.CategoryID
  INNER JOIN  sellers ON sellers.SellerID = items.MemberID

  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
  LEFT JOIN shipping ON shipping.ShippingID = items.ShippingID
  LEFT JOIN colors ON items.Color = colors.ColorID
    WHERE
( items.Name LIKE CONCAT('%',:PRODUCTNAME,'%') OR brand.BrandName  LIKE CONCAT('%',:PRODUCTNAME,'%') OR categories.Name LIKE CONCAT('%',:PRODUCTNAME,'%'))
   AND
   (items.ship_ngazidja = :SHIPNGAZDIJA OR items.ship_ndzouwani = :SHINDUWANI OR items.ship_mwali = :SHIPMALI OR items.ship_france = :SHIPFRANCE)");
$stm->bindParam(":PRODUCTNAME",$na,PDO::PARAM_STR);
$stm->bindParam(":SHIPNGAZDIJA",$ship,PDO::PARAM_INT);
$stm->bindParam(":SHINDUWANI",$ship,PDO::PARAM_INT);
$stm->bindParam(":SHIPMALI",$ship,PDO::PARAM_INT);
$stm->bindParam(":SHIPFRANCE",$ship,PDO::PARAM_INT);
$stm -> execute();
$fetch = $stm->fetChAll();
foreach ($fetch as $value) {
  echo $value["Name"];
}



 ?>
