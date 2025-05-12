<?php
require("../includes/common.php");

// Only run once to insert the admin account
$hashed_password = password_hash("admin123", PASSWORD_DEFAULT);

$query = "INSERT INTO admin (email, password) VALUES ('admin@bukidcrafts.com', '$hashed_password')";

if (mysqli_query($con, $query)) {
    echo "Admin account created successfully.";
} else {
    echo "Error: " . mysqli_error($con);
}
?>
