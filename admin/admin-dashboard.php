<?php
require("../includes/common.php");

// Make sure the admin is logged in
if (!isset($_SESSION['admin_email'])) {
    header('location: login-admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Bukid Crafts</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">


    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Header -->
    <?php
    // Debugging path issue
    include $_SERVER['DOCUMENT_ROOT'] . '/IT38-Enterprise-System/includes/admin-header.php';
    ?>

    <main class="container mt-4">
        <h1 class="text-center">Admin Dashboard</h1>
        <div class="row mt-4">
        
            <!-- Main Content Area -->
            <div class="col-md-9">
                <h3>Welcome, Admin!</h3>
                <p>Select an option from the left to manage the platform.</p>
            </div>
        </div>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
