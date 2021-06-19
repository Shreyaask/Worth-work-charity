<?php
     require 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>registration page</title>
  <link rel="stylesheet" type="text/css" href="register.css">
<style>
    body {
background-image: url("https://img2.goodfon.com/wallpaper/nbig/2/50/makro-zelen-zelenyy-trava.jpg");
}
</style>
</head>
<body>

 	   	<form class="box" action="registration.php" method="post">
        <br>
        <br>
        <h1>Registration page</h1>
        <input type="text" placeholder="Enter firstname" name="fname" required>

 	   	  <input type="text" placeholder="Enter lastname" name="Lname" required>

 	   	   <input type="text" placeholder="Enter Username" name="username" required>

 	   	    <input type="password" name="password" placeholder="Enter Password" class="password" required>

 	   	   <input type="password" name="cpassword"  placeholder="Confirm Password"class="confirmpassword" required>

 	   	   <input type="email" name="mail"  placeholder="Enter Email-Id"  required>
 	   	    <input type="submit" name="submit_btn" value="Submit">
          <a href="login.php" name="back_btn">Back to Login</a><br>
          <a href="index.php">Home</a>
 	     </form>



        <?php
             if(isset($_POST['submit_btn'] ))
             {   $uflag=0;
             	 $eflag=0;

             	  $firstname = $_POST['fname'];
             	  $lastname = $_POST['Lname'];
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $cpassword = $_POST['cpassword'];
                  $email = $_POST['mail'];

                  if($password==$cpassword)
                  {
                  	$query="select * from user where username='$username'";
                  	$query_run = mysqli_query($con,$query);//it will fetch the record from the sql statement
                  	if(mysqli_num_rows($query_run)>0) //this command is used to find how many rows are fetched
                  	{
                     //there is already a user with that user name
                  	echo '<script type="text/javascript"> alert("user already exist. try another user name") </script>';
                  	$uflag=1;
                  	}
                  	$query="select * from user where Email='$email'";
                  	$query_run = mysqli_query($con,$query);//it will fetch the record from the sql statement
                  	if(mysqli_num_rows($query_run)>0) //this command is used to find how many rows are fetched
                  	{
                     //there is already a user with that email
                  	echo '<script type="text/javascript"> alert("email already exist. try another email id") </script>';
                  	$eflag=1;
                  	}

                  	if($uflag==0 and $eflag==0)
                    {
                      #no issues so insert into database
                      $hash=password_hash($password,PASSWORD_DEFAULT);
                      $query="insert into  user values('$firstname','$lastname','$username','$hash','$email')";
                      $query_run = mysqli_query($con,$query);


                     echo '<script type="text/javascript"> alert("User Details Registered Successfully.Go to Login Page to Login") </script>';
                     header('location: login.php');
                     }

                  }
                  else
                  {
                  	echo '<script type="text/javascript"> alert("password and confirm password does not match") </script>';


                  }

             }



        ?>
 	 </div>
</body>
</html>