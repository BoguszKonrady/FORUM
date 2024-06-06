<?php

include '/var/www/html/db.php';


$currentUserId = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT username, email FROM users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $currentUserId, PDO::PARAM_INT);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $stmt->fetch()) {
        echo "<div class='card mb-3'>
                <div class='card-body'>
                    <p class='card-text'>{$row['username']}</p>
                    <p class='card-text'>{$row['email']}</p>
                </div>
              </div>";
    }
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
}

$conn = null;
