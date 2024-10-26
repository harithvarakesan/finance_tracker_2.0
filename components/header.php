<?php

session_start();

// Check if the 'username' session variable is set
if (!isset($_SESSION['userid'])) {
    // If 'username' is not set, redirect to login page
    header('Location: login.php');
    exit(); // Ensure no further code is executed after the redirect
}
$username = $_SESSION['username'];
$fstchar = strtoupper(substr($username, 0, 1));
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #111;
      color: white;
      padding: 15px 30px;
    }

    .header .logo {
        width: 80%;
        text-align:center;
      font-size: 24px;
      font-weight: bold;
    }

    .header .right-section {
      display: flex;
      align-items: center;
    }

    .header .logout-btn {
      cursor: pointer;
      background-color: #ff9800;
      padding: 8px 15px;
      border: none;
      border-radius: 20px;
      color: white;
      font-size: 14px;
      margin-left: 15px;
    }

    .head-profile-container {
      position: relative;
      display: inline-block;
    }
    .profile-btn {
    display: flex;
    justify-content: center;  /* Center horizontally */
    align-items: center;      /* Center vertically */
    cursor: pointer;
    background-color: white;
    border-radius: 50%;
    color: black;
    width: 40px;
    height: 40px;
    text-align: center;
}

.profile-btn h2 {
    margin: 0;
    padding: 0;
    line-height: 1;  /* Ensure there's no extra line spacing */
}

    /* .profile-btn img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    } */

    .profile-dropdown {
      display: none;
      position: absolute;
      right: 0;
      background-color: white;
      color: black;
      min-width: 120px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      border-radius: 5px;
    }

    .profile-dropdown a {
      padding: 10px 15px;
      display: block;
      text-decoration: none;
      color: black;
    }

    .profile-dropdown a:hover {
      background-color: #f1f1f1;
    }

    .head-profile-container:hover .profile-dropdown {
      display: block;
    }

    @media (max-width: 768px) {
      .right-section {
        margin-top: 10px;
      }

      .logout-btn {
        margin-left: 0;
        width: 100%;
        text-align: center;
      }
    }
  </style>
</head>
<body id="main-content">

<div class="header">
  <div class="logo">Finance Tracker</div>

  <div class="right-section">
    <div class="head-profile-container" id="profileContainer" style="display: none;">
      <div class="profile-btn">
        <!-- <img src="https://via.placeholder.com/25" alt="Profile"> -->
         <h2><?php echo "$fstchar";?></h2>
      </div>
      <div class="profile-dropdown">
        <a href="profile.php">View Profile</a>
      </div>
    </div>

    <a href="operation/logout.php"><button class="logout-btn" id="logoutBtn" style="display: none;">Logout</button></a>

    <div class="login-btn" id="loginBtn" style="display: block;">Login</div>
  </div>
</div>

<script>
  let isLoggedIn = true;

  window.onload = function() {
    const loginBtn = document.getElementById('loginBtn');
    const profileContainer = document.getElementById('profileContainer');
    const logoutBtn = document.getElementById('logoutBtn');

    if (isLoggedIn) {
      loginBtn.style.display = 'none';
      profileContainer.style.display = 'block';
      logoutBtn.style.display = 'block';
    } else {
      loginBtn.style.display = 'block';
      profileContainer.style.display = 'none';
      logoutBtn.style.display = 'none';
    }
  }
</script>

</body>
</html>
