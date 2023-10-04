<?php
//session_start(); // Start a session to manage user authentication
 include("db_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email_id"];
    $password = $_POST["password"];
    echo "hii..";
    $sql = "SELECT * FROM `registration` WHERE `email` ='$email' AND `password`='$password'";
    echo "yes ";
    $result = $conn->query($sql);
    echo "no";
    if ($result->num_rows == 1) {        
       // echo"login sucessful";
        // User is authenticated
       // $_SESSION["email"] = $email;
       header("Location: index.php"); // Redirect to the dashboard page
    } else {
        // Invalid login
        $error_message = "Invalid email or password";
        echo $error_message;
    }
}
?>
 