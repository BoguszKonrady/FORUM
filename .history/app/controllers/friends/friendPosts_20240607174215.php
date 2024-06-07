<?php
require '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/login.php';</script>";
    exit();
}

$current_user_id = $_SESSION['user_id'];
$friend_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($friend_id <= 0) {
    echo "Invalid user ID.";
    exit();
}

// Sprawdzanie, czy użytkownicy są znajomymi
try {
    $sql = "SELECT * FROM friends WHERE (user_id = :current_user_id AND friend_id = :friend_id) 
            OR (user_id = :friend_id AND friend_id = :current_user_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':current_user_id', $current_user_id, PDO::PARAM_INT);
    $stmt->bindParam(':friend_id', $friend_id, PDO::PARAM_INT);
    $stmt->execute();
    $friendship = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$friendship) {
        echo "You are not friends with this user.";
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}

try {
    $sql = "SELECT content, image_path, created_at FROM posts WHERE user_id = :friend_id ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':friend_id', $friend_id, PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>