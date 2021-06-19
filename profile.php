<?php
session_start();
include_once 'cnn.php';
 ?>
<html>
<head>
  <title>Profile</title>
<link rel="stylesheet" type="text/css" href="Prof.css">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<link href="https://fonts.googleapis.com/css2?family=Neucha&family=Roboto+Slab:wght@700&family=Sacramento&display=swap" rel="stylesheet">
</head>
  <title><?php echo $firstname;?> <?php echo $lastname;?>/'s Profile</title>
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

    <label>

    <ul class="menu">
      <a href="index.php">Home</a>
      <a href="products.php">Products</a>
      <a href="about.php">About Us</a>
      <?php
      if(isset($_SESSION['username'])){
        echo'<a href="logout.php">Logout</a>
        <a href="cart.php">Carts</a>
        <a href="paymentgate.php">Buy</a>
        <a href="contact.php">Address</a>';

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
  <?php
//Check form submission
if(isset($_SESSION['username'])){
  $username=$_SESSION['username'];
  $userquery= mysqli_query($conn,"select * from user where username='$username';")or die("The query could not be completed.!! Please try again later!!");
  if(mysqli_num_rows($userquery)!=1){
    die("That username could not be found!!");
    }
    while($row=mysqli_fetch_assoc($userquery)){
      $dbusername=$row['username'];
      $firstname=$row['firstname'];
      $lastname=$row['Lastname'];
      $email=$row['Email'];

    }
    if($username!=$dbusername){
      die("There has been a fatal error: Please try again!!!");
      }

  ?>
  <div class="box">
<h2 class="t1"><?php echo $firstname;?> <?php echo $lastname;?>'s Profile</h2><br>
<table>
  <tr><td>Firstname:</td><td><?php echo $firstname;?></td></tr>
  <tr><td>Lastname:</td><td><?php echo $lastname;?></td></tr>
  <tr><td>Email:</td><td><?php echo $email;?></td></tr>
  <tr><td>Username:</td><td><?php echo $dbusername;?></td></tr>
</div>
  <?php
}else die("You need to specify a username.");
 ?>
</body>
</html>