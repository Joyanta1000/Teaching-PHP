<?php
include 'connection.php';

if (isset($_POST['register'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
$sql = "INSERT INTO user (email, password)
VALUES ('$email', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header('Location: index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$email = $_POST['email'];
	$password = $_POST['password'];
$sql = "UPDATE `user` SET `email` = '$email', `password` = '$password' WHERE `user`.`id` = '$id';";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
  header('Location: index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}


// if (!file_exists('files')) {
//     mkdir('files', 0777);
// }
  
// move_uploaded_file($_FILES['file']['tmp_name'], 'files/' . $_FILES['file']['name']);
  
// echo "success";
// die();

if(isset($_POST["submit"]))
{
    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
  
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["image"]["name"];   // get the image name in $fnm variable
    echo $fnm;
    $dst = "./files/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "files/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
  
    $check = mysqli_query($conn,"insert into user_file(name) values('$dst_db')");  // executing insert query
    
    if($check)
    {
      header('Location: user_file.php');
    }
    else
    {
      echo '<script type="text/javascript"> alert("Error Uploading File!"); </script>';  // when error occur
    }
}
?>



$conn->close();
?>