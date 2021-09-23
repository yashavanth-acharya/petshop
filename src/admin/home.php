<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/petshop_project/static/dashboard/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="/petshop_project/static/dashboard/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/petshop_project/static/dashboard/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/petshop_project/static/dashboard/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top">
<?php 
include("dashboard.php"); 
include("../db/dbconnection.php"); 
$sql1="SELECT COUNT(*) FROM `user`";
$result=mysqli_query($conn,$sql1);
$usercount=mysqli_fetch_array($result);


$sql1="SELECT COUNT(*) FROM `pets`";
$result=mysqli_query($conn,$sql1);
$petscount=mysqli_fetch_array($result);

?>

<div class="container-fluid">
<div class="d-sm-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark mb-0">Dashboard</h3>
</div>
<div class="row">
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-start-primary py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col me-2">
                        <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Pets</span></div>
                        <div class="text-dark fw-bold h5 mb-0"><span><?php echo $petscount[0]; ?></span></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-book fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-start-success py-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col me-2">
                        <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Users</span></div>
                        <div class="text-dark fw-bold h5 mb-0"><span><?php echo $usercount[0]; ?></span></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-file fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include("footer.php"); ?>
<script src="/petshop_project/static/dashboard/js/bootstrap.min.js"></script>
    <script src="/petshop_project/static/dashboard/js/theme.js"></script>
</body>

</html>