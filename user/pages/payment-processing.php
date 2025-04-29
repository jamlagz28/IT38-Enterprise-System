<?php
// Check if all required fields are submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $product_id = $_POST['product_id'] ?? '';
    $product_name = $_POST['product_name'] ?? '';
    $product_price = $_POST['product_price'] ?? '';
    $payment_method = $_POST['payment_method'] ?? '';

    if (!$full_name || !$email || !$address || !$product_id || !$product_name || !$product_price || !$payment_method) {
        header("Location: payment.php");
        exit;
    }
} else {
    // Redirect if page accessed directly
    header("Location: products.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
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

        .confirmation-box {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .confirmation-box h1 {
            margin-top: 0;
        }

        .details p {
            font-size: 16px;
            line-height: 1.6;
        }

        .details strong {
            color: #444;
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
    <div class="confirmation-box">
        <h1>Payment Confirmation</h1>
        <p>Thank you for your purchase, <strong><?= htmlspecialchars($full_name) ?></strong>!</p>
        <div class="details">
            <p><strong>Product:</strong> <?= htmlspecialchars($product_name) ?></p>
            <p><strong>Price:</strong> ₱<?= number_format($product_price, 2) ?></p>
            <p><strong>Payment Method:</strong> <?= htmlspecialchars($payment_method) ?></p>
            <p><strong>Shipping Address:</strong> <?= htmlspecialchars($address) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
        </div>
        <a href="delivery.php" class="back-link">Go to Delivery</a>
    </div>
</div>

</body>
</html>
