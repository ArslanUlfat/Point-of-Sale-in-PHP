<?php
include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/BIT/login.html');
  $uname=$_SESSION['username'];
}else{
$uname=$_SESSION['username'];
date_default_timezone_set("America/New_York");
$year=date("Y");
$month=date("m");
$day=date("d");
    if(isset($_REQUEST['sold_pro_list'])){
$var_sale_id=$_REQUEST['sale_id'];
$var_total_amount=$_REQUEST['total_amount'];
$var_pay=$_REQUEST['pay'];
$var_balance=$_REQUEST['balance'];
$var_status=$_REQUEST['pro_status'];
$returned_amount=0;
$subTotal=$var_total_amount-$returned_amount;
$sqlInsertPurchase="INSERT INTO sold_list (sale_id,total_amount,pay,balance,sub_total,sold_by,year,month,day) VALUES (:sale_id,:total_amount,:pay,:balance,:sub_total,:sold_by,:year,:month,:day)";
$resultInsert=$conn->prepare($sqlInsertPurchase);
$resultInsert->execute(array(':sale_id'=>$var_sale_id,':total_amount'=>$var_total_amount,':pay'=>$var_pay,':balance'=>$var_balance,':sub_total'=>$subTotal,':sold_by'=>$uname,':year'=>$year,':month'=>$month,':day'=>$day));




$sqlSelectItems="SELECT * FROM sale_products where sale_no=$var_sale_id";
$resultSelectItems=$conn->prepare($sqlSelectItems);
$resultSelectItems->execute();




//header('location:http://localhost/BIT/sale.php');
}
}
?>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sold Products | Point of Sale</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
	
	<link rel="stylesheet" href="my-font/css/all.min.css">
	<style>
	@media print{
		.button{
				display:none;
		}
	}
	@media print{
		@page{
			margin-top:0;
			margin-bottom:0;
		}
		body{
			padding-top:72:px;
			padding-bottom:72px;
		}
	}
	</style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="container">
	<div class="row">
	<div class="col-xs-12">
	<div class="print" style="border: 1px solid #a1a1a1; width: 88mm; background: white; padding: 10px; margin:0 auto; text-align:center; ">
	<div align="center">
	<h3>Sale Invoice</h3>
	</div>
	<div align="left">
	Date:<b><?php echo date("d/m/Y");?></b>
	
	</div>
	<div align="right">
	Invoice#<b><?php echo $var_sale_id;?></b>
	</div>
	<div align="right">
	sale id: <b><?php echo $var_sale_id;?></b>
	</div>
	<br>
	<table class="table table-responsive">
	<thead>
	<tr>
	<td class="text-center"><b>No.</b></td>
	<td class="text-center"><b>product code</b></td>
	<td class="text-center"><b>Item</b></td>
	
	<td class="text-center"><b>Price.</b></td>
	
	</tr>
	</thead>
	<?php
	$NO=0;
	$subTotal=0;
	while($rowSelectItems=$resultSelectItems->fetch(PDO::FETCH_ASSOC)){
	$NO++;
	$product_no=$rowSelectItems['product_no'];
	$name=$rowSelectItems['product_name'];
	$price=$rowSelectItems['price'];
	
	$subTotal=$subTotal+$price;
	?>
	<tr>
	<td class="text-center"><?php echo $NO;?></td>
	<td class="text-center"><?php echo $product_no;?></td>
	<td class="text-center"><?php echo $name;?></td>
	
	<td class="text-center"><?php echo $price;?></td>
	
	</tr>
	<?php }?>
	
	</table>
	
	<div align="right">
	SubTotal:<b><?php echo $subTotal;?></b>
	</div>
	<div align="right">
	Paid:<b><?php echo $var_pay;?></b>
	</div>
	<div align="right">
	Due:<b><?php echo $var_balance;?></b>
	</div>
	
	</div>
	</div>
	</div>
	</div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/morrisjs/raphael-min.js"></script>
    <script src="js/morrisjs/morris.js"></script>
    <script src="js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	
	<script>
		myFunction();
		function myFunction(){
			window.print();
			//closePrintView();
		}
		window.onafterprint=function(e){
		closePrintView();
		};
		function closePrintView(){
			window.location.href="sale.php";
		}
	</script>

</body>

</html>