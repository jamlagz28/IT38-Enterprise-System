<?php
// Start session only if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if admin is logged in
if (!isset($_SESSION['admin_email'])) {
    header('Location: ../admin/login-admin.php');
    exit();
}
?>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">

<!-- Custom Admin Navbar CSS -->
<style>
    body {
        font-family: 'Quicksand', sans-serif;
    }

    .navbar-admin {
        background-color: #4E3629;
        border: none;
        border-radius: 0;
        margin-bottom: 0;
    }

    .navbar-admin .navbar-brand {
        color: #FFD700 !important;
        font-weight: 700;
        font-size: 24px;
    }

    .navbar-admin .navbar-brand:hover {
        color: #FFA500 !important;
    }

    .navbar-admin .navbar-toggle {
        border-color: #FFD700;
    }

    .navbar-admin .icon-bar {
        background-color: #FFD700;
    }

    .navbar-admin .nav > li > a {
        color: #FFFFFF !important;
        font-weight: 500;
    }

    .navbar-admin .nav > li > a:hover {
        background-color: #5C4433 !important;
        color: #FFD700 !important;
    }

    .navbar-admin .glyphicon {
        margin-right: 5px;
    }
</style>

<!-- Admin Header Navigation Bar -->
<div class="navbar navbar-admin navbar-fixed-top">
    <div class="container">
        <!-- Menu toggle for mobile -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#adminNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="../admin/admin-dashboard.php">Bukid Crafts Admin</a>
        </div>
        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../admin/admin-dashboard.php"><span class="glyphicon glyphicon-dashboard"></span>Dashboard</a></li>
                <li><a href="../admin/manage-users.php"><span class="glyphicon glyphicon-user"></span>Manage Users</a></li>
                <li><a href="../admin/manage-feedbacks.php"><span class="glyphicon glyphicon-comment"></span>Monitor Feedbacks</a></li> <!-- Correct Link -->
                <li><a href="../admin/manage-products.php"><span class="glyphicon glyphicon-cog"></span>Manage Products</a></li>
                <li><a href="../admin/manage-sales.php"><span class="glyphicon glyphicon-shopping-cart"></span>Manage Sales</a></li>
                <li><a href="../admin/logout-admin.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
            </ul>
        </div>
    </div>
</div>
