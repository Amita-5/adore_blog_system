<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adore_dashboard";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['id'])){
    $id = $_GET['id'];

$sql="DELETE FROM `blogs` WHERE Id='$id'";
$sql1="DELETE FROM `blog_post` WHERE id='$id'";


if(mysqli_query($conn,$sql)){

     if(mysqli_query($conn,$sql1)){
        header("Location:index.php");
        exit();
     }
    

}
else{
    echo"unsucessful";
}

}
?>