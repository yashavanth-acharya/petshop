<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pet details</title>
    <link rel="stylesheet" href="/petshop_project/static/dashboard/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="/petshop_project/static/dashboard/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/petshop_project/static/dashboard/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/petshop_project/static/dashboard/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
</head>

<body id="page-top">
<?php 
include("dashboard.php"); 
include("../db/dbconnection.php"); 


?>
 <div class="container-fluid">
                    <h3 class="text-dark mb-4">Pets details</h3>
                    <Button class="btn btn-primary mb-5"data-bs-toggle="modal" data-bs-target="#modal" >Add pet</Button>
                    <span class="msg"></span>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Pets Info</p>
                            
                        </div>
                        
                        <div class="card-body">
                        
                           
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable1">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Categorie</th>
                                            <th>Pet categorie</th>
                                            <th>price</th>
                                            <th>Details</th>
                                            <th>Image</th>
                                            <th>Created At</th> 
                                            <th>Updated At</th>
                                            <th>Action</th>

                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Categorie</th>
                                        <th>Pet categorie</th>
                                        <th>price</th>
                                        <th>Details</th>
                                        <th>Image</th>
                                        <th>Created At</th> 
                                        <th>Updated At</th>
                                        <th>Action</th>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                          <form method="post" id="f1" enctype="multipart/form-data">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Pets</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span id="error"></span>
                        <div class="mb-3">
                        <label for="petimage" class="form-label">Pet image</label>
                        <input class="form-control" type="file" id="petimage" onchange="imageUploaded('petimage')" name="petimage">
                        <span class="text-danger" id="imgerror"></span>
                        </div>
                        
                        <label for="petimage" class="form-label">Categorie</label>
                        <select class="form-select" id="categories" aria-label="Categorie">
                        <option selected>Select Categorie</option>
                        <?php
                        $sql="SELECT `categories` FROM `categorie` ";
                        $result=mysqli_query($conn,$sql);
                        while ($row=mysqli_fetch_assoc($result)){
                            echo '<option value="'.$row["categories"].'">'.$row["categories"].'</option>';
                        }
                        ?>
                        </select>
                        <span class="text-danger" id="categorieerror"></span>

                        <div class="mb-3">
                        <label for="petname" class="form-label">Pet name</label>
                        <input type="text" class="form-control" id="petname" name="petname" >
                        <span class="text-danger" id="petnameerror"></span>

                        </div>
                        <div class="mb-3">
                        <label for="petprice" class="form-label">Price</label>
                        <input type="text" class="form-control" id="petprice" name="petprice" >
                        <span class="text-danger" id="petpriceerror"></span>
                        </div>
                        <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="description"  name="description" rows="3"></textarea>
                        <span class="text-danger" id="discriptionerror"></span>

                        </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" id="add">Add</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                          <form method="post" id="f2" enctype="multipart/form-data">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Pets</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span id="error"></span>
                        <div class="mb-3">
                        <label for="petimage" class="form-label">Pat image</label>
                        <input class="form-control" type="file" id="editpetimage" onchange="imageUploaded('editpetimage')" name="petimage">
                        <span class="text-danger" id="editimgerror"></span>
                        </div>
                        
                        <label for="petimage" class="form-label">Categorie</label>
                        <select class="form-select" id="editcategories" aria-label="Categorie">
                        <option selected>Select Categorie</option>
                        <?php
                        $sql="SELECT `categories` FROM `categorie` ";
                        $result=mysqli_query($conn,$sql);
                        while ($row=mysqli_fetch_assoc($result)){
                            echo '<option value="'.$row["categories"].'">'.$row["categories"].'</option>';
                        }
                        ?>
                        </select>
                        <span class="text-danger" id="editcategorieerror"></span>

                        <div class="mb-3">
                        <label for="petname" class="form-label">Pet name</label>
                        <input type="text" class="form-control" id="editpetname" name="editpetname" >
                        <span class="text-danger" id="editpetnameerror"></span>

                        </div>
                        <div class="mb-3">
                        <label for="petprice" class="form-label">Price</label>
                        <input type="text" class="form-control" id="editpetprice" name="editpetprice" >
                        <span class="text-danger" id="editpetpriceerror"></span>
                        </div>
                        <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="editdescription"  name="editdescription" rows="3"></textarea>
                        <span class="text-danger" id="editdiscriptionerror"></span>

                        </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" id="edit">Update</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>



