<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Get the saving_id from the URL using GET
    $saving_id = $_GET['id'];

    if (!empty($saving_id)) {
        // SQL query to delete the saving by id
        $sql = "DELETE FROM savings WHERE id = ?";
        
        // Prepare the statement to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $saving_id);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect back to myplan.php with a success message
            header("Location: ../myplan.php?success=saving_deleted");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Invalid saving ID.";
    }
}
?>
