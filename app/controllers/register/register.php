<?php
require '/var/www/html/db.php';

if (isset($_SESSION['user_id'])) {
    echo "Session active. User ID: " . $_SESSION['user_id'];
} else {
    echo "Ładowanie sesji.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $image_path="http://localhost:8080/resources/img/default.jpg";


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
            $sql = "INSERT INTO users (username, email, password, avatar_url) VALUES (:username, :email, :password, :image_path)";
                $stmt = $conn->prepare($sql);
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->bindParam(':image_path', $image_path);


            if ($stmt->execute()) {
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
