<html>
<head>
  <style>
    .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      top: 0;
      left: -250px;
      background-color: #111;
      transition: 0.3s;
      padding-top: 60px;
    }
    .sidebar a {
      padding: 15px 25px;
      text-decoration: none;
      font-size: 18px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }
    .sidebar a:hover {
      color: #f1f1f1;
    }
    .open-btn {
      font-size: 20px;
      cursor: pointer;
      background-color: #111;
      color: white;
      padding: 10px 15px;
      border: none;
      position: fixed;
      top: 20px;
      left: 20px;
    }
    .open-btn:hover{
      background-color: gray;
    }
    .main-content {
      transition: margin-left 0.3s;
      padding: 20px;
    }
  </style>
</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="dashboard.php">Dashboard</a>
  <a href="cashflow.php">Cashflow</a>
  <a href="myplan.php">My Plan</a>
  <a href="profile.php">Profile</a>
</div>

<div class="main-content">
  <button class="open-btn" onclick="toggleSidebar()">☰</button>
</div>

<script>
  function toggleSidebar() {
    const sidebar = document.getElementById("mySidebar");
    const mainContents = document.querySelectorAll(".main-content");

    if (sidebar.style.left === "-250px") {
      sidebar.style.left = "0";
      mainContents.forEach(content => content.style.marginLeft = "250px");
    } else {
      sidebar.style.left = "-250px";
      mainContents.forEach(content => content.style.marginLeft = "0");
    }
  }
</script>

</body>
</html>
