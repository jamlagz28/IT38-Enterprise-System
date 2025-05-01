<?php
// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: products.php");
    exit();
}

// Error message variable
$error = ''; 

// Process the registration form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    // Simple validation
    if (empty($email) || empty($fullname) || empty($password) || empty($username)) {
        $error = 'All fields are required';
    } else {
        // Database connection
        $servername = "localhost";
        $db_username = "root"; // Replace with your database username
        $db_password = ""; // Replace with your database password
        $dbname = "bukid_crafts";

        try {
            // Create a PDO connection
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert query
            $sql = "INSERT INTO register (username, email, fullname, password) VALUES (:username, :email, :fullname, :password)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':password', $hashed_password);
            
            // Execute the statement
            $stmt->execute();

            // Redirect to login page
            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            // Handle errors
            $error = "Error: " . $e->getMessage();
        }
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
        /* Styles remain unchanged */
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
        .register-form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 300px;
        }
        .register-form h2 {
            text-align: center;
            margin-bottom: 0;
            font-size: 18px;
        }
        .register-form .brand-name {
            font-size: 28px;
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
        <div class="register-form">
            <div class="brand-name">Bukidnon Handicrafts</div>
            <h2>Register</h2>

            <?php if ($error): ?>
                <p class="error-message"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form action="register.php" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="fullname" placeholder="Full Name" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Register</button>
            </form>

            <div class="signup-link">
                Already have an account? <a href="index.php">Login here</a>
            </div>
        </div>
    </div>

</body>
</html>
