<?php
require '/var/www/html/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $error_message = "";

    if (empty($email) || empty($password)) {
        $error_message = "Wszystkie pola są wymagane!";
    } else {
        $sql = "SELECT id, username, password FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: views/dashboard.php");
                exit;
            } else {
                $error_message = "Nieprawidłowe hasło!";
            }
        } else {
            $error_message = "Nie znaleziono użytkownika z takim adresem email!";
        }
    }

    if (!empty($error_message)) {
        echo $error_message;
    }
}