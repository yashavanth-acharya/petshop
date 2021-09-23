<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <title>Login</title>
    <link rel="stylesheet" href="/petshop_project/static/login/css/bootstrap.min.css">
    <link rel="stylesheet" href="/petshop_project/static/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/petshop_project//static/login/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/petshop_project/static/login/css/Registration-Form-with-Photo.css">
    <style>
        span{
            font-size:0.8em;
        }
        </style>

</head>
<body>
<?php
include("../db/dbconnection.php");
include("../navbar/navbar.php");

?>

<section class="register-photo mt-5" style="padding: 105px 36px;">
<?php
$username="";
$password="";
$usernameecho="";
$passwordecho="";

$alert="";
if(isset($_POST['btn'])){
    $usernameecho="";
    $passwordecho="";
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username==""){
        $usernameecho='<span  class="text-danger">Required *</span>';
    }
    if ($password==""){
        $passwordecho='<span  class="text-danger">Required *</span>';
    }
   
    if ($username && $password){
    
        $sql='SELECT `userid`,`role` FROM `user` WHERE `username`="'.$username.'" AND `password` ="'.md5($password).'"';
        $check=mysqli_query($conn,$sql);
        $check=mysqli_fetch_assoc($check);
        if($check)
        {   session_start();
            $_SESSION['userid']=$check['userid'];
            $_SESSION['role']=$check['role'];
            if($check['role']=="admin"){
                echo "<script>window.location.href='/petshop_project/src/admin/home.php'</script>";
            }else{
                echo "<script>window.location.href='/petshop_project/'</script>";
            }
           
        }else{
            $alert='<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Invalid!</strong> Invalid username/password
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }

       
    }

}
?>

        <div class="form-container" style="width: 464px;">
            <form method="post" style="width:20vh;box-shadow: 0px 0px 4px;"><i class="fas fa-lock d-xxl-flex justify-content-xxl-center" style="font-size: 70px;color: rgb(62,63,64);"></i>
                <h2 class="text-center" style="margin-top: 10px;"><strong>Login</strong></h2>
                    <div class="mb-3">
                        <?php echo  $alert; ?>
                    <input class="form-control" type="text" name="username" placeholder="Username" value="<?php echo $username ?>" required>
                    <?php echo $usernameecho; ?>
                    </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo $password ?>" required>
                    <?php echo $passwordecho; ?>
                </div>
                <div class="mb-3"></div>
                <div class="mb-3">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">Remember Me</label></div>
                </div>
                <div class="mb-3"><button class="btn btn-info d-block w-100" type="submit" name="btn" id="btn" style="border-width: 0px;border-radius: 0px;">Login</button></div><a class="text-start already" href="#">Do you have an account? Signup here.</a>
            </form>
        </div>
</section>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include("../navbar/footer.php");
?>
<script src="/petshop_project/static/login/js/bootstrap.min.js"></script>
</body>
</html>