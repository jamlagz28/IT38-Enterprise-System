<?php
$servername = "localhost";
$username = "root";
$password = ""; // your MySQL password
$database = "bukid_crafts";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
