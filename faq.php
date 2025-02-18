<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - User Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4, #fad0c4, #ffdde1);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .faq-container {
            max-width: 800px;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-weight: bold;
            font-size: 28px;
            text-transform: uppercase;
        }

        .faq {
            border-bottom: 2px solid #ddd;
            padding: 15px 0;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 8px;
        }

        .faq:hover {
            background: #f8f8f8;
        }

        .faq h3 {
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #3498db;
            cursor: pointer;
            transition: 0.3s;
        }

        .faq h3:hover {
            color: #ff6b81;
        }

        .faq p {
            display: none;
            font-size: 16px;
            color: #555;
            margin-top: 10px;
            padding: 10px;
            background: #f4f4f4;
            border-left: 5px solid #3498db;
            border-radius: 5px;
        }

        .icon {
            font-size: 22px;
            font-weight: bold;
            transition: transform 0.3s ease;
        }

        .faq.active h3 .icon {
            transform: rotate(180deg);
            color: #ff6b81;
        }

        .faq.active p {
            display: block;
            animation: slideDown 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="faq-container">
        <h2>Frequently Asked Questions</h2>

        <div class="faq">
            <h3 onclick="toggleFAQ(0)">1. How is user authentication handled? <span class="icon">+</span></h3>
            <p>We use PHP sessions for authentication, where user credentials are verified against the MySQL database.</p>
        </div>

        <div class="faq">
            <h3 onclick="toggleFAQ(1)">2. How are passwords stored securely? <span class="icon">+</span></h3>
            <p>Passwords are hashed using PHP's <code>password_hash()</code> function before being stored in the database for security.</p>
        </div>

        <div class="faq">
            <h3 onclick="toggleFAQ(2)">3. What happens when a user logs out? <span class="icon">+</span></h3>
            <p>On logout, the session is destroyed using <code>session_destroy()</code>, and the user is redirected to the login page.</p>
        </div>

        <div class="faq">
            <h3 onclick="toggleFAQ(3)">4. How do I log out securely? <span class="icon">+</span></h3>
            <p>Click the "Logout" button on the sidebar to end your session. This prevents unauthorized access to your account.</p>
        </div>

        <div class="faq">
            <h3 onclick="toggleFAQ(4)">5. How can users enable or disable notifications? <span class="icon">+</span></h3>
            <p>Notifications can be toggled on or off from the settings page, where users can choose between email and SMS alerts.</p>
        </div>

        <div class="faq">
            <h3 onclick="toggleFAQ(5)">6. How do I update my profile information? <span class="icon">+</span></h3>
            <p>Profile updates can be made through the settings page, where users can edit their name, username, email, and password.</p>
        </div>

        <div class="faq">
            <h3 onclick="toggleFAQ(6)">7. How does the system prevent unauthorized access? <span class="icon">+</span></h3>
            <p>The system checks user sessions on every page, and users without an active session are redirected to the login page.</p>
        </div>

    </div>

    <script>
        function toggleFAQ(index) {
            let faqs = document.querySelectorAll('.faq');
            let icons = document.querySelectorAll('.icon');

            if (faqs[index].classList.contains("active")) {
                faqs[index].classList.remove("active");
                icons[index].textContent = "+";
            } else {
                faqs.forEach((faq, i) => {
                    faq.classList.remove("active");
                    icons[i].textContent = "+";
                });
                faqs[index].classList.add("active");
                icons[index].textContent = "-";
            }
        }
    </script>

</body>
</html>
