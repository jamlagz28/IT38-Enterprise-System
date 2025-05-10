<?php
require("includes/common.php");

if (!isset($_SESSION['user_id'])) {
    header('location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$item_id = $_POST['item_id'];
$quantity = max(1, intval($_POST['quantity'])); // Ensure quantity is at least 1

$query = "UPDATE user_item SET quantity = $quantity WHERE user_id = '$user_id' AND item_id = '$item_id' AND status = 1";
mysqli_query($con, $query) or die(mysqli_error($con));

header("Location: cart.php");
?>
