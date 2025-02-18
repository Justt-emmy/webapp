<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Arial", sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f5f5f5;
        }
        .container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
            transition: transform 0.5s ease-in-out;
        }
        h2 {
            margin-bottom: 15px;
            color: #333;
        }
        p {
            font-size: 14px;
            color: #666;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            text-align: center;
            background: #fff;
            color: #333;
        }
        .otp-input {
            display: flex;
            justify-content: space-between;
        }
        .otp-input input {
            width: 45px;
            text-align: center;
            font-size: 18px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }
        button:hover {
            background: #0056b3;
        }
        .hidden {
            display: none;
        }
        .success-message {
            margin-top: 15px;
            padding: 10px;
            background: #28a745;
            color: white;
            border-radius: 6px;
            display: none;
        }
    </style>
</head>
<body>

    <!-- Step 1: Enter Email -->
    <div class="container" id="email-container">
        <h2>Forgot Password</h2>
        <p>Enter your email to receive a reset code.</p>
        <input type="email" id="email" placeholder="Enter your email" required>
        <button onclick="showOTP()">Next</button>
    </div>

    <!-- Step 2: Enter OTP -->
    <div class="container hidden" id="otp-container">
        <h2>Enter OTP</h2>
        <p>We've sent a 6-digit code to your email.</p>
        <div class="otp-input">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
        </div>
        <button onclick="submitOTP()">Verify</button>
        <div class="success-message" id="otp-success-message">✅ OTP Verified! Redirecting...</div>
    </div>

    <!-- Step 3: Reset Password -->
    <div class="container hidden" id="reset-password-container">
        <h2>Reset Password</h2>
        <p>Enter your new password below.</p>
        <input type="password" id="new-password" placeholder="New Password" required>
        <input type="password" id="confirm-password" placeholder="Confirm Password" required>
        <button onclick="resetPassword()">Reset Password</button>
        <div class="success-message" id="password-success-message">✅ Password Reset Successfully!</div>
    </div>

    <script>
        function showOTP() {
            document.getElementById("email-container").classList.add("hidden");
            document.getElementById("otp-container").classList.remove("hidden");
        }

        function submitOTP() {
            document.getElementById("otp-success-message").style.display = "block";
            setTimeout(() => {
                document.getElementById("otp-container").classList.add("hidden");
                document.getElementById("reset-password-container").classList.remove("hidden");
            }, 1500); // Redirect after 1.5s
        }

        function resetPassword() {
            let newPassword = document.getElementById("new-password").value;
            let confirmPassword = document.getElementById("confirm-password").value;

            if (newPassword === "" || confirmPassword === "") {
                alert("Please enter your new password.");
                return;
            }
            if (newPassword !== confirmPassword) {
                alert("Passwords do not match!");
                return;
            }

            document.getElementById("password-success-message").style.display = "block";
        }
    </script>

</body>
</html>
