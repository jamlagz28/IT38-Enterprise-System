<?php
require_once("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings | Life Style Store</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-image: url('https://media.istockphoto.com/id/465559373/photo/old-wood-background.jpg?s=612x612&w=0&k=20&c=mQ5fJU_4IwgCB8VK6g551yNVzsQJn7ZYpI8Ua6TeC0I%3D');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #settings-container {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 30px;
            border-radius: 10px;
            color: #fff;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.8);
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            border: 1px solid #ccc;
        }

        .form-control::placeholder {
            color: #ccc;
        }

        .btn-primary {
            background-color: #5cb85c;
            border-color: #4cae4c;
            width: 100%;
        }

        h4 {
            margin-bottom: 20px;
            text-align: center;
        }

        .error-text {
            margin-top: 10px;
            color: #ff4d4d;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>

    <main>
        <div id="settings-container">
            <h4>Change Password</h4>
            <form action="settings_script.php" method="POST">
                <div class="form-group">
                    <input type="password" class="form-control" name="old-password" placeholder="Old Password" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="New Password" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password1" placeholder="Re-type New Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Change</button>
                <?php
                if (isset($_GET['error'])) {
                    echo '<div class="error-text">' . htmlspecialchars($_GET['error']) . '</div>';
                }
                ?>
            </form>
        </div>
    </main>

    <?php include("includes/footer.php"); ?>
</body>
</html>
