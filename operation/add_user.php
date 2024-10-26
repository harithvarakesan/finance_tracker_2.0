<?php
// Include the database connection file
require 'connection.php'; // Ensure this file sets up the $conn variable for your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
    $mobile_no = filter_var($_POST['mobile_no'], FILTER_SANITIZE_STRING);

    // Check if passwords match
    if ($password !== $cpassword) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email or username already exists
    $checkUserStmt = $conn->prepare("SELECT * FROM user WHERE email = ? OR username = ?");
    $checkUserStmt->bind_param("ss", $email, $username);
    $checkUserStmt->execute();
    $result = $checkUserStmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email or Username already exists!');window.location.href = '../login.php';</script>";

    } else {
        // Insert user into the database
        $stmt = $conn->prepare("INSERT INTO user (email, name, mobile_number, password, city, state, username) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $email, $name, $mobile_no, $hashed_password, $city, $state, $username);

        if ($stmt->execute()) {
            echo "<script>alert('registration successful');window.location.href = 'login.php';</script>";
            // Optionally redirect to login page
            // header("Location: login.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $checkUserStmt->close();
    $conn->close();
}
?>
