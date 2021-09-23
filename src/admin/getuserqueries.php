<?php
include("../auth/adminauth.php");
include("../db/dbconnection.php"); 

$sql="SELECT * FROM `contactus`";
$result=mysqli_query($conn,$sql);

$data=array();
$count=1;
while ($row=mysqli_fetch_assoc($result)){
    array_push($data,array(
    $count,
    $row['name'],
    $row['email'],
    $row['phone'],
    $row['message'],
    $row['created_at']));
$count++;
}
$obj=new stdClass();
$obj->data=$data;
echo json_encode($obj);
?>