<?php
session_start();
include '/var/www/html/db.php';
start_
if (isset($_SESSION['user_id'])) {
    echo "Session active. User ID: " . $_SESSION['user_id'];
} else {
    echo "No session found.";
}
