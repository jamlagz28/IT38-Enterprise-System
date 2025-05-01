<?php
// Start session
session_start();

// Redirect if already logged in
if (isset($_SESSION['username'])) {
    header("Location: ../../pages/products.php");
    exit();
}

// Include DB connection
require_once '../../db/config.php';

$error = ''; // For error messages

// Process login form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Secure query
    $stmt = $conn->prepare("SELECT * FROM register WHERE username = ?");
    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a user with the given username exists
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verify the hashed password
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                header("Location: ../../pages/products.php");
                exit();
            }
        }
        
        // If we reached here, either the username or password is incorrect
        $error = 'Invalid username or password';
        $stmt->close();
    } else {
        $error = 'Database error';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bukidnon Handicrafts - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-image: url('https://media.istockphoto.com/id/465559373/photo/old-wood-background.jpg?s=612x612&w=0&k=20&c=mQ5fJU_4IwgCB8VK6g551yNVzsQJn7ZYpI8Ua6TeC0I%3D');
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
            margin-top: 80px;
        }
        .login-form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 300px;
        }
        .login-form h2 {
            text-align: center;
            margin-bottom: 0;
            font-size: 18px;
        }
        .login-form .brand-name {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #575757;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
        .social-login {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .social-login a {
            width: 45%;
            margin: 5px;
            text-align: center;
        }
        .social-login img {
            width: 50px;
            height: 50px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .social-login img:hover {
            transform: scale(1.1);
        }
        .or-continue {
            text-align: center;
            margin: 15px 0;
            font-size: 14px;
            color: #333;
        }
        .signup-link {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }
        .signup-link a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <nav>
        <span class="navbar-brand">Bukid Crafts</span>
        <a href="index.php">Home</a>
        <a href="register.php">Register</a>
        <a href="products.php">Products</a>
        <a href="about.php">About Us</a>
        <a href="cart.php">Cart</a>
    </nav>

    <div class="container">
        <div class="login-form">
            <div class="brand-name">Bukidnon Handicrafts</div>
            <h2>Login</h2>

            <?php if ($error): ?>
                <p class="error-message"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form action="index.php" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>

            <div class="signup-link">
                Don't have an account? <a href="register.php">Sign up here</a>
            </div>

            <p class="or-continue">or continue</p>

            <div class="social-login">
                <a href="facebook-login.php">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Login with Facebook">
                </a>
                <a href="google-login.php">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Login with Google">
                </a>
            </div>
        </div>
    </div>

</body>
</html>
