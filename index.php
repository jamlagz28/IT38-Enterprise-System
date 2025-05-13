<?php
require "client/class/dbconnect.class.php";
session_start();

$rq = "SELECT * FROM produits ORDER BY pid LIMIT 10";
$db = new BasesDonnees;
$pr = $db->connectDB(); 
$result = $pr->prepare($rq);
$result->execute();
$data = $result->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bukidcraft</title>
    <meta name="description" content="Resto">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Josefin+Sans:300,400,700">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

        <script src="https://use.fontawesome.com/5b67370c4c.js"></script>


        

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">



</head>

<body id="Index" data-spy="scroll" data-target="#navbar" class="static-layout">
    <div id="side-nav" class="sidenav">
        <a href="javascript:void(0)" id="side-nav-close">&times;</a>

        <div class="sidenav-content">
            <p>
                Kuncen WB1, Wirobrajan 10010, DIY
            </p>
            <p>
                <span class="fs-16 primary-color">(+216) 52 450 636</span>
            </p>
            <p>info@yourdomain.com</p>
        </div>
    </div>
    <div id="side-search" class="sidenav">
        <a href="javascript:void(0)" id="side-search-close">&times;</a>
        <div class="sidenav-content">
            <form action="">

                <div class="input-group md-form form-sm form-2 pl-0">
                    <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="input-group-text red lighten-3" id="basic-text1">
                            <i class="fas fa-search text-grey" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </form>
        </div>


    </div>
    <div id="canvas-overlay"></div>
    <div class="boxed-page">
        <nav id="navbar-header" class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand navbar-brand-center d-flex align-items-center p-0 only-mobile" href="/">
                    <img src="img/logo.jpg" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="lnr lnr-menu"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex justify-content-between">
                        <li class="nav-item only-desktop">
                            <a class="nav-link" id="side-nav-open" href="#"></a>
                        </li>
                        <div class="d-flex flex-lg-row flex-column">
                            <li class="nav-item active mr-5">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item mr-5">
                                <a class="nav-link" href="#about">About</a>
                            </li>

                        </div>
                    </ul>

                    <a class="navbar-brand navbar-brand-center d-flex align-items-center only-desktop" href="index.php">
                        <img src="img/logo.png" alt="">
                    </a>
                    <ul class="navbar-nav d-flex justify-content-between">
                        <div class="d-flex flex-lg-row flex-column">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Menu
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="breakfast.php">Weaving</a>
                                    <a class="dropdown-item" href="lundin.php">Wood Carving</a>
                                </div>
                            </li>
                            <?php 
                            if(isset($_SESSION['name'])){
                            ?>

                            <li class="nav-item">
                            <img src="client/<?php echo $_SESSION['img']; ?>"  style="width:40px; height:40px; border-radius:50%;">
                            </li>
                            
                            <li class="nav-item">
                                <a href="client/profil.php" class="nav-link"><?php echo $_SESSION['name']; ?></a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="client/logout.php?logout">Logout</a>
                            </li>
                            <li class="nav-item ml-5">
                            
                                <a href="listepanier.php" class="btn btn-outline-danger">
                                 
                                    <i class="fa fa-shopping-cart"style="opacity:1"></i>
                                    &nbsp;&nbsp;<span class="badge badge-sm-light" id="success"></span>
                                </a>
                            </li>
                            <?php }else {?>

                           

                            <li class="nav-item">
                                <a class="nav-link" href="client/loginc.php">Login</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="client/register.php">Sign Up</a>
                            </li>
                            
                            <li class="nav-item ml-5">
                            <style>
                                .btn-outline-danger:hover {
                                    color:white !important;
                                }
                            </style>
                                <li class="nav-item ml-5">
    <a href="listepanier.php" class="btn btn-outline-danger">
        <i class="fa fa-shopping-cart" style="opacity:1"></i>
        &nbsp;&nbsp;<span class="badge badge-sm-light"><?php echo isset($_SESSION['badge']) ? $_SESSION['badge'] : 0; ?></span>
    </a>
</li>
                            </li>

                            <?php } ?>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="hero">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 hero-left">
                        <h1 class="display-4 mb-5"> Crafts made <br> in Bukidnon!</h1>
                        <div class="mb-2">
                            <a class="btn btn-primary btn-shadow btn-lg" href="lundin.php" role="button">View Items</a>

                        </div>

                        <ul class="hero-info list-unstyled d-flex text-center mb-0">
                            <li class="border-right">
                                <span class="lnr lnr-store"></span>
                                <h5>
                                    Discover Crafts
                                </h5>
                            </li>
                            <li class="border-right">
                                <span class="lnr lnr-cart"></span>
                                <h5>
                                    Order Crafts
                                </h5>
                            </li>
                            <li class="">
                                <span class="lnr lnr-car"></span>
                                <h5>
                                    Fast Delivery
                                </h5>
                            </li>
                        </ul>

                    </div>
                    <div class="col-lg-6 hero-right">
                        <div class="owl-carousel owl-theme hero-carousel">
                        <div class="item">
                                <img class="img-fluid" src="img/craft2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="img/craft1.png" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="img/Weav4.png" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="img/weav9.png" alt="">
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<!-- Welcome Section -->
<section id="gtco-welcome" class="bg-white section-padding">
    <div class="container">
        <div class="section-content">
            <div id="about" style="text-align: center; padding: 50px 0;">
                <h2 style="margin-top: 10px; font-size: 2rem;">Welcome to Bukidcraft</h2>
                <p style="font-size: 1.1rem; line-height: 1.6; max-width: 800px; margin: 0 auto;">
                We proudly bring you closer to the rich culture and craftsmanship of Bukidnon. Bukid Craft is more than just a platform—it’s a digital space where tradition meets innovation. Here, local artisans showcase their handmade creations, and you get to explore, support, and celebrate authentic heritage crafts. Whether you're a customer, artisan, or partner, we welcome you to join us in preserving culture, empowering communities, and promoting sustainable livelihoods through technology.
                </p>
            </div>
        </div>
    </div>
