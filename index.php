<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/BIT/login.html');
  $uname=$_SESSION['username'];
}
include 'config.php';
date_default_timezone_set("America/New_York");
$year=date("Y");
$month=date("m");
$day=date("d");
$today_sale=0;
$sale_today_sql="SELECT sub_total FROM sold_list where year=$year and month=$month and day=$day";
     $sale_today_result=$conn->prepare($sale_today_sql);
     $sale_today_result->execute();
	 while($sale_today_row=$sale_today_result->fetch(PDO::FETCH_ASSOC)){
		$today_sale=$today_sale+$sale_today_row['sub_total'];
	 }

$current_mont_sale=0;
$current_mont_sale_sql="SELECT sub_total FROM sold_list where  year=$year and month=$month";
     $current_mont_sale_sql_result=$conn->prepare($current_mont_sale_sql);
     $current_mont_sale_sql_result->execute();
	 while($current_mont_sale_row=$current_mont_sale_sql_result->fetch(PDO::FETCH_ASSOC)){
		$current_mont_sale=$current_mont_sale+$current_mont_sale_row['sub_total'];
	 }


$lastday=($day-1);
$last_day_sale=0;
$lastday_sql="SELECT sub_total FROM sold_list where year=$year and month=$month and day=$lastday";
     $lastday_result=$conn->prepare($lastday_sql);
     $lastday_result->execute();
	 while($lastday_row=$lastday_result->fetch(PDO::FETCH_ASSOC)){
		$last_day_sale=$last_day_sale+$lastday_row['sub_total'];
	 }

$lastMonth=($month-1);
$last_month_sale=0;
$last_month_sql="SELECT sub_total FROM sold_list where year=$year and month=$lastMonth";
     $last_month_result=$conn->prepare($last_month_sql);
     $last_month_result->execute();
	 while($last_month_row=$last_month_result->fetch(PDO::FETCH_ASSOC)){
		$last_month_sale=$last_month_sale+$last_month_row['sub_total'];
	 }
	 

$lastYear=($year-1);
$last_year_sale=0;
$last_year_sql="SELECT sub_total FROM sold_list where year=$lastYear";
     $last_year_result=$conn->prepare($last_year_sql);
     $last_year_result->execute();
	 while($last_year_row=$last_year_result->fetch(PDO::FETCH_ASSOC)){
		$last_year_sale=$last_year_sale+$last_year_row['sub_total'];
	 }



$total_items=0;
$items_sql="SELECT quantity FROM productlist";
     $items_result=$conn->prepare($items_sql);
     $items_result->execute();
	 while($items_row=$items_result->fetch(PDO::FETCH_ASSOC)){
		$total_items=$total_items+$items_row['quantity'];
	 }

$total_categories=0;
$count_category_sql="SELECT * FROM productcategory";
     $count_category_result=$conn->prepare($count_category_sql);
     $count_category_result->execute();	 
	while($count_category_row=$count_category_result->fetch(PDO::FETCH_ASSOC)){
		$total_categories=$total_categories+1;
	 }
	

$total_active_users=0;
$count_active_user_sql="SELECT * FROM users where status=1";
     $count_count_active_user_result=$conn->prepare($count_active_user_sql);
     $count_count_active_user_result->execute();	 
	while($count_active_user_row=$count_count_active_user_result->fetch(PDO::FETCH_ASSOC)){
		$total_active_users=$total_active_users+1;
	 }


$total_deactive_users=0;
$count_deactive_user_sql="SELECT * FROM users where status=2";
     $count_count_deactive_user_result=$conn->prepare($count_deactive_user_sql);
     $count_count_deactive_user_result->execute();	 
	while($count_deactive_user_row=$count_count_deactive_user_result->fetch(PDO::FETCH_ASSOC)){
		$total_deactive_users=$total_deactive_users+1;
	 }	

$total_users=$total_active_users+$total_deactive_users;


$purchase_total_amount=0;
$purchase_total_amount_sql="SELECT total_amount FROM purchase_list";
     $purchase_total_amount_result=$conn->prepare($purchase_total_amount_sql);
     $purchase_total_amount_result->execute();	 
	while($purchase_total_amount_row=$purchase_total_amount_result->fetch(PDO::FETCH_ASSOC)){
		$purchase_total_amount=$purchase_total_amount+$purchase_total_amount_row['total_amount'];
	 }
	 
	 
	 
$sale_total_amount=0;
$sale_total_amount_sql="SELECT sub_total FROM sold_list";
     $sale_total_amount_result=$conn->prepare($sale_total_amount_sql);
     $sale_total_amount_result->execute();	 
	while($sale_total_amount_row=$sale_total_amount_result->fetch(PDO::FETCH_ASSOC)){
		$sale_total_amount=$sale_total_amount+$sale_total_amount_row['sub_total'];
	 }
	
