<?php
require("includes/common.php");

if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get selected products
    $product_ids = isset($_POST['product_ids']) ? $_POST['product_ids'] : [];
    $rating = mysqli_real_escape_string($con, $_POST['rating']);
    $comment = mysqli_real_escape_string($con, $_POST['comment']);

    if (!empty($product_ids)) {
        foreach ($product_ids as $product_id) {
            $product_id = mysqli_real_escape_string($con, $product_id);

            // Check if feedback already exists for this product by the user
            $check_query = "SELECT * FROM feedback WHERE user_id = $user_id AND product_id = $product_id";
            $check_result = mysqli_query($con, $check_query);

            if (mysqli_num_rows($check_result) == 0) {
                // Insert feedback if not already submitted
                $query = "INSERT INTO feedback (user_id, product_id, rating, comment, created_at) 
                          VALUES ($user_id, $product_id, $rating, '$comment', NOW())";
                mysqli_query($con, $query) or die(mysqli_error($con));
            } else {
                echo "<script>alert('You have already submitted feedback for this product.');</script>";
            }
        }
        
        echo "<script>alert('Feedback submitted successfully!'); window.location.href='products.php';</script>";
        exit();
    } else {
        echo "<script>alert('Please select at least one product.');</script>";
    }
}

// Fetch confirmed (ordered) products for checkboxes
$product_query = "SELECT items.id, items.name FROM user_item 
                  INNER JOIN items ON user_item.item_id = items.id 
                  WHERE user_item.user_id = $user_id AND user_item.status = 2";
$product_result = mysqli_query($con, $product_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Send Feedback | Bukid Crafts</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #f4f4f4;
            padding-top: 60px;
        }
        .feedback-box {
            max-width: 600px;
            margin: 30px auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }
        .rating input {
            display: none;
        }
        .rating label {
            font-size: 25px;
            color: #ccc;
            float: right;
            cursor: pointer;
        }
        .rating input:checked ~ label,
        .rating label:hover,
        .rating label:hover ~ label {
            color: #FFD700;
        }
        textarea {
            resize: none;
        }
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>

    <div class="container feedback-box">
        <h3 class="text-center">Send Feedback</h3>
        <form method="POST" action="send-feedback.php">
            <div class="form-group">
                <label>Select Product(s):</label><br>
                <?php while ($row = mysqli_fetch_assoc($product_result)) { ?>
                    <input type="checkbox" name="product_ids[]" value="<?php echo $row['id']; ?>" id="product_<?php echo $row['id']; ?>">
                    <label for="product_<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></label><br>
                <?php } ?>
            </div>

            <div class="form-group">
                <label>Rate the Product:</label>
                <div class="rating">
                    <input type="radio" name="rating" id="star5" value="5" required><label for="star5">&#9733;</label>
                    <input type="radio" name="rating" id="star4" value="4"><label for="star4">&#9733;</label>
                    <input type="radio" name="rating" id="star3" value="3"><label for="star3">&#9733;</label>
                    <input type="radio" name="rating" id="star2" value="2"><label for="star2">&#9733;</label>
                    <input type="radio" name="rating" id="star1" value="1"><label for="star1">&#9733;</label>
                </div>
            </div>

            <div class="form-group">
                <label for="comment">Your Feedback:</label>
                <textarea name="comment" id="comment" rows="4" class="form-control" placeholder="Write your thoughts here..." required></textarea>
            </div>

            <button type="submit" class="btn btn-success btn-block">Submit Feedback</button>
        </form>
    </div>

    <?php include("includes/footer.php"); ?>
</body>
</html>
