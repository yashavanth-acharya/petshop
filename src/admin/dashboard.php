<?php
include("../auth/adminauth.php");
?>
    
    
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion p-0" style="background:#1569C7 !important;">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="home.php">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-cat"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Petshop</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="home.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="categorie.php"><i class="fas fa-user"></i><span>Categorie</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="pets.php"><i class="fa fa-book"></i><span>Pets</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="feedback.php">
                        <i class="fa fa-commenting"></i><span>Feedback</span></a>
                        </li>
                    <li class="nav-item">
                    <a class="nav-link" href="Order_details.php"><i class="fa fa-first-order"></i><span>Order Details</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="userview.php"><i class="fa fa-user"></i><span>Users</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="user_queries.php"><i class="fa fa-question"></i><span>Users Questions</span></a>
                    </li>

                </ul>
                <div class="text-center d-none d-md-inline"></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button><button class="btn rounded-circle border-0" id="sidebarToggle" type="button" style="border: 1px solid #000;"><i class="fa fa-navicon" style="color:#000"></i></button>
            <ul class="navbar-nav flex-nowrap ms-auto">
                <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                    <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="me-auto navbar-search w-100">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                    </div>
                </li>
                
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Admin</span><img class="border rounded-circle img-profile" src="https://icon-library.com/images/a-icon/a-icon-28.jpg"></a>
                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                           
                           <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/petshop_project/src/user/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>