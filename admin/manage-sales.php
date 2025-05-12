<?php
require("../includes/common.php");

// Ensure admin is logged in
if (!isset($_SESSION['admin_email'])) {
    header('location: login-admin.php');
    exit;
}

// Fetch sales/orders
$query = "SELECT oi.order_id, i.name AS item_name, oi.quantity, i.price, o.date_time, o.status
          FROM order_items oi 
          JOIN items i ON oi.item_id = i.id
          JOIN orders o ON oi.order_id = o.id";
$result = mysqli_query($con, $query);

// Handle Update Order Status
if (isset($_GET['update_status_id'])) {
    $order_id = $_GET['update_status_id'];
    $new_status = $_GET['status']; // Assuming 'status' is passed in the URL (you can customize as needed)
    
    // Update order status in the database
    $update_query = "UPDATE orders SET status = '$new_status' WHERE id = '$order_id'";
    mysqli_query($con, $update_query);
    header("Location: manage-sales.php"); // Redirect to the same page to refresh
    exit;
}

// Handle Delete Order
if (isset($_GET['delete_order_id'])) {
    $order_id = $_GET['delete_order_id'];
    
    // Delete order from the database
    $delete_query = "DELETE FROM orders WHERE id = '$order_id'";
    mysqli_query($con, $delete_query);
    header("Location: manage-sales.php"); // Redirect to the same page to refresh
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Sales | Admin Dashboard</title>
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
        <h1>Manage Sales</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($result)) { 
                        $total = $row['price'] * $row['quantity']; ?>
                        <tr>
                            <td><?php echo $row['order_id']; ?></td>
                            <td><?php echo htmlspecialchars($row['item_name']); ?></td>
                            <td>₱<?php echo number_format($row['price'], 2); ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td>₱<?php echo number_format($total, 2); ?></td>
                            <td><?php echo $row['date_time']; ?></td>
                            <td><?php echo ucfirst($row['status']); ?></td>
                            <td>
                                <a href="?update_status_id=<?php echo $row['order_id']; ?>&status=completed" class="btn btn-success" onclick="return confirm('Mark this order as completed?');">Mark Completed</a>
                                <a href="?delete_order_id=<?php echo $row['order_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
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
