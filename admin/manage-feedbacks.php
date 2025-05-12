<?php
require("../includes/common.php");

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if admin is logged in
if (!isset($_SESSION['admin_email'])) {
    header('Location: ../admin/login-admin.php');
    exit();
}

// Fetch harsh words from the database
$query = "SELECT word FROM harsh_words";
$result = mysqli_query($con, $query);

$harsh_words = [];
while ($row = mysqli_fetch_assoc($result)) {
    $harsh_words[] = $row['word'];
}

// Fetch feedback data
$query = "SELECT feedback.id, feedback.user_id, feedback.product_id, feedback.rating, feedback.comment, feedback.created_at, feedback.responded, users.email AS user_email, items.name AS product_name 
          FROM feedback 
          INNER JOIN users ON feedback.user_id = users.id 
          INNER JOIN items ON feedback.product_id = items.id
          ORDER BY feedback.created_at DESC";
$result = mysqli_query($con, $query);

// Handle the response action
if (isset($_POST['respond_feedback'])) {
    $feedback_id = $_POST['feedback_id'];
    // Logic to mark feedback as responded
    $update_query = "UPDATE feedback SET responded = 1 WHERE id = '$feedback_id'";
    mysqli_query($con, $update_query);
    $response_message = "Thank you for your feedback!";
}

// Handle delete action (for only deleting the response from the page)
if (isset($_POST['delete_feedback'])) {
    $feedback_id = $_POST['feedback_id'];
    // Delete the response (set 'responded' to 0)
    $delete_response_query = "UPDATE feedback SET responded = 0 WHERE id = '$feedback_id'";
    mysqli_query($con, $delete_response_query);
    $delete_message = "Feedback response has been deleted.";
}

// Handle feedback submission and check for inappropriate content
function contains_harsh_word($feedback_comment, $harsh_words) {
    foreach ($harsh_words as $word) {
        if (stripos($feedback_comment, $word) !== false) {
            return true;
        }
    }
    return false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Feedbacks | Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #f9f9f9;
            padding-top: 60px;
        }

        .feedback-table-container {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin: 30px auto;
        }

        h3 {
            font-weight: 700;
            margin-bottom: 20px;
        }

        table th {
            background-color: #4E3629;
            color: white;
        }

        table td {
            background-color: #fefefe;
            vertical-align: middle;
        }

        .btn-view {
            background-color: #28a745;
            color: white;
            font-weight: bold;
        }

        .btn-view:hover {
            background-color: #218838;
        }

        .btn-respond {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .btn-respond:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            font-weight: bold;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<?php include("../includes/admin-header.php"); ?>

<div class="container feedback-table-container">
    <h3 class="text-center">Manage Feedbacks</h3>

    <?php if (isset($response_message)) { ?>
        <div class="alert alert-success"><?php echo $response_message; ?></div>
    <?php } ?>

    <?php if (isset($delete_message)) { ?>
        <div class="alert alert-danger"><?php echo $delete_message; ?></div>
    <?php } ?>

    <table class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>User Email</th>
                <th>Product Name</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Date Submitted</th>
                <th>Feedback/Thank You</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { 
                $contains_harsh_word = contains_harsh_word($row['comment'], $harsh_words);
            ?>
                <tr id="feedback-<?php echo $row['id']; ?>">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                    <td><?php echo $row['rating']; ?> &#9733;</td>
                    <td><?php echo htmlspecialchars($row['comment']); ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td>
                        <?php if (!isset($row['responded']) || $row['responded'] == 0) { ?>
                            <form method="POST">
                                <input type="hidden" name="feedback_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="respond_feedback" class="btn btn-respond btn-sm">Respond (Thank You)</button>
                            </form>
                        <?php } else { ?>
                            <span>Thank You for your feedback!</span>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if ($contains_harsh_word) { ?>
                            <!-- Display Delete Response Button for inappropriate feedback -->
                            <form method="POST" class="delete-form">
                                <input type="hidden" name="feedback_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete_feedback" class="btn btn-delete btn-sm">Delete Response</button>
                            </form>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("../includes/footer.php"); ?>

<script>
    // Handle Delete Response button click without page reload
    $(document).ready(function() {
        $('.delete-form').on('submit', function(e) {
            e.preventDefault();
            var feedbackId = $(this).find('input[name="feedback_id"]').val();
            var row = $('#feedback-' + feedbackId);

            $.ajax({
                type: 'POST',
                url: '', // The current page URL
                data: {
                    delete_feedback: true,
                    feedback_id: feedbackId
                },
                success: function(response) {
                    row.find('td:nth-child(7)').html(''); // Remove the feedback text
                    row.find('td:nth-child(8)').html(''); // Remove the Delete button
                    row.find('td:nth-child(7)').html('<span>Response deleted</span>'); // Optionally, add a text indicating deletion
                    alert('Response deleted successfully!');
                },
                error: function() {
                    alert('An error occurred while deleting the response.');
                }
            });
        });
    });
</script>

</body>
</html>
