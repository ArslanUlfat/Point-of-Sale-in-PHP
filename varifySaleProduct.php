<?php
include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/BIT/login.html');
  $uname=$_SESSION['username'];
}
$uname=$_SESSION['username'];
if(isset($_REQUEST['Sale_Pro'])){
	$var_bar=$_REQUEST['barcode'];
$var_select_produc="SELECT * FROM productlist WHERE barcode=$var_bar and status=1";
$result_select=$conn->prepare($var_select_produc);
$result_select->execute();
$row_select=$result_select->fetch(PDO::FETCH_ASSOC);
if($row_select>0){
$var_name=$row_select['p_name'];
$var_price=$row_select['cost_item'];
$var_qty=$row_select['quantity'];
if($var_qty>0){
$var_update_qty=$var_qty-1;


 $sql_update="UPDATE productlist SET quantity=:quantity WHERE barcode=$var_bar";
        $result_update=$conn->prepare($sql_update);
        //$id=$_REQUEST['id'];
        $quantity=$var_update_qty;
        
        		
        $result_update->execute(array('quantity'=>$quantity));
    
	
	 if($var_name&&$var_price){
$var_sale_id=$_REQUEST['saleid'];
$var_product_no=$_REQUEST['product_no'];
$var_bar=$_REQUEST['barcode'];

$sql_sale_pro="INSERT INTO sale_products (sale_no,product_no,barcode,product_name,price,sold_by) VALUES (:sale_no,:product_no,:barcode,:product_name,:price,:sold_by)";
$result_sale_pro=$conn->prepare($sql_sale_pro);
$result_sale_pro->execute(array(':sale_no'=>$var_sale_id,'product_no'=>$var_product_no,'barcode'=>$var_bar,'product_name'=>$var_name,'price'=>$var_price,'sold_by'=>$uname));

header('location:http://localhost/BIT/sale.php');
}
}else{ ?>
		<script>
			alert("Product Not In Stock");
			window.location.href="sale.php";
			</script>
<?php }
}else{ ?>
			<script>
			alert(":( OOPs Currently Product Is Disabled");
			window.location.href="sale.php";
			</script>
<?php }

}

?>