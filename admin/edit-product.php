<?php
require("../includes/common.php");

// Ensure admin is logged in
if (!isset($_SESSION['admin_email'])) {
    header('location: login-admin.php');
    exit;
}

// Get product ID
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product data
    $query = "SELECT * FROM items WHERE id = '$product_id'";
    $result = mysqli_query($con, $query);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        // Redirect to manage products page if the product does not exist
        header('Location: manage-products.php');
        exit;
    }
}

// Handle Update Product
if (isset($_POST['edit_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Update product in the database
    $update_query = "UPDATE items SET name = '$product_name', price = '$product_price' WHERE id = '$product_id'";
    mysqli_query($con, $update_query);
    header("Location: manage-products.php"); // Redirect back to manage products
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product | Admin Dashboard</title>
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

        .btn-primary {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php include '../includes/admin-header.php'; ?>

    <main class="container">
        <h1>Edit Product</h1>
        <form method="POST">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="product_price">Product Price</label>
                <input type="number" step="0.01" name="product_price" id="product_price" class="form-control" value="<?php echo htmlspecialchars($product['price']); ?>" required>
            </div>
            <button type="submit" name="edit_product" class="btn btn-primary">Update Product</button>
        </form>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
