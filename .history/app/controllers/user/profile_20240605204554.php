<?php
include '/var/www/html/db.php';

$currentUserId = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT username, email, created_at FROM users WHERE id = :user_id");
    $stmt->bindParam(':currentUserId', $currentUserId);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $user = $stmt->fetch();

    if (!$user) {
        echo "Nie znaleziono użytkownika.";
        exit;
    }
} catch (PDOException $e) {
    echo "Błąd: " . $e->getMessage();
    exit;
}

$conn = null;
