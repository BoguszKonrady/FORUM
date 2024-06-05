<?php
ob_start();
include '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit;
}

$currentUserId = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT users.id, users.username, friends.friend_id FROM users
                            LEFT JOIN friends ON users.id = friends.friend_id AND friends.user_id = :currentUserId
                            WHERE users.id != :currentUserId");
    $stmt->bindParam(':currentUserId', $currentUserId);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $stmt->fetch()) {
        echo "<div class='card mb-3'>
                <div class='card-body'>
                    <h5 class='card-title'>{$row['username']}</h5>";
        if ($row['friend_id']) {
            echo "<span>Już jesteście znajomymi</span>";
        } else {
            echo "<a href='/controllers/friends/addFriend.php?user_id={$row['id']}'>Dodaj do znajomych</a>";
        }
        echo "</div>
              </div>";
    }
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
}

$conn = null;
ob_end_flush();
