<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us | Bukid Crafts</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url("https://media.istockphoto.com/id/465559373/photo/old-wood-background.jpg?s=612x612&w=0&k=20&c=mQ5fJU_4IwgCB8VK6g551yNVzsQJn7ZYpI8Ua6TeC0I=");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.7);
            min-height: 100vh;
            padding: 60px 15px;
        }
        .content-box {
            background-color: rgba(255, 255, 255, 0.95);
            color: #333;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.4);
        }
        h3 mark, h4 mark {
            background-color: #6c584c;
            color: white;
            padding: 3px 6px;
            border-radius: 4px;
        }
        ul {
            padding-left: 18px;
        }
        li {
            margin-bottom: 10px;
        }
        img.team-img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<?php include 'includes/header.php'; ?>

<div class="overlay">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 content-box">
                <div class="row">
                    <div class="col-md-5">
                        <img src="img/team1.jpg" alt="Our Team" class="team-img">
                    </div>
                    <div class="col-md-7">
                        <h3><mark>WHO WE ARE</mark></h3>
                        <p>
                            Bukid Crafts is a recognized leader in the ecommerce industry, with a steadfast commitment to success and a tradition of excellence. Founded in 2015 by Vishwadutt M S, the company began with just one employee and now proudly supports over 10,000 staff and thousands of customers.
                        </p>
                        <p>
                            Guided by customer obsession, innovation, operational excellence, and long-term thinking, Bukid Crafts strives to make a difference in how local crafts reach the world.
                        </p>
                        <h4><mark>Vision</mark></h4>
                        <p>To make the world a more stylish, colorful, and happier place.</p>
                        <h4><mark>Mission</mark></h4>
                        <p>To offer our customers the best value, widest selection, and most convenient experience possible.</p>
                    </div>
                </div>
                <hr>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h3><mark>BUILDING THE FUTURE</mark></h3>
                        <p>
                            We strive to positively impact customers, employees, communities, and the economy. As passionate builders, we constantly innovate and improve on behalf of our stakeholders. Our growth strategies include:
                        </p>
                        <ul>
                            <li><strong>Market Development:</strong> Entry and growth in new markets.</li>
                            <li><strong>Market Penetration:</strong> Increase revenue in current markets.</li>
                            <li><strong>Product Development:</strong> Launch new products for more value.</li>
                            <li><strong>Diversification:</strong> Expand into new business areas.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
