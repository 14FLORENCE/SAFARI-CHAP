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
	<title>Activity Log - Safari Chap</title>
	<link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>

<body>
	<header>
		<h1>Activity Log</h1>
		<nav>
			<a href="dashboard.php">Dashboard</a>
			<a href="profile.php">Profile</a>
			<a href="settings.php">Settings</a>
			<a href="logout.php">Logout</a>
		</nav>
	</header>
	<main>
		<h2>Your Activity Log</h2>
		<table>
			<thead>
				<tr>
					<th>Date</th>
					<th>Activity</th>
				</tr>
			</thead>
			<tbody>
				<!-- Example Data -->
				<?php
				// Example log data
				$activities = [
					['2024-09-01', 'Logged in'],
					['2024-09-02', 'Updated profile'],
					// Add more log entries here
				];

				foreach ($activities as $activity) {
					echo "<tr><td>{$activity[0]}</td><td>{$activity[1]}</td></tr>";
				}
				?>
			</tbody>
		</table>
	</main>
	<footer>
		<p>&copy; 2024 Safari Chap</p>
	</footer>
</body>

</html>
