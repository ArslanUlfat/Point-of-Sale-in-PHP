<!doctype html>
<?php
include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/BIT/login.html');
  $uname=$_SESSION['username'];
}
if(isset($_REQUEST['remove_pro'])){
    $sql="DELETE FROM productlist WHERE id= :id";
    $result=$conn->prepare($sql);
    $id=$_REQUEST['id'];
    $result->execute(array(':id'=>$id));
	if(!$result){ ?>
			<script>
			alert("Something Went Wrong While Deleting Product Please Try Again");
			window.location.href="";
			</script>
<?php	}
}
$sqlcategory="SELECT * FROM productcategory WHERE status=1";
$sqlsupplier="SELECT * FROM supplier WHERE status=1";
$resultcategory=$conn->prepare($sqlcategory);
$resultsupplier=$conn->prepare($sqlsupplier);
$resultcategory->execute();
$resultsupplier->execute();



$sqlProductId="SELECT product_id from productlist ORDER BY id DESC LIMIT 1";
$resultPrId=$conn->prepare($sqlProductId);
$resultPrId->execute();
$rowProId=$resultPrId->fetch(PDO::FETCH_ASSOC);
$product_ID=$rowProId['product_id']+1;

$sqlPurchaseId="SELECT purchase_id from purchase_list ORDER BY id DESC LIMIT 1";
$resultPurchaseId=$conn->prepare($sqlPurchaseId);
$resultPurchaseId->execute();
$rowPurchaseId=$resultPurchaseId->fetch(PDO::FETCH_ASSOC);
$purchase_ID=$rowPurchaseId['purchase_id']+1;






$sqlSumAmount="SELECT cost FROM productlist where purchase_id=$purchase_ID";
$resultAmount=$conn->prepare($sqlSumAmount);
$resultAmount->execute();
$totalAmount=0;
while($rowAmount=$resultAmount->fetch(PDO::FETCH_ASSOC)){
$totalAmount=$totalAmount+intval($rowAmount['cost']);
}


