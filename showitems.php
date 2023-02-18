<?php
if (isset($_POST['action'])) {

  $functions = "admin/includes/functions/";
  include($functions."functions.php");
 include("admin/connect.php");

$BARND = 3;
$PRICE = 0 ;
$CATEGORY = 3;
$RATING = 0;
class items{
public $id;
public $name;
public $description;
public $price;
public $currency;
public $category;
public $registreddate;
public $rating;
public $countrymade;
public $status;
public $saller;
public $brand;
public $island;
public $country;
public $gouvernorate;
public $city;
public $shippingid;
public $shippingname;
public $pic1;
public $pic2;
public $pic3;
public $offer;
public $tags;
}
if (isset($_POST['brands_page']) && isset($_POST['curency_orgin'])) {

function showitems(){
global $conn;
$sql = "SELECT items.* ,brand.BrandID as brandid,
brand.BrandName as brandname,
categories.CategoryID as catid,
categories.Name as catName,
sellers.SellerID as userId,
items.Ship_Method_Ngazidja,
items.Ship_Method_Ndzuwani,
items.Ship_Method_Mwali,
items.Ship_Method_France,
items.CurrencyID as curn_id
FROM items
INNER JOIN brand ON items.BrandID = brand.BrandID
INNER JOIN  sellers ON sellers.SellerID = items.MemberID
INNER JOIN categories ON categories.CategoryID = items.CategoryID
WHERE
(items.ship_ngazidja = :SHIPNGAZDIJA OR items.ship_ndzouwani  = :SHINDUWANI OR items.ship_mwali = :SHIPMALI OR items.ship_france = :SHIPFRANCE)
";
if (isset($_POST['brand']) ) {
  $sql .= " AND brand.BrandID = :BARNDID";
}

if (isset($_POST['category'])) {
  $sql .= " AND  items.CategoryID IN(:CATEGORYID)";
}


$stm = $conn->prepare($sql);

if (isset($_POST['category'])  && $_POST['category'] !="0") {
  $cat = implode(",",$_POST['category']);
$stm ->bindParam(":CATEGORYID",$cat,PDO::PARAM_INT);
}

if (isset($_POST['brand'])  && $_POST['brand'] !="0") {

$stm ->bindParam(":BARNDID",$_POST['brand'],PDO::PARAM_INT);
}

$stm ->bindParam(":SHIPNGAZDIJA",$_POST['chengazidja'],PDO::PARAM_INT);
$stm ->bindParam(":SHINDUWANI",$_POST['checknduwani'],PDO::PARAM_INT);
$stm ->bindParam(":SHIPMALI",$_POST['checkmwali'],PDO::PARAM_INT);
$stm ->bindParam(":SHIPFRANCE",$_POST['checkfrance'],PDO::PARAM_INT);
$stm->execute();
$fetch = $stm->fetchAll();
$ARR = array();
foreach ($fetch as $value) {
  $myobj = new items();
  $myobj ->id = $value['ItemID'];
  $myobj ->name = $value['Name'];
  $myobj->description = $value['Description'];

  if($_POST['curency_orgin'] == $value["curn_id"] ){
      $myobj->price = $value["Price"];
  }else {
  $myobj->price = $value["Price"] * get_exchange($_POST['curency_orgin']);
  }

  $myobj->registreddate=$value['AddDate'];
  $myobj->rating=$value['Rating'];
  $myobj->status=$value['Status'];
  $myobj->country=$value['CountryMade'];
  $myobj->category=$value['CategoryID'];
  $myobj->brand=$value['BrandID'];
  $myobj->pic1=$value['Pic1'];
  $myobj->pic2=$value['Pic2'];
  $myobj->pic3=$value['Pic3'];
  $myobj->offer=$value['Offer'];
  $myobj->tags=$value['Tags'];
  $myobj->saller=$value['MemberID'];

  $ARR[] = $myobj;

}

echo json_encode(array("item"=>$ARR));
}

showitems();
} // END BRANDS PAGES

























// START CATEGORIE PAGE
if (isset($_POST['category_page']) && isset($_POST['chengazidja']) && isset($_POST['checknduwani']) && isset($_POST['checkmwali'])
 && isset($_POST['checkfrance'])  && isset($_POST["orgin_pace"]) && isset($_POST["curency"])) {

function showitems(){
global $conn;
$sql = "SELECT items.* ,brand.BrandID as brandid,
brand.BrandName as brandname,
categories.CategoryID as catid,
categories.Name as catName,
sellers.SellerID as userId,
items.Ship_Method_Ngazidja,
items.Ship_Method_Ndzuwani,
items.Ship_Method_Mwali,
items.Ship_Method_France,
items.CurrencyID AS curcyid
FROM items
INNER JOIN brand ON items.BrandID = brand.BrandID
INNER JOIN  sellers ON sellers.SellerID = items.MemberID
INNER JOIN categories ON categories.CategoryID = items.CategoryID
WHERE
(items.ship_ngazidja = :SHIPNGAZDIJA OR items.ship_ndzouwani  = :SHINDUWANI OR items.ship_mwali = :SHIPMALI OR items.ship_france = :SHIPFRANCE)
";

if (isset($_POST['brand'])) {
  $sql .= " AND brand.BrandID IN(:BARNDID)";
}

if (isset($_POST['category'])  && $_POST['category'] !="0") {
  $sql .= " AND  items.CategoryID IN(:CATEGORYID)";
}

$stm = $conn->prepare($sql);
if (isset($_POST['category'])  && $_POST['category'] !="0") {
  $cat = implode(",",$_POST['category']);
$stm ->bindParam(":CATEGORYID",$cat,PDO::PARAM_INT);
}

if (isset($_POST['brand'])  && $_POST['brand'] !="0") {
  $BRA = implode(",", $_POST['brand']);
$stm ->bindParam(":BARNDID",$BRA,PDO::PARAM_INT);
}
$stm ->bindParam(":SHIPNGAZDIJA",$_POST['chengazidja'],PDO::PARAM_INT);
$stm ->bindParam(":SHINDUWANI",$_POST['checknduwani'],PDO::PARAM_INT);
$stm ->bindParam(":SHIPMALI",$_POST['checkmwali'],PDO::PARAM_INT);
$stm ->bindParam(":SHIPFRANCE",$_POST['checkfrance'],PDO::PARAM_INT);

$stm->execute();
$fetch = $stm->fetchAll();
$ARR = array();
foreach ($fetch as $value) {
  $myobj = new items();
  $myobj ->id = $value['ItemID'];
  $myobj ->name = $value['Name'];
  $myobj->description = $value['Description'];

  if($_POST["curency"] ==  $value["curcyid"]){
      $myobj->price = $value['Price'];
  }else{
    $myobj->price =   $value['Price']*get_exchange($_POST["curency"]);
  }

  //$myobj->price = $value['Price'];

  $myobj->registreddate=$value['AddDate'];
  $myobj->rating=$value['Rating'];
  $myobj->status=$value['Status'];
  $myobj->country=$value['CountryMade'];
  $myobj->category=$value['CategoryID'];
  $myobj->brand=$value['BrandID'];

if($_POST["orgin_pace"] == "ngazidja"){
  $myobj->shippingid=$value['Ship_Method_Ngazidja'];
}elseif($_POST["orgin_pace"] == "ndzuwani"){
    $myobj->shippingid=$value['Ship_Method_Ndzuwani'];
}
elseif($_POST["orgin_pace"] == "mwali"){
    $myobj->shippingid=$value['Ship_Method_Mwali'];
}
elseif($_POST["orgin_pace"] == "france"){
    $myobj->shippingid=$value['Ship_Method_France'];
}

  $myobj->pic1=$value['Pic1'];
  $myobj->pic2=$value['Pic2'];
  $myobj->pic3=$value['Pic3'];
  $myobj->offer=$value['Offer'];
  $myobj->tags=$value['Tags'];
  $myobj->saller=$value['MemberID'];

  $ARR[] = $myobj;

}


echo json_encode(array("item"=>$ARR));


}

showitems();
}  //END CATEGORY PAGE

                                       // CITIES
if (isset($_POST['gouvernorate'])) {
$sql10 = $conn->prepare("SELECT * FROM cities WHERE GovernorateID = ?");
$sql10 -> execute(array($_POST['gouvernorate']));
$fet10 = $sql10->fetchAll();
foreach ($fet10 as  $value) {
?>
<select class="form-control" id="city_slect_b">
<option value="<?php echo $value['CityID']; ?>"><?php echo $value['CityName']; ?></option>
</select>
<?php
}
}



if (isset($_POST["adresss"]) && isset($_POST['adressid_cl'])) {

class adress {
public $id;
public $city;
public $gouvernorate;
public $client;
public 	$PlaceDes;
}

$stm = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
  brand.BrandName as brandname,
  categories.CategoryID as catid,
  categories.Name as catName,
  sellers.StoreName,
  sellers.SellerID as userId,
  currency.CurrencyName as currencyname,
  shipping.ShippingName,
  promo.Discount  AS DiscountPrice

  FROM items
  INNER JOIN brand ON items.BrandID = brand.BrandID
  INNER JOIN  sellers ON sellers.SellerID = items.MemberID
  INNER JOIN categories ON categories.CategoryID = items.CategoryID
  INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
  INNER JOIN shipping ON shipping.ShippingID = items.ShippingID
  LEFT JOIN promo ON items.Discount = promo.PromoID

  WHERE ItemID = ?");
  $stm->execute(array($_GET['itemid']));
  $fetch = $stm->fetchAll();
  foreach ($fetch as  $value) {


$adrrAray = array();
foreach ($fetc_stm6  as  $value2) {
$adr = new adress();
$adr->id            =  $value2['AdressID'];
$adr->city          =  $value2['CityName'];
$adr->gouvernorate  =  $value2['GouvernoratName'];
$adr->client        =  $value2['ClientID'];
$adr->PlaceDes      =  $value2['PlaceDescription'];
$adrrAray[] = $adr;
}
echo json_encode(array("adress" => $adrrAray));


}

}

// FOR SET TEXT AND PRODUCT INFO

//  REQUEST ORDER
if (isset($_POST['nombre_of_item']) && isset($_POST["curency"])) {

  class RequestOrder{
  public $id;
  public $name;
  public $description;
  public $price;
  public $currency;
  public $currencyid;
  public $category;
  public $registreddate;
  public $countrymade;
  public $status;
  public $saller;
  public $brand;
  public $island;
  public $country;
  public $gouvernorate;
  public $city;
  public $shippingprice;
  public $shippingname;
  public $pic1;
  public $offer;
  public $tags;
  public $promo;
  public $promoid;
  public $ship_price_ngazidja;
  public $ship_price_ndzuwani;
  public $ship_price_mwali;
  public $ship_price_france;
  public $pr_weight;
  }
$stm = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
max(brand.BrandName) as brandname,
MAX(categories.CategoryID) as catid,
MAX(categories.Name) as catName,
MAX(sellers.StoreName),
MAX(sellers.SellerID) as userId,
MAX(currency.CurrencyName) as currencyname,
MAX(currency.CurrencyID) as currencyid,
MAX(promo.Discount)  AS DiscountPrice,
MAX(promo.PromoID) AS promid,
max(items.Weight)



FROM items
INNER JOIN brand ON items.BrandID = brand.BrandID
INNER JOIN  sellers ON sellers.SellerID = items.MemberID
INNER JOIN categories ON categories.CategoryID = items.CategoryID
INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
LEFT JOIN promo ON items.Discount = promo.PromoID

WHERE ItemID = ?
GROUP BY items.ItemID");
$stm->execute(array($_POST['itemid']));
$fetch = $stm->fetchAll();
$requsetarray  = array();
foreach ($fetch as  $value) {
  $myobj2 = new RequestOrder();
  $myobj2 ->id = $value['ItemID'];
  $myobj2 ->name = $value['Name'];
  $myobj2->description = $value['Description'];

  if($_POST["curency"] ==  $value["CurrencyID"]){
      $myobj2->price = $value['Price'];
        $myobj2->promo=$value['DiscountPrice'];
  }else{
    $myobj2->price = $value['Price']*get_exchange($_POST["curency"]);
      $myobj2->promo=$value['DiscountPrice']*get_exchange($_POST["curency"]);
  }

  //$myobj2->price = $value['Price'];
  $myobj2->currency = get_curency_name($_POST["curency"]);
  $myobj2->currencyid=$value['currencyid'];
  $myobj2->registreddate=$value['AddDate'];
  $myobj2->status=$value['Status'];
  $myobj2->country=$value['CountryMade'];
  $myobj2->category=$value['catid'];
  $myobj2->brand=$value['brandname'];

  $myobj2->pic1=$value['Pic1'];
  $myobj2->offer=$value['Offer'];
  $myobj2->tags=$value['Tags'];
  $myobj2->saller=$value['userId'];

  $myobj2->promoid = $value['promid'];

  if($_POST["curency"] ==  $value["CurrencyID"]){

    $myobj2->ship_price_ngazidja = $value['ship_ngazidja_price'];
    $myobj2->ship_price_ndzuwani = $value['ship_ndzouwani_price'];
    $myobj2->ship_price_mwali = $value['ship_mwali_price'];
    $myobj2->ship_price_france = $value['ship_france_price'];

  }else{
    $myobj2->ship_price_ngazidja = $value['ship_ngazidja_price'] * get_exchange($_POST["curency"]);
    $myobj2->ship_price_ndzuwani = $value['ship_ndzouwani_price'] * get_exchange($_POST["curency"]);
    $myobj2->ship_price_mwali  = $value['ship_mwali_price'] * get_exchange($_POST["curency"]);
    $myobj2->ship_price_france = $value['ship_france_price'] * get_exchange($_POST["curency"]);


  }

  $myobj2->pr_weight  =  $value["Weight"];
  $requsetarray[] = $myobj2;

}

echo json_encode(array("requestOrder"=>$requsetarray));
} // FOR SET TEXT AND PRODUCT INFO

}

