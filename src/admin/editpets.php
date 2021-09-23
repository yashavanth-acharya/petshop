<?php
include("../auth/adminauth.php");
include("../db/dbconnection.php"); 
$id=$_POST['id'];
$image=$_POST['images'];
$categories=$_POST['categories'];
$petname=$_POST['petname'];
$price=$_POST['price'];
$description=$_POST['description'];

$obj=new stdClass();
if($categories=="" || $image=="" || $petname=="" || $price=="" || $description==""){

    $obj->msg="All feildes are required";
    $obj->error=1;
    echo json_encode($obj);
}
else{

 
    $sql="UPDATE `pets` SET `categorie`='".$categories."',`pet_categorie`='".$petname."',`price`='".$price."',
    `details`='".$description."',`image`='".$image."',`updated_at`='".date('Y-m-d H:i:s')."' WHERE `id`='".$id."'";
    if(mysqli_query($conn,$sql)){
        $obj->msg="Pet Updated successfully";
        $obj->error=0;

        echo json_encode($obj);
    }else{
       
        $obj->msg="Server error";
        $obj->error=1;
        echo json_encode($obj);
    }
}
?>