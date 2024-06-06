<?php
session_start();
include '/var/www/html/db.php';

$user_id = $retrieved_user_id; // Replace with actual logic

if (isset($_SESSION['user_id'])) {
    echo "Session active. User ID: " . $_SESSION['user_id'];
} else {
    echo "No session found.";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                // header("Location: /views/dashboard.php");
                exit;
            } else {
                $error = "Nieprawidłowe hasło.";
            }
        } else {
            $error = "Nie znaleziono użytkownika z takim adresem email.";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}