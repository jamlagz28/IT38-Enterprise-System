<?php
require "panier/classes/pnaier.class.php";
session_start();

if (empty($_SESSION['name'])) {
    header('location:client/loginc');
    exit();
}

$panier = new Panier;
$res = $panier->whatinpanier();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Three Guys - Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Links -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Fonts and Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .table td, .table th {
            vertical-align: middle !important;
        }

        .media-heading {
            font-weight: 600;
            font-size: 1.1rem;
        }

        input.form-control {
            max-width: 70px;
            margin: 0 auto;
            text-align: center;
        }

        .thumbnail img {
            border-radius: 8px;
        }

        .sticky-footer {
            position: sticky;
            bottom: 0;
            background-color: #f9f9f9;
            padding: 1rem;
            border-top: 1px solid #ddd;
            z-index: 1000;
        }

        .btn-outline-danger:hover {
            color: #fff !important;
            background-color: #dc3545;
        }

        .btn-success {
            background-color: #0066b2;
            border-color: #0066b2;
        }

        .btn-success:hover {
            background-color: #034694;
            border-color: #034694;
        }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <h2 class="mb-4">Your Shopping Cart</h2>

    <div class="table-responsive">
        <table class="table table-hover shadow-sm">
            <thead class="thead-light">
                <tr>
                    <th>Product</th>
                    <th style="width: 100px;">Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_prix = 0;
                if ($res->rowCount() > 0):
                    while ($data = $res->fetch()):
                        $total_prix += $data['price'];
                ?>
                <tr>
                    <td>
                        <div class="media">
                            <img src="admin/uploads/<?php echo $data['file'] ?>" class="mr-3" style="width: 50px; height: 50px;">
                            <div class="media-body">
                                <h5 class="media-heading"><?php echo $data['name'] ?></h5>
                            </div>
                        </div>
                    </td>
                    <td>
                        <form method="post" action="updateqty.php">
                            <input type="hidden" name="pid" value="<?php echo $data['pid']; ?>">
                            <input type="number" name="qty" class="form-control" value="<?php echo $data['qty']; ?>" min="1">
                            <button type="submit" class="btn btn-sm btn-info mt-1">Update</button>
                        </form>
                    </td>
                    <td class="text-center">₱ <strong><?php echo $data['price']; ?></strong></td>
                    <td class="text-center">

                        <a href="deletepanier.php?id=<?php echo $data['id'] ?>" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>


                    </td>
                </tr>
                <?php endwhile; else: ?>
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">Your cart is currently empty.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if ($res->rowCount() > 0): ?>
    <div class="sticky-footer">
        <h5>Shipping: <span class="text-success">Free</span></h5>
        <h3>Total: ₱ <?php echo $total_prix; ?></h3>
        <p class="mb-3">Payment: Cash on Delivery</p>
        <a href="index.php" class="btn btn-outline-secondary">Continue Shopping</a>
        <a href="javascript:void(0)" class="btn btn-success ml-2" data-toggle="modal" data-target="#checkoutModal">
            Checkout
        </a>
    </div>
    <?php else: ?>
    <div class="sticky-footer">
        <a href="index.php" class="btn btn-outline-primary w-100">Go Back to Shop</a>
    </div>
    <?php endif; ?>
</div>

<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="checkoutModalLabel">Confirm Checkout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success mb-3" style="font-size: 2rem;"></i><br>
        Are you sure you want to proceed to checkout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="checkout.php" class="btn btn-success">Yes, Proceed</a>
      </div>
    </div>
  </div>
</div>

<!-- JS Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="vendor/bootstrap/popper.min.js"></script>
<script src="vendor/bootstrap/bootstrap.min.js"></script>

</body>
</html>
