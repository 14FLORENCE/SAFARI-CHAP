<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "safari_chap";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_feedback'])) {
    $rating = htmlspecialchars($_POST['rating']);
    $comment = htmlspecialchars($_POST['comment']);

    $stmt = $conn->prepare("INSERT INTO feedback (rating, comment) VALUES (?, ?)");
    $stmt->bind_param("ss", $rating, $comment);

    if ($stmt->execute()) {
        $message = "<div class='alert alert-success'>Feedback submitted successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - Safari Chap</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-image: url('assets/img/background.jpg');
            /* Path to your background image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
            overflow-y: auto;
            /* Allows scrolling if content exceeds viewport */
        }

        header {
            background-color: #000;
            padding: 10px 20px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
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
            transition: color 0.3s, transform 0.3s;
        }

        nav a:hover {
            color: #ffeb3b;
            transform: scale(1.1);
        }

        nav a i {
            margin-right: 8px;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 90%;
            text-align: center;
            margin-top: 80px;
            /* Space for fixed header */
            margin-bottom: 60px;
            /* Space for footer */
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

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            transition: border 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #3498db;
        }

        .btn-submit {
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

        .btn-submit:hover {
            background-color: #2980b9;
            transform: translateY(-3px);
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
            box-shadow: 0px -5px 15px rgba(0, 0, 0, 0.2);
            animation: fadeInFooter 1.5s ease-in-out;
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
            <a href="schedule.php"><i class="fas fa-calendar-alt"></i> Bus Schedule</a>
        </nav>
    </header>

    <div class="container">
        <h2>We Value Your Feedback!</h2>
        <?php echo $message; ?>
        <form action="feedback.php" method="POST">
            <div class="form-group">
                <label for="rating">Rating</label>
                <select id="rating" name="rating" required>
                    <option value="">Choose a rating</option>
                    <option value="1">1 - Very Poor</option>
                    <option value="2">2 - Poor</option>
                    <option value="3">3 - Average</option>
                    <option value="4">4 - Good</option>
                    <option value="5">5 - Excellent</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea id="comment" name="comment" rows="4" required></textarea>
            </div>
            <button type="submit" name="submit_feedback" class="btn-submit">Submit Feedback</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Safari Chap. All rights reserved.</p>
    </footer>
</body>

</html>
