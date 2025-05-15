<?php
require "panier/classes/pnaier.class.php";
session_start();

// Ensure the user is logged in
if (empty($_SESSION['name'])) {
    header('location:client/loginc');   
    exit();
}

if (isset($_POST['pid']) && isset($_POST['qty'])) {
    $prod_id = $_POST['pid'];
    $new_qty = (int) $_POST['qty'];

    // If the quantity is greater than zero, update the cart
    if ($new_qty > 0) {
        $panier = new Panier;
        $panier->updateQuantity($prod_id, $new_qty, $_SESSION['cid']); // assuming updateQuantity is a method in your Panier class

        // After update, redirect back to the cart page
        header('Location: listepanier.php');
        exit();
    } else {
        echo "Invalid quantity!";
        exit();
    }
} else {
    echo "Missing product ID or quantity.";
    exit();
}
?>
