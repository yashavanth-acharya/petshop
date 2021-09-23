<?php
include("../db/dbconnection.php");
include("../auth/userauth.php");


$id=$_POST['id'];
$sql1="SELECT  `price` FROM `pets` WHERE `id`='".$id."'";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result);
$price=$row['price'];

$obj=new stdClass();
$sql="INSERT INTO `order_details`(`userid`,`orderid`, `pet_categorie_id`, `delivery_date`,`price`,`status`) VALUES 
('".$_SESSION['userid']."','".uniqid()."','".$id."','".date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'). ' +7 day'))."','".$price."',1)";
$result=mysqli_query($conn,$sql);

if($result){
    $obj->msg="Thank you for Shopping";
    $obj->error=0;

    echo json_encode($obj);
}else{
    // echo mysqli_error($conn);
    $obj->msg="Error";
    $obj->error=1;
    echo json_encode($obj);
}



?>