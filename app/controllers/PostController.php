<?php
require '../db.php'; 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = trim($_POST["content"]);

    if (!empty($content)) {
        $sql = "INSERT INTO posts (user_id, content) VALUES (:user_id, :content)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
        header("Location: ../dashboard.php");
        exit;
    }
}

$sql = "SELECT content, created_at FROM posts WHERE user_id = :user_id ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
