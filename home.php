<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Safari Chap</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your custom styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: url('assets/img/background.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        /* Sidebar Styles */
        .sidebar {
            background-color: #333;
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: -250px; /* Initially hidden */
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
            transition: all 0.5s ease;
            z-index: 1000;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar a {
            display: block;
            color: #fff;
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            transition: background 0.3s, color 0.3s;
        }

        .sidebar a:hover {
            background-color: #575757;
            color: #ffeb3b;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .toggle-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #333;
            color: white;
            padding: 10px;
            cursor: pointer;
            border: none;
            border-radius: 50%;
            z-index: 1001;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        /* Content Styles */
        .content {
            margin-left: 0;
            padding: 20px;
            width: 100%;
            transition: margin-left 0.5s ease;
        }

        .sidebar.active ~ .content {
            margin-left: 250px;
        }

        .hero {
            background: rgba(255, 255, 255, 0.8);
            padding: 50px 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-bottom: 30px;
        }

        .hero h1 {
            font-size: 3rem;
            color: #333;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 1.2rem;
            color: #666;
        }

        .cta-button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 1.2rem;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #2980b9;
        }

        .section {
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }

        .section h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        .section p {
            font-size: 1.1rem;
            color: #666;
        }

        .testimonials {
            background: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .testimonials h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        .testimonial {
            margin-bottom: 20px;
        }

        .testimonial p {
            font-size: 1.1rem;
            color: #666;
            margin: 0;
        }

        .testimonial cite {
            display: block;
            font-size: 1rem;
            color: #999;
            margin-top: 5px;
        }

        .footer {
            background: #333;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 30px;
        }

        .footer a {
            color: #3498db;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .sidebar {
                width: 250px;
                left: -250px;
            }

            .sidebar.active {
                left: 0;
            }

            .content {
                margin-left: 0;
            }

            .hero {
                margin-top: 50px;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <div class="close-btn" onclick="toggleSidebar()">×</div>
        <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="home.php"><i class="fas fa-home"></i> Home</a>
        <a href="profile.php"><i class="fas fa-user"></i> Profile</a>
        <a href="settings.php"><i class="fas fa-cog"></i> Settings</a>
        <a href="notifications.php"><i class="fas fa-bell"></i> Notifications</a>
        <a href="payment.php"><i class="fas fa-credit-card"></i> Payment</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>

    <div class="content">
        <div class="hero">
            <h1>Welcome to Safari Chap</h1>
            <p>Your go-to solution for reliable bus schedules and information in Dar es Salaam.</p>
            <a href="services.php" class="cta-button">Explore Our Services</a>
        </div>

        <div class="section">
            <h2>About Us</h2>
            <p>Safari Chap is committed to providing the best transportation solutions in Dar es Salaam. We offer reliable and up-to-date bus schedules to help you travel with ease.</p>
        </div>

        <div class="section">
            <h2>Key Features</h2>
            <p>• Real-time Bus Tracking</p>
            <p>• Interactive Bus Schedules</p>
            <p>• Easy Ticket Booking</p>
            <p>• Customer Support</p>
        </div>

        <div class="testimonials">
            <h2>What Our Users Say</h2>
            <div class="testimonial">
                <p>"Safari Chap has made my daily commute so much easier. The bus schedules are always accurate!"</p>
                <cite>- A. User</cite>
            </div>
            <div class="testimonial">
                <p>"The interactive map is a game-changer. I can plan my routes and book tickets all in one place."</p>
                <cite>- B. User</cite>
            </div>
        </div>

        <div class="footer">
            <p>&copy; 2024 Safari Chap. All rights reserved. | <a href="privacy.php">Privacy Policy</a> | <a href="terms.php">Terms of Service</a></p>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.querySelector('.content').classList.toggle('active');
        }
    </script>
</body>

</html>
