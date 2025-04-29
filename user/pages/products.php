<?php
// Sample products - later you can fetch this from your database
$products = [
    [
        'id' => 1,
        'name' => 'Banig Mat',
        'description' => 'Handwoven banig made from pandan leaves.',
        'price' => 250.00,
        'image' => '../images/banig.jpg'
    ],
    [
        'id' => 2,
        'name' => 'Rattan Basket',
        'description' => 'Locally made rattan basket, perfect for gifts.',
        'price' => 180.00,
        'image' => '../images/rattan.jpg'
    ],
    [
        'id' => 3,
        'name' => 'Beaded Necklace',
        'description' => 'Traditional Bukidnon beadwork necklace.',
        'price' => 120.00,
        'image' => '../images/necklace.webp'
    ],
    [
        'id' => 4,
        'name' => 'Bamboo Tumbler',
        'description' => 'Eco-friendly tumbler crafted from natural bamboo.',
        'price' => 200.00,
        'image' => '../images/bamboo.jpg'
    ],
    [
        'id' => 5,
        'name' => 'Woven Fan',
        'description' => 'Colorful handwoven fan, perfect for hot weather.',
        'price' => 75.00,
        'image' => '../images/woven.jpg'
    ],
    [
        'id' => 6,
        'name' => 'Handcrafted Wallet',
        'description' => 'Durable wallet made from native materials and designs.',
        'price' => 150.00,
        'image' => '../images/wallet.jpg'
    ],
    [
        'id' => 7,
        'name' => 'Beaded Headband',
        'description' => 'Vibrant traditional headband with Bukidnon bead patterns.',
        'price' => 90.00,
        'image' => '../images/headband.jpg'
    ],
    [
        'id' => 8,
        'name' => 'Hand-Carved Keychain',
        'description' => 'Wooden keychain with unique Bukidnon tribal carvings.',
        'price' => 60.00,
        'image' => '../images/keychain.jpg'
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bukidnon Handicrafts - Products</title>
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

        .main-content h1 {
            margin-bottom: 20px;
        }

        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .product {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .product img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }

        .product h3 {
            margin: 10px 0 5px;
        }

        .product p {
            font-size: 14px;
            color: #555;
        }

        .price {
            font-weight: bold;
            margin: 10px 0;
            color: #333;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .add-to-cart, .buy-now {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .add-to-cart {
            background: #4CAF50;
            color: white;
        }

        .add-to-cart:hover {
            background: #388e3c;
        }

        .buy-now {
            background: #388e3c;
            color: white;
        }

        .buy-now:hover {
            background: #388e3c;
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
    <h1>Our Bukidnon Handicrafts</h1>
    <div class="product-container">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>">
                <h3><?= $product['name']; ?></h3>
                <p><?= $product['description']; ?></p>
                <div class="price">₱<?= number_format($product['price'], 2); ?></div>
                <div class="button-group">
                    <form action="add-to-cart.php" method="POST">
                        <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                        <button type="submit" class="add-to-cart">🛒 Add to Cart</button>
                    </form>
                    <form action="buy-now.php" method="POST">
                        <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                        <button type="submit" class="buy-now">💳 Buy</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
