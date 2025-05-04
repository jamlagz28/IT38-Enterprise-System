<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact | Bukid Crafts</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url("https://media.istockphoto.com/id/465559373/photo/old-wood-background.jpg?s=612x612&w=0&k=20&c=mQ5fJU_4IwgCB8VK6g551yNVzsQJn7ZYpI8Ua6TeC0I=");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.7);
            min-height: 100vh;
            padding: 50px 15px;
        }
        .contact-box {
            background-color: rgba(255, 255, 255, 0.95);
            color: #333;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 12px rgba(0,0,0,0.5);
        }
        h1 {
            color: #6c584c;
            font-weight: bold;
        }
        .form-group input,
        .form-group textarea {
            border-radius: 6px;
        }
        .form-group textarea {
            width: 100%;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="overlay">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 contact-box">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Get in Touch</h1>
                        <p>
                            Hi there, we are here to help you.<br>
                            Please feel free to contact us in case you have any queries regarding the products, payment, or order delivery.
                        </p>
                        <p>
                            We only accept prepaid orders to support safe, contactless transactions. Due to current events or unforeseen circumstances, your order might be slightly delayed — but rest assured, it's on the way!
                        </p>
                        <p>
                            For urgent queries, contact our customer service, or fill out the form and we’ll respond within 24 hours.
                        </p>
                        <img src="img/contact.png" class="img-fluid mt-3 rounded" alt="Contact Image">
                    </div>
                    <div class="col-md-6">
                        <h1>Contact Us</h1>
                        <form>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Your Name" class="form-control" required pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Your Email" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" rows="5" class="form-control" placeholder="Your message or address" required></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <hr>
                        <h1>Company Information</h1>
                        <p>Bukidnon, Philippines</p>
                        <p>Phone: +63 930 238 5479</p>
                        <p>Email: support@bukidcrafts.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
