<?php
require '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/index.php';</script>";
    exit();
}

$current_user_id = $_SESSION['user_id'];
$friend_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($friend_id <= 0) {
    echo "Invalid user ID.";
    exit();
}

try {
    $sql = "SELECT username, email, avatar_path, created_at FROM users WHERE id = :friend_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':friend_id', $friend_id, PDO::PARAM_INT);
    $stmt->execute();
    $friend = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$friend) {
        echo "User not found.";
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}