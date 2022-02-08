<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$conn=mysqli_connect('localhost','root');
mysqli_select_db($conn,'IMS');
$sql_admin="SELECT * FROM admins WHERE firstname='$username' && password='$password'";
$sql_user="SELECT * FROM users WHERE firstname='$username' && password='$password'";
$result_admin=mysqli_query($conn,$sql_admin);
$result_user=mysqli_query($conn,$sql_user);
$row_admin=mysqli_fetch_assoc($result_admin);
$row_user=mysqli_fetch_assoc($result_user);
$num_admin=mysqli_num_rows($result_admin);
$num_user=mysqli_num_rows($result_user);
if($num_admin||$num_user==1){
    if(($row_admin['status']==1)||($row_user['status']==1)){
        $_SESSION['username']=$username;
      //header('location:http://localhost/BIT/index.php');
	  ?>
        
           <script>
			
			window.location.href="index.php";
			
			</script>
	<?php   
    }
    else{?>
			<script>
			alert("It Seems You Are Deactivated By Admin");
			window.location.href="login.html";
			</script>
<?php        
		}
}
else{?>
<script>
alert(" :( OOPs ID  Mismatch!");
window.location.href="login.html";
</script>
<?php			
}
?>
<script>
    function show_alert(){
        alert("deactive user");
    }

</script>

