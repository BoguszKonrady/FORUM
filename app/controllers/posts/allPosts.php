<?php
require '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/index.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    $sql = "SELECT p.id, p.content, p.created_at, p.image_path, u.username 
            FROM posts p 
            JOIN users u ON p.user_id = u.id 
            ORDER BY p.created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}

foreach ($posts as $post) {
    echo "<div class='post'>";
    echo "<div class='.thumbnail'><p><img class='thumbnail img' src='../resources/profile-img/profile.jpg' alt='Post Image'></div><strong>{$post['username']}</strong> - {$post['created_at']}</p>";
    echo "<p>{$post['content']}</p>";
    if ($post['image_path']) {
        echo "<img class='img_posts' src='http://localhost:8080/{$post['image_path']}' alt='Post Image'>";
        echo "<button class='thumbs-up'><span>+</span></button>";
        echo "<button class='thumbs-down'><span>-</span></button>";
        echo "<button class='share-btn'>Share</button>";
    }
    echo "</div>";
}
?>