<?php
$host = "localhost"; // Change if using a different server
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password (empty)
$database = "ubank"; // Change to your actual database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
