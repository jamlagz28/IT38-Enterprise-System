<?php
// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

$error = ''; // Variable to store error message

// Process the registration form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];

    // Simple validation (in a real system, you should validate the email, check password strength, etc.)
    if (empty($email) || empty($fullname) || empty($password)) {
        $error = 'All fields are required';
    } else {
        // Dummy registration logic (store in session for now)
        $_SESSION['username'] = $fullname; // Using full name as username
        header("Location: index.php"); // Redirect to home page after registration
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukidnon Handicrafts - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-image: url('https://media.istockphoto.com/id/465559373/photo/old-wood-background.jpg?s=612x612&w=0&k=20&c=mQ5fJU_4IwgCB8VK6g551yNVzsQJn7ZYpI8Ua6TeC0I%3D&fbclid=IwY2xjawJ21rxleHRuA2FlbQIxMABicmlkETBMU3hCc1ZjNFpRcndwdzJxAR4NSWeL1kOJKpfGj6eQN6BGCuCRyVFK5NtOzISyK0l7r1UyMohAhoOarbJ5pQ_aem_2aBVxI4J6j4krZnupRzFKA');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            height: 100vh;
        }
        nav {
            background-color: rgba(51, 51, 51, 0.7);
            padding: 15px;
            color: white;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            font-weight: bold;
        }
        nav a:hover {
            background-color: #575757;
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: white;
            margin-right: 20px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
        .register-form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .register-form h2 {
            text-align: center;
            margin-bottom: 0;
            font-size: 18px;
        }
        .register-form .brand-name {
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .register-form input[type="text"],
        .register-form input[type="email"],
        .register-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .register-form button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .register-form button:hover {
            background-color: #575757;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <span class="navbar-brand">Bukid Crafts</span>
        <a href="index.php">Home</a>
        <a href="register.php">Register</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="products.php">Products</a>
        <a href="about.php">About Us</a>
        <a href="cart.php">Cart</a>
    </nav>

    <!-- Register Form Section -->
    <div class="container">
        <div class="register-form">
            <div class="brand-name">Bukid Crafts</div>
            <h2>Register</h2>

            <?php if ($error): ?>
                <p class="error-message"><?= $error ?></p>
            <?php endif; ?>

            <form action="register.php" method="POST">
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="text" name="fullname" placeholder="Full Name" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Create an Account</button>
            </form>
        </div>
    </div>

    <!-- Side Text -->
    <div class="side-text">Bukidnon Handicrafts</div>

</body>
</html>
