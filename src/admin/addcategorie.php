<?php
include("../auth/adminauth.php");
include("../db/dbconnection.php"); 

$categories=$_POST['categories'];
$obj=new stdClass();
if($categories==""){

    $obj->msg="categories is required";
    $obj->error=1;
    echo json_encode($obj);
}
else{

    $sql1="SELECT * FROM `categorie` WHERE `categories`='".strtolower($categories)."'";
    $result=mysqli_query($conn,$sql1);
    $row=mysqli_fetch_assoc($result);
    if($row['categories']){
        $obj->msg="Categories is already exists";
        $obj->error=1;
        echo json_encode($obj);
        exit;
    }

    $sql="INSERT INTO `categorie`(`id`,`categories`) VALUES ('".uniqid()."','".strtolower($categories)."')";
    if(mysqli_query($conn,$sql)){
        $obj->msg="Categories Added successfully";
        $obj->error=0;

        echo json_encode($obj);
    }else{
       
        $obj->msg="Server error";
        $obj->error=1;
        echo json_encode($obj);
    }
}
?>