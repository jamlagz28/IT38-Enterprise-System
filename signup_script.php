<?php
require("includes/common.php");

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get and sanitize input values
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['e-mail']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    // Encrypt password (note: consider using password_hash for real-world apps)
    $password = MD5($password);

    // Regex for phone number only
    $regex_num = "/^[789][0-9]{9}$/";

    // Check if email already exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $num = mysqli_num_rows($result);

    if ($num != 0) {
        $m = "<span class='red'>Email Already Exists</span>";
        header('location: signup.php?m1=' . urlencode($m));
        exit;
    } else if (!preg_match($regex_num, $contact)) {
        $m = "<span class='red'>Not a valid phone number</span>";
        header('location: signup.php?m2=' . urlencode($m));
        exit;
    } else {
        // Insert user into database
        $query = "INSERT INTO users(name, email, password, contact, city, address) 
                  VALUES('$name', '$email', '$password', '$contact', '$city', '$address')";
        mysqli_query($con, $query) or die(mysqli_error($con));

        // Redirect to login page after successful signup
        header('location: login.php');
        exit;
    }
} else {
    // Redirect if accessed without POST data
    header('location: signup.php');
    exit;
}
?>
