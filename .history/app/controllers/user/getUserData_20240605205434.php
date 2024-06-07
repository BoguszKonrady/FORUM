<?php
include '/var/www/html/db.php';

try {
    $currentUserId = $_SESSION['user_id'];
    
    $stmt = $conn->prepare("SELECT username, email, created_at FROM users WHERE id = :currentUserId");
    $stmt->bindParam(':currentUserId', $currentUserId, PDO::PARAM_INT); // Correct the parameter name
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

return $user;