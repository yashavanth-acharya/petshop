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
       
    </style>
</head>

<body>
<?php
include("../auth/userauth.php");
include("../db/dbconnection.php");
include("../navbar/navbar.php");



?>

<section class="container-fluid  mt-5 p-5 mb-5" style="height:100vh;">
<span class="msg"></span>
<?php
$sql1="SELECT `petsid` FROM `cart` WHERE `userid`='".$_SESSION["userid"]."'";
$results1=mysqli_query($conn,$sql1);
while($id=mysqli_fetch_assoc($results1)){
    $sql="SELECT  `id`, `categorie`, `pet_categorie`, `price`, `details`, `image` FROM `pets` WHERE `id`='".$id['petsid']."'";
    $results=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($results)){
?>
<div class="card " >
    <div class="card-body">
        <div class="row">
            <div class="col col-12 col-sm-12 col-xs-4 col-md-4">
                <img src="<?php echo $row['image']; ?>" alt="" class="img-fluid" style="height: 50vh">
            </div>
            <div class="col col-12 p-4 col-sm-12 col-xs-4 col-md-4">
                <h3><?php echo $row['pet_categorie']; ?></h3>
                <span><b>Categorie:</b> <?php echo $row['categorie']; ?></span><br>
                <span><b>Price:</b> <?php echo $row['price']; ?></span><br>
                <span><b>Details:</b> <br><?php echo $row['details']; ?></span><br>
                <a href="#" id="btn" onclick="remove('<?php echo $row['id']; ?>')" class="btn btn-success">Remove</a>
                <a href="#" id="btn" onclick="Buy('<?php echo $row['id']; ?>')" class="btn btn-success">Buy</a>
            </div>

        </div>
        
    </div>
</div>
</div>   
 
<?php
}
}
?>   
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="/petshop_project/static/login/js/bootstrap.min.js"></script>
  <script src="/petshop_project/static/petlist/js/buy.js"></script>
  <script src="/petshop_project/static/petlist/js/removecart.js"></script>


<script>


f
</script>
    

</body>

</html>



