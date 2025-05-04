<?php
require("includes/common.php");
if (isset($_SESSION['email'])) {
    header('location: products.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up | Bukid Crafts</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background-image: url('https://media.istockphoto.com/id/465559373/photo/old-wood-background.jpg?s=612x612&w=0&k=20&c=mQ5fJU_4IwgCB8VK6g551yNVzsQJn7ZYpI8Ua6TeC0I=');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .form-wrapper {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
            color: #333;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            color: #5a4a3c;
        }

        .form-control {
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #6c584c;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            color: #fff;
            font-size: 15px;
        }

        .btn-primary:hover {
            background-color: #5a4a3c;
        }

        small.text-danger {
            display: block;
            margin-bottom: 10px;
            font-size: 13px;
        }

        @media (max-width: 480px) {
            .form-wrapper {
                padding: 20px;
            }
        }
    </style>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="overlay">
    <div class="form-wrapper">
        <h2>Create an Account</h2>
        <form action="signup_script.php" method="POST">
            <input type="text" class="form-control" placeholder="Full Name" name="name" required 
                   pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">

            <input type="email" class="form-control" placeholder="Email Address" 
                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="e-mail" required>
            <?php if (isset($_GET['m1'])) echo "<small class='text-danger'>" . $_GET['m1'] . "</small>"; ?>

            <input type="password" class="form-control" placeholder="Password" 
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                   title="Min 8 chars, 1 uppercase, 1 number" name="password" required>

            <input type="text" class="form-control" placeholder="Contact Number" maxlength="10" name="contact" required>
            <?php if (isset($_GET['m2'])) echo "<small class='text-danger'>" . $_GET['m2'] . "</small>"; ?>

            <input type="text" class="form-control" placeholder="City" name="city" required>
            <input type="text" class="form-control" placeholder="Full Address" name="address" required>

            <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
</div>

<?php include "includes/footer.php"; ?>

</body>
</html>
