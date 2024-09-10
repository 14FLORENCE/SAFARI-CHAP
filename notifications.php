<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'db_connect.php';

// Fetch user details
$user_id = $_SESSION['user_id'];

// Fetch notifications for the logged-in user
$sql = "SELECT title, message, created_at FROM notifications WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$notifications = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - Safari Chap</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your custom styles -->
    <style>
        /* Include the same styles here as in the provided code */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
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
            left: -250px;
            /* Initially hidden */
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
            transition: all 0.5s ease;
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
            z-index: 1000;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .close-btn {
            text-align: right;
            margin-right: 10px;
            font-size: 24px;
            cursor: pointer;
            padding: 10px;
        }

        .content {
            margin-left: 0;
            padding: 40px;
            width: 100%;
            transition: margin-left 0.5s ease;
        }

        .sidebar.active~.content {
            margin-left: 250px;
        }

        .notifications-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            margin-top: 100px;
            animation: fadeIn 1.5s ease-in-out;
        }

        .notification {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }

        .notification:last-child {
            border-bottom: none;
        }

        .notification h3 {
            margin: 0 0 10px;
            font-size: 1.2rem;
            color: #2c3e50;
        }

        .notification p {
            margin: 0;
            color: #333;
        }

        footer {
            background-color: #000;
            color: white;
            padding: 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 999;
            animation: fadeInFooter 1.5s ease-in-out;
        }

        footer a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #ffeb3b;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes fadeInFooter {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .toggle-btn {
                left: 10px;
                top: 10px;
                width: 40px;
                height: 40px;
            }

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

            .notifications-container {
                margin-top: 50px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="close-btn" onclick="toggleSidebar()">×</div>
        <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="home.php"><i class="fas fa-home"></i> Home</a>
        <a href="profile.php"><i class="fas fa-user"></i> Profile</a>
        <a href="settings.php"><i class="fas fa-cog"></i> Settings</a>
        <a href="notifications.php"><i class="fas fa-bell"></i> Notifications</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <button class="toggle-btn" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>

        <div class="notifications-container">
            <h2>Notifications</h2>
            <?php if (empty($notifications)): ?>
                <p>No notifications available.</p>
            <?php else: ?>
                <?php foreach ($notifications as $notification): ?>
                    <div class="notification">
                        <h3><?php echo htmlspecialchars($notification['title']); ?></h3>
                        <p><?php echo htmlspecialchars($notification['message']); ?></p>
                        <small><?php echo date('F j, Y, g:i a', strtotime($notification['created_at'])); ?></small>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Florence Sway. All Rights Reserved.</p>
    </footer>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.querySelector('.content').classList.toggle('active');
        }
    </script>
</body>

</html>