else if (isset($_SESSION["user"]) && isset($_POST["get_names"]) && isset($_POST["client"]) && isset($_POST["curency"])){
  /*
$fetchnames = getnaems($_POST["client"]);
echo '<div class="row">';

foreach ($fetchnames as $value) {

echo '<div class="row">';
      echo '<div  class="col-sm-12">';
      echo' <div id="div'.$value['NameID'].'" class="form-check  div'.$value['NameID'].' div_adres_pare">';
      echo ' <input class="form-check-input" type="radio" name="d" id="client_ad'.$value['NameID'].'" value="'.$value['NameID'].' " checked>';
          <label class="form-check-label" for="<?php  echo 'client_ad'.$value['NameID'];?>">
            <p> <strong><?php echo lang("recipient_full_nam").": "; ?></strong>
               <span ><?php echo $value['fullname']; ?></span>
           </label>
         </div>
     </div>

   </div>


}
<div class="col-sm-12">
  <label for="full_name_id"  > <strong> <?php echo lang('receipientFirstName') ?> </strong></label>
  <input type="text" class="form-control" id="full_name_id" aria-describedby="emailHelp" placeholder="<?php echo lang("ENTER_THE_RECEPIENT_firstNAME"); ?>">
  <div class="but_for_add_new_recepient">
      <button type="button" id="btn_add_recepairnt" class="btn btn-sm btn-primary " name="button"><?php echo lang("add_new_reception"); ?></button>
  </div>

</div>
 </div>

*/
}

