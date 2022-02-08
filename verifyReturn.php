<?php
include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/BIT/login.html');
  $uname=$_SESSION['username'];
}
$uname=$_SESSION['username'];
if(isset($_REQUEST['add_to_cart'])){
		
		$var_return_no=$_REQUEST['return_no'];
		$var_product_no=$_REQUEST['product_code'];
		$var_bar=$_REQUEST['barcode'];
		echo $var_product_no;
		$sql_table="SELECT * FROM sale_products where product_no=$var_product_no and barcode=$var_bar";
		$result_table=$conn->prepare($sql_table);
		$result_table->execute();
		$row_table=$result_table->fetch(PDO::FETCH_ASSOC);
		
		$var_product_name=$row_table['product_name'];
		$var_product_price=$row_table['price'];
		
		$sql_insert_return_back="INSERT INTO returned_back (return_no,product_no,barcode,name,price,return_by) VALUES (:return_no,:product_no,:barcode,:name,:price,:return_by)";
$result_insert_return_back=$conn->prepare($sql_insert_return_back);
$result_insert_return_back->execute(array(':return_no'=>$var_return_no,':product_no'=>$var_product_no,':barcode'=>$var_bar,':name'=>$var_product_name,':price'=>$var_product_price,':return_by'=>$uname));

	
    $sql_delete="DELETE FROM sale_products WHERE product_no=:product_no and barcode=:barcode";
    $result_delete=$conn->prepare($sql_delete);
    
    $result_delete->execute(array(':product_no'=>$var_product_no,':barcode'=>$var_bar));		
	
	$var_select_produc="SELECT quantity,p_name FROM productlist WHERE barcode=$var_bar";
	$result_select=$conn->prepare($var_select_produc);
	$result_select->execute();
	$row_select=$result_select->fetch(PDO::FETCH_ASSOC);
	$var_qty=$row_select['quantity'];
	$var_name=$row_select['p_name'];
	$var_update_qty=$var_qty+1;
    $sql_update="UPDATE productlist SET quantity=:quantity WHERE barcode=$var_bar";
    $result_update=$conn->prepare($sql_update);
    //$id=$_REQUEST['id'];
    $quantity=$var_update_qty;
    $result_update->execute(array('quantity'=>$quantity));
header('location:http://localhost/BIT/return_product.php');
}

?>