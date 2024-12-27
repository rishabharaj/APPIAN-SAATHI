<?php
// Include routing configuration
require_once 'routes/routes.php';

// Parse the requested URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route requests to appropriate controllers or views
if ($uri === '/') {
    // Load the upload form view
    include 'views/upload.php';
} elseif ($uri === '/results') {
    // Load the results page
    include 'views/results.php';
} else {
    // Return 404 if no matching route is found
    http_response_code(404);
    echo "404 - Page Not Found";
}
?>
