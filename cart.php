<?php
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Cart | Bukid Crafts</title>
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
            font-family: Arial, sans-serif;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 15px;
        }

        #cart-container {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 30px;
            border-radius: 10px;
            color: #fff;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.8);
        }

        table {
            width: 100%;
        }

        th, td {
            padding: 12px;
            text-align: center;
            vertical-align: middle !important;
        }

        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .btn-primary {
            background-color: #5cb85c;
            border-color: #4cae4c;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #4cae4c;
        }

        .remove_item_link {
            color: #ff4d4d;
            text-decoration: none;
        }

        .remove_item_link:hover {
            text-decoration: underline;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .empty-msg {
            text-align: center;
            font-size: 18px;
            padding: 20px;
            color: #ccc;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <div id="cart-container">
            <h2>Your Cart</h2>
            <table class="table table-striped">
                <?php
                $sum = 0; $id = '';
                $user_id = $_SESSION['user_id'];
                $query = "SELECT items.price AS Price, items.id AS id, items.name AS Name 
                          FROM user_item 
                          JOIN items ON user_item.item_id = items.id 
                          WHERE user_item.user_id='$user_id' AND `status`=1";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));

                if (mysqli_num_rows($result) >= 1) {
                    ?>
                    <thead>
                        <tr>
                            <th>Item #</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            $sum += $row["Price"];
                            $id .= $row["id"] . ", ";
                            echo "<tr>
                                    <td>#{$row['id']}</td>
                                    <td>{$row['Name']}</td>
                                    <td>₱ {$row['Price']}</td>
                                    <td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'>Remove</a></td>
                                  </tr>";
                        }
                        $id = rtrim($id, ", ");
                        echo "<tr>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td><strong>₱ {$sum}</strong></td>
                                <td><a href='success.php?itemsid={$id}' class='btn btn-primary'>Confirm Order</a></td>
                              </tr>";
                        ?>
                    </tbody>
                    <?php
                } else {
                    echo "<tr><td colspan='4' class='empty-msg'>Your cart is currently empty. Start shopping and add your favorite items!</td></tr>";
                }
                ?>
            </table>
        </div>
    </main>

    <?php include("includes/footer.php"); ?>
</body>
</html>
