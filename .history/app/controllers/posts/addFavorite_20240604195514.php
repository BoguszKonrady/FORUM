<?php
include '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_id'])) {
    $userId = $_SESSION['user_id'];
    $postId = $_POST['post_id'];

    try {
        // Sprawdzenie, czy post istnieje w tabeli posts
        $stmt = $conn->prepare("SELECT id FROM posts WHERE id = :post_id");
        $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Post istnieje, można dodać do ulubionych
            $stmt = $conn->prepare("INSERT INTO favorites (user_id, post_id) VALUES (:user_id, :post_id)");
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: /index.php');
            exit;
        } else {
            echo "Błąd: Post nie istnieje.";
        }
    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
        exit;
    }
}

$conn = null;
?>
