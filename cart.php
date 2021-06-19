<?php
session_start();
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
$conn = mysqli_connect("localhost", "root", "", "dbms2");

if(isset($_POST["add_to_cart"]))
{
  $username=$_SESSION['username'];
  $query="select * from cart where username='$username';";
  $query_run= mysqli_query($conn,$query);
  $row=mysqli_fetch_array($query_run);
	if(mysqli_num_rows($query_run)>0)
	{
		$item_array_id = array_column($row,"id");
		if(!in_array($_GET["id"],$item_array_id))
		{
      $item_id=$_GET["id"];
      $item_name=$_POST["hidden_name"];
      $item_price=$_POST["hidden_price"];
      $quantity=$_POST["quantity"];
      $query="insert into cart values($item_id,'$item_name','$item_price','$username','$quantity')";
      $query_run = mysqli_query($conn,$query);
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
    $item_id=$_GET["id"];
    $item_name=$_POST["hidden_name"];
    $item_price=$_POST["hidden_price"];
    $quantity=$_POST["quantity"];
    $query="insert into cart values($item_id,'$item_name','$item_price','$username','$quantity')";
    $query_run = mysqli_query($conn,$query);
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
    $username=$_SESSION['username'];
    $query="select * from cart where username='$username';";
    $query_run= mysqli_query($conn,$query);
		while($row=mysqli_fetch_array($query_run))
		{
			if($row["id"] == $_GET["id"])
			{
        $id=(int)$_GET["id"];
        $query="delete from cart where username='$username' and id=$id;";
        $query_run= mysqli_query($conn,$query);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="cartstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
             <a href="products.php">Charity Products</a>
             <a href="about.php">Organizations info</a>
             <?php
             if(isset($_SESSION['username'])){
               echo'<a href="logout.php">Logout</a>
							 <a href="paymentgate.php">Donate</a>
		           <a href="profile.php">Profile</a>';

             }
              ?>

       </label>
     </ul>
   </div>


     <!--menu buttons ends-->
		<br />
		<div class="container">
			<br />
			<br />
			<br />
		<br /><br />
			<?php
				$query = "SELECT * FROM tbl_product ORDER BY id ASC";
				$result = mysqli_query($conn, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:10px; padding:5px;" align="center">
						<img src="images/<?php echo $row["image"]; ?>"class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">INR <?php echo $row["price"]; ?></h4>

            <h4 class="text-info"><?php echo '<p>Description :</p>';echo nl2br($row['descp']); ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3 style="background-color:white">Donation Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered" style="background-color:white">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
          $username=$_SESSION['username'];
          $query="select * from cart where username='$username';";
          $query_run= mysqli_query($conn,$query);
        	if(mysqli_num_rows($query_run)>0)
					{
						$total = 0;
						while($row=mysqli_fetch_array($query_run))
						{
					?>
					<tr>
						<td><?php echo $row["name"]; ?></td>
						<td><?php echo $row["quantity"]; ?></td>
						<td>INR <?php echo $row["price"]; ?></td>
						<td>INR <?php echo number_format($row["quantity"] * $row["price"], 2);?></td>
						<td><a href="cart.php?action=delete&id=<?php echo $row["id"];?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($row["quantity"] * $row["price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">INR <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>

				</table>
			</div>
		</div>
	</div>
	<br />
	</body>
</html>