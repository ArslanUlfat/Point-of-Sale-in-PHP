<?php
include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
  header('location:http://localhost/BIT/login.html');
  $uname=$_SESSION['username'];
}
else{
$uname=$_SESSION['username'];
}
    if(isset($_REQUEST['Add_cat'])){
$var_cat=$_REQUEST['category_name'];
$var_status=$_REQUEST['category_status'];
$sql_add="INSERT INTO productcategory (category, status, createdby) VALUES (:category,:status,:createdby)";
$result_add=$conn->prepare($sql_add);
$result_add->execute(array(':category'=>$var_cat,':status'=>$var_status,':createdby'=>$uname));
  //header('location:http://localhost/BIT/ab.php');
  if($result_add){
  ?>
			<script>
			alert("Successfully Add Category");
			window.location.href="categories.php";
			</script>
<?php
  }
  else{?>
			<script>
			alert(" :( Some Thing Went Wrong Category Not Added");
			window.location.href="categories.php";
			</script>
  <?php
  }
}
?>