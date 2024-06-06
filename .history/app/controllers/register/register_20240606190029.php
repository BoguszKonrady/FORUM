<?php
require '/var/www/html/db.php';

session_start(); // Upewnij się, że sesje są uruchomione

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/halo.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($email) || empty($password)) {
        echo "Wszystkie pola są wymagane!";
    } else {
        $sql = "SELECT id FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Ten adres email jest już zarejestrowany!";
        } else {
            $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $conn->prepare($sql);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);

            if ($stmt->execute()) {
                // Ustaw zmienne sesji po udanej rejestracji
                $_SESSION['user_id'] = $conn->lastInsertId();
                $_SESSION['username'] = $username;

                echo "<script type='text/javascript'>window.location.href = '/views/dashboard.php';</script>";
                // header("Location: /views/dashboard.php");
            } else {
                echo "Wystąpił błąd. Spróbuj ponownie później.";
            }
        }
    }
}
?>
