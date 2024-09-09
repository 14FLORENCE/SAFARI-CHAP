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
	<link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>

<body>
	<header>
		<h1>Home</h1>
		<nav>
			<a href="dashboard.php">Dashboard</a>
			<a href="profile.php">Profile</a>
			<a href="settings.php">Settings</a>
			<a href="logout.php">Logout</a>
		</nav>
	</header>
	<main>
		<h2>Welcome to Safari Chap!</h2>
		<p>Here you can find various resources and links.</p>
		<!-- Add more home page content here -->
	</main>
	<footer>
		<p>&copy; 2024 Safari Chap</p>
	</footer>
</body>

</html>
