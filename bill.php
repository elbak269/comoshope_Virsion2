<?php

if(isset($_GET["order_id"])){
   include("admin/includes/functions/functions.php");
  include("admin/includes/languages/english.php");
  include("admin/connect.php");
include("tcpdf/tcpdf.php");

function getorder_info($order_id){
  global $conn;
  $STMT = $conn->prepare("SELECT RequestDate , TotalOrder ,payment_method FROM Orders WHERE OrderID = :ORDER_ID");
  $STMT->bindParam(":ORDER_ID",$order_id,PDO::PARAM_INT);
  $STMT->execute();
  $result = $STMT->fetChAll();
  return $result;
}

$order_info =getorder_info($_GET["order_id"]);


foreach ($order_info  as  $value) {
  if ($value["payment_method"] == 2) {
   header("location:profile.php");
   exit();
  }

}

$pdf = new TCPDF("p","mm","A4");

$pdf->setPrintHeader(false);
$pdf->setPrintfooter(false);


$pdf->addPage();

$company_name = lang("brand");
$facture = lang("bill");
$order_id =  lang("order_id");
$pdf->Cell(190,10,$facture ." ".$company_name,1,1,"C");
$pdf->Cell(50,5,$order_id,1);
$pdf->Cell(140,5,$_GET["order_id"],1,);
$pdf->Ln();
foreach ($order_info as $value) {
  $pdf->Cell(50,5,"Date",1);
  $pdf->Cell(140,5,$value["RequestDate"],1);
}

$pdf->Ln();
$html = "

<table>
  <tr>
    <th>".lang("nameOfItem")."</th>
    <th>".lang("price")."</th>
    <th>".lang("qty")."</th>
    <th>".lang("shippingPrice")."</th>
    <th>".lang("total")."</th>
  </tr>
  ";


$order_de = get_order_details($_GET["order_id"]);
  foreach ($order_de as  $value) {

    $html  .="<tr>";
    $html  .= "<td>".$value["Name"]."</td>";
    $html  .= "<td>".$value["Price"]." "."EURO"."</td>";
    $html  .= "<td>".$value["QTY"]."</td>";
    $html  .= "<td>".$value["Shipr_Price"]." "."EURO"."</td>";
    $html  .= "<td>".$value["total_amount"]." "."EURO"."</td>";
    $html  .="</tr>";
  }
$html  .= "
</table>
<style>
table{
  border-collapse:collapse;
}
th,td{
  border:1px solid #888;
}
</style>
";
$pdf->WriteHTMLCell(192,2,9,"",$html,0);
$pdf->Ln();

foreach ($order_info as $value) {
  $pdf->Cell(70,5,lang("total_order"),1);
  $pdf->Cell(120,5,$value["TotalOrder"]." "."EURO",1);

}

$pdf->Output();

}else{
  header("location:index.php");
  exit();
}
?>
