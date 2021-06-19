<?php
session_start();
require 'cnn.php';
if(!isset($_SESSION['username']))
{
  echo '  <link rel="stylesheet" href="productstyle.css">
  <div class="header">
    <label>
    <ul class="menu">
      <a href="index.php">Home</a>
    </ul>
  </label>
</div>';
echo "<p style='text-align:center'class='error'>You are not logged in!!!</p>";
  exit();
}
$username=$_SESSION['username'];
$query="select * from address where username='$username';";
$query_run= mysqli_query($conn,$query);
if(mysqli_num_rows($query_run)>0){die('
  <link rel="stylesheet" href="productstyle.css">
  <div class="header">
    <label>
    <ul class="menu">
      <a href="index.php">Home</a>
    </ul>
  </label>
</div>
<p style="text-align:center"class="error">Address already Provided by You!!!</p>;
');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contactstyle.css">
    <title>Address</title>
</head>
<body>


    <!--menu buttons-->
    <div class="header">
        <h2 class="logo">Welcome</h2>

        </label>

        <ul class="menu">
          <a href="index.php">Home</a>
          <a href="cart.php">Carts</a>
          <a href="products.php">Products</a>
          <a href="about.php">About Us</a>


          </label>
        </ul>
      </div>


        <!--menu buttons ends-->
        <div class="container">
            <form id="contact" action="" method="post">
              <h3>Address</h3>
              <h4>Privacy policies maintained</h4>
              <fieldset>
                <input placeholder="House No" type="text" tabindex="1" name="hno" required autofocus>
              </fieldset>
              <fieldset>
                <input placeholder="Street Name" type="text" tabindex="2" name="sname"required>
              </fieldset>
              <fieldset>
                <input placeholder="City" type="text" tabindex="3" name="city" required>
              </fieldset>
              <fieldset>
                <input placeholder="State" type="text" tabindex="4" name="state" required>
              </fieldset>
              <fieldset>
                <input placeholder="Phone no" type="number" maxlength="10" tabindex="4" name="phno" required>
              </fieldset>

              <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
              </fieldset>

            </form>
          </div>
          <?php
          if(isset($_POST['submit']))
          {
            $username=$_SESSION['username'];
            $house=$_POST['hno'];
            $street=$_POST['sname'];
            $city=$_POST['city'];
            $state=$_POST['state'];
            $phno=$_POST['phno'];
            $query="insert into address values('$username','$house','$street','$city','$state',$phno);";
            $query_run= mysqli_query($conn,$query);
            header('location:profile.php');
          }
           ?>
</body>
</html>