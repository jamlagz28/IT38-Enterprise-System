<?php
// This page can later fetch order details or status updates
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delivery Information</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f5f2;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background-color: rgb(141, 85, 0);
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 22px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .sidebar a:hover {
            background-color: rgb(120, 70, 0);
        }

        .main-content {
            margin-left: 220px;
            padding: 30px;
        }

        .delivery-info {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .delivery-info h1 {
            margin-top: 0;
        }

        .delivery-info p {
            font-size: 16px;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #388e3c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-link:hover {
            background: #2e7d32;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Bukid Crafts</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="products.php">Products</a>
    <a href="orders.php">Orders</a>
    <a href="profile.php">Profile</a>
    <a href="logout.php">Logout</a>
</div>

<div class="main-content">
    <div class="delivery-info">
        <h1>Delivery Details</h1>
        <p>Your order has been confirmed and is now being prepared for delivery.</p>
        <p>Estimated delivery time: <strong>3-5 business days</strong></p>
        <p>You will receive an update once your order is shipped.</p>

        <a href="products.php" class="back-link">Back to Products</a>
    </div>
</div>

</body>
</html>
