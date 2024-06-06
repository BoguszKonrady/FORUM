<?php
include '/var/www/html/db.php';
if (isset($_SESSION['user_id'])) {
    echo "User ID in session: " . $_SESSION['user_id'];
} else {
    echo "User ID not set in session.";
}