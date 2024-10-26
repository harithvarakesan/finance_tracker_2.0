<?php
// Include your database connection file
include 'connection.php'; // Make sure the 'db.php' contains the database connection logic.

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize and retrieve form input values
    $transaction = filter_var($_POST['transaction'], FILTER_SANITIZE_STRING);
    $date = $_POST['date']; // Assuming date input is in correct format
    $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
    $amount = filter_var($_POST['amount'], FILTER_VALIDATE_INT);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

    // Here, `$_SESSION['userid']` should store the logged-in user's id.
    session_start(); 
    $userid = $_SESSION['userid']; // Get the logged-in user's id from the session.

    // Insert into the database
    $sql = "INSERT INTO transaction (userid, cashflow, type, description, amount, datetime) 
            VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the SQL query
        $stmt->bind_param("isssis", $userid, $transaction, $type, $description, $amount, $date);

        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Transaction added successfully!'); window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
        } else {
            echo "<script>alert('Error adding transaction.'); window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
        }

        // Close statement and connection
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
}
?>
