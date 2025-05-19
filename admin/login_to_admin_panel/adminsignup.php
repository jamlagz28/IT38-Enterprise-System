<?php
require_once 'classes/db_connect.class.php';

$nameError = $emailError = $passwordError = $typeError = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $type     = $_POST['type'] ?? '';

    // Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Invalid email format';
    }

    if (strlen($password) < 6) {
        $passwordError = 'Password must be at least 6 characters';
    }

    if ($type !== 'admin') {
        $typeError = "You must select 'admin'";
    }

    if (empty($emailError) && empty($passwordError) && empty($typeError)) {
        try {
            $pdo = (new DBConnection())->connectDB();
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare(
                "INSERT INTO employé (name, email, password, type) 
                 VALUES (:name, :email, :password, :type)"
            );

            $stmt->execute([
                ':name'     => $name,
                ':email'    => $email,
                ':password' => $hashedPassword,
                ':type'     => $type
            ]);

            $successMessage = 'Admin registered successfully!';
        } catch (PDOException $e) {
            $emailError = 'Email already exists or database error: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Signup</title>
    <link href="../style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('https://media.istockphoto.com/id/465559373/photo/old-wood-background.jpg?s=612x612&w=0&k=20&c=mQ5fJU_4IwgCB8VK6g551yNVzsQJn7ZYpI8Ua6TeC0I%3D');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Montserrat', sans-serif;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: 600;
            background-color: transparent;
            border-bottom: none;
            color: #333;
        }

        label {
            font-weight: 500;
            color: #333;
        }

        .form-control {
            border-radius: 6px;
        }

        .btn-primary {
            background-color: #0066b2;
            border-color: #0066b2;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #034694;
            border-color: #034694;
        }

        .text-danger {
            font-size: 0.875rem;
        }

        .alert-success {
            font-weight: 500;
            font-size: 0.95rem;
        }

        .container {
            padding-top: 60px;
            padding-bottom: 60px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-header text-center">Register Admin</div>
            <div class="card-body">
                <?php if (!empty($successMessage)) : ?>
                    <div class="alert alert-success text-center"><?= htmlspecialchars($successMessage) ?></div>
                <?php endif; ?>
                
                <form method="post" novalidate>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            required 
                            class="form-control" 
                            value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required 
                            class="form-control" 
                            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                        >
                        <?php if ($emailError): ?>
                            <small class="text-danger"><?= htmlspecialchars($emailError) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required 
                            class="form-control"
                        >
                        <?php if ($passwordError): ?>
                            <small class="text-danger"><?= htmlspecialchars($passwordError) ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select id="type" name="type" class="form-control">
                            <option value="admin" <?= (($_POST['type'] ?? '') === 'admin') ? 'selected' : '' ?>>admin</option>
                        </select>
                        <?php if ($typeError): ?>
                            <small class="text-danger"><?= htmlspecialchars($typeError) ?></small>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
