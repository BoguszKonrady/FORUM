<?php
include '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit;
}

$currentUserId = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT posts.id, posts.content FROM favorites 
                            JOIN posts ON favorites.post_id = posts.id 
                            WHERE favorites.user_id = :user_id");
    $stmt->bindParam(':user_id', $currentUserId, PDO::PARAM_INT);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $stmt->fetch()) {
        echo "<div class='card mb-3'>
                <div class='card-body'>
                    <p class='card-text'>{$row['content']}</p>
                    <a href='/views/user/showProfile.php?user_id={$row['id']}'>Pokaż profil</a>
                </div>
              </div>";
    }
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
}

$conn = null;
?>
