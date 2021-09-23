<?php
include("../db/dbconnection.php");
include("../auth/userauth.php");
$id=$_POST['id'];
$obj=new stdClass();

$sql1="SELECT  * FROM `cart` WHERE `petsid`='".$id."' AND `userid`='".$_SESSION['userid']."'";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
if(strlen($row1['id'])!=0){
    $obj->msg="Pet details Allready exists in your Cart";
    $obj->error=0;
    echo json_encode($obj);
}
else{
    
    $sql="INSERT INTO `cart`( `userid`,`id`, `petsid`) VALUES ('".$_SESSION['userid']."','".uniqid()."','".$id."')";
    $result=mysqli_query($conn,$sql);
    
    if($result){
        $obj->msg="Pet details added to  your Cart";
        $obj->error=0;
        echo json_encode($obj);
    }else{
        // echo mysqli_error($conn);
        $obj->msg="Error";
        $obj->error=1;
        echo json_encode($obj);
    }
    
}




?>