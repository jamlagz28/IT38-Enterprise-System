<?php
require "panier/classes/pnaier.class.php";
session_start();

// Ensure the user is logged in
if (isset($_SESSION['cid']) && isset($_GET['id'])) {
    $prod_id = (int) $_GET['id'];  // Get the product ID from the GET request

    // Create a Panier object and delete the product from the cart
    $panier = new Panier;
    
    // Call delete function with customer ID and product ID
    $panier->delete_Panier($prod_id, $_SESSION['cid']);
    
    // After deletion, redirect to the cart page
    header('Location: listepanier.php');
    exit();
} else {
    // If the user is not logged in or no product ID is provided, handle the error
    echo "Invalid request.";
    exit();
}
?>