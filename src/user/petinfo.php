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
include("../db/dbconnection.php");
include("../auth/userauth.php");
include("../navbar/navbar.php");
$sql="SELECT  `id`, `categorie`, `pet_categorie`, `price`, `details`, `image` FROM `pets` WHERE `id`='".$_GET['id']."'";
$results=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($results);
?>

<section class="projects-clean mt-5 p-5 " style="height:90vh">
<span class="msg"></span>
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
                <a href="#" id="btn" onclick="Buy('<?php echo $row['id']; ?>')" class="btn btn-success">Buy</a>
            </div>

        </div>
        
    </div>
</div>
</div>       
</section>


<?php
include("../navbar/footer.php");
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="/petshop_project/static/login/js/bootstrap.min.js"></script>
<script>
function Buy(id)
{
    $.ajax({
        url:"buy.php",
        method:"POST",
        data:{id:id},
        success:function(data){
            console.log(data);
            data=JSON.parse(data);  
            let echo;
            if(data.error==1){
                echo=`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Invalid </strong> `+data.msg+`
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>`
                $(".msg").html(echo)
            }
            else{
                echo=`<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Done</strong> `+data.msg+` click <a href="/petshop_project/src/user/orderdetails.php">here</a> check order
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>`
    
                  $(".msg").html(echo);
                 
            }
        }
    })
}
</script>
    

</body>

</html>



