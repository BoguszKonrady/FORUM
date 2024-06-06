<?php
include '/var/www/html/db.php';
if (isset($_SESSION['user_id'])) {
    echo "Session active. User ID: " . $_SESSION['user_id'];
} else {
    echo "No session found.";
}