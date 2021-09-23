<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark navbar-custom">
<div class="container"><a class="navbar-brand" href="/petshop_project/">Pet shop</a>
<button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarResponsive"><span class="visually-hidden">Toggle navigation</span>
<span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ms-auto">
<li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >About Us</a></li>
<li class="nav-item">
<div class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Petlist&nbsp;</a>
    <div class="dropdown-menu">
        <?php  
        $sql="SELECT * FROM `categorie`";
        $result=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($result)){
            echo '<a class="dropdown-item" href="/petshop_project/src/user/pets.php?id='.$row['id'].'">'.$row["categories"].'</a>';
        }
        ?>
    
</div>
</li>
<?php 

if(!isset($_SESSION["userid"]))
{
?>
<li class="nav-item"><a class="nav-link" href="/petshop_project/src/user/signup.php">Sign Up</a></li>
<li class="nav-item"><a class="nav-link" href="/petshop_project/src/user/login.php">Log In</a></li>
<?php
}else{
?>

<li class="nav-item"><a class="nav-link" href="/petshop_project/src/user/cart.php">Cart</a></li>
<li class="nav-item"><a class="nav-link" href="/petshop_project/src/user/orderdetails.php">Order Details</a></li>
<li class="nav-item"><a class="nav-link" href="/petshop_project/src/user/profile.php">Profile</a></li>
<li class="nav-item"><a class="nav-link" href="/petshop_project/src/user/logout.php">Logout</a></li>

<?php
}
error_reporting(E_ALL & E_STRICT);
ini_set('display_errors', '1');
ini_set('log_errors', '0');
ini_set('error_log', './');

?>
</ul>
</div>
</div>
</nav>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">About Us</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h3><b>PET PARADISE</b></h3>
      <p>Established in 2021, At 'Pet Paradise',We sell pets,trust pets and we cherish pets improve us as individual.</p>
      <h4>What is pet paradise?</h4>
      <p>Online pet store platform where user can:</p>
      <li>List Pets</li>
      <li>Search and view the listed Pets</li>
      <li>Buy the pets</li>
      <br>
      <h4>Reason to choose</h4>
      <li>Solve a realistic problem</li>
      <li>Lack of such platform in our Country</li><br>
      <h4>Technologies Used</h4>
      <li>Bootstrap & CSS for UI of Application</li>
      <li>Xampp for Runtime environment</li>
      <li>Mysql for Database</li>
      
      

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>