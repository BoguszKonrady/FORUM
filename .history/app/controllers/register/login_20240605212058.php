<?php
session_start();


include '/var/www/html/db.php';

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
                // Use JavaScript to redirect
                echo "<script type='text/javascript'>window.location.href = '/views/dashboard.php';</script>";
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