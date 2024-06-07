<?php
require '/var/www/html/db.php';
session_start();

$response = ['status' => '', 'message' => ''];

if (!isset($_SESSION['user_id'])) {
    $response['status'] = 'error';
    $response['message'] = 'Brak zalogowanego użytkownika.';
    echo json_encode($response);
    exit();
}

$user_id = $_SESSION['user_id'];
$friend_id = $_GET['user_id'];

try {
    $sql = "DELETE FROM friends WHERE (user_id = :user_id AND friend_id = :friend_id) OR (user_id = :friend_id AND friend_id = :user_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':friend_id', $friend_id, PDO::PARAM_INT);
    $stmt->execute();

    $response['status'] = 'success';
    $response['message'] = 'Znajomy został usunięty.';
} catch (PDOException $e) {
    $response['status'] = 'error';
    $response['message'] = 'Błąd: ' . $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);
$conn = null;
?>
