<?php
include '/var/www/html/db.php';
session_start();

try {
    $stmt = $conn->prepare("SELECT posts.id, posts.content, posts.image_path, posts.created_at, users.username, 
                            (SELECT COUNT(*) FROM favorites WHERE favorites.post_id = posts.id) AS like_count 
                            FROM posts 
                            JOIN users ON posts.user_id = users.id 
                            ORDER BY posts.created_at DESC");
    $stmt->execute();

    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Błąd: " . $e->getMessage();
    $posts = [];
}
foreach ($posts as $post) {
    echo "<div class='post'>";
    echo "<div class='.thumbnail'><p><img class='thumbnail img' src='../resources/profile-img/profile.jpg' alt='Post Image'></div><strong>{$post['username']}</strong> - {$post['created_at']}</p>";
    echo "<p>{$post['content']}</p>";
    if ($post['image_path']) {
        echo "<img class='img_posts' src='http://localhost:8080/{$post['image_path']}' alt='Post Image'>";
        echo "<button class='like-button' data-post-id='{$post['id']}'></button>";
        echo "<span class='like-count'>$post[like_count] Liczba polubień</span>";
        //echo "<button class='share-btn'>Share</button>";
    }
    echo "</div>";
}

$conn = null;