<?php
require "panier/classes/pnaier.class.php";
session_start();

// Ensure the user is logged in and product ID is provided
if (!isset($_SESSION['cid'])) {
    header('Location: client/loginc');
    exit();
}

if (isset($_GET['id'])) {
    $prod_id = (int) $_GET['id'];  // Sanitize product ID
    $customer_id = $_SESSION['cid'];

    $panier = new Panier;
    $panier->delete_Panier($prod_id, $customer_id);

    // Redirect back to the cart
    header('Location: listepanier.php');
    exit();
} else {
    // Invalid access
    echo "Invalid product ID.";
    exit();
}
?>
