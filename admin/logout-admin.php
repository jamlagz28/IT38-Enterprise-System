<?php
session_start();

// Destroy all session data
$_SESSION = [];
session_unset();
session_destroy();

// Redirect to admin login page
header("Location: ../admin/logout-admin.php");
exit;
