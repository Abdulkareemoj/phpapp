<?php
// Database constants
define('DB_NAME', 'phpapp');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');

// Database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>