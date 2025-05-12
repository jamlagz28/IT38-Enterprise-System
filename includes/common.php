<?php
$con = mysqli_connect("localhost", "root", "", "bukid_crafts");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
