<!DOCTYPE html>
<html lang="en">
<?php
require 'dash_classes/product.class.php';
session_start();
if(isset($_SESSION['email']) == ""){
  header('location:../login_to_admin_panel/admin.php');
}

$prod = new Produit;
$res = $prod->getallprod();

$res2 = $prod->number_of_orders();
$data2 = $res2->fetch();
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bukid Crafts - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../style/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../style/css/sb-admin.css" rel="stylesheet">

    <style>
        body {
            background-image: url('https://media.istockphoto.com/id/465559373/photo/old-wood-background.jpg?s=612x612&w=0&k=20&c=mQ5fJU_4IwgCB8VK6g551yNVzsQJn7ZYpI8Ua6TeC0I%3D');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }
    </style>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-light static-top" style="background-color: #F4EDE5; position: relative;">

  <!-- Left: Logo -->
  <a class="navbar-brand mr-1" href="index.php">
    <img style="width:40px;height:30px;" src="../style/img/LOGO.jpg" alt="">
  </a>

  <!-- Center: ADMIN DASHBOARD -->
  <div class="mx-auto text-center w-100" style="position: absolute; left: 0; right: 0; text-align: center; pointer-events: none;">
    <span class="h5 font-weight-bold text-dark">ADMIN DASHBOARD</span>
  </div>

  <!-- Right: Search and User Dropdown -->
  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-danger" type="button">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle fa-fw"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="add_empl.php">Add Artisan</a>
        <a class="dropdown-item" href="product.php">Add Product</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
      </div>
    </li>
  </ul>

</nav>

  <!-- Breadcrumbs-->
  <ol class="breadcrumb mt-2">
    <li class="breadcrumb-item">
      <a href="index.php">Dashboard</a>
    </li>
  </ol>
  
  <div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">


      <div class="container">
        <!-- Icon Cards-->
        <div class="row">
 <div class="col-xl-4 col-sm-6 mb-3">
  <div class="card text-white bg-success o-hidden h-100">
    <div class="card-body">
      <div class="card-body-icon">
        <i class="fas fa-fw fa-shopping-cart"></i>
      </div>
      <div class="mr-5">Order</div>
    </div>
    <a class="card-footer text-white clearfix small z-1" href="orders.php">
      <span class="float-left">View Details</span>
      <span class="float-right">
        <i class="fas fa-angle-right"></i>
      </span>
    </a>
  </div>
</div>

<div class="col-xl-4 col-sm-6 mb-3">
  <div class="card text-white bg-danger o-hidden h-100">
    <div class="card-body">
      <div class="card-body-icon">
        <i class="fas fa-fw fa-box"></i>
      </div>
      <div class="mr-5">List of Product</div>
    </div>
    <a class="card-footer text-white clearfix small z-1" href="listproduct.php">
      <span class="float-left">View Details</span>
      <span class="float-right">
        <i class="fas fa-angle-right"></i>
      </span>
    </a>
  </div>
</div>

<div class="col-xl-4 col-sm-6 mb-3">
  <div class="card text-white bg-warning o-hidden h-100">
    <div class="card-body">
      <div class="card-body-icon">
        <i class="fas fa-fw fa-users"></i>
      </div>
      <div class="mr-5">List of Artisans</div>
    </div>
    <a class="card-footer text-white clearfix small z-1" href="listemploys.php">
      <span class="float-left">View Details</span>
      <span class="float-right">
        <i class="fas fa-angle-right"></i>
      </span>
    </a>
  </div>
</div>

<!-- NEW: List of Users card -->
<div class="col-xl-4 col-sm-6 mb-3">
  <div class="card text-white bg-info o-hidden h-100">
    <div class="card-body">
      <div class="card-body-icon">
        <i class="fas fa-fw fa-user"></i>
      </div>
      <div class="mr-5">List of Users</div>
    </div>
    <a class="card-footer text-white clearfix small z-1" href="User.php">
      <span class="float-left">View Details</span>
      <span class="float-right">
        <i class="fas fa-angle-right"></i>
      </span>
    </a>
  </div>
</div>

        </div>
      </div>



        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            List of Product</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>desciption</th>
                    <th>price</th>
                    <th>picture</th>
                    <th>Operation</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($data = $res->fetch())
                {    
                ?>
                  <tr>
                    <td><?php echo $data['pid'];?></td>
                    <td><?php echo $data['name'];?></td>
                    <td><?php echo $data['description'];?></td>
                    <td><?php echo $data['price'];?></td>
                    <td><img src="../uploads/<?php echo $data['file'];?>"alt="img" style="width:50px;height:50px;"></td>
                    <td><a class="btn btn-primary" href="update.php?id=<?php echo $data['pid'];?>">Update</a>
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $data['pid'];?>">delete</a></td>
                    </td>
                  </tr>
                <?php }?>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>

      </div>
      <!-- /.container-fluid -->


    </div>
    <!-- /.content-wrapper -->

  </div>

  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../login_to_admin_panel/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../style/vendor/jquery/jquery.min.js"></script>
  <script src="../style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../style/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../style/vendor/chart.js/Chart.min.js"></script>
  <script src="../style/vendor/datatables/jquery.dataTables.js"></script>
  <script src="../style/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../style/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../style/js/demo/datatables-demo.js"></script>
  <script src="../style/js/demo/chart-area-demo.js"></script>

</body>

</html>