</section>





        <!-- End of Welcome Section -->
        <!-- Special Dishes Section -->
        <section id="gtco-special-dishes" class="bg-grey section-padding">
    <div class="container">
        <div class="section-content">
            <div class="heading-section text-center">
                <span class="subheading">
                    Popular Craft of the Month
                </span>
                <h3>
                    Easiest way to order hand made crafts
                </h3>
            </div>
            <div class="row mt-5">
                <div class="col-lg-5 col-md-6 align-self-center py-5">
                    <div class="dishes-text">
                        <h4>Bulul</h4>
                        <p class="pt-3">Bulul sculptures, particularly those of the farmer people in the Philippines, are carved wooden figures that act as granary idols. 
                            They are believed to be guardian spirits, protecting the rice crops and ensuring a good harvest. 
                            Bululs are also seen as representations of ancestors and can be activated through rituals. </p>
                        <h3 class="special-dishes-price">₱499.00</h3>
                        <a href="lundin.php" class="btn-primary mt-3">Order Now</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center mt-4 mt-md-0">
                    <img src="img/craft2.jpg" alt="" class="img-fluid shadow w-100">
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-5 col-md-6 align-self-center py-5">
                    <div class="dishes-text">
                        <h4>Rattran Basket</h4>
                        <p class="pt-3">Rattan is both economical and ecological, protecting forestland by providing an alternative to loggers. 
                            Rattan has been used for centuries for making furniture and baskets and is best known for its lightweight and durable qualities. 
                            These baskets are individually hand woven using lightweight, smooth, and uncoated rattan and are designed in uniform dimensions.</p>
                        <h3 class="special-dishes-price">₱199.00</h3>
                        <a href="breakfast.php" class="btn-primary mt-3">Order Now</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center mt-4 mt-md-0">
                    <img src="img/weav9.png" alt="" class="img-fluid shadow w-100">
                </div>
            </div>      
        </div>
    </div>
