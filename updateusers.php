<?php
session_start();
    if(!isset($_SESSION['username'])){
        header('location:http://localhost/BIT/login.html');
        $uname=$_SESSION['username'];
      }
	  include 'config.php';
	  if(isset($_REQUEST['edit2'])){
    if(($_REQUEST['firstname']=="")||($_REQUEST['lastname']=="")||($_REQUEST['email']=="")||($_REQUEST['contact_no']=="")||($_REQUEST['password']=="")||($_REQUEST['gender']=="")||($_REQUEST['status']=="")){

    }else{
        $sql="UPDATE users SET id=:id, firstname=:firstname, lastname=:lastname, email=:email, cell=:cell, password=:password, gender=:gender, status=:status WHERE id=:id";
        $result=$conn->prepare($sql);
        $id=$_REQUEST['id'];
        $firstname=$_REQUEST['firstname'];
        $lastname=$_REQUEST['lastname'];
        $email=$_REQUEST['email'];
		$cell=$_REQUEST['contact_no'];
        $password=$_REQUEST['password'];
        $gender=$_REQUEST['gender'];
		$status=$_REQUEST['status'];		
        $result->execute(array('id'=>$id,'firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'cell'=>$cell, 'password'=>$password,'gender'=>$gender, 'status'=>$status));
        if($result){ ?>
            <script>
			alert("Successfully Edit User");
			window.location.href="manage_users.php";
			</script>
<?php        }else{ ?>
            <script>
			alert("Something Wents Wrong!");
			window.location.href="manage_users.php";
			</script>

<?php        }
   }
   // header('location:http://localhost/BIT/manage_users.php');       
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Users | Point of Sale</title>
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
	<link rel="stylesheet" href="my-font/css/all.min.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script>
        function show_alert(){
            alert("User Added Successfully");
        }

    function checkConfirm(){
       isConfirm=confirm("Are You Sure!");
        if(isConfirm==true){
            return true;
        }else if(isConfirm==false){
            return false;
        }
    }
        function checkEmpty(){
            fname=document.forms["add_user_form"]["firstname"].value
            if(fname==""){
                alert("Fill First Name");
                return false;
            }
            lname=document.forms["add_user_form"]["lastname"].value
            if(lname==""){
                alert("Fill last Name");
                return false;
            }
            email=document.forms["add_user_form"]["email"].value
            if(email==""){
                alert("Fill Email ");
                return false;
            }
            cell=document.forms["add_user_form"]["contact_no"].value
            if(cell==""){
                alert("Fill Cell No.");
                return false;
            }
            password=document.forms["add_user_form"]["password"].value
            if(password==""){
                alert("Fill Password");
                return false;
            }
            repeatPassword=document.forms["add_user_form"]["repeat_password"].value
            if(repeatPassword==""){
                alert("Fill Repeat Password");
                return false;
            }
            if(password!=repeatPassword){
                alert("Password Mis Match");
                return false;
            }
         }
        </script>
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
        
<!--START OF REGISTRATION FORM-->
 <?php
      if(isset($_REQUEST['edit'])){
        $sql="SELECT * FROM users WHERE id=:id";
        $result=$conn->prepare($sql);
        $id=$_REQUEST['id'];
        $result->execute(array('id'=>$id));
        $row=$result->fetch(PDO::FETCH_ASSOC);
    }
        ?>
        
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
<!--<a href="index.html" class="btn btn-primary">Back to Dashboard</a>-->
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3>Edit Users</h3>
                   <!-- <p>Admin template with very clean and aesthetic style prepared for your next app. </p>-->
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form id="loginForm"  name="add_user_form" onsubmit="return(checkConfirm())">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>First Name</label>
                                    <input class="form-control"  name="firstname" value="<?php if(isset($row['firstname'])){echo $row['firstname'];}?>">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Last name</label>
                                    <input class="form-control" name="lastname" value="<?php if(isset($row['lastname'])){echo $row['lastname'];}?>">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email</label>
                                    <input class="form-control" name="email" value="<?php if(isset($row['email'])){echo $row['email'];}?>">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Contact No.</label>
                                    <input class="form-control" name="contact_no" value="<?php if(isset($row['cell'])){echo $row['cell'];}?>">
                                </div>
                                
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" value="<?php if(isset($row['password'])){echo $row['password'];}?>">
                                </div>
                                
                                <div class="form-group col-lg-6">
                                    <label>Repeat Password</label>
                                    <input type="password" class="form-control" name="repeat_password">
                                </div>
                                <div class="form-group col-lg-6">
                                <label class="radio-inline"><input type="radio" name="gender" value="Male" checked="checked">Male</label>
                                <label class="radio-inline"><input type="radio" name="gender" value="Female" >Female</label>
                               
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Status</label>
                                    <select class="form-control" name="status" >
                                        <option selected="selected">active</option>
                                        <option>deactive</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="text-center">
							 <input type="hidden" name="id" value="<?php echo $row['id']?>">
             <!--   <button type="submit" class="btn btn-primary btn-user btn-block" name="edit2">Edit</button>-->
				<button type="submit" class="btn btn-primary " name="edit2" onclick="return(checkEmpty())" >Edit</button>
                                <button class="btn btn-default">Cancel</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--END OF INDEX.PHP-->
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright &copy; 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
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
</body>

</html>