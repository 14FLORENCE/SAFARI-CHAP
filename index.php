<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Safari Chap</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Arial', sans-serif;
		}

		body {
			background: rgba(0, 0, 0, 0.5) url('assets/img/background(3).jpg') no-repeat center center fixed;
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

		.welcome-container {
			background: rgba(0, 0, 0, 0.6);
			padding: 60px;
			border-radius: 10px;
			width: 90%;
			max-width: 1200px;
			text-align: center;
			animation: fadeIn 2s ease-in-out;
		}

		.welcome-container h2 {
			font-size: 48px;
			margin-bottom: 10px;
		}

		.welcome-container p {
			font-size: 20px;
			margin: 20px 0;
		}

		.welcome-container button {
			background-color: #4CAF50;
			color: white;
			border: none;
			padding: 15px 30px;
			font-size: 16px;
			border-radius: 5px;
			cursor: pointer;
			display: flex;
			align-items: center;
			animation: buttonFadeIn 3s ease-in-out;
		}

		.welcome-container button i {
			margin-right: 10px;
		}

		.welcome-container button:hover {
			background-color: #45a049;
		}

		/* Animations */
		@keyframes fadeIn {
			0% {
				opacity: 0;
				transform: scale(0.8);
			}

			100% {
				opacity: 1;
				transform: scale(1);
			}
		}

		@keyframes buttonFadeIn {
			0% {
				opacity: 0;
			}

			100% {
				opacity: 1;
			}
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
			animation: fadeIn 1.5s ease-in-out;
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
			<a href="index.php"><i class="fas fa-home"></i> Home</a>
			<a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
			<a href="schedule.php"><i class="fas fa-bus"></i> Bus Schedule</a>
			<a href="feedback.php"><i class="fas fa-comment-dots"></i> Feedback</a>
			<a href="payment.php"><i class="fas fa-credit-card"></i> Payment</a>
		</nav>
	</header>

	<main>
		<div class="welcome-container">
			<h2>Welcome to Safari Chap!</h2>
			<p>Your ultimate travel companion in Dar-es-Salaam.</p>
			<p>
				At Safari Chap, we are committed to providing a seamless and reliable travel experience. Explore bus
				schedules, book tickets, provide feedback, and make payments conveniently.
			</p>
			<button onclick="location.href='map.php'">
				<i class="fas fa-map-marker-alt"></i> View Map
			</button>
		</div>
	</main>

	<footer>
		<p>&copy; 2024 Safari Chap. All rights reserved. | <a href="privacy_policy.php">Privacy Policy</a></p>
	</footer>

</body>

</html>
