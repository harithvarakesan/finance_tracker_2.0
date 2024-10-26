<?php
include 'connection.php'; // Include the connection file

session_start();
// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userid = $_SESSION['userid']; // Assuming user ID is stored in session
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    // Prepare the update query
    $sql = "UPDATE user SET name = ?, mobile_number = ?, email = ?, city = ?, state = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared correctly
    if (!$stmt) {
        // Output the SQL error for debugging
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters and execute the query
    $stmt->bind_param("sssssi", $name, $mobile, $email, $city, $state, $userid);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        // Redirect to profile page with success message
        header("Location: ../profile.php?success=ProfileUpdated");
        exit();
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
