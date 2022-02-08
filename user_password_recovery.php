<?PHP
session_start();
error_reporting(0);
include 'config.php';
if(isset($_POST['change_password'])){
$name=$_REQUEST['user_name'];
$email=$_REQUEST['user_email'];
$password=$_REQUEST['new_password'];
$sql_user="SELECT firstname,email FROM users WHERE firstname='$name' && email='$email'";
$result_user=$conn->prepare($sql_user);
$result_user->execute();
$row_user=$result_user->fetch(PDO::FETCH_ASSOC);
if($result_user->rowCount()>0){
$sql="UPDATE users SET password=:newPass WHERE firstname=:name and email=:email";
$result=$conn->prepare($sql);
$result->execute(array('newPass'=>$password,'name'=>$name, 'email'=>$email));
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Password Recovery | Point of Sale</title>
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
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>
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
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12"></div>
            <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h1>User Password Recovery</h1>
                    
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="" id="PasswordForm" method="POST" name="changePasswordForm" onSubmit="return valid();">
                            <div class="form-group">
                                <label class="control-label" for="username" >Reg. User Name</label>
                                <input type="text" placeholder="Registered User Name" title="Please enter you Registered Name" required="" value="" name="user_name" id="username" class="form-control">
                                <span class="help-block small">Your Registered Name</span>
                            </div>
							<div class="form-group">
                                <label class="control-label" for="email" >Reg. Email id</label>
                                <input type="text" placeholder="Registered Email" title="Please enter you Registered Email" required="" value="" name="user_email" id="username" class="form-control">
                                <span class="help-block small">Your Registered Email id</span>
                            </div>
							
                            <div class="form-group">
                                <label class="control-label" for="newpassword">New Password</label>
                                <input type="password" title="Please enter your New password" placeholder="******" required="" value="" name="new_password" id="newpassword" class="form-control">

                            </div>
							<div class="form-group">
                                <label class="control-label" for="conpassword">Confirm Password</label>
                                <input type="password" title="Please enter your password again" placeholder="******" required="" value="" name="confirm_password" id="confirmpassword" class="form-control">

                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
										<input type="checkbox" class="i-checks"> Remember me </label>
                                <p class="help-block small">(if this is a private computer)</p>
								
                            </div>
							
                            <button class="btn btn-success btn-block loginbtn" name="change_password"  >Change Password</button>
                           <!-- <a class="btn btn-default btn-block" href="#">Register</a> -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12 text-center">
              <!-- <p>Copyright &copy; 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p> -->
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
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<script>
		function valid()
{
if(document.changePasswordForm.new_password.value!= document.changePasswordForm.confirm_password.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.changePasswordForm.confirm_password.focus();
return false;
}
return true;
}
	</script>
</body>

</html>