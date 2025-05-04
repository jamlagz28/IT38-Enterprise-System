<?php
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
$user_id = $_SESSION['user_id'];
$item_ids_string = $_GET['itemsid'];

// Change status to 'Confirmed'
$query = "UPDATE user_item SET status=2 WHERE user_id=$user_id AND item_id IN ($item_ids_string) AND status=1";
mysqli_query($con, $query) or die($mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Confirmed | Bukid Crafts</title>
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
            font-family: 'Segoe UI', sans-serif;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        #confirmation-box {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 30px;
            border-radius: 10px;
            color: #fff;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.8);
            text-align: center;
        }

        #confirmation-box h4 {
            margin-bottom: 20px;
            color: #d4af7f;
        }

        #confirmation-box p {
            font-size: 16px;
        }

        #confirmation-box a {
            color: #a0e6a0;
            text-decoration: none;
            font-weight: bold;
        }

        #confirmation-box a:hover {
            text-decoration: underline;
        }

        #confirmation-box img {
            max-width: 120px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>

    <main>
        <div id="confirmation-box">
            <img src="img/thanks.jpg" alt="Thank You">
            <h4>Your order is confirmed.</h4>
            <p>Thank you for shopping with <strong>Bukid Crafts</strong>!</p>
            <hr style="border-color: #666;">
            <p>Click <a href="products.php">here</a> to purchase more handmade treasures.</p>
        </div>
    </main>

    <?php include("includes/footer.php"); ?>
</body>
</html>
