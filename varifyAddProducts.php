<?php
include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/BIT/login.html');
  $uname=$_SESSION['username'];
}
$uname=$_SESSION['username'];
if(isset($_REQUEST['save'])){

$var_productId=$_REQUEST['productid'];
$var_barcode=$_REQUEST['barcode'];
$var_productName=$_REQUEST['productname'];
$var_category=$_REQUEST['selectCategory'];
$var_supplier=$_REQUEST['selectSupplier'];
$var_expiryDate=$_REQUEST['expiryDate'];
$var_quantity=$_REQUEST['quantity'];
$var_purchase_pricePer_item=$_REQUEST['purchasepriceperitem'];
$var_total_purchase_price=$_REQUEST['totalpurchaseprice'];
$var_sale_pricePer_item=$_REQUEST['salepriceperitem'];
$var_total_sale_price=$_REQUEST['totalsaleprice'];
$var_profit_rs=$_REQUEST['profitMargin'];
$sql="INSERT INTO productlist (product_id, barcode, product_name, product_category, product_supplier, expiry_date, quantity, product_purchase_per_item_price, product_purchase_total_price, product_sale_per_item_price, product_sale_total_price, profit_rupees,inserted_by) VALUES (:productid,:barcode,:productname,:selectCategory,:selectSupplier,:expiryDate,:quantity,:purchasepriceperitem,:totalpurchaseprice,:salepriceperitem,:totalsaleprice,:profitMargin,:username)";
$result=$conn->prepare($sql);
$result->execute(array(':productid'=>$var_productId,':barcode'=>$var_barcode,':productname'=>$var_productName,':selectCategory'=>$var_category,':selectSupplier'=>$var_supplier,':expiryDate'=>$var_expiryDate,':quantity'=>$var_quantity,':purchasepriceperitem'=>$var_purchase_pricePer_item,':totalpurchaseprice'=>$var_total_purchase_price,':salepriceperitem'=>$var_sale_pricePer_item,':totalsaleprice'=>$var_total_sale_price,':profitMargin'=>$var_profit_rs,':username'=>$uname));
}
?>