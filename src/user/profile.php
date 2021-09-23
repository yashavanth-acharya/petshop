<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile</title>
    <link rel="stylesheet" href="/petshop_project/static/signup/css/bootstrap.min.css">
    <link rel="stylesheet" href="/petshop_project/static/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/petshop_project/static/signup/css/Registration-Form-with-Photo.css">
    <style>
        span{
            font-size:0.8em;
        }
    </style>
</head>

<body>
<?php
include("../db/dbconnection.php");
include("../auth/userauth.php");
include("../navbar/navbar.php");

?>
<?php

function checkempty($tag) {
    if($tag==""){
        return false;
    }
    else{
        return true;
    }
}

function validate($type,$tag) {

    if($type=="phone"){
        if(!preg_match("/^[0-9]{10}+$/",$tag)){
            return false;
        }else{
            return true;
        }
    }

    if($type=="email"){
        if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$tag)){
            return false;
        }else{
            return true;
        }
    }
    if($type=="pincode"){
        if(!preg_match("/^[1-9][0-9]{5}$/",$tag)){
            return false;
        }else{
            return true;
        }
    }
}

$sql1="SELECT * FROM `user` WHERE `userid`='".$_SESSION['userid']."'";
$users=mysqli_query($conn,$sql1);
$userinfo=mysqli_fetch_assoc($users);


$username_error="";
$name_error="";
$phone_error="";
$address_error=""; 
$city_error="";
$pincode_error="";
$email_error="";
$password_error="";
$cpassword_error="";




$username=$userinfo['username'];
$phone=$userinfo['mobile'];
$address=$userinfo['address'];
$city=$userinfo['city'];
$pincode=$userinfo['pincode'];
$email=$userinfo['email'];

$alert="";
if(isset($_POST['btn'])){
    $username_error="";
    $name_error="";
    $phone_error="";
    $address_error=""; 
    $city_error="";
    $pincode_error="";
    $email_error="";
    

    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $address=$_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   

$username_error1=checkempty($username);
if(!$username_error1){
    $username_error='<span  class="text-danger">Required *</span>';
}
$phone_error1=checkempty($phone,$phone_error);
if(!$phone_error1){
    $phone_error='<span  class="text-danger">Required *</span>';
}
$address_error1=checkempty($address);
if(!$address_error1){
    $address_error='<span  class="text-danger">Required *</span>';
}
$city_error1=checkempty($city);
if(!$city_error1){
    $city_error='<span  class="text-danger">Required *</span>';
}
$pincode_error1=checkempty($pincode);
if(!$pincode_error1){
    $pincode_error='<span  class="text-danger">Required *</span>';
}
$email_error1=checkempty($email);
if(!$email_error1){
    $email_error='<span  class="text-danger">Required *</span>';
}



if($phone_error1){
    $phone_error1=validate("phone",$phone);
    if(!$phone_error1){
        $phone_error='<span  class="text-danger">Invalid phone number</span>';
    }
}
if($pincode_error1){
    $pincode_error1=validate("pincode",$pincode);
    if(!$pincode_error1){
        $pincode_error='<span  class="text-danger">Invalid pincode</span>';
    }
}
if($email_error1){
    $email_error1=validate("email",$email);
    if(!$email_error1){
        $email_error='<span  class="text-danger">Invalid Email id</span>';
    }
}


if($username_error1 && $phone_error1 && $address_error1 && $city_error1 && $pincode_error1)
{
    $sql="UPDATE `user` SET `username`='".$username."',`name`='".$username."',`mobile`='".$phone."',`address`='".$address."',
    `city`='".$city."',`pincode`='".$pincode."',`email`='".$email."',`updated_at`='".date('Y-m-d H:i:s')."' WHERE `userid` ='".$_SESSION['userid']."'";
    $confirm=mysqli_query($conn,$sql);
   
    if($confirm){
        $alert='<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Done!</strong> User Updated successfully....
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else{
        $alert=mysqli_error($conn);
    }
}

}



?>
<section class="register-photo">
    <div class="form-container" style="width: 473px;">
        <form method="post" style="box-shadow: 0px 0px 8px;">
            <h2 class="text-center"><strong>Profile</strong></h2>
            <?php echo  $alert; ?>
            <div class="mb-3"><input class="form-control" type="text" name="username" placeholder="Username" required value="<?php echo $username; ?>">
            <?php echo $username_error;  ?>
        </div>
            <div class="mb-3"><input class="form-control" type="text" name="phone" placeholder="Phone number" required value="<?php echo $phone; ?>">
            <?php echo $phone_error;  ?>
        </div>
            <div class="mb-3"><input class="form-control" type="text" name="address" placeholder="Address" required value="<?php echo $address; ?>">
            <?php echo $address_error;  ?>
        </div>
            <div class="mb-3"><input class="form-control" type="text" name="city" placeholder="City" required value="<?php echo $city; ?>">
            <?php echo $city_error;  ?>
        </div>
            <div class="mb-3"><input class="form-control" type="text" name="pincode" placeholder="Pincode" required value="<?php echo $pincode; ?>">
            <?php echo $pincode_error;  ?>
        </div>
            <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email" required value="<?php echo $email; ?>">
            <?php echo $email_error;  ?>
        

            <div class="mb-3"></div>
            <div class="mb-3"><button class="btn btn-primary d-block w-100" name="btn" type="submit">Update</button></div>
        </form>
    </div>
</section>
<br>
<br>
<br>
<br>
<br>



<?php
include("../navbar/footer.php");
?>
<script>
function myFunction() {
  var x = document.getElementById("password");
  var cfpassword = document.getElementById("cfpassword");
  if (x.type === "password") {
    x.type = "text";
    cfpassword.type="text"

  } else {
    x.type = "password";
    cfpassword.type="password"
  }
} 

</script>
    <script src="/petshop_project/static/signup/js/bootstrap.min.js"></script>

</body>

</html>