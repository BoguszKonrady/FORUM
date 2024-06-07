<?php
include '/var/www/html/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit();
}

$userId = $_SESSION['user_id'];
$postId = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;

if ($postId > 0) {
    try {
        $stmt = $conn->prepare("SELECT * FROM favorites WHERE user_id = :user_id AND post_id = :post_id");
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            $stmt = $conn->prepare("INSERT INTO favorites (user_id, post_id) VALUES (:user_id, :post_id)");
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':post_id', $postId, PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Nie udało się polubić postu']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Post już jest polubiony']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Niepoprawne ID']);
}

