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
	<title>Settings - Safari Chap</title>
	<link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>

<body>
	<header>
		<h1>Settings</h1>
		<nav>
			<a href="dashboard.php">Dashboard</a>
			<a href="profile.php">Profile</a>
			<a href="home.php">Home</a>
			<a href="logout.php">Logout</a>
		</nav>
	</header>
	<main>
		<h2>Account Settings</h2>
		<form action="update_settings.php" method="POST">
			<label for="email_notifications">Email Notifications:</label>
			<input type="checkbox" id="email_notifications" name="email_notifications" <?php echo $_SESSION['email_notifications'] ? 'checked' : ''; ?>>
			<label for="privacy">Privacy Settings:</label>
			<select id="privacy" name="privacy">
				<option value="public" <?php echo $_SESSION['privacy'] === 'public' ? 'selected' : ''; ?>>Public</option>
				<option value="private" <?php echo $_SESSION['privacy'] === 'private' ? 'selected' : ''; ?>>Private
				</option>
			</select>
			<input type="submit" value="Save Settings">
		</form>
	</main>
	<footer>
		<p>&copy; 2024 Safari Chap</p>
	</footer>
</body>

</html>
