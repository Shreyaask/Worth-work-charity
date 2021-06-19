<?php
session
require "cnn.php";
$user=$_SESSION['username'];
$query="select * from card wher username='$user';";
$query_run = mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($query_run);
echo $row['cno'];
echo $row['chname'];
?>
<?php
  $query="select * from card where username='$_SESSION['username']'";
  $query_run= mysqli_query($conn,$query);
  if(!mysqli_num_rows($query_run)>0)
  {
    $row=mysqli_fetch_array($query_run);
  }
        value="<?php echo ($row??['exdate']);?>"
    ?>