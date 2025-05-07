<?php
require "panier/classes/pnaier.class.php";
session_start();

// Ensure the user is logged in
if (isset($_SESSION['name']) == '') {
    header('location:client/loginc');
    exit();
}

$panier = new Panier;
$st = "0";  // Set the order status to 1 (could represent pending or processing)

// Fetch the cart items
$res = $panier->whatinpanier();

// Process the order for each item in the cart
while ($data = $res->fetch()) {
    $res2 = $panier->insertinto_order($data['qty'], $st, $data['pid'], $data['cid']);
}

// Reset the cart (clear session/cart data)
$res3 = $panier->resetpanier();

// Redirect to the homepage with a success message
header('location:index.php?checkout=done');
exit();
?>
