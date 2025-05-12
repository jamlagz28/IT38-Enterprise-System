<?php
require("../includes/common.php");

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the admin is logged in
if (!isset($_SESSION['admin_email'])) {
    header('location: login-admin.php');
    exit;
}

// Delete user if requested
if (isset($_GET['delete'])) {
    $user_id = intval($_GET['delete']);
    $delete_query = "DELETE FROM users WHERE id = $user_id";
    mysqli_query($con, $delete_query);
    // Redirect to avoid repeated deletion on page refresh
    header("Location: manage-users.php");
    exit;
}

// Fetch all users
$query = "SELECT * FROM users";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users | Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            padding-top: 60px;
            background-color: #f9f9f9;
        }

        main.container {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            margin-bottom: 20px;
            font-weight: 700;
        }

        .table th {
            background-color: #4E3629;
            color: white;
        }

        .btn-danger {
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php include '../includes/admin-header.php'; ?>

<main class="container mt-4">
    <h1 class="text-center">Manage Users</h1>
    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td>
                        <a href="manage-users.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<?php include '../includes/footer.php'; ?>

</body>
</html>
