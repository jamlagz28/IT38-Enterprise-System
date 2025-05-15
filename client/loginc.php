<?php 
session_start(); 
if (isset($_SESSION['name']) != ""){
    header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukid Crafts - Login</title>
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css" class="css">
    <link rel="stylesheet" href="../css/loginc.css" class="css">
    <link rel="stylesheet" href="../css/style.css" class="css">

    <style>
        body {
            background-image: url('https://media.istockphoto.com/id/465559373/photo/old-wood-background.jpg?s=612x612&w=0&k=20&c=mQ5fJU_4IwgCB8VK6g551yNVzsQJn7ZYpI8Ua6TeC0I%3D');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }
        .bukid-header {
            margin-top: 20px;
            text-align: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
        }
    </style>
    
</head>
<body>

    <!-- BUKID CRAFTS CENTER HEADER -->
    <div class="bukid-header">BUKID CRAFTS</div>

    <div class="text-center mt-3">
        <?php if(@$_GET['success'] == 'create') { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> The customer is created successfully.
            </div>
        <?php } ?>

        <?php if(@$_GET['error'] == 'wrong') { ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Wrong!</strong> The email and password you entered did not match our records. Please double-check and try again.
            </div>
        <?php } ?>
    </div>

    <div class="container">
        <div class="shadow-lg bg-white rounded testmarg">
            <form name="login" method="POST" action="verifloginc.php">
                <div class="text-center">
                    <h2>Log in</h2><br><br>
                </div>
                <span class="text-danger"><?= @$_GET['msg'] ?></span><br>
                <div>
                    <label for="email">Email</label><br>
                    <input class="form-control" type="text" name="email" placeholder="example@example.com" required><br>
                </div>
                <div>
                    <label for="mdp">Password</label><br>
                    <input class="form-control" type="password" name="mdp" placeholder="********" required><br>
                </div>
                <div class="mb-2">
                    <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="submit">Log in</button><br><br>
                </div>
                <p>New here? <a href="register.php">Sign up now »</a></p>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (required for alert close button) -->
    <script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="../bootstrap4/js/bootstrap.min.js"></script>
</body>
</html>
