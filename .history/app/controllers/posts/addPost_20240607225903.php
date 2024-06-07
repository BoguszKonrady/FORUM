<?php
function logMessage($message) {
    $logfile = '/var/www/html/logs/app.log';
    file_put_contents($logfile, date("Y-m-d H:i:s") . " - " . $message . "\n", FILE_APPEND);
}

require '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    logMessage("User not logged in, redirecting to login page.");
    echo "<script type='text/javascript'>window.location.href = '/halo.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postContent = trim($_POST["postContent"]);
    $postTitle = trim($_POST["postTitle"]); 
    $image_url = NULL;

    if (empty($postContent)) {
        logMessage("Post content is empty.");
        echo "Post content cannot be empty!";
        exit();
    }

    if (!empty($_FILES["postImage"]["name"])) {
        $target_dir = "/var/www/html/resources/img/";
        $target_file = $target_dir . basename($_FILES["postImage"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["postImage"]["tmp_name"]);
        if ($check === false) {
            logMessage("File is not an image.");
            echo "File is not an image.";
            exit();
        }

        if (file_exists($target_file)) {
            logMessage("File already exists: " . $target_file);
            echo "Sorry, file already exists.";
            exit();
        }
       
        if ($_FILES["postImage"]["size"] > 5000000) { // 5MB
            logMessage("File is too large.");
            echo "Sorry, your file is too large.";
            exit();
        }

        if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            logMessage("Invalid file type: " . $imageFileType);
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        if (move_uploaded_file($_FILES["postImage"]["tmp_name"], $target_file)) {
            $image_url = 'resources/img/' . basename($_FILES["postImage"]["name"]);
            logMessage("Image uploaded successfully. Path: " . $image_url);
        } else {
            logMessage("Error uploading file.");
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    try {
        $sql = "INSERT INTO posts (user_id, title, content, image_path, created_at) VALUES (:user_id, :title, :content, :image_path, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->bindParam(':title', $postTitle, PDO::PARAM_STR); 
        $stmt->bindParam(':content', $postContent, PDO::PARAM_STR);
        $stmt->bindParam(':image_path', $image_url, PDO::PARAM_STR);

        logMessage("Executing SQL statement: $sql with user_id: " . $_SESSION['user_id'] . ", title: $postTitle, content: $postContent, image_path: $image_url");

        if ($stmt->execute()) {
            $win=1+1;
        } else {
            logMessage("Error executing statement.");
            echo "Error occurred. Please try again later.";
        }
    } catch (PDOException $e) {
        logMessage("Database error: " . $e->getMessage());
        echo "Error: " . $e->getMessage();
    }
}
?>