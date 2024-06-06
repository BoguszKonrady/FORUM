<?php
ob_start();
include '/var/www/html/db.php';

$userId = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT username, email, created_at FROM users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
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

ob_end_flush();
?>
