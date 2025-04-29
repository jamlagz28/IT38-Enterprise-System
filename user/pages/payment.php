<?php
// Sample products - you can fetch this from your database
$products = [
    1 => [
        'id' => 1,
        'name' => 'Banig Mat',
        'price' => 250.00,
    ],
    2 => [
        'id' => 2,
        'name' => 'Rattan Basket',
        'price' => 180.00,
    ],
    // Add other products here
];

// Get the product details from the form submission
$product_id = $_POST['product_id'] ?? null;
$product_name = $_POST['product_name'] ?? null;
$product_price = $_POST['product_price'] ?? null;

if (!$product_id || !isset($products[$product_id])) {
    // Redirect to products page if no valid product found
    header("Location: products.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment - <?= $product_name; ?></title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f5f2;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background-color:rgb(141, 85, 0);
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
            background-color:rgb(141, 85, 0);
        }

        .main-content {
            margin-left: 220px;
            padding: 30px;
        }

        .payment-detail {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .payment-detail h2 {
            margin-top: 0;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .payment-form input, .payment-form select {
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .payment-button {
            background: #388e3c;
            color: white;
            padding: 12px 24px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
        }

        .payment-button:hover {
            background: #2e7d32;
        }

        .payment-methods {
            margin-bottom: 20px;
        }

        .payment-methods label {
            margin-right: 15px;
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
    <h1>Payment for <?= $product_name; ?></h1>
    <div class="payment-detail">
        <h2>Product: <?= $product_name; ?></h2>
        <div class="price">₱<?= number_format($product_price, 2); ?></div>
        
        <form action="payment-processing.php" method="POST" class="payment-form">
            <!-- Personal Information -->
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="address" placeholder="Shipping Address" required>
            
            <!-- Hidden Product Information -->
            <input type="hidden" name="product_id" value="<?= $product_id; ?>">
            <input type="hidden" name="product_name" value="<?= $product_name; ?>">
            <input type="hidden" name="product_price" value="<?= $product_price; ?>">
            
            <!-- Payment Method Selection -->
            <div class="payment-methods">
                <h3>Select Payment Method</h3>
                <label for="cash_on_delivery">
                    <input type="radio" id="cash_on_delivery" name="payment_method" value="Cash on Delivery" required>
                    Cash on Delivery
                </label>
                <br>
                <label for="gcash">
                    <input type="radio" id="gcash" name="payment_method" value="GCash" required>
                    GCash
                </label>
                <br>
                <label for="paymaya">
                    <input type="radio" id="paymaya" name="payment_method" value="PayMaya" required>
                    PayMaya
                </label>
                <br>
                <label for="bank_transfer">
                    <input type="radio" id="bank_transfer" name="payment_method" value="Bank Transfer" required>
                    Bank Transfer
                </label>
            </div>

            <button type="submit" class="payment-button">Confirm Payment</button>
        </form>
    </div>
</div>

</body>
</html>
