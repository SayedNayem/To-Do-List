<?php
$host = "localhost"; // Hostname
$username = "your_username"; // MySQL username
$password = "your_password"; // MySQL password
$database = "todo_db"; // Database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

