Aby wyświetlić listę znajomych zalogowanego użytkownika, musimy założyć, że mamy odpowiednią strukturę tabel w bazie danych do przechowywania informacji o znajomych. Poniżej znajduje się przykładowa struktura bazy danych oraz kod PHP do wyświetlania znajomych zalogowanego użytkownika.
Przykładowa struktura bazy danych:

Zakładam, że masz tabelę users i tabelę friends, która przechowuje relacje pomiędzy użytkownikami.

sql

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE friends (
    user_id INT NOT NULL,
    friend_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (friend_id) REFERENCES users(id),
    PRIMARY KEY (user_id, friend_id)
);

Plik PHP do wyświetlania znajomych (display_friends.php):

php

<?php
require '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/halo.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];

// Pobieranie znajomych z bazy danych
try {
    $sql = "SELECT u.id, u.username, u.email 
            FROM friends f 
            JOIN users u ON f.friend_id = u.id 
            WHERE f.user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $friends = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>