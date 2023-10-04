<?php
// Include your database connection or any other necessary files
include("db_connect.php");
$sql = "SELECT * FROM `registration`";
$result = $conn->query($sql);


// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"])) {
//     $action = $_POST["action"];
    
//     if ($action === "updateDatabase") {
//         // Assuming you want to update a database record
//         $recordId = $_POST["recordId"];
        
//         // Perform your database update query here
//         $sql = "UPDATE your_table SET column = 'new_value' WHERE id = '$recordId'";
//         $result = mysqli_query($conn, $sql);
        
//         if ($result) {
//             // Successfully updated
//             echo "Record updated successfully!";
//         } else {
//             // Error updating
//             echo "Error updating record: " . mysqli_error($conn);
//         }
//     }
// }
?>
