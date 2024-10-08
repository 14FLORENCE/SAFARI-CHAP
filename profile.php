<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	header("Location: login.php");
	exit();
}

require 'db_connect.php';

// Fetch user details
$user_id = $_SESSION['user_id'];
$sql = "SELECT username, email, first_name, last_name, current_location FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Update user details
	$username = $_POST['username'];
	$email = $_POST['email'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$current_location = $_POST['current_location'];

	$update_sql = "UPDATE users SET username = ?, email = ?, first_name = ?, last_name = ?, current_location = ? WHERE id = ?";
	$update_stmt = $conn->prepare($update_sql);
	$update_stmt->bind_param("sssssi", $username, $email, $first_name, $last_name, $current_location, $user_id);

	if ($update_stmt->execute()) {
		echo "<script>alert('Profile updated successfully');</script>";
	} else {
		echo "<script>alert('Error updating profile');</script>";
	}
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile - Safari Chap</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="styles.css"> <!-- Link to your custom styles -->
	<style>
		/* Include the same styles here as in the provided code */
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

		.toggle-btn {
			position: absolute;
			top: 10px;
			left: 10px;
			background-color: #333;
			color: white;
			padding: 10px;
			cursor: pointer;
			border: none;
			border-radius: 50%;
			z-index: 1000;
			width: 40px;
			height: 40px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 18px;
		}

		.close-btn {
			text-align: right;
			margin-right: 10px;
			font-size: 24px;
			cursor: pointer;
			padding: 10px;
		}

		.content {
			margin-left: 0;
			padding: 40px;
			width: 100%;
			transition: margin-left 0.5s ease;
		}

		.sidebar.active~.content {
			margin-left: 250px;
		}

		.profile-container {
			background-color: rgba(255, 255, 255, 0.9);
			padding: 40px;
			border-radius: 12px;
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
			max-width: 500px;
			width: 100%;
			text-align: center;
			margin: 0 auto;
			margin-top: 100px;
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

		input[type="text"],
		input[type="email"] {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 6px;
			outline: none;
			transition: border 0.3s ease;
			margin-bottom: 20px;
		}

		input[type="text"]:focus,
		input[type="email"]:focus {
			border-color: #3498db;
		}

		input[type="submit"] {
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

		input[type="submit"]:hover {
			background-color: #2980b9;
			transform: translateY(-3px);
		}

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
				left: 10px;
				top: 10px;
				width: 40px;
				height: 40px;
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

			.profile-container {
				margin-top: 50px;
			}
		}
	</style>
</head>

<body>
	<!-- Sidebar -->
	<div class="sidebar" id="sidebar">
		<div class="close-btn" onclick="toggleSidebar()">×</div>
		<a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
		<a href="home.php"><i class="fas fa-home"></i> Home</a>
		<a href="profile.php"><i class="fas fa-user"></i> Profile</a>
		<a href="settings.php"><i class="fas fa-cog"></i> Settings</a>
		<a href="notifications.php"><i class="fas fa-bell"></i> Notifications</a>
		<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
	</div>

	<!-- Main Content -->
	<div class="content">
		<button class="toggle-btn" onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>

		<div class="profile-container">
			<h2>Profile</h2>
			<form method="post" action="profile.php">
				<label for="username">Username</label>
				<input type="text" id="username" name="username"
					value="<?php echo htmlspecialchars($user['username']); ?>" required>

				<label for="email">Email</label>
				<input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"
					required>

				<label for="first_name">First Name</label>
				<input type="text" id="first_name" name="first_name"
					value="<?php echo htmlspecialchars($user['first_name']); ?>" required>

				<label for="last_name">Last Name</label>
				<input type="text" id="last_name" name="last_name"
					value="<?php echo htmlspecialchars($user['last_name']); ?>" required>

				<label for="current_location">Current Location</label>
				<input type="text" id="current_location" name="current_location"
					value="<?php echo htmlspecialchars($user['current_location']); ?>" required>

				<input type="submit" value="Update Profile">
			</form>
		</div>
	</div>

	<!-- Footer -->
	<footer>
		<p>&copy; 2024 Florence Sway. All Rights Reserved.</p>
	</footer>

	<script>
		function toggleSidebar() {
			document.getElementById('sidebar').classList.toggle('active');
			document.querySelector('.content').classList.toggle('active');
		}
	</script>
</body>

</html>
