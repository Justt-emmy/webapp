<?php
require 'connect.php';
session_start();

// Regenerate session ID for security
session_regenerate_id(true);

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: logout.php");
    exit();
}

// Ensure username exists in the session before using it
$username = isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : "User";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* General styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: #f4f4f4;
        }

        /* Sidebar styles */
        .sidebar {
            width: 250px;
            background: #2c3e50;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            padding: 10px;
            margin: 5px 0;
            display: block;
            background: #34495e;
            border-radius: 5px;
            text-align: center;
        }

        .sidebar a:hover {
            background: #1abc9c;
        }

        .logout {
            margin-top: auto;
        }

        /* Main content */
        .main-content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header {
            background: white;
            padding: 14px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            width: 100%;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
            width: 100%;
            max-width: 900px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 24px;
            font-weight: bold;
            color: #3498db;
        }

        /* Chart container */
        .chart-container {
            width: 100%;
            max-width: 900px;
            background: white;
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                text-align: center;
            }
            .sidebar a {
                display: inline-block;
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard</h2>
        <a href="dashboard.php">Home</a>   
        <a href="profile.php">Profile</a>
        <a href="settings.php">Settings</a>
        <a href="help.php">Help</a>
        <a href="faq.php">FAQs</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Welcome, <?php echo $username; ?>!</h1>
        </div>

        <!-- Chart Section -->
        <div class="chart-container">
            <h2>Weekly Performance</h2>
            <canvas id="dashboardChart"></canvas>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const labels = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
            const data = {
                labels: labels,
                datasets: [
                    {
                        label: "Activity Level (%)",
                        data: [75, 80, 70, 85, 90, 60, 50],
                        backgroundColor: "rgba(54, 162, 235, 0.6)",
                        borderColor: "rgba(54, 162, 235, 1)",
                        borderWidth: 1
                    },
                    {
                        label: "Messages",
                        data: [5, 8, 4, 7, 6, 3, 2],
                        backgroundColor: "rgba(255, 99, 132, 0.6)",
                        borderColor: "rgba(255, 99, 132, 1)",
                        borderWidth: 1
                    },
                    {
                        label: "Pending Tasks",
                        data: [1, 2, 1, 3, 2, 0, 0],
                        backgroundColor: "rgba(255, 206, 86, 0.6)",
                        borderColor: "rgba(255, 206, 86, 1)",
                        borderWidth: 1
                    },
                    {
                        label: "Support Tickets",
                        data: [2, 3, 1, 4, 2, 1, 0],
                        backgroundColor: "rgba(75, 192, 192, 0.6)",
                        borderColor: "rgba(75, 192, 192, 1)",
                        borderWidth: 1
                    }
                ]
            };

            const config = {
                type: "bar",
                data: data,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            const ctx = document.getElementById("dashboardChart").getContext("2d");
            new Chart(ctx, config);
        });
    </script>

</body>
</html>
