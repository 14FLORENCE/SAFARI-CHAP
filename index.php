<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Safari Chap</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Add your existing CSS styles here */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: rgba(0, 0, 0, 0.5) url('assets/img/background(1).jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            overflow-x: hidden;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        header {
            background: rgba(0, 0, 0, 0.7);
            padding: 10px 20px;
            width: 100%;
            top: 0;
            left: 0;
            position: fixed;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
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
        }

        nav a i {
            margin-right: 8px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            margin-top: 80px;
            flex: 1;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-container {
            background: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            text-align: center;
        }

        .register-container h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #ddd;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #333;
            color: #fff;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="email"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px 20px;
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 1000;
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #3498db;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header>
        <h1>Safari Chap</h1>
        <nav>
            <a href="index.html"><i class="fas fa-home"></i> Home</a>
            <a href="login.html"><i class="fas fa-sign-in-alt"></i> Login</a>
            <a href="schedule.html"><i class="fas fa-bus"></i> Bus Schedule</a>
            <a href="feedback.html"><i class="fas fa-comment-dots"></i> Feedback</a>
            <a href="payment.html"><i class="fas fa-credit-card"></i> Payment</a>
        </nav>
    </header>

    <main>
        <div class="register-container">
            <h2>Register for Safari Chap</h2>
            <form action="register.php" method="POST">
                <div class="input-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="input-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="current_location">Current Location</label>
                    <input type="text" id="current_location" name="current_location" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="register">Register</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Safari Chap. All rights reserved. | <a href="privacy-policy.html">Privacy Policy</a></p>
    </footer>

</body>

</html>
