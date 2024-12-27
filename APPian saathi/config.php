<?php
// Database Configuration
define('DB_HOST', 'localhost');     // Database host (e.g., localhost)
define('DB_USER', 'root');          // Database username
define('DB_PASS', 'password');      // Database password
define('DB_NAME', 'document_processor'); // Database name

// Function to Connect to MySQL Database
function connectDatabase() {
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check for connection errors
    if ($connection->connect_error) {
        die("Database Connection Failed: " . $connection->connect_error);
    }

    return $connection;
}
?>
