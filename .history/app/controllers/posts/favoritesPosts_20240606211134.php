<?php
require '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/halo.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];

// Pobieranie polubionych postów z bazy danych
try {
    $sql = "SELECT p.id, p.content, p.created_at, u.username
            FROM favorites f
            JOIN posts p ON f.post_id = p.id
            JOIN users u ON p.user_id = u.id
            WHERE f.user_id = :user_id
            ORDER BY p.created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>