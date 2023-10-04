<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
  
  <?php
    $id=$_GET["id"];
    include("db_connect.php");
    $sql= "SELECT * FROM `speakers` WHERE Id=$id";
    $result1 = $conn->query($sql);
    $row1=$result1->fetch_assoc();
  ?>
<style>
    body{
      margin:200px;
      

    }
    /* Style for the card container */
/* Center the card container horizontally and vertically */
.card-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh; /* This will make the container fill the entire viewport height */
}

/* Style for the card */
.card {
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  margin: 0 10px; /* Add margin between cards if needed */
}

<div class="card-container">
/* Style for the card image */
.card-img-top {
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  max-height: 200px; /* Adjust this height as needed */
}

/* Style for the card title */
.card-title {
  font-size: 1.25rem;
  font-weight: bold;
  margin-bottom: 10px;
}

/* Style for the card text */
.card-text {
  font-size: 1rem;
}

/* Style for the "Go somewhere" button */
.btn-primary {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 8px 16px;
  text-decoration: none;
  font-size: 1rem;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

.btn-primary:hover {
  background-color: #0056b3;
}

  </style>
</head>
<body>
  
<div class="card" style="width: 18rem;">
  <img src="image/<?=$row1["image"] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row1["name_speaker"]; ?></h5>
    <p class="card-text"><?php echo $row1["description"]; ?></p>
    <!-- <a href="page-blog-details.php?id=<?php echo $id ?>" class="btn btn-primary">more details</a> -->
  </div>
</div>
</body>
</html>