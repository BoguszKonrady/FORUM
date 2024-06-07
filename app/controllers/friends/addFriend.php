<?php
include '/var/www/html/db.php';
session_start();

$response = ['status' => '', 'message' => ''];

$currentUserId = $_SESSION['user_id'];

if (isset($_GET['user_id'])) {
    $friendId = $_GET['user_id'];

    try {
        $checkStmt = $conn->prepare("SELECT * FROM friends WHERE user_id = :currentUserId AND friend_id = :friendId");
        $checkStmt->bindParam(':currentUserId', $currentUserId, PDO::PARAM_INT);
        $checkStmt->bindParam(':friendId', $friendId, PDO::PARAM_INT);
        $checkStmt->execute();

        if ($checkStmt->rowCount() == 0) {
            $stmt = $conn->prepare("INSERT INTO friends (user_id, friend_id) VALUES (:currentUserId, :friendId)");
            $stmt->bindParam(':currentUserId', $currentUserId, PDO::PARAM_INT);
            $stmt->bindParam(':friendId', $friendId, PDO::PARAM_INT);
            $stmt->execute();
            $response['status'] = 'success';
            $response['message'] = 'Dodano do znajomych!';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Ten użytkownik jest już Twoim znajomym.';
        }
    } catch(PDOException $e) {
        $response['status'] = 'error';
        $response['message'] = 'Błąd: ' . $e->getMessage();
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Brak ID użytkownika do dodania.';
}

header('Content-Type: application/json');
echo json_encode($response);
$conn = null;
?>
