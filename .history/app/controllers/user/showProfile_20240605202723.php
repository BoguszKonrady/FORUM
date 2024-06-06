<?php
if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];

    try {
        $stmt = $conn->prepare("SELECT username, email FROM users WHERE id = :user_id");
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Użytkownik nie znaleziony.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Błąd: " . $e->getMessage();
        exit;
    }
} else {
    echo "error";
    exit;
}

$conn = null;