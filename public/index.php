<?php

// Autoloading classes using Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Including the database connection
require_once __DIR__ . '/../config/database.php';

use App\Controllers\PostController;

$connection = getDBConnection();
$postController = new PostController($connection);

// Parse the request URI
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Handling routes
if ($requestUri == '/posts') {
    $postController->index();
} else {
    echo "Page not found";
}

mysqli_close($connection);
?>
