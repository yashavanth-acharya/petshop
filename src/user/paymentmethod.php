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
include("../auth/userauth.php");
include("../db/dbconnection.php");
include("../navbar/navbar.php");


?>

<section class="register-photo mt-5" style="padding: 105px 36px;">
        <div class="container" style="height:61vh">
		<!-- <h3 class="text-center" style="background-color:#272327;color: #fff;">payment method</h3> -->
			<div class="formstyle" style="">
				<div  class="text-left form-group" >
						<h2>CHOOSE PAYMENT METHOD</h2>
						<h3><a href = "upi.php">UPI</a></h3>
						<h3><a href = "card.php">CARD</a></h3>
	</div> 

			</div>
		</div>
</div>
</section>

<?php
include("../navbar/footer.php");
?>
<script src="/petshop_project/static/login/js/bootstrap.min.js"></script>
</body>
</html>