</section>
        <!-- End of Special Dishes Section -->

        <section id="why-choose-us" class="bg-white section-padding">
    <div class="container">
        <div class="section-content">
            <div class="heading-section text-center">
                <h2>Why buy from us?</h2>
                <p>Our platform connects you with local artisans, ensuring that you receive authentic and high-quality crafts.</p>
            </div>
            <div class="row text-center">
                <!-- Fresh Ingredients -->
                <div class="col-md-3">
                    <div class="feature-box">
                        <span class="lnr lnr-leaf" style="font-size: 3rem; color: #28a745;"></span>
                        <h4>Natural Materials</h4>
                        <p>We use only the freshest and highest quality materials.</p>
                    </div>
                </div>
                <!-- Friendly Service -->
                <div class="col-md-3">
                    <div class="feature-box">
                        <span class="lnr lnr-smile" style="font-size: 3rem; color: #ffb81c;"></span>
                        <h4>Friendly Service</h4>
                        <p>Experience warm and welcoming customer service.</p>
                    </div>
                </div>
                <!-- Exceptional Craftsmanship -->
                <div class="col-md-3">
                    <div class="feature-box">
                        <span class="lnr lnr-heart" style="font-size: 3rem; color: #e74c3c;"></span>
                        <h4>Exceptional Craftsmanship</h4>
                        <p>Enjoy the craftsmanship of our artisan products with every purchase.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



        <!-- Menu Section -->
        <section id="gtco-menu" class="section-padding">
            <div class="container">
                <div class="section-content">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="heading-section text-center">
                                <span class="subheading">
                                    Experience the bukidcrafts
                                </span>
                                <h3>
                                    Artisan's best crafts
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php 
                    while ($data = $result->fetch()) {
                    ?>
                        <div class="col-lg-4 menu-wrap">
                            <div class="menus d-flex align-items-center">
                                <div class="menu-img rounded-circle">
                                    <img class="img-fluid" src="admin/uploads/<?php echo $data['file'] ?>" alt="">
                                </div>
                                <div class="text-wrap">
                                    <div class="row align-items-start">
                                        <div class="col-8">
                                            <h4><a href="prod_detail.php?id=<?php echo $data['pid'] ?>"><?php echo $data['name'] ?></a></h4>
                                        </div>                              
                                    </div>
                                    <p><?php echo $data['description']?></p>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                    <div class="d-flex justify-content-around">
                        <a href="breakfast.php" class="btn-primary mt-3">Weaving</a>
                        <a href="lundin.php" class="btn-primary mt-3">Wood Carving</a>
                    </div>

                </div>
            </div>            
        </section>
        <!-- End of menu Section -->       

<!-- Customer Reviews Section -->
<section id="gtco-reviews" class="bg-light section-padding">
    <div class="container">
        <div class="section-content text-center">
            <h2 class="mb-5">Hear from Our Happy Customers</h2>
            <div class="row">
                <!-- Customer Review 1 -->
                <div class="col-md-4">
                    <div class="review-box">
                        <p class="review-text">"The food is absolutely delicious! I ordered the Batchoy, and it was perfect. Delivery was fast too!"</p>
                        <p class="customer-name">- John D.</p>
                    </div>
                </div>
                <!-- Customer Review 2 -->
                <div class="col-md-4">
                    <div class="review-box">
                        <p class="review-text">"Amazing flavors! The Pancit Bihon was just like my grandma used to make. Will definitely order again."</p>
                        <p class="customer-name">- Oscar B.</p>
                    </div>
                </div>
                <!-- Customer Review 3 -->
                <div class="col-md-4">
                    <div class="review-box">
                        <p class="review-text">"Super impressed by the quality and taste of the food. A must-try for anyone craving Filipino dishes!"</p>
                        <p class="customer-name">- Dave T.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Customer Reviews Section -->


         <!-- Footer Section -->
         <footer class="mastfoot pb-5 bg-white section-padding pb-0">
    <div class="inner container">
        <div class="row">
            <!-- Address Section -->
            <div class="col-lg-4">
                <div class="footer-widget px-lg-5 px-0">
                    <h4 class="footer-title">Our Address</h4>
                    <p><span class="lnr lnr-map-marker"></span> Grove Street, Manolo Fortich, Bukidnon</p>
                </div>
            </div>

            <!-- Open Hours Section -->
            <div class="col-lg-4">
                <div class="footer-widget px-lg-5 px-0">
                    <h3 class="footer-title">Open Hours</h3>
                    <ul class="list-unstyled footer-table-info">
                        <li><i class="uil uil-clock"></i> Mon-Thurs: 8:00 AM - 10:00 PM</li>
                        <li><i class="uil uil-clock"></i> Fri-Sun: 10:00 AM - 10:00 PM</li>
                    </ul>
                </div>
            </div>

            <!-- Cash on Delivery Section -->
            <div class="col-lg-4">
                <div class="footer-widget pl-lg-5 pl-0 position-relative">
                    <h4 class="d-inline-block">
                        <span class="lnr lnr-credit-card position-absolute" style="font-size: 1.5rem; left: -35px; top: 0;"></span>
                        Cash on Delivery
                    </h4>
                    <p>Enjoy the convenience of paying when your order arrives at your doorstep.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

    <!-- External JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="vendor/bootstrap/popper.min.js"></script>
    <script src="vendor/bootstrap/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js "></script>
    <script src="vendor/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js"></script>
    <script src="vendor/stellar/jquery.stellar.js" type="text/javascript" charset="utf-8"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Main JS -->
    <script src="js/app.min.js "></script>
</body>

</html