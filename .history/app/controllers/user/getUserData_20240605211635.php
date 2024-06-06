<?php
include '/var/www/html/db.php';
session_start();
echo "Session set. User ID: " . $_SESSION['user_id'];
