<?php
include("../auth/adminauth.php");
include("../db/dbconnection.php"); 

$id=$_POST['id'];
$status=$_POST['status'];
$obj=new StdClass();
if($id){
    $sql="UPDATE `order_details` SET `delivery_date`='".date('Y-m-d H:i:s')."',`status`='".$status."' WHERE `orderid`='".$id."'";
    if(mysqli_query($conn,$sql)){
        $obj->msg="Order details Updated successfully";
        $obj->error=0;
        echo json_encode($obj);
    }else{
       
        $obj->msg="Server error";
        $obj->error=1;
        echo json_encode($obj);
    }
}
?>