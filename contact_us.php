<?PHP
session_start();
error_reporting(0);
include 'config.php';
if(!isset($_SESSION['username'])){
  header('location:http://localhost/BIT/login.html');
  $uname=$_SESSION['username'];
}
if(isset($_POST['submit_msg'])){
$name=$_REQUEST['full_name'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['phone_number'];
$msg=$_REQUEST['msg'];
$to="arslanulfat8686@gmail.com";
$subject="Form Submission";
$message="Name: ".$name."<br>"."Phone".$phone."<br>"."Wrote the Following:"."<br><br>".$msg;
$headers="From:".$email;
if(mail($to, $subject, $message, $headers)){ ?>
			<script>
			alert("Yor Message has been delivered<br>We will contact you shortly<br> Thankyou :)");
			window.location.href="contact_us.php";
			</script>
<?php }else{ ?>
			<script>
			alert("Something Went Wrong Please Try Again");
			window.location.href="contact_us.php";
			</script>
<?php }
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact Us | Point of Sale</title>
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
	<style>
    .pb-cmnt-container {
        font-family: Lato;
        margin-top: 100px;
    }

    .pb-cmnt-textarea {
        resize: none;
        padding: 20px;
        height: 130px;
        width: 100%;
        border: 1px solid #F2F2F2;
    }
</style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

  
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
                    <h1>Contact Us</h1>
                    
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="" id="contactForm" method="POST" name="changePasswordForm" >
                            <div class="form-group">
                                <label class="control-label" for="full_name" >Full Name</label>
                                <input type="text" placeholder="Full Name" title="Please enter your Name" required="" value="" name="full_name" id="fullname" class="form-control">
                                <span class="help-block small"></span>
                            </div>
							<div class="form-group">
                                <label class="control-label" for="email" >Email</label>
                                <input type="email" placeholder="Email" title="Please enter you  Email" required="" value="" name="email" id="email " class="form-control">
                                <span class="help-block small">Your  Email id</span>
                            </div>
							
                            <div class="form-group">
                                <label class="control-label" for="phone">Phone</label>
                                <input type="text" title="Please enter your Phone No." placeholder="Enter Phone No." required="" value="" name="phone_number" id="phonenumber" class="form-control">
									<span class="help-block small">Your  Phone Number</span>
                            </div>
							<div class="form-group">
                                <label class="control-label" for="conpassword">Message</label>
                                <div class="panel panel-info">
							<div class="panel-body">
								<textarea name="msg" placeholder="Write your message here!" class="pb-cmnt-textarea"></textarea>
                    
                        <div class="btn-group">
                            <button class="btn" type="button"><span class="fa fa-picture-o fa-lg"></span></button>
                            <button class="btn" type="button"><span class="fa fa-video-camera fa-lg"></span></button>
                            <button class="btn" type="button"><span class="fa fa-microphone fa-lg"></span></button>
                            <button class="btn" type="button"><span class="fa fa-music fa-lg"></span></button>
                        </div>
                         
							</div>
						</div>
                            </div>

                            <button class="btn btn-success btn-block loginbtn" name="submit_msg">Submit</button>
                           
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

</body>

</html>