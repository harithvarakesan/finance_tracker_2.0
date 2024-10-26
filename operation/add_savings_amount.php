<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $saving_id = $_POST['saving_id'];
    $add_amount = $_POST['add_amount'];

    // Validate inputs
    if (!empty($saving_id) && !empty($add_amount) && is_numeric($add_amount)) {
        // Update the saved_amount in the database
        $sql = "UPDATE savings SET saved_amount = saved_amount + ? WHERE id = ?";
        
        // Prepare statement to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $add_amount, $saving_id);
        
        // Execute the query
        if ($stmt->execute()) {
            // Redirect back to myplan.php or show success message
            header("Location: ../myplan.php?success=amount_added");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Invalid input.";
    }
}
?>
