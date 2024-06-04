<?php
ob_start();

include '/var/www/html/db.php';
session_start(); 

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentUserId = $_SESSION['user_id'];
    $postId = $_POST['post_id'];

    try {
        $stmt = $conn->prepare("INSERT INTO favorites (user_id, post_id) VALUES (:user_id, :post_id)");
        $stmt->bindParam(':user_id', $currentUserId);
        $stmt->bindParam(':post_id', $content);
        $stmt->execute();
        
        header('Location: /index.php');
        exit; 
    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
    }
}

$conn = null;
ob_end_flush();
?>
