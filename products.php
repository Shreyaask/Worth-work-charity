<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="productstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<style>
    body {
background-image: url("https://img2.goodfon.com/wallpaper/nbig/2/50/makro-zelen-zelenyy-trava.jpg");
}
</style>
</head>
<body>
       <!--menu buttons-->
    <div class="header">
        <h2 class="logo">Welcome</h2>

        </label>


              <ul class="menu">
                <a href="index.php">Home</a>
                <a href="products.php">Charity products</a>
                <a href="about.php">Charity info</a>
                <?php
                if(isset($_SESSION['username'])){
                  echo'<a href="logout.php">Logout</a>
                  <a href="cart.php">Add charity</a>
                  <a href="paymentgate.php">Payment</a>
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


        <!--menu buttons ends-->
        <div class="middlecontainer">
        <!--pricing cards-->
        <div class="container">
          <div class="box">
           <h3 class="camz">Mask</h3>
            <img class="camzimg" src="images/img6.jpg" alt="corona mask">
            <h4 class="camz"> 5 INR per mask</h2>
              <br>
          <h4 class="camz"> good quality Face mask</h2>
            <br>
            <br>
            <a href="#" class="add_to_cart">DONATE</a>

          </div>
          <div class="box">
             <h3 class="camz">Sanitizer</h3>
            <img class="camzimg1" src="images/img7.jpg" alt="sanitizer">
            <h4 class="camz"> 50 INR</h2>
             <br>
          <h4 class="camz">100 ml sanitizer</h2>
            <br>
            <br>
  
            <a href="#" class="add_to_cart">DONATE</a>
  
          </div>
          <div class="box">
           <h3 class="camz">Food</h3>
            <img class="camzimg" src="images/img2.jpg" alt="food">
            <h4 class="camz"> 100 INR</h2>
              <br>
          <h4 class="camz">High quality food</h2>
            <br>
            <br>
            <a href="#" class="add_to_cart">DONATE</a>

          </div>
        </div>
        <!--pricing cards ends-->
        </div>
        <!--footer-->
        <div class="footer">
            <footer>
              <div class="footer-container">
                <div class="left-col">

                  <div class="social-media">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                  </div>
                  <p class="rights-text">© 2020 Created By Team shreyaas All Rights Reserved.</p>
                </div>

                <div class="right-col">
                  <h1 class="news">Our Newsletter</h1>
                  <div class="border"></div>
                  <p>Enter Your Email to get our news and updates.</p>
                  <form action="" class="newsletter-form">
                    <input type="text" class="txtb" placeholder="Enter Your Email">
                    <input type="submit" class="btn" value="submit">
                  </form>
                </div>
              </div>
            </footer>
     <!--footer ends-->
</body>
</html>