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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
</head>

<body id="page-top">
<?php 
include("dashboard.php"); 
include("../db/dbconnection.php"); 


?>
 <div class="container-fluid">
                    <h3 class="text-dark mb-4">Feedback</h3>
                   
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Feedback Info</p>
                            
                        </div>
                        
                        <div class="card-body">
                        
                           
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable1">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>User</th>
                                            <th>Pet</th>
                                            <th>Message</th>
                                            <th>Created At</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S.no</th>
                                        <th>User</th>
                                        <th>Pet</th>
                                        <th>Message</th>
                                        <th>Created At</th> 
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            
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
    "ajax": "getfeedback.php"
} );
</script>
    
    
</body>

</html>