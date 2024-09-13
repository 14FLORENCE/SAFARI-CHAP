<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Manage Buses</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<style>
		/* Include the same CSS as in dashboard.php */
		/* ... (same style as dashboard.php) */
		body {
			font-family: Arial, sans-serif;
			background-image: url('assets/img/background.jpg');
			background-size: cover;
			margin: 0;
			padding: 0;
		}

		.sidebar {
			width: 250px;
			background: #111;
			height: 100vh;
			position: fixed;
			top: 0;
			left: -250px;
			transition: 0.3s;
			z-index: 1;
		}

		.sidebar.open {
			left: 0;
		}

		.sidebar h2 {
			color: white;
			text-align: center;
			padding: 15px;
			margin-top: 0;
		}

		.sidebar ul {
			list-style-type: none;
			padding: 0;
		}

		.sidebar ul li {
			padding: 20px;
			text-align: left;
		}

		.sidebar ul li a {
			text-decoration: none;
			color: white;
			display: block;
			font-size: 18px;
		}

		.sidebar ul li a i {
			margin-right: 10px;
		}

		.sidebar ul li a:hover {
			background: #575757;
		}

		.sidebar-toggle {
			position: absolute;
			top: 20px;
			left: 260px;
			background: #111;
			color: white;
			padding: 10px;
			cursor: pointer;
			border: none;
			font-size: 16px;
		}

		.main-content {
			margin-left: 270px;
			padding: 20px;
			transition: margin-left 0.3s;
		}

		.main-content.full {
			margin-left: 20px;
		}

		.header {
			background-color: #111;
			color: white;
			padding: 10px;
			text-align: center;
		}

		.stats {
			display: flex;
			justify-content: space-around;
			margin-top: 20px;
		}

		.stat-item {
			background: #333;
			color: white;
			padding: 20px;
			border-radius: 5px;
			width: 150px;
			text-align: center;
		}
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
		<h1>Manage Buses</h1>
		<?php
		// Fetch buses from the database and display them
		$query = "SELECT * FROM buses";
		$result = $conn->query($query);

		echo "<table>";
		echo "<tr><th>ID</th><th>Bus Name</th><th>Route</th><th>Action</th></tr>";
		while ($row = $result->fetch_assoc()) {
			echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['bus_name']}</td>
                <td>{$row['route']}</td>
                <td>
                    <a href='edit_bus.php?id={$row['id']}'>Edit</a> |
                    <a href='delete_bus.php?id={$row['id']}'>Delete</a>
                </td>
            </tr>";
		}
		echo "</table>";
		?>
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
