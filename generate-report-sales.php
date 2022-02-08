<?php
include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/BIT/login.html');
  $uname=$_SESSION['username'];
}
if(isset($_REQUEST['generate_report'])){
	$sql_table="SELECT * FROM sold_list ORDER BY sale_id";
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
	<h3>Sales Report</h3>
	</div>
	
	<div align="left">
	Date:<b><?php echo date("d/m/Y");?></b>
	
	</div>
	
	<br>
	<table class="table table-responsive">
	<thead>
	<tr>
	<td class="text-center"><b>Sr.</b></td>
	<td class="text-center"><b>Sale id</b></td>
	<td class="text-center"><b>Sub Total</b></td>
	<td class="text-center"><b>Pay</b></td>
	<td class="text-center"><b>Balance</b></td>
	<td class="text-center"><b>Return</b></td>
	<td class="text-center"><b>Net Total</b></td>
	<td class="text-center"><b>Sold By</b></td>
	<td class="text-center"><b>Time</b></td>
	
	</tr>
	</thead>
	<?php
	$NO=0;
	$total_amount=0;
	$total_pay=0;
	$total_balance=0;
	$total_return=0;
	$net_amount=0;
	while($row_table=$result_table->fetch(PDO::FETCH_ASSOC)){
	$NO++;
	$sale_id=$row_table['sale_id'];
	$total=$row_table['total_amount'];
	$pay=$row_table['pay'];
	$balance=$row_table['balance'];
	$return=$row_table['returned_amount'];
	$sub_total=$row_table['sub_total'];
	$sold_by=$row_table['sold_by'];
	$time=$row_table['sold_time'];
	
	
	$total_amount=$total_amount+$total;
	$total_pay=$total_pay+$pay;
	$total_balance=$total_balance+$balance;
	$total_return=$total_return+$return;
	$net_amount=$net_amount+$sub_total;
	
	
	?>
	<tr>
	<td class="text-center"><?php echo $NO; ?></td>
	<td class="text-center"><?php echo $sale_id; ?></td>
	<td class="text-center"><?php echo $total;?></td>
	<td class="text-center"><?php echo $pay; ?></td>
	<td class="text-center"><?php echo $balance; ?></td>
	<td class="text-center"><?php echo $return;?></td>
	<td class="text-center"><?php echo $sub_total; ?></td>
	<td class="text-center"><?php echo $sold_by; ?></td>
	<td class="text-center"><?php echo $time; ?></td>
	
	</tr>
	
	<?php }?>
	</table>
	<div align="right">
	Total Sales: <b><?php echo $NO;?></b>
	</div>
	<div align="right">
	Total Amount: <b><?php echo $total_amount;?></b>
	</div>
	<div align="right">
	Net Paid:<b><?php echo $total_pay;?></b>
	</div>
	<div align="right">
	Net Balance:<b><?php echo $total_balance;?></b>
	</div>
	<div align="right">
	Net Return:<b><?php echo $total_return;?></b>
	</div>
	<div align="right">
	Net Amount: <b><?php echo $net_amount;?></b>
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
			window.location.href="viewAllSales.php";
		}
	</script>

</body>

</html>