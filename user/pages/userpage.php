<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bukid Crafts - User Page</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="logo">🟠 BUKID CRAFTS</div>
      <nav>
        <h4>Menu</h4>
        <ul>
          <li><a href="#">Dashboard</a></li>
          <li><a href="#">Account</a></li>
          <li><a href="#">Write a Review</a></li>
        </ul>
        <h4>Others</h4>
        <ul>
          <li><a href="#">Settings</a></li>
          <li class="active"><a href="#">Payment</a></li>
          <li><a href="#">Delivery</a></li>
          <li><a href="#">Help</a></li>
        </ul>
      </nav>
    </aside>

    <main class="content">
      <header class="header">
        <input type="text" placeholder="Search...">
        <div class="user-info">👤 <?= htmlspecialchars($_SESSION['username']) ?></div>
      </header>

      <section class="items-grid">
        <div class="item-card">Item name<br><small>Item description</small><span>PHP 000</span></div>
        <div class="item-card">Item name<br><small>Item description</small><span>PHP 000</span></div>
        <div class="item-card">Item name<br><small>Item description</small><span>PHP 000</span></div>
        <div class="item-card">Item name<br><small>Item description</small><span>PHP 000</span></div>
      </section>

      <section class="details">
        <div class="most-viewed">
          <h3>Most Viewed Items</h3>
          <p>The most ordered handicrafts from Bukidnon</p>
          <ul>
            <li>🧶 Tikog Mats - PHP 400</li>
            <li>🧵 Sudsud Mats - PHP 500</li>
            <li>👜 Pandan Woven Bags - PHP 300</li>
            <li>👝 Banig Wallets - PHP 150</li>
          </ul>
        </div>

        <div class="item-preview">
          <div class="preview-box">Image</div>
          <div class="item-info"> 
            <div class="item-text">
                <h4>Item name</h4>
                <p>PHP: 0000</p>
                <h5>Description</h5>
                <p>Item description goes here...</p>
                <button class="item-info button">BUY 🛒</button>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</body>
</html>
