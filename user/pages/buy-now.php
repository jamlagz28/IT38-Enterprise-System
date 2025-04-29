<?php
// Sample products - you can fetch this from your database
$products = [
    1 => [
        'id' => 1,
        'name' => 'Banig Mat',
        'description' => 'Handwoven banig made from pandan leaves.',
        'price' => 250.00,
        'image' => '../images/banig.jpg'
    ],
    2 => [
        'id' => 2,
        'name' => 'Rattan Basket',
        'description' => 'Locally made rattan basket, perfect for gifts.',
        'price' => 180.00,
        'image' => '../images/rattan.jpg'
    ],
    3 => [
        'id' => 3,
        'name' => 'Beaded Necklace',
        'description' => 'Traditional Bukidnon beadwork necklace.',
        'price' => 120.00,
        'image' => '../images/necklace.webp'
    ],
    // More products can be added
];

// Get the selected product ID from the form submission
$product_id = $_POST['product_id'] ?? null;

if ($product_id && isset($products[$product_id])) {
    $product = $products[$product_id];
} else {
    // If the product is not found, redirect to the product page
    header("Location: products.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buy Now - <?= $product['name']; ?></title>
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

        .product-detail {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .product-detail img {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }

        .product-detail h2 {
            margin-top: 0;
        }

        .product-detail p {
            font-size: 16px;
            color: #555;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .buy-button {
            background: #388e3c;
            color: white;
            padding: 12px 24px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
        }

        .buy-button:hover {
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
    <h1>Buy Now - <?= $product['name']; ?></h1>
    <div class="product-detail">
        <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>">
        <div>
            <h2><?= $product['name']; ?></h2>
            <p><?= $product['description']; ?></p>
            <div class="price">₱<?= number_format($product['price'], 2); ?></div>
            <form action="payment.php" method="POST">
                <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                <input type="hidden" name="product_name" value="<?= $product['name']; ?>">
                <input type="hidden" name="product_price" value="<?= $product['price']; ?>">
                <button type="submit" class="buy-button">Buy Now</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
