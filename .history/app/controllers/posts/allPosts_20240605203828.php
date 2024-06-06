<?php
include '/var/www/html/db.php';
$currentUserId = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT posts.id, posts.content FROM posts 
                            JOIN friends ON posts.user_id = friends.friend_id 
                            WHERE friends.user_id = :currentUserId");
    $stmt->bindParam(':currentUserId', $currentUserId);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $stmt->fetch()) {
        echo "<div class='card mb-3'>
                <div class='card-body'>
                    <p class='card-text'>{$row['content']}</p>
                    <a href='/views/user/showProfile.php?user_id={$row['id']}'>Pokaż profil</a>
                    <form method='POST' action='/addFavorite.php' style='display:inline;'>
                        <input type='hidden' name='post_id' value='{$row['id']}'>
                        <button type='submit'>Dodaj do ulubionych</button>
                    </form>
                </div>
              </div>";
    }
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
}

$conn = null;