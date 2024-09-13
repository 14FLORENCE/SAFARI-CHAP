<?php
include 'db_connect.php';

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];

$query = "UPDATE users SET username='$username', email='$email' WHERE id='$id'";
if ($conn->query($query) === TRUE) {
	header("Location: manage_users.php");
} else {
	echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

