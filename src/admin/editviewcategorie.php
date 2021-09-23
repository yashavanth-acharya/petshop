<?php
include("../auth/adminauth.php");
include("../db/dbconnection.php"); 

$id=$_POST['id'];
if($id){
    $sql="SELECT `categories` FROM `categorie` WHERE `id`='".$id."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    if($row){

        $obj=new stdClass();
        $obj->data=$row['categories'];
        $obj->error=0;
        echo json_encode($obj);
        exit;
    }else{
        $obj->data="Invalid id";
        $obj->error=1;
        echo json_encode($obj); 
        exit;
    }
}
?>