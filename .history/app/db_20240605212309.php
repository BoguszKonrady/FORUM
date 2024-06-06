<?php
session_start();

$servername = "db"; // Adres hosta bazy danych (nazwa kontenera MySQL)
$username = "myuser"; // Użytkownik bazy danych
$password = "mypassword"; // Hasło bazy danych
$database = "mydatabase"; // Nazwa bazy danych

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Ustaw tryb błędów PDO na wyjątki
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    // Dodatkowe informacje o błędzie
    var_dump($e);
}
