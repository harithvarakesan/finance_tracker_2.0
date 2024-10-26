<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/register.css">
  <title>Register Page</title>
</head>

<body>
  <section class="sign_up">
    <form action="operation/add_user.php" method="post" class="container">
      <h1 style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">REGISTER</h1>
      <p id="create" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Create your account. It's free and only takes a minute</p>
      <div class="name">
        <input type="text" placeholder="NAME" name="name" required>
        <input type="text" placeholder="USERNAME" name="username" required>
      </div>
      <div class="details">
        
        <input type="email" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <input type="password" placeholder="Confirm Password" name="cpassword" required>
        <input type="text" placeholder="City" name="city" required>
        <input type="text" placeholder="State" name="state" required list="type"><br>
        <datalist id="type">
          <option value="Andhra Pradesh">
          <option value="Arunachal Pradesh">
          <option value="Assam">
          <option value="Bihar">
          <option value="Chhattisgarh">
          <option value="Goa">
          <option value="Gujarat">
          <option value="Haryana">
          <option value="Himachal Pradesh">
          <option value="Jharkhand">
          <option value="Karnataka">
          <option value="Kerala">
          <option value="Madhya Pradesh">
          <option value="Maharashtra">
          <option value="Manipur">
          <option value="Meghalaya">
          <option value="Mizoram">
          <option value="Nagaland">
          <option value="Odisha">
          <option value="Punjab">
          <option value="Rajasthan">
          <option value="Sikkim">
          <option value="Tamil Nadu">
          <option value="Telangana">
          <option value="Tripura">
          <option value="Uttar Pradesh">
          <option value="Uttarakhand">
          <option value="West Bengal">
        </datalist>
        <input type="text" placeholder="Phone number" name="mobile_no" required>
      </div>
      <div class="sumbit">
        <button type="submit">Register</button>
      </div>
    </form>
    <div class="signIn">
      <p style="font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Already have an account?<span><a href="login.php">Sign in</a></span></p>
    </div>
  </section>
  
</body>

</html>