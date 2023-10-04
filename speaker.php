<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_speaker = $_POST["name_speaker"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $contact = $_POST["contact"];
    $image=$_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $img_ex = pathinfo($image, PATHINFO_EXTENSION);
	  $img_ex_lc = strtolower($img_ex);
	  $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
	  $img_upload_path = 'image/'.$image;
	  move_uploaded_file($tmp_name, $img_upload_path);
    $description =$_POST['description'];

    if(isset($_POST["id"])){
      $id=$_POST["id"];
      $sql="UPDATE `speakers` SET `name_speaker`='$name_speaker',`email`='$email',`country`='$country',`contact`='$contact',`image`='$image',`description`='$description' WHERE `id`='$id'";
       }
    else {

      $sql="INSERT INTO `speakers`( `name_speaker`, `email`, `country`, `contact`, `image`, `description`)
      VALUES ('$name_speaker','$email','$country','$contact','$image','$description')";
  }
if(mysqli_query($conn,$sql)){

      echo "done!";
  }
  else{
    echo "try again";
  }

}

?>