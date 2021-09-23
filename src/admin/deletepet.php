<?php
include("../auth/adminauth.php");
include("../db/dbconnection.php"); 

$id=$_POST['id'];
if($id){
    $sql="DELETE FROM `pets` WHERE `id`='".$id."'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $obj=new stdClass();
        $obj->msg="Pet Deleted Successfully";
        $obj->error=0;
        echo json_encode($obj);
        exit;
    }else{
        $obj->msg="Invalid id";
        $obj->error=1;
        echo json_encode($obj); 
    }
}
?>