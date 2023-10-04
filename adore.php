<?php
include("db_connect.php");

$sql = "SELECT * FROM `blogs`";
$result = $conn->query($sql);
$resul = $conn->query($sql);

$s = "SELECT * FROM `blog_post`";
$results = $conn->query($s);

if(isset($_POST["status"])){
 
  $blog_content=$_POST["blog_content"];
  $status=$_POST["status"];
  // image..

  $blog_image=$_FILES['blog_image']['name'];
  $tmp_name = $_FILES['blog_image']['tmp_name'];

  $img_ex = pathinfo($blog_image, PATHINFO_EXTENSION);
	$img_ex_lc = strtolower($img_ex);
	$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
	$img_upload_path = 'image/'.$new_img_name;
	move_uploaded_file($tmp_name, $img_upload_path);


  if(isset($_POST["blog_name"])){
    $author=$_POST["author"];
    $uploaded_by=$_POST["uploaded_by"];
    $blog_name=$_POST["blog_name"];
    $nameauthor=$_POST["nameauthor"];
    $country=$_POST["country"];

    $sql="INSERT INTO `blogs`( `Blog_Name`, `status`,`nameauthor` `Author`, `uploaded_by`,`country`)
    VALUES ('$blog_name','$status','$nameauthor','$author','$uploaded_by','$country')";
   $sql1 ="INSERT INTO `blog_post`(`blog_image`, `blog_content`, `author` ,`country`) VALUES ('$new_img_name','$blog_content','$author','$country' )";
   
  
  }
  else{
    $id=$_POST["id"];
    $sql = "UPDATE `blogs` SET `status`='$status' WHERE `id`='$id'";
    $sql1="UPDATE `blog_post` SET `blog_image`='$new_img_name',`blog_content`='$blog_content' WHERE `id`='$id'";
 }
  // $sql="DELETE FROM `blogs` WHERE id='3'";
  if(mysqli_query($conn,$sql)){

    if(mysqli_query($conn,$sql1)){
      header("Location:index.php");
      exit();
    }

      echo "done!";
  }else{
    echo "try again";
  }

}
?>
