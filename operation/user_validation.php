<?php
require 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input and sanitize it
    $email = filter_var($_POST['emailid'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

        // Prepare SQL to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify password (assuming passwords are hashed using password_hash())
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['userid'] = $row['id'];  // Assuming $row['username'] contains the user's username
                $_SESSION['email'] = $row['email'];       
                $_SESSION['username'] = $row['name'];       

                echo "<script>alert('Login successful');window.location.href = '../dashboard.php';</script>";
                // Redirect or start session here
            } else {
                echo "<script>alert('Incorrect password');window.location.href = 'login.php';</script>";
            }
        } else {
            echo "No account found with that email.";
        }

        $stmt->close();
        $conn->close();
}
?>
