<?php
require "panier/classes/pnaier.class.php";
session_start();

if (!isset($_SESSION['cid'])) {
    header('Location: client/loginc');
    exit();
}

if (isset($_GET['id'])) {
    $cart_id = (int) $_GET['id'];

    $panier = new Panier;
    $panier->delete_panier_by_id($cart_id);

    header('Location: listepanier.php');
    exit();
} else {
    echo "Invalid cart ID.";
    exit();
}
?>
