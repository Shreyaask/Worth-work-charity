<!DOCTYPE html>
<?php
session_start();
require 'cnn.php';
if(!isset($_SESSION['username']))
{
  echo '<link rel="stylesheet" href="productstyle.css">
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
$query="select cart.id,address.hno from cart inner join address on cart.username=address.username where address.username='$username';";
$query_run= mysqli_query($conn,$query);
if(mysqli_num_rows($query_run)<=0)
{die('<link rel="stylesheet" href="productstyle.css">
  <div class="header">
    <label>
    <ul class="menu">
      <a href="index.php">Home</a>
    </ul>
  </label>
</div>
 <p style="text-align:center"class="error">Your Cart or Address is empty!!!</p>'
);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="paymentstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title>payment</title>
<style>
body {
background-image: url("https://visme.co/blog/wp-content/uploads/2017/07/50-Beautiful-and-Minimalist-Presentation-Backgrounds-042.jpg");
}
</head>
</style>
<body>
  <!--menu buttons-->
<div class="header">
   <h2 class="logo">Welcome</h2>

   </label>


         <ul class="menu">
           <a href="index.php">Home</a>
           <a href="products.php">Products</a>
           <a href="about.php">About Us</a>
           <a href="logout.php">Logout</a>
           <a href="cart.php">Carts</a>
           <a href="profile.php">Profile</a>

     </label>
   </ul>
 </div>


   <!--menu buttons ends-->
     <?php
       $user=$_SESSION['username'];
       $query="select * from card where username='$user'order by cno asc;";
       $query_run= mysqli_query($conn,$query);
       if(mysqli_num_rows($query_run)>0)
       {
         $row=mysqli_fetch_array($query_run);
         ?>
        <!--payment gateway starts-->
        <form class="box" name="form1" action=" " method="post">
        <div class="wrapper">
            <div class="container">
              <div class="title">Checkout Form</div>

              <div class="input-form">
                <div class="section-1">
                  <div class="items">
                    <label class="label">card number</label>
                    <input type="number" class="input" maxlength="16"  onchange="cardnumber(cno)" placeholder="1234 1234 1234 1234" name="cno" value="<?php echo ($row['cno']);?>"required>
<script src="creditvalid.js"></script>
                  </div>
                </div>
                <div class="section-2">
                  <div class="items">
                    <label class="label">Card holder</label>
                    <input type="text" class="input" placeholder="Your Name" name="chname" value="<?php echo ($row['chname']);?>"required>
                  </div>
                </div>
                <div class="section-3">
                  <div class="items">
                    <label class="label">Expire date</label>
                    <input type="text" class="input"  placeholder="MM / YY" name="exdate" value="<?php echo ($row['exdate']);?>"required>
                  </div>
                  <div class="items">
                    <div class="cvc">
                      <label class="label">CVV code</label>
                      <div class="tooltip">?
                        <div class=""> </div>
                      </div>
                    </div>
                    <input type="text" class="input"  placeholder="000">
                  </div>
                </div>
              </div>
              <input class ="btn" type="submit" name="submit_btn" value="Proceed to pay">
            </form>
          <?php
        }
          else{
          ?>
          <form class="box" action="" method="post">
          <div class="wrapper">
              <div class="container">
                <div class="title">Checkout Form</div>

                <div class="input-form">
                  <div class="section-1">
                    <div class="items">
                      <label class="label">card number</label>
                      <input type="number" class="input" maxlength="16"  placeholder="1234 1234 1234 1234" name="cno"required>
                    </div>
                  </div>
                  <div class="section-2">
                    <div class="items">
                      <label class="label">Card holder</label>
                      <input type="text" class="input" placeholder="Your Name" name="chname" required>
                    </div>
                  </div>
                  <div class="section-3">
                    <div class="items">
                      <label class="label">Expire date</label>
                      <input type="text" class="input"  placeholder="MM / YY" name="exdate" required>
                    </div>
                    <div class="items">
                      <div class="cvc">
                        <label class="label">CVV code</label>
                        <div class="tooltip">?
                          <div class=""> </div>
                        </div>
                      </div>
                      <input type="text" class="input"  placeholder="000">
                    </div>
                  </div>
                </div>
                <input class ="btn" type="submit" name="save_btn" value="Save card Details">
                <input class ="btn" type="submit" name="submit_btn" value="Proceed to pay" onclick="train3()">
              </form>
<div class="form-popup" id="bookTrain2">
    <div class="popup"><br><br><br>
    <img src="k.jpeg" height="200" width="200"/>
    <h1 style="color:blue">THANKS FOR BOOKING YOUR TICKET!! HAVE A SAFE JOURNEY!!</h1>
    <button type="button" class="hide" onclick="train4()">OK</button>
</div>
function train3(){
  document.getElementById("bookTrain2").style.display = "flex";
}
function train4(){
  document.getElementById("bookTrain2").style.display = "none";
}
</script>
            <?php }
             ?>
              <?php
              if(isset($_POST['save_btn']))
              {
                $cardno=$_POST['cno'];
                $cardholder=$_POST['chname'];
                $expire=$_POST['exdate'];
                $username=$_SESSION['username'];
                  $query="select * from card where username='$username'";
                  $query_run= mysqli_query($conn,$query);
                  if(!mysqli_num_rows($query_run)>0)
                  {
                    $query="insert into  card values($cardno,'$cardholder','$username','$expire')";
                    $query_run = mysqli_query($conn,$query);
                    header('paymentgate.php');
                  }
                  else
                    {
                      	echo '<script type="text/javascript"> alert("card already saved.") </script>';

                    }
}
                ?>

            <!--  <div class="btn">proceed</div> -->

            </div>
          </div>




        <!--payment gateway ends-->

</body>
</html>