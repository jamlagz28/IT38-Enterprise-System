<?php
require("includes/common.php");

if (!isset($_SESSION['admin_email'])) {
    header('location: login-admin.php');
    exit();
}

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $query = "SELECT status FROM orders WHERE id = '$order_id'";
    $result = mysqli_query($con, $query);
    $order = mysqli_fetch_assoc($result);
    $current_status = $order['status'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_status = $_POST['status'];

    $update_query = "UPDATE orders SET status = '$new_status' WHERE id = '$order_id'";
    mysqli_query($con, $update_query) or die(mysqli_error($con));

    header('location: manage-sales.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Order Status</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Update Order Status</h2>
        <form method="POST">
            <div class="form-group">
                <label for="status">Order Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending" <?php if ($current_status == 'pending') echo 'selected'; ?>>Pending</option>
                    <option value="shipped" <?php if ($current_status == 'shipped') echo 'selected'; ?>>Shipped</option>
                    <option value="completed" <?php if ($current_status == 'completed') echo 'selected'; ?>>Completed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update Status</button>
        </form>
    </div>
</body>
</html>
