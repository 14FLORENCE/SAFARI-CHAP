<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Safari Chap - Bus Schedule</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<style>
		body {
			background: rgba(0, 0, 0, 0.5) url('assets/img/background(3).jpg') no-repeat center center fixed;
			background-size: cover;
			min-height: 100vh;
			color: #fff;
			margin: 0;
			font-family: Arial, sans-serif;
			display: flex;
			flex-direction: column;
		}

		header {
			background: rgba(0, 0, 0, 0.8);
			padding: 20px;
			width: 100%;
			position: fixed;
			top: 0;
			left: 0;
			z-index: 1000;
			/* Ensure header is on top */
			display: flex;
			justify-content: space-between;
			align-items: center;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
		}

		header h1 {
			margin: 0;
			font-size: 28px;
			font-weight: 600;
		}

		header nav {
			z-index: 1010;
			/* Ensure nav is above other elements */
		}

		header nav a {
			color: #3498db;
			text-decoration: none;
			font-size: 18px;
			display: flex;
			align-items: center;
			transition: color 0.3s, background-color 0.3s;
			padding: 10px 15px;
			/* Added padding */
			border-radius: 5px;
			/* Rounded corners for the button */
			background-color: rgba(0, 0, 0, 0.6);
			/* Background color for contrast */
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
			/* Added box shadow for better visibility */
		}

		header nav a:hover {
			color: #fff;
			text-decoration: none;
			/* No underline on hover */
			background-color: rgba(0, 0, 0, 0.8);
			/* Darker background on hover */
		}

		main {
			margin-top: 80px;
			width: 100%;
			padding: 20px;
			flex: 1;
			/* Allow main to take up the remaining space */
			box-sizing: border-box;
		}

		#bus-schedule {
			max-width: 1200px;
			margin: 0 auto;
			padding: 20px;
			background: rgba(0, 0, 0, 0.6);
			border-radius: 10px;
			box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
		}

		#bus-schedule h2 {
			font-size: 24px;
			margin-bottom: 20px;
			color: #3498db;
			text-align: center;
			border-bottom: 2px solid #3498db;
			padding-bottom: 10px;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			background: rgba(0, 0, 0, 0.7);
			border-radius: 10px;
			overflow: hidden;
		}

		th,
		td {
			padding: 15px;
			text-align: left;
			border-bottom: 1px solid #444;
		}

		th {
			background: rgba(0, 0, 0, 0.8);
			color: #fff;
			font-weight: 600;
		}

		tr:nth-child(even) {
			background: rgba(0, 0, 0, 0.6);
		}

		tr:hover {
			background: rgba(0, 0, 0, 0.8);
			transition: background 0.3s ease;
		}

		footer {
			background-color: rgba(0, 0, 0, 0.8);
			color: white;
			padding: 15px 20px;
			text-align: center;
			width: 100%;
			position: relative;
			/* Changed from fixed to relative */
			font-size: 14px;
		}

		footer a {
			color: #3498db;
			text-decoration: none;
			font-weight: bold;
		}

		footer a:hover {
			text-decoration: underline;
		}

		/* Responsive Design */
		@media (max-width: 768px) {
			header h1 {
				font-size: 22px;
			}

			header nav a {
				font-size: 16px;
			}

			#bus-schedule {
				padding: 15px;
			}

			table {
				font-size: 14px;
			}

			footer {
				font-size: 12px;
			}
		}
	</style>
</head>

<body>
	<header>
		<h1>Safari Chap - Bus Schedule</h1>
		<nav>
			<a href="index.php"><i class="fas fa-home"></i> Home</a>
		</nav>
	</header>

	<main>
		<section id="bus-schedule">
			<h2>DART (Mwendokasi) Routes</h2>
			<table>
				<thead>
					<tr>
						<th>Station Number</th>
						<th>Station Name</th>
					</tr>
				</thead>
				<tbody>
					<!-- Example Data for 29 Stations -->
					<?php
					$stations = [
						['1', 'Kivukoni Front'],
						['2', 'Mnazi Mmoja'],
						['3', 'Jangwani'],
						['4', 'Kariakoo'],
						['5', 'Ilala'],
						['6', 'Buguruni'],
						['7', 'Ubungo'],
						['8', 'Mbezi'],
						['9', 'Kimara'],
						['10', 'Mwenge'],
						['11', 'Magomeni'],
						['12', 'Tegeta'],
						['13', 'Gongoni'],
						['14', 'Kibaha'],
						['15', 'Kisarawe'],
						['16', 'Mlandizi'],
						['17', 'Wazo Hill'],
						['18', 'Nyerere Road'],
						['19', 'Kibamba'],
						['20', 'Jangwani (South)'],
						['21', 'Mbezi (North)'],
						['22', 'Kigamboni'],
						['23', 'Kibaha (North)'],
						['24', 'Mbezi (South)'],
						['25', 'Gongoni (East)'],
						['26', 'Kimara (West)'],
						['27', 'Mwenge (South)'],
						['28', 'Magomeni (North)'],
						['29', 'Mbezi (East)']
					];

					foreach ($stations as $station) {
						echo "<tr><td>{$station[0]}</td><td>{$station[1]}</td></tr>";
					}
					?>
				</tbody>
			</table>
		</section>
	</main>

	<footer>
		<p>&copy; 2024 Safari Chap. All rights reserved. <a href="index.php">Back to Home</a></p>
	</footer>
</body>

</html>
