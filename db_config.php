<?php
$servername = "localhost"; // Change if your database host is different
$username = "root"; // Default XAMPP MySQL username
$password = ""; // Default is empty in XAMPP
$dbname = "ubank"; // Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
