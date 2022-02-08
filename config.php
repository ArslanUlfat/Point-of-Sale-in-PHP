<?php
$dsn="mysql:host=localhost; dbname=IMS";
$db_user="root";
$db_pass="";
try{
    $conn=new PDO($dsn,$db_user,$db_pass);
   // echo "Connected<br>";
}
catch(PDOException $e){
      echo "Connection failed";
}
if(isset($_REQUEST['delete'])){
    $sql="DELETE FROM users WHERE id= :id";
    $result=$conn->prepare($sql);
    $id=$_REQUEST['id'];
    $result->execute(array(':id'=>$id));
}
?>