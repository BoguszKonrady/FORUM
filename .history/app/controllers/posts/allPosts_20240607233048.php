<?php
include '/var/www/html/db.php';
session_start();

try {
    $stmt = $conn->prepare("SELECT posts.id, posts.content, posts.image_url, posts.created_at, users.username, 
                            (SELECT COUNT(*) FROM likes WHERE likes.post_id = posts.id) AS like_count 
                            FROM posts 
                            JOIN users ON posts.user_id = users.id 
                            ORDER BY posts.created_at DESC");
    $stmt->execute();

    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Błąd: " . $e->getMessage();
}

$conn = null;
?>
