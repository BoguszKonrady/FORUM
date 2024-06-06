<?php
require '/var/www/html/db.php';

$currentUserId = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT username, email, created_at FROM users WHERE id = :user_id");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header("Location: /views/dashboard.php");
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
?>