<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard - Safari Chap</title>
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

		.sidebar {
			height: 100%;
			width: 250px;
			position: fixed;
			top: 0;
			left: 0;
			background-color: #333;
			overflow-x: hidden;
			padding-top: 60px;
			transition: transform 0.3s ease;
			transform: translateX(0);
			z-index: 1000;
			border-right: 1px solid #444;
		}

		.sidebar.collapsed {
			transform: translateX(-100%);
		}

		.sidebar a {
			padding: 15px 20px;
			text-decoration: none;
			font-size: 18px;
			color: #ccc;
			display: flex;
			align-items: center;
			transition: background-color 0.3s, color 0.3s;
			border-bottom: 1px solid #444;
		}

		.sidebar a:last-child {
			border-bottom: none;
		}

		.sidebar a i {
			margin-right: 10px;
		}

		.sidebar a:hover {
			background-color: #575757;
			color: #fff;
			animation: hoverAnimation 0.5s ease;
		}

		@keyframes hoverAnimation {
			0% {
				transform: scale(1);
			}

			50% {
				transform: scale(1.1);
			}

			100% {
				transform: scale(1);
			}
		}

		.main-content {
			margin-left: 250px;
			padding: 20px;
			transition: margin-left 0.3s ease;
			margin-top: 60px;
			overflow-y: auto;
			height: calc(100vh - 80px);
		}

		.main-content.expanded {
			margin-left: 0;
		}

		header {
			background: rgba(0, 0, 0, 0.7);
			padding: 10px 20px;
			width: calc(100% - 250px);
			position: fixed;
			top: 0;
			left: 250px;
			z-index: 1000;
			display: flex;
			justify-content: space-between;
			align-items: center;
			color: #fff;
		}

		header h1 {
			margin: 0;
			font-size: 24px;
		}

		.flash-message {
			display: block;
			background-color: #3498db;
			color: white;
			padding: 15px;
			border-radius: 5px;
			position: fixed;
			top: 20px;
			right: 20px;
			z-index: 1000;
			animation: fadeOut 3s forwards;
		}

		@keyframes fadeOut {
			from {
				opacity: 1;
			}

			to {
				opacity: 0;
			}
		}

		footer {
			background-color: rgba(0, 0, 0, 0.8);
			color: white;
			text-align: center;
			padding: 15px 20px;
			width: 100%;
			position: fixed;
			bottom: 0;
			left: 0;
			z-index: 1000;
			box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.3);
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

		.toggle-btn {
			position: fixed;
			top: 20px;
			left: 20px;
			background-color: #333;
			color: #fff;
			border: none;
			padding: 10px 20px;
			cursor: pointer;
			font-size: 18px;
			border-radius: 5px;
			z-index: 1001;
			transition: background-color 0.3s;
		}

		.toggle-btn:hover {
			background-color: #575757;
		}

		.slideshow-container {
			position: relative;
			max-width: 100%;
			margin: 20px auto;
			border-radius: 10px;
			overflow: hidden;
			background: rgba(0, 0, 0, 0.6);
		}

		.slide {
			display: none;
		}

		.slide img {
			width: 100%;
			height: 500px;
			object-fit: cover;
			border-radius: 10px;
		}

		.welcome-container {
			background: rgba(0, 0, 0, 0.6);
			padding: 20px;
			border-radius: 10px;
			margin: 20px auto;
			max-width: 800px;
			text-align: center;
			color: #ddd;
		}

		.welcome-container h2 {
			font-size: 28px;
			margin-bottom: 10px;
		}

		.welcome-container p {
			font-size: 18px;
		}

		@media (max-width: 768px) {
			.sidebar {
				width: 200px;
				padding-top: 50px;
			}

			.main-content {
				margin-left: 200px;
			}

			header {
				width: calc(100% - 200px);
				left: 200px;
			}
		}
	</style>
</head>

<body>
	<button class="toggle-btn" id="toggle-btn" onclick="toggleSidebar()">☰</button>

	<div class="sidebar" id="sidebar">
		<a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
		<a href="home.php"><i class="fas fa-home"></i> Home</a>
		<a href="profile.php"><i class="fas fa-user"></i> Profile</a>
		<a href="settings.php"><i class="fas fa-cog"></i> Settings</a>
		<a href="notifications.php"><i class="fas fa-bell"></i> Notifications</a>
		<a href="payment.php"><i class="fas fa-credit-card"></i> Payment</a>
		<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
	</div>

	<div class="main-content" id="main-content">
		<header>
			<h1>Dashboard</h1>
		</header>

		<?php if (isset($flash_message)): ?>
			<div class="flash-message"><?php echo htmlspecialchars($flash_message); ?></div>
		<?php endif; ?>

		<main>
			<div class="welcome-container">
				<h2>Welcome, <?php echo htmlspecialchars($username); ?></h2>
				<p>Thank you for using our system. We hope you have a great experience!</p>
			</div>

			<div class="slideshow-container">
				<div class="slide">
					<img src="assets/img/image1.jpg" alt="Slideshow Image 1">
				</div>
				<div class="slide">
					<img src="assets/img/image2.jpg" alt="Slideshow Image 2">
				</div>
				<div class="slide">
					<img src="assets/img/image3.jpg" alt="Slideshow Image 3">
				</div>
				<div class="slide">
					<img src="assets/img/image4.jpg" alt="Slideshow Image 4">
				</div>
				<div class="slide">
					<img src="assets/img/image5.jpg" alt="Slideshow Image 5">
				</div>
				<div class="slide">
					<img src="assets/img/image6.jpg" alt="Slideshow Image 6">
				</div>
			</div>
		</main>
	</div>

	<footer>
		<p>&copy; 2024 Safari Chap. All rights reserved. <a href="#">Privacy Policy</a> | <a href="#">Terms of
				Service</a></p>
	</footer>

	<script>
		let currentSlide = 0;
		const slides = document.querySelectorAll('.slide');

		function showSlide(index) {
			slides.forEach(slide => slide.style.display = 'none');
			slides[index].style.display = 'block';
		}

		function nextSlide() {
			currentSlide = (currentSlide + 1) % slides.length;
			showSlide(currentSlide);
		}

		setInterval(nextSlide, 5000); // Change image every 5 seconds

		window.onload = () => showSlide(currentSlide);

		function toggleSidebar() {
			const sidebar = document.getElementById('sidebar');
			const mainContent = document.getElementById('main-content');
			sidebar.classList.toggle('collapsed');
			mainContent.classList.toggle('expanded');
		}
	</script>
</body>

</html>
