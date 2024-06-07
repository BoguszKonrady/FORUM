<?php
include '/var/www/html/db.php';

session_start();

$userId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($userId <= 0) {
    echo "Invalid user ID.";
    exit();
}

try {
    $stmt = $conn->prepare("SELECT username, email, first_name, last_name, avatar_url, created_at FROM users WHERE id = :userId");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Użytkownik nie znaleziony.";
        exit();
    }

    $stmt = $conn->prepare("SELECT COUNT(*) as friend_count FROM friends WHERE user_id = :userId");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $friendCount = $stmt->fetch(PDO::FETCH_ASSOC)['friend_count'];

    $stmt = $conn->prepare("SELECT COUNT(*) as post_count FROM posts WHERE user_id = :userId");
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $postCount = $stmt->fetch(PDO::FETCH_ASSOC)['post_count'];
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
    exit();
}

$conn = null;
?>
