<?php 
session_start(); 
if (!isset($_SESSION['name']) || $_SESSION['name'] == "") {
    header('location:../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bukid Crafts - Profile</title>
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/loginc.css" class="css">
    <link rel="stylesheet" href="../css/style.css" class="css">
    <style>
        body {
            background-image: url('https://media.istockphoto.com/id/465559373/photo/old-wood-background.jpg?s=612x612&w=0&k=20&c=mQ5fJU_4IwgCB8VK6g551yNVzsQJn7ZYpI8Ua6TeC0I%3D');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .testmarg {
            margin-top: 6%;
            padding: 40px;
            border-radius: 20px;
        }

        h2 {
            font-weight: bold;
            color: #343a40;
        }

        .form-group label {
            font-weight: 500;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-shadow {
            box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .text-danger {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="shadow-lg bg-white rounded testmarg">
            <form action="edit.php" method="POST" enctype="multipart/form-data">
                <div class="text-center">
                    <h2>Modify Your Account</h2>
                    <br><br>
                </div>

                <div class="form-group">
                    <label for="nom">Name</label>
                    <input 
                        type="text" 
                        name="nom" 
                        placeholder="Your name*" 
                        value="<?= htmlspecialchars($_SESSION['name']) ?>" 
                        class="form-control" 
                        required
                    >
                    <span class="text-danger"><?= @$_GET['name_error']; ?></span>
                </div>

                <div class="form-group">
                    <label for="tel">Phone</label>
                    <input 
                        type="text" 
                        name="tel" 
                        placeholder="Your phone*" 
                        value="<?= htmlspecialchars($_SESSION['tel']) ?>" 
                        class="form-control" 
                        required
                    >
                    <span class="text-danger"><?= @$_GET['tel_error']; ?></span>
                </div>

                <div class="form-group">
                    <label for="adresse">Address</label>
                    <input 
                        type="text" 
                        name="adresse" 
                        placeholder="Your address*" 
                        value="<?= htmlspecialchars($_SESSION['adr']) ?>" 
                        class="form-control" 
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="mdp">Password</label>
                    <input 
                        type="password" 
                        name="mdp" 
                        placeholder="Password*" 
                        class="form-control"
                    >
                    <span class="text-danger"><?= @$_GET['mdp1_error']; ?></span>
                </div>

                <div class="form-group">
                    <label for="mdp2">Confirm Password</label>
                    <input 
                        type="password" 
                        name="mdp2" 
                        placeholder="Confirm Password*" 
                        class="form-control"
                    >
                    <span class="text-danger"><?= @$_GET['mdp2_error']; ?></span>
                </div>

                <div class="form-group">
                    <label for="profpic">Profile Picture</label>
                    <input 
                        type="file" 
                        name="profpic" 
                        class="form-control"
                    >
                </div>

                <div class="text-center">
                    <button 
                        type="submit" 
                        name="update" 
                        class="btn btn-primary btn-shadow btn-lg"
                    >
                        Submit
                    </button>
                </div>
                <br>
            </form>
        </div>
    </div>

    <script src="../bootstrap4/js/bootstrap.min.js"></script>
</body>
</html>
