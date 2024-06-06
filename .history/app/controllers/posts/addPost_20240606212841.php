<?php
require '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/index.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postContent = trim($_POST["postContent"]);
    $image_url = NULL;

    if (empty($postContent)) {
        echo "Post content cannot be empty!";
        exit();
    }

    if (!empty($_FILES["postImage"]["name"])) {
        $target_dir = "/var/www/html/resources/img";
        $target_file = $target_dir . basename($_FILES["postImage"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["postImage"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit();
        }

        if (file_exists($target_file)) {
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

        if (move_uploaded_file($_FILES["postImage"]["tmp_name"], $target_file)) {
            $image_url = '/uploads/' . basename($_FILES["postImage"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    try {
        $sql = "INSERT INTO posts (user_id, content, image_path, created_at) VALUES (:user_id, :content, :image_path, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->bindParam(':content', $postContent, PDO::PARAM_STR);
        $stmt->bindParam(':image_path', $image_url, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Post created successfully!'); window.location.href = '/display_posts.php';</script>";
        } else {
            echo "Error occurred. Please try again later.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
