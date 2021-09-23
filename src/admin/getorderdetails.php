<?php
include("../auth/adminauth.php");
include("../db/dbconnection.php"); 

$sql="SELECT * FROM `order_details`";
$result=mysqli_query($conn,$sql);

$data=array();
$count=1;
while ($row=mysqli_fetch_assoc($result)){
    $sql1="SELECT `pet_categorie` FROM `pets` WHERE `id`='".$row['pet_categorie_id']."'";
    $result1=mysqli_query($conn,$sql1);
    $row2=mysqli_fetch_array($result1);
    // print_r($row2[0]);
    if($row2){
        $petname=$row2[0];
    }else{
        $petname="-";
    }
    if($row['status']==1){
        $status='<p class="text-warning">Pending</p>';
        $button="<button class='btn btn-primary' onclick='Update(\"".$row['orderid']."\")'>Update</button>";
    }
    else if($row['status']== 2){
        $status='<p class="text-success">Delivered</p>';
        $button="-";
    }
    else{
        $status='<p class="text-danger">Cancelled</p>';
        $button="-";
    }
    if($row['payment_status']==0)
     {
        $payment="<a class='btn btn-success'  href='payment.php?id=".$row['orderid']." '>payment</a>";
     }
     else{
        $payment="PAID";
     }
    array_push($data,array(
    $count,
    $row['orderid'],
    $petname,
    $row['delivery_date'],
    $status,
    $row['ordered_date'],
    $button,
    $payment
    ));
$count++;
}
$obj=new stdClass();
$obj->data=$data;
echo json_encode($obj);
exit;
?>