?>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Purchase Products | Point of Sale</title>
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
    <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href="css/editor/select2.css">
    <link rel="stylesheet" href="css/editor/datetimepicker.css">
    <link rel="stylesheet" href="css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="css/editor/x-editor-style.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
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
            
                <a href="index.php"><img class="main-logo" src="img/logo/logo2.png" width="100" alt="" /></a>
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
                        <a href="index.html"><img class="main-logo" src="img/logo/logo2.png" width="82" alt="" /></a>
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
                                
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                               <li class="nav-item"><a href="index.php" class="nav-link">Home</a>
                                                </li>
                                                
                                                <li class="nav-item"><a href="contact_us.php" class="nav-link">Contact US</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
									
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
										
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item dropdown">
												<!--
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-envelope-o adminpro-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>
															
												   <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1>Message</h1>
                                                        </div>
                                                        <ul class="message-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/1.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/4.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/3.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/2.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="message-view">
                                                            <a href="#">View All Messages</a>
                                                        </div>
                                                    </div>
													-->
                                                </li>
												<!--
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-cloud adminpro-cloud-computing-down" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-eraser adminpro-shield" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-line-chart adminpro-analytics-arrow" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                -->
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
															<!--
                                                        <div class="tab-content custom-bdr-nt">
                                                            <div id="Notes" class="tab-pane fade in active">
                                                                <div class="notes-area-wrap">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="fa fa-comments-o"></i> Latest News</h2>
                                                                        <p>You have 10 New News.</p>
                                                                    </div>
                                                                    <div class="notes-list-area notes-menu-scrollbar">
                                                                        <ul class="notes-menu-list">
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/4.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/1.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/2.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/3.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/4.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/1.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/2.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/1.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/2.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/3.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="Projects" class="tab-pane fade">
                                                                <div class="projects-settings-wrap">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="fa fa-cube"></i> Recent Activity</h2>
                                                                        <p> You have 20 Recent Activity.</p>
                                                                    </div>
                                                                    <div class="project-st-list-area project-st-menu-scrollbar">
                                                                        <ul class="projects-st-menu-list">
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New User Registered</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">1 hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New Order Received</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">2 hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New Order Received</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">3 hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New Order Received</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">4 hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New User Registered</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">5 hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New Order</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">6 hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New User</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">7 hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>New Order</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">9 hours ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="Settings" class="tab-pane fade">
                                                                <div class="setting-panel-area">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="fa fa-gears"></i> Settings Panel</h2>
                                                                        <p> You have 20 Settings. 5 not completed.</p>
                                                                    </div>
                                                                    <ul class="setting-panel-list">
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Show notifications</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                                                                            <label class="onoffswitch-label" for="example">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Disable Chat</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                                                                            <label class="onoffswitch-label" for="example3">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Enable history</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
                                                                                            <label class="onoffswitch-label" for="example4">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Show charts</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                                                                            <label class="onoffswitch-label" for="example7">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Update everyday</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example2">
                                                                                            <label class="onoffswitch-label" for="example2">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Global search</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example6">
                                                                                            <label class="onoffswitch-label" for="example6">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Offline users</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example5">
                                                                                            <label class="onoffswitch-label" for="example5">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
														-->
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
                                            <li><span class="bread-blod">Purchase Products</span>
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
        <!-- Static Table Start -->
        <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
				
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!---->
					 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Purchase New Products</h1>
                                </div>
                            </div>
							
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="varifyPurchaseProduct.php" name="purchaseProForm" onsubmit="return(checkConfirm())" method="POST">
                                                    
													<div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-2 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Product Id</label>
                                                                <input type="text" class="form-control" name=""  value="<?php echo $product_ID?>" disabled />
                                                            <input type="hidden" name="pro_id" value="<?php echo $product_ID?>">
															</div>
                                                        </div>
                                                    </div>
													 <div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-3 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Barcode</label>
                                                                <input type="text" class="form-control" name="barcode" placeholder="Barcode"/>
                                                            </div>
                                                        </div>
                                                    </div>
													 <div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-3 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Brand Name</label>
                                                                <input type="text" class="form-control" name="brand_name" placeholder="Brand Name"/>
                                                            </div>
                                                        </div>
                                                    </div>
													
													<div class="form-group-inner">
                                                        <div class="">
                                                             <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                                <label class="login2 pull-left pull-left-pro">Select Category</label>
                                                            </div>
                                                            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                                                                <div class="input-group">
																<select class="form-control" name="selectCategory">
																<option value="">Select Category</option>
																<?php while($rowcategory=$resultcategory->fetch(PDO::FETCH_ASSOC)){?>
																
																<option value=<?php echo $rowcategory['category'];?>>
																<?php echo $rowcategory['category'];?>
																</option>
																<?php }?>
																</select>
                                                                    <!--<input type="text" class="form-control">-->
                                                                    <div class="input-group-btn custom-dropdowns-button">
                                                                        <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button" aria-expanded="false">setting <span class="caret"></span>
																			</button>
                                                                        <ul class="dropdown-menu pull-left">
                                                                            <li><a href="categories.php">Add New Category</a>
                                                                           
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													
													 <div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-2 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Quantity</label>
                                                                <input type="text" class="form-control" name="qty" placeholder="Quantity" oninput="_qty(this)" />
                                                            </div>
                                                        </div>
                                                    </div>
													 <div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-3 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Cost Price(Rs.)</label>
                                                                <input type="text" class="form-control" name="cost_price" placeholder="Cost Price" oninput="cost(this)" />
                                                            </div>
                                                        </div>
                                                    </div>
													 <div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-3 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Cost Price(Rs.)/Item</label>
                                                                <input type="text" class="form-control" name="cost_price_item" placeholder="Cost Price/Item" oninput="_cost_item(this)" />
                                                            </div>
                                                        </div>
                                                    </div>
														<div class="form-group-inner">
                                                        <div class="">
                                                             <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                                <label class="login2 pull-left pull-left-pro">Select Supplier</label>
                                                            </div>
                                                            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                                                                <div class="input-group">
																<select class="form-control" name="selectSupplier">
																<option>Select Supplier</option>
																<?php while($rowsupplier=$resultsupplier->fetch(PDO::FETCH_ASSOC)){?>
																<option value=<?php echo $rowsupplier['suppliername'];?>>
																<?php echo $rowsupplier['suppliername'];?>
																</option>
																<?php }?>
																</select>
                                                                    <!--<input type="text" class="form-control">-->
                                                                    <div class="input-group-btn custom-dropdowns-button">
                                                                        <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button" aria-expanded="false">setting <span class="caret"></span>
																			</button>
                                                                        <ul class="dropdown-menu pull-left">
                                                                            <li><a href="supplier.php">Add New Supplier</a>
                                                                           
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													 <div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-3 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Sale Price(Rs.)</label>
                                                                <input type="text" class="form-control" name="sale_price" placeholder="Set Sale Price" oninput="sale(this)" />
                                                            </div>
                                                        </div>
                                                    </div>
													 <div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-3 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Sale Price/Item(Rs.)</label>
                                                                <input type="text" class="form-control" name="slae_price_item" placeholder="Sale Price/Item" oninput="_sale_item(this)" />
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-3 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Stock Level</label>
                                                                <input type="text" class="form-control" name="mini_stock_level" placeholder="Minimum Stock Level" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-3 col-sm-9 col-xs-12">
															 <label class="login2 pull-left pull-left-pro">status</label>
                                                                <select class="form-control" name="pro_status">
																<option value=" ">Select Status</option>
																<option value="1">active</option>
																<option value="2">deactive</option>
																</select>
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-2 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Purchase Id</label>
                                                                <input type="text" class="form-control" name="" value="<?php echo $purchase_ID?>" disabled />
                                                            <input type="hidden" name="purchase_id" value="<?php echo $purchase_ID?>">
															</div>
                                                        </div>
                                                    </div>