<?php include("footer.php"); ?>
<script src="/petshop_project/static/dashboard/js/bootstrap.min.js"></script>
    <script src="/petshop_project/static/dashboard/js/theme.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="/petshop_project/static/dashboard/js/addpets.js"></script>
    <script  src="/petshop_project/static/dashboard/js/deletepets.js"></script>
    <script>
       function Edit(id){
        $("#editerror").html("")
        localStorage.setItem("id",id)
        $('#modal2').modal('show');
    
        
        $("#petname").val("Loading....");
        $("#petprice").val("Loading....");
        $("#description").text("Loading....");

        $.ajax({
            url:"geteditpets.php",
            method:"POST",
            data:{"id":id},
            success:function(data){
                data=JSON.parse(data);  
                if(data.error==1){
                    $("#editerror").html(data.msg)
                }
                else{
                    localStorage.setItem("petimage",data.image)
                    $("#editcategories").val(data.categorie);
                    $("#editpetname").val(data.pet_categorie);
                    $("#editpetprice").val(data.price);
                    $("#editdescription").text(data.details);
                }
            }
        })
        }
        $("#edit").click(function(){
            function showerror(tag,errortag){
    if(tag.val().length==0){
        errortag.html("Required *")
        tag.addClass("errorborder")
        return false
    }else{
        tag.removeClass("errorborder")
        return true
    }
}

function checkimage(tag,errortag){
if(tag.length==0){
    errortag.html("Required *")
    return false
}else{
    if(tag[0].size>1083743){
        errortag.html("Image size must be less than 1MB*");
        return false 
    }else{
        return true
    }
}
}

let image=$("#editpetimage");
let categories=$("#editcategories");
let petname=$("#editpetname");
let price=$("#petprice");
let description=$("#editdescription");

let imageerror=$("#editimgerror")
let categorieerror=$("#editcategorieerror")
let petnameerror=$("#editpetnameerror")
let petpriceerror=$("#editpetpriceerror")
let descriptionerror=$("#editdiscriptionerror")

imageerror.html("")
categorieerror.html("")
petnameerror.html("")
petpriceerror.html("")
descriptionerror.html("")

let error1=true,error2=true,error3=true,error4=true,error5=true;


error1=showerror(categories,categorieerror)
error2=showerror(petname,petnameerror)
error3=showerror(price,petpriceerror)
error4=showerror(description,descriptionerror)


if(image[0].files.length !=0){
error5=checkimage(image[0].files,imageerror)
if(error5){
var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];
if ($.inArray(String(image[0].files[0].name).split('.').pop().toLowerCase(), fileExtension) == -1) {
    imageerror.html("Only formats are allowed : "+fileExtension.join(', '));
    error5=false;
}
else{
    error5=true
}
}
}


if(error4){
if(description.val().length>500){
    descriptionerror.html("Details lenght should be less than 500*")
    error5=false;
}else{
    error5=true;
}
}



if( error1 && error2 && error3 && error4 && error5 ){
$.ajax({
    url:"editpets.php",
    method:"post",
    data:{
        "id":localStorage.getItem("id"),
        "images":localStorage.getItem("petimage"),
        "categories":$("#editcategories").val(),
        "petname":$("#editpetname").val(),
        "price":$("#editpetprice").val(),
        "description":$("#editdescription").val(),
        },
    success:function(data){
        console.log(data);
        data=JSON.parse(data);  
            let echo;
            if(data.error==1){
                $("#error").html(data.msg)
            }
            else{
                echo=`<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Done</strong> `+data.msg+`
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>`
                  localStorage.removeItem("petimage")
                  localStorage.removeItem("id")
                  $('#modal2').modal('hide');
                  $('#f1').trigger("reset");
                  $(".msg").html(echo);
                  table.ajax.reload();
            }
    }
})
}
        })
    </script>
    
</body>

</html>