<?php
// establish the connection to database, and start the session
require("includes/common.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | Bukid Crafts</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;500&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('https://media.istockphoto.com/id/465559373/photo/old-wood-background.jpg?s=612x612&w=0&k=20&c=mQ5fJU_4IwgCB8VK6g551yNVzsQJn7ZYpI8Ua6TeC0I%3D');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding-top: 50px;
            color: #fff;
        }

        #banner_image {
            background-color: rgba(0, 0, 0, 0.65);
            padding: 80px 0;
            text-align: center;
        }

        #banner_content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            color: #f5e9d6;
        }

        #banner_content p {
            font-size: 18px;
            color: #f2f2f2;
        }

        .btn-custom {
            background-color: #8B4513;
            border-color: #8B4513;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #5c3317;
            border-color: #5c3317;
        }

        .caption h3 {
            font-weight: 600;
            color: #fff;
        }

        .caption p {
            color: #e0e0e0;
        }

        .thumbnail {
            background-color: rgba(0, 0, 0, 0.6);
            border: none;
            border-radius: 10px;
        }

        .thumbnail img {
            border-radius: 10px 10px 0 0;
        }

        .container h2 {
            font-family: 'Playfair Display', serif;
            margin-top: 30px;
            margin-bottom: 30px;
            text-align: center;
            color: #f8f8f8;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- Header end -->

    <div id="content">
        <!-- Main banner image -->
        <div id="banner_image">
            <div class="container">
                <div id="banner_content">
                    <h1>Discover Authentic Bukid Crafts</h1>
                    <p>Flat 40% OFF on authentic handmade products</p>
                    <br/>
                    <a 
                        href="<?php echo isset($_SESSION['email']) ? 'products.php' : 'login.php'; ?>" 
                        class="btn btn-custom btn-lg"
                    >
                        Shop Now
                    </a>
                </div>
            </div>
        </div>
        <!-- Main banner image end -->

        <!-- Item categories listing -->
        <div class="container">
            <h2>Bukidnon Handicrafts Categories</h2>
            <div class="row text-center" id="item_list">
                <div class="col-sm-4">
                    <a href="products.php#bags">
                        <div class="thumbnail">
                            <img src="img/1.jpg" alt="Crafted Bags">
                            <div class="caption">
                                <h3>Weaving and Textiles</h3>
                                <p>Traditional fabrics woven by Bukidnon artisans, crafted with intricate patterns and vibrant native dyes.</p>
                            </div>
                        </div> 
                    </a>
                </div>

                <div class="col-sm-4">
                    <a href="products.php#accessories">
                        <div class="thumbnail">
                            <img src="img/bamboo.jpg" alt="Beaded Accessories">
                            <div class="caption">
                                <h3>Woodcraft and Bamboo</h3>
                                <p>Hand-carved home decor and functional items crafted by local artisans using sustainable wood and bamboo.</p>
                            </div>
                        </div> 
                    </a>
                </div>

                <div class="col-sm-4">
                    <a href="products.php#shirts">
                        <div class="thumbnail">
                            <img src="img/bead.jpg" alt="Handmade Shirts">
                            <div class="caption">
                                <h3>Beadwork and Accessories</h3>
                                <p>Intricately crafted bead accessories made by Bukidnon artisans, showcasing vibrant patterns and cultural heritage.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- Item categories listing end -->
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- Footer end -->
</body> 
</html>
