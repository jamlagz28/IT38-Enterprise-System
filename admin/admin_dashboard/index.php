<!DOCTYPE html>

<html lang="en">
<?php
session_start();
if(isset($_SESSION['email']) == ""){
  header('location:../login_to_admin_panel/admin.php');
}else{
  if($_SESSION['type'] !="admin"){
    header('location:../login_to_admin_panel/admin.php');
  }
}
require 'dash_classes/admin.class.php';

$emp = new Adminstrator;
$res2 = $emp->number_of_orders();
$data2 = $res2->fetch();
$salesTotal = $emp->get_total_sales()->fetch()['total_sales'];
$monthlySales = $emp->get_monthly_sales()->fetchAll();

?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bukid Craft - Dashboard</title>

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
        
    .container {
        padding: 0 20px;
        margin-top: 20px;
        margin-bottom: 40px;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border-radius: 10px;
    }

    .card-header {
        font-size: 1.25rem;
    }
    
    .chart-container {
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
    }
    
    .sales-card {
        background: rgba(255,255,255,0.9);
        margin: 20px auto;
        width: 95%;
        max-width: 1000px;
    }
  </style>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-light static-top"  style="background-color: #F4EDE5;">

    <a class="navbar-brand mr-1" href="index.php">
      <img style="width:40px;height:30px;" src="../style/img/LOGO.jpg" alt="">
    </a>

    <!-- Navbar Search -->
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

    <!-- Navbar -->
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

  <div id="wrapper">
    <div id="content-wrapper">
      <div class="container-fluid">

        <!-- ADMIN DASHBOARD HEADING -->
        <div class="text-center mt-4 mb-2">
          <h1 class="text-white font-weight-bold" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.7);">ADMIN DASHBOARD</h1>
        </div>

        <!-- Breadcrumbs -->
        <ol class="breadcrumb mt-2">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
        </ol>

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

            <!-- List of Users card -->
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

      </div>
      <!-- /.container-fluid -->
<div class="row mt-4">
              <div class="col-12">
                <div class="card mb-4 sales-card">
                  <div class="card-header bg-primary text-white">
                    <i class="fas fa-chart-line"></i> Sales Overview
                  </div>
                  <div class="card-body p-4">
                    <div class="chart-container">
                      <canvas id="salesChart" style="width: 100%; height: 300px;"></canvas>
                    </div>
                  </div>
                  <div class="card-footer small text-muted">
                    Total Sales: ₱<?php echo number_format($salesTotal, 2); ?>
                  </div>
                </div>
              </div>
            </div>
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

  <!-- JavaScript -->
  <script src="../style/vendor/jquery/jquery.min.js"></script>
  <script src="../style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../style/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../style/vendor/chart.js/Chart.min.js"></script>
  <script src="../style/vendor/datatables/jquery.dataTables.js"></script>
  <script src="../style/vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="../style/js/sb-admin.min.js"></script>
  <script src="../style/js/demo/datatables-demo.js"></script>
  <script src="../style/js/demo/chart-area-demo.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sample data, replace these with actual PHP data 
        const months = <?php echo !empty($monthlySales) ? json_encode(array_column($monthlySales, 'month')) : '[]' ?>;
        const salesData = <?php echo !empty($monthlySales) ? json_encode(array_map('floatval', array_column($monthlySales, 'sales'))) : '[]' ?>;

        if (months.length > 0 && salesData.length > 0) {
            const ctx = document.getElementById("salesChart").getContext("2d");
            new Chart(ctx, {
                type: "line",
                data: {
                    labels: months,
                    datasets: [{
                        data: salesData,
                        borderColor: "rgba(78, 115, 223, 1)",
                        borderWidth: 2,
                        backgroundColor: "transparent",
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "#fff",
                        pointBorderWidth: 2
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false // This completely removes the legend box
                        },
                        tooltip: {
                            enabled: true,
                            callbacks: {
                                title: function(context) {
                                    // Show the month label only
                                    return context[0].label;
                                },
                                label: function(context) {
                                    // Show the sales value with a prefix text
                                    return 'Sales: ₱' + context.formattedValue;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: "Month"
                            },
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: "Sales (₱)"
                            },
                            grid: {
                                color: "rgba(0, 0, 0, 0.05)"
                            }
                        }
                    }
                }
            });
        } else {
            document.getElementById("salesChart").innerHTML = 
                '<div class="alert alert-warning">No sales data available</div>';
        }
    </script>


</body>
</html>