<?php
session_start();

// Check if the user is logged in and if they are an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];

// Dummy product data (you can replace this with a database query)
$products = [
    ['id' => 1, 'name' => 'Handwoven Basket', 'price' => 350, 'image' => 'https://via.placeholder.com/150'],
    ['id' => 2, 'name' => 'Wooden Figurine', 'price' => 500, 'image' => 'https://via.placeholder.com/150'],
    ['id' => 3, 'name' => 'Batik Scarf', 'price' => 200, 'image' => 'https://via.placeholder.com/150'],
    ['id' => 4, 'name' => 'Rattan Chair', 'price' => 1200, 'image' => 'https://via.placeholder.com/150']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Bukidnon Handicrafts</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color: #333;
            padding: 15px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            padding: 50px;
            text-align: center;
        }
        .welcome {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .logout-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #c0392b;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .logout-button:hover {
            background-color: #e74c3c;
        }
        .product-list {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 30px;
        }
        .product {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 220px;
            padding: 20px;
            margin: 15px;
            text-align: center;
        }
        .product img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }
        .product-price {
            font-size: 16px;
            margin-top: 5px;
            color: #27ae60;
        }
        .product-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }
        .product-button:hover {
            background-color: #2980b9;
        }
        .admin-actions {
            margin-top: 30px;
        }
        .admin-actions a {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 10px;
        }
        .admin-actions a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<nav>
    <div class="navbar-brand">Bukid Crafts</div>
    <div>
        <a href="admin-dashboard.php">Dashboard</a>
        <a href="manage-products.php">Manage Products</a>
        <a href="orders.php">Orders</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="container">
    <div class="welcome">Welcome, <?= htmlspecialchars($username) ?>!</div>
    <p>You have successfully logged into the Bukidnon Handicrafts Admin Dashboard.</p>

    <!-- Admin Action Links -->
    <div class="admin-actions">
        <a href="add-product.php">Add New Product</a>
        <a href="edit-product.php">Edit Products</a>
        <a href="delete-product.php">Delete Products</a>
    </div>

    <!-- Product List -->
    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                <div class="product-name"><?= htmlspecialchars($product['name']) ?></div>
                <div class="product-price">₱<?= number_format($product['price'], 2) ?></div>
                <a href="product-detail.php?id=<?= $product['id'] ?>" class="product-button">View Product</a>
            </div>
        <?php endforeach; ?>
    </div>

    <a href="logout.php" class="logout-button">Logout</a>
</div>

</body>
</html>
