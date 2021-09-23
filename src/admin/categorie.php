<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Categories</title>
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
                    <h3 class="text-dark mb-4">Categorie</h3>
                    <Button class="btn btn-primary mb-5"data-bs-toggle="modal" data-bs-target="#exampleModal" >Add  Category</Button>
                    <span class="msg"></span>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Categorie Info</p>
                            
                        </div>
                        
                        <div class="card-body">
                        
                           
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable1">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Categories</th>
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
                                            <th>Categories</th>
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

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                          <form method="post" id="f1">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Category name</label>
                                <textarea class="form-control" id="categories" name="categories" rows="3" required></textarea>
                                <span class="text-danger" id="error"></span>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" id="add">Add</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                          <form method="post" id="f2">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="categories" class="form-label">Category name</label>
                                <textarea class="form-control" id="editcategories" name="editcategories" rows="3" required></textarea>
                                <span class="text-danger" id="editerror"></span>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" id="editbtn">Update</button>
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
    <script src="/petshop_project/static/dashboard/js/addcategories.js"></script>
    <script src="/petshop_project/static/dashboard/js/deletecategories.js"></script>
    <script src="/petshop_project/static/dashboard/js/editcategories.js"></script>
    
</body>

</html>