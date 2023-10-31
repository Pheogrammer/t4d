<?php 
// MySQL database credentials
$host = "localhost";
$username = "root";
$password = "";
$dbname = "task_manager";

// Create MySQL database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
