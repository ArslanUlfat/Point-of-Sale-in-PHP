<?php
include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/BIT/login.html');
  $uname=$_SESSION['username'];
}
$uname=$_SESSION['username'];
    if(isset($_REQUEST['Add_sup'])){
$var_supp_name=$_REQUEST['suppler_name'];
$var_supp_cont=$_REQUEST['contact_sup'];
$var_supp_email=$_REQUEST['email_sup'];
$var_supp_address=$_REQUEST['address_sup'];
$var_status=$_REQUEST['supp_status'];
$sql_add="INSERT INTO supplier (suppliername,contact,email,address, status, addedby) VALUES (:suppliername,:contact,:email,:address,:status,:addedby)";
$result_add=$conn->prepare($sql_add);
$result_add->execute(array(':suppliername'=>$var_supp_name,':contact'=>$var_supp_cont,':email'=>$var_supp_email,':address'=>$var_supp_email,':address'=>$var_supp_address,':status'=>$var_status,':addedby'=>$uname));
if($result_add){ ?>
			<script>
			alert("Successfully Added New Supllier");
			window.location.href="supplier.php";
			</script>
<?php }else{ ?>
			<script>
			alert("Something Wents Wrong Supplier Not Added Please Try Again");
			window.location.href="supplier.php";
			</script>
<?php }
}
?>