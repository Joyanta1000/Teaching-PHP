<?php
include 'connection.php';

if(isset($_GET['id']))
{
	$id = $_GET['id'];
$sql = "DELETE FROM user WHERE id = '$id'";

if ($result = $conn -> query($sql)) {
  
  header('Location: index.php');

  }

  else{
  	echo "Not deleted";
  }
  
}

?>