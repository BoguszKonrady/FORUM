<?php
session_start();
include '/var/www/html/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit;
}

$currentUserId = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT username, email, created_at FROM users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $currentUserId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Użytkownik nie znaleziony.";
        exit;
    }
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
    exit;
}

// Zwracanie danych jako tablicy asocjacyjnej
return $user;
?>
