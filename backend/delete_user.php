<?php
include 'db_connect.php';

$id = $_GET['id'];

$query = "DELETE FROM users WHERE id='$id'";
if ($conn->query($query) === TRUE) {
	header("Location: manage_users.php");
} else {
	echo "Error deleting record: " . $conn->error;
}

$conn->close();
