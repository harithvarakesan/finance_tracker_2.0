<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 400px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #1e3a8a; /* Dark blue */
            font-family: 'Arial', sans-serif;
            font-weight: 600;
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Input and Button styles - reused for both forms */
        input, button {
            display: block;
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            margin: 12px 0;
            border-radius: 8px;
            font-size: 16px;
        }

        input {
            border: 1px solid #d1d5db;
            background-color: #f9fafb;
        }

        input:focus {
            outline: none;
            border-color: #1e40af;
            background-color: #f1f5f9;
        }

        input::placeholder {
            font-family: 'Arial', sans-serif;
            color: #6b7280; /* Placeholder color */
            font-size: 16px;
        }

        button {
            background-color: #2563eb;
            color: white;
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1e40af;
        }

        label {
            display: block;
            font-size: 18px;
            font-family: 'Arial', sans-serif;
            font-weight: 600;
            color: #374151;
            text-align: left;
            margin-bottom: 8px;
        }

    </style>
</head>
<body>

<div class="container">
    <h2>Forgot Password</h2>
    
    <!-- Form to enter mobile number -->
    <form id="forgotPasswordForm">
        <label for="mobileNumber">Enter your registered mobile number:</label>
        <input type="text" id="mobileNumber" placeholder="Enter mobile number" required>
        <button type="button" onclick="sendOTP()">Send OTP</button>
    </form>

    <!-- Form to enter OTP (initially hidden) -->
    <form id="otpForm" style="display:none;">
        <label for="otp">Enter OTP:</label>
        <input type="text" id="otp" placeholder="Enter OTP" required>
        <button type="button" onclick="verifyOTP()">Verify OTP</button>
    </form>
</div>

<script>
    // Simulate OTP sending and verification for demonstration
    function sendOTP() {
        const mobileNumber = document.getElementById('mobileNumber').value;
        
        if (mobileNumber) {
            alert('OTP sent to ' + mobileNumber);
            // Hide mobile number form and show OTP form
            document.getElementById('forgotPasswordForm').style.display = 'none';
            document.getElementById('otpForm').style.display = 'block';
        } else {
            alert('Please enter a valid mobile number.');
        }
    }

    function verifyOTP() {
        const otp = document.getElementById('otp').value;

        if (otp) {
            alert('OTP Verified. Proceed to reset password.');
            // Here you can redirect to the reset password page
            window.location.href = '/reset-password'; // Example redirection to reset password page
        } else {
            alert('Please enter the OTP.');
        }
    }
</script>

</body>
</html>