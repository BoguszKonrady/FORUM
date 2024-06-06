<?php
include '/var/www/html/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentUserId = $_SESSION['user_id'];
    $content = $_POST['content'];

    try {
        $stmt = $conn->prepare("INSERT INTO posts (user_id, content) VALUES (:user_id, :content)");
        $stmt->bindParam(':user_id', $currentUserId);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
        
        header('Location: /index.php');
        exit; 
    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
    }
}

$conn = null;
