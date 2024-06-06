<?php
require '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/halo.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    $sql = "SELECT username, email, avatar_url, created_at FROM users WHERE id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found.";
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $image_url = $user['avatar_url'];

    if (!empty($_FILES["avatar"]["name"])) {
        $target_dir = "/var/www/html/resources/img";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit();
        }

        if (file_exists($target_file)) {
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
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            $image_url = '/uploads/' . basename($_FILES["avatar"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    try {
        $sql = "UPDATE users SET username = :username, email = :email, avatar_url = :avatar_url WHERE id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':avatar_url', $image_url, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Profile updated successfully!'); window.location.href = 'profile.php';</script>";
        } else {
            echo "Error occurred. Please try again later.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}