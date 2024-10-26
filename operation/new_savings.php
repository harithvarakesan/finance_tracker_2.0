<?php
require 'connection.php'; // Ensure this file sets up the $conn variable for your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start(); 
    
    $userid = $_SESSION['userid']; 
    $saving_name = $_POST['saving_name'];
    $target_amount = $_POST['target_amount'];
    
    // Insert into the database
    $sql = "INSERT INTO savings (userid, sav_name, total_amount) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dsd",$userid, $saving_name, $target_amount);
    
    if ($stmt->execute()) {
        echo "<script>alert('Saving added successfully');</script>";
        
    header("Location: ../myplan.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

?>