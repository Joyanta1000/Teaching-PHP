<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title class="title">Registration</title>
	<link rel = "icon" href =  
"mypic.jpg" style="border-radius: 50%;" 
        type = "image/x-icon"> 
</head>
<body class="body">

<!-- Edit Portion -->
<?php
if(isset($_GET['id']))
{
	$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id = '$id'";

if ($result = $conn -> query($sql)) {
  while ($row = $result -> fetch_row()) {
    // printf ("%s (%s)\n", $row[0], $row[1]);
?>
<h1>Edit</h1>
<form class="form" action="data.php" method="post">
	<div>
	<input type="hidden" name="id" value="<?php echo $row[0];?>">
	<label>Email</label>
	<input type="text" name="email" value="<?php echo $row[1];?>">
	</div>
	<div>
	<label>Password</label>
	<input type="password" name="password" value="<?php echo $row[2];?>">
	</div>
	<div>
	<input type="submit" name="update" value="Update">
	</div>
</form>
    <?php
  }
  $result -> free_result();
}
}
	?>

<!-- End of Edit Portion -->


<!-- Registration Portion -->
	<h1>Registration</h1>
<form class="form" action="data.php" method="post">
	<div>
	<label>Email</label>
	<input type="text" name="email">
	</div>
	<div>
	<label>Password</label>
	<input type="password" name="password">
	</div>
	<div>
	<input type="submit" name="register" value="Register">
	</div>
</form>

<!-- End of Registration Portion -->
<h2>User Table</h2>
<table>
<?php
$sql = "SELECT * FROM user ORDER BY id";

if ($result = $conn -> query($sql)) {
  while ($row = $result -> fetch_row()) {
    // printf ("%s (%s)\n", $row[0], $row[1]);
?>
	<tr><td><?php echo $row[0];?></td><td><?php echo $row[1];?></td><td><?php echo $row[2];?></td><td><a href="index.php?id=<?php echo $row[0];?>">Edit</a></td><td><a href="delete.php?id=<?php echo $row[0];?>">Delete</a></td></tr>
    <?php
  }
  $result -> free_result();
}
	?>
</table>
</body>
</html>