<?php
include("../auth/adminauth.php");
include("../db/dbconnection.php"); 

$sql="SELECT * FROM `user` WHERE role='user'";
$result=mysqli_query($conn,$sql);

$data=array();
$count=1;
while ($row=mysqli_fetch_assoc($result)){
    array_push($data,array(
    $count,
    $row['username'],
    $row['mobile'],
    $row['address'],
    $row['city'],
    $row['pincode'],
    $row['email'],
    $row['created_at'],
    $row['updated_at']));
$count++;
}
$obj=new stdClass();
$obj->data=$data;
echo json_encode($obj);
exit;
?>