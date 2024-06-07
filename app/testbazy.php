<?php
// Dane do połączenia z bazą danych
$servername = "db"; // Adres hosta bazy danych (nazwa kontenera MySQL)
$username = "myuser"; // Użytkownik bazy danych
$password = "mypassword"; // Hasło bazy danych
$database = "mydatabase"; // Nazwa bazy danych

try {
    // Tworzenie nowego połączenia z bazą danych
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Ustawienie opcji błędów na wyjątki, aby łatwiej było zarządzać błędami
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Wykonanie prostego zapytania SQL
    $stmt = $conn->query('SELECT VERSION()');
    $version = $stmt->fetchColumn();
    echo 'Wersja bazy danych: ' . $version;
} catch(PDOException $e) {
    // Obsługa błędów połączenia z bazą danych
    echo 'Błąd połączenia: ' . $e->getMessage();
}
?>