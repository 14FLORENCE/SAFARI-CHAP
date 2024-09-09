<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Safari Chap - Map</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<style>
		body {
			background: rgba(0, 0, 0, 0.5) url('assets/img/background(3).jpg') no-repeat center center fixed;
			background-size: cover;
			height: 100vh;
			color: #fff;
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}

		header {
			background: rgba(0, 0, 0, 0.7);
			padding: 10px 20px;
			width: 100%;
			top: 0;
			left: 0;
			position: fixed;
			z-index: 1000;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		header h1 {
			margin: 0;
			font-size: 24px;
		}

		#map {
			height: 80vh;
			width: 100%;
			margin-top: 80px;
			border-radius: 10px;
		}

		footer {
			background-color: rgba(0, 0, 0, 0.8);
			color: white;
			padding: 10px 20px;
			text-align: center;
			width: 100%;
			position: fixed;
			bottom: 0;
			left: 0;
			z-index: 1000;
		}

		footer a {
			color: #3498db;
			text-decoration: none;
		}

		footer a:hover {
			text-decoration: underline;
		}
	</style>
</head>

<body>
	<header>
		<h1>Safari Chap Map</h1>
		<nav>
			<a href="index.php"><i class="fas fa-home"></i> Back to Home</a>
		</nav>
	</header>

	<section id="map"></section>

	<footer>
		<p>&copy; 2024 Safari Chap. All rights reserved.</p>
	</footer>

	<!-- Google Maps JavaScript API -->
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY"></script>
	<script>
		function initMap() {
			// Initialize map centered on Dar es Salaam
			const map = new google.maps.Map(document.getElementById('map'), {
				zoom: 12,
				center: { lat: -6.7924, lng: 39.2083 } // Centered on Dar es Salaam
			});

			// Add Transit Layer to display public transportation routes
			const transitLayer = new google.maps.TransitLayer();
			transitLayer.setMap(map);
		}

		// Initialize the map on window load
		window.onload = initMap;
	</script>
</body>

</html>
