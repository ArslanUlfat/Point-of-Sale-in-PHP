<?php
include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/BIT/login.html');
  $uname=$_SESSION['username'];
}
if(isset($_REQUEST['update_stock'])){
$barcode=$_REQUEST['barcode'];
$purchaseId=$_REQUEST['purchase_id'];
$brand=$_REQUEST['brand_name'];
$stock_qty=$_REQUEST['stock'];
$new_qty=$_REQUEST['qty'];
$cost=$_REQUEST['cost_price'];
$itemCost=$_REQUEST['cost_price_item'];
$sale=$_REQUEST['sale_price'];
$itemSale=$_REQUEST['slae_price_item'];
$total=$_REQUEST['total_amount'];
$pay=$_REQUEST['pay'];
$due=$_REQUEST['due'];

$qty=$stock_qty+$new_qty;
$profit=$sale-$cost;
$sql_update="UPDATE productlist SET quantity=:quantity, cost=:cost, cost_item=:cost_item, sale=:sale, sale_item=:sale_item,profit_rupees=:profit_rupees WHERE barcode=:barcode";
$result_update=$conn->prepare($sql_update);
$result_update->execute(array('quantity'=>$qty,'cost'=>$cost,'cost_item'=>$itemCost,'sale'=>$sale,'sale_item'=>$itemSale,'profit_rupees'=>$profit,'barcode'=>$barcode));

$var_select="SELECT total_amount,paid_amount,due_amount FROM purchase_list WHERE purchase_id=$purchaseId";
	$result_select=$conn->prepare($var_select);
	$result_select->execute();
	$row_select=$result_select->fetch(PDO::FETCH_ASSOC);
	
	$amount_before=$row_select['total_amount'];		        
	$paid_amount_before=$row_select['paid_amount'];
	$due_amount_before=$row_select['due_amount'];

	$amount_after=$amount_before+$total;
	$paid_amount_after=$paid_amount_before+$pay;
	$due_amount_after=$due_amount_before+$due;

	$sql_update_purchaseList="UPDATE purchase_list SET total_amount=:total_amount, paid_amount=:paid_amount, due_amount=:due_amount WHERE purchase_id=:purchase_id";
	$result_update_purchaseList=$conn->prepare($sql_update_purchaseList);
	$result_update_purchaseList->execute(array('total_amount'=>$amount_after,'paid_amount'=>$paid_amount_after,'due_amount'=>$due_amount_after,'purchase_id'=>$purchaseId));

}
?>