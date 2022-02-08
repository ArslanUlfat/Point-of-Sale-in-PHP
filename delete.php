<?php
include 'config.php';
if(isset($_REQUEST['delete'])){
    $sql="DELETE FROM productcategory WHERE id= :id";
    $result=$conn->prepare($sql);
    $id=$_REQUEST['id_table'];
    $result->execute(array(':id'=>$id));
}
?>