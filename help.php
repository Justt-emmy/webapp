<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help - User Dashboard</title>
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

        .help-container {
            width: 90%;
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .faq {
            margin-bottom: 20px;
        }

        .faq-item {
            margin-bottom: 15px;
        }

        .faq-question {
            font-weight: bold;
            cursor: pointer;
            background: #3498db;
            color: white;
            padding: 10px;
            border-radius: 5px;
            display: block;
            width: 100%;
            text-align: left;
            border: none;
            transition: 0.3s;
        }

        .faq-question:hover {
            background: #2980b9;
        }

        .faq-answer {
            display: none;
            padding: 10px;
            border-left: 3px solid #3498db;
            background: #ecf0f1;
            margin-top: 5px;
            border-radius: 5px;
        }

        .contact-support {
            text-align: center;
            margin-top: 20px;
        }

        .btn-contact {
            background-color: #e74c3c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
        }

        .btn-contact:hover {
            background-color: #c0392b;
        }

    </style>
</head>
<body>

    <div class="help-container">
        <h2>Help & Support</h2>

        <div class="faq">
            <div class="faq-item">
                <button class="faq-question">How do I reset my password?</button>
                <div class="faq-answer">
                    Go to the settings page and enter a new password under the "Change Password" section.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">How can I update my profile details?</button>
                <div class="faq-answer">
                    Click on the profile page in your dashboard and update the necessary fields.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">How do I enable notifications?</button>
                <div class="faq-answer">
                    Navigate to the settings page and toggle the email or SMS notifications option.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">What should I do if I can't log in?</button>
                <div class="faq-answer">
                    Ensure your username and password are correct. If you forgot your password, use the password reset feature.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">How do I contact support?</button>
                <div class="faq-answer">
                    Click on the "Contact Support" button below and send an email to support@justt_tech.com.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">How can I delete my account?</button>
                <div class="faq-answer">
                    To delete your account, please contact support at support@justt_tech.com.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">Why am I not receiving email notifications?</button>
                <div class="faq-answer">
                    Check your spam folder. If the issue persists, go to settings and enable email notifications.
                </div>
            </div>
        </div>

        <div class="contact-support">
            <button class="btn-contact" onclick="contactSupport()">Contact Support</button>
        </div>
    </div>

    <script>
        // FAQ Toggle Functionality
        document.querySelectorAll('.faq-question').forEach(button => {
            button.addEventListener('click', () => {
                let answer = button.nextElementSibling;
                answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
            });
        });

        function contactSupport() {
            alert("📧 Please contact support at: support@justt_tech.com.");
        }
    </script>

</body>
</html>
