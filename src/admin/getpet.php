<?php
include("../auth/adminauth.php");
include("../db/dbconnection.php"); 

$sql="SELECT * FROM `pets`";
$result=mysqli_query($conn,$sql);

$data=array();
$count=1;
while ($row=mysqli_fetch_assoc($result)){
    array_push($data,array(
    $count,
    $row['categorie'],
    $row['pet_categorie'],
    $row['price'],
    $row['details'],
    "<img src='".$row['image']."' width='50' height='50'/>",
    $row['created_at'],
    $row['updated_at'],
    "<button class='btn btn-primary' onclick='Edit(\"".$row['id']."\")'>Edit</buton>
    <button class='btn btn-danger' onclick='Delete(\"".$row['id']."\")' >Delete</buton>"
));
$count++;
}
$obj=new stdClass();
$obj->data=$data;
echo json_encode($obj);
exit;
?>