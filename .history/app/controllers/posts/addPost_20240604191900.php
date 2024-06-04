<?php
ob_start(); // Start output buffering

include '/var/www/html/db.php';
session_start(); // Start session

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit; // Ensure script stops execution after header redirection
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentUserId = $_SESSION['user_id'];
    $content = $_POST['content'];

    try {
        $stmt = $conn->prepare("INSERT INTO posts (user_id, content) VALUES (:user_id, :content)");
        $stmt->bindParam(':user_id', $currentUserId);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
        
        header('Location: /index.php');
        exit; // Ensure script stops execution after header redirection
    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
    }
}

$conn = null;
ob_end_flush(); // Flush output buffer and send output
?>
