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
if (isset($_GET['id']))
{
    $id = $_GET['id'];

   $sql="DELETE FROM `speakers` WHERE id='$id'";

    if(mysqli_query($conn,$sql))
                {
                    echo"updated";
                }
        else{
              echo"unsucessful";
             }
}

?>