<br>
                                                    <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-7 col-md-7"></div>
                                                                <div class="col-lg-">
                                                                    <div class="login-horizental cancel-wp pull-left">
                                                                        <button class="btn btn-sm btn-primary" type="reset">Reset</button>
                                                                        <button class="btn  btn-sm btn-success" type="submit" name="Add_Pro" onclick="return(checkEmpty())">Add To Cart</button>
																		
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<!----->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="">
                            <div class="row">
                                <div class="main-sparkline13-hd">
                                    <h1>Purchase <span class="table-project-n">Detail</span><h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control">
												<option value="">Export Basic</option>
												<option value="all">Export All</option>
												<option value="selected">Export Selected</option>
											</select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="sr" data-editable="">Sr.</th> 
                                                <th data-field="p_id" data-editable="true">ID</th>
												<th data-field="barcode" data-editable="true">Barcode</th>
												<th data-field="p_name" data-editable="true">Brand Name</th>
												<th data-field="p_category" data-editable="true">Category</th>
												<th data-field="p_supplier" data-editable="true">Supplier</th>
												<th data-field="p_qty" data-editable="true">Qty</th>
												<th data-field="p_cost" data-editable="true">Cost Price</th>
												<th data-field="p_cost/item" data-editable="true">Cost/Item Price</th>
												<th data-field="p_sale" data-editable="true">Sale Price</th>
												<th data-field="p_sale/item" data-editable="true">Sale/Item Price</th>
												<th data-field="profit" data-editable="true">Profit</th>
												
                                                <th data-field="p_status" >Status</th>
												<th data-field="p_purchasedby" >Purchased By</th>
												<th data-field="p_purchasing_time" >Purchasing Time</th>
                                                <th data-field="action">Action</th>
												<th data-field="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
										    $sql_table="SELECT * FROM productlist where purchase_id=$purchase_ID ORDER BY purchasing_time";
											$result_table=$conn->prepare($sql_table);
											$result_table->execute();
											$count_sr=0;
											while($row_table=$result_table->fetch(PDO::FETCH_ASSOC)){ $count_sr++?>
										
											<tr>
											
											<td><?php echo $count_sr;?></td>
											<td><?php echo $row_table['product_id']?></td>
											<td><?php echo $row_table['barcode']?></td>
											<td><?php echo $row_table['p_name']?></td>
											<td><?php echo $row_table['p_category']?></td>
											<td><?php echo $row_table['p_supplier']?></td>
											<td><?php echo $row_table['quantity']?></td>
											<td><?php echo $row_table['cost']?></td>
											<td><?php echo $row_table['cost_item']?></td>
											<td><?php echo $row_table['sale']?></td>
											<td><?php echo $row_table['sale_item']?></td>
											<td><?php echo $row_table['profit_rupees']?></td>
											<td><?php if($row_table['status']==1){echo "Active";}else if($row_table['status']==2){echo "DeActive";}?></td>
											<td><?php echo $row_table['purchased_by']?></td>
											<td><?php echo $row_table['purchasing_time']?></td>
													
										   <td><form action="" method="POST"><input type="hidden" name="id" value="<?php echo $row_table['id'];?>"><input type="submit" class="btn btn-sm btn-danger" name="remove_pro" value="Remove"></form></td>
										   </tr>
											<?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1></h1>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="PurchaseList.php" name="purchaseListForm" onsubmit="return(checkConfirm())" method="POST">
                                                    <div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-2 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Purchase ID</label>
                                                                <input type="text" class="form-control" name="" value="<?php echo $purchase_ID?>" disabled  />
                                                            <input type="hidden" name="purchase_id" value="<?php echo $purchase_ID?>">
															</div>
                                                        </div>
                                                    </div>
													 <div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-2 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Total Amount</label>
															
                                                                <input type="text" class="form-control" name="total_amount_script"  value="<?php echo $totalAmount;?>" disabled />
                                                            <input type="hidden" name="total_amount" value="<?php echo $totalAmount?>">
															</div>
                                                        </div>
                                                    </div>
													 <div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-3 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Pay</label>
                                                                <input type="text" class="form-control" name="pay" placeholder="Enter Amount to Pay" oninput="Pay_amount(this)" />
                                                            </div>
                                                        </div>
                                                    </div>
													 <div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-2 col-sm-9 col-xs-12">
															<label class="login2 pull-left pull-left-pro">Due Amount</label>
                                                                <input type="text" class="form-control" name="due_script" disabled />
																<input type="hidden" name="due">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group-inner">
                                                        <div class="">
                                                            
                                                            <div class="col-lg-3 col-md-3 col-sm-9 col-xs-12">
															 <label class="login2 pull-left pull-left-pro">Payment Method</label>
                                                                <select class="form-control" name="pro_status">
																
																<option value="1" selected>Cash</option>
																<option value="2">Cheque</option>
																</select>
                                                            </div>
                                                        </div>
                                                    </div>
<br>
                                                    <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-7 col-md-10"></div>
                                                                <div class="col-lg-">
                                                                    <div class="login-horizental cancel-wp pull-left">
                                                                       
                                                                        <button class="btn  btn-sm btn-success" type="submit" name="purchase_Pro" onclick="return(checkEmptyInvoice())">Purchase & Print</button>
																		
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
			
			
        </div>
        <!-- Static Table End -->
			
				
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <!--<p>Copyright © 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>-->
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
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
		============================================ -->
    <script src="js/editable/jquery.mockjax.js"></script>
    <script src="js/editable/mock-active.js"></script>
    <script src="js/editable/select2.js"></script>
    <script src="js/editable/moment.min.js"></script>
    <script src="js/editable/bootstrap-datetimepicker.js"></script>
    <script src="js/editable/bootstrap-editable.js"></script>
    <script src="js/editable/xediable-active.js"></script>
    <!-- Chart JS
		============================================ -->
    <script src="js/chart/jquery.peity.min.js"></script>
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
	<script>
	 function checkEmpty(){
            var_pro_id=document.forms["purchaseProForm"]["pro_id"].value
            if(var_pro_id==""){
                alert("Please Enter Product Id");
                return false;
            }
			var_barcode=document.forms["purchaseProForm"]["barcode"].value
            if(var_barcode==""){
                alert("Please Enter Barcode");
                return false;
            }
			var_name=document.forms["purchaseProForm"]["brand_name"].value
            if(var_name==""){
                alert("Please Enter Brand Name");
                return false;
            }
			var_qty=document.forms["purchaseProForm"]["qty"].value
            if(var_qty==""){
                alert("Please Enter Product Quantity");
                return false;
            }
			var_cost=document.forms["purchaseProForm"]["cost_price"].value
            if(var_cost==""){
                alert("Please Enter Product Cost Price");
                return false;
            }
			var_cost_item=document.forms["purchaseProForm"]["cost_price_item"].value
            if(var_cost_item==""){
                alert("Please Enter Product Cost Price Per Item");
                return false;
            }
			var_supplier=document.forms["purchaseProForm"]["selectSupplier"].value
            if(var_supplier==""){
                alert("Please Select Supplier");
                return false;
            }
				var_sale=document.forms["purchaseProForm"]["sale_price"].value
            if(var_sale==""){
                alert("Please Set Product Sale");
                return false;
            }
				var_sale_item=document.forms["purchaseProForm"]["slae_price_item"].value
            if(var_sale_item==""){
                alert("Please set Sale Price/item");
                return false;
            }
			
            status_sup=document.forms["purchaseProForm"]["pro_status"].value
			
            if(status==" "){
                alert("Please Select Product Status");
                return false;
            }
			
         }
		 function checkConfirm(){
			isConfirm=confirm("Are You Sure!");
			if(isConfirm==true){
            return true;
			}else if(isConfirm==false){
            return false;
			}
		}
		function cost(element){
			var quantity=parseInt(document.forms["purchaseProForm"]["qty"].value);
			var cost=element.value;
			document.forms["purchaseProForm"]["cost_price_item"].value=cost/quantity;
			
		}
		function sale(element){
			var quantity=parseInt(document.forms["purchaseProForm"]["qty"].value);
			var sale=element.value;
			document.forms["purchaseProForm"]["slae_price_item"].value=sale/quantity;
			
		}
		function _qty(element){
			var quantity=element.value;
			var cost=parseInt(document.forms["purchaseProForm"]["cost_price"].value);
			document.forms["purchaseProForm"]["cost_price_item"].value=cost/quantity;
			setZero();
		}
		function _cost_item(element){
			var cost_item=element.value;
			var quantity=parseInt(document.forms["purchaseProForm"]["qty"].value);
			document.forms["purchaseProForm"]["cost_price"].value=quantity*cost_item;
			
		}
		function _sale_item(element){
			var sale_item=element.value;
			var quantity=parseInt(document.forms["purchaseProForm"]["qty"].value);
			document.forms["purchaseProForm"]["sale_price"].value=quantity*sale_item;
			
		}
		function setZero(){
			
			document.forms["purchaseProForm"]["sale_price"].value=0;
			document.forms["purchaseProForm"]["slae_price_item"].value=0;
		}
		function Pay_amount(element){
			var payAmount=element.value;
			var totalAmount=parseInt(document.forms["purchaseListForm"]["total_amount_script"].value);
			document.forms["purchaseListForm"]["due_script"].value=totalAmount-payAmount;
			document.forms["purchaseListForm"]["due"].value=totalAmount-payAmount;
		}
		function checkEmptyInvoice(){
            var_pay=document.forms["purchaseListForm"]["pay"].value
            if(var_pay==""){
                alert("Please Pay Money");
                return false;
            }
			
			
         }
	</script>

</body>

</html>