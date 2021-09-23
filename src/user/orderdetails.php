<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <title>Orderdetails</title>
    <link rel="stylesheet" href="/petshop_project/static/petlist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/petshop_project/static/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/petshop_project//static/login/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">

</head>
<body>
<?php
include("../auth/userauth.php");
include("../db/dbconnection.php");
include("../navbar/navbar.php");

?>

<section class="register-photo mt-5" style="padding: 105px 36px; height: 90vh">
<div class="container-fluid">
                    <h3 class="text-dark mb-4">Order details</h3>
                    <span class="msg"></span>
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
                                        <th>Pet</th>
                                        <th>Delivery_Date</th>
                                        <th>Price</th>
                                        <th>Ordered Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>payment</th>

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
                                        <th>Pet</th>
                                        <th>Delivery_Date</th>
                                        <th>Price</th>
                                        <th>Ordered Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>payment</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Give feedback</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
            <span class="text-danger" id="error"></span>
          </div>
          <input type="hidden" name="orderid" id="orderid" value=""> 
        </form>
      </div>
      <div class="modal-footer">
      
        <button type="button" id="send" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>

<?php
include("../navbar/footer.php");
?>
<script src="/petshop_project/static/login/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script>
    let table=$('#dataTable1').DataTable( {
    "processing": true,
    "ajax": "getorderdetails.php"
} );

function Cancel(id){

    if (confirm('Are you sure you want to cancel this order?')) {
        $.ajax({
            url:"cancel.php",
            method:"POST",
            data:{id:id},
            success:function(data){
                console.log(data);
                data=JSON.parse(data);  
                let echo;
                if(data.error==1){
                    echo=`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Done</strong> `+data.msg+`
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
                    $(".msg").html(echo);
                }
                else{
                    echo=`<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Done</strong> `+data.msg+`
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
                    $(".msg").html(echo);
                    table.ajax.reload();
                }
            }
        })
      } else {
        // Do nothing!
        console.log('Thing was not saved to the database.');
      }
}
function Feedback(id){
    document.getElementById("orderid").value = id;
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
  keyboard: false
})
myModal.show();

$("#send").click(function(){
    let msg=$("#message-text")
    let error=true;

    if(msg.val().length==0){
        $("#error").html("require*")
        error=false;
    }
    if(error){
        $.ajax({
            url:"getuserfeedback.php",
            method:"POST",
            data:{"id":$("#orderid").val(),"msg":$("#message-text").val()},
            success:function(data){
                // let myModal = new bootstrap.Modal(document.getElementById('exampleModal'))
                myModal.hide();
                data=JSON.parse(data);  
                let echo;
                if(data.error==1){
                    echo=`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Done</strong> `+data.msg+`
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
                    $(".msg").html(echo);
                }
                else{
                    echo=`<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Done</strong> `+data.msg+`
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`
                    $(".msg").html(echo);
                    table.ajax.reload();
                }
                

            }
        })
    }
})
}
</script>
</body>
</html>