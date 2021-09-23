<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pets</title>
    <link rel="stylesheet" href="/petshop_project/static/petlist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/petshop_project/static/petlist/css/Projects-Clean.css">
    <link rel="stylesheet" href="/petshop_project/static/home/css/bootstrap.min.css">
    <style>
        span{
            font-size:0.8em;
        }
    </style>
</head>

<body>
<?php
include("../db/dbconnection.php");
session_start();
include("../navbar/navbar.php");

?>
<!-- <div class="container" style="height:90vh"> -->
<section class="projects-clean mt-5" >
        <div class="container">
            
            <div class="intro">
                <p class="text-center"></p>
            </div>
            <h2 class="text-start">Pets</h2>
            <span class="msg"></span>
            <div class="row projects">
            <?php
            $sql1="SELECT `categories` FROM `categorie` WHERE `id`='".$_GET['id']."'";
            $result = mysqli_query($conn,$sql1);
            $row=mysqli_fetch_assoc($result);

            $sql="SELECT `id`, `pet_categorie`, `price`, `details`, `image` FROM `pets` WHERE `categorie`='".$row['categories']."'";
            $result = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
            ?>
                <div class="col-sm-6 col-lg-4 " >

                <div class="card" >
                <img src="<?php echo $row['image']; ?>" class="card-img-top"  style="height:30vh !important">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['pet_categorie']; ?></h5>
                    <p class="card-text"> <?php echo $row['details']; ?></p>
                    <b>Price:</b><?php echo $row['price']; ?><br><br>
                    <a href="#" class="btn btn-primary" onclick="addtocart('<?php echo $row['id']; ?>')" style="font-size:1em">	&#x2764;</a>
                    <a href="petinfo.php?id=<?php echo  $row['id']; ?>" class="btn btn-primary">View</a>
                </div>
                </div>

                    
                </div>
            <?php
            }
            ?>
                

                

                
            </div>
        </div>
    </section>
    <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include("../navbar/footer.php");
?>


    <script src="/petshop_project/static/signup/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/petshop_project/static/petlist/js/addcart.js"></script>
</body>

</html>