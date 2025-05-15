<?php
require 'dash_classes/product.class.php';
session_start();
if(isset($_SESSION['email']) == ""){
  header('location:../login_to_admin_panel/admin.php');
}

$prod = new Produit;
$res  = $prod->getone_product($_GET['id']);
$data = $res->fetch();

?>
<html>
    <head>
    <title>Products</title>
    <link rel="stylesheet" href="../../bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/loginc.css" class="css">
    <link rel="stylesheet" href="../../css/style.css" class="css">

       <style>
        body {
            background-image: url('https://media.istockphoto.com/id/465559373/photo/old-wood-background.jpg?s=612x612&w=0&k=20&c=mQ5fJU_4IwgCB8VK6g551yNVzsQJn7ZYpI8Ua6TeC0I%3D');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }
    </style>

    </head>
    <body>
   

      <div class="container">
      <div class="shadow-lg bg-white rounded testmarg">
      <form action="up.php?id=<?php echo $_GET['id'];?>" method="POST" enctype="multipart/form-data">
      <div class="text-center">

          <h1>Update Product</h1><br><br>
          </div>
            <div class="form-group">
            <label for="name"> Name </label>
            <input type="text" name="name" placeholder="prod name" value="<?php echo $data['name'];?>"class="form-control" required> 
            </div>

            <div class="form-group">
            <label for="price"> Price </label>
            <input type="number" name="price" placeholder="Product Price" value="<?php echo $data['price'];?>" id="price" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label-group" for="desc"> Description </label>
                <textarea name="desc" id="desc" cols="60" rows="10" placeholder="Description" ><?php echo $data['description'];?></textarea>
            </div>
    


        <div>
            <button  type="submit" name="submit" class="btn btn-primary btn-shadow btn-lg mt-3" >update</button>&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            </form>
      </div>
      </div>
      <script src="../../bootstrap4/js/bootstrap.min.js"></script>
            </body>
</html>