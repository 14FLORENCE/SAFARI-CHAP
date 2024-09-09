<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Privacy Policy - Safari Chap</title>
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
			background-image: url('assets/img/background.jpg');
			/* Path to your background image */
			background-size: cover;
			background-position: center;
			background-attachment: fixed;
			height: 100vh;
			display: flex;
			flex-direction: column;
			justify-content: center;
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
			transition: transform 0.3s ease, color 0.3s ease;
		}

		nav a:hover {
			color: #ffeb3b;
			transform: scale(1.1);
		}

		nav a i {
			margin-right: 8px;
		}

		.content-container {
			background-color: rgba(255, 255, 255, 0.9);
			padding: 40px;
			border-radius: 12px;
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
			max-width: 800px;
			width: 100%;
			margin-top: 60px;
			/* Space for fixed header */
			margin-bottom: 80px;
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

		h2 {
			font-size: 2rem;
			color: #2c3e50;
			margin-bottom: 20px;
			text-align: center;
		}

		p {
			line-height: 1.6;
			margin-bottom: 20px;
			color: #333;
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

	<div class="content-container">
		<h2>Privacy Policy</h2>
		<p>
			At Safari Chap, we are committed to protecting your privacy. This Privacy Policy explains how we collect,
			use, and protect your personal information.
		</p>
		<p>
			<strong>1. Information We Collect:</strong> We may collect personal information such as your name, email
			address, and payment information when you use our services.
		</p>
		<p>
			<strong>2. How We Use Your Information:</strong> The information we collect is used to provide and improve
			our services, process transactions, and communicate with you about updates and promotions.
		</p>
		<p>
			<strong>3. Data Security:</strong> We take reasonable measures to protect your personal information from
			unauthorized access, disclosure, or alteration.
		</p>
		<p>
			<strong>4. Third-Party Services:</strong> We may use third-party services for payment processing and other
			functions. These third parties have their own privacy policies.
		</p>
		<p>
			<strong>5. Changes to This Privacy Policy:</strong> We may update this Privacy Policy from time to time. Any
			changes will be posted on this page.
		</p>
		<p>
			<strong>6. Contact Us:</strong> If you have any questions or concerns about our Privacy Policy, please
			contact us at support@safarichap.com.
		</p>
	</div>

	<footer>
		<p>&copy; 2024 Safari Chap. All rights reserved.</p>
		<p><a href="index.php">Back to Home</a></p>
	</footer>
</body>

</html>
