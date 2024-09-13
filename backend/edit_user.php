<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Edit User</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<style>
		/* Include the same CSS as in dashboard.php */
		/* ... (same style as dashboard.php) */
	</style>
</head>

<body>
	<div class="sidebar">
		<h2>Admin Panel</h2>
		<ul>
			<li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
			<li><a href="manage_users.php"><i class="fas fa-users"></i>Manage Users</a></li>
			<li><a href="manage_buses.php"><i class="fas fa-bus"></i>Manage Buses</a></li>
			<li><a href="manage_payments.php"><i class="fas fa-money-bill-wave"></i>Manage Payments</a></li>
			<li><a href="manage_notifications.php"><i class="fas fa-bell"></i>Manage Notifications</a></li>
			<li><a href="manage_feedback.php"><i class="fas fa-comment"></i>Feedback</a></li>
			<li><a href="settings.php"><i class="fas fa-cogs"></i>Settings</a></li>
			<li><a href="admin_logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
		</ul>
	</div>

	<button id="sidebar-toggle" class="sidebar-toggle">☰</button>

	<div class="main-content">
		<h1>Edit User</h1>
		<?php
		$user_id = $_GET['id'];
		$query = "SELECT * FROM users WHERE id='$user_id'";
		$result = $conn->query($query);
		$user = $result->fetch_assoc();
		?>
		<form action="update_user.php" method="post">
			<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required><br>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>
			<input type="submit" value="Update User">
		</form>
	</div>

	<script>
		document.getElementById('sidebar-toggle').addEventListener('click', function () {
			var sidebar = document.querySelector('.sidebar');
			var mainContent = document.querySelector('.main-content');

			if (sidebar.classList.contains('open')) {
				sidebar.classList.remove('open');
				mainContent.classList.add('full');
			} else {
				sidebar.classList.add('open');
				mainContent.classList.remove('full');
			}
		});
	</script>
</body>

</html>
