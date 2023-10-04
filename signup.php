<?php
include("db_connect.php");
// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $salutation = $_POST["sal"];
    $applying_form =$_POST["role"];
    $firstName = $_POST["f_name"];
    $lastName = $_POST["l_name"];
    $email = $_POST["email_id"];
    $country_code = $_POST["country"];
    $phone = $_POST["phone"];
    $city = $_POST["city"];
    $pin_code = $_POST["pin"];
    $password = $_POST["password"];

   $sql="SELECT * from `registration`  Where `email`='$email' ";
   $result=mysqli_query($conn,$sql);
   $row=mysqli_num_rows($result);
  
    
   if($row==0){
    // Insert data into database
    $sql = "INSERT INTO `registration`( `salutation`, `applying_form`, `first_name`, `last_name`, `email`, `country_code`, `phone`, `city`, `pin_code`, `password`)  VALUES ('$salutation','$applying_form', '$firstName' ,'$lastName', '$email','$country_code', '$phone', '$city', '$pin_code', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   }else{
    echo"email already used";
   }

}


$conn->close();
?>
 