<!DOCTYPE html>
<?php
session_start();
require 'cnn.php';
require 'config.php';
require 'work.php';
if(!isset($_SESSION['username']))
{
  echo '<link rel="stylesheet" href="d.css">
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
?>


<html>
<head>
<title> Givers--Donate here</title>
<link rel ="stylesheet" href="d.css">
<style>
body {
background-image: url("https://img2.goodfon.com/wallpaper/nbig/2/50/makro-zelen-zelenyy-trava.jpg");
}
</style>
<style>
.form-popup {
 width: 100%;
  height:100%;
  background-color: black;
  opacity: 0.96;
  position: fixed;

  left: 0;
  bottom:0;
  display: flex;
  justify-content: center;
  align-items:  center;
  display: none;
}
.popup{
 min-width: 500px;
  min-height: 300px;
  background-color: white;
  border-radius: 8px;
  text-align: center;
  padding:10px 10px 10px 10px;
margin:0px 5px 0px 5px ;
}
</style>
</head>
<hr>
<center>
<p style="color:black;font-size:50px;font-family: 'Neucha', cursive;"><b>Donation Details</b></p></center>
<div id="come">
<div id="form">
<form method="POST" action="info.php">
<?php
echo "<p style='color:black;font-family: 'Sacramento', cursive;;font-size:15px'>Please fill out the below details to carry out your worthy Work</p>";
?>

<label>Select your NGO: </label><br/>
<select name="ngo">
<option>Sarthak Foundation</option><option>peace foundation</option><option>joy foundation</option>

<option>Dada-Dadi </option>
<option>NHFDC</option>
</select>

<br/><br/>
<label>Mobile Number: </label><br/>
<input type="text" name="number" class="inputFields" required /><br><br/>
<label>Aadhar Number: </label><br/>
<input type="text" name="aadhar" class="inputFields" required /><br><br/>
<label>Donation Amount: </label><br/>
<input type="text" name="amount" class="inputFields" required/><p style='font-size:15px'></p>
<input type="checkbox" name="condition" required/>I have read through the website's Privacy Policy &<br/>
 Donor's Policy and Terms and Conditions to make a donation.<br><br/>
<input type="submit" class="thebuttons" name="submit" value="Make Payment" onclick="train3()" /><br>
</div>
</div>

<div class="form-popup" id="bookTrain2">
    <div class="popup"><br><br><br>
    <img src="images/c5.jpeg" height="200" width="200"/>
    <h1 style="color:blue">THANKS FOR DOING YOUR WORTHY WORK CHARITY!!!</h1>
    <button type="button" class="hide" onclick="train4()">OK</button>
</div>
<script>
function train3(){
  document.getElementById("bookTrain2").style.display = "flex";
}
function train4(){
  document.getElementById("bookTrain2").style.display = "none";
}
</script>
</body>
</html>
