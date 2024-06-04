<?php
include './db.php';

try {
    $stmt = $conn->prepare("SELECT title, content FROM posts");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $stmt->fetch()) {
        echo "<div class='card mb-3'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['title']}</h5>
                            <p class='card-text'>{$row['content']}</p>
                            <form method='POST' action='/addFavorite.php' style='display:inline;'>
                                <input type='hidden' name='post_id' value='" . htmlspecialchars($row['id']) . "'>
                                <button type='submit'>Dodaj do ulubionych</button>
                            </form>
                        </div>
                      </div>";
    }
} catch(PDOException $e) {
    echo "Błąd: " . $e->getMessage();
}

$conn = null; E: