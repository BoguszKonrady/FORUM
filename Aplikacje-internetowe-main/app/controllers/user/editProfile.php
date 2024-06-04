<?php
include '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit;
}

$currentUserId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    try {
        $stmt = $conn->prepare("UPDATE users SET username = :username, email = :email WHERE id = :currentUserId");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':currentUserId', $currentUserId);
        $stmt->execute();

        header('Location: /views/user/profile.php');
        exit;
    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
    }
}

$conn = null;

