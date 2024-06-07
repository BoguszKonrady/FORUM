<?php
include '/var/www/html/db.php';

session_start();

$currentUserId = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT username, email, first_name, last_name, avatar_url, created_at FROM users WHERE id = :currentUserId");
    $stmt->bindParam(':currentUserId', $currentUserId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Użytkownik nie znaleziony.";
        exit();
    }

    $stmt = $conn->prepare("SELECT COUNT(*) as friend_count FROM friends WHERE user_id = :currentUserId");
    $stmt->bindParam(':currentUserId', $currentUserId, PDO::PARAM_INT);
    $stmt->execute();
    $friendCount = $stmt->fetch(PDO::FETCH_ASSOC)['friend_count'];

    $stmt = $conn->prepare("SELECT COUNT(*) as post_count FROM posts WHERE user_id = :currentUserId");
    $stmt->bindParam(':currentUserId', $currentUserId, PDO::PARAM_INT);
    $stmt->execute();
    $postCount = $stmt->fetch(PDO::FETCH_ASSOC)['post_count'];
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
    exit();
}

$conn = null;
?>
