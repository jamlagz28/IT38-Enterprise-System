<?php
// Start the session for the login system
session_start();

// Check if the user is already logged in, if yes redirect to userpage.php
if (isset($_SESSION['username'])) {
    header("Location: userpage.php");
    exit();
}

$error = ''; // Variable to store error message

// Process the login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Dummy credentials (you should replace this with a real authentication system)
    $valid_username = 'admin';
    $valid_password = 'password123'; // In a real system, you should hash passwords

    if ($username === $valid_username && $password === $valid_password) {
        // Store the username in the session to keep the user logged in
        $_SESSION['username'] = $username;
        header("Location: userpage.php"); // Redirect to userpage.php after login
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            margin-top: 80px; /* Added margin to move the container below the navbar */
            height: auto; /* Adjusted height to auto to avoid stretching the container */
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
            font-size: 28px;  /* Adjusted font size */
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            white-space: nowrap; /* Prevent text from wrapping */
            overflow: hidden; /* Ensure it stays inside the container */
            text-overflow: ellipsis; /* Adds '...' if the text overflows */
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
                <p class="error-message"><?= $error ?></p>
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
