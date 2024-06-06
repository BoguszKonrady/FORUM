<?php
require '/var/www/html/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postContent = trim($_POST["postContent"]);

    if (empty($postContent)) {
        echo "Post content cannot be empty!";
        exit();
    }

    try {
        $sql = "INSERT INTO posts (user_id, content, created_at) VALUES (:user_id, :content, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':content', $postContent);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>alert('Post created successfully!'); window.location.href = 'form.php';</script>";
        } else {
            echo "Error occurred. Please try
