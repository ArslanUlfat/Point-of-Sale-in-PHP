<?php
include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/BIT/login.html');
  $uname=$_SESSION['username'];
}
if(isset($_REQUEST['generate_report'])){
	$sql_table="SELECT * FROM productlist ORDER BY product_id";
    $result_table=$conn->prepare($sql_table);	
	$result_table->execute();
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Print Report | Point of Sale</title>
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

    <div align="center">
	<h3>Products Report</h3>
	</div>
	
	<div align="left">
	Date:<b><?php echo date("d/m/Y");?></b>
	
	</div>
	
	<br>
	<table class="table table-responsive">
	<thead>
	<tr>
	<td class="text-center"><b>Sr.</b></td>
	<td class="text-center"><b>Product id</b></td>
	<td class="text-center"><b>Barcode</b></td>
	<td class="text-center"><b>Name</b></td>
	<td class="text-center"><b>Category</b></td>
	<td class="text-center"><b>Supplier</b></td>
	<td class="text-center"><b>Qty</b></td>
	<td class="text-center"><b>Cost Price</b></td>
	<td class="text-center"><b>Cost/Item</b></td>
	<td class="text-center"><b>Sale Price</b></td>
	<td class="text-center"><b>Sale/Item</b></td>
	<td class="text-center"><b>Profit</b></td>
	<td class="text-center"><b>Status</b></td>
	<td class="text-center"><b>Purchased By</b></td>
	<td class="text-center"><b>Purchasing Time</b></td>
	</tr>
	</thead>
	<?php
	$NO=0;
	$total_amount_out=0;
	$total_amount_in=0;
	$total_profit=0;
	while($row_table=$result_table->fetch(PDO::FETCH_ASSOC)){
	$NO++;
	$product_id=$row_table['product_id'];
	$barcode=$row_table['barcode'];
	$name=$row_table['p_name'];
	$category=$row_table['p_category'];
	$supplier=$row_table['p_supplier'];
	$qty=$row_table['quantity'];
	$cost=$row_table['cost'];
	$cost_item=$row_table['cost_item'];
	$sale=$row_table['sale'];
	$sale_item=$row_table['sale_item'];
	
	$profit=$row_table['profit_rupees'];
	
	$purchased_by=$row_table['purchased_by'];
	$time=$row_table['purchasing_time'];
	
	$total_amount_out=$total_amount_out+$cost;
	$total_amount_in=$total_amount_in+$sale;
	$total_profit=$total_profit+$profit;
	if($row_table['status']==1){
		$status="active";
	}else{
		$status="de-active";
	}
	?>
	<tr>
	<td class="text-center"><?php echo $NO; ?></td>
	<td class="text-center"><?php echo $product_id; ?></td>
	<td class="text-center"><?php echo $barcode;?></td>
	<td class="text-center"><?php echo $name; ?></td>
	<td class="text-center"><?php echo $category; ?></td>
	<td class="text-center"><?php echo $supplier;?></td>
	<td class="text-center"><?php echo $qty; ?></td>
	<td class="text-center"><?php echo $cost; ?></td>
	<td class="text-center"><?php echo $cost_item; ?></td>
	<td class="text-center"><?php echo $sale;?></td>
	<td class="text-center"><?php echo $sale_item; ?></td>
	<td class="text-center"><?php echo $profit; ?></td>
	<td class="text-center"><?php echo $status;?></td>
	<td class="text-center"><?php echo $purchased_by; ?></td>
	<td class="text-center"><?php echo $time; ?></td>
	
	</tr>
	
	<?php }?>
	</table>
	<div align="right">
	Total Items:<b><?php echo $NO;?></b>
	</div>
	<div align="right">
	Total Amount Out:<b><?php echo $total_amount_out;?></b>
	</div>
	<div align="right">
	Total Amount In:<b><?php echo $total_amount_in;?></b>
	</div>
	<div align="right">
	Profit Amount:<b><?php echo $total_profit;?></b>
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
			window.location.href="managePurchase.php";
		}
	</script>

</body>

</html>