$revenue=$sale_total_amount-$purchase_total_amount;
if($revenue<0){
$revunue_generate=0;
}else{
$revunue_generate=$revenue;
}


	 
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard V.1 | Point of Sale</title>
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
	
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
            
                <a href="index.php"><img class="main-logo" src="img/logo/logo2.png" width="100"alt="" /></a>
                <strong><img src="img/logo/logosn.png" alt="" /></strong>
            </div>
            
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
					<li><a title="Dashboard v.1" href="index.php" class="has-arrow" ><i class="fa big-icon fa-home icon-wrap" aria-hidden="true"></i> <span class="mini-click-non">Home</span></a></li>
                       
						<li><a class="has-arrow" title="Inbox" href="categories.php" aria-expanded="false"><i class="fab big-icon fa-slack icon-wrap" aria-hidden="true"></i> <span class="mini-click-non">Catagories</span></a></li>
						
						
						<li><a title="Inbox" href="supplier.php" class="has-arrow" aria-expanded="false"><i class="fas big-icon fa-truck-loading icon-wrap" aria-hidden="true"></i> <span class="mini-click-non">Suppliers</span></a></li>
                     
					    <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fa big-icon fa-shopping-basket icon-wrap"></i> <span class="mini-click-non">Products</span></a>
                           <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Inbox" href="purchase_product.php"><i class="fas fa-dollar-sign sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Purchase Products</span></a></li>
                            <li><a title="Inbox" href="update_stock.php"><i class="fa fa-arrow-up sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Update Stock</span></a></li>
							<li><a title="Inbox" href="viewAllProducts.php"><i class="fa fa-eye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">View All Products</span></a></li>  
                            <li><a title="Inbox" href="managePurchase.php"><i class="fa fa-eye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">View All Purchases</span></a></li>
                             </ul>
                        </li>
					   <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fa big-icon fa-shopping-bag icon-wrap"></i> <span class="mini-click-non">Sales</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Inbox" href="sale.php"><i class="fas fa-dollar-sign sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Sales section</span></a></li>
                            <li><a title="Inbox" href="return_product.php"><i class="fa fa-retweet sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Return Back</span></a></li>
                            <li><a title="Inbox" href="viewAllSales.php"><i class="fa fa-eye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">View All Sales</span></a></li>   
                            </ul>
                        </li>
					   
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fa big-icon fa-users icon-wrap"></i> <span class="mini-click-non">Users</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Inbox" href="adminLock.html"><i class="fa fa-plus-circle sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Add new User</span></a></li>
                            <li><a title="Inbox" href="adminLock2.html"><i class="fa fa-eye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">View All Users</span></a></li>
                               
                            </ul>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.php"><img class="main-logo" src="img/logo/logo2.png" width="82" height="100" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="fa fa-bars"></i>
												</button>
                                        </div>
                                    </div>
                                
                                    <div class="col-lg-6 col-md-9 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="index.php" class="nav-link">Home</a>
                                                </li>
                                                
                                                <li class="nav-item"><a href="contact_us.php" class="nav-link">Contact US</a>
                                                </li>
                                                
												
                                            </ul>
                                        </div>
                                    </div>
									
                                    <div class="col-lg-5 col-md-3 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
										
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item dropdown">
												
                                                </li>

                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
															<span class="admin-name"><?php echo $_SESSION['username'];?></span>
															<i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        
                                                        <li><a href="#"><span class="fa fa-user author-log-ic"></span>My Profile</a>
                                                        </li>
                                                        
                                                        </li>
                                                        <li><a href="#"><span class="fa fa-cog author-log-ic"></span>Settings</a>
                                                        </li>
                                                        <li><a href="logout.php"><span class="fa fa-lock author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-tasks"></i></a>

                                                    <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                        <ul class="nav nav-tabs custon-set-tab">
                                                            <li class="active"><a data-toggle="tab" href="#Notes">News</a>
                                                            </li>
                                                            <li><a data-toggle="tab" href="#Projects">Activity</a>
                                                            </li>
                                                            <li><a data-toggle="tab" href="#Settings">Settings</a>
                                                            </li>
                                                        </ul>
															
                                                    </div>
                                                </li>
                                                
                                            </ul>
                                            
                                        </div>
                                        
                                    </div>
                                 
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
    
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a href="index.php" data-toggle="collapse" data-target="#Charts" href="#">Home<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                           
                                        </li>
                                        <li><a href="categories.php" data-toggle="collapse" data-target="#demo" href="#">Categories<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            
                                        </li>
                                        <li><a href="supplier.php" data-toggle="collapse" data-target="#others" href="#">Suppliers <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Products <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                                <li><a href="purchase_product.php">Purchase Product</a>
                                                </li>
                                                <li><a href="update_stock.php">Update Stock</a>
                                                </li>
                                                <li><a href="viewAllProducts.php">View All Products</a>
                                                </li>
                                                <li><a href="managePurchase.php">View Purchase</a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Sales <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="sale.php">Sale Product</a>
                                                </li>
                                                <li><a href="sale.php">Return Back</a>
                                                </li>
                                                <li><a href="sale.php">View All Sale</a>
                                                </li>
                                         
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Users <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="addUser.php">Add User</a>
                                                </li>
                                                <li><a href="manage_users.php">Manage Users</a>
                                                </li>
                                            </ul>
                                        </li>
										
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
                                                <input type="text" placeholder="Search..." class="form-control">
                                                <a href=""><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Category</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		
		<!--piety Start-->
		         <div class="analytics-sparkle-area mg-t-15">
            <div class="container-fluid">
			<!--
			<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                     
                <div class="card text-white bg-dark mb-3" style="max-width: rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Primary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
             
            <div class="card text-white bg-primary mb-3" style="max-width: rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Primary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
