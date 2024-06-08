<?php
include '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/index.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['user_id'];
    $postContent = trim($_POST["postContent"]);
    $imageUrl = null;

    if (!empty($_FILES["postImage"]["name"])) {
        $targetDir = "/var/www/html/uploads/";
        $targetFile = $targetDir . basename($_FILES["postImage"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["postImage"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit();
        }

        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            exit();
        }

        if ($_FILES["postImage"]["size"] > 5000000) { // 5MB
            echo "Sorry, your file is too large.";
            exit();
        }

        if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        if (move_uploaded_file($_FILES["postImage"]["tmp_name"], $targetFile)) {
            $imageUrl = '/img/uploads/' . basename($_FILES["postImage"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    try {
        $sql = "INSERT INTO posts (user_id, content, image_path, created_at) VALUES (:user_id, :content, :image_path, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':content', $postContent, PDO::PARAM_STR);
        $stmt->bindParam(':image_path', $imageUrl, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Dodano post!'); window.location.href = '/views/dashboard.php';</script>";
        } else {
            echo "Error occurred. Please try again later.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
