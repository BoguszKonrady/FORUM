<?php
include '/var/www/html/db.php';
session_start();
$_SESSION['user_id'] = 123; // Example user ID
echo "Session set. User ID: " . $_SESSION['user_id'];
