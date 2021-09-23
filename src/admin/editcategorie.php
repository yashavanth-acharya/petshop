<?php
include("../auth/adminauth.php");
include("../db/dbconnection.php"); 

$categories=$_POST['categories'];
$id=$_POST['id'];

$obj=new stdClass();
if($categories=="" && $id=="" ){

    $obj->msg="Categories is required";
    $obj->error=1;
    echo json_encode($obj);
}
else{

    // $sql1="SELECT * FROM `categorie` WHERE `categories`='".strtolower($categories)."'";
    // $result=mysqli_query($conn,$sql1);
    // $row=mysqli_fetch_assoc($result);
    // if($id==$row['id']){

    //     $obj->msg="Categories is already exists";
    //     $obj->error=1;
    //     echo json_encode($obj);
    //     exit;
    // }

    $sql="UPDATE `categorie` SET `categories`='".$categories."',`updated_at`='".date('Y-m-d H:i:s')."' WHERE `id`='".$id."'";
    if(mysqli_query($conn,$sql)){
        $obj->msg="Categories Updated successfully";
        $obj->error=0;

        echo json_encode($obj);
    }else{
       
        $obj->msg="Server error";
        $obj->error=1;
        echo json_encode($obj);
    }
}
?>