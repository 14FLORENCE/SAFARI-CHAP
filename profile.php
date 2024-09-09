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
	<title>Profile - Safari Chap</title>
	<link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>

<body>
	<header>
		<h1>Profile</h1>
		<nav>
			<a href="dashboard.php">Dashboard</a>
			<a href="settings.php">Settings</a>
			<a href="logout.php">Logout</a>
		</nav>
	</header>
	<main>
		<h2>Your Profile</h2>
		<form action="update_profile.php" method="POST">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username"
				value="<?php echo htmlspecialchars($_SESSION['username']); ?>" required>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>"
				required>
			<input type="submit" value="Update Profile">
		</form>
	</main>
	<footer>
		<p>&copy; 2024 Safari Chap</p>
	</footer>
</body>

</html>
