<?php
session_start();
require("../includes/common.php");

// If admin is already logged in
if (isset($_SESSION['admin_email'])) {
    header("location: ../admin/admin-dashboard.php"); // You can rename or create this file
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];

    // Check if admin exists
    $query = "SELECT id, email, password FROM admin WHERE email='$email'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_email'] = $row['email'];
            header("location: ../admin/admin-dashboard.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Admin account not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | Bukid Crafts</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        body {
            background: #2c3e50;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        .login-box {
            margin: 100px auto;
            max-width: 400px;
            padding: 30px;
            background: rgba(0,0,0,0.8);
            border-radius: 10px;
        }
        .login-box h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-primary {
            width: 100%;
            background-color: #5cb85c;
            border: none;
        }
        .btn-primary:hover {
            background-color: #4cae4c;
        }
        .error-msg {
            color: #f88;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-box">
        <h2>Admin Login</h2>
        <?php if ($error): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="login-admin.php">
            <input type="email" name="email" class="form-control" placeholder="Admin Email" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

</body>
</html>
