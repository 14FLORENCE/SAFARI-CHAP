<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "safari_chap";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        echo "<p style='color:green;'>Login successful!</p>";
    } else {
        echo "<p style='color:red;'>Invalid username or password.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Safari Chap</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #000;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        header {
            background-color: #000;
            padding: 10px 20px;
            width: 100%;
            top: 0;
            left: 0;
            position: fixed;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            animation: slideDown 1.5s ease;
        }

        header h1 {
            font-size: 24px;
            color: #3498db;
            /* Blue color for Safari Chap */
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        nav a:hover {
            color: #ffeb3b;
            transform: scale(1.1);
        }

        nav a i {
            margin-right: 8px;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            animation: fadeIn 1.5s ease-in-out;
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

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
            }

            to {
                transform: translateY(0);
            }
        }

        h2 {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #3498db;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #2980b9;
            transform: translateY(-3px);
        }

        p {
            margin-top: 15px;
            color: #333;
        }

        p a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        p a:hover {
            color: #2980b9;
        }

        /* Subtle animation for the links */
        p a::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #3498db;
            transition: width 0.4s ease;
        }

        p a:hover::after {
            width: 100%;
        }

        footer {
            background-color: #000;
            color: white;
            padding: 20px 0;
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            font-size: 1rem;
            z-index: 999;
            animation: fadeInFooter 1.5s ease-in-out;
            box-shadow: 0px -5px 15px rgba(0, 0, 0, 0.2);
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #ffeb3b;
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
    </style>
</head>

<body>
    <header>
        <h1>Safari Chap</h1>
        <nav>
            <a href="index.php"><i class="fas fa-home"></i> Home</a>
            <a href="schedule.php"><i class="fas fa-bus"></i> Bus Schedule</a>
            <a href="feedback.php"><i class="fas fa-comment-dots"></i> Feedback</a>
        </nav>
    </header>

    <div class="login-container">
        <h2>Safari Chap Login</h2>
        <form action="login.php" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>

        <p>Don't have an account? <a href="register.php">Register</a></p>
        <p>Forgot your password? <a href="forgot_password.php">Reset Password</a></p>
    </div>

    <footer>
        <p>&copy; 2024 Safari Chap. All rights reserved.</p>
        <p><a href="privacy-policy.html">Privacy Policy</a></p>
    </footer>
</body>

</html>
