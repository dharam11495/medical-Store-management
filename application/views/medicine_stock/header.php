<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Medical Store</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('Assets/css/style.css') ?>">

    <!-- Font Awesome JS -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <style type="text/css">
        .pagination a{
    position:relative;
display:block;
padding:.5rem .75rem;
margin-left:-1px;
line-height:1.25;
color:#007bff;
background-color:#fff;
border:1px solid #dee2e6;
   
  }

  .pagination a:hover{
    z-index:2;
color:#0056b3;
text-decoration:none;
background-color:#e9ecef;
border-color:#dee2e6
  }

  .pagination a:focus{
    z-index:2;outline:0;
  box-shadow:0 0 0 .2rem rgba(,123,255,.25)
  }
    </style>
    
    
</head>
 <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3 class="text-center"><img src="<?= base_url('Assets/img/admin.png');?>" class="img-circle" width="100" height="100"></h3>
                <h5 class="text-center">Admin</h5>
            </div>

            <ul class="list-unstyled components">
              <p> <b style="color: red;"> Medical Store </b></p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Company Details</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="<?= base_url('welcome/company'); ?>">Company</a>
                        </li>
                        
                        <li>
                            <a href="<?= base_url('welcome/manage'); ?>">Edit & Manage</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Supplier</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="<?= base_url('welcome/supplier_Details'); ?>">Supplier Details</a>
                        </li>
                        <li>
                            <a href="<?= base_url('welcome/manageSupplier'); ?>">Edit & Manage</a>
                            
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">One Time Entry </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <li>
                            <a href="<?= base_url('welcome/companyEntry'); ?>">Company Entry</a>
                        </li>
                        <li>
                            <a href="<?= base_url('welcome/supplier'); ?>">Supplier(MR) Entry</a>
                        </li>
                        <li>
                            <a href="<?= base_url('welcome/product'); ?>">Medicine Entry</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('welcome/sheet'); ?>">Balance Sheet</a>
                </li>
                <li>
                    <a href="<?= base_url('welcome/order'); ?>">Order Sheet</a>
                </li>

                <li>
                    <a href="<?= base_url('welcome/forward'); ?>">Take In Sheet</a>
                </li>
            </ul>

           
        </nav>

        <!-- Page Content  -->
        <div id="content">

           

          <nav class="navbar navbar-expand-lg navbar-light ">
             <button type="button" id="sidebarCollapse" class="btn btn-dark">
            <i class="fas fa-align-left"></i>
            </button>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
     
    
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>"><b style="color: white;"> Medical Store</b></a>
      </li>

       <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('welcome/consumed'); ?>"><b style="color: white;">Consumed Medicine</b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('welcome/consumedSheet'); ?>"><b style="color: white;">Consumed Sheet</b><span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
         <a class="nav-link btn btn-danger float-right" href="<?= base_url('welcome/logout'); ?>">Logout</a> 
      </li>
    </ul>
  </div>
</nav>
<body>