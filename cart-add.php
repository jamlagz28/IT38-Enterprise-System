<?php
// Start the session
session_start();

// Include the common.php to connect to the database
require("includes/common.php");

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id'])) {
    header('location: login.php'); // Redirect to login page if the user is not logged in
    exit();
}

// Check if the item_id is set in the GET request and is numeric
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Get the item_id from the GET request and user_id from the session
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Use prepared statement to insert the item into the user_item table
    $query = "INSERT INTO `user_item` (`user_id`, `item_id`, `status`) VALUES (?, ?, 1)";
    
    if ($stmt = mysqli_prepare($con, $query)) {
        // Bind the user_id and item_id parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ii", $user_id, $item_id);
        
        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // If the query executes successfully, redirect to the products page
            header('location: products.php');
        } else {
            // If there is an error in execution
            die("Error executing the query: " . mysqli_error($con));
        }
        
        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // If there is an error preparing the statement
        die("Error preparing the query: " . mysqli_error($con));
    }
} else {
    // If item_id is not set or invalid, redirect to products page
    header('location: products.php');
}
?>
