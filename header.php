<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paint Cart</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Neucha&family=Roboto+Slab:wght@700&family=Sacramento&display=swap" rel="stylesheet">
<style>
    body {
background-image: url("https://img2.goodfon.com/wallpaper/nbig/2/50/makro-zelen-zelenyy-trava.jpg");
}
</style>
</head>
<body>
    <div class="top-container">
    <h1 class="title">Worthy Work Charity</h1>
    <!--menu buttons-->
    <div class="header">
      <h2 class="logo">Welcome</h2>

      <label>
       <ul class="menu">
        <a href="index.php">Home</a>
        <a href="products.php">Charity Products</a>
        <a href="about.php">Organization info</a>
        <a href="chat.php">Help</a>
        <?php
        if(isset($_SESSION['username'])){
          echo'<a href="logout.php">Logout</a>
          <a href="cart.php">Add charity</a>
          <a href="info.php">Donate</a>
          <a href="profile.php">Profile</a>';

        }
        else{
          echo'<a href="login.php">Login</a>
          <a href="registration.php" class="register">register</a>';
        }

         ?>


        </label>
      </ul>
    </div>
<br><br><br><br>


      <!--menu buttons ends-->
    </div>