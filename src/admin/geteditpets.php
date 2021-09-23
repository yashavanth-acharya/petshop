<?php
include("../auth/adminauth.php");
include("../db/dbconnection.php"); 

$id=$_POST['id'];
if($id){
    $sql="SELECT * FROM `pets` WHERE `id`='".$id."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    if($row){

        $obj=new stdClass();
        $obj->categorie=$row['categorie'];
        $obj->pet_categorie=$row['pet_categorie'];
        $obj->price=$row['price'];
        $obj->details=$row['details'];
        $obj->image=$row['image'];
        $obj->error=0;
        echo json_encode($obj);
        exit;
    }else{
        $obj->data="Invalid id";
        $obj->error=1;
        echo json_encode($obj); 
        exit;
    }
}
?>