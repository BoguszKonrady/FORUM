<?php
ob_start();
include '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit;
}

$currentUserId = $_SESSION['user_id'];

if (isset($_GET['user_id'])) {
    $friendId = $_GET['user_id'];

    try {
        $checkStmt = $conn->prepare("SELECT * FROM friends WHERE user_id = :currentUserId AND friend_id = :friendId");
        $checkStmt->bindParam(':currentUserId', $currentUserId);
        $checkStmt->bindParam(':friendId', $friendId);
        $checkStmt->execute();

        if ($checkStmt->rowCount() == 0) {
            $stmt = $conn->prepare("INSERT INTO friends (user_id, friend_id) VALUES (:currentUserId, :friendId)");
            $stmt->bindParam(':currentUserId', $currentUserId);
            $stmt->bindParam(':friendId', $friendId);
            $stmt->execute();
            echo "Dodano do znajomych!";
        } else {
            echo "Ten użytkownik jest już Twoim znajomym.";
        }
    } catch(PDOException $e) {
        echo "Błąd: " . $e->getMessage();
    }
} else {
    echo "Brak ID użytkownika do dodania.";
}

$conn = null;
ob_end_flush();
