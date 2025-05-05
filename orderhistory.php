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
    <title>Order History | Bukid Crafts</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-image: url('https://media.istockphoto.com/id/465559373/photo/old-wood-background.jpg?s=612x612&w=0&k=20&c=mQ5fJU_4IwgCB8VK6g551yNVzsQJn7ZYpI8Ua6TeC0I%3D&fbclid=IwY2xjawKCkpZleHRuA2FlbQIxMABicmlkETF0MDJRTm9ucEllOWtaSjRmAR4Vd-dN9VnMsLM5j7kZfmE3KHI1s_5RrcMHpSICu8u0agw1qmI4EZkAn_camg_aem_DxPHasBaCYMUapXISeMrJA');
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
        #order-history-container {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 30px;
            border-radius: 10px;
            color: #fff;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.8);
        }
        .centered-heading {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
            color: #fff;
        }
        .table-wrapper {
            display: flex;
            justify-content: center;
        }
        .table {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-radius: 5px;
        }
        .table th, .table td {
            color: #fff;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .btn-primary {
            background-color: #5cb85c;
            border-color: #4cae4c;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <div id="order-history-container">
            <h1 class="centered-heading">Order History</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item name</th>
                        <th>Price</th>
                        <th>Order & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0; // Fix: initialize total
                    $id = '';
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT items.price AS Price, items.id As id, items.name AS Name FROM user_item JOIN items ON user_item.item_id = items.id WHERE user_item.user_id='$user_id' and status=2";
                    $query1 = "SELECT user_item.date_time AS Timedate from user_item WHERE user_id='$user_id' and status=2";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));

                    if (mysqli_num_rows($result) >= 1) {
                        while ($row = mysqli_fetch_array($result)) {
                            $id .= $row["id"] . ", ";
                            echo '<tr><td><a href="order.php">'. $row["Name"] . "</a></td><td>₱ " . $row["Price"] . "</td>";
                            $total = $total + $row["Price"];

                            // show only one time per row (break inside loop)
                            if ($row1 = mysqli_fetch_array($result1)) {
                                echo "<td>" . $row1["Timedate"] . "</td></tr>";
                            } else {
                                echo "<td>-</td></tr>";
                            }
                        }
                        echo "<tr><td><strong>Total</strong></td><td><strong>₱ " . $total . "</strong></td><td></td></tr>";
                    } else {
                        echo "<tr><td colspan='3' class='text-center'>Sorry! No orders placed yet</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php include("includes/footer.php"); ?>
</body>
</html>