if (isset($_POST['order_details_for_payment']) && isset($_POST["curency"])) {

  class RequestOrder{
  public $id;
  public $name;
  public $description;
  public $price;
  public $currency;
  public $currencyid;
  public $category;
  public $registreddate;
  public $countrymade;
  public $status;
  public $saller;
  public $brand;
  public $island;
  public $country;
  public $gouvernorate;
  public $city;
  public $shippingprice;
  public $shippingname;
  public $pic1;
  public $offer;
  public $tags;
  public $promo;
  public $promoid;
  public $ship_price_ngazidja;
  public $ship_price_ndzuwani;
  public $ship_price_mwali;
  public $ship_price_france;
  public $pr_weight;
  }
$stm = $conn->prepare("SELECT items.* ,brand.BrandID as brandid,
max(brand.BrandName) as brandname,
MAX(categories.CategoryID) as catid,
MAX(categories.Name) as catName,
MAX(sellers.StoreName),
MAX(sellers.SellerID) as userId,
MAX(currency.CurrencyName) as currencyname,
MAX(currency.CurrencyID) as currencyid,
MAX(promo.Discount)  AS DiscountPrice,
MAX(promo.PromoID) AS promid,
max(items.Weight),
Fixed_shipping_price_Ngazidja,
Fixed_shipping_price_Ndzuwani,
Fixed_shipping_price_Mwali,
Fixed_shipping_price_France



FROM items
INNER JOIN brand ON items.BrandID = brand.BrandID
INNER JOIN  sellers ON sellers.SellerID = items.MemberID
INNER JOIN categories ON categories.CategoryID = items.CategoryID
INNER JOIN currency ON items.CurrencyID = currency.CurrencyID
LEFT JOIN promo ON items.Discount = promo.PromoID

WHERE ItemID = ?
GROUP BY items.ItemID");
$stm->execute(array($_POST['itemid']));
$fetch = $stm->fetchAll();
$requsetarray  = array();
foreach ($fetch as  $value) {
  $myobj2 = new RequestOrder();
  $myobj2 ->id = $value['ItemID'];
  $myobj2 ->name = $value['Name'];
  $myobj2->description = $value['Description'];

  if($_POST["curency"] ==  $value["CurrencyID"]){
      $myobj2->price = $value['Price'];
        $myobj2->promo=$value['DiscountPrice'];
  }else{
    $myobj2->price = $value['Price']*get_exchange($_POST["curency"]);
      $myobj2->promo=$value['DiscountPrice']*get_exchange($_POST["curency"]);
  }

  //$myobj2->price = $value['Price'];
  $myobj2->currency = get_curency_name($_POST["curency"]);
  $myobj2->currencyid=$value['currencyid'];
  $myobj2->registreddate=$value['AddDate'];
  $myobj2->status=$value['Status'];
  $myobj2->country=$value['CountryMade'];
  $myobj2->category=$value['catid'];
  $myobj2->brand=$value['brandname'];

  $myobj2->pic1=$value['Pic1'];
  $myobj2->offer=$value['Offer'];
  $myobj2->tags=$value['Tags'];
  $myobj2->saller=$value['userId'];

  $myobj2->promoid = $value['promid'];

//  if($_POST["curency"] ==  $value["CurrencyID"]){

    $myobj2->ship_price_ngazidja = $value['ship_ngazidja_price'];
    $myobj2->ship_price_ndzuwani = $value['ship_ndzouwani_price'];
    $myobj2->ship_price_mwali = $value['ship_mwali_price'];
    $myobj2->ship_price_france = $value['ship_france_price'];


    $myobj2->Fixed_shipping_price_Ngazidja = $value['Fixed_shipping_price_Ngazidja'];
    $myobj2->Fixed_shipping_price_Ndzuwani = $value['Fixed_shipping_price_Ndzuwani'];
    $myobj2->Fixed_shipping_price_Mwali    = $value['Fixed_shipping_price_Mwali'];
    $myobj2->Fixed_shipping_price_France   = $value['Fixed_shipping_price_France'];
/*  }else{
    $myobj2->ship_price_ngazidja = $value['ship_ngazidja_price'] * get_exchange($_POST["curency"]);
    $myobj2->ship_price_ndzuwani = $value['ship_ndzouwani_price'] * get_exchange($_POST["curency"]);
    $myobj2->ship_price_mwali  = $value['ship_mwali_price'] * get_exchange($_POST["curency"]);
    $myobj2->ship_price_france = $value['ship_france_price'] * get_exchange($_POST["curency"]);


  }*/

  $myobj2->pr_weight  =  $value["Weight"];
  $requsetarray[] = $myobj2;

}

echo json_encode(array("requestOrder"=>$requsetarray));
} // FOR SET TEXT AND PRODUCT INFO







?>
