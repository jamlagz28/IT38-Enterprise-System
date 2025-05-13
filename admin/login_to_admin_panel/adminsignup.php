<?php
include 'classes/db_connect.class.php';

$name_error = $email_error = $password_error = $type_error = '';
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $type     = $_POST['type'];

    // Basic validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
    }

    if (strlen($password) < 6) {
        $password_error = "Password must be at least 6 characters";
    }

    if ($type != 'admin') {
        $type_error = "You must select 'admin'";
    }

    if (empty($email_error) && empty($password_error) && empty($type_error)) {
        try {
            $pdo = (new DBConnection)->connectDB();
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO employé (name, email, password, type) VALUES (:name, :email, :password, :type)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':password' => $hash,
                ':type' => $type
            ]);

            $success_message = "Admin registered successfully!";
        } catch (PDOException $e) {
            $email_error = "Email already exists or DB error: " . $e->getMessage();
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
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-header text-center">Register Admin</div>
            <div class="card-body">
                <?php if ($success_message): ?>
                    <div class="alert alert-success"><?= $success_message ?></div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" required class="form-control" value="<?= $_POST['name'] ?? '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" required class="form-control" value="<?= $_POST['email'] ?? '' ?>">
                        <small class="text-danger"><?= $email_error ?></small>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required class="form-control">
                        <small class="text-danger"><?= $password_error ?></small>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select name="type" class="form-control">
                            <option value="admin">admin</option>
                        </select>
                        <small class="text-danger"><?= $type_error ?></small>
                    </div>
                    <button class="btn btn-primary btn-block">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
