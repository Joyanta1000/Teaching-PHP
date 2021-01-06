<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="data.php" method="post" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="submit" name="submit" value="Submit">
	</form>



	<h2>All Records</h2>

<table border="2">
  <tr>
    <td>Sr.No.</td>
    <td>Images</td>
  </tr>

<?php

include 'connection.php';

$records = mysqli_query($conn,"select * from user_file"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><img src="<?php echo $data['name']; ?>" width="60" height="80"></td>
  </tr>
<?php
}
?>

</table>

<?php mysqli_close($conn);  // close connection ?>

</body>
</html>