</div>
</div>
-->
				<div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Current Day Sale</h5>
                                <h3><span>Rs.</span><span class="counter"><?php echo $today_sale;?></span></h3>
                                <div class="updating-chart" >
										2,5,9,6,5,9,7,3,5,2,5,3,9,6,5,8,7,8,5,2 	
									</div>
                            </div>
                        </div>
                    </div>
					 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Current Month Sale</h5>
                                <h3><span>Rs.</span><span class="counter"><?php echo $current_mont_sale;?></span></h3>
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Last Day Sale</h5>
                                <h3><span>Rs.</span><span class="counter"><?php echo $last_day_sale;?></span></h3>
                                <div class="line" >
										2,5	
									</div>
                            </div>
                        </div>
                    </div>
                   
                    
                </div>
            </div>
        </div>
		<div class="analysis-rounded-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
					 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 res-mg-t-30">
                            <div class="analytics-content">
                                <h5>Last month Sale</h5>
                                <h3><span>Rs.</span><span class="counter"><?php echo $last_month_sale;?></span></h3>
                                <div class="line" >
										 	4,5,6
									</div>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line res-mg-t-30">
                            <div class="analytics-content">
                                <h5>Last Year Sales</h5>
                                <h3><span>Rs.</span><span class="counter"><?php echo $last_year_sale;?></span></h3>
                                <div class="bar" >
										 	1,2,3,4,5,6
									</div>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line res-mg-t-30">
                            <div class="analytics-content">
                                <h5>Over All Sale</h5>
                                <h3><span>Rs.</span><span class="counter"><?php echo $sale_total_amount;?></span></h3>
                                <div class="bar" >
										 	1,2,3,4,5,6
									</div>
                            </div>
                        </div>
                    </div>
                    
					
                </div>
            </div>
        </div>
		
		<div class="analysis-rounded-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
				
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="analytics-rounded reso-mg-b-30">
                            <div class="analytics-rounded-content">
                                <h5>Total Items in Stock</h5>
                                <h2><span class="counter"><?php echo $total_items;?></h2>
                                <div class="text-center">
                                    <div class="" >
										 	
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="analytics-rounded reso-mg-b-30">
                            <div class="analytics-rounded-content">
                                <h5>Total Categories</h5>
                                <h3><span></span><span class="counter"><?php echo $total_categories;?></span></h3>
                                <div class="text-center">
                                    <div class="" >
										 	
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="analytics-rounded reso-mg-b-30 res-mg-t-30">
                            <div class="analytics-rounded-content">
                                <h5>Total Users</h5>
                               <h2><span class="counter"><?php echo $total_users;?></h2>
								 
                                <div class="text-center">
                                    <div class="" >
										 	
									</div>
                                </div>
                            </div>
							
                        </div>
                    </div>
                   
                    
                    
                    
                </div>
            </div>
        </div>
		
		<div class="analysis-rounded-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
				 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="analytics-rounded res-mg-t-30">
                            <div class="analytics-rounded-content">
                                <h5>Active Users</h5>
                                <h2><span class="counter"><?php echo $total_active_users;?></h2>
                                <div class="text-center">
                                    <div class="" >
										 	
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="analytics-rounded reso-mg-b-30">
                            <div class="analytics-rounded-content">
                                <h5>Deactive Users</h5>
                                <h2><span class="counter"><?php echo $total_deactive_users;?></span></h2>
                                <div class="text-center">
                                    <div class="" >
										 	
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="analytics-rounded reso-mg-b-30">
                            <div class="analytics-rounded-content">
                                <h5>Revenue</h5>
                                <h3><span>Rs.</span><span class="counter"><?php echo $revunue_generate;?></span></h3>
                                <div class="text-center">
                                    <div class="" >
										 	
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
		
		<!--piety End-->
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <!--<p>Copyright &copy; 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>-->
                        <p>Arslan Full Stack Development</p>
						</div>
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
    <!-- peity JS
		============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<script src="js/push.min.js"></script>
<?php
$quantity_min_stock="SELECT quantity,min_stock_level FROM productlist";
     $quantity_min_stock_Result=$conn->prepare($quantity_min_stock);
     $quantity_min_stock_Result->execute();	 
		while($quantity_min_stock_Row=$quantity_min_stock_Result->fetch(PDO::FETCH_ASSOC)){
		$qty=$quantity_min_stock_Row['quantity'];
		$stock=$quantity_min_stock_Row['min_stock_level'];
		
		if($qty<$stock){ ?>
			<script>
Push.create("Update Stock Level !", {
    body: "Dear User Stock Level is Decreasing Rapidly Please Update It",
    icon: '',
      onClick: function () {
        window.location="http://localhost/BIT/update_stock.php";
        this.close();
    }
    
});
</script>
<?php		}
		}
?>
<script>

</script>
<?php?>
</body>

</html>