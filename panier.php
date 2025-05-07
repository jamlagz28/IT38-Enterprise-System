<?php
require 'panier/classes/pnaier.class.php';

if (!empty($_POST)) {
    // Get the product ID from the POST request
    $str = $_POST['product'];
    $prod_id = (int) filter_var($str, FILTER_SANITIZE_NUMBER_INT);

    // Start the session to ensure session variables are accessible
    session_start();
    
    // Ensure the customer ID is set in the session
    if (isset($_SESSION['cid'])) {
        $cid = $_SESSION['cid'];

        // Initialize the Panier object
        $panier = new Panier;
        
        // Get product details
        $res = $panier->getInfo($prod_id);
        $data = $res->fetch();

        // Insert the product into the cart
        $inser = $panier->intoPanier("1", $data['pid'], $cid);

        // Get the updated cart badge (total number of items)
        $badge = $panier->getBadge();
        $badgedata = $badge->fetch();

        // Output the updated badge (cart count)
        echo $badgedata['total'];
    } else {
        // Handle the case when the user is not logged in or session doesn't have 'cid'
        echo "User is not logged in.";
    }
}
?>