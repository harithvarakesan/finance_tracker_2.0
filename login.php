
<!DOCTYPE html>
<html>
<head>
  <title>BUDGET TRACKER</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      text-align: center;
      display:flex;
      flex-wrap:wrap;
      justify-content:space-evenly;
    }
    
    .container {
      flex:1;
      max-height:350px;
      max-width:600px;
      margin: auto 30px;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: left;
    }
    
    .container h2 {
      text-align:center;
      margin-bottom: 20px;
    }
    
    .container input[type="email"],
    .container input[type="password"] {
      width: 98%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
   
    .container input[type="submit"] {
      width: 60%;
      margin-left: 20%;
      padding: 10px;
      background-color: #000000;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      margin-bottom: 20px; 
    }
    
    .container a {
      display: block;
      margin-bottom: 20px;
      color: #151219;
      text-decoration: none;
      text-align: center;
    }
  
    .container a:hover {
      text-decoration: underline;
    }
    
    .account-password {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
      margin-left: 10px;
    }
    
    .left-image {
      flex:1;
      max-height:100vh;
    }
    
    @media only screen and (min-width: 768px) {
      .container {
        width: 400px;
      }
    }
  </style>
</head>
<body> 
  <img src="assets/images/expense-management-4268366-3561009.png" alt="Image" class="left-image">
  
  <div class="container">
    <h2>BUDGET TRACKER</h2>
    <form action="operation\user_validation.php" method="POST" >
      <label for="username">Email ID:</label>
      <br>
      <input type="email" name="emailid" placeholder="Enter your Email ID" required><br>
      <label for="password">Password:</label>
      <br>
      <input type="password" name="password" placeholder="Enter your password" required><br>
      <div class="account-password">
        <div class="dont-have-an" id="dontHaveAn"><a href="register.php">Don't have an account</a></div>
        <div class="forgot-password" id="forgotPasswordText"><a href="forgot.php">Forgot Password?</a></div>
      </div>
      <input type="submit" value="Login">
    </form>
 </div>
</body>
</html>