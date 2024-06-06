<?php
require '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>window.location.href = '/halo.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];
$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($post_id <= 0) {
    echo "Invalid post ID.";
    exit();
}

try {
    $sql = "SELECT * FROM posts WHERE id = :post_id AND user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        echo "Post not found.";
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postContent = trim($_POST["postContent"]);
    $image_url = $post['image_url'];

    if (!empty($_FILES["postImage"]["name"])) {
        $target_dir = "/var/www/html/uploads/";
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
        $sql = "UPDATE posts SET content = :content, image_path = :image_path WHERE id = :post_id AND user_id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':content', $postContent, PDO::PARAM_STR);
        $stmt->bindParam(':image_path', $image_url, PDO::PARAM_STR);
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Post updated successfully!'); window.location.href = '/views/dashboard.php';</script>";
        } else {
            echo "Error occurred. Please try again later.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
