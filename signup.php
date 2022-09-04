<?php
$Email=$_POST['Email'];
$Password=$_POST['password'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = new mysqli($servername, $username, $password, $dbname);

$select = mysqli_query($conn, "SELECT * FROM signup WHERE email = '".$_POST['Email']."'");
if(mysqli_num_rows($select)) {
    exit('This email address is already registered');
}
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
 
  $stmt = $conn->prepare("INSERT INTO signup (Email,password) VALUES (?, ?)");
  $stmt->bind_param("ss",$Email,$Password);
  $stmt->execute();
  $stmt->close();
  $conn->close();
  //move to login page
  header("Location:googly.html");

  
}


?>




