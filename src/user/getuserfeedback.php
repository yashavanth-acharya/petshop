<?php
include("../db/dbconnection.php");
include("../auth/userauth.php");

$user=$_SESSION['userid'];
$id=$_POST['id'];
$msg=$_POST['msg'];

$obj=new stdClass();
if($msg=="" || $id=="" ){

    $obj->msg="All feildes are required";
    $obj->error=1;
    echo json_encode($obj);
}
else{

    $sql="INSERT INTO `feedback`(`username`, `pet`, `message`) VALUES ('".$user."','".$id."','".$msg."')";
  
    if(mysqli_query($conn,$sql)){
        $obj->msg="Thank you for your feedback";
        $obj->error=0;

        echo json_encode($obj);
    }else{
       
        $obj->msg="Server error";
        $obj->error=1;
        echo json_encode($obj);
    }
}
?>