<?php
// Include database connection file
include 'connection.php';


// Assuming the user is logged in and you have stored their id in the session
$userid = $_SESSION['userid']; // Get the logged-in user's ID

// SQL query to fetch the 5 most recent transactions for the user
$sql = "SELECT datetime,cashflow,type, description, amount FROM transaction WHERE userid = ? ORDER BY datetime DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userid); // Bind the user ID to prevent SQL injection
$stmt->execute();
$result = $stmt->get_result();

$transactions = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $transactions[] = $row; // Add each transaction to the array
    }
} else {
    echo "No recent transactions found.";
}

$stmt->close();
$conn->close();
?>
