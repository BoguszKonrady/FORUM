<?php
include '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/login.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['user_id'];
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $avatarUrl = null;

    if (!empty($_FILES["avatar"]["name"])) {
        $targetDir = "/var/www/html/uploads/avatars/";
        $targetFile = $targetDir . basename($_FILES["avatar"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit();
        }

        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            exit();
        }

        if ($_FILES["avatar"]["size"] > 5000000) { // 5MB
            echo "Sorry, your file is too large.";
            exit();
        }

        if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFile)) {
            $avatarUrl = '/uploads/avatars/' . basename($_FILES["avatar"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    try {
        if ($avatarUrl) {
            $stmt = $conn->prepare("UPDATE users SET username = :username, email = :email, avatar_url = :avatar_url WHERE id = :user_id");
            $stmt->bindParam(':avatar_url', $avatarUrl, PDO::PARAM_STR);
        } else {
            $stmt = $conn->prepare("UPDATE users SET username = :username, email = :email WHERE id = :user_id");
        }

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Profil zaktualizowany pomyślnie!'); window.location.href = '/views/profile.php';</script>";
        } else {
            echo "Error occurred. Please try again later.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
