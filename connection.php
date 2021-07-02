<?php
$servername = "ec2-52-0-67-144.compute-1.amazonaws.com";
$username = "wbqdjmodukqqmv";
$password = "18a9405accc2b07be5307f6872bb71dde4bf59a2f511cf6b9f0bc5a0627ee71a";
$dbname = "d4koueh8ic01rb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
