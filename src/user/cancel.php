<?php
include("../db/dbconnection.php");
include("../auth/userauth.php");
$id=$_POST['id'];
$user=$_SESSION['userid'];
$obj=new stdClass();
$sql="UPDATE `order_details` SET `status`=3 WHERE `userid`='".$user."' AND `orderid`='".$id."'";
$result=mysqli_query($conn,$sql);

if($result){
    $obj->msg="Order cancelled";
    $obj->error=0;

    echo json_encode($obj);
}else{
    // echo mysqli_error($conn);
    $obj->msg="Error";
    $obj->error=1;
    echo json_encode($obj);
}



?>