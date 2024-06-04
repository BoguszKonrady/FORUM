<?php

function getPDOConnection()
{
    $servername = "db"; // Adres hosta bazy danych (nazwa kontenera MySQL)
    $username = "myuser"; // Użytkownik bazy danych
    $password = "mypassword"; // Hasło bazy danych
    $database = "mydatabase"; // Nazwa bazy danych

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // Ustaw tryb błędów PDO na wyjątki
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }
}
?>
