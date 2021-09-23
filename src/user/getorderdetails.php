<?php
include("../db/dbconnection.php");
include("../auth/userauth.php");

$user=$_SESSION['userid'];

$count=1;
$data=array();
$obj=new stdClass();
$sql="SELECT  `orderid`, `pet_categorie_id`, `delivery_date`, `price`, `status`, `ordered_date`,`payment_status` FROM `order_details` WHERE `userid`='".$user."'";
$result1=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result1)){
    $sql1="SELECT `pet_categorie` FROM `pets` WHERE `id`='".$row['pet_categorie_id']."'";
    $result2=mysqli_query($conn,$sql1);
    $rows=mysqli_fetch_assoc($result2);

    if($row['status']==1){
        $status='<p class="text-warning">Pending</p>';
        $button="<button class='btn btn-danger'  onclick='Cancel(\"".$row['orderid']."\")'>Cancel</button>";

    }
    else if($row['status']== 2){
        $status='<p class="text-success">Delivered</p>';
        $button="<button class='btn btn-success'  onclick='Feedback(\"".$row['pet_categorie_id']."\")'>Feedback</button>";
    }
    else{
        $status='<p class="text-danger">Cancelled</p>';
        $button="-";
    }
     if($row['payment_status']==0)
     {
        $payment="<a class='btn btn-success'   href='paymentmethod.php?id=".$row['orderid']." '>payment</a>";
     }
     else{$payment_status='<p class="text-warning">Pending</p>';
       // $payment="PAID";
     }
    array_push($data,array(
        $count,
        "<a href='/petshop_project/src/user/petinfo.php?id=".$row['pet_categorie_id']."'>".$rows['pet_categorie']."</a>",
        $row['delivery_date'],
        $row['price'],
        $row['ordered_date'],
        $status,
        $button,
        $payment


    ));
    $count++;

}

if($result1){
    $obj->data=$data;
    echo json_encode($obj);
}



?>