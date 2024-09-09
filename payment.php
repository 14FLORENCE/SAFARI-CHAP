<?php
// Start session and check if user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost"; // Adjust as needed
$username = "root";        // Adjust as needed
$password = "";            // Adjust as needed
$dbname = "safari_chap";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if (isset($_POST['amount'], $_POST['payment_method'], $_POST['stripeToken'])) {
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    $stripeToken = $_POST['stripeToken']; // Placeholder for further Stripe processing

    $user_id = $_SESSION['user_id']; // Get user ID from session

    // Validate payment method
    $valid_payment_methods = ['mpesa', 'airtel', 'tigo', 'halopesa'];
    if (!in_array($payment_method, $valid_payment_methods)) {
        echo "Invalid payment method.";
        exit();
    }

    // Prepare and bind statement
    $stmt = $conn->prepare("INSERT INTO payments (user_id, amount, payment_method, payment_status) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $payment_status = 'pending'; // Initial status, update it later based on actual payment result
    $stmt->bind_param("idss", $user_id, $amount, $payment_method, $payment_status);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Payment record saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
} else {
    echo "Form data is missing.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safari Chap - Ticket Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Add your styles.css link here -->
    <style>
        /* General Reset */
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

        /* Button to toggle sidebar */
        .toggle-btn {
            position: absolute;
            left: 10px;
            top: 10px;
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            z-index: 1000;
        }

        .toggle-btn:hover {
            background-color: #2980b9;
        }

        /* Content */
        .content {
            margin-left: 0;
            padding: 40px;
            width: 100%;
            transition: margin-left 0.5s ease;
        }

        .sidebar.active~.content {
            margin-left: 250px;
        }

        /* Payment Form */
        .payment-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            animation: fadeIn 1.5s ease-in-out;
            margin: 0 auto;
            margin-top: 100px;
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

        h2 {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            transition: border 0.3s ease;
            margin-bottom: 20px;
        }

        input[type="number"]:focus,
        select:focus {
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

        /* Footer */
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
                margin-bottom: 20px;
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

            .payment-container {
                margin-top: 50px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar with menu button inside -->
    <div class="sidebar" id="sidebar">
        <a href="home.php"><i class="fas fa-home"></i> Home</a>
        <a href="profile.php"><i class="fas fa-user"></i> Profile</a>
        <a href="settings.php"><i class="fas fa-cog"></i> Settings</a>
        <a href="notifications.php"><i class="fas fa-bell"></i> Notifications</a>
        <a href="payment.php"><i class="fas fa-credit-card"></i> Payment</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Menu button to toggle the sidebar -->
    <button class="toggle-btn" id="toggle-btn" onclick="toggleSidebar()">☰ Menu</button>

    <div class="content">
        <div class="payment-container">
            <h2>Pay for Your Ticket</h2>
            <form action="payment.php" method="POST">
                <label for="amount">Amount (TZS):</label>
                <input type="number" id="amount" name="amount" placeholder="Enter amount" required>

                <label for="payment_method">Payment Method:</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="mpesa">M-Pesa</option>
                    <option value="airtel">Airtel Money</option>
                    <option value="tigo">Tigo Pesa</option>
                    <option value="halopesa">Halo Pesa</option>
                </select>

                <!-- Stripe token input placeholder for future processing -->
                <input type="hidden" name="stripeToken" value="your-stripe-token-here">

                <button type="submit">Submit Payment</button>
            </form>
        </div>
    </div>

    <footer>
        <p>© 2024 Florence Sway - Safari Chap. All Rights Reserved. | <a href="terms.php">Terms & Conditions</a></p>
    </footer>

    <!-- JavaScript to toggle sidebar -->
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active'); // Toggle the 'active' class
        }
    </script>

</body>

</html>
