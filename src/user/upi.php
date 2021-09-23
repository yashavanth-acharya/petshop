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
			<div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
				<form action="" method="post" class="text-center form-group" >
					
						<h2>UPI PAYMENT-</h2>
				<p>
       		<label>Name:
       		<input id="name" name="name" type="text" required placeholder="Enter Name" pattern="[A-Za-z\s]+" title="only letter"></label>
       	</p>

					<p>
       		<label>Email:
       		<input id="email" name="email" type="text" required placeholder="Enter Mail id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"></label>
       	</p>

 					<p>
    			<label>UPI ID
    			<input id="upi" name="upi" type="text" required placeholder="Enter upi"></label>
    		</p>
					

       
         <p>
        <label>
       <input type="submit" name="submit"></label></p>

       
					
	


				</form> 

			</div>
	
	
		</div>
				<!-- 	booking info-->
				
			<!-- confirming booking -->
					<?php

						include('dbconnection.php');
						if(isset($_POST['submit'])){
							

						$sql = " INSERT INTO upi (uname,email,upi)
							VALUES ('" . $_POST["name"] . "','" . $_POST["email"] . "','" . $_POST["upi"] . "')";

							if ($conn->query($sql) === TRUE) {
							    echo "<script>alert('Your booking has been accepted!');</script>";
							    echo "<script>window.location ='orderdetails.php';</script>";
							} else {
							    echo "<script>alert('There was an Error')<script>";
							}

							$conn->close();
						}
					?> 

				<!-- confirming booking -->
</div>
</section>

<?php
include("../navbar/footer.php");
?>
<script src="/petshop_project/static/login/js/bootstrap.min.js"></script>
</body>
</html>