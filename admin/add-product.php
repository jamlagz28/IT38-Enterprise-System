<?php
require("../includes/common.php");

// Ensure admin is logged in
if (!isset($_SESSION['admin_email'])) {
    header('location: login-admin.php');
    exit;
}

// Handle Add Product
if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Insert new product into the database
    $insert_query = "INSERT INTO items (name, price) VALUES ('$product_name', '$product_price')";
    mysqli_query($con, $insert_query);
    header("Location: manage-products.php"); // Redirect back to manage products
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product | Admin Dashboard</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            padding-top: 70px;
            background-color: #f4f4f4;
        }

        h1 {
            margin-bottom: 20px;
            font-weight: 700;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-success {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php include '../includes/admin-header.php'; ?>

    <main class="container">
        <h1>Add New Product</h1>
        <form method="POST">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="product_price">Product Price</label>
                <input type="number" step="0.01" name="product_price" id="product_price" class="form-control" required>
            </div>
            <button type="submit" name="add_product" class="btn btn-success">Add Product</button>
        </form>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
