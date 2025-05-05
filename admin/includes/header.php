<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">

<!-- Custom CSS for Bukid Crafts Navbar -->
<style>
    body {
        font-family: 'Quicksand', sans-serif;
    }

    .navbar-custom {
        background-color: #4E3629; /* earthy brown */
        border: none;
        border-radius: 0;
        margin-bottom: 0;
    }

    .navbar-custom .navbar-brand {
        color: #FFD700 !important; /* gold */
        font-weight: 700;
        font-size: 24px;
    }

    .navbar-custom .navbar-brand:hover {
        color: #FFA500 !important; /* soft orange */
    }

    .navbar-custom .navbar-toggle {
        border-color: #FFD700;
    }

    .navbar-custom .icon-bar {
        background-color: #FFD700;
    }

    .navbar-custom .nav > li > a {
        color: #FFFFFF !important;
        font-weight: 500;
    }

    .navbar-custom .nav > li > a:hover {
        background-color: #5C4433 !important;
        color: #FFD700 !important;
    }

    .navbar-custom .glyphicon {
        margin-right: 5px;
    }
</style>

<!-- Header Navigation Bar -->
<div class="navbar navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Menu toggle for mobile -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="index.php">Bukid Crafts</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['email'])) { ?>
                    <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
                    <li><a href="settings.php"><span class="glyphicon glyphicon-user"></span>Settings</a></li>
                    <li><a href="orderhistory.php"><span class="glyphicon glyphicon-file"></span>Order History</a></li>
                    <li><a href="logout_script.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
                <?php } else { ?>
                    <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
                    <li><a href="aboutus.php"><span class="glyphicon glyphicon-tasks"></span>About Us</a></li>
                    <li><a href="contact.php"><span class="glyphicon glyphicon-phone"></span>Contact</a></li>
        
             
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
