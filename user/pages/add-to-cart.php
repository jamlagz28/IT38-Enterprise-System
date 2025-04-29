<?php
// Start the session to store cart data later if needed
session_start();

// Check if product_id was sent via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // For now, just display the added product ID (you can fetch details from DB later)
    echo "<h2>Product ID $productId has been added to your cart!</h2>";
} else {
    echo "<h2>No product was selected.</h2>";
}
?>

<p><a href="products.php">← Back to Products</a></p>
