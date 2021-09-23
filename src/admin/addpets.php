<?php
include("../auth/adminauth.php");
include("../db/dbconnection.php"); 

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

    $sql="INSERT INTO `pets`( `id`, `categorie`, `pet_categorie`, `price`, `details`, `image`) VALUES 
                            ('".uniqid()."','".$categories."','".$petname."','".$price."','".$description."','".$image."')";
  
    if(mysqli_query($conn,$sql)){
        $obj->msg="Pet Added successfully";
        $obj->error=0;

        echo json_encode($obj);
    }else{
       
        $obj->msg="Server error";
        $obj->error=1;
        echo json_encode($obj);
    }
}
?>