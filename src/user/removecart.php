<?php
include("../db/dbconnection.php");
include("../auth/userauth.php");
$id=$_POST['id'];

$obj=new stdClass();
$sql="DELETE FROM `cart` WHERE `userid`='".$_SESSION['userid']."' AND `petsid`='".$id."'";
$result=mysqli_query($conn,$sql);

if($result){
    $obj->msg="Removed";
    $obj->error=0;

    echo json_encode($obj);
}else{
    // echo mysqli_error($conn);
    $obj->msg="Error";
    $obj->error=1;
    echo json_encode($obj);
}



?>