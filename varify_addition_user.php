<?php
session_start();
include 'config.php';
if(!isset($_SESSION['username'])){
  header('location:http://localhost/BIT/login.html');
  $uname=$_SESSION['username'];
}
try{
    if(isset($_REQUEST['add_user'])){
    
        $firstname=$_REQUEST['firstname'];
        $lastname=$_REQUEST['lastname'];
        $email=$_REQUEST['email'];
        $cell=$_REQUEST['contact_no'];
        $password=$_REQUEST['password'];
        $gender=$_REQUEST['gender'];
        $status=$_REQUEST['status'];
        
        $sql_check="SELECT firstname,email FROM users WHERE firstname:firstname or email=:email";
        $result_check=$conn->prepare($sql_check);
        $result_check->execute(array('firstname'=>$firstname,'email'=>$email));
        $row_check=$result_check->fetch(PDO::FETCH_ASSOC);
        if($row_check<=0){
       
        $sql="INSERT INTO users (firstname, lastname, email, cell, password, gender, status) VALUES (:firstname, :lastname, :email, :cell, :password, :gender, :status)";
        $result=$conn->prepare($sql);
        $result->execute(array(':firstname'=>$firstname, ':lastname'=>$lastname, ':email'=>$email, ':cell'=>$cell, ':password'=>$password, ':gender'=>$gender, ':status'=>$status));
        
        if($result){ ?>
             <script>
			alert("Successfully Add User");
			window.location.href="addUser.php";
			</script>
<?php        } else{   ?>
             <script>
             alert("Something wents wrong");
             window.location.href="addUser.php";
             </script>
 <?php       } 
    
    }else{ ?>
            <script>
             alert("UserName or Email Already Exist");
             window.location.href="addUser.php";
             </script>

<?php    }
}
    
}catch(PDOException $e){
    echo "Unexpected Error Occure";
}
header('location:http://localhost/BIT/addUser.php');

?>