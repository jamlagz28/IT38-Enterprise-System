<?php
require("../includes/common.php");

// Ensure admin is logged in
if (!isset($_SESSION['admin_email'])) {
    header('location: login-admin.php');
    exit;
}

// Fetch products
$query = "SELECT * FROM items";
$result = mysqli_query($con, $query);

// Handle Delete Product
if (isset($_GET['delete_id'])) {
    $product_id = $_GET['delete_id'];
    
    // Delete product from the database
    $delete_query = "DELETE FROM items WHERE id = '$product_id'";
    mysqli_query($con, $delete_query);
    header("Location: manage-products.php"); // Redirect to the same page to refresh
    exit;
}

// Handle Edit Product (if data was submitted from the edit form)
if (isset($_POST['edit_product'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $update_query = "UPDATE items SET name = '$product_name', price = '$product_price' WHERE id = '$product_id'";
    mysqli_query($con, $update_query);
    header("Location: manage-products.php"); // Redirect to refresh
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Products | Admin Dashboard</title>
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

        .btn-success {
            margin-bottom: 20px;
        }

        .table-striped th {
            background-color: #4E3629;
            color: #fff;
            text-align: center;
        }

        .table-striped td {
            text-align: center;
            vertical-align: middle;
        }

        .btn {
            padding: 6px 12px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <?php include '../includes/admin-header.php'; ?>

    <main class="container">
        <h1>Manage Products</h1>
        <a href="add-product.php" class="btn btn-success">Add New Product</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td>₱<?php echo number_format($row['price'], 2); ?></td>
                            <td>
                                <a href="edit-product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                <a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
