<?php
include '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit;
}

$currentUserId = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT id, content, created_at FROM posts WHERE user_id = :currentUserId ORDER BY created_at DESC");
    $stmt->bindParam(':currentUserId', $currentUserId);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $stmt->fetch()) {
        echo "<div class='card mb-3'>
                <div class='card-body'>
                    <h5 class='card-title'>Post #{$row['id']}</h5>
                    <p class='card-text'>{$row['content']}</p>
                    <p class='card-text'><small class='text-muted'>Dodano: {$row['created_at']}</small></p>
                </div>
              </div>";
    }
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
}

$conn = null;
?>
