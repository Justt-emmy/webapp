<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - User Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            flex-direction: column;
        }

        .success-message {
            display: none;
            width: 90%;
            max-width: 500px;
            padding: 10px;
            background: #2ecc71;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .settings-container {
            width: 90%;
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .toggle {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            flex: 1;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-save {
            background-color: #3498db;
            color: white;
            margin-right: 10px;
        }

        .btn-cancel {
            background-color: #e74c3c;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

    </style>
</head>
<body>

    <!-- Success Message -->
    <div id="successMessage" class="success-message">
        ✅ User Details Successfully Updated!
    </div>

    <div class="settings-container">
        <h2>Settings</h2>

        <form id="settingsForm">
            <!-- Profile Settings -->
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" placeholder="Enter your username">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" id="password" placeholder="Enter new password">
            </div>

            <!-- Notification Settings -->
            <h3>Notifications</h3>
            <div class="form-group toggle">
                <input type="checkbox" id="email-notifications">
                <label for="email-notifications">Email Notifications</label>
            </div>

            <div class="form-group toggle">
                <input type="checkbox" id="sms-notifications">
                <label for="sms-notifications">SMS Notifications</label>
            </div>

            <!-- Theme Settings -->
            <h3>Theme</h3>
            <div class="form-group">
                <select id="theme">
                    <option value="light">Light Mode</option>
                    <option value="dark">Dark Mode</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="buttons">
                <button type="button" class="btn btn-save" onclick="updateUserDetails()">Save Changes</button>
                <button type="reset" class="btn btn-cancel">Reset</button>
            </div>
        </form>
    </div>

    <script>
        function updateUserDetails() {
            // Show alert first
            alert("✅ User Details Successfully Updated!");

            // Show success message at the top
            var successMessage = document.getElementById("successMessage");
            successMessage.style.display = "block";

            // Hide the message after 3 seconds
            setTimeout(function() {
                successMessage.style.display = "none";
            }, 3000);
        }
    </script>

</body>
</html>
