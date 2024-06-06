<?php

include '/var/www/html/db.php';

$currentUserId = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT users.id, users.username FROM friends 
                            JOIN users ON friends.friend_id = users.id 
                            WHERE friends.user_id = :currentUserId");
    $stmt->bindParam(':currentUserId', $currentUserId);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $stmt->fetch()) {
        echo "<div class='card mb-3'>
                <div class='card-body'>
                    <h5 class='card-title'>{$row['username']}</h5>
                    <a href='/views/user/showProfile.php?user_id={$row['id']}'>Pokaż profil</a>
                </div>
              </div>";
    }
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
}

$conn = null;
