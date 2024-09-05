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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Reset and basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #1e3c72;
            background: linear-gradient(to bottom, #1e3c72, #2a5298);
            font-family: 'Poppins', sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        header {
            width: 100%;
            background: #001f3f;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
            animation: slideDown 1.2s ease-out;
        }

        header h1 {
            font-size: 2rem;
            color: #ffd700;
            transition: color 0.3s ease-in-out;
        }

        header h1:hover {
            color: #33ccff;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            margin-left: 20px;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #ffd700;
        }

        .container {
            background: rgba(0, 31, 63, 0.8);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 500px;
            margin-top: 100px;
            animation: fadeInUp 1.5s ease-in-out;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #ffd700;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background-color: #001f3f;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #ffd700;
            color: #001f3f;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
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

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #001f3f;
            color: white;
            font-size: 0.9rem;
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
        <div class="header">
            <h3>We Value Your Feedback!</h3>
        </div>
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
