<?php
include '/var/www/html/db.php';

session_start();

$currentUserId = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT users.id, users.username, friends.friend_id FROM users
                            LEFT JOIN friends ON users.id = friends.friend_id AND friends.user_id = :currentUserId
                            WHERE users.id != :currentUserId");
    $stmt->bindParam(':currentUserId', $currentUserId, PDO::PARAM_INT);
    $stmt->execute();

    $friends = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
}

$conn = null;
?>
