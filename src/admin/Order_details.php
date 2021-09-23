<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Order details</title>
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
                    <h3 class="text-dark mb-4">Order details</h3>
                   
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Order Info</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable1">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Orderid</th>
                                            <th>Pet</th>
                                            <th>Delivered date</th>
                                            <th>Status</th>
                
                                            <th>Ordered date</th>
                                            <th>Action</th>
                                            <th>Payment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>payment</td>
</tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Orderid</th>
                                        <th>Pet</th>
                                        <th>Delivered date</th>
                                        <th>Status</th>
                                        
                                        <th>Ordered date</th>
                                        <th>Action</th>
                                        <th>Payment</th>
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
                          <form method="post" id="f1">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Select Order details Status</label>
                                <select class="form-select" id="option" name="option" aria-label="">
                                <option selected>Select</option>
                                <option value="2">Delivered</option>
                                <option value="3">Cancelled</option>
                                </select>
                                <span class="text-danger" id="error"></span>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" id="update">Update</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>

<?php include("footer.php"); ?>
<script src="/petshop_project/static/dashboard/js/bootstrap.min.js"></script>
    <script src="/petshop_project/static/dashboard/js/theme.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script>
    let table=$('#dataTable1').DataTable( {
    "processing": true,
    "ajax": "getorderdetails.php"
} );

function Update(id){
    localStorage.setItem("orderid",id);
    $("#modal").modal('show');
}
$("#update").click(function(){
let length=$("#option").val().length
$("#error").html("")
    let error = true
    if(length==0){
        $("#error").html("Required*")
        error=false
    }
    $(".msg").html("");
    if(error){
        $.ajax({
            url:"updateorder.php",
            method:"POST",
            data:{"id":localStorage.getItem("orderid"),"status":$("#option").val()},
            success:function(data){
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
                      localStorage.removeItem("orderid")
                      $('#modal').modal('hide');
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