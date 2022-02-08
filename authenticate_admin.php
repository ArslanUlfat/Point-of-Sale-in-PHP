<?php
session_start();
$password=$_POST['password'];
$conn=mysqli_connect('localhost','root');
mysqli_select_db($conn,'IMS');
$sql="SELECT * FROM admins WHERE password='$password'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$num=mysqli_num_rows($result);
if($num==1){
    $_SESSION['password']=$password;
    header('location:http://localhost/BIT/addUser.php');
}
else{
    header('location:http://localhost/BIT/adminLock.html');
}
?>